<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $config['sitename']?>-首页</title>
<link href="static/images/style.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body style="overflow:hidden; padding:0;">
<div id="top">
<div class="logo"><img src="static/images/logo.png" border="0" /></div>
<div class="topMenu">欢迎您：<?php echo $admincp['username']?>　您的本次登录IP为：<?php echo $ipaddr?>　<a href="<?php echo $BASESCRIPT?>">系统首页</a> | <a href="<?php echo $BASESCRIPT?>?action=logout">退出系统</a> | <a href="javascript:;" id="toggleMenu">关闭侧栏</a></div>
</div>
<table width="100%" border="0" cellspacing="0" id="Frame">
  <tr>
  	<td id="LeftMenu" valign="top" width="160"> 
<?php if(in_array($admincp['groupid'],array(1,2))||$isfounder) { ?>
<div onclick="toggleMenu(0)">系统管理</div>
<ul id="menu_0">
<li><a href="<?php echo $BASESCRIPT?>?action=admin" target="mainFrame">管理员管理</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=town" target="mainFrame">乡镇管理</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=school" target="mainFrame">学校管理</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=announce" target="mainFrame">公告管理</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=cplog" target="mainFrame">查看运行日志</a></li>
</ul>
<?php } if(in_array($admincp['groupid'],array(1,2,3))) { ?>
<div onclick="toggleMenu(1)">学籍管理</div>
<ul id="menu_1">
<li><a href="<?php echo $BASESCRIPT?>?action=task&status=1" target="mainFrame">已处理事项</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=task&status=0" target="mainFrame">未处理事项</a></li>
</ul>
<?php } ?>
<div onclick="toggleMenu(2)">学生信息管理</div>
<ul id="menu_2">
<li><a href="<?php echo $BASESCRIPT?>?action=input" target="mainFrame">学生信息录入</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=import" target="mainFrame">学生信息导入</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=result" target="mainFrame">学生成绩导入</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=avatar" target="mainFrame">学生照片导入</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=list" target="mainFrame">学生信息查询</a></li>
</ul>
<?php if(in_array($admincp['groupid'],array(1,4))) { ?>
<div onclick="toggleMenu(3)">学籍变动</div>
<ul id="menu_3">
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=1" target="mainFrame">申请转班</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=2" target="mainFrame">申请转入</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=3" target="mainFrame">申请转出</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=4" target="mainFrame">申请休学</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=5" target="mainFrame">申请复学</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=6" target="mainFrame">申请留级</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=change&category=7" target="mainFrame">申请退学</a></li>
</ul>
<?php } ?>
<div onclick="toggleMenu(4)">数据统计</div>
<ul id="menu_4">
<li><a href="<?php echo $BASESCRIPT?>?action=stat&atype=1" target="mainFrame">小学</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=stat&atype=2" target="mainFrame">初中</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=stat&atype=3" target="mainFrame">高中</a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=stat" target="mainFrame">全部统计</a></li>
</ul>
</td>
    <td id="Main"><iframe name="mainFrame" id="mainFrame" width="100%" src="<?php echo $BASESCRIPT?>?action=home" frameborder="0" style="height:100%; width:100%;"></iframe></td>
  </tr>
</table>
<div class="bottom"><span id="timer"></span><?php echo $config['copyright']?>　技术支持：<a href="http://www.toking.cc" target="_blank">北京拓垦科技有限责任公司</a>　联系电话：0858-3638700</div>
<script type="text/javascript">
$(function(){
$("#Main").height($(document).height()-105);
})
setInterval("document.getElementById('timer').innerHTML='当前时间：'+new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);
$("#toggleMenu").click(function(){
if($(this).html()=='关闭侧栏'){
$(this).html('打开侧栏');
$("#LeftMenu").hide('1500');
}else{
$(this).html('关闭侧栏');
$("#LeftMenu").show('1500');
}
});
function toggleMenu(id){
$("#menu_"+id).toggle();
}
</script>