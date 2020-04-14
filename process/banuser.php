<?php require_once('users.php');?>
<?php 
	$u=new users();
	$id=$_GET['id'];
	$u->banUser($id);
	header("location: http://localhost/uas/users.php");
 ?>