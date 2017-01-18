<script src="static/calendar/WdatePicker.js" type="text/javascript"></script>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="index.php?action=home">首页</a></li>
<li>学籍管理</li>
</ul>
</div>
<div class="body">
<div class="titlediv" id="search">
<form method="get" action="">
<input type="hidden" name="action" value="<?php echo $action?>">
关键字 <input type="text" name="keywords" class="text" value="<?php echo $keywords?>" style="width:200px;" />
处理情况
<select name="status">
<option value="">全部</option>
<option value="0"<?php if($status=='0') { ?> selected="selected"<?php } ?>>未处理</option>
<option value="1"<?php if($status=='1') { ?> selected="selected"<?php } ?>>已处理</option>
</select>
事项类型
<select name="category">
<option value="">全部</option><?php if(is_array($lang['tasktype'])) { foreach($lang['tasktype'] as $key => $val) { ?><option value="<?php echo $key?>"<?php if($key==$category) { ?> selected="selected"<?php } ?>><?php echo $val?></option><?php } } ?></select>
提交时间 <input type="text" name="dateline" class="text text160" onclick="WdatePicker()" value="<?php echo $dateline?>" /> 
<input type="submit" class="button" value="查 询" /> 
</form>
</div>
<form method="post" name="task" id="task" action="">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="do" id="do" value="">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablelist">
<tr>
<th width="30">选择</th>
<th width="60">处理情况</th>
<th width="60">事项类型</th>
<th width="80">所在学校</th>
<th width="120">学籍号</th>
<th width="60">学生姓名</th>
<th width="150">身份证号</th>
<th>变更原因</th>
<th width="80">变更时间</th>
<th width="60">经办人</th>
<th width="60">初审情况</th>
<th width="60">终审情况</th>
</tr><?php if(is_array($tasks)) { foreach($tasks as $task) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''"<?php if($task['status']==0) { ?> style="font-weight:bold;"<?php } ?>>
<td><input type="checkbox" name="taskid[]" value="<?php echo $task['taskid']?>" /><input type="hidden" name="trail[]" value="<?php echo $task['trail']?>" /></td>
<td><?php echo $task['taskstatus']?></td>
<td>申请<?php echo $task['tasktype']?></td>
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
<span class="pagebox">总计<?php echo $totalrecords?>条记录 <?php echo $pagelink?></span>
<input type="button" class="button" value="全选" id="selectall">
<?php if($admincp['groupid']==3) { ?>
<input type="button" class="button" value="通过初审" onClick="Audit('trail')">
<input type="button" class="button" value="拒绝初审" onClick="Audit('untrail')">
<?php } if($admincp['groupid']==1 || $admincp['groupid']==2) { ?>
<input type="button" class="button" value="通过终审" onClick="Audit('final')">
<input type="button" class="button" value="拒绝终审" onClick="Audit('unfinal')">
<?php } ?>
<input type="button" class="button" value="导出EXCEL表" onclick="window.open('<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=export&keywords=<?php echo $keywords?>&status=<?php echo $status?>&category=<?php echo $category?>')">
<input type="button" class="button" value="删除" onclick="Drop()">
</div>
</form>
</div>
<script type="text/javascript">
$("#selectall").click(function(){
if($(this).val()=='全选'){
$(this).val('不选');
selectAll('taskid[]');
}else{
$(this).val('全选');
cancelAll('taskid[]');
}
})
function Audit(val){
$("#do").val(val);
$("#task").submit();
}
function Drop(){
if($(":checkbox[name='taskid[]'][checked]").length==0){
alert("你还未选择任何选项");
return false;
}else{
if(confirm("信息删除后将不能被恢复，您确定要删除吗?")){
$("#do").val('delete');
$("#task").submit();
}
}
}
</script>