<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-07-20
 * $Id: class.session.php
 **/
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
class Session{
	public $adminid = 0;
	public $islogin = FALSE;
	public $admincp = array();
	public $isfounder = false;
	function __construct(){
		$this->Session();
	}
	function Session(){
		global $_SESSION;
		if (!isset($_SESSION['admincp'])){
			$this->islogin = FALSE;
		}else {
			$this->admincp = $_SESSION['admincp'];
			if (empty($this->admincp['username']) || empty($this->admincp['adminid']) || empty($this->admincp['password'])){
				$this->islogin = FALSE;
			}else {
				$this->islogin = TRUE;
			}
			$this->adminid = $this->admincp['adminid'];
			$this->isfounder = $this->founder($this->adminid);
		}
	}
	function Login($username,$password,$randcode=''){
		global $db,$lang,$inajax,$timestamp,$ipaddr;
		if ($randcode && ($randcode != $_SESSION['randcode'])){
			showheader();
			message('randcode_error','error');
		}
		$admindata = $db->GetOne("SELECT a.*,g.grouptitle FROM sdw_admins a LEFT JOIN sdw_admingroups g ON g.groupid=a.groupid WHERE a.username='$username' LIMIT 1");
		if (empty($admindata)){
			showheader();
			message('username_error','error');
		}elseif (!($admindata['password']==password($password))){
			showheader();
			message('password_error','error');
		}elseif ($admindata['status']==0){
			showheader();
			message('account_unaudited','error');
		}else {
			$_SESSION['admincp'] = $admindata;
			$db->query("UPDATE sdw_admins SET logintimes=logintimes+1,lastlogin='$timestamp',lastip='$ipaddr' WHERE adminid=$admindata[adminid]");
			$this->Session();
			header('location:'.$GLOBALS['BASESCRIPT']);
			exit();
		}
	}
	function founder($adminid){
		return in_array($adminid,explode(',',FOUNDERS));
	}
	function cplog($body=''){
		global $_SESSION,$timestamp;
		$GLOBALS['db']->query("INSERT INTO sdw_adminlog(adminid,body,dateline)VALUES('$this->adminid','$body','$timestamp')");
	}
	function Logout(){
		unset($_SESSION['admincp']);
		header('location:./'.$GLOBALS['BASESCRIPT']);
	}
}
?>