<?php if($do=='add' || $do=='edit') { ?>
<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">��ҳ</a></li>
<li>�������</li>
<li>���/�༭����</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>ϵͳ�������</strong>
<ul class="tab">
<li><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>"><span>����</span></a></li>
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=add"><span>���</span></a></li>
</ul>
<div class="clear"></div>
</div> 
<form method="post" name="announce" action="" id="announce">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
    <table width="100%" border="0" cellspacing="1" class="form">
      <tr>
        <td width="31%" class="bold">����</td>
        <td width="69%">&nbsp;</td>
      </tr>
      <tr>
        <td><input name="announcenew[title]" type="text" class="text" id="announce_title" value="<?php echo $announce['title']?>" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">����</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input name="announcenew[sign]" type="text" class="text" id="announce_sign" value="<?php echo $announce['sign']?>" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="bold">����</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2"><?php echo $fckeditor?></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" class="button" value="�ᡡ��" /></td>
      </tr>
    </table>
</form>
</div>
<script type="text/javascript">
$("#announce").submit(function(){
if(!$("input[name='announcenew[title]']").val()){
alert("���ⲻ�����գ�����������");
return false;
}
return true;
})
</script>
<?php } else { ?>
<div class="yourpos">
<ul>
<li class="home">��ǰλ�ã�</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">��ҳ</a></li>
<li>�������</li>
<li>�����б�</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>ϵͳ�������</strong>
<ul class="tab">
<li class="current"><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>"><span>����</span></a></li>
<li><a href="<?php echo $BASESCRIPT?>?action=<?php echo $action?>&do=add"><span>���</span></a></li>
</ul>
<div class="clear"></div>
</div> 
<form method="post" action="" name="announce">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tlist">
<tr>
<th width="50"><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</th>
<th>����</th>
<th width="80">����</th>
<th width="80">������</th>
<th width="140">ʱ��</th>
<th width="60">ѡ��</th>
</tr><?php if(is_array($announces)) { foreach($announces as $ann) { ?><tr onmouseover="this.className='hover'" onmouseout="this.className=''">
<td><input type="checkbox" name="delete[]" value="<?php echo $ann['id']?>" /></td>
<td><a href="index.php?action=news&amp;id=<?php echo $ann['id']?>" target="_blank"><?php echo $ann['title']?></a></td>
<td><?php echo $ann['sign']?></td>
<td><?php echo $ann['author']?></td>
<td><?php echo $ann['dateline']?></td>
<td><a href="<?php echo $BASESCRIPT?>?action=announce&do=edit&id=<?php echo $ann['id']?>">�༭</a></td>
</tr><?php } } ?><tr>
<td><input type="checkbox" class="checkbox" onclick="checkAll(this,'delete[]')" /> ɾ?</td>
<td colspan="5">
<span class="pagebox"><?php echo $pagelink?></span>
<input type="submit" class="button" value="�ύ" />
</td>
</tr>
</table>
</form>
</div>
<?php } ?>