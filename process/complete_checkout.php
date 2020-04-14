<?php require_once('checkout.php');?>
<?php 
	$c=new checkout();
	$id=$_GET['id'];
	$c->completed($id);
	header("location: http://localhost/uas/orders.php");
 ?>