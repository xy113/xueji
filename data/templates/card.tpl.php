<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ѧ����</title>
<link href="/static/images/style.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
</head>

<body style="padding-top:10px;">
<div class="body">
<h1 class="card-title"><span style="text-decoration:underline; letter-spacing:8px; font-size:24px;">������������׶�ѧ��ѧ����</span></h1>
<p class="card-info">ѧУ�����£�������ѧ���ţ�<?php echo $studentid?>�����������</p>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="card">
      <tr>
        <td width="57">����</td>
        <td width="100"><?php echo $student['name']?></td>
        <td width="44">�Ա�</td>
        <td width="68"><?php echo $student['sex']?></td>
        <td width="46">����</td>
        <td width="89"><?php echo $student['nation']?></td>
        <td width="66">��������</td>
        <td width="193"><?php echo $student['birthday']?></td>
        <?php $rows=$fcounts+4 ?>        <td width="121" rowspan="<?php echo $rows?>" class="shu"><img src="data/avatar/<?php echo $student['avatar']?>" alt="ѧ����Ƭ" class="avatar" /></td>
      </tr>
      <tr>
        <td>����</td>
        <td colspan="4"><?php echo $student['birthplace']?></td>
        <td>��ͥסַ</td>
        <td colspan="2"><?php echo $student['address']?></td>
      </tr>
      <tr>
        <td colspan="2">��ʱ�εؼ��빲����</td>
        <td colspan="3">&nbsp;</td>
        <td>���֤��</td>
        <td colspan="2"><?php echo $student['idnumber']?></td>
      </tr>
      <?php $rows=$fcounts+1 ?>  <tr>
    <td rowspan="<?php echo $rows?>">��ͥ<br />
      ��Ҫ<br />
      ��Ա</td>
    <td>��ϵ</td>
    <td colspan="2">����</td>
    <td colspan="2">������λ��ְ��</td>
    <td colspan="2">�������ص�</td>
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
      <td width="99">תѧ���ڣ��꼶��ԭ��</td>
      <td width="248"><?php echo $task['date']?>,<?php echo $task['tasktitle']?>,ԭ��<?php echo $task['body']?></td>
      <td width="42">ȥ��</td>
      <td width="154"><?php echo $task['whereabouts']?></td>
      <td width="68">�����ˣ�ǩ�֣�</td>
      <td width="102"><?php echo $task['manager']?></td>
    </tr><?php } } } else { ?>
    <tr>
      <td width="99">תѧ���ڣ��꼶��ԭ��</td>
      <td width="248">&nbsp;</td>
      <td width="42">ȥ��</td>
      <td width="154">&nbsp;</td>
      <td width="68">�����ˣ�ǩ�֣�</td>
      <td width="102">&nbsp;</td>
    </tr>
<?php } ?>
    <?php if($tasks['4']) { if(is_array($tasks['4'])) { foreach($tasks['4'] as $task) { ?><tr>
      <td>��ѧ���ڣ��꼶��ԭ��</td>
      <td><?php echo $task['date']?>,<?php echo $task['tasktitle']?>,ԭ��<?php echo $task['body']?></td>
      <td>ȥ��</td>
      <td><?php echo $task['whereabouts']?></td>
      <td>�����ˣ�ǩ�֣�</td>
      <td><?php echo $task['manager']?></td>
    </tr><?php } } } else { ?>
    <tr>
      <td>��ѧ���ڣ��꼶��ԭ��</td>
      <td>&nbsp;</td>
      <td>ȥ��</td>
      <td>&nbsp;</td>
      <td>�����ˣ�ǩ�֣�</td>
      <td>&nbsp;</td>
    </tr>
<?php } if($tasks['7']) { if(is_array($tasks['7'])) { foreach($tasks['7'] as $task) { ?><tr>
      <td>��ѧ���ڣ��꼶��ԭ��</td>
      <td><?php echo $task['date']?>,<?php echo $task['tasktitle']?>,ԭ��<?php echo $task['body']?></td>
      <td>ȥ��</td>
      <td><?php echo $task['whereabouts']?></td>
      <td>�����ˣ�ǩ�֣�</td>
      <td><?php echo $task['manager']?></td>
    </tr><?php } } } else { ?>
    <tr>
      <td>��ѧ���ڣ��꼶��ԭ��</td>
      <td>&nbsp;</td>
      <td>ȥ��</td>
      <td>&nbsp;</td>
      <td>�����ˣ�ǩ�֣�</td>
      <td>&nbsp;</td>
    </tr>
<?php } ?>
    <?php if($tasks['5']) { if(is_array($tasks['5'])) { foreach($tasks['5'] as $task) { ?><tr>
      <td>��ѧ���ڣ��꼶��ԭ��</td>
      <td><?php echo $task['date']?>,<?php echo $task['tasktitle']?>,ԭ��<?php echo $task['body']?></td>
      <td>�ر��</td>
      <td><?php echo $task['whereabouts']?></td>
      <td>�����ˣ�ǩ�֣�</td>
      <td><?php echo $task['manager']?></td>
    </tr><?php } } } else { ?>
    <tr>
      <td>��ѧ���ڣ��꼶��ԭ��</td>
      <td>&nbsp;</td>
      <td>�ر��</td>
      <td>&nbsp;</td>
      <td>�����ˣ�ǩ�֣�</td>
      <td>&nbsp;</td>
    </tr>
<?php } ?>
  </table>
  <table width="100%" border="0" cellspacing="1" cellpadding="0" class="card" style="border-top:0; margin-top:-1px;">
    <tr>
      <td colspan="3" rowspan="2" class="xiexian">&nbsp;</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">��ѧ</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">��ѧ</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">��ʷ</td>
      <td width="35" rowspan="2" class="shu">��Ȼ</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">����</td>
      <td width="35" rowspan="2" class="shu">��ѧ</td>
      <td colspan="5" class="shu">����ͳ��</td>
      <td colspan="2" rowspan="2" class="shu">����</td>
    </tr>
    <tr>
      <td class="shu">��</td>
      <td class="shu">��</td>
      <td class="shu">��</td>
      <td class="shu">��</td>
      <td class="shu">����</td>
    </tr>
    <tr>
      <td width="23" rowspan="12" class="shu">ѧ<br>
        <br>
        <br>
      ϰ<br>
      <br>
      <br>
      ��<br>
      <br>
      <br>
      ��</td>
      <td width="23" rowspan="2" class="shu">һ<br>
        ��<br>
      ��</td>
      <td width="73" class="shu">��һ<br />
      ѧ��</td>
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
      <td class="shu">�ڶ�<br />
      ѧ��</td>
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
      <td rowspan="2" class="shu">��<br>
        ��<br>
      ��</td>
      <td class="shu">��һ<br />
      ѧ��</td>
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
      <td class="shu">�ڶ�<br />
      ѧ��</td>
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
      <td rowspan="2" class="shu">��<br>
        ��<br>
      ��</td>
      <td class="shu">��һ<br />
      ѧ��</td>
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
      <td class="shu">�ڶ�<br />
      ѧ��</td>
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
      <td rowspan="2" class="shu">��<br />
��<br />
��</td>
      <td class="shu">��һ<br />
ѧ��</td>
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
      <td class="shu">�ڶ�<br />
ѧ��</td>
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
      <td rowspan="2" class="shu">��<br />
��<br />
��</td>
      <td class="shu">��һ<br />
ѧ��</td>
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
      <td class="shu">�ڶ�<br />
ѧ��</td>
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
      <td rowspan="2" class="shu">��<br />
��<br />
��</td>
      <td class="shu">��һ<br />
ѧ��</td>
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
      <td class="shu">�ڶ�<br />
ѧ��</td>
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
      <td class="shu">��ע</td>
      <td colspan="23"><?php echo $student['remark']?></td>
    </tr>
  </table>
</div>
