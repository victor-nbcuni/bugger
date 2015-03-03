<?php
// LOGIN
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lighthouse.nbcuots.com');
curl_setopt($ch, CURLOPT_POST, TRUE);
$params = array(
    'lh_username' => 'vic.lantigua@nbcuni.com',
    'lh_password' => 'M@nnyMund0',
    'action' => '/login'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_COOKIEJAR, DOCROOT . 'cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, DOCROOT . 'cookies.txt');
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'x-api-key: test',
//     'x-timestamp: ' . $timestamp,
//     'x-signature: ' . Helper_Api::makeSignature('GET', '/api/create_ticket', 'test', $timestamp)
// ));
$content = curl_exec($ch);
curl_close($ch);
var_dump($content);
exit;
*/

//echo '<pre>';print_r($_SERVER);exit;
/*
// CREATE WO
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lighthouse.nbcuots.com/_ajaxphp/save_wo.php');
curl_setopt($ch, CURLOPT_POST, TRUE);
$params = array(
    'requestedId' => 4225,
    'woREQ_TYPE' => 3,
    'projectId' => 21379,
    'woSITE_NAME' => 9,
    'woTitle' => 'test',
    'woDesc' => 'test'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

$content = curl_exec($ch);
curl_close($ch);
var_dump($content);
exit;
*/
?>
<?php $page = $request->page(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo APP_NAME; ?> - Bug Tracking System</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="stylesheet" href="/assets/libs/bootstrap-3.3.1/css/bootstrap.min.css">
        <link href="/assets/libs/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/libs/ionicons.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="/assets/libs/jquery-2.1.3.min.js"></script>
        <script src="/assets/libs/bootstrap-3.3.1/js/bootstrap.min.js" type="text/javascript"></script>

        <?php if (in_array($page, array('users/index', 'issues/index', 'issues/reported_by_me', 'issues/pending'))): ?>
            <!-- Datatables -->
            <link href="/assets/libs/datatables-1.10.4/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
            <script src="/assets/libs/datatables-1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <?php endif; ?>

        <?php if ($page == 'users/add' || $page == 'users/edit'): ?>
            <!-- Chosen Dropdown -->
            <link href="/assets/libs/chosen-1.3.0/chosen.min.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/libs/chosen-1.3.0/chosen.jquery.min.js"></script>
        <?php endif; ?>

        <?php if ($page == 'issues/view'): ?>
            <!-- X-Editable -->
            <link href="/assets/libs/x-editable-1.5.0/css/bootstrap-editable.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/libs/x-editable-1.5.0/js/bootstrap-editable.min.js"></script>
        <?php endif; ?>

        <?php if ($page == 'issues/index' || $page == 'issues/reported_by_me' || $page == 'issues/pending'): ?>
            <!-- Multiselect Dropdown -->
            <link href="/assets/libs/bootstrap-multiselect/bootstrap-multiselect.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/libs/bootstrap-multiselect/bootstrap-multiselect.js"></script>
            <!-- JQuery Deserialize -->
            <script src="/assets/libs/jquery.deserialize.min.js"></script>
        <?php endif; ?>

        <?php if ($page == 'issues/add'): ?>
            <!-- Datepicker -->
            <link href="/assets/libs/bootstrap-datepicker-1.3.1/datepicker.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/libs/bootstrap-datepicker-1.3.1/bootstrap-datepicker.js"></script>
        <?php endif; ?>

        <?php if ($page == 'issues/view' || $page == 'issues/add'): ?>
            <!-- Dropzone -->
            <link href="/assets/libs/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/libs/dropzone/dropzone.min.js"></script>
        <?php endif; ?>

        <?php if ($page == 'issues/view'): ?>
            <!-- FancyBox -->
            <link href="/assets/libs/fancybox-2.1.5/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/libs/fancybox-2.1.5/jquery.fancybox.pack.js"></script>
        <?php endif; ?>

        <?php if ($page == 'dashboard/index'): ?>
            <!-- Morris Charts
            <link href="/assets/libs/morris/morris.css" rel="stylesheet" type="text/css"/>
            <script src="/assets/libs/morris/morris.min.js"></script>-->
            <script src="/assets/libs/flot/jquery.flot.min.js"></script>
            <script src="/assets/libs/flot/jquery.flot.pie.min.js"></script>
        <?php endif; ?>

        <!-- Parsley Form Validation -->
        <link href="/assets/libs/parsley-2.0.6/parsley.css" rel="stylesheet" type="text/css"/>
        <script src="/assets/libs/parsley-2.0.6/parsley.min.js"></script>

        <!-- APP -->
        <link href="/assets/libs/adminlte/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/adminlte/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
        <script src="/assets/libs/adminlte/js/app.min.js" type="text/javascript"></script>
        <link href="/assets/css/main.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="skin-blue">
        <div class="wrapper">
            <?php echo $session->getFlashHtml(); ?>

            <header class="main-header">
            <!-- Logo -->
            <a href="/dashboard" class="logo"><?php echo '<b>' . APP_NAME . '</b> v' . APP_VERSION; ?></a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li style="font-weight:bold;" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-plus"></i> New <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/issues/add">Ticket</a></li>
                        </ul>
                    </li>
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
                                    <a href="/users/profile" class="btn btn-default btn-flat">Profile</a>
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
                            <li class="header">MAIN NAVIGATION</li>
                            <li class="<?php if ('Dashboard' == $request->controller()) echo 'active'; ?>">
                                <a href="/dashboard">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="treeview <?php if ($request->controller() == 'Issues') echo 'active'; ?>">
                                <a href="/issues">
                                    <i class="fa fa-bug"></i> <span>Tickets</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if ( ! $auth->logged_in('admin')): ?>
                                        <li class="<?php if ('reported_by_me' == $request->action() &&  $auth->logged_in('admin')) echo 'active'; ?>">
                                            <a href="/issues/reported_by_me#reporter_user_id[]=<?php echo $auth_user->id; ?>">
                                                <i class="fa fa-circle-o"></i> Reported by Me
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="<?php if ($page == 'issues/pending') echo 'active'; ?>">
                                            <a href="/issues/pending#status_id[]=1&status_id[]=2&status_id[]=3&status_id[]=4&status_id[]=5&status_id[]=7">
                                                <i class="fa fa-circle-o"></i> Pending Tickets
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <li class="<?php if ($page == 'issues/index') echo 'active'; ?>">
                                        <a href="/issues">
                                            <i class="fa fa-circle-o"></i> All Tickets
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php if ($auth->logged_in('admin')): ?>
                                <li class="treeview <?php if (is_subclass_of('Controller_' . $request->controller(), 'Controller_Auth_Admin')) echo 'active'; ?>">
                                    <a href="#">
                                        <i class="fa fa-cog"></i> <span>Administration</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="<?php if ('Users' == $request->controller()) echo 'active'; ?>">
                                            <a href="/users"><i class="fa fa-circle-o"></i> Users</a>
                                        </li>
                                        <li class="<?php if ('Roles' == $request->controller()) echo 'active'; ?>">
                                            <a href="/roles"><i class="fa fa-circle-o"></i> User Roles</a>
                                        </li>
                                        <li class="<?php if ('Projects' == $request->controller()) echo 'active'; ?>">
                                            <a href="/projects"><i class="fa fa-circle-o"></i> Projects</a>
                                        </li>
                                        <li class="<?php if ('Departments' == $request->controller()) echo 'active'; ?>">
                                            <a href="/departments"><i class="fa fa-circle-o"></i> Departments</a>
                                        </li>
                                        <li class="<?php if ('Issue_Types' == $request->controller()) echo 'active'; ?>">
                                            <a href="/issue_types"><i class="fa fa-circle-o"></i> Ticket Types</a>
                                        </li>
                                        <li class="<?php if ('Issue_Priorities' == $request->controller()) echo 'active'; ?>">
                                            <a href="/issue_priorities"><i class="fa fa-circle-o"></i> Ticket Priorities</a>
                                        </li>
                                        <li class="<?php if ('Issue_Statuses' == $request->controller()) echo 'active'; ?>">
                                            <a href="/issue_statuses"><i class="fa fa-circle-o"></i> Ticket Statuses</a>
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
            <?php /*
            <audio  <?php if ($session->get_once('play_eott')) echo 'autoplay'; ?>>
                <source src="/assets/eott.mp3" type="audio/ogg">
                Your browser does not support the audio element.
            </audio>*/ ?>
        </div>
    </body>
</html>
