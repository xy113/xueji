<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>系统公告</li>
</ul>
</div>
<div class="body">
<div class="titlediv"><strong>最新公告</strong><div class="clear"></div></div> 
<ul class="list"><?php if(is_array($announces)) { foreach($announces as $ann) { ?><li><a href="index.php?action=news&amp;id=<?php echo $ann['id']?>" target="_blank">[<?php echo $ann['dateline']?>]　<?php echo $ann['title']?></a></li><?php } } ?></ul>
</div>