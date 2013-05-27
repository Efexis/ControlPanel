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

session_start();

set_include_path(get_include_path()
                    .PATH_SEPARATOR. dirname(__FILE__) . '/application/controllers'
                    .PATH_SEPARATOR. dirname(__FILE__) . '/application/models'
                    .PATH_SEPARATOR. dirname(__FILE__) . '/application/views'
                    .PATH_SEPARATOR. dirname(__FILE__) . '/system/core'
                    .PATH_SEPARATOR. dirname(__FILE__) . '/system/modules'
);

function __autoload($class) {
    @include_once $class . '.php';
}

// Запуск
$front = FrontController::getInstance();
$front->route();
?>