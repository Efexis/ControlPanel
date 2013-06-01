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

class CharactersController {

    private $model, $view;

    public function __construct() {
        $this->model = new CharactersModel();
        $this->view = new View();
    }

    public function searchAction () {
        $data['charInfo'] = isset($_POST['character'], $_POST['type']) ? $this->model->searchChar($_POST['character'], $_POST['type']) : NULL;
        $data['message'] = $this->model->message;
        $this->view->generate('index.tpl', 'page/characters/search.tpl' , $data);
    }

    public function changeRaceAction () {
        if ( isset($_POST['character'], $_POST['race'], $_POST['type']) ) {
            $this->model->changeCharRace($_POST['character'], $_POST['race'], $_POST['type']);
        }
        $data['message'] = $this->model->message;
        $this->view->generate('index.tpl', 'page/characters/changerace.tpl' , $data);
    }
}
