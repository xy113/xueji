<?php
if ($formsubmit == 'yes'){
	showheader();
	if (!$formhash == FORMHASH){
		message('undefined_action','error');
	}
	if ($randcode != $_SESSION['randcode']){
		message('randcode_error','error');
	}
	$data = $db->GetOne("SELECT username FROM sdw_admins WHERE username='$adminnew[username]'");
	if ($data){
		message('username_exists','error');
	}
	if (strlen($adminnew['password'])>=6){
		$adminnew['password'] = password($adminnew['password']);
	}else {
		message('password_error','error');
	}
	$adminnew['status'] = 0;
	$db->insert('sdw_admins',$adminnew);
	message('reg_succeed','',$BASESCRIPT);
}else {
	$towns = listtowns();
	$schools = listschools();
	include template('register');
}
?>