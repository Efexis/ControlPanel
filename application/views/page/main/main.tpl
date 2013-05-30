<div id="content-header">
    <h1>Главная</h1>
    <div class="btn-group"></div>
</div>
<div id="breadcrumb">
    <a href="#" class="tip-bottom"><i class="icon-home"></i>Главная</a>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Информация</h5></div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-signal"></i>
                                </span>
                                    <h5>Общая статистика</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <ul class="recent-posts">
                                        <li>Название реалма: <?php echo $realm['name'] ?></li>
                                        <li>Адрес реалма: <?php echo $realm['address'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-signal"></i>
                                </span>
                                    <h5>Статистика по классам</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <ul class="recent-posts">
                                        <?php foreach($statClass as $value): ?>
                                            <li><?php echo $value['class'] . ' : ' . $value['count']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-signal"></i>
                                </span>
                                    <h5>Статистика по расам</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <ul class="recent-posts">
                                        <?php foreach($statRace as $value): ?>
                                            <li><?php echo $value; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
