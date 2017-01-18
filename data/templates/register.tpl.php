<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>账号申请-<?php echo $config['sitename']?></title>
<meta name="keywords" content="<?php echo $config['keywords']?>" />
<meta name="description" content="<?php echo $config['description']?>" />
<link href="/static/images/login.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body>
<div class="regbox">
<div class="title">账号申请--<?php echo $config['sitename']?></div> 
<form method="post" name="register" id="register" action="">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="67">用户名</td>
        <td width="493"><input type="text" class="text" name="adminnew[username]" />　必填，支持中文</td>
      </tr>
      <tr>
        <td>登录密码</td>
        <td><input type="password" class="text" name="adminnew[password]" />　必填，至少六位</td>
      </tr>
  <tr>
        <td>我的角色</td>
        <td>
<select name="adminnew[groupid]" class="select">
<option value="3">乡镇管理员</option>
<option value="4">学校管理员</option>
</select>
</td>
      </tr>
  <tbody id="towns">
  	<tr>
<td>所在乡镇</td>
<td>
<select name="adminnew[tid]" class="select">
<option value="0">请选择</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><option value="<?php echo $town['tid']?>"><?php echo $town['town']?></option><?php } } ?></select>　必选项
</td>
</tr>
  </tbody>
  <tbody id="schools">
  	<tr>
<td>所在学校</td>
<td>
<select name="adminnew[sid]"  class="select">
<option value="0">请选择</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><optgroup label="<?php echo $town['town']?>"><?php if(is_array($schools[$town['tid']])) { foreach($schools[$town['tid']] as $sc) { ?><option value="<?php echo $sc['sid']?>"><?php echo $sc['sname']?></option><?php } } ?></optgroup><?php } } ?></select>
</td>
</tr>
  </tbody>
      <tr>
        <td>真实姓名</td>
        <td><input type="text" class="text" name="adminnew[realname]" /></td>
      </tr>
      <tr>
        <td>联系电话</td>
        <td><input type="text" class="text" name="adminnew[tel]" /></td>
      </tr>
      <tr>
        <td>电子邮件</td>
        <td><input type="text" class="text" name="adminnew[email]" /></td>
      </tr>
  <tr>
        <td>验证码</td>
        <td><input type="text" class="text" name="randcode" style="width:80px; vertical-align:middle;" /> <img src="source/include/randcode.php" id="imgcode" border="0" align="absmiddle" style="cursor:pointer;" onclick="this.src='source/include/randcode.php?'+Math.random()" title="点击刷新验证码" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" class="button" value="提交" />　<a href="<?php echo $BASESCRIPT?>">已有账号，点击这里登录。</a></td>
      </tr>
    </table>
</form>
</div>
<script type="text/javascript">
$("#register").submit(function(){
var username = $(this).find("input[name='adminnew[username]']").val();
var password = $(this).find("input[name='adminnew[password]']").val();
var tid = $(this).find("select[name='adminnew[tid]']").val();
var randcode = $(this).find("input[name=randcode]").val();
if(!username){
alert("用户名不能为空。");
return false;
}
if(password.length<6){
alert("密码不能少于6位，请重新输入。");
return false;
}
if(tid<1){
alert("请选择您所在的乡镇。");
return false;
}
if(randcode.length!=4){
alert("验证码输入错误，请重新输入。");
return false;
}
return true;
});
</script>
<div class="copyright"><?php echo $config['copyright']?>　技术支持：<a href="http://www.toking.cc" target="_blank">拓垦科技</a></div>
</body>
</html>