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
        if ( isset($_POST['character'], $_POST['type']) ) {
            $data['charInfo'] = $this->model->searchChar($_POST['character'], $_POST['type']);
        } else if ( isset($_GET['character']) ) {
            $data['charInfo'] = $this->model->searchChar($_GET['character'], 'guid');
        } else {
            $data['charInfo'] = NULL;
        }

        $data['message'] = $this->model->message;
        $this->view->generate('index.tpl', 'page/characters/search.tpl' , $data);
    }

    public function changeNameAction () {
        if ( isset($_POST['name'], $_POST['pk'], $_POST['value']) ) {
            if ( $_POST['name'] == 'name' ) {
                $this->model->changeCharName($_POST['pk'], $_POST['value']);
                $this->model->redirect('characters/search', 'character=' . $_POST['pk']);
            }
        }
    }

    public function changeRaceAction () {
        if ( isset($_POST['name'], $_POST['pk'], $_POST['value']) ) {
            if ( $_POST['name'] == 'race' ) {
                $this->model->changeCharRace($_POST['pk'], $_POST['value']);
                $this->model->redirect('characters/search', 'character=' . $_POST['pk']);
            }
        }
    }

    public function changeClassAction () {
        if ( isset($_POST['name'], $_POST['pk'], $_POST['value']) ) {
            if ( $_POST['name'] == 'class' ) {
                $this->model->changeCharClass($_POST['pk'], $_POST['value']);
            }
        }
    }

    public function changeLevelAction () {
        if ( isset($_POST['name'], $_POST['pk'], $_POST['value']) ) {
            if ( $_POST['name'] == 'level' ) {
                $this->model->changeCharLevel($_POST['pk'], $_POST['value']);
            }
        }
    }
}
