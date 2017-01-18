<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>查看系统日志</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>运行日志管理</strong>
<div class="clear"></div>
</div> 
<form method="post" action="" name="cplog">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tlist">
<tr>
<th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</th>
<th>操作内容</th>
<th width="120">操作人</th>
<th width="140">操作时间</th>
</tr><?php if(is_array($cplogs)) { foreach($cplogs as $log) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<td><input type="checkbox" name="delete[]" value="<?php echo $log['id']?>" /></td>
<td><?php echo $log['body']?></td>
<td><?php echo $log['username']?></td>
<td><?php echo $log['dateline']?></td>
</tr><?php } } ?><tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="3">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="提交" />
</td>
</tr>
</table>
</form>
</div>