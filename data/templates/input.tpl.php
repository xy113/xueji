<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="index.php?action=home">首页</a></li>
<li>学生信息管理</li>
<li>学生信息录入</li>
</ul>
</div>
<script src="static/calendar/WdatePicker.js" type="text/javascript"></script>
<div class="body">
<div class="titlediv">
<strong>学生信息录入</strong>
<ul class="tab" id="tab">
<li class="current"><a href="###"><span>基本信息</span></a></li>
<li><a href="###"><span>详细信息</span></a></li>
<li><a href="###"><span>家庭成员</span></a></li>
</ul>
<div class="clear"></div>
</div>
<form method="post" name="school" enctype="multipart/form-data" onsubmit="return checkForm()">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<span id="formbody">
    <table width="100%" border="0" cellspacing="1" class="form">
   <tr>
    <td class="bold" width="106">所在学校</td>
    <td><input type="text" class="text" name="studentnew[school]" id="student_id" value="<?php echo $sname?>" readonly="" /></td>
      </tr>
  <tr>
        <td class="bold">学籍号</td>
        <td><input type="text" class="text" name="studentnew[studentid]" id="student_id" value="<?php echo $student['studentid']?>"  /></td>
      </tr>
      <tr>
        <td class="bold">学生姓名</td>
        <td><input name="studentnew[name]" type="text" class="text" id="student_name" value="<?php echo $student['name']?>"  /></td>
      </tr>
      <tr>
        <td class="bold">学生照片</td>
        <td><input type="file" name="file" size="33" />
<p>提示：仅支持gif和jpg两种格式，大小不能超过2MB。</p>
</td>
      </tr>
  <tr>
    <td class="bold">入学年份</td>
    <td>
<select name="studentnew[schoolyear]" style="width:300px;"><?php if(is_array($years)) { foreach($years as $year) { ?><option value="<?php echo $year?>"><?php echo $year?></option><?php } } ?></select>
</td>
      </tr>
  <tr>
    <td class="bold">入学类别</td>
    <td><select name="studentnew[atype]" style="width:300px;">
      <option value="小学">小学</option>
      <option value="初中">初中</option>
      <option value="高中">高中</option>
      </select>	    
</td>
      </tr>
  <tr>
    <td class="bold">年级</td>
    <td>
<select name="studentnew[grade]" style="width:300px;"><?php if(is_array($lang['grade'])) { foreach($lang['grade'] as $key => $grade) { ?><option value="<?php echo $key?>"><?php echo $grade?></option><?php } } ?>      	</select>	    
    </td>
      </tr>
  <tr>
    <td class="bold">班级</td>
    <td><select name="studentnew[class]" style="width:300px;">
  <?php if(is_array($lang['class'])) { foreach($lang['class'] as $key => $class) { ?>      <option value="<?php echo $key?>"<?php if($student['class']==$class) { ?> selected="selected"<?php } ?>><?php echo $class?></option>
  <?php } } ?>      </select>	    
    </td>
      </tr>
  <tr>
        <td class="bold">性别</td>
        <td>
<input name="studentnew[sex]" type="radio" value="男" checked="checked" /> 男　
<input type="radio" name="studentnew[sex]" value="女" /> 女
</td>
      </tr>
  <tr>
        <td class="bold">民族</td>
        <td><select name="studentnew[nation]" id="student_nation" style="width:300px;">
          <?php if(is_array($nations)) { foreach($nations as $n) { ?>          <option value="<?php echo $n['nation']?>"<?php if($n['current']) { ?> selected="selected"<?php } ?>><?php echo $n['nation']?></option>
          <?php } } ?>        </select>
</td>
      </tr>
      
  <tr>
    <td class="bold">籍贯</td>
    <td><input type="text" class="text" name="studentnew[birthplace]" id="student_birthplace" value="<?php echo $student['birthplace']?>"  /></td>
      </tr>
  <tr>
        <td class="bold">出生年月日</td>
        <td><input type="text" class="text" name="studentnew[birthday]" id="student_birthday" value="<?php echo $student['birthday']?>" onclick="WdatePicker()" /></td>
      </tr>
    </table>
<table width="100%" border="0" cellspacing="1" class="form" style="display:none;">
<tr>
        <td class="bold" width="106">家庭住址</td>
        <td><input type="text" class="text" name="studentnew[address]" id="student_address" value="<?php echo $student['address']?>" /></td>
      </tr>
  <tr>
        <td class="bold">毕业学校</td>
        <td><input type="text" class="text" name="studentnew[graduate]" id="student_graduate" value="<?php echo $student['graduate']?>"  /></td>
      </tr>
  <tr>
    <td class="bold">来源变动</td>
    <td>
<select name="studentnew[source]" style="width:300px;">
<option value="录取">录取</option>
<option value="转入">转入</option>
    </select>
    </td>
      </tr>
  <tr>
        <td class="bold">身份证号</td>
        <td><input type="text" class="text" name="studentnew[idnumber]" id="student_idnumber" value="<?php echo $student['idnumber']?>"  /></td>
      </tr>
      
  <tr>
        <td class="bold">文化户口编号</td>
        <td><input type="text" class="text" name="studentnew[accountid]" id="student_accountid" value="<?php echo $student['accountid']?>" /></td>
      </tr>
      
  <tr>
        <td class="bold">入校时间</td>
        <td><input type="text" class="text" name="studentnew[indate]" id="student_indate" value="<?php echo $student['indate']?>" onclick="WdatePicker()" /></td>
      </tr>
      
  <tr>
        <td class="bold">转入时间及转入学校</td>
        <td><input type="text" class="text" name="studentnew[intodate]" id="student_intodate" value="<?php echo $student['intodate']?>" /></td>
      </tr>
      
  <tr>
        <td class="bold">转出时间及转入学校</td>
        <td><input type="text" class="text" name="studentnew[outdate]" id="student_outdate" value="<?php echo $student['outdate']?>" /></td>
      </tr>
      
      <tr>
        <td class="bold">备注</td>
        <td><textarea class="text" style="width:360px; height:160px;" name="studentnew[remark]" id="student_remark"><?php echo $student['remark']?></textarea></td>
      </tr>
</table>
<table width="100%" border="0" cellspacing="0" class="tlist" style="display:none;">
<tr>
<th width="80">姓名</th>
<th width="80">关系</th>
<th width="180">工作单位及职务</th>
<th>工作地点</th>
</tr>
<tr>
<td><input type="text" class="text text60" name="newname[]" /></td>
<td><input type="text" class="text text60" name="relationship[]" /></td>
<td><input type="text" class="text text160" name="newjob[]" /></td>
<td><input type="text" class="text" name="workplace[]" /></td>
</tr>
<tr>
<td><input type="text" class="text text60" name="newname[]" /></td>
<td><input type="text" class="text text60" name="relationship[]" /></td>
<td><input type="text" class="text text160" name="newjob[]" /></td>
<td><input type="text" class="text" name="workplace[]" /></td>
</tr>
<tr>
<td><input type="text" class="text text60" name="newname[]" /></td>
<td><input type="text" class="text text60" name="relationship[]" /></td>
<td><input type="text" class="text text160" name="newjob[]" /></td>
<td><input type="text" class="text" name="workplace[]" /></td>
</tr>
<tbody id="newperson"></tbody>
<tr><td colspan="4"><a href="###" id="addnew">[+新增成员]</a></td></tr>
</table>
</span>
<table width="100%" border="0" cellspacing="1" class="form">
 <tr>
        <td colspan="2"><input type="submit" class="button" value="提　交" /></td>
      </tr>
</table>
</form>
</div>
<script type="text/javascript">
$("#addnew").click(function(){
$("#newperson").append('<tr><td><input type="text" class="text text60" name="newname[]" /></td><td><input type="text" class="text text60" name="relationship[]" /></td>'+
'<td><input type="text" class="text text160" name="newjob[]" /></td><td><input type="text" class="text" name="workplace[]" /></td></tr>');
});
$("#tab li").click(function(){
$(this).addClass('current').siblings().removeClass();
$("#formbody > table").eq($('#tab li').index(this)).show().siblings().hide();
});
function checkForm(){
if(!$("#student_id").val()){
alert("学籍号不能留空，请重新输入。");
return false;
}
if(!$("#student_name").val()){
alert("学生姓名不能留空，请重新输入。");
return false;
}
if(!$("#student_birthplace").val()){
alert("籍贯不能留空，请重新输入。");
return false;
}
return true;
}
function LoadSchool(tid){
if(tid<=0) return;
$.get(url+"&do=loadschool&tid="+tid,function(result){
if(result){
$("#student_sid").html('<option value="0">请选择</option>'+result);
}else{
$("#student_sid").html('<option value="0">请选择</option>')
}
})
}
</script>