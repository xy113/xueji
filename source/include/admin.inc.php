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
 * $Id: admin.inc.php
 **/
if (!defined('IN_XSCMS')){die('Access Denied!');}
if ($do == 'export'){
	$admins[0] = array('登录账号','真实姓名','管理分组','联系电话','电子邮件','所在乡镇');
	$query = $db->query("SELECT a.*,t.town,g.grouptitle FROM sdw_admins a LEFT JOIN sdw_admingroups g ON g.groupid=a.groupid LEFT JOIN sdw_town t ON t.tid=a.tid ORDER BY a.adminid");
	while ($data = $db->fetch_array($query)){
		$admins[] = array($data['username'],$data['realname'],$data['grouptitle'],$data['tel'],$data['email'],$data['town']);
	}
	include ROOT_PATH.'/source/class/class.php_excel.php';
	$xls = new Excel_XML('gb2312');
	$xls->addArray($admins);
	$xls->generateXML('admins');
	exit();
}
if (!$inajax)showheader();
if (!in_array($admincp['groupid'],array(1,2))){
	message('noaccess','error');
}
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		message('undefined_action','error');
	}
	if ($do == 'add'){
		$data = $db->GetOne("SELECT username FROM sdw_admins WHERE username='$adminnew[username]'");
		if ($data){
			message('admin_exists','error');
		}else {
			$adminnew['password'] = password($adminnew['password']);
			$db->insert('sdw_admins',$adminnew);
			message('save_succeed');
		}
	}elseif ($do == 'edit'){
		if (strlen($adminnew['password'])>5){
			$adminnew['password'] = password($adminnew['password']);
		}else {
			unset($adminnew['password']);
		}
		$db->update('sdw_admins',$adminnew,"adminid='$adminid'");
		message('modi_succeed');
	}elseif ($do == 'toggle_status'){
		$data = $db->GetOne("SELECT status FROM sdw_admins WHERE adminid='$adminid'");
		$status = $data['status']==1 ? 0 : 1;
		$db->query("UPDATE sdw_admins SET status='$status' WHERE adminid='$adminid'");
		dexit($status);
	}else {
		if (is_array($delete)){
			$ids = implodeids($delete);
			$db->query("DELETE FROM sdw_admins WHERE adminid IN ($ids) AND adminid NOT IN (".FOUNDERS.")");
			message('drop_succeed');
		}else {
			message('noselect','error');
		}
	}
}else {
	if ($do == 'add'){
		$admingroups = listadmingroups();
		$towns = listtowns();
		$schools = listschools();
	}elseif ($do == 'edit'){
		$towns = listtowns();
		$schools = listschools();
		$admin = $db->GetOne("SELECT * FROM sdw_admins WHERE adminid='$adminid'");
		$admingroups = listadmingroups($admin['groupid']);
	}elseif ($do == 'view'){
		$admin = $db->GetOne("SELECT a.*,g.grouptitle,t.town,s.sname FROM sdw_admins a LEFT JOIN sdw_admingroups g ON g.groupid=a.groupid 
		LEFT JOIN sdw_town t ON t.tid=a.tid LEFT JOIN sdw_school s ON s.sid=a.sid WHERE a.adminid='$adminid'");
	}else {
		$admins = $towns = array();
		$pagesize = 50;
		$towns = listtowns($tid);
		$sqladd = "WHERE a.username LIKE '%%'";
		$sqladd.= $tid ? " AND a.tid='$tid'" : "";
		$sqladd.= $sid ? " AND a.sid='$sid'" : "";
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_admins a LEFT JOIN sdw_admingroups g ON g.groupid=a.groupid $sqladd");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT a.*,g.grouptitle,t.town FROM sdw_admins a LEFT JOIN sdw_admingroups g ON g.groupid=a.groupid 
		LEFT JOIN sdw_town t ON t.tid=a.tid $sqladd ORDER BY a.adminid LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['lastlogin'] = $data['lastlogin'] ? date('Y-m-d H:i:s',$data['lastlogin']) : '';
			$data['isfounder'] = in_array($data['adminid'],explode(',',FOUNDERS));
			$admins[] = $data;
		}
		$pagelink = pagination($page,$pagecount);
	}
	include template('admin');
}
function listadmingroups($groupid = 0){
	$admingroups = array();
	$query = $GLOBALS['db']->query("SELECT groupid,grouptitle FROM sdw_admingroups ORDER BY groupid");
	while ($data = $GLOBALS['db']->fetch_array($query)){
		$data['current'] = ($groupid == $data['groupid']);
		$admingroups[] = $data;
	}
	return $admingroups;
}
?>