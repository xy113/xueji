<script src="static/calendar/WdatePicker.js" type="text/javascript"></script>
<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="index.php?action=home">��ҳ</a></li>
<li>ѧ����Ϣ��ѯ</li>
</ul>
</div>
<div class="body">
<div class="titlediv" id="search"<?php if($advance) { ?> style="display:none;"<?php } ?>>
<form method="get" action="<?php echo $BASESCRIPT?>">
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="hidden" name="advance" value="0" />
<input type="text" class="text" name="keywords" value="<?php echo $keywords?>" />
<select name="field">
<option value="name">����</option>
<option value="studentid"<?php if($field=='studentid') { ?> selected="selected"<?php } ?>>ѧ��</option>
<option value="schoolyear"<?php if($field=='schoolyear') { ?> selected="selected"<?php } ?>>��ѧ���</option>
</select>
<input type="submit" class="button" value="�� ��" /> 
<input type="button" class="button" value="�߼�����" onclick="toggleAdvance()" />
</form>
</div>
<div class="titlediv" id="searchadvance"<?php if(!$advance) { ?> style="display:none;"<?php } ?>>
<form name="search" method="get">
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="hidden" name="advance" value="1" />
������<input type="text" name="name" value="<?php echo $name?>" class="text"  style="width:100px;" />
ѧ�ţ�<input type="text" name="studentid" value="<?php echo $studentid?>" class="text"  style="width:100px;" />
ѧУ��<input type="text" name="school" value="<?php echo $school?>" class="text"  style="width:100px;" />
��ѧ��ݣ�
<select name="schoolyear" id="s_schoolyear">
<option value="">����</option><?php if(is_array($years)) { foreach($years as $year) { ?><option value="<?php echo $year?>"<?php if($schoolyear==$year) { ?> selected="selected"<?php } ?>><?php echo $year?></option><?php } } ?></select>
��ѧ���
<select name="atype" id="s_atype">
<option value="">����</option><?php if(is_array($lang['atype'])) { foreach($lang['atype'] as $key => $val) { ?><option value="<?php echo $val?>"<?php if($atype==$val) { ?> selected="selected"<?php } ?>><?php echo $val?></option><?php } } ?></select>
�꼶��
<select name="grade" id="s_grade">
<option value="">����</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
�Ա�<select name="sex" id="s_sex">
<option value="">����</option>
<option value="��"<?php if($sex=='��') { ?> selected="selected"<?php } ?>>��</option>
<option value="Ů"<?php if($sex=='Ů') { ?> selected="selected"<?php } ?>>Ů</option>
</select><br /><br />
�༶��<input type="text" name="class" value="<?php echo $class?>" class="text"  style="width:100px;" />
���գ�<input type="text" name="birthday" value="<?php echo $birthday?>" class="text"  style="width:100px;" onclick="WdatePicker()" />
���壺<input type="text" name="nation" value="<?php echo $nation?>" class="text"  style="width:100px;" />
���᣺<input type="text" name="birthplace" value="<?php echo $birthplace?>" class="text"  style="width:100px;" />
ѧ���䶯��
<select name="source" id="s_source">
<option value="">����</option><?php if(is_array($lang['source'])) { foreach($lang['source'] as $key => $val) { ?><option value="<?php echo $val?>"<?php if($source==$val) { ?> selected="selected"<?php } ?>><?php echo $val?></option><?php } } ?></select>
<input type="submit" class="button" name="searchsubmit" value="�� ��" /> 
<input type="button" class="button" value="������" onclick="toggleAdvance()" />
</form>
</div>
<form action="" method="post" onsubmit="return confirm('��Ϣɾ���󽫲��ܱ��ָ�����ȷ��Ҫɾ����?');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablelist">
<tr>
<?php if($admincp['groupid']==1 || $admincp['groupid']==2) { ?><th width="30">ѡ��</th><?php } ?>
<th width="30">���</th>
<th width="60">��ѧ���</th>
<th width="140">ѧ����</th>
<th width="80">ѧ������</th>
<th width="100">����ѧУ</th>
<th width="60">��ѧ���</th>
<th width="40">�꼶</th>
<th width="40">�༶</th>
<th width="40">�Ա�</th>
<th width="60">����</th>
<th>����</th>
<th width="100">��������</th>
<th width="100">��ҵѧУ</th>
<th width="60">��Դ�䶯</th>
</tr><?php if(is_array($students)) { foreach($students as $stu) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<?php if($admincp['groupid']==1 || $admincp['groupid']==2) { ?><td><input type="checkbox" name="delete[]" value="<?php echo $stu['id']?>" /></td><?php } ?>
<td><?php echo $stu['no']?></td>
<td><?php echo $stu['schoolyear']?></td>
<td><?php echo $stu['studentid']?></td>
<td><a href="<?php echo $BASESCRIPT?>?action=card&studentid=<?php echo $stu['studentid']?>" target="_blank"><?php echo $stu['name']?></a></td>
<td><?php echo $stu['school']?></td>
<td><?php echo $stu['atype']?></td>
<td><?php echo $stu['grade']?></td>
<td><?php echo $stu['class']?></td>
<td><?php echo $stu['sex']?></td>
<td><?php echo $stu['nation']?></td>
<td><?php echo $stu['birthplace']?></td>
<td><?php echo $stu['birthday']?></td>
<td><?php echo $stu['graduate']?></td>
<td><?php echo $stu['source']?></td>
</tr><?php } } ?></table>
<div class="titlediv">
<span class="pagebox">�ܼ�<?php echo $total?>����¼ <?php echo $pagelink?></span>
<input type="button" class="button" value="����Excel��" onclick="window.open('<?php echo $BASESCRIPT?>?action=export&<?php echo $querystring?>')" />
<input type="submit" class="button" value="ɾ��" />
</div> 
</form>
</div>
<script type="text/javascript">
function toggleAdvance(){
$("#search").toggle();
$("#searchadvance").toggle();
}
</script>