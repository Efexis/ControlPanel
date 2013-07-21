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
        if ( isset($_POST['account'], $_POST['type']) ) {
            $data['accInfo'] = $this->model->searchAccount($_POST['account'], $_POST['type']);
        } else if ( isset($_GET['account']) ) {
            $data['accInfo'] = $this->model->searchAccount($_GET['account'], 'id');
        } else {
            $data['accInfo'] = NULL;
        }

        $data['message'] = $this->model->message;
        $this->view->generate('index.tpl', 'page/account/search.tpl', $data);
    }

    public function lockedAction () {
        if ( isset($_POST['name'], $_POST['pk'], $_POST['value']) ) {
            if ( $_POST['name'] == 'locked' ) {
                $this->model->lockedAccount($_POST['pk'], $_POST['value']);
            }
        }
    }

    public function changeExpansionAction () {
        if ( isset($_POST['name'], $_POST['pk'], $_POST['value']) ) {
            if ( $_POST['name'] == 'expansion' ) {
                $this->model->changeExpansion($_POST['pk'], $_POST['value']);
            }
        }
    }
}
