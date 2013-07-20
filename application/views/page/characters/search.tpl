<script src="application/views/js/page/characters.js"></script>
<div id="content-header">
    <h1>Управление персонажами</h1>
    <div class="btn-group"></div>
</div>
<div id="breadcrumb">
    <a href="?route=index/main" class="tip-bottom"><i class="icon-home"></i>Главная</a>
    <a href="#" class="current">Управление персонажами</a>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-search"></i></span><h5>Поиск персонажа</h5></div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <form action="?route=characters/search" method="POST" class="form-search">
                            <select selected="key" name="type" class="select">
                                <option value="name">Name</option>
                                <option value="guid">id</option>
                            </select>
                            <div class="input-append">
                                <input type="text" name="character" pattern="^([a-zA-Z]{2,12}|[а-яА-ЯёЁ]{2,12}|[0-9]{1,10})$" class="span10 search-query" />
                                <button type="submit" class="btn">Поиск</button>
                            </div>
                        </form>
                        <?php if ($charInfo): ?>
                        <table class="table table-bordered">
                            <caption><b>Информация о персонаже <?php echo $charInfo['name'] ?>:</b></caption>
                            <tbody>
                            <tr>
                                <td>id</td>
                                <td><?php echo $charInfo['guid']; ?></td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td><a href="#" id="name" data-pk="<?php echo $charInfo['guid']; ?>"><?php echo $charInfo['name'] ?></a></td>
                            </tr>
                            <tr>
                                <td>Аккуант</td>
                                <td><?php echo $charInfo['account'] ?></td>
                            </tr>
                            <tr>
                                <td>Фракция</td>
                                <td><?php echo $charInfo['faction'] ?></td>
                            </tr>
                            <tr>
                                <td>Раса</td>
                                <td><a href="#" id="race" data-pk="<?php echo $charInfo['guid']; ?>"><?php echo $charInfo['race'] ?></a></td>
                            </tr>
                            <tr>
                                <td>Класс</td>
                                <td><a href="#" id="class" data-pk="<?php echo $charInfo['guid']; ?>"><?php echo $charInfo['class'] ?></a></td>
                            </tr>
                            <tr>
                                <td>Пол</td>
                                <td><?php echo $charInfo['gender'] ?></td>
                            </tr>
                            <tr>
                                <td>Уровень</td>
                                <td><a href="#" id="level" data-pk="<?php echo $charInfo['guid']; ?>"><?php echo $charInfo['level'] ?></a></td>
                            </tr>
                            <tr>
                                <td>Денег</td>
                                <td><?php echo $charInfo['money'] ?></td>
                            </tr>
                            <tr>
                                <td>Проведенно времени в игре</td>
                                <td><?php echo $charInfo['totaltime'] ?></td>
                            </tr>
                            <tr>
                                <td>Очков арены</td>
                                <td><?php echo $charInfo['arenaPoints'] ?></td>
                            </tr>
                            <tr>
                                <td>Очков чести(всего)</td>
                                <td><?php echo $charInfo['totalHonorPoints'] ?></td>
                            </tr>
                            <tr>
                                <td>Очков чести(сегодня)</td>
                                <td><?php echo $charInfo['todayHonorPoints'] ?></td>
                            </tr>
                            <tr>
                                <td>Очков чести(вчера)</td>
                                <td><?php echo $charInfo['yesterdayHonorPoints'] ?></td>
                            </tr>
                            <tr>
                                <td>PvP убийств(всего)</td>
                                <td><?php echo $charInfo['totalKills'] ?></td>
                            </tr>
                            <tr>
                                <td>PvP убийств(сегодня)</td>
                                <td><?php echo $charInfo['todayKills'] ?></td>
                            </tr>
                            <tr>
                                <td>PvP убийств(вчера)</td>
                                <td><?php echo $charInfo['yesterdayKills'] ?></td>
                            </tr>
                            <tr>
                                <td>Локация</td>
                                <td><?php echo $charInfo['zone'] ?></td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <td><?php echo $charInfo['online'] ?></td>
                            </tr>
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