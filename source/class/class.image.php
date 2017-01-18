<?php
/**
 * ============================================================================
 * ��Ȩ���� (C) 2010-2099 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0
 * ---------------------------------------------
 * $Date: 2011-05-18
 * $ID: upload.class.php
*/ 
if(!defined('IN_XSCMS')){
   die('Access Denied!');
}
class upload{
	public $upload_form_field = 'upfile';
	public $upload_save_path  = 'data/attachments';
	public $upload_file_name  = '';
	public $upload_file_small = '';
	public $upload_file_size  = '';
	public $upload_file_type  = '';
	public $parsed_file_name  = '';

	public $max_file_size = 1024000000;
	public $allowed_file_ext = array('jpg','gif','png');
	public $create_small = true;	
	public $small_width  = 160;
	public $small_height = 120;
	
	/*********ͼƬˮӡ********/
	public $water_mark  = false;
	public $water_type  = 1;
	public $water_image = 'include/water/water.png';
	public $water_pos   = 9;
	public $water_alpha = 100;
	public $water_text  = 'www.songdewei.com';
	public $water_fontsize  = 16;
	public $water_fontcolor = '#FFFFFF';
	public $water_fontfile  = "include/font/arial.ttf";
	public $water_xoffset = 0;
	public $water_yoffset = 0;
	public $error = array();
	public $errornum = 0;

	
	function __construct($input_form_name='upfile'){
		$this->upload($input_form_name);
	}
	function upload($input_form_name='upfile'){
	    $this->upload_form_field = $input_form_name;
	    $this->upload_save_path  = ROOT_PATH.'/'.$GLOBALS['cfg']['attachdir'];
	    $this->max_file_size     = $GLOBALS['cfg']['attachmax']*1024*1024;
	    $this->allowed_file_ext  = explode('|',$GLOBALS['cfg']['imgtype']);
	    $this->create_small		 = $GLOBALS['cfg']['thumbstatus'];
	    $this->small_width		 = $GLOBALS['cfg']['thumbwidth'];
	    $this->small_height		 = $GLOBALS['cfg']['thumbheight'];
	    $this->water_mark		 = $GLOBALS['cfg']['watermarkstatus'];
	    $this->water_type 		 = $GLOBALS['cfg']['watermarktype'];
	    $this->water_image 		 = ROOT_PATH.'/'.$GLOBALS['cfg']['watermarkimg'];
	    $this->water_fontfile    = ROOT_PATH.'/'.$GLOBALS['cfg']['watermarkfontfile'];
	    $this->water_pos         = $GLOBALS['cfg']['watermarkstatus'];
	    $this->water_alpha       = $GLOBALS['cfg']['watermarkalpha'];
	    $this->water_text        = $GLOBALS['cfg']['watermarktext'];
	    $this->water_fontsize    = $GLOBALS['cfg']['watermarkfontsize'];
	    $this->water_fontcolor   = $GLOBALS['cfg']['watermarkfontcolor'];
	    $this->water_xoffset     = $GLOBALS['cfg']['watermarkoffsetx'];
	    $this->water_yoffset     = $GLOBALS['cfg']['watermarkoffsety'];
	}
	function save_local_image(){
	    $this->_clean_paths();
		$newpath = date("Y").'/'.date("m").'/'.date('d');
		$this->_mk_dir($newpath);		
		$this->upload_save_path.= '/'.$newpath;
		$filepath = $GLOBALS['cfg']['attachdir'].'/'.$newpath;
		//echo $this->upload_save_path;exit();
		$file = &$_FILES[$this->upload_form_field];
		if (!isset($file['name'])||empty($file['name'])){
			return;
		}
		if(is_array($file['name'])){
			foreach ($file['name'] as $key=>$value){
				$file_type = preg_replace( "/^(.+?);.*$/", "\\1", $file['type'][$key]);
				$file_name = preg_replace( "/[^\w\.]/", "_", $file['name'][$key]);
				$file_size = $file['size'][$key];
				$file_ext = $this->_get_file_extension($file['name'][$key]);				
				if (!is_uploaded_file($file['tmp_name'][$key])){
					$this->error[] = 'Upload file is empty';
					$this->errornum++;
					continue;
				}			
				if (!is_array($this->allowed_file_ext) or (!count($this->allowed_file_ext)>0)){
					$this->allowed_file_ext = array('jpg','jpeg','gif','png');
				}								
				if (!in_array($file_ext,$this->allowed_file_ext)){
					$this->error[] = 'This file type not allowes to upload';
					$this->errornum++;
					continue;
				}
				if (($this->max_file_size ) and ($file_size > $this->max_file_size)){
					$this->error[] = 'This file is too large.';
					$this->errornum++;
					continue;
				}								
				$saved_file_name = $this->_set_filename($file_ext);
				$saved_full_name = $this->upload_save_path.'/'.$saved_file_name;				
				if(!@move_uploaded_file($file['tmp_name'][$key], $saved_full_name)){
					$this->error[] = 'move file failed.';
					$this->errornum++;
					continue;
				}else{
					@chmod($saved_full_name, 0777 );					
					if($this->create_small){
						$small_img = $this->ImageResize($saved_file_name,$this->small_width,$this->small_height);
						$this->upload_file_small[] = $filepath.'/'.$small_img;
					}else {
						$this->upload_file_small[] = $filepath.'/'.$saved_file_name;
					}										
					if($this->water_mark){
						$this->imageWaterMark($saved_full_name);
					}
					$this->upload_file_name[] = $filepath.'/'.$saved_file_name;
					$this->upload_file_size[] = $file_size;
					$this->upload_file_type[] = $file_type;
					$this->parsed_file_name[] = $saved_file_name;
				}			
			}
		}else{
			$file['type'] = preg_replace( "/^(.+?);.*$/", "\\1", $file['type']);
			$file['name'] = preg_replace( "/[^\w\.]/", "_", $file['name']);
			$this->upload_file_size = $file['size'];
			$this->upload_file_type = $file['type'];
			
			if( !is_uploaded_file($file['tmp_name'])){
				$this->error[] = 'Upload file is empty';
				$this->errornum++;
				return 1;
			}
			if(!is_array($this->allowed_file_ext) or (!count($this->allowed_file_ext)>0)){
				$this->allowed_file_ext = array('jpg','jpeg','gif','png');
			}
			
			$file_ext = $this->_get_file_extension($file['name']);
			if (!in_array($file_ext,$this->allowed_file_ext)){
				$this->error[] = 'This file type not allowes to upload';
				$this->errornum++;
				return 2;
			}
			if ($this->max_file_size and ($file['size'] > $this->max_file_size)){
				$this->error[] = 'This file is too large.';
				$this->errornum++;
				return 3;
			}
			
			$this->parsed_file_name = $this->_set_filename($file_ext);
			$saved_full_name = $this->upload_save_path.'/'.$this->parsed_file_name;
			
			if (!@move_uploaded_file($file['tmp_name'], $saved_full_name)){
				$this->error[] = 'move file failed.';
				$this->errornum++;
				return 5;
			}else{
				@chmod($saved_full_name, 0777);
				if($this->create_small){
					$small_img = $this->ImageResize($this->parsed_file_name,$this->small_width,$this->small_height);
				}else {
					$small_img = $this->parsed_file_name;
				}
				if($this->water_mark){
					$this->imageWaterMark($saved_full_name);
				}
				$this->upload_file_small = $filepath.'/'.$small_img;
				$this->upload_file_name  = $filepath.'/'.$this->parsed_file_name;
			}					
		}
	}
	
	function save_remote_image(){
	    $this->_clean_paths();
		$newpath = date("Y").'/'.date("m").'/'.date('d');
		$this->_mk_dir($newpath);
		$this->upload_save_path.= '/'.$newpath;
	    $filepath = $GLOBALS['cfg']['attachdir'].'/'.$newpath;		
		$file_url = $_POST[$this->upload_form_field];
		if (!isset($file_url)||empty($file_url)){
			return ;
		}
		
		if(is_array($file_url)) {
		    foreach($file_url as $fileurl) {
		    	if (empty($fileurl)){
		    		continue;
		    	}
			    $ext = $this->_get_file_extension($fileurl);
				if (!($file_content = @file_get_contents($fileurl))){
					continue;
				}
				$save_file_name = $this->_set_filename($ext);
				$save_full_name = $this->upload_save_path.'/'.$save_file_name;
				$fp = @fopen($save_full_name,'w');
				@fwrite($fp,$file_content);
				@fclose($fp);
				
				if($this->create_small){
					$small_img = $this->ImageResize($save_file_name,$this->small_width,$this->small_height);
				}else {
					$small_img = $save_file_name;
				}
				if($this->water_mark) $this->ImageWaterMark($save_full_name);
				$this->upload_file_type[]  = $ext;
				$this->parsed_file_name[]  = $save_file_name;
				$this->upload_file_name[]  = $filepath.'/'.$save_file_name;
				$this->upload_file_small[] = $filepath.'/'.$small_img;
				$this->upload_file_size[]  = filesize($save_full_name);				
			}
		}else{
			$ext = $this->_get_file_extension($file_url);
			if (!($file_content = @file_get_contents($file_url))){
				return false;
			}
			$save_file_name = $this->_set_filename($ext);
			$save_full_name = $this->upload_save_path.'/'.$save_file_name;
			$fp = @fopen($save_full_name,'w');
			@fwrite($fp,$file_content);
			@fclose($fp);
			
			if($this->create_small){
				$small_img = $this->ImageResize($save_file_name,$this->small_width,$this->small_height);
				$this->upload_file_small = $filepath.'/'.$small_img;
			}else {
				$this->upload_file_small = $filepath.'/'.$save_file_name;
			}
			if($this->water_mark) $this->ImageWaterMark($save_full_name);
			$this->upload_file_name = $filepath.'/'.$save_file_name;
			$this->upload_file_size = filesize($save_full_name);
			$this->upload_file_type = $ext;
		}
	}
	
	function _set_filename($ext){
	    return date('Ymdhis').rand(100,1000).'.'.$ext;
	}
	
    /**����ļ���չ��**/
	function _get_file_extension($file){
		return strtolower( str_replace( ".", "", substr( $file, strrpos( $file, '.' ) ) ) );
	}
	
	function _clean_paths(){
		$this->upload_save_path = preg_replace( "#/$#", "", $this->upload_save_path);
	}
	
	function _mk_dir($path){
		$dirs = array();
		$dirlist = '';
		$rootpath = $this->upload_save_path;
		$path = str_replace('\\','/',$path);
		$dirs = explode('/',$path);
		foreach ($dirs as $val){
			if (!empty($val)){
				$dirlist.= '/'.$val;
				$dirpath = $rootpath.$dirlist;
				if (!file_exists($dirpath)){
					@makedir($dirpath);
					@chmod($dirpath,0777);
				}
			}
		}
	}
	
	function ImageResize($filename,$sm_width,$sm_height){
		//��������ͼ����
		$source_Bigimg = $this->upload_save_path ."/".$filename;
		$imageInfo = getimagesize($source_Bigimg);
		$width  = $imageInfo[0];
		$height = $imageInfo[1];
		$type   = $imageInfo[2];
		if($width >= $height){
			//�����ͼ�Ŀ�ȸߴ��򽫴�ͼ����ȱ���С
			if ($width<$sm_width){
				return $filename;
			}
			$des_width = $sm_width;
			$des_height = ($sm_width / $width) * $height;
		}elseif($height > $width){
			//�����ͼ�ĸ߱ȿ���򽫴�ͼ���ߵȱ���С
			if ($height<$sm_height){
				return $filename;
			}
			$des_height = $sm_height;
			$des_width = ($sm_height / $height) * $width;
		}
		switch($type){
			//�����ϴ��õ�ͼ���ļ������½�һ��������������ͼ��Դ�ļ���
			case 1:
				$srcf = imagecreatefromgif($source_Bigimg);
				break;
			case 2:
				$srcf = imagecreatefromjpeg($source_Bigimg);
				break;
			case 3:
				$srcf = imagecreatefrompng($source_Bigimg);
				break;
			default:
				break;
		}

		//��������ͼ�ļ�
		if(function_exists("imagecreatetruecolor")){
			$desf = imagecreatetruecolor($des_width,$des_height);
			imagecopyresampled($desf,$srcf,0,0,0,0,$des_width,$des_height,$width,$height);
		}else{
			$desf = imagecreate($des_width,$des_height);
			imagecopyresized($desf,$srcf,0,0,0,0,$des_width,$des_height,$width,$height);
		}
		
		$thumb = 'thumb_' .$filename;
		$sm_name = $this->upload_save_path.'/'.$thumb;
		switch($type){
			case 1:
				imagegif($desf,$sm_name);
				break;
			case 2:
				imagejpeg($desf,$sm_name);
				break;
			case 3:
				imagepng($desf,$sm_name);
				break;
			default:
				//echo('�޷�����' . $source_FileType . '������ͼ��');
				//die();
				break;
		}
		imagedestroy($desf);
		imagedestroy($srcf);
		return $thumb;
	}

	//ͼƬˮӡ
	function imageWaterMark($groundImage){
	    $waterPos   = $this->water_pos;
	    $waterImage = $this->water_image;
	    $waterText  = iconv("gb2312","UTF-8",$this->water_text);
	    $fontSize   = $this->water_fontsize;
	    $textColor  = $this->water_fontcolor;
	    $fontfile   = $this->water_fontfile; 
	    $xOffset    = $this->water_xoffset;
	    $yOffset    = $this->water_yoffset;
	    $waterpct   = $this->water_alpha;
		$isWaterImage = $this->water_type == 0 ? TRUE : FALSE;
	     //��ȡˮӡ�ļ�
	     if(!empty($waterImage) && file_exists($waterImage)) {
	         //$isWaterImage = TRUE;
	         $water_info = getimagesize($waterImage);
	         $water_w = $water_info[0];//ȡ��ˮӡͼƬ�Ŀ�
	         $water_h = $water_info[1];//ȡ��ˮӡͼƬ�ĸ�
	
	         switch($water_info[2])   {    //ȡ��ˮӡͼƬ�ĸ�ʽ  
	             case 1:$water_im = imagecreatefromgif($waterImage);break;
	             case 2:$water_im = imagecreatefromjpeg($waterImage);break;
	             case 3:$water_im = imagecreatefrompng($waterImage);break;
	             default:return 1;
	         }
	     }else {
	     	$isWaterImage = FALSE;
	     }
	
	     //��ȡ����ͼƬ
	     if(!empty($groundImage) && file_exists($groundImage)) {
	         $ground_info = getimagesize($groundImage);
	         $ground_w = $ground_info[0];//ȡ�ñ���ͼƬ�Ŀ�
	         $ground_h = $ground_info[1];//ȡ�ñ���ͼƬ�ĸ�
	
	         switch($ground_info[2]) {    //ȡ�ñ���ͼƬ�ĸ�ʽ  
	             case 1:$ground_im = imagecreatefromgif($groundImage);break;
	             case 2:$ground_im = imagecreatefromjpeg($groundImage);break;
	             case 3:$ground_im = imagecreatefrompng($groundImage);break;
	             default:return 1;
	         }
	     } else {
	         return 2;
	     }
	
	     //ˮӡλ��
	     if($isWaterImage) { //ͼƬˮӡ  
	         $w = $water_w;
	         $h = $water_h;
	         $label = "ͼƬ��";
	     } else {  
	         //����ˮӡ
	         if(!file_exists($fontfile))return 4;
	         $temp = imagettfbbox($fontSize,0,$fontfile,$waterText);//ȡ��ʹ�� TrueType ������ı��ķ�Χ
	         $w = $temp[2] - $temp[6];
	         $h = $temp[3] - $temp[7];
	         unset($temp);
	     }
	     if( ($ground_w < $w) || ($ground_h < $h) ) {
	         return 3;
	     }
	     switch($waterPos) {
	         case 0://���
	             $posX = rand(0,($ground_w - $w));
	             $posY = rand(0,($ground_h - $h));
	             break;
	         case 1://1Ϊ���˾���
	             $posX = 0;
	             $posY = 0;
	             break;
	         case 2://2Ϊ���˾���
	             $posX = ($ground_w - $w) / 2;
	             $posY = 0;
	             break;
	         case 3://3Ϊ���˾���
	             $posX = $ground_w - $w;
	             $posY = 0;
	             break;
	         case 4://4Ϊ�в�����
	             $posX = 0;
	             $posY = ($ground_h - $h) / 2;
	             break;
	         case 5://5Ϊ�в�����
	             $posX = ($ground_w - $w) / 2;
	             $posY = ($ground_h - $h) / 2;
	             break;
	         case 6://6Ϊ�в�����
	             $posX = $ground_w - $w;
	             $posY = ($ground_h - $h) / 2;
	             break;
	         case 7://7Ϊ�׶˾���
	             $posX = 0;
	             $posY = $ground_h - $h;
	             break;
	         case 8://8Ϊ�׶˾���
	             $posX = ($ground_w - $w) / 2;
	             $posY = $ground_h - $h;
	             break;
	         case 9://9Ϊ�׶˾���
	             $posX = $ground_w - $w;
	             $posY = $ground_h - $h;
	             break;
	         default://���
	             $posX = rand(0,($ground_w - $w));
	             $posY = rand(0,($ground_h - $h));
	             break;     
	     }
	
	     //�趨ͼ��Ļ�ɫģʽ
	     imagealphablending($ground_im, true);
	
	     if($isWaterImage) { //ͼƬˮӡ
	         //imagecopy($ground_im, $water_im, $posX + $xOffset, $posY + $yOffset, 0, 0, $water_w,$water_h);//����ˮӡ��Ŀ���ļ�    
	         imagecopymerge($ground_im, $water_im, $posX + $xOffset, $posY + $yOffset, 0, 0, $water_w,$water_h,$waterpct);     
	     } else {//����ˮӡ
	         if( !empty($textColor) && (strlen($textColor)==7) ) {
	             $R = hexdec(substr($textColor,1,2));
	             $G = hexdec(substr($textColor,3,2));
	             $B = hexdec(substr($textColor,5));
	         } else {
	             return 5;
	         }
	         //imagettftext ( $ground_im, $fontSize, 0, ($posX + $xOffset)+1, ($posY + $h + $yOffset)+1, imagecolorallocate($ground_im, 0, 0, 0), $fontfile, $waterText);
			 imagettftext ( $ground_im, $fontSize, 0, $posX + $xOffset, $posY + $h + $yOffset, imagecolorallocate($ground_im, $R, $G, $B), $fontfile, $waterText);
	     }
	
	     //����ˮӡ���ͼƬ
	     @unlink($groundImage);
	     switch($ground_info[2]) {//ȡ�ñ���ͼƬ�ĸ�ʽ
	         case 1:imagegif($ground_im,$groundImage);break;
	         case 2:imagejpeg($ground_im,$groundImage);break;
	         case 3:imagepng($ground_im,$groundImage);break;
	         default: return 6;
	     }
	
	     //�ͷ��ڴ�
	     if(isset($water_info)) unset($water_info);
	     if(isset($water_im)) imagedestroy($water_im);
	     unset($ground_info);
	     imagedestroy($ground_im);
	     //
	     return 0;
	}
	
	function shoError(){
		$errorstr = $key = $value = '';
		if ($this->errornum>0){
			foreach ($this->error as $key=>$value){
				$errorstr.= '<li>'.$value.'</li>\n';
			}
			echo '<ol>'.$errorstr.'</ol>';
			exit();
		}else {
			return ;
		}
	}
}
?>