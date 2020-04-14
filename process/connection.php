<?php 
class Connection{
	private $servername="localhost";
	private $database="uas";
	private $username="root";
	private $password="";
	private $conn;
	function __construct(){
		$this->conn=null;
	}
	public function getConnect()
	  {
	    if ($this->conn == null) {
	      try {
	        $this->conn = new PDO('mysql:host='.$this->servername.';dbname='.$this->database.';', $this->username, $this->password);
	        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	      } catch (PDOException $e) {
	        die($e->getMessage());
	      }
	    }

   		 return $this->conn;
  }

	function disconnect(){
			$this->conn=null;
	}
}
 ?>
