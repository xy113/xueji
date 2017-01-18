<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $announce['title']?>-<?php echo $config['sitename']?></title>
<meta name="keywords" content="<?php echo $config['keywords']?>" />
<meta name="description" content="<?php echo $config['description']?>" />
<link href="static/images/style.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body>
<div class="body" style="width:780px; margin:0 auto;">
<h1 class="announce-title"><?php echo $announce['title']?></h1>
<div class="announce-info">发布人：<?php echo $announce['author']?>　发布时间：<?php echo $announce['dateline']?></div>
<div class="announce-body"><?php echo $announce['body']?></div>
<div class="announce-sign">署名：<?php echo $announce['sign']?></div>
</div>
<div class="copyright"><?php echo $config['copyright']?>　技术支持：<a href="http://www.toking.cc" target="_blank">拓垦科技</a></div>