<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-07-31
 * $Id: input.inc.php
 **/
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
showheader();
if (!$category){
	message('undefined_action','error');
}
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		message('undefined_action','error');
	}
	$tasknew['dateline'] = $timestamp;
	$tasknew['adminid'] = $admincp['adminid'];
	$db->insert('sdw_task',$tasknew);
	message('task_submited');
	/*
	$data = $db->GetOne("SELECT * FROM sdw_task WHERE studentid='$studentid' AND status='0'");
	if ($data){
		message('task_unhandled','error');
	}
	$student = $db->GetOne("SELECT * FROM sdw_student WHERE studentid='$studentid'");
	if (!$student){
		message('student_noexists','error');
	}else {
		$task['studentid'] = $studentid;
		$task['category'] = $category;
		$task['tasktitle'] = '申请'.$lang['tasktype'][$category];
		$task['body'] = $body;
		$task['adminid'] = $admincp['adminid'];
		$task['dateline'] = $timestamp;
		$task['newid'] = $newid;
		$task['manager'] = $manager;
		$task['whereabouts'] = $whereabouts;
		$db->insert('sdw_task',$task);
		message('task_submited');
	}*/
}else {
	$date = date('Y-m-d',$timestamp);
	include template('change');
}
?>