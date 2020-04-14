<?php require_once('users.php');?>
<?php 
	$data=array(
		'id' => $_POST['id'],
		'pwd' => $_POST['password']	
		);
	$user=new users();
	$user->login($data);
 ?>