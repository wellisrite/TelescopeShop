<?php require_once('checkout.php');?>
<?php 
$id=$_GET['id'];
$c=new checkout();
$c->cancelCheck($id);
header('location: http://localhost/uas/checkout.php');
 ?>}
