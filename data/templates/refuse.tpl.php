<div class="yourpos">
<ul>
<li class="home">当前位置：</li>
<li><a href="<?php echo $BASESCRIPT?>?action=home">首页</a></li>
<li>拒绝通过审核</li>
</ul>
</div>
<div class="body">
<div class="titlediv">
<strong>拒绝通过审核</strong>
<div class="clear"></div>
</div>
<p>请在下面输入拒绝审核的原因</p>
<form method="post" id="form1">
<input type="hidden" name="formhash" value="<?php echo FORMHASH?>" />
<input type="hidden" name="formsubmit" value="yes" />
<input type="hidden" name="do" value="refuse" />
<input type="hidden" name="type" value="<?php echo $type?>" />
<input type="hidden" name="ids" value="<?php echo $ids?>" />
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
          <tr>
            <td width="70">拒绝原因：</td>
            <td><textarea class="text" name="reason" style="height:100px;"></textarea></td>
          </tr>
          <tr>
  	<td></td>
            <td><input type="submit" class="button" value="提交"></td>
          </tr>
        </table>
</form>
</div>