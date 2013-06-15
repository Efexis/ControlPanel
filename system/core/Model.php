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

class Model {

    public $db, $config;

    public function __construct() {
        $registry = Registry::getInstance();
        $this->config = $registry['config'];
        $this->db['auth'] = $registry['db.auth'];;
        $this->db['char'] = $registry['db.char'];
    }

    public function timeConvert($time) {
        if ($time >= 86400)
            $t = date('zд Hч iм', $time);
        elseif ($time >= 3600)
            $t = date('Hч iм', $time);
        elseif ($time >= 60)
            $t = date('iм', $time);
        else
            $t = '01м';
        return $t;
    }

    public function goldConvert($copper) {
        if ( $copper == 0 ) {
            return 0;
        }
        $c = $copper % 100;
        $s = floor($copper / 100) % 100;
        $g = floor($copper / (100 * 100));

        return $g.'<img src="application/views/img/money/gold.png"></img> '.$s.'<img src="application/views/img/money/silver.png"></img> '.$c.'<img src="application/views/img/money/copper.png"></img>';
    }
}
?>