<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">��ҳ</a></li>
<li>ϵͳ����</li>
</ul>
</div>
<div class="body">
<div class="titlediv"><strong>���¹���</strong><div class="clear"></div></div> 
<ul class="list"><?php if(is_array($announces)) { foreach($announces as $ann) { ?><li><a href="index.php?action=news&amp;id=<?php echo $ann['id']?>" target="_blank">[<?php echo $ann['dateline']?>]��<?php echo $ann['title']?></a></li><?php } } ?></ul>
</div>