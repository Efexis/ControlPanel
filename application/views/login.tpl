<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="application/views/css/login.css" />
        <link rel="stylesheet" href="application/views/css/bootstrap.min.css" />
        <link href="captcha/captcha.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
        <script src="application/views/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="captcha/jquery.captcha.js"></script>
        <script type="text/javascript">
        $(function() {
            $(".ajax-fc-container").captcha({
                formId: "auth",
                text: "Найдите эту картинку ниже<br /><span>scissors</span> и переместите в круг"
            });
        });
        </script>
    </head>
<body>
<div class="container">
    <form id="auth" class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Авторизация</h2>
        <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span><input type="text" class="input-block-level" name="user" placeholder="Login">
        </div>
        <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span><input type="password" class="input-block-level" name="pass" placeholder="Password">
        </div>
        <div class="ajax-fc-container"></div>
        <p><button class="btn btn-large btn-primary" type="submit">Войти</button></p>
    </form>
    <?php if ($data['error_message']): ?>
    <div class="span4" id="login-error">
        <div class="alert alert-error">
            <h4>Ошибка!</h4>
            <?php echo $error_message; ?>
            <a href="#" data-dismiss="alert" class="close">×</a>
        </div>
    </div>
    <?php endif; ?>
</div>
</body>
</html>