<?php if($do=='add'||$do=='edit') { ?>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>管理员管理</li>
<?php if($do=='add') { ?><li>添加管理员</li><?php } else { ?><li>编辑管理员</li><?php } ?>
</ul>
</div>
<div class="body">
<div class="titlediv"> 
<strong>管理员管理</strong>
<ul class="tab">
<li><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>"><span>管理</span></a></li>
<?php if($do=='add') { ?>
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=add"><span>添加</span></a></li>
<?php } else { ?>
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=edit&adminid=<?php echo $adminid?>"><span>编辑</span></a></li>
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
        <td width="75">管理员账号</td>
        <td><input type="text" class="text" name="adminnew[username]" />　必填，支持中文</td>
      </tr>
      <tr>
        <td>登录密码</td>
        <td><input type="password" class="text" name="adminnew[password]" />　必填，至少六位</td>
      </tr>
  <?php } else { ?>
  <tr>
        <td width="70">管理员账号</td>
        <td><input type="text" class="text" name="adminnew[username]" value="<?php echo $admin['username']?>" readonly="" />　不可修改</td>
      </tr>
      <tr>
        <td>登录密码</td>
        <td><input type="password" class="text" name="adminnew[password]" />　至少六位，不修改请留空</td>
      </tr>
  <?php } ?>
      <tr>
        <td>管理员分组</td>
        <td>
<select name="adminnew[groupid]" style="width:300px;" id="groupid"><?php if(is_array($admingroups)) { foreach($admingroups as $group) { ?><option value="<?php echo $group['groupid']?>"<?php if($group['current']) { ?> selected="selected"<?php } ?>><?php echo $group['grouptitle']?></option><?php } } ?></select>
</td>
      </tr>
  <tbody id="towns"<?php if($admin['groupid']!=3) { ?> style="display:none;"<?php } ?>>
  	<tr>
<td>所在乡镇</td>
<td>
<select name="adminnew[tid]" id="thetown" style="width:300px;">
<option value="0">请选择</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><option value="<?php echo $town['tid']?>"<?php if($town['tid']==$admin['tid']) { ?> selected="selected"<?php } ?>><?php echo $town['town']?></option><?php } } ?></select>
</td>
</tr>
  </tbody>
  <tbody id="schools"<?php if($admin['groupid']!=4) { ?> style="display:none;"<?php } ?>>
  	<tr>
<td>所在学校</td>
<td>
<select name="adminnew[sid]" style="width:300px;">
<option value="0">请选择</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><optgroup label="<?php echo $town['town']?>"><?php if(is_array($schools[$town['tid']])) { foreach($schools[$town['tid']] as $sc) { ?><option value="<?php echo $sc['sid']?>"<?php if($sc['sid']==$admin['sid']) { ?> selected="selected"<?php } ?>><?php echo $sc['sname']?></option><?php } } ?></optgroup><?php } } ?></select>
</td>
</tr>
  </tbody>
      <tr>
        <td>真实姓名</td>
        <td><input type="text" class="text" name="adminnew[realname]" value="<?php echo $admin['realname']?>" /></td>
      </tr>
      <tr>
        <td>联系电话</td>
        <td><input type="text" class="text" name="adminnew[tel]" value="<?php echo $admin['tel']?>" /></td>
      </tr>
      <tr>
        <td>电子邮件</td>
        <td><input type="text" class="text" name="adminnew[email]" value="<?php echo $admin['email']?>" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" class="button" value="提交" /></td>
      </tr>
    </table>
</form>
</div>
<script type="text/javascript">
$("#adminform").submit(function(){
if(!$("input[name='adminnew[username]']").val()){
alert("用户名不能留空");
return false;
}
var password = $("input[name='adminnew[password]']").val();
if(password && password.length<6){
alert("密码至少6位，请重新输入");
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
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>管理员管理</li>
<li>查看管理员信息</li>
</ul>
</div>
<div class="body">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
  <tr>
<td width="67">用户名</td>
<td width="493"><?php echo $admin['username']?></td>
  </tr>
  <tr>
<td>管理分组</td>
<td><?php echo $admin['grouptitle']?></td>
  </tr>
  <tbody id="towns">
<tr>
  <td>所在乡镇</td>
  <td><?php echo $admin['town']?></td>
</tr>
  </tbody>
  <tbody id="schools">
<tr>
  <td>所在学校</td>
  <td><?php echo $admin['school']?></td>
</tr>
  </tbody>
  <tr>
<td>真实姓名</td>
<td><?php echo $admin['realname']?></td>
  </tr>
  <tr>
<td>联系电话</td>
<td><?php echo $admin['tel']?></td>
  </tr>
  <tr>
<td>电子邮件</td>
<td><?php echo $admin['email']?></td>
  </tr>
</table>
</div>
<?php } else { ?>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>管理员管理</li>
<li>管理员列表</li>
</ul>
</div>
<div class="body">
<div class="titlediv"><strong>管理员管理</strong>
<ul class="tab">
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>"><span>管理</span></a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=add"><span>添加</span></a></li>
</ul>
<div class="clear"></div>
  </div>
<form method="post" action="" name="admins" id="admins">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tlist">
<tr>
<th width="60"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 全选</th>
<th>管理员账号</th>
<th width="100">真实姓名</th>
<th width="100">管理分组</th>
<th width="100">所在乡镇</th>
<th width="120">联系电话</th>
<th width="160">电子邮件</th>
<th width="130">最后登录时间</th>
<th width="100">最后登录IP</th>
<th width="70">登录次数</th>
<th width="50">已审核</th>
<th width="40">选项</th>
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
<td><img src="static/images/<?php if($admin['status']) { ?>yes.gif<?php } else { ?>no.gif<?php } ?>"<?php if(!$admin['isfounder']) { ?> class="toggle" onclick="toggle(this,'do=toggle_status&adminid=<?php echo $admin['adminid']?>&formsubmit=yes&formhash=<?php echo FORMHASH?>')" title="点击更改审核状态"<?php } ?> border="0" /></td>
<td><a href="<?php echo $BASESCRIPT?>?action=admin&do=edit&adminid=<?php echo $admin['adminid']?>">编辑</a></td>
</tr><?php } } ?><tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 全选</td>
<td colspan="11">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="删除" onclick="submitForm('delete')" />
<input type="button" class="button" value="导出EXCEL表格" onclick="window.open('<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=export')" />
<input type="button" class="button" value="刷新" onclick="LoadPage('page=<?php echo $page?>')" />
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