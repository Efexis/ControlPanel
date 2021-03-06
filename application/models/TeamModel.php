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

class TeamModel extends Model{

    public $message;

    public function searchTeam($at, $at_type, $type) {
        $at = trim($at);
        if ( preg_match("/^([a-zA-Z\s]{2,24}|[а-яА-ЯёЁ\s]{2,24}|[0-9]{1,10})$/u", $at) && preg_match("/^[a-zA-Z]+$/u", $type) ) {
            $sql = 'SELECT `c`.`name` as `captain_name`, `at`.`arenaTeamId`, `at`.`name`, `at`.`captainGuid`, `at`.`type`, `at`.`rating`, `at`.`seasonGames`, `at`.`seasonWins`, `at`.`weekGames`, `at`.`weekWins`, `at`.`rank`
                    FROM `'.$this->config['db.char'].'`.`arena_team` as `at`
                    JOIN `'.$this->config['db.char'].'`.`characters` AS `c` ON `c`.`guid` = `at`.`captainGuid`
                    WHERE `at`.`'.$type.'` = :at';
            if ( $type == 'arenaTeamId' ) {
                $stmt = $this->db['char']->prepare($sql);
            } else {
                $sql .= 'AND `type` = :type';
                $stmt = $this->db['char']->prepare($sql);
                $stmt->bindValue(':type', (int)$at_type);
            }
            $stmt->bindValue(':at', $at);
            $stmt->execute();
            $atInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            if ( $atInfo ) {
                // получаем информацию о игроках состоящих в команде
                $sql = 'SELECT  `c`.`name`,`atm`.`guid`, `atm`.`seasonGames`, `atm`.`seasonWins`, `atm`.`weekGames`, `atm`.`personalRating`
                        FROM `'.$this->config['db.char'].'`.`arena_team_member` as `atm`
                        JOIN `'.$this->config['db.char'].'`.`characters` AS `c` ON `c`.`guid` = `atm`.`guid`
                        WHERE `arenaTeamId` =' . $atInfo['arenaTeamId'];
                $stmt = $this->db['char']->query($sql);
                $atInfo['member'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // возвращаем массив с данными
                return  $atInfo;
            } else {
                $this->message = 'Команда с таким названием или id не найдена';
            }
        } else {
            $this->message = 'Введены некорректные данные';
        }
    }

    public function changeTeamName($team, $name) {
        if ( preg_match("/^[0-9]+$/", $team) && preg_match("/^([a-zA-Z\s]{2,24}|[а-яА-ЯёЁ\s]{2,24})$/u", $name) ) {
            $sql = 'UPDATE `'.$this->config['db.char'].'`.`arena_team`
                    SET `name` = :name
                    WHERE `arenaTeamId` = :team';
            $stmt = $this->db['char']->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':team', $team);
            $stmt->execute();
        }
    }
}
