<?php require_once('products.php') ?>
<?php 
	$data=array(
	'pId' => $_POST['pid'],
	'pname' => $_POST['pname'],
	'stock' => $_POST['stock'],
	'price' => $_POST['price'],
	'description' => $_POST['description'],
	'image' => $_POST['image'],
	'category' => $_POST['category']
	);
	$p=new products();
	$p->editProduct($data);
 ?>