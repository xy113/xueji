<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>学生信息录入</title>
<link href="static/images/style.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="index.php?action=home">首页</a></li>
<li>学生信息管理</li>
<li>选择学校</li>
</ul>
</div>
<div class="body">
<h3 class="choosetitle">选择乡镇</h3>
<div class="chooselist">
<a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&tid=0"<?php if(!$tid) { ?> style="font-weight:bold;"<?php } ?>>所有学校</a><?php if(is_array($towns)) { foreach($towns as $town) { ?><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&tid=<?php echo $town['tid']?>"<?php if($tid==$town['tid']) { ?> style="font-weight:bold;"<?php } ?>><?php echo $town['town']?></a><?php } } ?></div>
<h3 class="choosetitle">选择学校</h3>
<div class="chooselist"><?php if(is_array($schools)) { foreach($schools as $school) { ?><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&sid=<?php echo $school['sid']?>&sname=<?php echo $school['sname']?>"><?php echo $school['sname']?></a><?php } } ?></div>
</div>
</body>
</html>