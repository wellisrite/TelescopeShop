<?php require_once('users.php') ?>
<?php 
	$user=new users();
	$data=array(
		'id' => $_POST['id'],
		'pwd' => password_hash($_POST['pwd'],PASSWORD_BCRYPT),
		'name'=> $_POST['name'],
		'gender' => $_POST['gender'],
		'address' => $_POST['address'],
		'email' => $_POST['email']
	);
	$user->input_user($data);
 ?>