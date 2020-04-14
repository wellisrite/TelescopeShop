<?php include_once('connection.php');?>
<?php  
class Checkout{
	private $pdo;
	private $conn;
	public function __construct(){
		$this->pdo=new connection();
		$this->conn=$this->pdo->getConnect();
	}
	public function insertCheck($data){
		$sql=$this->conn->prepare("insert into checkout values(:id,:kodeT,:idU,:bought,:date,:status,:total)");
		$sql->execute($data);
	}
	public function getCheck($id){
		$sql=$this->conn->prepare("select * from checkout where idU=:id");
		$sql->bindParam(":id",$id);
		$sql->execute();
		$result=$sql->fetchAll();
		return $result;
	}
	public function getChecks(){
		$sql=$this->conn->prepare("select * from checkout");
		$sql->execute();
		$result=$sql->fetchAll();
		return $result;
	}
	public function cancelCheck($id){
		$sql=$this->conn->prepare("delete from checkout where id=:id");
		$sql->bindParam(":id",$id);
		$sql->execute();
	}
	public function completed($id){
		$sql=$this->conn->prepare("update checkout set status='Sent' where id=:id");
		$sql->bindParam(":id",$id);
		$sql->execute();
	}
	public function confirmCheck($id){
		$sql=$this->conn->prepare("update checkout set status='Sent and confirmed by user' where id=:id");
		$sql->bindParam(":id",$id);
		$sql->execute();
	}
}
 ?>