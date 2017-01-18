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
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		message('undefined_action','error');
	}
	$data = $db->GetOne("SELECT name FROM sdw_student WHERE studentid='$studentnew[studentid]'");
	if ($data){
		message('student_exists','error');
	}
	$file = &$_FILES['file'];
	if ($file['name']){
		if ($file['size']>2097152){
			message('file_tolarge','error');
		}
		$ext = strtolower(str_replace(".","",substr($file['name'],strrpos($file['name'],'.'))));
		if (!in_array($ext,array('jpg','gif'))){
			message('file_type_error','error');
		}
		$filename = $studentnew['studentid'].'.'.$ext;
		if (@move_uploaded_file($file['tmp_name'],ROOT_PATH.'/data/avatar/'.$filename)){
			$studentnew['avatar'] = $filename;
		}
	}
	$db->insert('sdw_student',$studentnew);
	if ($newname){
		foreach ($newname as $key=>$name){
			if ($name){
				$db->insert('sdw_family',array('studentid'=>$studentnew['studentid'],'name'=>$name,'relationship'=>$relationship[$key],
				'job'=>$newjob[$key],'workplace'=>$workplace[$key]),FALSE,TRUE);
			}
		}
	}
	message('save_succeed');
}else {
	if ($sid && $sname){
		$years = $nations = array();
		for ($i=2000;$i<=date('Y',$timestamp);$i++){
			$years[] = $i;
		}
		$query = $db->query("SELECT nation FROM sdw_nations ORDER BY id");
		while ($data = $db->fetch_array($query)){
			$nations[] = $data;
		}
		include template('input');
	}else {
		$towns = $schools = array();
		$query = $db->query("SELECT tid,town FROM sdw_town ORDER BY tid");
		while ($data = $db->fetch_array($query)){
			$towns[] = $data;
		}
		$query = $db->query("SELECT sid,sname FROM sdw_school ".($tid ? "WHERE tid='$tid'" : "")." ORDER BY sid");
		while ($data = $db->fetch_array($query)){
			$schools[] = $data;
		}
		include template('choose');
	}
}
?>