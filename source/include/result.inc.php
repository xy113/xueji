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
 * $Id: result.inc.php
*/ 
if (!defined('IN_XSCMS')){die('Access Denied!');}
showheader();
if ($formsubmit == 'yes'){
	if (!(strtolower(end(explode('.',$_FILES['file']['name'])))=='xls')){
		message('source_type_error','error');
	}
	if ($filename = $_FILES['file']['tmp_name']){
		require_once ROOT_PATH.'/source/excel/reader.php';
		$xls = new Spreadsheet_Excel_Reader();
		$xls->setOutputEncoding('GB2312');
		$xls->read($filename);
		if (!($xls->sheets[0]['numCols']==24)){
			message('data_file_error','error');
		}
		for ($i = 2; $i <= $xls->sheets[0]['numRows']; $i++) {
			$data = $xls->sheets[0]['cells'][$i];
			//$db->query("INSERT INTO sdw_result VALUES('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]',
			//'$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$data[23]','$data[24]')");
			$db->insert('sdw_result',array('studentid'=>$data[1],'name'=>$data[2],'grade'=>$data[3],'xueqi'=>$data[4],'yuwen'=>$data[5],'shuxue'=>$data[6],
			'waiyu'=>$data[7],'wuli'=>$data[8],'huaxue'=>$data[9],'shengwu'=>$data[10],'zhengzhi'=>$data[11],'dili'=>$data[12],'lishi'=>$data[13],
			'ziran'=>$data[14],'tiyu'=>$data[15],'meishu'=>$data[16],'yinyue'=>$data[17],'kexue'=>$data[18],'bingjia'=>$data[19],
			'shijia'=>$data[20],'kuangke'=>$data[21],'chidao'=>$data[22],'zaotui'=>$data[23],'qita'=>$data[24]),FALSE,TRUE);
		}
		message('result_import_succeed');
	}else {
		message('nofile','error');
	}
}else {
	include template('result');
}
?>