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