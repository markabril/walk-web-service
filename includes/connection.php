<?php
Class connection{
	private $host = "localhost";
	private $db = "womweb";

	private $username = "root";
	private $password = "";

	private $conn;

	public function sdm_connect(){
		// $this->conn=null;
		// try{
		// 	$this->conn = new PDO('mysql:host=' . $this->host. "; dbname=" . $this->db,  $this->username, $this->password);
		// 	$this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8mb4");
		// 	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// }catch(PDOException $e){
		// 	echo "Connection Error: " . $e->getMessage();
		// }
		// date_default_timezone_set('Asia/Manila');
		// return $this->conn;


		// msqlite - 	$this->conn=null;
try{
	$this->conn = new PDO('sqlite:includes/data.sqlite');
	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Connection Error: " . $e->getMessage();
}
date_default_timezone_set('Asia/Manila');
return $this->conn;




	}
}
?>