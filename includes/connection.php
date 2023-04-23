<?php
Class connection{
	private $host = "localhost";
	private $db = "womweb";

	private $username = "root";
	private $password = "";

	private $conn;

	public function sdm_connect(){

try{
	$this->conn = new PDO('sqlite:includes/data.sqlite');
	chmod('includes/data.sqlite', 0666);
	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Create table if not exists
	$sql = '
	CREATE TABLE IF NOT EXISTS "tbl_accounts" (
		"id" INTEGER, 
		"username" TEXT, 
		"password" TEXT, 
		"description" TEXT, 
		"profilepic" TEXT,
		"datecreated" TEXT,
		"feature_set" TEXT, 
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_features" (
		"id" INTEGER, 
		"featureimg" TEXT, 
		"featuredesc" TEXT, 
		"feattitle" TEXT, 
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_hackathonwins" (
		"id" INTEGER, 
		"hackdate" TEXT, 
		"hackmsg" TEXT, 
		"ph_ne" TEXT, 
		"ph_fe" TEXT, 
		"ph_peli" TEXT, 
		"int_ne" TEXT, 
		"int_fe" TEXT, 
		"int_peli" TEXT, 
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_home" (
		"id" INTEGER, 
		"cont_type" TEXT, 
		"img" TEXT, 
		"title" TEXT, 
		"description" TEXT, 
		"link" TEXT, 
		"btn_name" TEXT, 
		"date_recorded" TEXT, 
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_jobs" (
		"id" INTEGER, 
		"jobtitle" TEXT, 
		"shortdesc" TEXT, 
		"fulldesc" TEXT, 
		"status" TEXT, 
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_lore" (
		"id" INTEGER, 
		"chapter" TEXT, 
		"story" TEXT, 
		"coverimg" TEXT, 
		"title" TEXT, 
		"publishdate" TEXT, 
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_teammember" (
		"id" INTEGER, 
		"imgpath" TEXT, 
		"fullname" TEXT, 
		"position" TEXT, 
		"order_no" TEXT, 
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_news" (
		"id" INTEGER,
		"dateposted" TEXT,
		"headline" TEXT,
		"coverphoto" TEXT,
		"description" TEXT,
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_updates" (
		"id" INTEGER,
		"dateposted" TEXT,
		"headline" TEXT,
		"coverphoto" TEXT,
		"details" TEXT,
		"version" TEXT,
		"releasedate" TEXT,
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_updateitems" (
		"id" INTEGER,
		"item_parentid" TEXT,
		"item_cover" TEXT,
		"item_title" TEXT,
		"item_desc" TEXT,
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_logs" (
		"id" INTEGER,
		"action_ownerid" TEXT,
		"action_timestamp" TEXT,
		"action_desc" TEXT,
		PRIMARY KEY("id" AUTOINCREMENT)
	  );

	';
	  $this->conn->exec($sql);


}catch(PDOException $e){
	echo "Connection Error: " . $e->getMessage();
}
date_default_timezone_set('Asia/Manila');
return $this->conn;




	}
}
?>