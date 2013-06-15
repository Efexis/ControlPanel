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
        $data['guildInfo'] = isset($_POST['guild'], $_POST['type']) ? $this->model->searchGuild($_POST['guild'], $_POST['type']) : NULL;
        $data['message'] = $this->model->message;
        $this->view->generate('index.tpl', 'page/guild/search.tpl' , $data);
    }
}
?>