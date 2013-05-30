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
        $sql = "SELECT `race`, count(`race`) AS `count_man`
                FROM `{$this->config['db.char']}`.`characters`
                WHERE `gender` = 0
                GROUP BY `race`";
        $stmt = $this->db['char']->query($sql);
        $stat_man = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // получаем статистику рас женского пола
        $sql = "SELECT `race`, count(`race`) AS `count_woman`
                FROM `{$this->config['db.char']}`.`characters`
                WHERE `gender` = 1
                GROUP BY `race`";
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
        $sql = "SELECT `class`, count(`class`) AS `count`
                FROM `{$this->config['db.char']}`.`characters`
                GROUP BY `class`";
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
        $sql = "SELECT `address`, `name` FROM `{$this->config['db.auth']}`.`realmlist`";
        $stmt = $this->db['auth']->query($sql);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        return $info;
    }
}
?>