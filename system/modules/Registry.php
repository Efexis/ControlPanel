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

class Registry implements ArrayAccess{

    public  $data = array();

    private static $_instance;

    public static function getInstance() {
        if ( !( self::$_instance instanceOf self ) )
            self::$_instance = new self();
        return self::$_instance;
    }

    function offsetExists($offset) {
        return isset($this->data[$offset]);
    }

    function offsetGet($offset) {
        return $this->data[$offset];
    }

    function offsetSet($offset, $value) {
        if (isset($this->data[$offset]) == true) {

            throw new Exception('Не удалось установить переменную `{$offset}`');

        }
        $this->data[$offset] = $value;
    }

    function offsetUnset($offset) {
        unset($this->data[$offset]);
    }
}
?>