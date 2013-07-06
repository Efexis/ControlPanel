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

class AccountController {

    private $model, $view;

    public function __construct() {
        $this->model = new AccountModel();
        $this->view = new View();
    }

    public function searchAction () {
        $data['accInfo'] = isset($_POST['account'], $_POST['type']) ? $this->model->searchAccount($_POST['account'], $_POST['type']) : NULL;
        $data['message'] = $this->model->message;
        $this->view->generate('index.tpl', 'page/account/search.tpl', $data);
    }
}
