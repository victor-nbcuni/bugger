<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo APP_NAME; ?> | Log In</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="/assets/libs/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/libs/bootstrap-3.3.1/css/bootstrap.min.css">
    <link href="/assets/libs/adminlte/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><?php echo '<b>' . APP_NAME . '</b> v' . APP_VERSION; ?></a>
        </div>
        <?php if ($error = Session::instance()->getFlash()): ?>
            <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> <?php echo $error['message']; ?></div>
        <?php endif; ?>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="/login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Your Email" value="<?php echo (isset($_POST['username']) ? $_POST['username'] : ''); ?>"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Your Password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <audio autoplay>
        <source src="/assets/eott.mp3" type="audio/ogg">
        Your browser does not support the audio element.
    </audio>
</body>
</html>
