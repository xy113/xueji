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
 * $Id: cplog.inc.php
 **/
if (!defined('IN_XSCMS')){die('Access Denied!');}
showheader();
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		message('undefined_action','error');
	}
	if (is_array($delete)){
		$ids = implodeids($delete);
		$db->query("DELETE FROM sdw_adminlog WHERE id IN ($ids)");
	}
	message('drop_succeed');
}else {
	$pagesize = 50;
	$cplogs = array();
	$data = $db->GetOne("SELECT COUNT(*) FROM sdw_adminlog");
	$totalrecords = $data['COUNT(*)'];
	$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
	$start_limit = ($page-1) * $pagesize;
	$query = $db->query("SELECT a.*,u.username FROM sdw_adminlog a LEFT JOIN sdw_admins u ON u.adminid=a.adminid ORDER BY a.id LIMIT $start_limit,$pagesize");
	while ($data = $db->fetch_array($query)){
		$data['dateline'] = date('Y-m-d H:i:s',$data['dateline']);
		$cplogs[] = $data;
	}
	$pagelink = pagination($page,$pagecount);
	include template('cplog');
}
?>