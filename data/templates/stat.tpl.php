<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="index.php?action=home">��ҳ</a></li>
<li>����ͳ��</li>
<?php if($atype>0) { ?><li><?php echo $lang['atype'][$atype]?></li><?php } else { ?><li>ȫ��ͳ��</li><?php } ?>
</ul>
</div>
<div class="body">
<div class="titlediv" style="border-bottom:none">
<span class="pagebox">�ܼ�<?php echo $total['total']?>�ˣ�����<?php echo $total['male']?>�ˣ�Ů��<?php echo $total['female']?>�ˡ�</span>
<!--<input type="button" class="button" value="��ӡ���" onclick="window.open(purl+'&do=print&atype=<?php echo $atype?>')" /> -->
<input type="button" class="button" value="����EXCEL��" onclick="window.open(purl+'&do=export')" />
</div> 
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablelist">
<tr>
<th width="30">���</th>
<th width="100">ѧУ</th>
<th width="100">��������</th>
<th width="100">ѧ������</th>
<th width="100">��������</th>
<th width="100">Ů������</th>
<th></th>
</tr><?php if(is_array($schools)) { foreach($schools as $school) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<td><?php echo $school['no']?></td>
<td><?php echo $school['sname']?></td>
<td><?php echo $school['town']?></td>
<td><?php echo $school['total']?></td>
<td><?php echo $school['male']?></td>
<td><?php echo $school['female']?></td>
<td></td>
</tr><?php } } ?></table>
</div>