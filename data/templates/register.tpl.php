<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�˺�����-<?php echo $config['sitename']?></title>
<meta name="keywords" content="<?php echo $config['keywords']?>" />
<meta name="description" content="<?php echo $config['description']?>" />
<link href="/static/images/login.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body>
<div class="regbox">
<div class="title">�˺�����--<?php echo $config['sitename']?></div> 
<form method="post" name="register" id="register" action="">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="67">�û���</td>
        <td width="493"><input type="text" class="text" name="adminnew[username]" />�����֧������</td>
      </tr>
      <tr>
        <td>��¼����</td>
        <td><input type="password" class="text" name="adminnew[password]" />�����������λ</td>
      </tr>
  <tr>
        <td>�ҵĽ�ɫ</td>
        <td>
<select name="adminnew[groupid]" class="select">
<option value="3">�������Ա</option>
<option value="4">ѧУ����Ա</option>
</select>
</td>
      </tr>
  <tbody id="towns">
  	<tr>
<td>��������</td>
<td>
<select name="adminnew[tid]" class="select">
<option value="0">��ѡ��</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><option value="<?php echo $town['tid']?>"><?php echo $town['town']?></option><?php } } ?></select>����ѡ��
</td>
</tr>
  </tbody>
  <tbody id="schools">
  	<tr>
<td>����ѧУ</td>
<td>
<select name="adminnew[sid]"  class="select">
<option value="0">��ѡ��</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><optgroup label="<?php echo $town['town']?>"><?php if(is_array($schools[$town['tid']])) { foreach($schools[$town['tid']] as $sc) { ?><option value="<?php echo $sc['sid']?>"><?php echo $sc['sname']?></option><?php } } ?></optgroup><?php } } ?></select>
</td>
</tr>
  </tbody>
      <tr>
        <td>��ʵ����</td>
        <td><input type="text" class="text" name="adminnew[realname]" /></td>
      </tr>
      <tr>
        <td>��ϵ�绰</td>
        <td><input type="text" class="text" name="adminnew[tel]" /></td>
      </tr>
      <tr>
        <td>�����ʼ�</td>
        <td><input type="text" class="text" name="adminnew[email]" /></td>
      </tr>
  <tr>
        <td>��֤��</td>
        <td><input type="text" class="text" name="randcode" style="width:80px; vertical-align:middle;" /> <img src="source/include/randcode.php" id="imgcode" border="0" align="absmiddle" style="cursor:pointer;" onclick="this.src='source/include/randcode.php?'+Math.random()" title="���ˢ����֤��" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" class="button" value="�ύ" />��<a href="<?php echo $BASESCRIPT?>">�����˺ţ���������¼��</a></td>
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
alert("�û�������Ϊ�ա�");
return false;
}
if(password.length<6){
alert("���벻������6λ�����������롣");
return false;
}
if(tid<1){
alert("��ѡ�������ڵ�����");
return false;
}
if(randcode.length!=4){
alert("��֤������������������롣");
return false;
}
return true;
});
</script>
<div class="copyright"><?php echo $config['copyright']?>������֧�֣�<a href="http://www.toking.cc" target="_blank">�ؿѿƼ�</a></div>
</body>
</html>