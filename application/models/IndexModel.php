<?php
/**
 * Control Panel
 *
 * Copyright (c) 2013 Efex
 *
 * Панель управления для серверов WoW
 *
 * @author   Efex
 * @license  GNU General Public License
 * @link     https://github.com/Efexis/ControlPanel/
 * @version  0.0.1
 */
 
class IndexModel extends Model {
    
    public function getStatisticRace () {
        // получаем статистику рас мужского пола
        $sql = 'SELECT `race`, count(`race`) AS `count_man`
                FROM `'.$this->config['db.char'].'`.`characters`
                WHERE `gender` = 0
                GROUP BY `race`';
        $stmt = $this->db['char']->query($sql);
        $stat_man = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // получаем статистику рас женского пола
        $sql = 'SELECT `race`, count(`race`) AS `count_woman`
                FROM `'.$this->config['db.char'].'`.`characters`
                WHERE `gender` = 1
                GROUP BY `race`';
        $stmt = $this->db['char']->query($sql);
        $stat_woman = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include "system/modules/Arrays.php";

        // объеденяем все в 1 массив
        $i = 0;
        foreach ($race as $key => $val) {
            $stat[$i]['race'] =  $key;
            if( $stat_man ) {
                foreach ($stat_man as $v) {
                    if ( $key == $v['race'] ) {
                        $stat[$i]['count_man'] = $v['count_man'];
                        break;
                    } else {
                        $stat[$i]['count_man'] = 0;
                    }
                }
            } else {
                $stat[$i]['count_man'] = 0;
            }

            if( $stat_woman ) {
                foreach ( $stat_woman as $v) {
                    if ( $key == $v['race'] ) {
                        $stat[$i]['count_woman'] = $v['count_woman'];
                        break;
                    } else {
                        $stat[$i]['count_woman'] = 0;
                    }
                }
            } else {
                $stat[$i]['count_woman'] = 0;
            }
            $i++;
        }
        // формируем массив для вывода
        foreach ($stat as $st) {
            $all = $st['count_man'] + $st['count_woman'];
            $str = $race[$st['race']] . ' : ' . $all;
            if ( !$all == 0) {
                $str .= ' ( '. $raceImgM[$st['race']] . $st['count_man'] .' | '. $raceImgW[$st['race']] . $st['count_woman'] .' )';
            }
            $arr[] = $str;
        }
        return $arr;
    }

    public function getStatisticClass () {
        $sql = 'SELECT `class`, count(`class`) AS `count`
                FROM `'.$this->config['db.char'].'`.`characters`
                GROUP BY `class`';
        $stmt = $this->db['char']->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "system/modules/Arrays.php";

        $i = 0;
        foreach ($class as $key => $val) {
            $stat[$i]['class'] =  $key;
            if( $result ) {
                foreach ($result as $v) {
                    if ( $key == $v['class'] ) {
                        $stat[$i]['count'] = $v['count'];
                        break;
                    } else {
                        $stat[$i]['count'] = 0;
                    }
                }
            } else {
                $stat[$i]['count'] = 0;
            }
            $i++;
        }
        // формируем массив для вывода
        foreach ($stat as $val) {
            $statClass[] = $classImg[$val['class']] . ' : ' . $val['count'];
        }
        return $statClass;
    }

    public function getRealmInfo () {
        $sql = 'SELECT `address`, `name` FROM `'.$this->config['db.auth'].'`.`realmlist`';
        $stmt = $this->db['auth']->query($sql);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        return $info;
    }

    public function getMaxUptimeInfo () {
        $sql = 'SELECT max(`uptime`) AS `maxuptime`, max(`maxplayers`) AS `maxplayers`
                FROM `'.$this->config['db.auth'].'`.`uptime`';
        $stmt = $this->db['auth']->query($sql);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( !$info['maxplayers'] ) {
            $info['maxplayers'] = 0;
        }
        if ( !$info['maxuptime'] ) {
            $info['maxuptime'] = 0;
        } else {
            $info['maxuptime'] = $this->timeConvert($info['maxuptime']);
        }
        return $info;
    }

    public function getOnlineInfo () {
        // получаем онлайн орды
        $sql = 'SELECT count(`guid`) AS `count`
                FROM `'.$this->config['db.char'].'`.`characters`
                WHERE `race` IN (2, 5, 6, 8, 10) AND `online` = 1';
        $stmt = $this->db['char']->query($sql);
        $online_horde = $stmt->fetch(PDO::FETCH_ASSOC);

        // получаем онлайн альянса
        $sql = 'SELECT count(`guid`) AS `count`
                FROM `'.$this->config['db.char'].'`.`characters`
                WHERE `race` IN (1, 3, 4, 7, 11) AND `online` = 1';
        $stmt = $this->db['char']->query($sql);
        $online_alliance = $stmt->fetch(PDO::FETCH_ASSOC);

        include "system/modules/Arrays.php";

        // формируем строку для вывода
        $info = $online_horde['count'] + $online_alliance['count'];
        if ( $info != 0 ) {
            $info .= ' ( ' . $factionImg['alliance'] . $online_alliance['count'] . ' | ' . $factionImg['horde'] . $online_horde['count'] . ' )';
        }
        return $info;
    }

    public function getTimeArenaPoints () {
        $sql = 'SELECT `value` FROM `'.$this->config['db.char'].'`.`worldstates` WHERE `entry` = 20001';
        $stmt = $this->db['char']->query($sql);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        return date('d-m-Y H:i:s', $info['value']);
    }

    public function getCountChars () {
        $sql = 'SELECT count(*) AS `count` FROM `'.$this->config['db.char'].'`.`characters`';
        $stmt = $this->db['char']->query($sql);
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count['count'];
    }

    public function getCountTeams () {
        $sql = 'SELECT count(*) AS `count` FROM `'.$this->config['db.char'].'`.`arena_team`';
        $stmt = $this->db['char']->query($sql);
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count['count'];
    }

    public function getCountGuilds () {
        $sql = 'SELECT count(*) AS `count` FROM `'.$this->config['db.char'].'`.`guild`';
        $stmt = $this->db['char']->query($sql);
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count['count'];
    }

    public function getCountAccounts () {
        $sql = 'SELECT count(*) AS `count` FROM `'.$this->config['db.auth'].'`.`account`';
        $stmt = $this->db['auth']->query($sql);
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count['count'];
    }
}
?>