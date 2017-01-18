<script src="static/calendar/WdatePicker.js" type="text/javascript"></script>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>学籍变更</li>
<li><?php echo $lang['tasktype'][$category]?></li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>学籍变动</strong>
<div class="clear"></div>
</div>
<p>请在下面输入学生信息和变更原因</p>
<form method="post" id="form1">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
          <tr>
            <td width="60">学籍号：</td>
            <td><input type="text" class="text" name="tasknew[studentid]"></td>
          </tr>
  <tr>
            <td width="60">身份证号：</td>
            <td><input type="text" class="text" name="tasknew[idnumber]"></td>
          </tr>
   <tr>
            <td width="60">姓名：</td>
            <td><input type="text" class="text" name="tasknew[name]"></td>
          </tr>
   <tr>
            <td width="60">性别：</td>
            <td>
 <input type="radio" name="tasknew[sex]" value="1" /> 男 
             <input type="radio" name="tasknew[sex]" value="0" /> 女
 </td>
          </tr>
   <tr>
            <td width="60">学校：</td>
            <td><input type="text" class="text" name="tasknew[school]"></td>
          </tr>
  <tr>
            <td width="60">变更号：</td>
            <td><input type="text" class="text" name="tasknew[newid]"></td>
          </tr>
  <tr>
            <td width="60">变更时间：</td>
            <td><input type="text" class="text" name="tasknew[changetime]" onclick="WdatePicker()" value="<?php echo $date?>"></td>
          </tr>
  <tr>
            <td width="60">异动类型：</td>
            <td>
<select class="select" style="width:300px;" name="tasknew[category]"><?php if(is_array($lang['tasktype'])) { foreach($lang['tasktype'] as $key => $value) { ?><option value="<?php echo $key?>"<?php if($category==$key) { ?> selected="selected"<?php } ?>><?php echo $value?></option><?php } } ?></select>
</td>
          </tr>
          <tr>
            <td>变更原因：</td>
            <td><textarea class="text" name="tasknew[body]" style="height:100px;"></textarea></td>
          </tr>
  <tr>
            <td width="60">经办人：</td>
            <td><input type="text" class="text" name="tasknew[manager]" value="<?php echo $admincp['realname']?>"></td>
          </tr>
  <tr>
            <td width="60">去向：</td>
            <td><input type="text" class="text" name="tasknew[whereabouts]"></td>
          </tr>
          <tr>
  	<td></td>
            <td><input type="submit" class="button" value="提交"></td>
          </tr>
        </table>
</form>
</div>
<script type="text/javascript">
$("#form1").submit(function(){
if(!$("input[name='tasknew[studentid]']").val()){
alert("学籍号不能为空，请重新输入");
return false;
}
if(!$("input[name='tasknew[name]']").val()){
alert("姓名不能为空，请重新输入");
return false;
}
if(!$("textarea[name='tasknew[body]']").val()){
alert("请填写变更原因");
return false;
}
return true;
})
</script>