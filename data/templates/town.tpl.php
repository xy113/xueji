<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>乡镇管理</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>乡镇管理</strong>
<div class="clear"></div>
</div> 
<form method="post" action="" name="towns">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tlist">
<tr>
<th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</th>
<th width="50">编号ID</th>
<th>乡镇名称</th>
</tr><?php if(is_array($towns)) { foreach($towns as $town) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<td><input type="checkbox" name="delete[]" value="<?php echo $town['tid']?>" /></td>
<td><?php echo $town['tid']?></td>
<td><input type="text" class="text" name="townnew[<?php echo $town['tid']?>]" value="<?php echo $town['town']?>" /></td>
</tr><?php } } ?><tbody id="newtowns"></tbody>
<tr>
<td></td>
<td></td>
<td><a href="###" onclick="addtown()">[+]增加乡镇</a></td>
</tr>
<tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td><input type="submit" class="button" value="提交" /></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
function addtown(){
$("#newtowns").append('<tr><td></td><td></td><td><input type="text" class="text" name="newtown[]" /></td></tr>');
}
</script>