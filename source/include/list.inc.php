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
 * $Id: list.inc.php
*/ 
if (!defined('IN_XSCMS')){die('Access Denied!');}
showheader();
if ($formsubmit == 'yes'){
	if(!($formhash == FORMHASH)){
		message('undefined_action','error');
	}
	if (!in_array($admincp['groupid'],array(1,2))){
		message('noaccess','error');
	}
	if (!is_array($delete)){
		message('noselect','error');
	}else {
		$ids = implodeids($delete);
		$db->query("DELETE FROM sdw_student WHERE id IN ($ids)");
		message('drop_succeed');
	}
}
$no = 0;
$pagesize = 50;
$students = array();
if ($advance){
	$sqladd = "WHERE name LIKE '%$name%'";
	$sqladd.= $studentid ? " AND studentid='$studentid'" : '';
	$sqladd.= $school ? " AND sname='$school'" : '';
	$sqladd.= $schoolyear ? " AND schoolyear='$schoolyear'" : '';
	$sqladd.= $atype ? " AND atype='$atype'" : '';
	$sqladd.= $grade ? " AND grade='$grade'" : '';
	$sqladd.= !empty($sex) ? "AND sex='$sex'" : '';
	$sqladd.= $class ? " AND class='$class'" : '';
	$sqladd.= $birthday ? " AND birthday='$birthday'" : '';
	$sqladd.= $nation ? " AND nation='$nation'" : '';
	$sqladd.= $birthplace ? " AND birthplace='$birthplace'" : '';
	$sqladd.= $source ? " AND source='$source'" : '';
	$querystring = "advance=$advance&name=$name&studentid=$studentid&school=$school&schoolyear=$schoolyear&atype=$atype&grade=$grade";
	$querystring.= "&sex=$sex&class=$class&birthday=$birthday&nation=$nation&birthplace=$birthplace&source=$source";
}else {
	$sqladd = '';
	switch ($field){
		case 'name' : $sqladd.= "name LIKE '%$keywords%'"; break;
		case 'studentid' : $sqladd.= ($keywords ? "studentid='$keywords'" : ''); break;
		case 'schoolyear' : $sqladd.= ($keywords ? "schoolyear='$keywords'" : ''); break;
		default: $sqladd.= "name LIKE '%$keywords%'";
	}
	$sqladd = $sqladd ? ' WHERE '.$sqladd : '';
	$querystring = "advance=$advance&field=$field";
}
$data = $db->GetOne("SELECT COUNT(*) FROM sdw_student $sqladd");
$total = $data['COUNT(*)'];
$pagecount = $total<$pagesize ? 1 : ceil($total/$pagesize);
$start_limit = ($page-1)*$pagesize;
$query = $db->query("SELECT * FROM sdw_student $sqladd ORDER BY id ASC LIMIT $start_limit,$pagesize");
while ($data = $db->fetch_array($query)){
	$no++;
	$data['no'] = $start_limit+$no;
	$students[] = $data;
}
$pagelink = pagination($page,$pagecount,$querystring);
$years = array();
for ($year=2000;$year<=date('Y',$timestamp);$year++){
	$years[] = $year;
}
include template('list');
?>