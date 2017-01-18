<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-07-24
 * $Id: task.inc.php
 **/
if (!defined('IN_XSCMS')){die('Access Denied!');}
if ($formsubmit == 'yes'){
	showheader();
	if (!($formhash == FORMHASH)){
		message('undefiend_action','error');
	}
	if ($do == 'refuse'){
		$ids = stripslashes($ids);
		if ($type == 'trail'){
			$db->query("UPDATE sdw_task SET trail='-1',final='-1',trailadmin='$admincp[username]',freason1='$reason' WHERE taskid IN ($ids)");
		}else {
			$db->query("UPDATE sdw_task SET status='1',final='-1',finaladmin='$admincp[username]',freason2='$reason' WHERE taskid IN ($ids)");
		}
		message('operation_complete');
	}else {
		if (is_array($taskid)){
			$ids = implodeids($taskid);
			if ($do == 'trail'){
				$db->query("UPDATE sdw_task SET trail='1',trailadmin='$admincp[username]' WHERE taskid IN ($ids)");
			}elseif ($do == 'untrail'){
				$type = 'trail';
				include template('refuse');
				exit();	
			}elseif ($do == 'final'){
				$query = $db->query("SELECT taskid,category,studentid FROM sdw_task WHERE taskid IN ($ids)");
				while ($data = $db->fetch_array($query)){
					if ($data['category'] == 3){
						$student = $db->GetOne("SELECT * FROM sdw_student WHERE studentid='$data[studentid]'");
						$student['category'] = 3;
						$db->insert('sdw_student_rollout',$student,FALSE,TRUE);
						$db->query("DELETE FROM sdw_student WHERE studentid='$data[studentid]'");
					}elseif ($data['category'] == 4){
						$student = $db->GetOne("SELECT * FROM sdw_student WHERE studentid='$data[studentid]'");
						$student['category'] = 4;
						$db->insert('sdw_student_rollout',$student,FALSE,TRUE);
						$db->query("DELETE FROM sdw_student WHERE studentid='$data[studentid]'");
					}elseif ($data['category'] ==  5){
						$student = $db->GetOne("SELECT * FROM sdw_student_rollout WHERE studentid='$data[studentid]'");
						unset($student['category']);
						$db->insert('sdw_student',$student);
					}elseif ($data['category']==7){
						$student['category'] = 7;
						$db->insert('sdw_student_rollout',$student,FALSE,TRUE);
						$db->query("DELETE FROM sdw_student WHERE studentid='$data[studentid]'");
					}
				}
				$db->query("UPDATE sdw_task SET status='1',trail='1',final='1',finaladmin='$admincp[username]' WHERE taskid IN ($ids)");
			}elseif ($do == 'unfinal'){
				$type = 'final';
				$tid = serialize($taskid);
				include template('refuse');
				exit();			
			}elseif ($do == 'delete'){
				if ($isfounder){
					$db->query("DELETE FROM sdw_task WHERE taskid IN ($ids)");
				}else {
					message('noaccess','error');
				}
			}
			message('operation_complete');
		}else {
			message('noselect','error');
		}
	}
}else {
	if ($do == 'export'){
		$no = 0;
		$tasks[0] = array('编号','处理情况','事项类型','所在学校','学籍号','学生姓名','身份证号','变更时间','经办人','变更原因','初审情况','终审情况');
		$sqladd = "WHERE t.body LIKE '%$keywords%'";
		$sqladd.= !($status == '') ? " AND t.status='$status'" : '';
		$sqladd.= !($category == '') ? " AND t.category='$category'" : '';
		$sqladd.= $dateline ? " AND FROM_UNIXTIME(t.dateline,'%Y-%m-%d')='$dateline'" : '';
		$query = $db->query("SELECT t.*,a.username,s.name,s.school FROM sdw_task t LEFT JOIN sdw_admins a ON a.adminid=t.adminid LEFT JOIN 
		sdw_student s ON t.studentid=s.studentid $sqladd ORDER BY t.taskid DESC");
		while ($data = $db->fetch_array($query)){
			$no++;
			$data['taskstatus']  = $lang['taskstatus'][$data['status']]; 
			$data['dateline'] = date('Y-m-d H:i',$data['dateline']);
			$data['tasktype'] = $lang['tasktype'][$data['category']];
			$data['trailstatus'] = $lang['auditstatus'][$data['trail']];
			$data['finalstatus'] = $lang['auditstatus'][$data['final']];
			$tasks[] = array($no,$data['taskstatus'],$data['tasktype'],$data['school'],$data['studentid'],$data['name'],$data['idnumber'],
			$data['changetime'],$data['manager'],$data['body'],$data['trailstatus'],$data['finalstatus']);
		}
		//printr($tasks);exit();
		require_once ROOT_PATH.'/source/class/class.php_excel.php';
		$xls = new Excel_XML('GB2312',FALSE,'学籍审查情况表');
		$xls->addArray($tasks);
		$xls->generateXML(random(10));
		dexit();
	}elseif ($do == 'detail'){
		showheader();
		$task = $db->GetOne("SELECT * FROM sdw_task WHERE taskid='$taskid'");
		$task['taskstatus']  = $lang['taskstatus'][$task['status']];
		$task['dateline'] = date('Y-m-d H:i:s',$task['dateline']);
		$task['tasktype'] = $lang['tasktype'][$task['category']];
		$task['trailstatus'] = $lang['auditstatus'][$task['trail']];
		$task['finalstatus'] = $lang['auditstatus'][$task['final']];
		include template('task_detail');
	}else {
		showheader();
		/*
		$pagesize = 30;
		$tasks = array();
		$color = array('-1'=>'#FF0000','0'=>'#333','1'=>'#006600');
		$sqladd = "WHERE t.body LIKE '%$keywords%'";
		$sqladd.= !($status == '') ? " AND t.status='$status'" : '';
		$sqladd.= !($category == '') ? " AND t.category='$category'" : '';
		$sqladd.= $dateline ? " AND FROM_UNIXTIME(t.dateline,'%Y-%m-%d')='$dateline'" : '';
		if ($admincp['groupid']==3){
			$schools = $comm = '';
			$query = $db->query("SELECT sname FROM sdw_school WHERE tid='$admincp[tid]'");
			while ($data = $db->fetch_array($query)){
				$schools.= $comm."'".$data['sname']."'";
				$comm = ',';
			}
			!$schools && $schools = 0;
			$sqladd.= " AND s.school IN ($schools)";
		}
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_task t LEFT JOIN sdw_student s ON s.studentid=t.studentid $sqladd");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT t.*,a.username,s.name,s.school FROM sdw_task t LEFT JOIN sdw_admins a ON a.adminid=t.adminid LEFT JOIN 
		sdw_student s ON s.studentid=t.studentid $sqladd ORDER BY t.taskid DESC LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['taskstatus']  = $lang['taskstatus'][$data['status']];
			$data['dateline'] = date('Y-m-d H:i:s',$data['dateline']);
			$data['tasktype'] = $lang['tasktype'][$data['category']];
			$data['trailstatus'] = $lang['auditstatus'][$data['trail']];
			$data['finalstatus'] = $lang['auditstatus'][$data['final']];
			$data['tcolor'] = $color[$data['trail']];
			$data['fcolor'] = $color[$data['final']];
			$tasks[] = $data;
		}*/
		$pagesize = 30;
		$tasks = array();
		$color = array('-1'=>'#FF0000','0'=>'#333','1'=>'#006600');
		$sqladd = "WHERE body LIKE '%$keywords%'";
		$sqladd.= !($status == '') ? " AND status='$status'" : '';
		$sqladd.= !($category == '') ? " AND category='$category'" : '';
		$sqladd.= $dateline ? " AND FROM_UNIXTIME(dateline,'%Y-%m-%d')='$dateline'" : '';
		if ($admincp['groupid']==3){
			$schools = $comm = '';
			$query = $db->query("SELECT sname FROM sdw_school WHERE tid='$admincp[tid]'");
			while ($data = $db->fetch_array($query)){
				$schools.= $comm."'".$data['sname']."'";
				$comm = ',';
			}
			!$schools && $schools = 0;
			$sqladd.= " AND school IN ($schools)";
		}
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_task $sqladd");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT * FROM sdw_task $sqladd ORDER BY taskid DESC LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['taskstatus']  = $lang['taskstatus'][$data['status']];
			$data['dateline'] = date('Y-m-d H:i:s',$data['dateline']);
			$data['tasktype'] = $lang['tasktype'][$data['category']];
			$data['trailstatus'] = $lang['auditstatus'][$data['trail']];
			$data['finalstatus'] = $lang['auditstatus'][$data['final']];
			$data['tcolor'] = $color[$data['trail']];
			$data['fcolor'] = $color[$data['final']];
			$tasks[] = $data;
		}
		$pagelink = pagination($page,$pagecount,"keywords=$keywords&status=$status&category=$category&dateline=$dateline");
		include template('task');
	}
}
?>