<?php
error_reporting(E_ALL & ~E_NOTICE);
		require_once './class.ascii.php';

		//加载EXCEL操作类
		require_once './excel_class.php';

		//加载EXCEL文件Sheet1名		
		$file_sheet = "Sheet1";

		Read_Excel_File("222.xls",$return);

		$ascii = new ascii;
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<meta http-equiv="Pragma" content="no-cache" />
<meta content="Liupeng.us,Liupeng" name="keywords" />
<meta content="Liupeng.us,Liupeng" name="description" />
<meta content="Liupeng.us" name="copyright" />
<meta content="Liupeng.us" name="author" />
<link rel="shortcut icon" href="http://liupeng.us/favicon.ico" type="image/x-icon" />
<title>Liupeng.us  - 基于PHP的EXCEL的数据导入</title>
<style type="text/css">
body {height:100%;margin:0;padding:0;font-size:14px;background:#FFF;color:#333;font: 12px/170%  'Lucida Grande',Arial, 'Lucida Sans Unicode', Geneva, Verdana, Sans-Serif; text-align:center;}
table {margin:10px auto;border-collapse:collapse; text-align:left;}
th,td {padding:6px;vertical-align:middle;border:1px dotted #96C2F1;border-collapse:collapse;}
th {background:#DFDFDF;}
tr {background:#EFF7FF;}
p.comm{padding:10px;text-align:center;font-size:13px;color:#CC0000;width:480px;border:1px solid #ADCD3C;margin:10px auto;}
</style>

</head>
<body>

<p class="comm">下表为未经过ASCII转换的数据表，虽然浏览器显示正常，但是 <strong>查看页面源代码</strong> 发现，都是"& #22995"的ASCII，读取后插入数据库也是纯ASCII值</p>
<table width="500px" border="0" cellspacing="0" cellpadding="0">
	<?php
		//这里的$i=1是指定读取起始行数
		for ($i=0;$i<count($return[$file_sheet]);$i++)
		{
			echo "<tr>";
			for ($j=0;$j<count($return[$file_sheet][$i]);$j++)
			{
				echo "<td>".$return[$file_sheet][$i][$j]."</td>";
			}
			echo "</tr>";
		}
	?>
</table>

<p class="comm">下表为已经对数据进行ASCII DECODE转换之后的结果，<strong>查看页面源代码</strong>可以看到正确显示</p>
<table width="500px" border="0" cellspacing="0" cellpadding="0">
	<?php
		//这里的$i=0是指定读取起始行数
		for ($i=0;$i<count($return[$file_sheet]);$i++)
		{
			echo "<tr>";
			for ($j=0;$j<count($return[$file_sheet][$i]);$j++)
			{
				echo "<td>".$ascii->decode($return[$file_sheet][$i][$j])."</td>";
			}
			echo "</tr>";
		}
	?>
</table>

 </body>
</html>
