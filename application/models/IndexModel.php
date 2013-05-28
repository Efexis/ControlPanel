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
        for ($i = 0; $i <= 9 ; ++$i) {
            $stat[$i]['race'] = $stat_man[$i]['race'];
            $stat[$i]['count_man'] = $stat_man[$i]['count_man'];
            $stat[$i]['count_woman'] = $stat_woman[$i]['count_woman'];
        }
        // формируем массив для вывода
        foreach ($stat as $st) {
            $all = $st['count_man'] + $st['count_woman'];
            $str = $race[$st['race']] . ' : ' . $all;
            $str .= ' ( '. $raceImgM[$st['race']] . $st['count_man'] .' | '. $raceImgW[$st['race']] . $st['count_woman'] .' )';
            $arr[] = $str;
        }
        return $arr;
    }

    public function getStatisticClass () {
        $sql = "SELECT `class`, count(`class`) AS `count`
                FROM `{$this->config['db.char']}`.`characters`
                GROUP BY `class`";
        $stmt = $this->db['char']->query($sql);
        $stat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "system/modules/Arrays.php";
        foreach ($stat as $key => $value) {
            $statClass[$key]['class'] = $classImg[$value['class']];
            $statClass[$key]['count'] = $value['count'];
        }
        return $statClass;
    }
}
?>