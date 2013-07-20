<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="application/views/css/style.css" />
        <link rel="stylesheet" href="application/views/css/bootstrap.min.css" /">
        <link rel="stylesheet" href="application/views/css/style.color.css" />
        <link rel="stylesheet" href="application/views/css/bootstrap-editable.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="application/views/js/bootstrap.min.js"></script>
        <script src="application/views/js/bootstrap-editable.min.js"></script>
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
                    <li>ID: <?php echo $profile['id']; ?></li>
                    <li>Аккуант: <?php echo $profile['username']; ?></li>
                    <li>E-mail: <?php echo $profile['email']; ?></li>
                    <li>Уровень: <?php echo $profile['gmlevel']; ?></li>
                    <li>IP: <?php echo $profile['ip']; ?></li>
                </div>
            </ul>
        </li>
        <li class="btn btn-inverse"><a title="" href="?route=auth/logout"><i class="icon icon-share-alt"></i><span class="text">Выйти</span></a></li>
    </ul>
</div>

<div id="sidebar">
    <ul>
        <li><a href="?route=index/main"><i class="icon icon-home"></i> <span>Главная</span></a></li>
        <li><a href="?route=characters/search"><i class="icon-th-list"></i> <span>Управление персонажами</span></a></li>
        <li><a href="?route=account/search"><i class="icon-th-list"></i> <span>Управление аккуантами</span></a></li>
        <li><a href="?route=team/search"><i class="icon-th-list"></i> <span>Управление командами</span></a></li>
        <li><a href="?route=guild/search"><i class="icon-th-list"></i> <span>Управление гильдиями</span></a></li>
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