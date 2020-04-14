<?php require_once('products.php');?>
<?php 
	$kode=$_GET['pId'];
	$p=new products();
	$p->deleteProduct($kode);
 ?>