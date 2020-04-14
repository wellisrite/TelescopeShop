<?php require_once('checkout.php');?>
<?php 
	$c=new checkout();
	$id=$_GET['id'];
	$c->confirmCheck($id);
 ?>