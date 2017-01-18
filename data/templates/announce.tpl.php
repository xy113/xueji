<?php if($do=='add' || $do=='edit') { ?>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>公告管理</li>
<li>添加/编辑公告</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>系统公告管理</strong>
<ul class="tab">
<li><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>"><span>管理</span></a></li>
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=add"><span>添加</span></a></li>
</ul>
<div class="clear"></div>
</div> 
<form method="post" name="announce" action="" id="announce">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
    <table width="100%" border="0" cellspacing="1" class="form">
      <tr>
        <td width="31%" class="bold">标题</td>
        <td width="69%">&nbsp;</td>
      </tr>
      <tr>
        <td><input name="announcenew[title]" type="text" class="text" id="announce_title" value="<?php echo $announce['title']?>" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">署名</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input name="announcenew[sign]" type="text" class="text" id="announce_sign" value="<?php echo $announce['sign']?>" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">内容</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2"><?php echo $fckeditor?></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" class="button" value="提　交" /></td>
      </tr>
    </table>
</form>
</div>
<script type="text/javascript">
$("#announce").submit(function(){
if(!$("input[name='announcenew[title]']").val()){
alert("标题不能留空，请重新输入");
return false;
}
return true;
})
</script>
<?php } else { ?>
<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>公告管理</li>
<li>公告列表</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>系统公告管理</strong>
<ul class="tab">
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>"><span>管理</span></a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=add"><span>添加</span></a></li>
</ul>
<div class="clear"></div>
</div> 
<form method="post" action="" name="announce">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tlist">
<tr>
<th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</th>
<th>标题</th>
<th width="80">署名</th>
<th width="80">发布人</th>
<th width="140">时间</th>
<th width="60">选项</th>
</tr><?php if(is_array($announces)) { foreach($announces as $ann) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<td><input type="checkbox" name="delete[]" value="<?php echo $ann['id']?>" /></td>
<td><a href="index.php?action=news&amp;id=<?php echo $ann['id']?>" target="_blank"><?php echo $ann['title']?></a></td>
<td><?php echo $ann['sign']?></td>
<td><?php echo $ann['author']?></td>
<td><?php echo $ann['dateline']?></td>
<td><a href="<?php echo $BASESCRIPT?>?action=announce&do=edit&id=<?php echo $ann['id']?>">编辑</a></td>
</tr><?php } } ?><tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> 删?</td>
<td colspan="5">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="提交" />
</td>
</tr>
</table>
</form>
</div>
<?php } ?>