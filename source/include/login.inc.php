<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2011-10-31
 * $Id: login.inc.php
 **/
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
if (!($randcode == $_SESSION['randcode'])){
	dexit('1');
}
if ($typeid == 1){
	$result = $db->GetOne("SELECT adminid,password,random FROM sdw_admins WHERE admin='$username' LIMIT 0,1");
	if (!$result){
		dexit('2');
	}elseif (!($result['password'] == md5($password.$result['random']))){
		dexit('3');
	}else {
		$db->query("UPDATE sdw_admins SET lastlogin='$timestamp' WHERE admin='$username'");
		$_SESSION['admincp']['username'] = $username;
		$_SESSION['admincp']['password'] = $result['password'];
		$_SESSION['admincp']['typeid'] = 1;
		dexit('0');
	}
}
?>