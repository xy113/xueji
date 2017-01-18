<?php
if (!defined('IN_XSCMS')){die('Access Denied!');}
class Csv{
	private $text = '';
	function __construct(){
		$this->Csv();
		
	}
	function Csv(){
		
	}
	function addData($data=array()){
		foreach ($data as $key=>$value){
			$this->text.= implode(',',$value)."\n";
		}
	}
	function getCsv($filename='',$charset='GB2312'){
		!$filename && $filename = date('YmdHis');
		$filename = preg_replace('/[^aA-zZ0-9\_\-]/', '', $filename);
		header("Content-type:text/csv;charset=$charset");
		header("Content-Disposition:attachment;filename=".iconv($charset,'UTF-8',$filename).".csv");
		header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
		header('Expires:0');
		header('Pragma:public'); 
		echo $this->text;
	}
	function readCsv($file){
		$csvdata = array();
		$handle = @fopen($file,'r');
		while ($data = fgetcsv($handle)){
			$csvdata[] = $data;
		}
		return $csvdata;
	}
}
?>