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
        $data['statRace'] = $this->model->getStatisticRace();
        $data['statClass']= $this->model->getStatisticClass();
        $data['realm'] =  $this->model->getRealmInfo();
        $data['max_uptime'] =  $this->model->getMaxUptimeInfo();
        $this->view->generate('index.tpl', 'page/main/main.tpl', $data);
    }
}
?>