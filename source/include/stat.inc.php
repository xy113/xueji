<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-07-25
 * $Id: import.inc.php
*/ 
if (!defined('IN_XSCMS')){die('Access Denied!');}
$no = 1;
$sqladd = '';
$schools = $total = $xlsdata = array();
$xlsdata[0] = array('编号 ','学校','所在乡镇','学生总数','男生人数','女生人数');
if ($admincp['groupid'] == 3){
	$sqladd = " WHERE t.tid='$admincp[tid]'";
}elseif ($admincp['groupid'] == 4){
	$sqladd = " WHERE s.sid='$admincp[sid]'";
}elseif ($admincp['groupid'] == 5){
	message('noaccess','error');
}
if ($atype == 1){
	$sqladd.= $sqladd ? " AND s.stype=1" : " WHERE s.stype=1";
}elseif ($atype == 2 || $atype == 3){
	$sqladd.= $sqladd ? " AND s.stype=2" : " WHERE s.stype=2";
}
$sqladd2 = $atype ? " AND atype='".$lang['atype'][$atype]."'" : '';
$query = $db->query("SELECT s.*,t.town FROM sdw_school s LEFT JOIN sdw_town t ON t.tid=s.tid $sqladd ORDER BY s.sid");
while ($data = $db->fetch_array($query)){
	$data['no'] = $no++;
	$count = $db->GetOne("SELECT COUNT(*) FROM sdw_student WHERE school='$data[sname]'$sqladd2");
	$data['total'] = $count['COUNT(*)'];
	$count = $db->GetOne("SELECT COUNT(*) FROM sdw_student WHERE school='$data[sname]' AND sex='男'$sqladd2");
	$data['male'] = $count['COUNT(*)'];
	$count = $db->GetOne("SELECT COUNT(*) FROM sdw_student WHERE school='$data[sname]' AND sex='女'$sqladd2");
	$data['female'] = $count['COUNT(*)'];
	$total['total']+= $data['total'];
	$total['male']+= $data['male'];
	$total['female']+= $data['female'];
	$xlsdata[] = array($data['no'],$data['sname'],$data['town'],$data['total'],$data['male'],$data['female']);
	$schools[] = $data;
}
if ($do == 'export'){
	require_once ROOT_PATH.'/source/class/class.php_excel.php';
	$xls = new Excel_XML('GB2312');
	$xls->addArray($xlsdata);
	$xls->generateXML(random(10));
	exit();
}else {
	showheader();
	include template('stat');
}
?>