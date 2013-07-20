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
 
class AuthModel extends Model {

    public $error_message;

    public function isValidUser() {
        if ( isset($_POST['user'], $_POST['pass'], $_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha'] ) {
            if ( !empty($_POST['user']) && !empty($_POST['pass']) ) {
                if ( preg_match("/^[a-zA-Z0-9]+$/", $_POST['user']) &&
                     preg_match("/^\w*$/", $_POST['pass'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $sql = 'SELECT `a`.`id`, `a`.`username`, `a`.`email`, `aa`.`gmlevel`
                            FROM `'.$this->config['db.auth'].'`.`account` AS `a`
                            LEFT JOIN `'.$this->config['db.auth'].'`.`account_access` AS `aa` ON `aa`.`id` = `a`.`id`
                            WHERE `a`.`sha_pass_hash` = SHA1(CONCAT(UPPER("'.$user.'"),":",UPPER("'.$pass.'"))) AND
                                    `aa`.`gmlevel` >= ' . $this->config['cp.gmlevel'];
                    $result = $this->db['auth']->query($sql);

                    if ( $result->rowCount() == 1 ) {
                        $_SESSION['session'] = session_id();
                        $_SESSION['user'] = $user;

                        // информация об аккуанте
                        $_SESSION['accInfo'] =  $result->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['accInfo']['ip'] = $_SERVER['REMOTE_ADDR'];
                        header('Location: ?route=index/main');
                        exit;
                    } else {
                        $this->error_message = 'У вас недостаточно прав для входа';
                    }
                } else {
                    $this->error_message = 'Введены некорректные данные';
                }
            } else {
                $this->error_message = 'Заполните пожалуйста форму';
            }
        }
    }
}
?>
