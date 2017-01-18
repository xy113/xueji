<?php
showheader();
if ($formsubmit == 'yes'){
	$ext = end(explode('.',$_FILES['file']['name']));
	if (!(strtolower($ext) == 'zip')){
		message('zip_type_error','error');
	}else {
		$filename = time().'.zip';
		@move_uploaded_file($_FILES['file']['tmp_name'],ROOT_PATH.'/data/avatar/'.$filename);
		$zip = new ZipArchive();
		$zip->open(ROOT_PATH.'/data/avatar/'.$filename);
		$zip->extractTo(ROOT_PATH.'/data/avatar/');
		$zip->close();
		@unlink(ROOT_PATH.'/data/avatar/'.$filename);
		message('avatar_import_succeed');
	}
}else {
	include template('avatar');
}
showfooter();
?>