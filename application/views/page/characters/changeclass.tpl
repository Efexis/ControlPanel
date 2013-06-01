<div id="content-header">
    <h1>Управление персонажами</h1>
    <div class="btn-group"></div>
</div>
<div id="breadcrumb">
    <a href="?route=index/main" class="tip-bottom"><i class="icon-home"></i>Главная</a>
    <a href="#" class="current">Управление персонажами</a>
    <a href="#" class="current">Смена класса</a>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-wrench"></i></span><h5>Смена расы</h5></div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <form action="" method="POST" class="form-search">
                            <div class="text">Введите имя или id персонажа:</div>
                            <select selected="key" name="type" class="select">
                                <option value="name">Name</option>
                                <option value="guid">id</option>
                            </select>
                            <input type="text" name="character" pattern="[a-zA-Zа-яА-ЯёЁ0-9]+$" class="input-medium search-query" />
                            <div class="text">Сменить на:</div>
                            <select selected="key" name="class" class="span2">
                                <option value="1">Воин</option>
                                <option value="2">Паладин</option>
                                <option value="3">Охотник</option>
                                <option value="4">Разбойник</option>
                                <option value="5">Жрец</option>
                                <option value="6">Рыцарь смерти</option>
                                <option value="7">Шаман</option>
                                <option value="8">Маг</option>
                                <option value="9">Чернокнижник</option>
                                <option value="11">Друид</option>
                            </select>
                            <input type="submit" class="btn" value="Сменить" />
                        </form>
                        <?php if ($message[1]): ?>
                        <div class="span7">
                            <div class="alert alert-success">
                                <?php echo $message[1] ?>
                                <a href="#" data-dismiss="alert" class="close">×</a>
                            </div>
                        </div>
                        <?php elseif ($message[0]): ?>
                        <div class="span7">
                            <div class="alert alert-error">
                                <?php echo $message[0] ?>
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