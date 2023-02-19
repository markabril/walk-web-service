<?php
Class sdm_query{
	public function __construct($db){
		$this->c=$db;
	}
	public function look_hackwinnersofalltime(){
		return $this->QuickLook("SELECT MIN(t.hackdate) AS hackdate,
		MIN(t.hackmsg) AS hackmsg,
		t.ph_ne,
		t.ph_fe,
		t.ph_peli,
		t.int_ne,
		t.int_fe,
		t.int_peli
 FROM tbl_hackathonwins AS t
 JOIN (
   SELECT MAX(ph_ne) AS max_ph_ne,
		  MAX(ph_fe) AS max_ph_fe,
		  MAX(ph_peli) AS max_ph_peli,
		  MAX(int_ne) AS max_int_ne,
		  MAX(int_fe) AS max_int_fe,
		  MAX(int_peli) AS max_int_peli
   FROM tbl_hackathonwins
 ) AS m
 ON t.ph_ne = m.max_ph_ne OR
	t.ph_fe = m.max_ph_fe OR
	t.ph_peli = m.max_ph_peli OR
	t.int_ne = m.max_int_ne OR
	t.int_fe = m.max_int_fe OR
	t.int_peli = m.max_int_peli
 GROUP BY ph_ne, ph_fe, ph_peli, int_ne, int_fe, int_peli;");
	}
	public function look_gethackathonwinshistory(){
		return $this->QuickLook("SELECT hackdate, hackmsg,ph_ne,ph_fe,ph_peli,int_ne,int_fe,int_peli FROM tbl_hackathonwins ORDER BY hackdate DESC");
	}
	public function homecoverphoto(){
		return $this->QuickLook("SELECT img FROM tbl_home WHERE cont_type='cover' ORDER BY id DESC LIMIT 1");
	}
	public function homehackathonwinners(){
		return $this->QuickLook("SELECT * FROM tbl_hackathonwins ORDER BY hackdate DESC LIMIT 1");
	}
	public function homefeatures(){
		return $this->QuickLook("SELECT * FROM tbl_features ORDER BY feattitle ASC");
	}
	public function homebottompanel(){
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type LIKE '%bottom%'");
	}

	public function fire_updatejobstatus($currentid,$status){
		return $this->QuickFire("UPDATE tbl_jobs SET status=? WHERE id=?",[$status,$currentid]); 
	}
	public function fire_deletejob($currentid){
		return $this->QuickFire("DELETE FROM tbl_jobs WHERE id=?",[$currentid]); 
	}
	public function fire_addjob($jobtitle,$shortdesc,$fulldesc){
		return $this->QuickFire("INSERT INTO tbl_jobs (jobtitle, shortdesc, fulldesc, status) VALUES (?, ?, ?, '0')",[$jobtitle,$shortdesc,$fulldesc]); 
	}
	public function look_getjob(){
		return $this->QuickLook("SELECT * FROM tbl_jobs"); 
	}
	public function look_deleteteam($currentid){
		return $this->QuickFire("DELETE FROM tbl_teammember WHERE id=?",[$currentid]);
	}
	public function fire_addteam($facepic,$fullname,$positionname,$ordernumber){
		return $this->QuickFire("INSERT INTO tbl_teammember (imgpath, fullname, position, order_no) VALUES (?, ?, ?, ?)",[$facepic,$fullname,$positionname,$ordernumber]);
	}
	public function look_getteam(){
		return $this->QuickLook("SELECT * FROM tbl_teammember");
	}
	public function fire_deletechapter($currentId){
		return $this->QuickFire("DELETE FROM tbl_lore WHERE id=?",[$currentId]);
	}
	public function look_chapterfull($currentId){
		return $this->QuickLook("SELECT story,coverimg FROM tbl_lore WHERE id=?",[$currentId]);
	}
	public function look_addedstories(){
		return $this->QuickLook("SELECT id,SUBSTRING(story,1,256) as story,chapter,coverimg,title,publishdate  FROM tbl_lore");
	}
	public function fire_newstordata($vl_coverimg,$vl_chapnum,$vl_chaptitle,$vl_chapstory,$vl_publishdt){
		return $this->QuickFire("INSERT INTO tbl_lore (coverimg, chapter, title, story, publishdate) VALUES (?, ?, ?, ?, ?)",[$vl_coverimg,$vl_chapnum,$vl_chaptitle,$vl_chapstory,$vl_publishdt]);
	}
	public function deletehackwin($currentId){
		return $this->QuickFire("DELETE FROM tbl_hackathonwins WHERE id=?",[$currentId]);
	}
	public function gethackwins(){
		return $this->QuickLook("SELECT * FROM tbl_hackathonwins ORDER BY hackdate DESC");
	}
	public function look_addnewhackwin($vl_hackdate,$vl_hackmessage,$vl_ph_ne,$vl_ph_fe,$vl_ph_peli,$vl_int_ne,$vl_int_fe,$vl_int_peli){
		return $this->QuickFire("INSERT INTO tbl_hackathonwins
		(hackdate, hackmsg, ph_ne, ph_fe, ph_peli, int_ne, int_fe, int_peli) VALUES
		(?, ?, ?, ?, ?, ?, ?, ?)
		",[$vl_hackdate,$vl_hackmessage,$vl_ph_ne,$vl_ph_fe,$vl_ph_peli,$vl_int_ne,$vl_int_fe,$vl_int_peli]);
	}

	public function look_singlebottominfo($ctype){
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type=?",[$ctype]);
	}
	public function look_bottompanelinfo(){
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type LIKE '%bottom_%'");
	}
	public function fire_updateabottompnl($title,$desc,$proimg,$btnname,$link,$type){
		$dt = date("Y-m-d H:i:s");
		$out = json_decode($this->QuickLook("SELECT id FROM tbl_home WHERE cont_type=?",[$type]),true);

		if (count($out) == 0){
			return $this->QuickFire("INSERT INTO tbl_home (title, description, img, btn_name, link, cont_type, date_recorded) VALUES (?, ?, ?, ?, ?, ?, ?)
			",[$title,$desc,$proimg,$btnname,$link,$type,	$dt ]);
		}else{

			if($proimg == ""){
				return $this->QuickFire("UPDATE tbl_home SET
				title=?,
				description=?,

				btn_name=?,
				link=?,
				date_recorded=?
		
				WHERE
				cont_type=?
		
				",[$title,$desc,$btnname,$link,	$dt ,$type]);
			}else{
				return $this->QuickFire("UPDATE tbl_home SET
				title=?,
				description=?,
				img=?,
				btn_name=?,
				link=?,
				date_recorded=?
		
				WHERE
				cont_type=?
		
				",[$title,$desc,$proimg,$btnname,$link,	$dt ,$type]);
			}
		
		}
		
	}
	public function fire_deleteFeature($featid){
		return $this->QuickFire("DELETE FROM tbl_features WHERE id=?",[$featid]);
	}
	public function look_addedfeatures(){
		return $this->QuickLook("SELECT * FROM tbl_features ORDER BY id DESC");
	}
	public function fire_addnewfeature($featitle,$featdesc,$featimg){
		return $this->QuickFire("INSERT INTO tbl_features (feattitle, featuredesc, featureimg) VALUES (?, ?, ?)",[$featitle,$featdesc,$featimg]);
	}
	public function look_lasestcover(){
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type='cover' ORDER BY date_recorded DESC");
	}
	public function fire_addnewhomefeat($ctype,$img,$title,$desc,$link,$btnname)
	{
		$dt = date("Y-m-d H:i:s");
		return $this->QuickFire("INSERT INTO tbl_home (cont_type, img, title, description, link, btn_name, date_recorded) VALUES (?, ?, ?, ?, ?, ?, ?)",[$ctype,$img,$title,$desc,$link,$btnname,$dt]);
	}
	public function fire_deletetournament($uname,$pass){

		return $this->QuickLook("SELECT username,feature_set,id FROM tbl_accounts WHERE
		username=? AND
		password=? LIMIT 1",[$uname,$pass]);

	}


	// NEW END TO END ENCRYPTION ENGINE IMPORTED IN PALARO 20 TECH
	function sdmenc($data){
		global $passkey;
		$keycode = openssl_digest(utf8_encode($passkey),"sha512",true);
		$string = substr($keycode, 10,24);
		$utfData = utf8_encode($data);
		$encryptData = openssl_encrypt($utfData, "DES-EDE3", $string, OPENSSL_RAW_DATA,'');
		$base64Data = base64_encode($encryptData);
		return $base64Data;
	}
	function sdmdec($data){
		global $passkey;
		$keycode = openssl_digest(utf8_encode($passkey),"sha512",true);
		$string = substr($keycode, 10,24);
		$utfData = base64_decode($data);
		$decryptData = openssl_decrypt($utfData, "DES-EDE3", $string, OPENSSL_RAW_DATA,'');
		return $decryptData;
	}





// CODE BOOSTERS
	public function SimpleQuickSum($q){
		$q = $this->c->prepare($q);
		$q->execute();
		return $q->rowCount();
	}
	public function QuickSum($q){
		$q = $this->c->prepare($q);
		$q->execute();
		return json_encode(array(number_format($q->rowCount())));
	}

	public function QuickLook($q,$par=array()){
		$q = $this->c->prepare($q);
		if($q->execute($par)){
			return json_encode($q->fetchall(PDO::FETCH_ASSOC));
		} else {
			return $q->errorInfo();
		}
		
	}
	public function QuickFire($q,$par =array()){
		$q = $this->c->prepare($q);
		if($q->execute($par)){
			return json_encode(array("true"));
		}else{
			return json_encode(array("false"));
		}
	}


}
?>