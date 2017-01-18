<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="index.php?action=home">首页</a></li>
<li>导入学生成绩</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>导入学生成绩</strong>
<div class="clear"></div>
</div>
<p>提示：本功能只支持EXCEL2003(xls)格式的表格，表格模板请点击下面的下载链接进行下载。</p>
<form method="post" enctype="multipart/form-data" action="">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<input type="file" name="file" />
<input type="submit" class="button" value="导入" />
</form>
<p></p>
<p><strong><a href="data/result.xls" target="_blank">下载成绩表模板</a></strong></p>
</div>