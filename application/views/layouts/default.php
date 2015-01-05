<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo APP_NAME; ?> - Bug Tracking System</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/chosen.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/custom.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="/assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="/assets/js/chosen.jquery.min.js"></script>
    </head>
    <body class="skin-blue">

        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/dashboard" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php echo APP_NAME . ' v' . APP_VERSION; ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li style="font-weight:bold;background-color:#00c0ef;"><a style="color:white;" href="/issues/add"><i class="fa fa-plus"></i> New Issue</a></li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $auth_user->name; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="/assets/img/avatar6.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $auth_user->name; ?>
                                    </p>
                                </li>
                     
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/users/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->

            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="<?php if ('Dashboard' == $request->controller()) echo 'active'; ?>">
                            <a href="/dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="<?php if ('Issues' == $request->controller()) echo 'active'; ?>">
                            <a href="/issues">
                                <i class="fa fa-bug"></i> <span>Issues</span>
                            </a>
                        </li>
                        <?php if ($auth->logged_in('admin')): ?>
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-cog"></i> <span>Administration</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php if ('Users' == $request->controller()) echo 'active'; ?>">
                                        <a href="/users"><i class="fa fa-angle-double-right"></i> Users</a>
                                    </li>
                                    <li class="<?php if ('Roles' == $request->controller()) echo 'active'; ?>">
                                        <a href="/roles"><i class="fa fa-angle-double-right"></i> Roles</a>
                                    </li>
                                    <li class="<?php if ('Projects' == $request->controller()) echo 'active'; ?>">
                                        <a href="/projects"><i class="fa fa-angle-double-right"></i> Projects</a>
                                    </li>
                                    <li class="<?php if ('Departments' == $request->controller()) echo 'active'; ?>">
                                        <a href="/departments"><i class="fa fa-angle-double-right"></i> Departments</a>
                                    </li>
                                    <li class="<?php if ('Issue_Types' == $request->controller()) echo 'active'; ?>">
                                        <a href="/issue_types"><i class="fa fa-angle-double-right"></i> Issue Types</a>
                                    </li>
                                    <li class="<?php if ('Issue_Priorities' == $request->controller()) echo 'active'; ?>">
                                        <a href="/issue_priorities"><i class="fa fa-angle-double-right"></i> Issue Priorities</a>
                                    </li>
                                    <li class="<?php if ('Issue_Statuses' == $request->controller()) echo 'active'; ?>">
                                        <a href="/issue_statuses"><i class="fa fa-angle-double-right"></i> Issue Statuses</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <?php echo isset($content) ? $content : ''; ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

    </body>
</html>
