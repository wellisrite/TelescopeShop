<?php require_once('connection.php');?>
<?php 
class products{
	private $pdo;
	private $conn;
	public function __construct() {
		$this->pdo=new connection();
		$this->conn=$this->pdo->getConnect();
	}
	public function input_product($data){
		$id=$data['pId'];
		$test=$this->conn->prepare("select * from products where pId= :id");
		$test->bindParam(':id',$id);
		$test->execute();
		$check=$test->fetchAll();
		if(count($check)!=0){
			echo "Product already exists!";
		}
		else{
			$sql=$this->conn->prepare("insert into products(pId,pname,stock,price,description,image,category) values(:pId,:pname,:stock,:price,:description,:image,:category)");
			$sql->execute($data);
			header('location: http://localhost/uas');
		}
	}
	public function getProduct($kode){
		$sql=$this->conn->prepare("select * from products where pId = :id");
		$sql->bindParam(':id',$kode);
		$sql->execute();
		$result=$sql->fetch();
		return $result;
	}
	public function getProducts(){
		$sql=$this->conn->prepare("select * from products");
		$sql->execute();
		$result=$sql->fetchAll();
		return $result;
	}
	public function getCategories(){
		$sql=$this->conn->prepare("select distinct category from products");
		$sql->execute();
		$result=$sql->fetchAll();
		return $result;
	}
	public function editProduct($data){
		$sql=$this->conn->prepare("update products set pId=:pId,pname=:pname,stock=:stock,price=:price,description=:description,image=:image,category=:category where pId = '".$data['pId']."'");
		//$sql->bindParam(':id',$data['pId']);
		$sql->execute($data);
		//var_dump($sql);
		header('location: http://localhost/uas/shop.php');
	}
	public function deleteProduct($kode){
		$sql=$this->conn->prepare("delete from products where pId = :id");
		$sql->bindParam(':id',$kode);
		$sql->execute();
		header('location: http://localhost/uas/shop.php');
	}
 }?>
