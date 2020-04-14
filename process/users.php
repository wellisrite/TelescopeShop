<?php require_once('connection.php');?>
<?php 
class users{
	private $conn;
	private $well;
	function __construct(){
		$this->well=new connection();
		$this->conn=$this->well->getConnect();
	}
	function getUsers(){
		$sql=$this->conn->prepare("select * from users where type<>'admin'");
		$sql->execute();
		$result=$sql->fetchAll();
		return $result;
	}
	function banUser($id){
		$sql=$this->conn->prepare("update users set type='banned' where id=:id");
		$sql->bindParam(":id",$id);
		$sql->execute();
	}
	function unbanUser($id){
		$sql=$this->conn->prepare("update users set type='normal' where id=:id");
		$sql->bindParam(":id",$id);
		$sql->execute();
	}
	function login($data){
		$sql=$this->conn->prepare("select * from users where id = :id ");
		$sql->bindParam(':id',$data['id']);
		$sql->execute();
		$result=$sql->fetchAll();
		session_start();
		//print_r($result);
		if(count($result)==0){
			$_SESSION['notice']="The ID that you input can't be found please insert a valid ID";
			header('location: http://localhost/uas/login.php');
		}
		else if($result[0]['type']=="banned"){
			$_SESSION['notice']="Your account has been banned because you are violating our policy";
			header('location: http://localhost/uas/login.php');
		}
		else if (password_verify($_POST['password'],$result[0]['pwd'])){
			echo "login success";
			$_SESSION['login']=$result[0]['id'];
			$_SESSION['name']=$result[0]['name'];
			if($result[0]['type']=="admin"){
				$_SESSION['admin']="admin";
			}
			header('location: http://localhost/uas');
		}
		else{
			echo "wrong password";
			$_SESSION['notice']="Wrong password!,the password didn't match";
			header('location: http://localhost/uas/login.php');
		}
	}
	function logout(){
		session_start();
		unset($_SESSION['login']);
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		header('location: http://localhost/uas');
	}
	function input_user($data){
		session_start();
		$check=$this->conn->prepare("select * from users where id = :id");
		$check->bindParam(':id',$data['id']);
		$check->execute();
		$result=$check->fetchAll();
		print_r($result);
		if(count($result)!=0){
			$_SESSION['notice']="The Id has been taken please choose another id!";
			echo $_SESSION['notice'];
			header('location: http://localhost/uas/login.php');
		}
		$sql=$this->conn->prepare("insert into users(id,pwd,name,gender,address,email) values(:id,:pwd,:name,:gender,:address,:email)");
		$sql->execute($data);
		header('location: http://localhost/uas');
	}
 }
 ?>
