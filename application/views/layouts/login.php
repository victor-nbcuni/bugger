<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo APP_NAME; ?> | Log In</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" href="/assets/libs/bootstrap-3.3.1/css/bootstrap.min.css">
        <link href="/assets/libs/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
            html, body {
                background: #f1f1f1;
            }

            #login-box {
              width: 400px;
              margin: 90px auto 0 auto;
            }

            #login-box form {
                margin-top: 20px;
                margin-left: 0;
                margin-bottom: 100px;
                padding: 26px 24px 46px;
                font-weight: 400;
                overflow: hidden;
                background: #fff;
                -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
                box-shadow: 0 1px 3px rgba(0,0,0,.13);
            }

            #login-box .header {
                text-align: center;
                font-size: 60px;
                font-weight: bold;
                color: #444;
            }

            #login-box .form-group i {
                color: #CCCCCC;
                display: block !important;
                font-size: 20px;
                height: 16px;
                margin: 16px 2px 4px 10px;
                position: absolute !important;
                text-align: center;
                width: 16px;
                z-index: 1;
            }

            #login-box .form-group input {
                font-size: 20px;
                padding: 25px 25px 25px 40px;
            }

            #login-box button {
                font-size: 20px;
                background: #3c8dbc;
                color: #fff;
            }

            #login-box .alert {
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <div id="login-box">
            <div class="header"><?php echo APP_LOGO; ?></div>
            <?php if ($error = Session::instance()->getFlash()): ?>
                <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> <?php echo $error['message']; ?></div>
            <?php endif; ?>

            <form action="/login" method="post">
                <div class="body">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <input type="text" name="username" class="form-control" placeholder="Email or SSO" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn btn-block">Log In</button>                  
                </div>
            </form>
        </div>
    </body>
</html>