<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="index.php?action=home">��ҳ</a></li>
<li>ѧ����Ϣ����</li>
<li>ѧ����Ϣ¼��</li>
</ul>
</div>
<script src="static/calendar/WdatePicker.js" type="text/javascript"></script>
<div class="body">
<div class="titlediv">
<strong>ѧ����Ϣ¼��</strong>
<ul class="tab" id="tab">
<li class="current"><a href="###"><span>������Ϣ</span></a></li>
<li><a href="###"><span>��ϸ��Ϣ</span></a></li>
<li><a href="###"><span>��ͥ��Ա</span></a></li>
</ul>
<div class="clear"></div>
</div>
<form method="post" name="school" enctype="multipart/form-data" onsubmit="return checkForm()">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<span id="formbody">
    <table width="100%" border="0" cellspacing="1" class="form">
   <tr>
    <td class="bold" width="106">����ѧУ</td>
    <td><input type="text" class="text" name="studentnew[school]" id="student_id" value="<?php echo $sname?>" readonly="" /></td>
      </tr>
  <tr>
        <td class="bold">ѧ����</td>
        <td><input type="text" class="text" name="studentnew[studentid]" id="student_id" value="<?php echo $student['studentid']?>"  /></td>
      </tr>
      <tr>
        <td class="bold">ѧ������</td>
        <td><input name="studentnew[name]" type="text" class="text" id="student_name" value="<?php echo $student['name']?>"  /></td>
      </tr>
      <tr>
        <td class="bold">ѧ����Ƭ</td>
        <td><input type="file" name="file" size="33" />
<p>��ʾ����֧��gif��jpg���ָ�ʽ����С���ܳ���2MB��</p>
</td>
      </tr>
  <tr>
    <td class="bold">��ѧ���</td>
    <td>
<select name="studentnew[schoolyear]" style="width:300px;"><?php if(is_array($years)) { foreach($years as $year) { ?><option value="<?php echo $year?>"><?php echo $year?></option><?php } } ?></select>
</td>
      </tr>
  <tr>
    <td class="bold">��ѧ���</td>
    <td><select name="studentnew[atype]" style="width:300px;">
      <option value="Сѧ">Сѧ</option>
      <option value="����">����</option>
      <option value="����">����</option>
      </select>	    
</td>
      </tr>
  <tr>
    <td class="bold">�꼶</td>
    <td>
<select name="studentnew[grade]" style="width:300px;"><?php if(is_array($lang['grade'])) { foreach($lang['grade'] as $key => $grade) { ?><option value="<?php echo $key?>"><?php echo $grade?></option><?php } } ?>      	</select>	    
    </td>
      </tr>
  <tr>
    <td class="bold">�༶</td>
    <td><select name="studentnew[class]" style="width:300px;">
  <?php if(is_array($lang['class'])) { foreach($lang['class'] as $key => $class) { ?>      <option value="<?php echo $key?>"<?php if($student['class']==$class) { ?> selected="selected"<?php } ?>><?php echo $class?></option>
  <?php } } ?>      </select>	    
    </td>
      </tr>
  <tr>
        <td class="bold">�Ա�</td>
        <td>
<input name="studentnew[sex]" type="radio" value="��" checked="checked" /> �С�
<input type="radio" name="studentnew[sex]" value="Ů" /> Ů
</td>
      </tr>
  <tr>
        <td class="bold">����</td>
        <td><select name="studentnew[nation]" id="student_nation" style="width:300px;">
          <?php if(is_array($nations)) { foreach($nations as $n) { ?>          <option value="<?php echo $n['nation']?>"<?php if($n['current']) { ?> selected="selected"<?php } ?>><?php echo $n['nation']?></option>
          <?php } } ?>        </select>
</td>
      </tr>
      
  <tr>
    <td class="bold">����</td>
    <td><input type="text" class="text" name="studentnew[birthplace]" id="student_birthplace" value="<?php echo $student['birthplace']?>"  /></td>
      </tr>
  <tr>
        <td class="bold">����������</td>
        <td><input type="text" class="text" name="studentnew[birthday]" id="student_birthday" value="<?php echo $student['birthday']?>" onclick="WdatePicker()" /></td>
      </tr>
    </table>
<table width="100%" border="0" cellspacing="1" class="form" style="display:none;">
<tr>
        <td class="bold" width="106">��ͥסַ</td>
        <td><input type="text" class="text" name="studentnew[address]" id="student_address" value="<?php echo $student['address']?>" /></td>
      </tr>
  <tr>
        <td class="bold">��ҵѧУ</td>
        <td><input type="text" class="text" name="studentnew[graduate]" id="student_graduate" value="<?php echo $student['graduate']?>"  /></td>
      </tr>
  <tr>
    <td class="bold">��Դ�䶯</td>
    <td>
<select name="studentnew[source]" style="width:300px;">
<option value="¼ȡ">¼ȡ</option>
<option value="ת��">ת��</option>
    </select>
    </td>
      </tr>
  <tr>
        <td class="bold">����֤��</td>
        <td><input type="text" class="text" name="studentnew[idnumber]" id="student_idnumber" value="<?php echo $student['idnumber']?>"  /></td>
      </tr>
      
  <tr>
        <td class="bold">�Ļ����ڱ��</td>
        <td><input type="text" class="text" name="studentnew[accountid]" id="student_accountid" value="<?php echo $student['accountid']?>" /></td>
      </tr>
      
  <tr>
        <td class="bold">��Уʱ��</td>
        <td><input type="text" class="text" name="studentnew[indate]" id="student_indate" value="<?php echo $student['indate']?>" onclick="WdatePicker()" /></td>
      </tr>
      
  <tr>
        <td class="bold">ת��ʱ�估ת��ѧУ</td>
        <td><input type="text" class="text" name="studentnew[intodate]" id="student_intodate" value="<?php echo $student['intodate']?>" /></td>
      </tr>
      
  <tr>
        <td class="bold">ת��ʱ�估ת��ѧУ</td>
        <td><input type="text" class="text" name="studentnew[outdate]" id="student_outdate" value="<?php echo $student['outdate']?>" /></td>
      </tr>
      
      <tr>
        <td class="bold">��ע</td>
        <td><textarea class="text" style="width:360px; height:160px;" name="studentnew[remark]" id="student_remark"><?php echo $student['remark']?></textarea></td>
      </tr>
</table>
<table width="100%" border="0" cellspacing="0" class="tlist" style="display:none;">
<tr>
<th width="80">����</th>
<th width="80">��ϵ</th>
<th width="180">������λ��ְ��</th>
<th>�����ص�</th>
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
<tr><td colspan="4"><a href="###" id="addnew">[+������Ա]</a></td></tr>
</table>
</span>
<table width="100%" border="0" cellspacing="1" class="form">
 <tr>
        <td colspan="2"><input type="submit" class="button" value="�ᡡ��" /></td>
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
alert("ѧ���Ų������գ����������롣");
return false;
}
if(!$("#student_name").val()){
alert("ѧ�������������գ����������롣");
return false;
}
if(!$("#student_birthplace").val()){
alert("���᲻�����գ����������롣");
return false;
}
return true;
}
function LoadSchool(tid){
if(tid<=0) return;
$.get(url+"&do=loadschool&tid="+tid,function(result){
if(result){
$("#student_sid").html('<option value="0">��ѡ��</option>'+result);
}else{
$("#student_sid").html('<option value="0">��ѡ��</option>')
}
})
}
</script>