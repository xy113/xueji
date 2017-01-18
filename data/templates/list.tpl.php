<script src="static/calendar/WdatePicker.js" type="text/javascript"></script>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="index.php?action=home">首页</a></li>
<li>学生信息查询</li>
</ul>
</div>
<div class="body">
<div class="titlediv" id="search"<?php if($advance) { ?> style="display:none;"<?php } ?>>
<form method="get" action="<?php echo $BASESCRIPT?>">
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="hidden" name="advance" value="0" />
<input type="text" class="text" name="keywords" value="<?php echo $keywords?>" />
<select name="field">
<option value="name">姓名</option>
<option value="studentid"<?php if($field=='studentid') { ?> selected="selected"<?php } ?>>学号</option>
<option value="schoolyear"<?php if($field=='schoolyear') { ?> selected="selected"<?php } ?>>入学年份</option>
</select>
<input type="submit" class="button" value="搜 索" /> 
<input type="button" class="button" value="高级搜索" onclick="toggleAdvance()" />
</form>
</div>
<div class="titlediv" id="searchadvance"<?php if(!$advance) { ?> style="display:none;"<?php } ?>>
<form name="search" method="get">
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="hidden" name="advance" value="1" />
姓名：<input type="text" name="name" value="<?php echo $name?>" class="text"  style="width:100px;" />
学号：<input type="text" name="studentid" value="<?php echo $studentid?>" class="text"  style="width:100px;" />
学校：<input type="text" name="school" value="<?php echo $school?>" class="text"  style="width:100px;" />
入学年份：
<select name="schoolyear" id="s_schoolyear">
<option value="">不限</option><?php if(is_array($years)) { foreach($years as $year) { ?><option value="<?php echo $year?>"<?php if($schoolyear==$year) { ?> selected="selected"<?php } ?>><?php echo $year?></option><?php } } ?></select>
入学类别：
<select name="atype" id="s_atype">
<option value="">不限</option><?php if(is_array($lang['atype'])) { foreach($lang['atype'] as $key => $val) { ?><option value="<?php echo $val?>"<?php if($atype==$val) { ?> selected="selected"<?php } ?>><?php echo $val?></option><?php } } ?></select>
年级：
<select name="grade" id="s_grade">
<option value="">不限</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
性别：<select name="sex" id="s_sex">
<option value="">不限</option>
<option value="男"<?php if($sex=='男') { ?> selected="selected"<?php } ?>>男</option>
<option value="女"<?php if($sex=='女') { ?> selected="selected"<?php } ?>>女</option>
</select><br /><br />
班级：<input type="text" name="class" value="<?php echo $class?>" class="text"  style="width:100px;" />
生日：<input type="text" name="birthday" value="<?php echo $birthday?>" class="text"  style="width:100px;" onclick="WdatePicker()" />
民族：<input type="text" name="nation" value="<?php echo $nation?>" class="text"  style="width:100px;" />
籍贯：<input type="text" name="birthplace" value="<?php echo $birthplace?>" class="text"  style="width:100px;" />
学籍变动：
<select name="source" id="s_source">
<option value="">不限</option><?php if(is_array($lang['source'])) { foreach($lang['source'] as $key => $val) { ?><option value="<?php echo $val?>"<?php if($source==$val) { ?> selected="selected"<?php } ?>><?php echo $val?></option><?php } } ?></select>
<input type="submit" class="button" name="searchsubmit" value="搜 索" /> 
<input type="button" class="button" value="简单搜索" onclick="toggleAdvance()" />
</form>
</div>
<form action="" method="post" onsubmit="return confirm('信息删除后将不能被恢复，您确定要删除吗?');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablelist">
<tr>
<?php if($admincp['groupid']==1 || $admincp['groupid']==2) { ?><th width="30">选择</th><?php } ?>
<th width="30">编号</th>
<th width="60">入学年份</th>
<th width="140">学籍号</th>
<th width="80">学生姓名</th>
<th width="100">所在学校</th>
<th width="60">入学类别</th>
<th width="40">年级</th>
<th width="40">班级</th>
<th width="40">性别</th>
<th width="60">民族</th>
<th>籍贯</th>
<th width="100">出生日期</th>
<th width="100">毕业学校</th>
<th width="60">来源变动</th>
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
<span class="pagebox">总计<?php echo $total?>条记录 <?php echo $pagelink?></span>
<input type="button" class="button" value="导出Excel表" onclick="window.open('<?php echo $BASESCRIPT?>?action=export&<?php echo $querystring?>')" />
<input type="submit" class="button" value="删除" />
</div> 
</form>
</div>
<script type="text/javascript">
function toggleAdvance(){
$("#search").toggle();
$("#searchadvance").toggle();
}
</script>