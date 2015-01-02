<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-30 09:59:34 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Issue_Comments' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-12-30 09:59:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-30 09:59:51 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 3 for Kohana_ORM::where(), called in /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php on line 12 and defined ~ MODPATH/orm/classes/Kohana/ORM.php [ 1849 ] in /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php:1849
2014-12-30 09:59:51 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1849): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/VictorLa...', 1849, Array)
#1 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(12): Kohana_ORM->where('issue_id', '1')
#2 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php:1849
2014-12-30 10:00:27 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1327 Undeclared variable: GET [ SELECT issue_comment.id AS id, issue_comment.issue_id AS issue_id, issue_comment.user_id AS user_id, issue_comment.comment AS comment, issue_comment.created_at AS created_at FROM issue_comments AS issue_comment WHERE issue_id = '1' ORDER BY created_at DESC LIMIT GET issue_comments HTTP/1.1
Host: local.bt.com
Connection: keep-alive
Accept: */*
X-Requested-With: XMLHttpRequest
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36
Referer: http://local.bt.com/issues/view/1
Accept-Encoding: gzip,deflate,sdch
Accept-Language: en-US,en;q=0.8
Cookie: session=
Content-Length: 0

 OFFSET GET issue_comments HTTP/1.1
Host: local.bt.com
Connection: keep-alive
Accept: */*
X-Requested-With: XMLHttpRequest
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36
Referer: http://local.bt.com/issues/view/1
Accept-Encoding: gzip,deflate,sdch
Accept-Language: en-US,en;q=0.8
Cookie: session=
Content-Length: 0

 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:00:27 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue_co...', 'Model_Issue_Com...', Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#3 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(16): Kohana_ORM->find_all()
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:01:31 --- EMERGENCY: ErrorException [ 8 ]: Object of class Request could not be converted to int ~ APPPATH/classes/Controller/Issue/Comments.php [ 14 ] in /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php:14
2014-12-30 10:01:31 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(14): Kohana_Core::error_handler(8, 'Object of class...', '/Users/VictorLa...', 14, Array)
#1 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php:14
2014-12-30 10:01:53 --- EMERGENCY: ErrorException [ 8 ]: Object of class Request could not be converted to int ~ APPPATH/classes/Controller/Issue/Comments.php [ 7 ] in /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php:7
2014-12-30 10:01:53 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(7): Kohana_Core::error_handler(8, 'Object of class...', '/Users/VictorLa...', 7, Array)
#1 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php:7
2014-12-30 10:03:33 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-1' at line 1 [ SELECT issue_comment.id AS id, issue_comment.issue_id AS issue_id, issue_comment.user_id AS user_id, issue_comment.comment AS comment, issue_comment.created_at AS created_at FROM issue_comments AS issue_comment WHERE issue_id = 0 ORDER BY created_at DESC LIMIT 0 OFFSET -1 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:03:33 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue_co...', 'Model_Issue_Com...', Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#3 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(16): Kohana_ORM->find_all()
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:04:25 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-1' at line 1 [ SELECT issue_comment.id AS id, issue_comment.issue_id AS issue_id, issue_comment.user_id AS user_id, issue_comment.comment AS comment, issue_comment.created_at AS created_at FROM issue_comments AS issue_comment WHERE issue_id = 0 ORDER BY created_at DESC LIMIT 0 OFFSET -1 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:04:25 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue_co...', 'Model_Issue_Com...', Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#3 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(16): Kohana_ORM->find_all()
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:05:06 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-1' at line 1 [ SELECT issue_comment.id AS id, issue_comment.issue_id AS issue_id, issue_comment.user_id AS user_id, issue_comment.comment AS comment, issue_comment.created_at AS created_at FROM issue_comments AS issue_comment WHERE issue_id = 1 ORDER BY created_at DESC LIMIT 0 OFFSET -1 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:05:06 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue_co...', 'Model_Issue_Com...', Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#3 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(16): Kohana_ORM->find_all()
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:05:28 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'OFFSET -1' at line 1 [ SELECT issue_comment.id AS id, issue_comment.issue_id AS issue_id, issue_comment.user_id AS user_id, issue_comment.comment AS comment, issue_comment.created_at AS created_at FROM issue_comments AS issue_comment WHERE issue_id = '1' ORDER BY created_at DESC OFFSET -1 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:05:28 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue_co...', 'Model_Issue_Com...', Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#3 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(16): Kohana_ORM->find_all()
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:06:05 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'OFFSET -1' at line 1 [ SELECT issue_comment.id AS id, issue_comment.issue_id AS issue_id, issue_comment.user_id AS user_id, issue_comment.comment AS comment, issue_comment.created_at AS created_at FROM issue_comments AS issue_comment WHERE issue_id = '1' ORDER BY created_at DESC OFFSET -1 ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251
2014-12-30 10:06:05 --- DEBUG: #0 /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT issue_co...', 'Model_Issue_Com...', Array)
#1 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /Users/VictorLantigua/Development/bt/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#3 /Users/VictorLantigua/Development/bt/application/classes/Controller/Issue/Comments.php(16): Kohana_ORM->find_all()
#4 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Controller.php(84): Controller_Issue_Comments->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Issue_Comments))
#7 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/VictorLantigua/Development/bt/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/VictorLantigua/Development/bt/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/VictorLantigua/Development/bt/modules/database/classes/Kohana/Database/Query.php:251