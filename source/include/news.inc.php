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
 * $Id: news.inc.php
 **/
if (!defined('IN_XSCMS')){
	die('Access Denied!');
}
//$db->query("UPDATE sdw_announce SET views=views+1 WHERE id='$id'");
$announce = $db->GetOne("SELECT * FROM sdw_announce WHERE id='$id'");
$announce['dateline'] = date('Y-m-d H:i:s',$announce['dateline']);
include template('news');
?>