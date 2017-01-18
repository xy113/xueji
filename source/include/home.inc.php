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
 * $Id: home.inc.php
 **/
if (!defined('IN_XSCMS')){die('Access Denied!');}
showheader();
$announces = array();
$query = $db->query("SELECT id,title,dateline FROM sdw_announce ORDER BY id DESC LIMIT 0,10");
while ($result = $db->fetch_array($query)){
	$result['dateline'] = date('Y-m-d',$result['dateline']);
	$announces[] = $result;
}
include template('home');
?>