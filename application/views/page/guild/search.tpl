<div id="content-header">
    <h1>Управление гильдиями</h1>
    <div class="btn-group"></div>
</div>
<div id="breadcrumb">
    <a href="?route=index/main" class="tip-bottom"><i class="icon-home"></i>Главная</a>
    <a href="#" class="current">Управление гильдиями</a>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-search"></i></span><h5>Поиск гильдии</h5></div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <form action="" method="POST" class="form-search">
                            <select selected="key" name="type" class="select">
                                <option value="name">Name</option>
                                <option value="guildid">id</option>
                            </select>
                            <div class="input-append">
                                <input type="text" name="guild" pattern="^([a-zA-Z\s]{2,24}|[а-яА-ЯёЁ\s]{2,24}|[0-9]{1,10})$" class="span10 search-query" />
                                <button type="submit" class="btn">Поиск</button>
                            </div>
                        </form>
                        <?php if ($guildInfo): ?>
                        <table class="table table-bordered">
                            <caption><b>Информация о гильдии <?php echo $guildInfo['name'] ?>:</b></caption>
                            <tbody>
                            <tr>
                                <td>id</td>
                                <td><?php echo $guildInfo['guildid']; ?></td>
                            </tr>
                            <tr>
                                <td>Название</td>
                                <td><?php echo $guildInfo['name'] ?></td>
                            </tr>
                            <tr>
                                <td>Лидер</td>
                                <td><?php echo $guildInfo['leader_name'] ?> ( id: <?php echo $guildInfo['leaderguid'] ?> )</td>
                            </tr>
                            <tr>
                                <td>Кол-во игроков</td>
                                <td><?php echo $guildInfo['count_member'] ?></td>
                            </tr>
                            <tr>
                                <td>Информация о гильдии</td>
                                <td><?php echo $guildInfo['info'] ?></td>
                            </tr>
                            <tr>
                                <td>Сообщение дня</td>
                                <td><?php echo $guildInfo['motd'] ?></td>
                            </tr>
                            <tr>
                                <td>Дата создания</td>
                                <td><?php echo $guildInfo['createdate'] ?></td>
                            </tr>
                            <tr>
                                <td>Денег в банке</td>
                                <td><?php echo $guildInfo['BankMoney'] ?></td>
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