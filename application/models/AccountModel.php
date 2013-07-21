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
 
class AccountModel extends Model {

    public $message;

    public function searchAccount($acc, $type) {
        if ( preg_match("/^[a-zA-Z0-9_-]+$/u", $acc) && preg_match("/^[a-zA-Z]+$/u", $type) ) {
            $sql = 'SELECT `aa`.`gmlevel`, `a`.`id`, `a`.`username`, `a`.`email`, `a`.`joindate`, `a`.`last_ip`,
                            `a`.`locked`, `a`.`last_login`, `a`.`online`, `a`.`expansion`
                    FROM `'.$this->config['db.auth'].'`.`account` AS `a`
                    LEFT JOIN `'.$this->config['db.auth'].'`.`account_access` AS `aa` ON `aa`.`id` = `a`.`id`
                    WHERE `a`.`'.$type.'` = :acc';
            $stmt = $this->db['auth']->prepare($sql);
            $stmt->bindValue(':acc', $acc);
            $stmt->execute();
            $accInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            if ( $accInfo ) {
                include_once "system/modules/Arrays.php";
                $accInfo['gmlevel'] = $accInfo['gmlevel'] ? $accInfo['gmlevel'] : 0;
                $accInfo['online'] = $online[$accInfo['online']];
                $accInfo['expansion'] = $expansion[$accInfo['expansion']];
                $accInfo['locked'] = $accInfo['locked'] == 1 ? 'Да' : 'Нет';
                return  $accInfo;
            } else {
                $this->message = 'Аккуант с таким логином или id не найден';
            }
        } else {
            $this->message = 'Введены некорректные данные';
        }
    }
}
?>
