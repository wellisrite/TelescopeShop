<?php require_once('transactions.php'); ?>
<?php 
	$t=new transactions();
	$t->deleteTdetail($_GET['pId']);
	$check=$t->getCart($_GET['kodeT']);
	if(count($check)==0){
		$t->deleteTrans($_GET['kodeT']);
	}
	header('location: http://localhost/uas/cart.php');
 ?>