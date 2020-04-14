<?php require_once('transactions.php');?>
<?php 
	session_start();
	if(!isset($_SESSION['login'])){
		$_SESSION['notice']="You must login to buy product!";
		header('location: http://localhost/uas/shop.php');
	}
	else{
	$t=new transactions();
	$date=date("Y:m:d H:i:s");
	$kode=$_SESSION['login'].date("Ymd");
	$data=array(
		'kodeT' => $kode,
		'id' => $_SESSION['login'],
		'tanggal' => $date
		);
	$data1=array(
		'idD' => null,
		'kodeT' => $kode,
		'quantity' => 1,
		'pId' => $_GET['pId'],
		'date' => $date
		);
	$check=$t->checkT($kode);
	$checkd=$t->checkD($_GET['pId'],$kode);
	$checkdate=$t->checkDate($_SESSION['login']);
	/*echo count($check);
	echo count($checkd);
	print_r($data);*/
	//ngecheck tanggal transaksi
	if(isset($checkdate['kodeT'])){
		if($checkdate['kodeT']!=$kode){
			$data['kodeT']=$checkdate['kodeT'];
			$data1['kodeT']=$checkdate['kodeT'];
		}
	}
	/*print_r($data);*/
	//anti duplicate product
	if(count($checkd)!=0){
		print_r($checkd);
	}
	//if transaction already exists
	else if(count($check)!=0){
		$t->insertD($data1);
	}
	else {
		//jika tanggal transaksi sewaktu ngeadd product lebih baru namun masih tersisa data di table transaksi lama maka data1 akan tetap masuk ke table kodeT yang lama
		if(isset($checkdate['kodeT'])){
			if($checkdate['kodeT']!=$kode){
			}
			else{
				$t->insertT($data);
			}
		}
		else{
			$t->insertT($data);
		}
		$t->insertD($data1);
	}
	header('location: http://localhost/uas/cart.php');
}
 ?>
