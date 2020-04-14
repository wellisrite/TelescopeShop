<?php include_once('transactions.php');?>
<?php include_once('checkout.php');?>
<?php 
	session_start();
	$bought="";
	//print_r($_POST['bought']);
	for($i=0;$i<count($_POST['bought']);$i++){
		$bought=$bought.$_POST['quantity'][$i]." ".$_POST['bought'][$i]."<br>";
	}
	$data=array(
		'id' => null,
		'kodeT' => $_POST['kodeT'],
		'idU' => $_SESSION['login'],
		'bought' => $bought,
		'date' => date('Y-m-d H:i:s'),
		'status' => 'About to be sent',
		'total' => $_POST['total']
		);
	$t=new transactions();
	$c=new checkout();
	$c->insertCheck($data);
	$t->deleteTdetails($_POST['kodeT']);
	$t->deleteTrans($_POST['kodeT']);
	header("location: ../checkout.php");
 ?>