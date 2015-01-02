<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-17 09:01:05 --- EMERGENCY: Database_Exception [ 42S02 ]: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'tlmd_bugtracker.issues' doesn't exist [ SELECT issue.id AS id, issue.status_id AS status_id, issue.severity_id AS severity_id, issue.description AS description FROM issues AS issue ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-17 09:01:05 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue.id...', 'Model_Issue', Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#3 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issues.php(8): Kohana_ORM->find_all()
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issues->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-17 09:01:24 --- EMERGENCY: View_Exception [ 0 ]: The requested view bugs/index could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php:137
2014-12-17 09:01:24 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(137): Kohana_View->set_filename('bugs/index')
#1 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(30): Kohana_View->__construct('bugs/index', NULL)
#2 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issues.php(9): Kohana_View::factory('bugs/index')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issues->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php:137
2014-12-17 09:01:54 --- EMERGENCY: View_Exception [ 0 ]: The requested view bugs/index could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php:137
2014-12-17 09:01:54 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(137): Kohana_View->set_filename('bugs/index')
#1 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(30): Kohana_View->__construct('bugs/index', NULL)
#2 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issues.php(9): Kohana_View::factory('bugs/index')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issues->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php:137
2014-12-17 09:02:38 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: bugs ~ APPPATH/views/issues/index.php [ 13 ] in /Users/VictorLantigua/Development/bt/application/views/issues/index.php:13
2014-12-17 09:02:38 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(13): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/VictorLa...', 13, Array)
#1 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#2 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(319): Kohana_View->__toString()
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#11 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/VictorLantigua/Development/bt/application/views/issues/index.php:13
2014-12-17 09:27:35 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Model_Issue::$id ~ APPPATH/classes/Model/ORM.php [ 14 ] in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:14
2014-12-17 09:27:35 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(14): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/VictorLa...', 14, Array)
#1 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(16): Model_ORM->__get('id')
#2 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(319): Kohana_View->__toString()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#9 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:14
2014-12-17 09:28:08 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Model_Issue::$id ~ APPPATH/classes/Model/ORM.php [ 14 ] in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:14
2014-12-17 09:28:08 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(14): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/VictorLa...', 14, Array)
#1 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(16): Model_ORM->__get('id')
#2 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(319): Kohana_View->__toString()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#9 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:14
2014-12-17 09:28:16 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Model_Issue::$description ~ APPPATH/classes/Model/ORM.php [ 14 ] in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:14
2014-12-17 09:28:16 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(14): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/VictorLa...', 14, Array)
#1 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(14): Model_ORM->__get('description')
#2 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(16): Model_ORM->__get('id')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(319): Kohana_View->__toString()
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#9 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#10 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#13 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#15 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:14
2014-12-17 09:28:23 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/classes/Model/ORM.php [ 15 ] in file:line
2014-12-17 09:28:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-17 09:28:29 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Model_Issue::$created_at ~ APPPATH/classes/Model/ORM.php [ 12 ] in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:12
2014-12-17 09:28:29 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(12): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/VictorLa...', 12, Array)
#1 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(19): Model_ORM->__get('created_at')
#2 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(319): Kohana_View->__toString()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#9 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:12
2014-12-17 10:08:16 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ';', expecting ')' ~ APPPATH/classes/Model/Issue.php [ 12 ] in file:line
2014-12-17 10:08:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-17 10:08:28 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'protected' (T_PROTECTED), expecting ',' or ';' ~ APPPATH/classes/Model/Issue.php [ 15 ] in file:line
2014-12-17 10:08:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-17 10:09:31 --- EMERGENCY: Kohana_Exception [ 0 ]: The neverity property does not exist in the Model_Issue class ~ MODPATH/orm/classes/Kohana/ORM.php [ 687 ] in /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php:7
2014-12-17 10:09:31 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(7): Kohana_ORM->get('neverity')
#1 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(17): Model_ORM->__get('neverity')
#2 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(319): Kohana_View->__toString()
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
2014-12-17 10:09:41 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Model_Issue_Severity' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-12-17 10:09:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-17 10:10:01 --- EMERGENCY: Database_Exception [ 42S22 ]: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'issue_severity.severity_id' in 'where clause' [ SELECT issue_severity.id AS id, issue_severity.name AS name FROM issue_severities AS issue_severity WHERE issue_severity.severity_id = '13' LIMIT 1 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-17 10:10:01 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue_se...', false, Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1072): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(979): Kohana_ORM->_load_result(false)
#3 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(653): Kohana_ORM->find()
#4 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(7): Kohana_ORM->get('severity')
#5 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(17): Model_ORM->__get('severity')
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#9 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(319): Kohana_View->__toString()
#10 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#11 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#13 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#16 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-17 10:10:41 --- EMERGENCY: Database_Exception [ 42S22 ]: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'issue_severity.issue_id' in 'where clause' [ SELECT issue_severity.id AS id, issue_severity.name AS name FROM issue_severities AS issue_severity WHERE issue_severity.issue_id = '13' LIMIT 1 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-17 10:10:41 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue_se...', false, Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1072): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(979): Kohana_ORM->_load_result(false)
#3 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(653): Kohana_ORM->find()
#4 /Users/VictorLantigua/Development/bt/application/classes/Model/ORM.php(7): Kohana_ORM->get('severity')
#5 /Users/VictorLantigua/Development/bt/application/views/issues/index.php(17): Model_ORM->__get('severity')
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(228): Kohana_View->render()
#9 /Users/VictorLantigua/Development/bt/application/views/layouts/default.php(319): Kohana_View->__toString()
#10 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#11 /Users/VictorLantigua/Development/bt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#12 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#13 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#16 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-17 10:13:12 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Severity' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-12-17 10:13:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-17 10:13:24 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Severity' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-12-17 10:13:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-17 10:13:38 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Severity' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-12-17 10:13:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-17 10:14:59 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Severity' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-12-17 10:14:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-17 10:15:05 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Severity' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-12-17 10:15:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line