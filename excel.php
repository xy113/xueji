<?php
require_once './source/excel/reader.php';
$xls = new Spreadsheet_Excel_Reader();
$xls->setOutputEncoding('GB2312');
$xls->read('test.xls');
error_reporting(E_ALL ^ E_NOTICE);
for ($i = 2; $i <= $xls->sheets[0]['numRows']; $i++) {
	for ($j = 1; $j <= $xls->sheets[0]['numCols']; $j++) {
		echo "".$xls->sheets[0]['cells'][$i][$j].",";
	}
	echo "<br>\n";
}
?>