<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2011-10-18
 * $ID: common.inc.php
*/
error_reporting(E_ALL & ~E_NOTICE);
define('IN_XSCMS',true);
/* 取得当前系统所在的根目录 */
define('ROOT_PATH', str_replace("/source/include/common.inc.php", '', str_replace('\\', '/', __FILE__)));
@set_time_limit(600);
@set_magic_quotes_runtime(0);
@date_default_timezone_set('PRC');
@ini_set('session.gc_maxlifetime',60); 
@ini_set('session.auto_start',0);
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies',   1);
@ini_set('max_execution_time',600);
@ini_set('session.save_path', ROOT_PATH.'/data/sessions');
session_start();
//==========================================
//开始计算页面执行时间
//==========================================
$start_time = $end_time = 0;
$mtime = explode(' ', microtime());
$start_time = $mtime[1] + $mtime[0];
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
!defined('CURSCRIPT') && define('CURSCRIPT', '');
if(PHP_VERSION < '4.1.0') {
	$_GET    = &$HTTP_GET_VARS;
	$_POST   = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV    = &$HTTP_ENV_VARS;
	$_FILES  = &$HTTP_POST_FILES;
	$_SESSION = &$HTTP_SESSION_VARS;
}
unset($HTTP_GET_VARS,$HTTP_POST_VARS,$HTTP_POST_FILES,$HTTP_COOKIE_VARS,$HTTP_ENV_VARS,$HTTP_SERVER_VARS,$HTTP_SESSION_VARS);
require_once ROOT_PATH."/config/config.php";
require_once ROOT_PATH."/source/lang/lang.".LANGUAGE.".php";
require_once ROOT_PATH."/source/function/function.common.php";
define('FORMHASH',formhash());
header('Content-type: text/html;charset='.CHARSET);
foreach(array('_POST', '_GET') as $_request) {
	foreach($$_request as $_key => $_value) {
		$_key{0} != '_' && $$_key = daddslashes($_value);
	}
}
if (!MAGIC_QUOTES_GPC){
	if (!empty($_GET)){		
		$_GET = daddslashes($_GET);
	}
	if (!empty($_POST)){
		$_POST = daddslashes($_POST);
	}
}
$_XCOOKIE = array();
$prelength = strlen(COOKIE_PRE);
foreach($_COOKIE as $key => $val) {
	if(substr($key, 0, $prelength) == COOKIE_PRE) {
		$_XCOOKIE[(substr($key,$prelength))] = MAGIC_QUOTES_GPC ? $val : daddslashes($val);
	}
}
unset($prelength);
$timestamp = time();
$ipaddr = $_SERVER['REMOTE_ADDR'];
$inajax = !empty($inajax);
$page = max(array(1,$page));
$PHP_SELF = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
$BASESCRIPT = basename($_SERVER['PHP_SELF']);
$REFERER = isset($_SERVER['HTTP_REFERER']) ?  $_SERVER['HTTP_REFERER'] : 'index.php?action=main';
require_once  ROOT_PATH."/source/class/class.mysql.php";
$db = new DB();
?>