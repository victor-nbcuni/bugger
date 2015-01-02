<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-29 22:52:33 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Text::char_limit() ~ APPPATH/views/issues/view.php [ 2 ] in file:line
2014-12-29 22:52:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-29 22:52:40 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Text::limit_char() ~ APPPATH/views/issues/view.php [ 2 ] in file:line
2014-12-29 22:52:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-29 23:15:43 --- EMERGENCY: Kohana_Exception [ 0 ]: The assignee property does not exist in the Model_Issue class ~ MODPATH/orm/classes/Kohana/ORM.php [ 687 ] in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:7
2014-12-29 23:15:43 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(7): Kohana_ORM->get('assignee')
#1 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(25): Model_ORM->__get('assignee')
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