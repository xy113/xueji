<?php
////////////////////////////�ļ�˵��/////////////////////////////////
//����������������֤��ģ��
//////////////////////////////////////////////////////////////////////
define('ROOT_PATH', str_replace("/source/include/randcode.php", '', str_replace('\\', '/', __FILE__)));
@ini_set('session.save_path', ROOT_PATH.'/data/sessions');
session_start();
header("Content-type: image/png");
header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
if(PHP_VERSION < '4.1.0') $_SESSION = &$HTTP_SESSION_VARS;
unset($HTTP_SESSION_VARS);
/*
* ��ʼ��
*/
$randcode = array();
$randcode['border']   = 1; //�Ƿ�Ҫ�߿� 1Ҫ:0��Ҫ
$randcode['how']	  = 4; //��֤��λ��
$randcode['width']	  = $randcode['how']*15; //ͼƬ���
$randcode['height']   = 23; //ͼƬ�߶�
$randcode['fontsize'] = 6; //�����С
$randcode['alpha']    = "01234"; //����1
$randcode['number']   = "56789"; //����2
$randcode['code']	  = "";//��֤���ַ�����ʼ��

srand((double)microtime()*1000000); //��ʼ�����������
$im = ImageCreate($randcode['width'], $randcode['height']); //������֤ͼƬ
/*
* ���ƻ������
*/
$bgcolor = ImageColorAllocate($im, 255, 255, 255); //���ñ�����ɫ
ImageFill($im, 0, 0, $bgcolor); //��䱳��ɫ
if($randcode['border']){
    $black = ImageColorAllocate($im, 0, 0, 0); //���ñ߿���ɫ
    ImageRectangle($im, 0, 0, $randcode['width']-1, $randcode['height']-1, $black);//���Ʊ߿�
}
/*
* ��λ��������ַ�
*/
for($i=0; $i<$randcode['how']; $i++)
{   
    $alpha_or_number = mt_rand(0, 1); //ѡ������1����2
    $str = $alpha_or_number ? $randcode['alpha'] : $randcode['number'];
    $which = mt_rand(0, strlen($str)-1); //ȡ�ĸ��ַ�
    $code = substr($str, $which, 1); //ȡ�ַ�
    $j = !$i ? 4 : $j+15; //���ַ�λ��
    $color3 = ImageColorAllocate($im, mt_rand(0,100), mt_rand(0,100), mt_rand(0,100)); //�ַ��漴��ɫ
    ImageChar($im, $randcode['fontsize'], $j, 3, $code, $color3); //���ַ�
    $randcode['code'] .= $code; //��λ������֤���ַ���
}
/*
* ��Ӹ���
*/ 
for($i=0; $i<$randcode['how']*10; $i++)//�汳�����ŵ�
{   
    $color2 = ImageColorAllocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255)); //���ŵ���ɫ 
    ImageSetPixel($im, mt_rand(0,$randcode['width']), mt_rand(0,$randcode['height']), $color2); //���ŵ�
}
//����֤���ַ���д��session
$_SESSION['randcode'] = $randcode['code'];
unset($randcode);
/*��ͼ����*/
Imagepng($im);
ImageDestroy($im);
/*��ͼ����*/
?> 
