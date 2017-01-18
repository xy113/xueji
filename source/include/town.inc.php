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
 * $Id: town.inc.php
 **/
if (!defined('IN_XSCMS')){die('Access Denied!');}
showheader();
if ($formsubmit == 'yes'){
	if (!($formhash == FORMHASH)){
		message('undefined_action','error');
	}
	if (is_array($delete)){
		$ids = implodeids($delete);
		$db->query("DELETE FROM sdw_town WHERE tid IN ($ids)");
	}
	if ($newtown){
		foreach ($newtown as $town){
			if ($town){
				$db->query("INSERT INTO sdw_town(town)VALUES('$town')");
			}
		}
	}
	if ($townnew){
		foreach ($townnew as $tid=>$town){
			$db->query("UPDATE sdw_town SET town='$town' WHERE tid='$tid'");
		}
	}
	message('edit_succeed');
}else {
	$towns = array();
	$query = $db->query("SELECT tid,town FROM sdw_town ORDER BY tid");
	while ($data = $db->fetch_array($query)){
		$towns[] = $data;
	}
	include template('town');
}
?>