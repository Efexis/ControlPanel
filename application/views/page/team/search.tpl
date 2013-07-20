<div id="content-header">
    <h1>Управление командами арены</h1>
    <div class="btn-group"></div>
</div>
<div id="breadcrumb">
    <a href="?route=index/main" class="tip-bottom"><i class="icon-home"></i>Главная</a>
    <a href="#" class="current">Управление командами</a>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-search"></i></span><h5>Поиск команды</h5></div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <form action="" method="POST" class="form-search">
                            <select selected="key" name="type" class="select">
                                <option value="name">Name</option>
                                <option value="arenaTeamId">id</option>
                            </select>
                            <div class="input-append">
                                <input type="text" name="at" pattern="^([a-zA-Z\s]{2,24}|[а-яА-ЯёЁ\s]{2,24}|[0-9]{1,10})$" class="span10 search-query" />
                                <button type="submit" class="btn">Поиск</button>
                            </div>
                            <div style="margin: 10px 0";>Тип команды:</div>
                            <select selected="key" name="at_type" class="select">
                                <option value="2">2x2</option>
                                <option value="3">3x3</option>
                                <option value="5">5x5</option>
                            </select>
                        </form>
                        <?php if ($atInfo): ?>
                        <table class="table table-bordered">
                            <caption><b>Информация о команде <?php echo $atInfo['name'] ?>:</b></caption>
                            <tbody>
                            <tr>
                                <td>id</td>
                                <td><?php echo $atInfo['arenaTeamId']; ?></td>
                            </tr>
                            <tr>
                                <td>Название</td>
                                <td><?php echo $atInfo['name'] ?></td>
                            </tr>
                            <tr>
                                <td>Тип команды</td>
                                <td><?php echo $atInfo['type'] ?>x<?php echo $atInfo['type'] ?></td>
                            </tr>
                            <tr>
                                <td>Лидер</td>
                                <td><?php echo $atInfo['captain_name'] ?> ( id: <?php echo $atInfo['captainGuid'] ?> )</td>
                            </tr>
                            <tr>
                                <td>Рейтинг</td>
                                <td><?php echo $atInfo['rating'] ?></td>
                            </tr>
                            <tr>
                                <td>Ранг</td>
                                <td><?php echo $atInfo['rank'] ?></td>
                            </tr>
                            <tr>
                                <td>Всего боёв</td>
                                <td><?php echo $atInfo['seasonGames'] ?></td>
                            </tr>
                            <tr>
                                <td>Всего побед</td>
                                <td><?php echo $atInfo['seasonWins'] ?></td>
                            </tr>
                            <tr>
                                <td>Всего поражений</td>
                                <td><?php echo $atInfo['seasonGames'] - $atInfo['seasonWins'] ?></td>
                            </tr>
                            <tr>
                                <td>Игр за неделю</td>
                                <td><?php echo $atInfo['weekGames'] ?></td>
                            </tr>
                            <tr>
                                <td>Побед за неделю</td>
                                <td><?php echo $atInfo['weekWins'] ?></td>
                            </tr>
                            <tr>
                                <td>Поражений за неделю</td>
                                <td><?php echo $atInfo['weekGames'] - $atInfo['weekWins'] ?></td>
                            </tr>
                            </tbody>
                        </table>
                        Участники команды:
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>id</td>
                                    <td>Имя</td>
                                    <td>Проведено боёв</td>
                                    <td>Побед</td>
                                    <td>Поражений</td>
                                    <td>Игр за неделю</td>
                                    <td>Рейтинг</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach( $atInfo['member'] as $member ): ?>
                                <tr>
                                    <td><?php echo $member['guid'] ?></td>
                                    <td><?php echo $member['name'] ?></td>
                                    <td><?php echo $member['seasonGames'] ?></td>
                                    <td><?php echo $member['seasonWins'] ?></td>
                                    <td><?php echo $member['seasonGames']- $member['seasonWins'] ?></td>
                                    <td><?php echo $member['weekGames'] ?></td>
                                    <td><?php echo $member['personalRating'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                        <?php if ($message): ?>
                        <div class="span7">
                            <div class="alert alert-error">
                                <?php echo $message ?>
                                <a href="#" data-dismiss="alert" class="close">×</a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>