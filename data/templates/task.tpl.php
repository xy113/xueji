<script src="static/calendar/WdatePicker.js" type="text/javascript"></script>
<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="index.php?action=home">��ҳ</a></li>
<li>ѧ������</li>
</ul>
</div>
<div class="body">
<div class="titlediv" id="search">
<form method="get" action="">
<input type="hidden" name="action" value="<?php echo $action?>">
�ؼ��� <input type="text" name="keywords" class="text" value="<?php echo $keywords?>" style="width:200px;" />
�������
<select name="status">
<option value="">ȫ��</option>
<option value="0"<?php if($status=='0') { ?> selected="selected"<?php } ?>>δ����</option>
<option value="1"<?php if($status=='1') { ?> selected="selected"<?php } ?>>�Ѵ���</option>
</select>
��������
<select name="category">
<option value="">ȫ��</option><?php if(is_array($lang['tasktype'])) { foreach($lang['tasktype'] as $key => $val) { ?><option value="<?php echo $key?>"<?php if($key==$category) { ?> selected="selected"<?php } ?>><?php echo $val?></option><?php } } ?></select>
�ύʱ�� <input type="text" name="dateline" class="text text160" onclick="WdatePicker()" value="<?php echo $dateline?>" /> 
<input type="submit" class="button" value="�� ѯ" /> 
</form>
</div>
<form method="post" name="task" id="task" action="">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="do" id="do" value="">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablelist">
<tr>
<th width="30">ѡ��</th>
<th width="60">�������</th>
<th width="60">��������</th>
<th width="80">����ѧУ</th>
<th width="120">ѧ����</th>
<th width="60">ѧ������</th>
<th width="150">���֤��</th>
<th>���ԭ��</th>
<th width="80">���ʱ��</th>
<th width="60">������</th>
<th width="60">�������</th>
<th width="60">�������</th>
</tr><?php if(is_array($tasks)) { foreach($tasks as $task) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''"<?php if($task['status']==0) { ?> style="font-weight:bold;"<?php } ?>>
<td><input type="checkbox" name="taskid[]" value="<?php echo $task['taskid']?>" /><input type="hidden" name="trail[]" value="<?php echo $task['trail']?>" /></td>
<td><?php echo $task['taskstatus']?></td>
<td>����<?php echo $task['tasktype']?></td>
<td><?php echo $task['school']?></td>
<td><?php echo $task['studentid']?></td>
<td><a href="<?php echo $BASESCRIPT?>?action=card&studentid=<?php echo $task['studentid']?>" target="_blank"><?php echo $task['name']?></a></td>
<td><?php echo $task['idnumber']?></td>
<td><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=detail&taskid=<?php echo $task['taskid']?>" target="_blank"><?php echo $task['body']?></a></td>
<td><?php echo $task['changetime']?></td>
<td><?php echo $task['manager']?></td>
<td><font color="<?php echo $task['tcolor']?>"><?php echo $task['trailstatus']?></font></td>
<td><font color="<?php echo $task['fcolor']?>"><?php echo $task['finalstatus']?></font></td>
</tr><?php } } ?></table>
<div class="titlediv">
<span class="pagebox">�ܼ�<?php echo $totalrecords?>����¼ <?php echo $pagelink?></span>
<input type="button" class="button" value="ȫѡ" id="selectall">
<?php if($admincp['groupid']==3) { ?>
<input type="button" class="button" value="ͨ������" onClick="Audit('trail')">
<input type="button" class="button" value="�ܾ�����" onClick="Audit('untrail')">
<?php } if($admincp['groupid']==1 || $admincp['groupid']==2) { ?>
<input type="button" class="button" value="ͨ������" onClick="Audit('final')">
<input type="button" class="button" value="�ܾ�����" onClick="Audit('unfinal')">
<?php } ?>
<input type="button" class="button" value="����EXCEL��" onclick="window.open('<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=export&keywords=<?php echo $keywords?>&status=<?php echo $status?>&category=<?php echo $category?>')">
<input type="button" class="button" value="ɾ��" onclick="Drop()">
</div>
</form>
</div>
<script type="text/javascript">
$("#selectall").click(function(){
if($(this).val()=='ȫѡ'){
$(this).val('��ѡ');
selectAll('taskid[]');
}else{
$(this).val('ȫѡ');
cancelAll('taskid[]');
}
})
function Audit(val){
$("#do").val(val);
$("#task").submit();
}
function Drop(){
if($(":checkbox[name='taskid[]'][checked]").length==0){
alert("�㻹δѡ���κ�ѡ��");
return false;
}else{
if(confirm("��Ϣɾ���󽫲��ܱ��ָ�����ȷ��Ҫɾ����?")){
$("#do").val('delete');
$("#task").submit();
}
}
}
</script>