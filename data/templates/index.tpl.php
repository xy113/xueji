<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $config['sitename']?>-��ҳ</title>
<link href="static/images/style.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body style="overflow:hidden; padding:0;">
<div id="top">
<div class="logo"><img src="static/images/logo.png" border="0" /></div>
<div class="topMenu">��ӭ����<?php echo $admincp['username']?>�����ı��ε�¼IPΪ��<?php echo $ipaddr?>��<a href="<?php echo $BASESCRIPT?>">ϵͳ��ҳ</a> | <a href="<?php echo $BASESCRIPT?>?action=logout">�˳�ϵͳ</a> | <a href="javascript:;" id="toggleMenu">�رղ���</a></div>
</div>
<table width="100%" border="0" cellspacing="0" id="Frame">
  <tr>
  	<td id="LeftMenu" valign="top" width="160"> 
<?php if(in_array($admincp['groupid'],array(1,2))||$isfounder) { ?>
<div onclick="toggleMenu(0)">ϵͳ����</div>
<ul id="menu_0">
<li><a href="<?php echo $BASESCRIPT?>?action=admin" target="mainFrame">����Ա����</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=town" target="mainFrame">�������</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=school" target="mainFrame">ѧУ����</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=announce" target="mainFrame">�������</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=cplog" target="mainFrame">�鿴������־</a></li>
</ul>
<?php } if(in_array($admincp['groupid'],array(1,2,3))) { ?>
<div onclick="toggleMenu(1)">ѧ������</div>
<ul id="menu_1">
<li><a href="<?php echo $BASESCRIPT?>?action=task&status=1" target="mainFrame">�Ѵ�������</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=task&status=0" target="mainFrame">δ��������</a></li>
</ul>
<?php } ?>
<div onclick="toggleMenu(2)">ѧ����Ϣ����</div>
<ul id="menu_2">
<li><a href="<?php echo $BASESCRIPT?>?action=input" target="mainFrame">ѧ����Ϣ¼��</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=import" target="mainFrame">ѧ����Ϣ����</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=result" target="mainFrame">ѧ���ɼ�����</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=avatar" target="mainFrame">ѧ����Ƭ����</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=list" target="mainFrame">ѧ����Ϣ��ѯ</a></li>
</ul>
<?php if(in_array($admincp['groupid'],array(1,4))) { ?>
<div onclick="toggleMenu(3)">ѧ���䶯</div>
<ul id="menu_3">
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=1" target="mainFrame">����ת��</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=2" target="mainFrame">����ת��</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=3" target="mainFrame">����ת��</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=4" target="mainFrame">������ѧ</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=5" target="mainFrame">���븴ѧ</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=6" target="mainFrame">��������</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=7" target="mainFrame">������ѧ</a></li>
</ul>
<?php } ?>
<div onclick="toggleMenu(4)">����ͳ��</div>
<ul id="menu_4">
<li><a href="<?php echo $BASESCRIPT?>?action=stat&atype=1" target="mainFrame">Сѧ</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=stat&atype=2" target="mainFrame">����</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=stat&atype=3" target="mainFrame">����</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=stat" target="mainFrame">ȫ��ͳ��</a></li>
</ul>
</td>
    <td id="Main"><iframe name="mainFrame" id="mainFrame" width="100%" src="<?php echo $BASESCRIPT?>?action=home" frameborder="0" style="height:100%; width:100%;"></iframe></td>
  </tr>
</table>
<div class="bottom"><span id="timer"></span><?php echo $config['copyright']?>������֧�֣�<a href="http://www.toking.cc" target="_blank">�����ؿѿƼ��������ι�˾</a>����ϵ�绰��0858-3638700</div>
<script type="text/javascript">
$(function(){
$("#Main").height($(document).height()-105);
})
setInterval("document.getElementById('timer').innerHTML='��ǰʱ�䣺'+new Date().toLocaleString()+' ����'+'��һ����������'.charAt(new Date().getDay());",1000);
$("#toggleMenu").click(function(){
if($(this).html()=='�رղ���'){
$(this).html('�򿪲���');
$("#LeftMenu").hide('1500');
}else{
$(this).html('�رղ���');
$("#LeftMenu").show('1500');
}
});
function toggleMenu(id){
$("#menu_"+id).toggle();
}
</script>