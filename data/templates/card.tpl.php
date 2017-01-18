<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>学籍卡</title>
<link href="/static/images/style.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body style="padding-top:10px;">
<div class="body">
<h1 class="card-title"><span style="text-decoration:underline; letter-spacing:8px; font-size:24px;">盘县义务教育阶段学生学籍卡</span></h1>
<p class="card-info">学校（盖章）　　　学籍号：<?php echo $studentid?>　　　变更号</p>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="card">
      <tr>
        <td width="57">姓名</td>
        <td width="100"><?php echo $student['name']?></td>
        <td width="44">性别</td>
        <td width="68"><?php echo $student['sex']?></td>
        <td width="46">民族</td>
        <td width="89"><?php echo $student['nation']?></td>
        <td width="66">出生年月</td>
        <td width="193"><?php echo $student['birthday']?></td>
        <?php $rows=$fcounts+4 ?>        <td width="121" rowspan="<?php echo $rows?>" class="shu"><img src="data/avatar/<?php echo $student['avatar']?>" alt="学生照片" class="avatar" /></td>
      </tr>
      <tr>
        <td>籍贯</td>
        <td colspan="4"><?php echo $student['birthplace']?></td>
        <td>家庭住址</td>
        <td colspan="2"><?php echo $student['address']?></td>
      </tr>
      <tr>
        <td colspan="2">何时何地加入共青团</td>
        <td colspan="3">&nbsp;</td>
        <td>身份证号</td>
        <td colspan="2"><?php echo $student['idnumber']?></td>
      </tr>
      <?php $rows=$fcounts+1 ?>  <tr>
    <td rowspan="<?php echo $rows?>">家庭<br />
      主要<br />
      成员</td>
    <td>关系</td>
    <td colspan="2">姓名</td>
    <td colspan="2">工作单位及职务</td>
    <td colspan="2">工作、地点</td>
  </tr>
  <?php if($family) { ?>
  <?php if(is_array($family)) { foreach($family as $fa) { ?>  <tr>
    <td><?php echo $fa['relationship']?></td>
    <td colspan="2"><?php echo $fa['name']?></td>
    <td colspan="2"><?php echo $fa['job']?></td>
    <td colspan="2"><?php echo $fa['workplace']?></td>
  </tr>
      <?php } } ?>  <?php } else { ?>
  <tr>
    <td><?php echo $fa['relationship']?></td>
    <td colspan="2"><?php echo $fa['name']?></td>
    <td colspan="2"><?php echo $fa['job']?></td>
    <td colspan="2"><?php echo $fa['workplace']?></td>
  </tr><tr>
    <td><?php echo $fa['relationship']?></td>
    <td colspan="2"><?php echo $fa['name']?></td>
    <td colspan="2"><?php echo $fa['job']?></td>
    <td colspan="2"><?php echo $fa['workplace']?></td>
  </tr>
  <?php } ?>
    </table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="card" style="border-top:0; margin-top:-1px;">
<?php if($tasks['3']) { if(is_array($tasks['3'])) { foreach($tasks['3'] as $task) { ?><tr>
      <td width="99">转学日期，年级及原因</td>
      <td width="248"><?php echo $task['date']?>,<?php echo $task['tasktitle']?>,原因：<?php echo $task['body']?></td>
      <td width="42">去向</td>
      <td width="154"><?php echo $task['whereabouts']?></td>
      <td width="68">经办人（签字）</td>
      <td width="102"><?php echo $task['manager']?></td>
    </tr><?php } } } else { ?>
    <tr>
      <td width="99">转学日期，年级及原因</td>
      <td width="248">&nbsp;</td>
      <td width="42">去向</td>
      <td width="154">&nbsp;</td>
      <td width="68">经办人（签字）</td>
      <td width="102">&nbsp;</td>
    </tr>
<?php } ?>
    <?php if($tasks['4']) { if(is_array($tasks['4'])) { foreach($tasks['4'] as $task) { ?><tr>
      <td>休学日期，年级及原因</td>
      <td><?php echo $task['date']?>,<?php echo $task['tasktitle']?>,原因：<?php echo $task['body']?></td>
      <td>去向</td>
      <td><?php echo $task['whereabouts']?></td>
      <td>经办人（签字）</td>
      <td><?php echo $task['manager']?></td>
    </tr><?php } } } else { ?>
    <tr>
      <td>休学日期，年级及原因</td>
      <td>&nbsp;</td>
      <td>去向</td>
      <td>&nbsp;</td>
      <td>经办人（签字）</td>
      <td>&nbsp;</td>
    </tr>
<?php } if($tasks['7']) { if(is_array($tasks['7'])) { foreach($tasks['7'] as $task) { ?><tr>
      <td>退学日期，年级及原因</td>
      <td><?php echo $task['date']?>,<?php echo $task['tasktitle']?>,原因：<?php echo $task['body']?></td>
      <td>去向</td>
      <td><?php echo $task['whereabouts']?></td>
      <td>经办人（签字）</td>
      <td><?php echo $task['manager']?></td>
    </tr><?php } } } else { ?>
    <tr>
      <td>退学日期，年级及原因</td>
      <td>&nbsp;</td>
      <td>去向</td>
      <td>&nbsp;</td>
      <td>经办人（签字）</td>
      <td>&nbsp;</td>
    </tr>
<?php } ?>
    <?php if($tasks['5']) { if(is_array($tasks['5'])) { foreach($tasks['5'] as $task) { ?><tr>
      <td>复学日期，年级及原因</td>
      <td><?php echo $task['date']?>,<?php echo $task['tasktitle']?>,原因：<?php echo $task['body']?></td>
      <td>重编号</td>
      <td><?php echo $task['whereabouts']?></td>
      <td>经办人（签字）</td>
      <td><?php echo $task['manager']?></td>
    </tr><?php } } } else { ?>
    <tr>
      <td>复学日期，年级及原因</td>
      <td>&nbsp;</td>
      <td>重编号</td>
      <td>&nbsp;</td>
      <td>经办人（签字）</td>
      <td>&nbsp;</td>
    </tr>
<?php } ?>
  </table>
  <table width="100%" border="0" cellspacing="1" cellpadding="0" class="card" style="border-top:0; margin-top:-1px;">
    <tr>
      <td colspan="3" rowspan="2" class="xiexian">&nbsp;</td>
      <td width="35" rowspan="2" class="shu">语文</td>
      <td width="35" rowspan="2" class="shu">数学</td>
      <td width="35" rowspan="2" class="shu">外语</td>
      <td width="35" rowspan="2" class="shu">物理</td>
      <td width="35" rowspan="2" class="shu">化学</td>
      <td width="35" rowspan="2" class="shu">生物</td>
      <td width="35" rowspan="2" class="shu">政治</td>
      <td width="35" rowspan="2" class="shu">地理</td>
      <td width="35" rowspan="2" class="shu">历史</td>
      <td width="35" rowspan="2" class="shu">自然</td>
      <td width="35" rowspan="2" class="shu">体育</td>
      <td width="35" rowspan="2" class="shu">美术</td>
      <td width="35" rowspan="2" class="shu">音乐</td>
      <td width="35" rowspan="2" class="shu">科学</td>
      <td colspan="5" class="shu">考勤统计</td>
      <td colspan="2" rowspan="2" class="shu">其他</td>
    </tr>
    <tr>
      <td class="shu">病</td>
      <td class="shu">事</td>
      <td class="shu">旷</td>
      <td class="shu">迟</td>
      <td class="shu">早退</td>
    </tr>
    <tr>
      <td width="23" rowspan="12" class="shu">学<br>
        <br>
        <br>
      习<br>
      <br>
      <br>
      成<br>
      <br>
      <br>
      绩</td>
      <td width="23" rowspan="2" class="shu">一<br>
        年<br>
      级</td>
      <td width="73" class="shu">第一<br />
      学期</td>
      <td class="shu"><?php echo $xueqi1['yuwen']?></td>
      <td class="shu"><?php echo $xueqi1['shuxue']?></td>
      <td class="shu"><?php echo $xueqi1['waiyu']?></td>
      <td class="shu"><?php echo $xueqi1['wuli']?></td>
      <td class="shu"><?php echo $xueqi1['huaxue']?></td>
      <td class="shu"><?php echo $xueqi1['shengwu']?></td>
      <td class="shu"><?php echo $xueqi1['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi1['dili']?></td>
      <td class="shu"><?php echo $xueqi1['lishi']?></td>
      <td class="shu"><?php echo $xueqi1['ziran']?></td>
      <td class="shu"><?php echo $xueqi1['tiyu']?></td>
      <td class="shu"><?php echo $xueqi1['meishu']?></td>
      <td class="shu"><?php echo $xueqi1['yinyue']?></td>
      <td class="shu"><?php echo $xueqi1['kexue']?></td>
      <td class="shu"><?php echo $xueqi1['bingjia']?></td>
      <td class="shu"><?php echo $xueqi1['shijia']?></td>
      <td class="shu"><?php echo $xueqi1['kuangke']?></td>
      <td class="shu"><?php echo $xueqi1['chidao']?></td>
      <td class="shu"><?php echo $xueqi1['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi1['qita']?></td>
    </tr>
    <tr>
      <td class="shu">第二<br />
      学期</td>
      <td class="shu"><?php echo $xueqi2['yuwen']?></td>
      <td class="shu"><?php echo $xueqi2['shuxue']?></td>
      <td class="shu"><?php echo $xueqi2['waiyu']?></td>
      <td class="shu"><?php echo $xueqi2['wuli']?></td>
      <td class="shu"><?php echo $xueqi2['huaxue']?></td>
      <td class="shu"><?php echo $xueqi2['shengwu']?></td>
      <td class="shu"><?php echo $xueqi2['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi2['dili']?></td>
      <td class="shu"><?php echo $xueqi2['lishi']?></td>
      <td class="shu"><?php echo $xueqi2['ziran']?></td>
      <td class="shu"><?php echo $xueqi2['tiyu']?></td>
      <td class="shu"><?php echo $xueqi2['meishu']?></td>
      <td class="shu"><?php echo $xueqi2['yinyue']?></td>
      <td class="shu"><?php echo $xueqi2['kexue']?></td>
      <td class="shu"><?php echo $xueqi2['bingjia']?></td>
      <td class="shu"><?php echo $xueqi2['shijia']?></td>
      <td class="shu"><?php echo $xueqi2['kuangke']?></td>
      <td class="shu"><?php echo $xueqi2['chidao']?></td>
      <td class="shu"><?php echo $xueqi2['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi2['qita']?></td>
    </tr>
    
    <tr>
      <td rowspan="2" class="shu">二<br>
        年<br>
      级</td>
      <td class="shu">第一<br />
      学期</td>
      <td class="shu"><?php echo $xueqi3['yuwen']?></td>
      <td class="shu"><?php echo $xueqi3['shuxue']?></td>
      <td class="shu"><?php echo $xueqi3['waiyu']?></td>
      <td class="shu"><?php echo $xueqi3['wuli']?></td>
      <td class="shu"><?php echo $xueqi3['huaxue']?></td>
      <td class="shu"><?php echo $xueqi3['shengwu']?></td>
      <td class="shu"><?php echo $xueqi3['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi3['dili']?></td>
      <td class="shu"><?php echo $xueqi3['lishi']?></td>
      <td class="shu"><?php echo $xueqi3['ziran']?></td>
      <td class="shu"><?php echo $xueqi3['tiyu']?></td>
      <td class="shu"><?php echo $xueqi3['meishu']?></td>
      <td class="shu"><?php echo $xueqi3['yinyue']?></td>
      <td class="shu"><?php echo $xueqi3['kexue']?></td>
      <td class="shu"><?php echo $xueqi3['bingjia']?></td>
      <td class="shu"><?php echo $xueqi3['shijia']?></td>
      <td class="shu"><?php echo $xueqi3['kuangke']?></td>
      <td class="shu"><?php echo $xueqi3['chidao']?></td>
      <td class="shu"><?php echo $xueqi3['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi3['qita']?></td>
    </tr>
    <tr>
      <td class="shu">第二<br />
      学期</td>
      <td class="shu"><?php echo $xueqi4['yuwen']?></td>
      <td class="shu"><?php echo $xueqi4['shuxue']?></td>
      <td class="shu"><?php echo $xueqi4['waiyu']?></td>
      <td class="shu"><?php echo $xueqi4['wuli']?></td>
      <td class="shu"><?php echo $xueqi4['huaxue']?></td>
      <td class="shu"><?php echo $xueqi4['shengwu']?></td>
      <td class="shu"><?php echo $xueqi4['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi4['dili']?></td>
      <td class="shu"><?php echo $xueqi4['lishi']?></td>
      <td class="shu"><?php echo $xueqi4['ziran']?></td>
      <td class="shu"><?php echo $xueqi4['tiyu']?></td>
      <td class="shu"><?php echo $xueqi4['meishu']?></td>
      <td class="shu"><?php echo $xueqi4['yinyue']?></td>
      <td class="shu"><?php echo $xueqi4['kexue']?></td>
      <td class="shu"><?php echo $xueqi4['bingjia']?></td>
      <td class="shu"><?php echo $xueqi4['shijia']?></td>
      <td class="shu"><?php echo $xueqi4['kuangke']?></td>
      <td class="shu"><?php echo $xueqi4['chidao']?></td>
      <td class="shu"><?php echo $xueqi4['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi4['qita']?></td>
    </tr>
    
    <tr>
      <td rowspan="2" class="shu">三<br>
        年<br>
      级</td>
      <td class="shu">第一<br />
      学期</td>
      <td class="shu"><?php echo $xueqi5['yuwen']?></td>
      <td class="shu"><?php echo $xueqi5['shuxue']?></td>
      <td class="shu"><?php echo $xueqi5['waiyu']?></td>
      <td class="shu"><?php echo $xueqi5['wuli']?></td>
      <td class="shu"><?php echo $xueqi5['huaxue']?></td>
      <td class="shu"><?php echo $xueqi5['shengwu']?></td>
      <td class="shu"><?php echo $xueqi5['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi5['dili']?></td>
      <td class="shu"><?php echo $xueqi5['lishi']?></td>
      <td class="shu"><?php echo $xueqi5['ziran']?></td>
      <td class="shu"><?php echo $xueqi5['tiyu']?></td>
      <td class="shu"><?php echo $xueqi5['meishu']?></td>
      <td class="shu"><?php echo $xueqi5['yinyue']?></td>
      <td class="shu"><?php echo $xueqi5['kexue']?></td>
      <td class="shu"><?php echo $xueqi5['bingjia']?></td>
      <td class="shu"><?php echo $xueqi5['shijia']?></td>
      <td class="shu"><?php echo $xueqi5['kuangke']?></td>
      <td class="shu"><?php echo $xueqi5['chidao']?></td>
      <td class="shu"><?php echo $xueqi5['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi5['qita']?></td>
    </tr>
    <tr>
      <td class="shu">第二<br />
      学期</td>
      <td class="shu"><?php echo $xueqi6['yuwen']?></td>
      <td class="shu"><?php echo $xueqi6['shuxue']?></td>
      <td class="shu"><?php echo $xueqi6['waiyu']?></td>
      <td class="shu"><?php echo $xueqi6['wuli']?></td>
      <td class="shu"><?php echo $xueqi6['huaxue']?></td>
      <td class="shu"><?php echo $xueqi6['shengwu']?></td>
      <td class="shu"><?php echo $xueqi6['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi6['dili']?></td>
      <td class="shu"><?php echo $xueqi6['lishi']?></td>
      <td class="shu"><?php echo $xueqi6['ziran']?></td>
      <td class="shu"><?php echo $xueqi6['tiyu']?></td>
      <td class="shu"><?php echo $xueqi6['meishu']?></td>
      <td class="shu"><?php echo $xueqi6['yinyue']?></td>
      <td class="shu"><?php echo $xueqi6['kexue']?></td>
      <td class="shu"><?php echo $xueqi6['bingjia']?></td>
      <td class="shu"><?php echo $xueqi6['shijia']?></td>
      <td class="shu"><?php echo $xueqi6['kuangke']?></td>
      <td class="shu"><?php echo $xueqi6['chidao']?></td>
      <td class="shu"><?php echo $xueqi6['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi6['qita']?></td>
    </tr>
    <tr>
      <td rowspan="2" class="shu">四<br />
年<br />
级</td>
      <td class="shu">第一<br />
学期</td>
      <td class="shu"><?php echo $xueqi7['yuwen']?></td>
      <td class="shu"><?php echo $xueqi7['shuxue']?></td>
      <td class="shu"><?php echo $xueqi7['waiyu']?></td>
      <td class="shu"><?php echo $xueqi7['wuli']?></td>
      <td class="shu"><?php echo $xueqi7['huaxue']?></td>
      <td class="shu"><?php echo $xueqi7['shengwu']?></td>
      <td class="shu"><?php echo $xueqi7['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi7['dili']?></td>
      <td class="shu"><?php echo $xueqi7['lishi']?></td>
      <td class="shu"><?php echo $xueqi7['ziran']?></td>
      <td class="shu"><?php echo $xueqi7['tiyu']?></td>
      <td class="shu"><?php echo $xueqi7['meishu']?></td>
      <td class="shu"><?php echo $xueqi7['yinyue']?></td>
      <td class="shu"><?php echo $xueqi7['kexue']?></td>
      <td class="shu"><?php echo $xueqi7['bingjia']?></td>
      <td class="shu"><?php echo $xueqi7['shijia']?></td>
      <td class="shu"><?php echo $xueqi7['kuangke']?></td>
      <td class="shu"><?php echo $xueqi7['chidao']?></td>
      <td class="shu"><?php echo $xueqi7['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi7['qita']?></td>
    </tr>
    <tr>
      <td class="shu">第二<br />
学期</td>
      <td class="shu"><?php echo $xueqi8['yuwen']?></td>
      <td class="shu"><?php echo $xueqi8['shuxue']?></td>
      <td class="shu"><?php echo $xueqi8['waiyu']?></td>
      <td class="shu"><?php echo $xueqi8['wuli']?></td>
      <td class="shu"><?php echo $xueqi8['huaxue']?></td>
      <td class="shu"><?php echo $xueqi8['shengwu']?></td>
      <td class="shu"><?php echo $xueqi8['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi8['dili']?></td>
      <td class="shu"><?php echo $xueqi8['lishi']?></td>
      <td class="shu"><?php echo $xueqi8['ziran']?></td>
      <td class="shu"><?php echo $xueqi8['tiyu']?></td>
      <td class="shu"><?php echo $xueqi8['meishu']?></td>
      <td class="shu"><?php echo $xueqi8['yinyue']?></td>
      <td class="shu"><?php echo $xueqi8['kexue']?></td>
      <td class="shu"><?php echo $xueqi8['bingjia']?></td>
      <td class="shu"><?php echo $xueqi8['shijia']?></td>
      <td class="shu"><?php echo $xueqi8['kuangke']?></td>
      <td class="shu"><?php echo $xueqi8['chidao']?></td>
      <td class="shu"><?php echo $xueqi8['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi8['qita']?></td>
    </tr>
    <tr>
      <td rowspan="2" class="shu">五<br />
年<br />
级</td>
      <td class="shu">第一<br />
学期</td>
      <td class="shu"><?php echo $xueqi9['yuwen']?></td>
      <td class="shu"><?php echo $xueqi9['shuxue']?></td>
      <td class="shu"><?php echo $xueqi9['waiyu']?></td>
      <td class="shu"><?php echo $xueqi9['wuli']?></td>
      <td class="shu"><?php echo $xueqi9['huaxue']?></td>
      <td class="shu"><?php echo $xueqi9['shengwu']?></td>
      <td class="shu"><?php echo $xueqi9['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi9['dili']?></td>
      <td class="shu"><?php echo $xueqi9['lishi']?></td>
      <td class="shu"><?php echo $xueqi9['ziran']?></td>
      <td class="shu"><?php echo $xueqi9['tiyu']?></td>
      <td class="shu"><?php echo $xueqi9['meishu']?></td>
      <td class="shu"><?php echo $xueqi9['yinyue']?></td>
      <td class="shu"><?php echo $xueqi9['kexue']?></td>
      <td class="shu"><?php echo $xueqi9['bingjia']?></td>
      <td class="shu"><?php echo $xueqi9['shijia']?></td>
      <td class="shu"><?php echo $xueqi9['kuangke']?></td>
      <td class="shu"><?php echo $xueqi9['chidao']?></td>
      <td class="shu"><?php echo $xueqi9['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi9['qita']?></td>
    </tr>
    <tr>
      <td class="shu">第二<br />
学期</td>
      <td class="shu"><?php echo $xueqi10['yuwen']?></td>
      <td class="shu"><?php echo $xueqi10['shuxue']?></td>
      <td class="shu"><?php echo $xueqi10['waiyu']?></td>
      <td class="shu"><?php echo $xueqi10['wuli']?></td>
      <td class="shu"><?php echo $xueqi10['huaxue']?></td>
      <td class="shu"><?php echo $xueqi10['shengwu']?></td>
      <td class="shu"><?php echo $xueqi10['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi10['dili']?></td>
      <td class="shu"><?php echo $xueqi10['lishi']?></td>
      <td class="shu"><?php echo $xueqi10['ziran']?></td>
      <td class="shu"><?php echo $xueqi10['tiyu']?></td>
      <td class="shu"><?php echo $xueqi10['meishu']?></td>
      <td class="shu"><?php echo $xueqi10['yinyue']?></td>
      <td class="shu"><?php echo $xueqi10['kexue']?></td>
      <td class="shu"><?php echo $xueqi10['bingjia']?></td>
      <td class="shu"><?php echo $xueqi10['shijia']?></td>
      <td class="shu"><?php echo $xueqi10['kuangke']?></td>
      <td class="shu"><?php echo $xueqi10['chidao']?></td>
      <td class="shu"><?php echo $xueqi10['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi10['qita']?></td>
    </tr>
    <tr>
      <td rowspan="2" class="shu">六<br />
年<br />
级</td>
      <td class="shu">第一<br />
学期</td>
      <td class="shu"><?php echo $xueqi11['yuwen']?></td>
      <td class="shu"><?php echo $xueqi11['shuxue']?></td>
      <td class="shu"><?php echo $xueqi11['waiyu']?></td>
      <td class="shu"><?php echo $xueqi11['wuli']?></td>
      <td class="shu"><?php echo $xueqi11['huaxue']?></td>
      <td class="shu"><?php echo $xueqi11['shengwu']?></td>
      <td class="shu"><?php echo $xueqi11['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi11['dili']?></td>
      <td class="shu"><?php echo $xueqi11['lishi']?></td>
      <td class="shu"><?php echo $xueqi11['ziran']?></td>
      <td class="shu"><?php echo $xueqi11['tiyu']?></td>
      <td class="shu"><?php echo $xueqi11['meishu']?></td>
      <td class="shu"><?php echo $xueqi11['yinyue']?></td>
      <td class="shu"><?php echo $xueqi11['kexue']?></td>
      <td class="shu"><?php echo $xueqi11['bingjia']?></td>
      <td class="shu"><?php echo $xueqi11['shijia']?></td>
      <td class="shu"><?php echo $xueqi11['kuangke']?></td>
      <td class="shu"><?php echo $xueqi11['chidao']?></td>
      <td class="shu"><?php echo $xueqi11['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi11['qita']?></td>
    </tr>
    <tr>
      <td class="shu">第二<br />
学期</td>
      <td class="shu"><?php echo $xueqi12['yuwen']?></td>
      <td class="shu"><?php echo $xueqi12['shuxue']?></td>
      <td class="shu"><?php echo $xueqi12['waiyu']?></td>
      <td class="shu"><?php echo $xueqi12['wuli']?></td>
      <td class="shu"><?php echo $xueqi12['huaxue']?></td>
      <td class="shu"><?php echo $xueqi12['shengwu']?></td>
      <td class="shu"><?php echo $xueqi12['zhengzhi']?></td>
      <td class="shu"><?php echo $xueqi12['dili']?></td>
      <td class="shu"><?php echo $xueqi12['lishi']?></td>
      <td class="shu"><?php echo $xueqi12['ziran']?></td>
      <td class="shu"><?php echo $xueqi12['tiyu']?></td>
      <td class="shu"><?php echo $xueqi12['meishu']?></td>
      <td class="shu"><?php echo $xueqi12['yinyue']?></td>
      <td class="shu"><?php echo $xueqi12['kexue']?></td>
      <td class="shu"><?php echo $xueqi12['bingjia']?></td>
      <td class="shu"><?php echo $xueqi12['shijia']?></td>
      <td class="shu"><?php echo $xueqi12['kuangke']?></td>
      <td class="shu"><?php echo $xueqi12['chidao']?></td>
      <td class="shu"><?php echo $xueqi12['zaotui']?></td>
      <td colspan="2" class="shu"><?php echo $xueqi12['qita']?></td>
    </tr>
    
    <tr>
      <td class="shu">备注</td>
      <td colspan="23"><?php echo $student['remark']?></td>
    </tr>
  </table>
</div>
