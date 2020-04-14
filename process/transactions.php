<?php require_once('connection.php');?>
<?php 
class Transactions{
	private $pdo;
	private $conn;
	public function __construct(){
		$this->pdo=new connection();
		$this->conn=$this->pdo->getConnect();
	}
	public function getTransaction($id){
		$sql=$this->conn->prepare("select * from transaction where id = :id");
		$sql->bindParam(':id',$id);
		$sql->execute();
		$result=$sql->fetch();
		return $result;
	}
	public function getCart($kode){
		$sql=$this->conn->prepare("select * from Tdetail where kodeT = :kode");
		$sql->bindParam(':kode',$kode);
		$sql->execute();
		$result=$sql->fetchAll();
		return $result;
	}
	public function insertT($data){
		$sql=$this->conn->prepare('insert into transaction values(:kodeT,:id,:tanggal)');
		$sql->execute($data);
	}
	public function checkDate($id){
		$sql=$this->conn->prepare("select * from transaction where id = :id");
		$sql->bindParam(':id',$id);
		$sql->execute();
		$result=$sql->fetch();
		return $result;
	}
	public function checkT($kode){
		$sql=$this->conn->prepare("select * from transaction where kodeT = :kode");
		$sql->bindParam(':kode',$kode);
		$sql->execute();
		$result=$sql->fetchAll();
		return $result;
	}
	public function checkD($pId,$kode){
		$sql=$this->conn->prepare("select * from Tdetail where pId = :id and kodeT = :kode");
		$sql->bindParam(':id',$pId);
		$sql->bindParam(':kode',$kode);
		$sql->execute();
		$result=$sql->fetchAll();
		return $result;
	}
	public function insertD($data){
		$sql=$this->conn->prepare("insert into Tdetail values(:idD,:kodeT,:quantity,:pId,:date)");
		$sql->execute($data);
	}
	public function deleteTdetail($kode){
		$sql=$this->conn->prepare("delete from Tdetail where pId = :id");
		$sql->bindParam(":id",$kode);
		$sql->execute();
	}
	public function deleteTdetails($kodeT){
		$sql=$this->conn->prepare("delete from Tdetail where kodeT=:kode");
		$sql->bindParam(":kode",$kodeT);
		$sql->execute();
	}
	public function deleteTrans($kode){
		$sql=$this->conn->prepare("delete from transaction where kodeT = :kode");
		$sql->bindParam(":kode",$kode);
		$sql->execute();	
	}
}
 ?>
