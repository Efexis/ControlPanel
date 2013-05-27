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
}
?>