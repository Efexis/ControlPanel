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

class FrontController {

    private $_controller, $_action;

    private  static $_instance;

    public static function getInstance() {
        if ( !( self::$_instance instanceOf self ) )
            self::$_instance = new self();
        return self::$_instance;
    }

    private function __construct() {
        // получение данных о контроллере и экшене
        if ( isset($_GET['route']) ){
            $route = $_GET['route'];
        } else {
            $route = 'index/main';
        }
        $splits = explode('/', $route);
        if ( preg_match("/^([a-zA-Z]+)\/([a-zA-Z]+)$/", $route) ) {
            // выбор контроллера
            $this->_controller = ucfirst($splits[0]) . 'Controller';
            // выбор экшена
            $this->_action = $splits[1] . 'Action';
        }  else {
            throw new Exception('Error page');
        }
    }

    public function route() {
        if ( class_exists($this->getController()) ) {
            $rc = new ReflectionClass($this->getController());
            if ( $rc->hasMethod($this->getAction()) ) {
                $controller = $rc->newInstance();
                $method = $rc->getMethod($this->getAction());
                $method->invoke($controller);
            } else {
                throw new Exception('Wrong Action');
            }
        } else {
            throw new Exception('Wrong Controller');
        }
    }

    public function getController() {
        return $this->_controller;
    }

    public function getAction() {
        return $this->_action;
    }
}
?>