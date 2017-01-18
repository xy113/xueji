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
showheader();
if ($formsubmit == 'yes'){
	if (!(strtolower(end(explode('.',$_FILES['file']['name'])))=='xls')){
		message('source_type_error','error');
	}
	if ($filename = $_FILES['file']['tmp_name']){
		/*
		$i = 0;
		$students = $idarray = array();
		$handle = @fopen($filename,'r');
		while ($data = fgetcsv($handle)){
			if ($i>0){
				if (!(count($data)==14)){
					message('data_file_error','error');
				}else {
					$idarray[] = $data[1];
					$students[] = $data;
				}
			}
			$i++;
		}
		@fclose($handle);
		$ids = implodeids($idarray);
		$data = $db->GetOne("SELECT * FROM sdw_student WHERE studentid IN ($ids)");
		if ($data){
			message('student_data_exists','error');	
		}else {
			foreach ($students as $student){
				$db->query("INSERT INTO sdw_student(schoolyear,studentid,name,school,atype,grade,class,sex,nation,birthplace,birthday,graduate,score,source)VALUES
						('$student[0]','$student[1]','$student[2]','$student[3]','$student[4]','$student[5]','$student[6]','$student[7]','$student[8]','$student[9]','$student[10]','$student[11]','$student[12]','$student[13]')");
			}
		}
		message('student_import_succeed');
		*/
		require_once ROOT_PATH.'/source/excel/reader.php';
		$xls = new Spreadsheet_Excel_Reader();
		$xls->setOutputEncoding('GB2312');
		$xls->read($filename);
		if (!($xls->sheets[0]['numCols']==16)){
			message('data_file_error','error');
		}
		$students = $idarray = $idnumbers = array();
		for ($i = 2; $i <= $xls->sheets[0]['numRows']; $i++) {
			$students[] = $xls->sheets[0]['cells'][$i];
			$idarray[] = $xls->sheets[0]['cells'][$i][2];
			$idnumbers[] = $xls->sheets[0]['cells'][$i][4];
		}
		$ids = implodeids($idarray);
		$ids2 = implodeids($idnumbers);
		$data = $db->GetOne("SELECT * FROM sdw_student WHERE studentid IN ($ids) OR idnumber IN ($ids2)");
		if ($data){
			message('student_data_exists','error');	
		}else {
			foreach ($students as $student){
				//printr($student);
				$student = daddslashes($student);
				$db->query("INSERT INTO sdw_student(schoolyear,studentid,name,idnumber,school,atype,grade,class,sex,nation,birthplace,birthday,graduate,accountid,address,source,avatar)VALUES(
				'$student[1]','$student[2]','$student[3]','$student[4]','$student[5]','$student[6]','$student[7]','$student[8]','$student[9]','$student[10]','$student[11]','$student[12]','$student[13]','$student[14]','$student[15]','$student[16]','".$student[2].".jpg')");
			}
		}
		message('student_import_succeed');
	}else {
		message('nofile','error');
	}
}else {
	include template('import');
}
?>