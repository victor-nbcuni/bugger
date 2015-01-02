<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-19 08:31:49 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined function values() ~ APPPATH/classes/Controller/Auth.php [ 23 ] in file:line
2014-12-19 08:31:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-19 08:32:02 --- EMERGENCY: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH/orm/classes/Kohana/ORM.php [ 1275 ] in /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php:1302
2014-12-19 08:32:02 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(NULL)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1421): Kohana_ORM->create(NULL)
#2 /Users/VictorLantigua/Development/bt/application/classes/Controller/Auth.php(27): Kohana_ORM->save()
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(69): Controller_Auth->before()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php:1302
2014-12-19 08:38:06 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Issue::savse() ~ APPPATH/classes/Controller/Issues.php [ 19 ] in file:line
2014-12-19 08:38:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-19 08:38:16 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Issue::savse() ~ APPPATH/classes/Controller/Issues.php [ 19 ] in file:line
2014-12-19 08:38:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-19 08:38:42 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Issue::savse() ~ APPPATH/classes/Controller/Issues.php [ 19 ] in file:line
2014-12-19 08:38:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-19 08:38:50 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Issue::savse() ~ APPPATH/classes/Controller/Issues.php [ 19 ] in file:line
2014-12-19 08:38:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-19 08:39:10 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Issue::savse() ~ APPPATH/classes/Controller/Issues.php [ 19 ] in file:line
2014-12-19 08:39:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line