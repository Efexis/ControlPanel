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

class IndexController {
    
    private $model, $view;

    public function __construct() {
        $this->model = new IndexModel();
        $this->view = new View();
    }
	
    public function mainAction() {
        $this->view->generate('index.tpl', 'page/main/main.tpl');
    }
}
?>