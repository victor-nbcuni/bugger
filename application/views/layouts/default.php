<?php $currentPage = $request->currentPage(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo APP_NAME; ?> - Bug Tracking System</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="stylesheet" href="/assets/lib/bootstrap-3.3.1/css/bootstrap.min.css">
        <link href="/assets/lib/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/lib/ionicons.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="/assets/lib/jquery-2.1.3.min.js"></script>
        <script src="/assets/lib/bootstrap-3.3.1/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Datatables -->
        <link href="/assets/lib/datatables-1.10.4/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <script src="/assets/lib/datatables-1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>

        <?php if ($currentPage == 'users/new' || $currentPage == 'users/edit'): ?>
            <!-- Chosen Dropdown -->
            <link href="/assets/lib/chosen-1.3.0/chosen.min.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/lib/chosen-1.3.0/chosen.jquery.min.js"></script>
        <?php endif; ?>

        <?php if ($currentPage == 'issues/view'): ?>
            <!-- X-Editable -->
            <link href="/assets/lib/x-editable-1.5.0/css/bootstrap-editable.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/lib/x-editable-1.5.0/js/bootstrap-editable.min.js"></script>
        <?php endif; ?>

        <?php if ($currentPage == 'issues/index' || $currentPage == 'issues/reported_by_me'): ?>
            <!-- Multiselect Dropdown -->
            <link href="/assets/lib/bootstrap-multiselect/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/lib/bootstrap-multiselect/bootstrap-multiselect.js"></script>
            <!-- JQuery Deserialize -->
            <script src="/assets/lib/jquery.deserialize.min.js"></script>
        <?php endif; ?>

        <?php if ($currentPage == 'issues/new'): ?>
            <!-- Datepicker -->
            <link href="/assets/lib/bootstrap-datepicker-1.3.1/datepicker.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/lib/bootstrap-datepicker-1.3.1/bootstrap-datepicker.js"></script>
        <?php endif; ?>

        <?php if ($currentPage == 'issues/view' || $currentPage == 'issues/new'): ?>
            <!-- Dropzone -->
            <link href="/assets/lib/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/lib/dropzone/dropzone.min.js"></script>
        <?php endif; ?>

        <?php if ($currentPage == 'issues/view'): ?>
            <!-- FancyBox -->
            <link href="/assets/lib/fancybox-2.1.5/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/lib/fancybox-2.1.5/jquery.fancybox.pack.js"></script>
        <?php endif; ?>

        <?php if ($currentPage == 'dashboard/index'): ?>
            <!-- Morris Charts -->
            <link href="/assets/lib/morris/morris.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/lib/morris/morris.min.js"></script>
            <script src="/assets/lib/flot/jquery.flot.min.js"></script>
            <script src="/assets/lib/flot/jquery.flot.pie.min.js"></script>
        <?php endif; ?>

        <!-- Parsley Form Validation -->
        <link href="/assets/lib/parsley-2.0.6/parsley.css" rel="stylesheet" type="text/css"/>
        <script src="/assets/lib/parsley-2.0.6/parsley.min.js"></script>

        <!-- APP -->
        <link href="/assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.css" rel="stylesheet" type="text/css" />
        <script src="/assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </head>
    <body class="skin-blue">

        <?php echo $session->getFlashHtml(); ?>

        <header class="header">
            <a href="/dashboard" class="logo">
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
                        <li style="font-weight:bold;background-color:#00c0ef;" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-plus"></i> New <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/issues/new">Ticket</a></li>
                            </ul>
                        </li>
                        <!--
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
          
                    
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        
                        <li style="font-weight:bold;background-color:#00c0ef;"><a style="color:white;" href="/issues/new"><i class="fa fa-plus"></i> New Issue</a></li>
                        -->

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $auth_user->name; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header bg-light-blue">
                                    <img src="/assets/img/avatar8.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $auth_user->name; ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
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
                        <li class="treeview active">
                            <a href="/issues">
                                <i class="fa fa-bug"></i> <span>Tickets</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if ( ! $auth->logged_in('admin')): ?>
                                    <li class="<?php if ('reported_by_me' == $request->action() &&  $auth->logged_in('admin')) echo 'active'; ?>">
                                        <a href="/issues/reported_by_me#reporter_user_id%5B%5D=<?php echo $auth_user->id; ?>">
                                            <i class="fa fa-angle-double-right"></i> Reported by Me
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li class="<?php if ($currentPage == 'issues/index') echo 'active'; ?>">
                                    <a href="/issues">
                                        <i class="fa fa-angle-double-right"></i> All Tickets
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($auth->logged_in('admin')): ?>
                            <li class="treeview <?php if (is_subclass_of('Controller_' . $request->controller(), 'Controller_Abstract_Admin')) echo 'active'; ?>">
                                <a href="#">
                                    <i class="fa fa-cog"></i> <span>Administration</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php if ('Users' == $request->controller()) echo 'active'; ?>">
                                        <a href="/users"><i class="fa fa-angle-double-right"></i> Users</a>
                                    </li>
                                    <li class="<?php if ('Roles' == $request->controller()) echo 'active'; ?>">
                                        <a href="/roles"><i class="fa fa-angle-double-right"></i> User Roles</a>
                                    </li>
                                    <li class="<?php if ('Projects' == $request->controller()) echo 'active'; ?>">
                                        <a href="/projects"><i class="fa fa-angle-double-right"></i> Projects</a>
                                    </li>
                                    <li class="<?php if ('Departments' == $request->controller()) echo 'active'; ?>">
                                        <a href="/departments"><i class="fa fa-angle-double-right"></i> Departments</a>
                                    </li>
                                    <li class="<?php if ('Issue_Types' == $request->controller()) echo 'active'; ?>">
                                        <a href="/issue_types"><i class="fa fa-angle-double-right"></i> Ticket Types</a>
                                    </li>
                                    <li class="<?php if ('Issue_Priorities' == $request->controller()) echo 'active'; ?>">
                                        <a href="/issue_priorities"><i class="fa fa-angle-double-right"></i> Ticket Priorities</a>
                                    </li>
                                    <li class="<?php if ('Issue_Statuses' == $request->controller()) echo 'active'; ?>">
                                        <a href="/issue_statuses"><i class="fa fa-angle-double-right"></i> Ticket Statuses</a>
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
