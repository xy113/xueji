<script src="static/calendar/WdatePicker.js" type="text/javascript"></script>
<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">��ҳ</a></li>
<li>ѧ�����</li>
<li><?php echo $lang['tasktype'][$category]?></li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>ѧ���䶯</strong>
<div class="clear"></div>
</div>
<p>������������ѧ����Ϣ�ͱ��ԭ��</p>
<form method="post" id="form1">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
          <tr>
            <td width="60">ѧ���ţ�</td>
            <td><input type="text" class="text" name="tasknew[studentid]"></td>
          </tr>
  <tr>
            <td width="60">���֤�ţ�</td>
            <td><input type="text" class="text" name="tasknew[idnumber]"></td>
          </tr>
   <tr>
            <td width="60">������</td>
            <td><input type="text" class="text" name="tasknew[name]"></td>
          </tr>
   <tr>
            <td width="60">�Ա�</td>
            <td>
 <input type="radio" name="tasknew[sex]" value="1" /> �� 
             <input type="radio" name="tasknew[sex]" value="0" /> Ů
 </td>
          </tr>
   <tr>
            <td width="60">ѧУ��</td>
            <td><input type="text" class="text" name="tasknew[school]"></td>
          </tr>
  <tr>
            <td width="60">����ţ�</td>
            <td><input type="text" class="text" name="tasknew[newid]"></td>
          </tr>
  <tr>
            <td width="60">���ʱ�䣺</td>
            <td><input type="text" class="text" name="tasknew[changetime]" onclick="WdatePicker()" value="<?php echo $date?>"></td>
          </tr>
  <tr>
            <td width="60">�춯���ͣ�</td>
            <td>
<select class="select" style="width:300px;" name="tasknew[category]"><?php if(is_array($lang['tasktype'])) { foreach($lang['tasktype'] as $key => $value) { ?><option value="<?php echo $key?>"<?php if($category==$key) { ?> selected="selected"<?php } ?>><?php echo $value?></option><?php } } ?></select>
</td>
          </tr>
          <tr>
            <td>���ԭ��</td>
            <td><textarea class="text" name="tasknew[body]" style="height:100px;"></textarea></td>
          </tr>
  <tr>
            <td width="60">�����ˣ�</td>
            <td><input type="text" class="text" name="tasknew[manager]" value="<?php echo $admincp['realname']?>"></td>
          </tr>
  <tr>
            <td width="60">ȥ��</td>
            <td><input type="text" class="text" name="tasknew[whereabouts]"></td>
          </tr>
          <tr>
  	<td></td>
            <td><input type="submit" class="button" value="�ύ"></td>
          </tr>
        </table>
</form>
</div>
<script type="text/javascript">
$("#form1").submit(function(){
if(!$("input[name='tasknew[studentid]']").val()){
alert("ѧ���Ų���Ϊ�գ�����������");
return false;
}
if(!$("input[name='tasknew[name]']").val()){
alert("��������Ϊ�գ�����������");
return false;
}
if(!$("textarea[name='tasknew[body]']").val()){
alert("����д���ԭ��");
return false;
}
return true;
})
</script>