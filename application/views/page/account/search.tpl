<div id="content-header">
    <h1>Управление аккуантами</h1>
    <div class="btn-group"></div>
</div>
<div id="breadcrumb">
    <a href="?route=index/main" class="tip-bottom"><i class="icon-home"></i>Главная</a>
    <a href="#" class="current">Управление аккуантами</a>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-search"></i></span><h5>Поиск аккуанта</h5></div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <form action="" method="POST" class="form-search">
                            <select selected="key" name="type" class="select">
                                <option value="username">Name</option>
                                <option value="id">id</option>
                            </select>
                            <div class="input-append">
                                <input type="text" name="account" pattern="^([a-zA-Z]{1,32}|[0-9]{1,10})$" class="span10 search-query" />
                                <button type="submit" class="btn">Поиск</button>
                            </div>
                        </form>
                        <?php if ($accInfo): ?>
                        <table class="table table-bordered">
                            <caption><b>Информация об аккуанте <?php echo $accInfo['username'] ?>:</b></caption>
                            <tbody>
                            <tr>
                                <td>id</td>
                                <td><?php echo $accInfo['id'] ?></td>
                            </tr>
                            <tr>
                                <td>Логин</td>
                                <td><?php echo $accInfo['username'] ?></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><?php echo $accInfo['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Уровень</td>
                                <td><?php echo $accInfo['gmlevel'] ?></td>
                            </tr>
                            <tr>
                                <td>Дата создания</td>
                                <td><?php echo $accInfo['joindate'] ?></td>
                            </tr>
                            <tr>
                                <td>Последний IP</td>
                                <td><?php echo $accInfo['last_ip'] ?></td>
                            </tr>
                            <tr>
                                <td>Последний вход</td>
                                <td><?php echo $accInfo['last_login'] ?></td>
                            </tr>
                            <tr>
                                <td>Дополнение</td>
                                <td><?php echo $accInfo['expansion'] ?></td>
                            </tr>
                            <tr>
                                <td>Привязан к IP</td>
                                <td><?php echo $accInfo['locked'] ?></td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <td><?php echo $accInfo['online'] ?></td>
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