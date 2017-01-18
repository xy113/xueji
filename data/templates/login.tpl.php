<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户登录-<?php echo $config['sitename']?></title>
<meta name="keywords" content="<?php echo $config['keywords']?>" />
<meta name="description" content="<?php echo $config['description']?>" />
<link href="static/images/login.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body>
<div class="loginbox">
<div class="title"><?php echo $config['sitename']?></div> 
<form method="post" id="login" action="<?php echo $BASESCRIPT?>?action=login">
    <table width="100%" border="0" cellspacing="1" class="form">
      <tr>
        <td>用户名：</td>
        <td><input type="text" name="username" id="username" /></td>
      </tr>
      <tr>
        <td>密　码：</td>
        <td><input type="password" name="password" id="password" /></td>
      </tr>
      <tr>
        <td>验证码：</td>
        <td><input type="text" name="randcode" id="randcode" style="width:80px; vertical-align:middle;" /> <img src="source/include/randcode.php" id="imgcode" border="0" align="absmiddle" style="cursor:pointer;" onclick="this.src='source/include/randcode.php?'+Math.random()" title="点击刷新验证码" /></td>
      </tr>
    </table>
<div class="button"><input type="submit" value="登 录" class="btnlogin" />　<a href="<?php echo $BASESCRIPT?>?action=register">没有账号，点这里申请</a></div>
</form>
</div>
<div class="copyright"><?php echo $config['copyright']?>　技术支持：<a href="http://www.toking.cc" target="_blank">拓垦科技</a></div>
<script type="text/javascript">
$("#login").submit(function(){
if(!$("input[name=username]").val()){
alert("用户名不能留空");
return false;
}
if(!$("input[name=password]").val()){
alert("用户名不能留空");
return false;
}
if(!$("input[name=randcode]").val()){
alert("用户名不能留空");
return false;
}
return true;
})
</script>
</body>
</html>