<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="index.php?action=home">首页</a></li>
<li>数据统计</li>
<?php if($atype>0) { ?><li><?php echo $lang['atype'][$atype]?></li><?php } else { ?><li>全部统计</li><?php } ?>
</ul>
</div>
<div class="body">
<div class="titlediv" style="border-bottom:none">
<span class="pagebox">总计<?php echo $total['total']?>人，男生<?php echo $total['male']?>人，女生<?php echo $total['female']?>人。</span>
<!--<input type="button" class="button" value="打印表格" onclick="window.open(purl+'&do=print&atype=<?php echo $atype?>')" /> -->
<input type="button" class="button" value="导出EXCEL表" onclick="window.open(purl+'&do=export')" />
</div> 
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablelist">
<tr>
<th width="30">编号</th>
<th width="100">学校</th>
<th width="100">所在乡镇</th>
<th width="100">学生总数</th>
<th width="100">男生人数</th>
<th width="100">女生人数</th>
<th></th>
</tr><?php if(is_array($schools)) { foreach($schools as $school) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<td><?php echo $school['no']?></td>
<td><?php echo $school['sname']?></td>
<td><?php echo $school['town']?></td>
<td><?php echo $school['total']?></td>
<td><?php echo $school['male']?></td>
<td><?php echo $school['female']?></td>
<td></td>
</tr><?php } } ?></table>
</div>