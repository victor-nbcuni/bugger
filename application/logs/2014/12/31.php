<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-31 11:04:06 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$id' (T_VARIABLE) ~ APPPATH/classes/Controller/Issues.php [ 55 ] in file:line
2014-12-31 11:04:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-31 12:02:06 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ APPPATH/views/issues/view.php [ 174 ] in file:line
2014-12-31 12:02:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-31 12:02:24 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ APPPATH/views/issues/view.php [ 174 ] in file:line
2014-12-31 12:02:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-31 12:02:39 --- EMERGENCY: ErrorException [ 1 ]: Class 'Helper_IssueView' not found ~ APPPATH/classes/Helper/IssueView.php [ 3 ] in file:line
2014-12-31 12:02:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-31 12:48:47 --- EMERGENCY: Kohana_Exception [ 0 ]: The updated_at property does not exist in the Model_Issue class ~ MODPATH/orm/classes/Kohana/ORM.php [ 687 ] in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:7
2014-12-31 12:48:47 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(7): Kohana_ORM->get('updated_at')
#1 /Users/VictorLantigua/Development/bt/application/views/issues/view.php(24): Model_ORM->__get('updated_at')
#2 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(356): Kohana_View->__toString()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#9 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:7