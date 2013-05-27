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
error_reporting(0);

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

$registry = Registry::getInstance();
$registry['config'] =  parse_ini_file('config.ini');

// Устанавливаем соединение с БД
try {
    $registry['db.char'] = new PDO("mysql:host={$registry['config']['db.host']};port={$registry['config']['db.port']};dbname={$registry['config']['db.char']};charset=utf8",
        $registry['config']['db.user'], $registry['config']['db.pass'],
        array(PDO::ATTR_PERSISTENT => true));
    $registry['db.auth'] = new PDO("mysql:host={$registry['config']['db.host']};port={$registry['config']['db.port']};dbname={$registry['config']['db.auth']};charset=utf8",
        $registry['config']['db.user'], $registry['config']['db.pass'],
        array(PDO::ATTR_PERSISTENT => true));
} catch(PDOException $e) {
    echo $e->getMessage();
    exit;
}

// Запуск
$front = FrontController::getInstance();
$front->route();
?>