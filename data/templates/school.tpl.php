<script type="text/javascript">
var towns = {<?php if(is_array($towns)) { foreach($towns as $town) { ?>'<?php echo $town['tid']?>':'<?php echo $town['town']?>',<?php } } ?>}
function showTown(sid,tid){
var tstr = '<select name="schoolnew['+sid+'][tid]">';
for(var tt in towns){
tstr+= '<option value="'+tt+'" '+(tt==tid ? 'selected' : '')+'>'+towns[tt]+'</option>';
}
tstr+='</select>';
document.write(tstr);
}
</script>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>学校管理</li>
<li>学校列表</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<form method="get" name="search" action="<?php echo $BASESCRIPT?>">
<input type="hidden" name="action" value="<?php echo $action?>" />
所在乡镇 
<select name="tid">
<option value="0">全部</option><?php if(is_array($towns)) { foreach($towns as $town) { ?><option value="<?php echo $town['tid']?>"<?php if($town['current']) { ?> selected="selected"<?php } ?>><?php echo $town['town']?></option><?php } } ?></select> 
学校类别
<select name="stype">
<option value="0">全部</option>
<option value="1"<?php if($stype==1) { ?> selected="selected"<?php } ?>>小学</option>
<option value="2"<?php if($stype==2) { ?> selected="selected"<?php } ?>>中学</option>
</select> 
<input type="submit" class="button" value="查询" />
</form>
</div> 
<form method="post">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tlist">
<tr>
<th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</th>
<th width="50">编号ID</th>
<th width="200">学校名称</th>
<th width="100">学校类别</th>
<th>所在乡镇</th>
</tr><?php if(is_array($schools)) { foreach($schools as $sc) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<td><input type="checkbox" name="delete[]" value="<?php echo $sc['sid']?>" /></td>
<td><?php echo $sc['sid']?></td>
<td><input type="text" class="text text160" name="schoolnew[<?php echo $sc['sid']?>][sname]" value="<?php echo $sc['sname']?>" /></td>
<td>
<select name="schoolnew[<?php echo $sc['sid']?>][stype]">
<option value="1"<?php if($sc['stype']==1) { ?> selected="selected"<?php } ?>>小学</option>
<option value="2"<?php if($sc['stype']==2) { ?> selected="selected"<?php } ?>>中学</option>
</select>
</td>
<td><script type="text/javascript">showTown(<?php echo $sc['sid']?>,<?php echo $sc['tid']?>);</script></td>
</tr><?php } } ?><tbody id="newschool"></tbody>
<tr>
<td></td>
<td colspan="5"><a href="###" id="addSchool">[+]添加新学校</a></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="5">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="提交" />
</td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
$("#addSchool").click(function(){
var toptions = '<select name="newtid[]">';
for(var tid in towns){
toptions+= '<option value="'+tid+'">'+towns[tid]+'</option>';
}
toptions+= '</select>';
$("#newschool").append('<tr"><td></td><td></td><td><input type="text" class="text text160" name="newsname[]" /></td>'+
'<td><select name="newtype[]"><option value="1">小学</option><option value="2">中学</option></select></td><td>'+toptions+'<\/td><\/tr>');
});
</script>