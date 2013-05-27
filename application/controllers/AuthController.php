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
 
class AuthController {
    
    public function loginAction() {
        $view = new View();
        $model = new AuthModel();
        $model->isValidUser();
        $data['error_message'] = $model->error_message;
        $view->generate('login.tpl', NULL, $data);
    }

    public function logoutAction() {
        unset($_SESSION['session']);
        unset($_SESSION['user']);
        header('Location: ?route=index/index');
        exit;
    }
}
?>