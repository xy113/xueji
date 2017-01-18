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
 * $Id: announce.inc.php
 **/
if (!defined('IN_XSCMS')){die('Access Denied!');}
showheader();
if ($formsubmit == 'yes'){
	if ($do == 'add'){
		$announcenew = array_merge($announcenew,array('dateline'=>$timestamp,'author'=>$admincp['username']));
		$db->insert('sdw_announce',$announcenew);
		message('save_succeed');
	}elseif ($do == 'edit'){
		$db->update('sdw_announce',$announcenew,"id='$id'");
		message('modi_succeed');
	}else {
		if (is_array($delete)){
			$ids = implodeids($delete);
			$db->query("DELETE FROM sdw_announce WHERE id IN ($ids)");
		}
		message('drop_succeed');
	}
}else {
	if ($do == 'add'){
		$fckeditor = FCK('announcenew[body]');
	}elseif ($do == 'edit'){
		$announce = $db->GetOne("SELECT * FROM sdw_announce WHERE id='$id'");
		$fckeditor = FCK('announcenew[body]',$announce['body']);
	}else {
		$pagesize = 50;
		$announces = array();
		$data = $db->GetOne("SELECT COUNT(*) FROM sdw_announce");
		$totalrecords = $data['COUNT(*)'];
		$pagecount = $totalrecords<$pagesize ? 1 : ceil($totalrecords/$pagesize);
		$start_limit = ($page-1) * $pagesize;
		$query = $db->query("SELECT id,title,sign,author,dateline FROM sdw_announce ORDER BY id DESC LIMIT $start_limit,$pagesize");
		while ($data = $db->fetch_array($query)){
			$data['dateline'] = date('Y-m-d H:i:s',$data['dateline']);
			$announces[] = $data;
		}
		$pagelink = pagination($page,$pagecount);
	}
	include template('announce');
}
?>