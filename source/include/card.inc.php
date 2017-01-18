<?php
/**
 * ============================================================================
 * 版权所有 (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved。
 * 网站地址: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2012-08-03
 * $Id: card.inc.php
 **/
if (!defined('IN_XSCMS')){die('Access Denied!');}
//showheader();
$student = $db->GetOne("SELECT * FROM sdw_student WHERE studentid='$studentid'");
$family = $tasks = array();
$query = $db->query("SELECT * FROM sdw_family WHERE studentid='$studentid' ORDER BY studentid");
while ($data = $db->fetch_array($query)){
	$family[] = $data;
}
$fcounts = $family ? count($family) : 2;
$query = $db->query("SELECT * FROM sdw_task WHERE studentid='$studentid' AND trail=1 AND final=1");
while ($data = $db->fetch_array($query)){
	$data['date'] = date('Y-m-d',$data['dateline']);
	$tasks[$data['category']][] = $data;
}
$results = array();
$query = $db->query("SELECT * FROM sdw_result WHERE studentid='$studentid'");
while ($data = $db->fetch_array($query)){
	$results[$data['grade']][$data['xueqi']] = $data;
}
$xueqi1 = $results[1][1];
$xueqi2 = $results[1][2];
$xueqi3 = $results[2][1];
$xueqi4 = $results[2][2];
$xueqi5 = $results[3][1];
$xueqi6 = $results[3][2];
$xueqi7 = $results[4][1];
$xueqi8 = $results[4][2];
$xueqi9 = $results[5][1];
$xueqi10 = $results[5][2];
$xueqi11 = $results[6][1];
$xueqi12 = $results[6][2];
include template('card');
?>