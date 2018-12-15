<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2018-12-15 12:35:52 --- CRITICAL: Database_Exception [ 42S02 ]: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'odontos.socials' doesn't exist [ SELECT name, url, status FROM socials WHERE status = '1' ] ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 151 ] in E:\xampp\htdocs\odontos\modules\database\classes\Kohana\Database\Query.php:251
2018-12-15 12:35:52 --- DEBUG: #0 E:\xampp\htdocs\odontos\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, 'SELECT name, ur...', false, Array)
#1 E:\xampp\htdocs\odontos\application\classes\Model\Socials.php(12): Kohana_Database_Query->execute()
#2 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(43): Model_Socials->get_all()
#3 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(69): Controller_Common->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#6 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#9 {main} in E:\xampp\htdocs\odontos\modules\database\classes\Kohana\Database\Query.php:251
2018-12-15 15:18:21 --- CRITICAL: ErrorException [ 2 ]: array_diff(): Argument #1 is not an array ~ MODPATH\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatebase.php(165) : eval()'d code [ 37 ] in file:line
2018-12-15 15:18:21 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_diff(): A...', 'E:\\xampp\\htdocs...', 37, Array)
#1 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatebase.php(165) : eval()'d code(37): array_diff('en', Array)
#2 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatebase.php(182): content_5c14cfddbcb875_72420330(Object(Smarty_Internal_Template))
#3 E:\xampp\htdocs\odontos\modules\smarty3\classes\Smarty\View.php(383): Smarty_Internal_TemplateBase->fetch('E:\\xampp\\htdocs...')
#4 E:\xampp\htdocs\odontos\system\classes\Kohana\View.php(228): Smarty_View->render()
#5 E:\xampp\htdocs\odontos\application\cache\smarty_compiled\ba8cc604934c281a350235e05fbebb6f2283c4d6.file.main.tpl.php(88): Kohana_View->__toString()
#6 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatebase.php(182): content_5c14cfddb42cd8_20099660(Object(Smarty_Internal_Template))
#7 E:\xampp\htdocs\odontos\modules\smarty3\classes\Smarty\View.php(383): Smarty_Internal_TemplateBase->fetch('E:\\xampp\\htdocs...')
#8 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller\Template.php(44): Smarty_View->render()
#9 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#10 [internal function]: Kohana_Controller->execute()
#11 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#12 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#15 {main} in file:line
2018-12-15 15:26:12 --- CRITICAL: SmartyCompilerException [ 0 ]: Syntax error in template "E:\xampp\htdocs\odontos\application\views\header\langsel.tpl"  on line 16 "{unset($langslist[$k])}" unknown function "unset" ~ MODPATH\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatecompilerbase.php [ 16 ] in E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php:2892
2018-12-15 15:26:12 --- DEBUG: #0 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php(2892): Smarty_Internal_TemplateCompilerBase->trigger_template_error('unknown functio...')
#1 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php(3093): Smarty_Internal_Templateparser->yy_r154()
#2 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php(3191): Smarty_Internal_Templateparser->yy_reduce(154)
#3 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_smartytemplatecompiler.php(111): Smarty_Internal_Templateparser->doParse(3, '}')
#4 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatecompilerbase.php(273): Smarty_Internal_SmartyTemplateCompiler->doCompile('<div class="top...')
#5 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_template.php(186): Smarty_Internal_TemplateCompilerBase->compileTemplate(Object(Smarty_Internal_Template))
#6 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatebase.php(163): Smarty_Internal_Template->compileTemplateSource()
#7 E:\xampp\htdocs\odontos\modules\smarty3\classes\Smarty\View.php(383): Smarty_Internal_TemplateBase->fetch('E:\\xampp\\htdocs...')
#8 E:\xampp\htdocs\odontos\system\classes\Kohana\View.php(228): Smarty_View->render()
#9 E:\xampp\htdocs\odontos\application\cache\smarty_compiled\ba8cc604934c281a350235e05fbebb6f2283c4d6.file.main.tpl.php(88): Kohana_View->__toString()
#10 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatebase.php(182): content_5c14cfddb42cd8_20099660(Object(Smarty_Internal_Template))
#11 E:\xampp\htdocs\odontos\modules\smarty3\classes\Smarty\View.php(383): Smarty_Internal_TemplateBase->fetch('E:\\xampp\\htdocs...')
#12 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller\Template.php(44): Smarty_View->render()
#13 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#16 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#19 {main} in E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php:2892
2018-12-15 15:26:13 --- CRITICAL: SmartyCompilerException [ 0 ]: Syntax error in template "E:\xampp\htdocs\odontos\application\views\header\langsel.tpl"  on line 16 "{unset($langslist[$k])}" unknown function "unset" ~ MODPATH\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatecompilerbase.php [ 16 ] in E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php:2892
2018-12-15 15:26:13 --- DEBUG: #0 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php(2892): Smarty_Internal_TemplateCompilerBase->trigger_template_error('unknown functio...')
#1 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php(3093): Smarty_Internal_Templateparser->yy_r154()
#2 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php(3191): Smarty_Internal_Templateparser->yy_reduce(154)
#3 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_smartytemplatecompiler.php(111): Smarty_Internal_Templateparser->doParse(3, '}')
#4 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatecompilerbase.php(273): Smarty_Internal_SmartyTemplateCompiler->doCompile('<div class="top...')
#5 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_template.php(186): Smarty_Internal_TemplateCompilerBase->compileTemplate(Object(Smarty_Internal_Template))
#6 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatebase.php(163): Smarty_Internal_Template->compileTemplateSource()
#7 E:\xampp\htdocs\odontos\modules\smarty3\classes\Smarty\View.php(383): Smarty_Internal_TemplateBase->fetch('E:\\xampp\\htdocs...')
#8 E:\xampp\htdocs\odontos\system\classes\Kohana\View.php(228): Smarty_View->render()
#9 E:\xampp\htdocs\odontos\application\cache\smarty_compiled\ba8cc604934c281a350235e05fbebb6f2283c4d6.file.main.tpl.php(88): Kohana_View->__toString()
#10 E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templatebase.php(182): content_5c14cfddb42cd8_20099660(Object(Smarty_Internal_Template))
#11 E:\xampp\htdocs\odontos\modules\smarty3\classes\Smarty\View.php(383): Smarty_Internal_TemplateBase->fetch('E:\\xampp\\htdocs...')
#12 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller\Template.php(44): Smarty_View->render()
#13 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#16 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#19 {main} in E:\xampp\htdocs\odontos\modules\smarty3\vendor\smarty\libs\sysplugins\smarty_internal_templateparser.php:2892
2018-12-15 15:31:37 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:31:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:31:38 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:31:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:31:38 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:31:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:32:37 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:32:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:32:38 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:32:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:32:38 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:32:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:32:38 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:32:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:32:39 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:32:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:41:25 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:41:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:41:26 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:41:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:41:26 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:41:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:41:26 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:41:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:43:18 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:43:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:43:18 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:43:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:43:19 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:43:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:43:19 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 15:43:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 15:43:29 --- CRITICAL: ErrorException [ 2 ]: array_search() expects parameter 2 to be array, null given ~ APPPATH\classes\Controller\Common.php [ 449 ] in file:line
2018-12-15 15:43:29 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_search() ...', 'E:\\xampp\\htdocs...', 449, Array)
#1 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(449): array_search('en', NULL)
#2 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(77): Controller_Common->filterlang('en')
#3 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(69): Controller_Common->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#6 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2018-12-15 15:43:29 --- CRITICAL: ErrorException [ 2 ]: array_search() expects parameter 2 to be array, null given ~ APPPATH\classes\Controller\Common.php [ 449 ] in file:line
2018-12-15 15:43:29 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_search() ...', 'E:\\xampp\\htdocs...', 449, Array)
#1 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(449): array_search('en', NULL)
#2 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(77): Controller_Common->filterlang('en')
#3 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(69): Controller_Common->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#6 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2018-12-15 15:43:30 --- CRITICAL: ErrorException [ 2 ]: array_search() expects parameter 2 to be array, null given ~ APPPATH\classes\Controller\Common.php [ 449 ] in file:line
2018-12-15 15:43:30 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_search() ...', 'E:\\xampp\\htdocs...', 449, Array)
#1 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(449): array_search('en', NULL)
#2 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(77): Controller_Common->filterlang('en')
#3 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(69): Controller_Common->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#6 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2018-12-15 15:44:06 --- CRITICAL: ErrorException [ 2 ]: array_search() expects parameter 2 to be array, null given ~ APPPATH\classes\Controller\Common.php [ 78 ] in file:line
2018-12-15 15:44:06 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_search() ...', 'E:\\xampp\\htdocs...', 78, Array)
#1 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(78): array_search(NULL, NULL)
#2 [internal function]: Controller_Common->{closure}('en')
#3 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(81): array_filter(Array, Object(Closure))
#4 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(69): Controller_Common->before()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#7 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2018-12-15 15:44:06 --- CRITICAL: ErrorException [ 2 ]: array_search() expects parameter 2 to be array, null given ~ APPPATH\classes\Controller\Common.php [ 78 ] in file:line
2018-12-15 15:44:06 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_search() ...', 'E:\\xampp\\htdocs...', 78, Array)
#1 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(78): array_search(NULL, NULL)
#2 [internal function]: Controller_Common->{closure}('en')
#3 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(81): array_filter(Array, Object(Closure))
#4 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(69): Controller_Common->before()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#7 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2018-12-15 15:44:07 --- CRITICAL: ErrorException [ 2 ]: array_search() expects parameter 2 to be array, null given ~ APPPATH\classes\Controller\Common.php [ 78 ] in file:line
2018-12-15 15:44:07 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_search() ...', 'E:\\xampp\\htdocs...', 78, Array)
#1 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(78): array_search(NULL, NULL)
#2 [internal function]: Controller_Common->{closure}('en')
#3 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(81): array_filter(Array, Object(Closure))
#4 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(69): Controller_Common->before()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#7 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2018-12-15 15:44:07 --- CRITICAL: ErrorException [ 2 ]: array_search() expects parameter 2 to be array, null given ~ APPPATH\classes\Controller\Common.php [ 78 ] in file:line
2018-12-15 15:44:07 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_search() ...', 'E:\\xampp\\htdocs...', 78, Array)
#1 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(78): array_search(NULL, NULL)
#2 [internal function]: Controller_Common->{closure}('en')
#3 E:\xampp\htdocs\odontos\application\classes\Controller\Common.php(81): array_filter(Array, Object(Closure))
#4 E:\xampp\htdocs\odontos\system\classes\Kohana\Controller.php(69): Controller_Common->before()
#5 [internal function]: Kohana_Controller->execute()
#6 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menu))
#7 E:\xampp\htdocs\odontos\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 E:\xampp\htdocs\odontos\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 E:\xampp\htdocs\odontos\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2018-12-15 16:04:20 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:21 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:21 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:21 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:30 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:30 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:31 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:31 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:51 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:52 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 16:04:52 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ArgumentCountError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ArgumentCountError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 16:04:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 17:47:15 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Minion_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\modules\minion\classes\Kohana\Minion\Exception.php:24
Stack trace:
#0 [internal function]: Kohana_Minion_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ MODPATH\minion\classes\Kohana\Minion\Exception.php [ 24 ] in file:line
2018-12-15 17:47:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 17:47:34 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Minion_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\modules\minion\classes\Kohana\Minion\Exception.php:24
Stack trace:
#0 [internal function]: Kohana_Minion_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ MODPATH\minion\classes\Kohana\Minion\Exception.php [ 24 ] in file:line
2018-12-15 17:47:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 17:52:10 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 17:52:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 17:52:11 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 17:52:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 17:52:11 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in E:\xampp\htdocs\odontos\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-12-15 17:52:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-12-15 17:55:56 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Minion_Exception::handler() must be an instance of Exception, instance of Error given in E:\xampp\htdocs\odontos\modules\minion\classes\Kohana\Minion\Exception.php:24
Stack trace:
#0 [internal function]: Kohana_Minion_Exception::handler(Object(Error))
#1 {main}
  thrown ~ MODPATH\minion\classes\Kohana\Minion\Exception.php [ 24 ] in file:line
2018-12-15 17:55:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line