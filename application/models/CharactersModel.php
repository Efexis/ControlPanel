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

class CharactersModel extends Model {

    public $message;

    public function searchChar($char, $type) {
        if ( preg_match("/^[a-zA-Zа-яА-ЯёЁ0-9]+$/u", $char) && preg_match("/^[a-zA-Z]+$/u", $type) ) {
            $sql = "SELECT `guid`, `account`, `name`, `race`, `class`,
                            `gender`, `level`, `online`, `totaltime`,
                            `arenaPoints`, `totalHonorPoints`, `todayHonorPoints`,
                            `yesterdayHonorPoints`, `totalKills`, `todayKills`, `yesterdayKills`
                    FROM `{$this->config['db.char']}`.`characters`
                    WHERE `$type` = :char";
            $stmt = $this->db['char']->prepare($sql);
            $stmt->bindValue(':char', $char);
            $stmt->execute();
            $charInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            if ( $charInfo ) {
                include_once "system/modules/Arrays.php";
                $charInfo['faction'] = $faction[$charInfo['race']];
                $charInfo['race'] = $race[$charInfo['race']];
                $charInfo['class'] = $class[$charInfo['class']];
                $charInfo['gender'] = $gender[$charInfo['gender']];
                $charInfo['totaltime'] = $this->timeConvert($charInfo['totaltime']);
                $charInfo['online'] = $this->getOnlineChar($charInfo['online']);
                return  $charInfo;
            } else {
                $this->message = 'Персонаж с таким именем или id не найден';
            }
        } else {
            $this->message = 'Введены некорректные данные';
        }
    }

    public function getOnlineChar($online) {
        if ($online == 1)
            return "<font color=green>Online</font>";
        else
            return "<font color=red>Offline</font>";
    }
}
?>