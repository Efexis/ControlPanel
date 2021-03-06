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

class GuildController {

    private $model, $view;

    function __construct() {
        $this->model = new GuildModel();
        $this->view = new View();
    }

    public function searchAction() {
        if ( isset($_POST['guild'], $_POST['type']) ) {
            $data['guildInfo'] = $this->model->searchGuild($_POST['guild'], $_POST['type']);
        } else if ( isset($_GET['guild']) ) {
            $data['guildInfo'] = $this->model->searchGuild($_GET['guild'], 'guildid');
        } else {
            $data['guildInfo'] = NULL;
        }

        $data['message'] = $this->model->message;
        $this->view->generate('index.tpl', 'page/guild/search.tpl' , $data);
    }

    public function changeNameAction () {
        if ( isset($_POST['name'], $_POST['pk'], $_POST['value']) ) {
            if ( $_POST['name'] == 'name' ) {
                $this->model->changeGuildName($_POST['pk'], $_POST['value']);
                $this->model->redirect('guild/search', 'guild=' . $_POST['pk']);
            }
        }
    }
}
?>