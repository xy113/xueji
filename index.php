<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-07-17
 * $Id: index.php
 **/
define('CURSCRIPT','index');
require_once './source/include/common.inc.php';
require_once './source/class/class.session.php';
!$action && $action = 'index';
$session = new Session();
$admincp = &$session->admincp;
$isfounder = &$session->isfounder;
if ($action == 'login' && $session->islogin==FALSE){
	$session->Login($username,$password,$randcode);
}elseif ($action == 'logout'){
	$session->Logout();
}else {
	if (!$session->islogin){
		if ($action == 'register'){
			include "./source/include/register.inc.php";
		}else {
			include template('login');
		}
	}else {
		$actionarray = array(
			'1'=>array('index','home','news','admin','town','school','announce','cplog','task','input','import','list','change','stat','card','result','avatar'),
			'2'=>array('index','home','news','admin','town','school','announce','cplog','task','input','import','list','change','stat','card','result','avatar'),
			'3'=>array('index','home','news','task','input','import','list','stat','card','result','avatar'),
			'4'=>array('index','home','news','input','import','list','change','stat','card','result','avatar')
		);
		if (!in_array($action,$actionarray[$admincp['groupid']])){
			showheader();
			message('noaccess','error');
		}
		include "./source/include/$action.inc.php";
		showfooter();
	}
}
?>