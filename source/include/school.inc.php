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
 * $Id: school.inc.php
 **/
if (!defined('IN_XSCMS')){die('Access Denied!');}
showheader();
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		message('undefined_action','error');
	}
	if (is_array($delete)){
		$ids = implodeids($delete);
		$db->query("DELETE FROM sdw_school WHERE sid IN ($ids)");
	}
	if ($schoolnew){
		foreach ($schoolnew as $sid=>$school){
			$db->update('sdw_school',$school,"sid='$sid'");
		}
	}
	if ($newsname){
		foreach ($newsname as $key=>$sname){
			if ($sname){
				$db->insert('sdw_school',array('sname'=>$sname,'stype'=>$newtype[$key],'tid'=>$newtid[$key]));
			}
		}
	}
	message('modi_succeed');
}else {
	$towns = listtowns($tid);
	$schools = array();
	$pagesize = 50;
	$sqladd = $tid ? " WHERE s.tid='$tid'" : '';
	$sqladd.= $stype ? ($sqladd ? " AND " : " WHERE ")."s.stype='$stype'" : '';
	$data = $db->GetOne("SELECT COUNT(*) FROM sdw_school s LEFT JOIN sdw_town t ON t.tid=s.tid $sqladd");
	$totalrecords = $data['COUNT(*)'];
	$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
	$start_limit = ($page-1)*$pagesize;
	$query = $db->query("SELECT s.*,t.town FROM sdw_school s LEFT JOIN sdw_town t ON t.tid=s.tid $sqladd ORDER BY s.sid LIMIT $start_limit,$pagesize");
	while ($data = $db->fetch_array($query)){
		$schools[] = $data;
	}
	$pagelink = pagination($page,$pagecount,"tid=$tid");
	include template('school');
}
?>