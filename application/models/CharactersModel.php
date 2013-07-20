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
        if ( preg_match("/^([a-zA-Z]{2,12}|[а-яА-ЯёЁ]{2,12}|[0-9]{1,10})$/u", $char) && preg_match("/^[a-zA-Z]+$/u", $type) ) {
            $sql = 'SELECT `guid`, `account`, `name`, `race`, `class`,
                            `gender`, `level`, `money`, `online`, `totaltime`,
                            `arenaPoints`, `totalHonorPoints`, `todayHonorPoints`,
                            `yesterdayHonorPoints`, `totalKills`, `todayKills`, `yesterdayKills`, `zone`
                    FROM `'.$this->config['db.char'].'`.`characters`
                    WHERE `'.$type.'` = :char';
            $stmt = $this->db['char']->prepare($sql);
            $stmt->bindValue(':char', $char);
            $stmt->execute();
            $charInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            if ( $charInfo ) {
                include_once "system/modules/Arrays.php";
                $charInfo['faction'] = $faction[$charInfo['race']];
                $charInfo['race'] = $race[$charInfo['race']];
                $charInfo['class'] = $class[$charInfo['class']];
                $charInfo['money'] = $this->goldConvert($charInfo['money']);
                $charInfo['gender'] = $gender[$charInfo['gender']];
                $charInfo['zone'] = $zone[$charInfo['zone']];
                $charInfo['totaltime'] = $this->timeConvert($charInfo['totaltime']);
                $charInfo['online'] = $online[$charInfo['online']];
                return  $charInfo;
            } else {
                $this->message = 'Персонаж с таким именем или id не найден';
            }
        } else {
            $this->message = 'Введены некорректные данные';
        }
    }

    public function changeCharName($char, $name) {
        if ( preg_match("/^[0-9]+$/", $char) && preg_match("/^([a-zA-Z]{2,12}|[а-яА-ЯёЁ]{2,12})$/u", $name) ) {
            $sql = 'UPDATE `'.$this->config['db.char'].'`.`characters`
                    SET `name` = :name
                    WHERE `guid` = :char';
            $stmt = $this->db['char']->prepare($sql);

            // устанавливаем нужный регистр
            mb_internal_encoding("UTF-8");
            $name = mb_strtoupper(mb_substr($name,0,1)).mb_strtolower(mb_substr($name,1));

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':char', $char);
            $stmt->execute();
        }
    }

    public function changeCharRace($char, $race) {
        if ( preg_match("/^[0-9]+$/", $char) && ($race > 0 && $race < 9) ) {
            $sql = 'UPDATE `'.$this->config['db.char'].'`.`characters`
                    SET `race` = :race
                    WHERE `guid` = :char';
            $stmt = $this->db['char']->prepare($sql);
            $stmt->bindValue(':race', (int)$race);
            $stmt->bindValue(':char', $char);
            $stmt->execute();
        }
    }

    public function changeCharClass($char, $class) {
        if ( preg_match("/^[0-9]+$/", $char) && ($class > 0 && $class < 12 && $class != 10) ) {
            $sql = 'UPDATE `'.$this->config['db.char'].'`.`characters`
                    SET `class` = :class
                    WHERE `guid` = :char';
            $stmt = $this->db['char']->prepare($sql);
            $stmt->bindValue(':class', $class);
            $stmt->bindValue(':char', $char);
            $stmt->execute();
        }
    }

    public function changeCharLevel($char, $level) {
        if ( preg_match("/^[0-9]+$/", $char) && ($level > 0 && $level < 256) ) {
            $sql = 'UPDATE `'.$this->config['db.char'].'`.`characters`
                    SET `level` = :level
                    WHERE `guid` = :char';
            $stmt = $this->db['char']->prepare($sql);
            $stmt->bindValue(':level', $level);
            $stmt->bindValue(':char', $char);
            $stmt->execute();
        }
    }
}
?>