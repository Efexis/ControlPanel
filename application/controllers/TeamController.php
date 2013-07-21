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

class TeamController {

    private $model, $view;

    public function __construct() {
        $this->model = new TeamModel();
        $this->view = new View();
    }

    public function searchAction() {
        if ( isset($_POST['at'], $_POST['at_type'], $_POST['type']) ) {
            $data['atInfo'] = $this->model->searchTeam($_POST['at'], $_POST['at_type'], $_POST['type']);
        } else if ( isset($_GET['team'], $_GET['type']) ) {
            $data['atInfo'] = $this->model->searchTeam($_GET['team'], $_GET['type'], 'arenaTeamId');
        } else {
            $data['atInfo'] = NULL;
        }

        $data['message'] = $this->model->message;
        $this->view->generate('index.tpl', 'page/team/search.tpl', $data);
    }
}
