<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-07-17
 * $Id: export.inc.php
*/ 
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
$no = 0;
$data = $where = array();
$data[0] = array('���','��ѧ���','ѧ����','����','����ѧУ','��ѧ���','�꼶','�༶','�Ա�','����','����','��������','��ҵѧУ','��ѧ�ܷ�','��Դ�䶯');
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
}else {
	$sqladd = 'WHERE ';
	switch ($field){
		case 'name' : $sqladd.= "name LIKE '%$keywords%'"; break;
		case 'studentid' : ($sqladd.= $keywords ? "studentid='$keywords'" : ''); break;
		case 'schoolyear' : ($sqladd.= $keywords ? "schoolyear='$keywords'" : ''); break;
		default: $sqladd.= "name LIKE '%$keywords%'";
	}
}
$query = $db->query("SELECT * FROM sdw_student $sqladd ORDER BY id ASC");
while ($student = $db->fetch_array($query)){
	$no++;
	$data[] = array($no,$student['schoolyear'],$student['studentid'],$student['name'],$student['school'],$student['atype'],$student['grade'],
	$student['class'],$student['sex'],$student['nation'],$student['birthplace'],$student['birthday'],$student['graduate'],$student['score'],$student['source']);
}
include ROOT_PATH.'/source/class/class.php_excel.php';
$xls = new Excel_XML('GB2312',FALSE,'ѧ����Ϣ��');
$xls->addArray($data);
$xls->generateXML(date('Ymdhis',$timestamp));
exit();
/*
require_once ROOT_PATH.'/source/class/class.csv.php';
$csv = new Csv();
$csv->addData($data);
$csv->getCsv(random(10));
unset($data);
exit();
*/
?>