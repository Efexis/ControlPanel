<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="application/views/css/style.css" />
        <link rel="stylesheet" href="application/views/css/bootstrap.min.css" /">
        <link rel="stylesheet" href="application/views/css/style.color.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="application/views/js/bootstrap.min.js"></script>
        <script src="application/views/js/menu.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
<body>
<div id="header">
    <div id="logo">Control Panel</div>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <li class="btn btn-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon icon-user"></i> <span id="accinfo" class="text">Профиль</span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <div id="acc-info">
                    <li>ID: <?php echo $accInfo['id']; ?></li>
                    <li>Аккуант: <?php echo $accInfo['username']; ?></li>
                    <li>E-mail: <?php echo $accInfo['email']; ?></li>
                    <li>Уровень: <?php echo $accInfo['gmlevel']; ?></li>
                    <li>IP: <?php echo $accInfo['ip']; ?></li>
                </div>
            </ul>
        </li>
        <li class="btn btn-inverse"><a title="" href="?route=auth/logout"><i class="icon icon-share-alt"></i><span class="text">Выйти</span></a></li>
    </ul>
</div>

<div id="sidebar">
    <ul>
        <li><a href="?route=index/main"><i class="icon icon-home"></i> <span>Главная</span></a></li>
        <li class="submenu">
            <a href="#"><i class="icon-th-list"></i> <span>Управление персонажами</span></a>
            <ul>
                <li><a href="?route=characters/search">Поиск персонажа</a></li>
                <li><a href="?route=characters/changename">Смена имени</a></li>
                <li><a href="?route=characters/changerace">Смена расы</a></li>
                <li><a href="?route=characters/changeclass">Смена класса</a></li>
                <li><a href="?route=characters/changelevel">Смена уровня</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon-th-list"></i> <span>Управление аккуантами</span></a>
            <ul>
                <li><a href="#">Поиск аккуанта</a></li>
                <li><a href="#">Редактирование аккуанта</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon-th-list"></i> <span>Управление командами</span></a>
            <ul>
                <li><a href="?route=team/search">Поиск команды</a></li>
                <li><a href="#">Редактирование команды</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="icon-th-list"></i> <span>Управление гильдиями</span></a>
            <ul>
                <li><a href="?route=guild/search">Поиск гильдии</a></li>
                <li><a href="#">Редактирование гильдии</a></li>
            </ul>
        </li>
    </ul>
</div>

<div id="content">
    <?php include 'application/views/'.$content_view; ?>
    <div class="row-fluid">
        <div id="footer" class="span12">
            2013 &copy; Control Panel. Development by <a href="https://github.com/Efexis/">Efex</a>
        </div>
    </div>
</div>
</body>
</html>