<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-26 13:19:18 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /Users/VictorLantigua/Development/bt/system/classes/Kohana/Session.php:125
2014-12-26 13:19:18 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /Users/VictorLantigua/Development/bt/modules/auth/classes/Kohana/Auth.php(58): Kohana_Session::instance('native')
#3 /Users/VictorLantigua/Development/bt/modules/auth/classes/Kohana/Auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /Users/VictorLantigua/Development/bt/application/classes/Controller/Base.php(13): Kohana_Auth::instance()
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(69): Controller_Base->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/VictorLantigua/Development/bt/system/classes/Kohana/Session.php:125
2014-12-26 13:21:52 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0, user.email AS email, user.username AS username, user.password AS password, us' at line 1 [ SELECT user.id AS id, user.0 AS 0, user.email AS email, user.username AS username, user.password AS password, user.name AS name, user.logins AS logins, user.last_login AS last_login FROM users AS user WHERE email = 'vic.lantigua@nbcuni.com' LIMIT 1 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-26 13:21:52 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT user.id ...', false, Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1072): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(979): Kohana_ORM->_load_result(false)
#3 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/Auth/ORM.php(80): Kohana_ORM->find()
#4 /Users/VictorLantigua/Development/bt/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_ORM->_login('vic.lantigua@nb...', 'pass', false)
#5 /Users/VictorLantigua/Development/bt/application/classes/Controller/Users.php(8): Kohana_Auth->login('vic.lantigua@nb...', 'pass')
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Users->action_login()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#9 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-26 13:22:36 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ APPPATH/views/users/form.php [ 26 ] in file:line
2014-12-26 13:22:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-26 13:23:04 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: assigned_department_id ~ MODPATH/orm/classes/Kohana/ORM.php [ 633 ] in /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php:633
2014-12-26 13:23:04 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(633): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/VictorLa...', 633, Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(603): Kohana_ORM->get('department')
#2 /Users/VictorLantigua/Development/bt/application/views/users/form.php(26): Kohana_ORM->__get('department')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(361): Kohana_View->__toString()
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#9 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#10 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#13 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#15 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php:633
2014-12-26 14:50:03 --- EMERGENCY: Kohana_Exception [ 0 ]: The severity property does not exist in the Model_Issue class ~ MODPATH/orm/classes/Kohana/ORM.php [ 687 ] in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:7
2014-12-26 14:50:03 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(7): Kohana_ORM->get('severity')
#1 /Users/VictorLantigua/Development/bt/application/views/issues/view.php(19): Model_ORM->__get('severity')
#2 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(361): Kohana_View->__toString()
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
2014-12-26 15:02:28 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF) ~ APPPATH/classes/Controller/Issue/Comments.php [ 8 ] in file:line
2014-12-26 15:02:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-26 15:02:39 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Comment' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-12-26 15:02:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line