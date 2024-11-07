<?php
class connection
{
	private $host = "localhost";
	private $db = "womweb";

	private $username = "root";
	private $password = "";

	private $conn;

	public function sdm_connect()
	{

		try {
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
	  CREATE TABLE IF NOT EXISTS "tbl_ucwins" (
		"id" INTEGER, 
		"ucdate" TEXT, 
		"ucmsg" TEXT, 
		"ph_ucwin" TEXT, 
		"int_ucwin" TEXT, 
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_tagiswins" (
		"id" INTEGER, 
		"tagisseason" TEXT, 
		"tagisdate" TEXT, 
		"tagismsg" TEXT, 
		"ph_overall" TEXT, 
		"ph_archer" TEXT, 
		"ph_brawler" TEXT, 
		"ph_shaman" TEXT, 
		"ph_swordsman" TEXT, 
		"int_overall" TEXT, 
		"int_archer" TEXT, 
		"int_brawler" TEXT, 
		"int_shaman" TEXT, 
		"int_swordsman" TEXT, 
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
		"tba" INTEGER DEFAULT 0,
		PRIMARY KEY("id" AUTOINCREMENT)
	  );
	  CREATE TABLE IF NOT EXISTS "tbl_updateitems" (
		"id" INTEGER,
		"item_parentid" TEXT,
		"item_cover" TEXT,
		"item_title" TEXT,
		"item_desc" TEXT,
		"order_num" TEXT,
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





		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}


		try {
			// Create table if not exists
			$sql = '
	ALTER TABLE "tbl_updateitems" ADD COLUMN "order_num" TEXT AFTER "item_desc";
	

	';
			$this->conn->exec($sql);
		} catch (PDOException $e) {

		}

		try {
			// Create table if not exists
			$sql = '
	ALTER TABLE "tbl_features" ADD COLUMN "order_no" TEXT AFTER "feattitle";
	

	';
			$this->conn->exec($sql);
		} catch (PDOException $e) {


			try {
				// Create table if not exists
				$sql = '
	ALTER TABLE "tbl_updates" ADD COLUMN "tba" INTEGER DEFAULT 0;
	

	';
				$this->conn->exec($sql);
			} catch (PDOException $e) {

			}
		}






		date_default_timezone_set('Asia/Manila');
		return $this->conn;




	}
}
?>