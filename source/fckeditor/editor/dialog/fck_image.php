<?php
require_once '../../../common.inc.php';
$dopost = isset($_REQUEST['dopost']) ? trim($_REQUEST['dopost']) : '';
$imgHtml = $imgsrcValue = $imgwidthValue = $imgheightValue = '';
if(empty($imgwidthValue)) $imgwidthValue = 400;
if(empty($imgheightValue)) $imgheightValue = 300;
if($dopost=='upload'){
	require_once ROOT_PATH.'/include/image.class.php';
	$upload = new upload('imgfile');
	$upload->create_small = (trim($_POST['createsmall'])=='yes');
    $upload->upload_save_path = ROOT_PATH.'/'.$cfg['attachdir'];
    $upload->water_mark    = ($cfg['watermark']==1);
    $upload->small_width   = isset($_POST['width']) ? intval($_POST['width']) : $cfg['thumbwidth'];
    $upload->small_height  = isset($_POST['height']) ? intval($_POST['height']) : $cfg['thumbheight'];
    $upload->save_local_image();	
    $imgsrcValue = $upload->create_small ? $upload->upload_file_small : $upload->upload_file_name;
	$imgsrcValue = 'http://'.$_SERVER['HTTP_HOST'].'/'.$imgsrcValue;
	$urlValue = $imgsrcValue;
	$imgHtml .=  "<a href=\"$urlValue\" target=\"_blank\"><img src=\"$imgsrcValue\" style=\"width: {$imgwidthValue}px; height: {$imgheightValue}px;\" border=\"0\" alt=\"\" /></a><br />ͼƬ<br />\r\n";
}
?>
<HTML>
<HEAD>
<title>����ͼƬ</title>
<base target="_self" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="base.css" rel="stylesheet" type="text/css" />
<style>
td { font-size:12px; }
input { font-size:12px; }
</style>
<script language=javascript>
var oEditor	= window.parent.InnerDialogLoaded() ;
var oDOM = oEditor.FCK.EditorDocument ;
var FCK = oEditor.FCK;
var picnum = 1;

function ImageOK()
{
	var inImg,ialign,iurl,imgwidth,imgheight,ialt,isrc,iborder;
	ialign = document.form1.ialign.value;
	iborder = document.form1.border.value;
	imgwidth = document.form1.imgwidth.value;
	imgheight = document.form1.imgheight.value;
	ialt = document.form1.alt.value;
	var basehost = '';
	if(document.form1.imgsrc.value.indexOf('ttp:') <= 0)
	{
		isrc = basehost + document.form1.imgsrc.value;
	}else{
		isrc = document.form1.imgsrc.value;
	}

	if(document.form1.imgsrc.value.indexOf('ttp:') <= 0 && document.form1.imgsrc.value != '') {
		iurl = basehost + document.form1.url.value;
	}
	else
	{
		iurl = document.form1.url.value;
	}
	if(ialign!=0) ialign = " align='"+ialign+"'";
	inImg  = "<img src='"+ isrc +"' width='"+ imgwidth;
	inImg += "' height='"+ imgheight +"' border='"+ iborder +"' alt='"+ ialt +"'"+ialign+"/>";
	if(iurl!="") inImg = "<a href='"+ iurl +"' target='_blank'>"+ inImg +"</a>\r\n";
	//FCK.InsertHtml(inImg);
	var newCode = FCK.CreateElement('DIV');
  	newCode.innerHTML = inImg;
  	window.parent.Cancel();
}

function ImageOK2()
{
	var iimghtml = document.form1.imghtml.value;
	//FCK.InsertHtml(iimghtml);
	var newCode = FCK.CreateElement('DIV');
    newCode.innerHTML = iimghtml;
    window.parent.Cancel();
}

function SelectMedia(fname)
{
   var sw=Math.floor((window.screen.width/2-300));
   var sh=Math.floor((window.screen.height/2-220));
   window.open("select_image.php?obj="+fname, "popUpImgWin", "scrollbars=yes,resizable=yes,statebar=no,width=600,height=400,left="+sw+", top="+sh);
}

function SeePic(imgid,fobj)
{
   if(!fobj) return;
   if(fobj.value != "" && fobj.value != null)
   {
     var cimg = document.getElementById(imgid);
     if(cimg) cimg.src = fobj.value;
   }
}

function UpdateImageInfo()
{

	var imgsrc = document.form1.imgsrc.value;
	if(imgsrc!="")
	{
	  var imgObj = new Image();
	  imgObj.src = imgsrc;
	  document.form1.himgheight.value = imgObj.height;
	  document.form1.himgwidth.value = imgObj.width;
	  document.form1.imgheight.value = imgObj.height;
	  document.form1.imgwidth.value = imgObj.width;
  }
}

function UpImgSizeH()
{
   var ih = document.form1.himgheight.value;
   var iw = document.form1.himgwidth.value;
   var iih = document.form1.imgheight.value;
   var iiw = document.form1.imgwidth.value;
   if(ih!=iih && iih>0 && ih>0 && document.form1.autoresize.checked)
   {
      document.form1.imgwidth.value = Math.ceil(iiw * (iih/ih));
   }
}

function UpImgSizeW()
{
   var ih = document.form1.himgheight.value;
   var iw = document.form1.himgwidth.value;
   var iih = document.form1.imgheight.value;
   var iiw = document.form1.imgwidth.value;
   if(iw!=iiw && iiw>0 && iw>0 && document.form1.autoresize.checked)
   {
      document.form1.imgheight.value = Math.ceil(iih * (iiw/iw));
   }
}

function AddForm()
{
	picnum++;
	document.getElementById('moreupload').innerHTML += "ͼƬ"+picnum+"��<input name='imgfile"+picnum+"' type='file' id='imgfile"+picnum+"' class='binput' /><br />\r\n";
	document.form1.totalform.value = picnum;
}

function checkUpload(){
	if(!document.form1.imgfile.value){
		return false;
	}else{
		document.form1.submit();
		document.form1.picsubmit.disabled=true;
	}
}
</script>
</HEAD>
<body bgcolor="#EBF6CD" leftmargin="4" topmargin="2">
<form enctype="multipart/form-data" name="form1" id="form1" method="post">
<?php
//�ϴ��󷵻ص�����
if($imgHtml != '')
{
?>
<table width="100%" border="0">
	<tr>
		<td nowrap='1'>
		<fieldset>
			<legend>�ϴ���õ���ͼƬHTML��Ϣ</legend>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td nowrap='1'>
					<textarea name='imghtml' style='width:100%;height:250px;'><?php echo $imgHtml; ?></textarea>
					</td>
				</tr>
				<tr height="28">
					<td align='center'>
		            <input type="button" name="imgok" id="imgok" onclick='ImageOK2()' value=" ���뵽�༭��  " style="height:24px" class="binput" />
		          </td>
				</tr>
			</table>
			</fieldset>
		</td>
	</tr>
</table>			

<?php
//Ĭ����ʾ����
} else {
?>
<input type="hidden" name="dopost" value="upload" />
<input type="hidden" name="himgheight" value="<?php echo $imgheightValue?>" />
<input type="hidden" name="himgwidth" value="<?php echo $imgwidthValue?>" />
<input type="hidden" name="totalform" value="1" />
<table width="100%" border="0">
	<tr>
		<td nowrap='1'>
		<fieldset>
			<legend>�ϴ���ͼƬ</legend>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr height="30">
					<td align="right"  width="65">ͼƬ��</td>
					<td><input name="imgfile" type="file" id="imgfile" class="binput" style="width:300px;" />
					  <div id='moreupload'></div>
					</td>
				</tr>
				<tr height="30">
					<td align="right">ѡ�</td>
					<td>
						<input type="checkbox" name="createsmall" value="yes" />��������ͼ��
						����ͼ���
						<input name="width" type="text" value="<?php echo $cfg['img_width']?>" size="3" />
						����ͼ�߶�
						<input name="height" type="text" value="<?php echo $cfg['img_height']?>" size="3" />
					</td>
				</tr>
				<tr height="36">
					<td colspan="2" style="padding-left:50px;">
		            <!--<input type="button" name="addupload" id="addupload" onclick='AddForm()' value=" �����ϴ���  " style="height:24px" class="binput" />-->
		            <input type="button" onclick="checkUpload()" name="picsubmit" id="picsubmit" value=" �� ��  " style="height:24px" class="binput" />
		            </td>
				</tr>
			</table>
			</fieldset>
		</td>
	</tr>
	<tr>
		<td>
		<fieldset>
		<legend>����ͼƬ</legend>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="65" height="25" align="right">��ַ��</td>
            <td colspan="2">
              <input name="imgsrc" type="text" id="imgsrc" size="30" onChange="SeePic('picview',this);" value="<?php echo $imgsrcValue?>" />
              <input onClick="SelectMedia('form1.imgsrc');" type="button" name="selimg" value=" ���������... " class="binput" style="width:100px" />
             </td>
          </tr>
          <tr>
            <td height="25" align="right">��ȣ�</td>
            <td colspan="2" nowrap>
			  <input type="text"  id="imgwidth" name="imgwidth" size="8" value="<?php echo $imgwidthValue?>" onChange="UpImgSizeW()" />��
                     �߶�: <input name="imgheight" type="text" id="imgheight" size="8" value="<?php echo $imgheightValue?>" onChange="UpImgSizeH()" />
              <input type="button" name="Submit" value="ԭʼ" class="binput" style="width:40" onClick="UpdateImageInfo()" />
              <input name="autoresize" type="checkbox" id="autoresize" value="1" checked='1' />
                   ����
            </td>
          </tr>
          <tr>
            <td height="25" align="right">�߿�</td>
            <td colspan="2" nowrap>
              <input name="border" type="text" id="border" size="4" value="0" />
              &nbsp;�������:
              <input name="alt" type="text" id="alt" size="10" />
            </td>
          </tr>

          <tr>
            <td height="25" align="right">���ӣ�</td>
            <td width="166" nowrap><input name="url" type="text" id="url" size="30"   value="<?php echo $urlValue?>" /></td>
            <td width="155" align="center" nowrap='1'>&nbsp;</td>
          </tr>
					<tr>
            <td height="25" align="right">  ���룺
            </td>

            <td nowrap='1'>
            <select name="ialign" id="ialign">
                <option value="0" selected>Ĭ��</option>
                <option value="right">�Ҷ���</option>
                <option value="center">�м�</option>
                <option value="left">�����</option>
                <option value="top">����</option>
                <option value="bottom">�ײ�</option>
              </select>
            </td>
            <td align="right" nowrap='1'>
            	<input onClick="ImageOK();" type="button" name="Submit2" value=" ȷ�� " class="binput" />
            </td>
          </tr>
        </table>
      </fieldset>
		</td>
	</tr>
</table>
<?php
}
?>
</form>
</body>
</HTML>