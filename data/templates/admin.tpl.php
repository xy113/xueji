<?php if($do=='add'||$do=='edit') { ?>
<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">��ҳ</a></li>
<li>����Ա����</li>
<?php if($do=='add') { ?><li>��ӹ���Ա</li><?php } else { ?><li>�༭����Ա</li><?php } ?>
</ul>
</div>
<div class="body">
<div class="titlediv"> 
<strong>����Ա����</strong>
<ul class="tab">
<li><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>"><span>����</span></a></li>
<?php if($do=='add') { ?>
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=add"><span>���</span></a></li>
<?php } else { ?>
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=edit&adminid=<?php echo $adminid?>"><span>�༭</span></a></li>
<?php } ?>
</ul>
<div class="clear"></div>
</div>
<form method="post" id="adminform" action="">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
  <?php if($do=='add') { ?>
      <tr>
        <td width="75">����Ա�˺�</td>
        <td><input type="text" class="text" name="adminnew[username]" />�����֧������</td>
      </tr>
      <tr>
        <td>��¼����</td>
        <td><input type="password" class="text" name="adminnew[password]" />�����������λ</td>
      </tr>
  <?php } else { ?>
  <tr>
        <td width="70">����Ա�˺�</td>
        <td><input type="text" class="text" name="adminnew[username]" value="<?php echo $admin['username']?>" readonly="" />�������޸�</td>
      </tr>
      <tr>
        <td>��¼����</td>
        <td><input type="password" class="text" name="adminnew[password]" />��������λ�����޸�������</td>
      </tr>
  <?php } ?>
      <tr>
        <td>����Ա����</td>
        <td>
<select name="adminnew[groupid]" style="width:300px;" id="groupid"><?php if(is_array($admingroups)) { foreach($admingroups as $group) { ?><option value="<?php echo $group['groupid']?>"<?php if($group['current']) { ?> selected="selected"<?php } ?>><?php echo $group['grouptitle']?></option><?php } } ?></select>
</td>
      </tr>
  <tbody id="towns"<?php if($admin['groupid']!=3) { ?> style="display:none;"<?php } ?>>
  	<tr>
<td>��������</td>
<td>
<select name="adminnew[tid]" id="thetown" style="width:300px;">
<option value="0">��ѡ��</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><option value="<?php echo $town['tid']?>"<?php if($town['tid']==$admin['tid']) { ?> selected="selected"<?php } ?>><?php echo $town['town']?></option><?php } } ?></select>
</td>
</tr>
  </tbody>
  <tbody id="schools"<?php if($admin['groupid']!=4) { ?> style="display:none;"<?php } ?>>
  	<tr>
<td>����ѧУ</td>
<td>
<select name="adminnew[sid]" style="width:300px;">
<option value="0">��ѡ��</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><optgroup label="<?php echo $town['town']?>"><?php if(is_array($schools[$town['tid']])) { foreach($schools[$town['tid']] as $sc) { ?><option value="<?php echo $sc['sid']?>"<?php if($sc['sid']==$admin['sid']) { ?> selected="selected"<?php } ?>><?php echo $sc['sname']?></option><?php } } ?></optgroup><?php } } ?></select>
</td>
</tr>
  </tbody>
      <tr>
        <td>��ʵ����</td>
        <td><input type="text" class="text" name="adminnew[realname]" value="<?php echo $admin['realname']?>" /></td>
      </tr>
      <tr>
        <td>��ϵ�绰</td>
        <td><input type="text" class="text" name="adminnew[tel]" value="<?php echo $admin['tel']?>" /></td>
      </tr>
      <tr>
        <td>�����ʼ�</td>
        <td><input type="text" class="text" name="adminnew[email]" value="<?php echo $admin['email']?>" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" class="button" value="�ύ" /></td>
      </tr>
    </table>
</form>
</div>
<script type="text/javascript">
$("#adminform").submit(function(){
if(!$("input[name='adminnew[username]']").val()){
alert("�û�����������");
return false;
}
var password = $("input[name='adminnew[password]']").val();
if(password && password.length<6){
alert("��������6λ������������");
return false;
}
return true;
});
$("#groupid").change(function(){
if($(this).val()==3){
$("#towns").show();
$("#schools").hide();
}else{
$("#towns").hide();
if($(this).val()==4){
$("#schools").show();
}else{
$("#schools").hide();
}
}
});
</script>
<?php } elseif($do=='view') { ?>
<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">��ҳ</a></li>
<li>����Ա����</li>
<li>�鿴����Ա��Ϣ</li>
</ul>
</div>
<div class="body">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
  <tr>
<td width="67">�û���</td>
<td width="493"><?php echo $admin['username']?></td>
  </tr>
  <tr>
<td>�������</td>
<td><?php echo $admin['grouptitle']?></td>
  </tr>
  <tbody id="towns">
<tr>
  <td>��������</td>
  <td><?php echo $admin['town']?></td>
</tr>
  </tbody>
  <tbody id="schools">
<tr>
  <td>����ѧУ</td>
  <td><?php echo $admin['school']?></td>
</tr>
  </tbody>
  <tr>
<td>��ʵ����</td>
<td><?php echo $admin['realname']?></td>
  </tr>
  <tr>
<td>��ϵ�绰</td>
<td><?php echo $admin['tel']?></td>
  </tr>
  <tr>
<td>�����ʼ�</td>
<td><?php echo $admin['email']?></td>
  </tr>
</table>
</div>
<?php } else { ?>
<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">��ҳ</a></li>
<li>����Ա����</li>
<li>����Ա�б�</li>
</ul>
</div>
<div class="body">
<div class="titlediv"><strong>����Ա����</strong>
<ul class="tab">
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>"><span>����</span></a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=add"><span>���</span></a></li>
</ul>
<div class="clear"></div>
  </div>
<form method="post" action="" name="admins" id="admins">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tlist">
<tr>
<th width="60"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ȫѡ</th>
<th>����Ա�˺�</th>
<th width="100">��ʵ����</th>
<th width="100">�������</th>
<th width="100">��������</th>
<th width="120">��ϵ�绰</th>
<th width="160">�����ʼ�</th>
<th width="130">����¼ʱ��</th>
<th width="100">����¼IP</th>
<th width="70">��¼����</th>
<th width="50">�����</th>
<th width="40">ѡ��</th>
</tr><?php if(is_array($admins)) { foreach($admins as $admin) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<td><input type="checkbox" value="<?php echo $admin['adminid']?>"<?php if($admin['isfounder']) { ?> disabled="disabled"<?php } else { ?> name="delete[]"<?php } ?> /></td>
<td><a href="###" onclick="viewDetail(<?php echo $admin['adminid']?>)"><?php echo $admin['username']?></a></td>
<td><?php echo $admin['realname']?></td>
<td><?php echo $admin['grouptitle']?></td>
<td><?php echo $admin['town']?></td>
<td><?php echo $admin['tel']?></td>
<td><a href="mailto:<?php echo $admin['email']?>"><?php echo $admin['email']?></a></td>
<td><?php echo $admin['lastlogin']?></td>
<td><?php echo $admin['lastip']?></td>
<td><?php echo $admin['logintimes']?></td>
<td><img src="static/images/<?php if($admin['status']) { ?>yes.gif<?php } else { ?>no.gif<?php } ?>"<?php if(!$admin['isfounder']) { ?> class="toggle" onclick="toggle(this,'do=toggle_status&adminid=<?php echo $admin['adminid']?>&formsubmit=yes&formhash=<?php echo FORMHASH?>')" title="����������״̬"<?php } ?> border="0" /></td>
<td><a href="<?php echo $BASESCRIPT?>?action=admin&do=edit&adminid=<?php echo $admin['adminid']?>">�༭</a></td>
</tr><?php } } ?><tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ȫѡ</td>
<td colspan="11">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="ɾ��" onclick="submitForm('delete')" />
<input type="button" class="button" value="����EXCEL���" onclick="window.open('<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=export')" />
<input type="button" class="button" value="ˢ��" onclick="LoadPage('page=<?php echo $page?>')" />
</td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
function viewDetail(adminid){
var sw=Math.floor((window.screen.width/2-300));
    var sh=Math.floor((window.screen.height/2-280));
window.open(purl+'&do=view&adminid='+adminid,'dialog','Width=600,Height=400,toolbar=no,menubar=no,directories=no,top='+sh+',left='+sw+',resizable=yes,scrollbars=yes,center=yes,help=no,alwaysRaised=yes,location=no, status=no',false);
}
</script>
<?php } ?>