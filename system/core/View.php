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

class View {

    public function generate($template_view, $content_view = null , $data = null) {
        if ( is_array($data) ) {
            // преобразуем элементы массива в переменные
            extract($data);
        }

        $registry = Registry::getInstance();
        // получаем заголовок страницы
        $title = $registry['config']['cp.title'];

        include 'application/views/'.$template_view;
    }
}
?>