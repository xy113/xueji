<?php
class User{
	public $uid = 0;
	public $groupid = 0;
	public $islogin = FALSE;
	public $userdata = array();
	function __construct(){
		$this->User();
	}
	function User(){
		global $_SESSION;
		if (!isset($_SESSION['user'])){
			$this->islogin = FALSE;
		}else {
			$this->userdata = $_SESSION['user'];
			if (empty($this->userdata['username']) || empty($this->userdata['uid']) || empty($this->userdata['password'])){
				$this->islogin = FALSE;
			}else {
				$this->islogin = TRUE;
			}
			$this->uid = $this->userdata['uid'];
			$this->groupid = $this->userdata['groupid'];
		}
	}
	function Login($username,$password,$randcode=''){
		global $db,$lang,$inajax,$smarty,$timestamp;
		if ($randcode && ($randcode != $_SESSION['randcode'])){
			dexit(1);
		}
		$userinfo = $db->GetOne("SELECT u.*,g.grouptitle FROM sdw_users u LEFT JOIN sdw_usergroups g ON g.groupid=u.groupid WHERE u.username='$username' LIMIT 1");
		if (empty($userinfo)){
			dexit(2);
		}elseif (!(md5(md5($password.$userinfo['random']))==$userinfo['password'])){
			dexit(3);
		}else {
			$_SESSION['user'] = $userinfo;
			$db->query("UPDATE sdw_users SET logintimes=logintimes+1,lastlogin='$timestamp' WHERE uid=$userinfo[uid]");
			$this->uid = $userinfo['uid'];
			$this->userlog('成功登录系统。');
			dexit(0);
		}
	}
	function userlog($body=''){
		global $_SESSION,$timestamp;
		$GLOBALS['db']->query("INSERT INTO sdw_userlog(uid,body,dateline)VALUES('$this->uid','$body','$timestamp')");
	}
	function Logout(){
		$_SESSION['user'] = NULL;
		header('location:./index.php');
	}
}
?>