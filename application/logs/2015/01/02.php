<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-01-02 07:23:57 --- EMERGENCY: ErrorException [ 2 ]: include(): Filename cannot be empty ~ APPPATH/views/users/login.php [ 26 ] in /Users/VictorLantigua/Development/gremlinbt/application/views/users/login.php:26
2015-01-02 07:23:57 --- DEBUG: #0 /Users/VictorLantigua/Development/gremlinbt/application/views/users/login.php(26): Kohana_Core::error_handler(2, 'include(): File...', '/Users/VictorLa...', 26, Array)
#1 /Users/VictorLantigua/Development/gremlinbt/application/views/users/login.php(26): include()
#2 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#3 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#4 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#5 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#8 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/VictorLantigua/Development/gremlinbt/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/VictorLantigua/Development/gremlinbt/application/views/users/login.php:26
2015-01-02 08:26:31 --- EMERGENCY: ErrorException [ 1 ]: Class 'Exceptipn' not found ~ APPPATH/classes/Form/Validation/Exception.php [ 3 ] in file:line
2015-01-02 08:26:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-02 08:26:55 --- EMERGENCY: ErrorException [ 1 ]: Class 'Exceptipn' not found ~ APPPATH/classes/Form/Validation/Exception.php [ 3 ] in file:line
2015-01-02 08:26:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-02 08:27:01 --- EMERGENCY: ErrorException [ 1 ]: Class 'Exceptipn' not found ~ APPPATH/classes/Form/Validation/Exception.php [ 3 ] in file:line
2015-01-02 08:27:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-02 08:27:11 --- EMERGENCY: ErrorException [ 1 ]: Class 'Exceptipn' not found ~ APPPATH/classes/Form/Validation/Exception.php [ 3 ] in file:line
2015-01-02 08:27:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-02 08:27:23 --- EMERGENCY: ErrorException [ 1 ]: Class 'Exceptipn' not found ~ APPPATH/classes/Form/Validation/Exception.php [ 3 ] in file:line
2015-01-02 08:27:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-02 08:29:13 --- EMERGENCY: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH/orm/classes/Kohana/ORM.php [ 1275 ] in /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php:1302
2015-01-02 08:29:13 --- DEBUG: #0 /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(NULL)
#1 /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php(1421): Kohana_ORM->create(NULL)
#2 /Users/VictorLantigua/Development/gremlinbt/application/classes/Controller/Users.php(45): Kohana_ORM->save()
#3 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller.php(84): Controller_Users->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#6 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/VictorLantigua/Development/gremlinbt/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php:1302
2015-01-02 08:29:30 --- EMERGENCY: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH/orm/classes/Kohana/ORM.php [ 1275 ] in /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php:1302
2015-01-02 08:29:30 --- DEBUG: #0 /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(NULL)
#1 /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php(1421): Kohana_ORM->create(NULL)
#2 /Users/VictorLantigua/Development/gremlinbt/application/classes/Controller/Users.php(45): Kohana_ORM->save()
#3 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller.php(84): Controller_Users->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#6 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/VictorLantigua/Development/gremlinbt/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php:1302
2015-01-02 08:44:21 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: user ~ APPPATH/views/issue_abstract/form.php [ 18 ] in /Users/VictorLantigua/Development/gremlinbt/application/views/issue_abstract/form.php:18
2015-01-02 08:44:21 --- DEBUG: #0 /Users/VictorLantigua/Development/gremlinbt/application/views/issue_abstract/form.php(18): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/VictorLa...', 18, Array)
#1 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#2 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#3 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/VictorLantigua/Development/gremlinbt/application/views/layouts/default.php(140): Kohana_View->__toString()
#5 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#6 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#7 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Roles))
#11 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/VictorLantigua/Development/gremlinbt/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/VictorLantigua/Development/gremlinbt/application/views/issue_abstract/form.php:18
2015-01-02 08:45:18 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ':' ~ APPPATH/views/issue_abstract/form.php [ 13 ] in file:line
2015-01-02 08:45:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-02 08:49:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: base_url ~ APPPATH/views/issue_abstract/index.php [ 11 ] in /Users/VictorLantigua/Development/gremlinbt/application/views/issue_abstract/index.php:11
2015-01-02 08:49:49 --- DEBUG: #0 /Users/VictorLantigua/Development/gremlinbt/application/views/issue_abstract/index.php(11): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/VictorLa...', 11, Array)
#1 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#2 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#3 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/VictorLantigua/Development/gremlinbt/application/views/layouts/default.php(140): Kohana_View->__toString()
#5 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#6 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#7 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Priorities))
#11 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/VictorLantigua/Development/gremlinbt/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/VictorLantigua/Development/gremlinbt/application/views/issue_abstract/index.php:11
2015-01-02 10:00:36 --- EMERGENCY: Kohana_Exception [ 0 ]: The firstname property does not exist in the Model_User class ~ MODPATH/orm/classes/Kohana/ORM.php [ 687 ] in /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php:603
2015-01-02 10:00:36 --- DEBUG: #0 /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php(603): Kohana_ORM->get('firstname')
#1 /Users/VictorLantigua/Development/gremlinbt/application/views/layouts/default.php(88): Kohana_ORM->__get('firstname')
#2 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(61): include('/Users/VictorLa...')
#3 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/VictorLa...', Array)
#4 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#5 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issues))
#8 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/VictorLantigua/Development/gremlinbt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/VictorLantigua/Development/gremlinbt/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/VictorLantigua/Development/gremlinbt/modules/orm/classes/Kohana/ORM.php:603
2015-01-02 10:00:48 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_User::fullname() ~ APPPATH/views/layouts/default.php [ 88 ] in file:line
2015-01-02 10:00:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line