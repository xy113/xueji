<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="index.php?action=home">首页</a></li>
<li>学生照片导入</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>学生照片导入</strong>
<div class="clear"></div>
</div>
<p>提示：请将学生照片用学号命名，保存为jpg格式，再将所有打包为zip格式，且所有照片需放在zip压缩包根目录里，不能有下级目录。</p>
<form method="post" enctype="multipart/form-data" action="">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<input type="file" name="file" />
<input type="submit" class="button" value="导入" />
</form>
<p></p>
<p><strong>照片打包方法演示图</strong></p>
<p><img src="/static/images/d1.jpg" border="0" /></p>
<p><img src="/static/images/d2.jpg" border="0" /></p>
</div>