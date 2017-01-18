<?php
define('CURSCRIPT','select_image');
require_once '../../../common.inc.php';

$inpath = $curpath = $obj = $activeurl = '';
$inpath = ROOT_PATH.$cfg['attachdir'];
$basepath = 'http://'.$_SERVER['HTTP_HOST'].$cfg['attachdir'];
$obj = isset($_GET['obj']) ? trim($_GET['obj']) : '';
$curpath = isset($_GET['curpath']) ? trim($_GET['curpath']) : '';
$curpath = str_replace('.','',$curpath);
$curpath = ereg_replace('/{1,}','/',$curpath);
$activeurl = '..'.$curpath;
$filetree = array();
$files = array();
$inpath .= $curpath; 
$dir = dir($inpath);
while($file = $dir->read()) {
	//-----�����ļ���С�ʹ���ʱ��
	$filepath = $inpath.'/'.$file;
	if($file == '.'){
		continue;
	}elseif ($file == '..'){
		if ($curpath=='')continue;
		$folders[] = array(
		   'filename'=>'�ϼ�Ŀ¼',
		   'folderlink'=>'select_image.php?obj='.$obj.'&curpath='.urlencode(eregi_replace("[/][^/]*$","",$curpath)),
		   'img'=>'../images/img/dir2.gif'
	    );
	}elseif(is_dir($filepath)){
		if(eregi("^_(.*)$",$file)){
			continue; 
			//#����FrontPage��չĿ¼��linux����Ŀ¼
		}
		if(eregi("^\.(.*)$",$file)){
			continue;
		}
		$folders[] = array(
		   'filename'=>$file,
		   'folderlink'=>'select_image.php?obj='.$obj.'&curpath='.urlencode($curpath.'/'.$file),
		   'img'=>'../images/img/dir.gif'
	    );
	}else {
		$filesize = filesize($filepath);
		$filesize = round(($filesize/1024),2).'KB';
		$filetime = filemtime($filepath);
		$filetime = date("Y-m-d H:i:s",$filetime);
		
		$files['filename'] = $file;
		$files['filesize'] = $filesize;
		$files['filetime'] = $filetime;
		$files['filepath'] = $curpath.'/'.$file;
		if (eregi(".(gif|png)",$file)){
			$files['img'] = '../images/img/gif.gif';
		}elseif (eregi(".(jpg)",$file)){
			$files['img'] = '../images/img/jpg.gif';
		}else {
			continue;
			//$files['img'] = '../images/img/txt.gif';
		}
		$filetree[]=$files;
	}
}
//End Loop
$dir->close();
//$smarty->assign('obj',$obj);
//$smarty->assign('folders',$folders);
//$smarty->assign('filetree',$filetree);
//$smarty->display('select_image.htm');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ͼƬѡ����</title>
<style type="text/css">
*{padding:0px;margin:0px;}
body{padding:0px; margin:0px; font-size:12px;}
a{
text-decoration:none
}
.napisdiv {position:absolute;z-index:3;display:none; margin:10px auto; top:5px; left:150px;}
.inputtxt{
    height:18px;		vertical-align:middle;
		line-height:18px;
		font-size:12px;
		padding:0px;
		margin:0px;
}
.td-right {padding-left:3px;}
</style>
</head>

<body style="margin:0px;padding:0px 5px;">
<div class="main-div">
   		<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#c0fafb">
				<tr bgcolor="#FFFFFF">
						<td height="24" align="center" class="list-title">Ŀ¼���ļ���</td>
						<td width="60" align="center" class="list-title">�ļ���С</td>
						<td width="140" align="center" class="list-title">�޸�ʱ��</td>
						<td width="40" align="center" class="list-title">Ԥ��</td>
				</tr>
		        <?php foreach($folders as $fd){?>
				<tr bgcolor="#FFFFFF">
						<td height="24" class="td-right"><a href="<?php echo $fd['folderlink']?>"><img src="<?php echo $fd['img']?>" border="0" /> <?php echo $fd['filename']?></a></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
				</tr>
				<?php }?>
				<?php foreach($filetree as $tree){?>
				<tr bgcolor="#FFFFFF" onmouseover="this.style.background='#f0f0f0'" onmouseout="this.style.background='#fff'">
						<td  height="24" class="td-right"><a href="#" onclick="ReturnImg('<?php echo $basepath.$tree['filepath']?>')"><img src="<?php echo $tree['img']?>" border="0" /> <?php echo $tree['filename']?></a></td>
						<td  align="center"><?php echo $tree['filesize']?></td>
						<td  align="center"><?php echo $tree['filetime']?></td>
						<td  align="center"><a href="#" onClick="ChangeImage('<?php echo $basepath.$tree['filepath']?>');"><img src="../images/img/picviewnone.gif" width="16" height="16" border="0" align="absmiddle" title="Ԥ��"></a></td>
				</tr>
				<?php }?>
		</table>
</div>
<div id="floater" class="napisdiv">
<a href="#" onClick="document.getElementById('floater').style.display='none';"><img src="../images/img/picviewnone.gif" id="picview" border="0" width="320" style="border:1px #333333 solid;" title="�����ر�Ԥ��"></a></div>
<script language="javascript"> 
function ReturnImg(reimg)
{
	window.opener.document.<?php echo $obj?>.value=reimg;
	if(document.all) window.opener=true;
    window.close();
}
function ChangeImage(surl){ 
	document.getElementById('floater').style.display='block';
	document.getElementById('picview').src = surl; 
}
function CheckUpload(fileobj){
    if(!fileobj.file.value){
	   	 alert(upload_file_empty);
		 return false;
	}
	return true;
}
</script>
</body>
</html>