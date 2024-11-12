<?php
class sdm_query
{
	public function __construct($db)
	{
		$this->c = $db;
	}
	public function fire_applyfeaturereorder($ordernumber, $itemid)
	{
		return $this->QuickFire("UPDATE tbl_features SET order_no=? WHERE id=?", [$ordernumber, $itemid]);
	}
	public function fire_removecontriacc($itemid)
	{
		return $this->QuickFire("DELETE FROM tbl_accounts WHERE id=?", [$itemid]);
	}
	public function fire_saveteamchanges($valfullname, $valpostionname, $valordernumber, $itemid)
	{
		return $this->QuickFire("UPDATE tbl_teammember SET
		fullname=?,
		position=?,
		order_no=?
		WHERE id=?", [$valfullname, $valpostionname, $valordernumber, $itemid]);
	}
	public function look_singleteaminfo($itemid)
	{
		return $this->QuickLook("SELECT * FROM tbl_teammember WHERE id=?", [$itemid]);
	}
	public function look_singlestorychap($itemid)
	{
		return $this->QuickLook("SELECT * FROM tbl_lore WHERE id=?", [$itemid]);
	}
	public function fire_savestorymodif($val_chapno, $val_title, $val_description, $val_publishdate, $coverimg, $itemid)
	{
		return $this->QuickFire("UPDATE tbl_lore SET chapter=?, title=?, story=?, publishdate=?, coverimg=? WHERE id=?", [
			$val_chapno,
			$val_title,
			$val_description,
			$val_publishdate,
			$coverimg,
			$itemid
		]);
	}
	public function fire_saveitemchanges($val_title, $val_description, $val_type, $currfeatitemid)
	{
		return $this->QuickFire("UPDATE tbl_updateitems SET item_title=?, item_desc=?, type=? WHERE id=?", [$val_title, $val_description, $val_type, $currfeatitemid]);
	}
	public function look_singlefeatitem($itemid)
	{
		return $this->QuickLook("SELECT id, item_title, item_desc, type FROM tbl_updateitems WHERE id=?", [$itemid]);
	}
	public function fire_updateorderposfi($itemid, $ordernumber)
	{
		return $this->QuickFire("UPDATE tbl_updateitems SET order_num=? WHERE id=?", [$ordernumber, $itemid]);
	}
	public function fire_savehackchanges($val_hackdate, $val_hackmessage, $val_ph_ne, $val_ph_fe, $val_ph_peli, $val_int_ne, $val_int_fe, $val_int_peli, $itemid)
	{
		return $this->QuickFire("UPDATE tbl_hackathonwins SET
		hackdate=?,
		hackmsg=?,
		ph_ne=?,
		ph_fe=?,
		ph_peli=?,
		int_ne=?,
		int_fe=?,
		int_peli=?
		WHERE
		id=?
		", [$val_hackdate, $val_hackmessage, $val_ph_ne, $val_ph_fe, $val_ph_peli, $val_int_ne, $val_int_fe, $val_int_peli, $itemid]);
	}
	public function fire_savetagischanges(
		$val_tagisseason,
		$val_tagisdate,
		$val_tagismessage,
		$val_ph_overall,
		$val_ph_archer,
		$val_ph_brawler,
		$val_ph_shaman,
		$val_ph_swordsman,
		$val_int_overall,
		$val_int_archer,
		$val_int_brawler,
		$val_int_shaman,
		$val_int_swordsman,
		$itemid
	) {
		return $this->QuickFire("UPDATE tbl_tagiswins SET
		tagisseason=?,
		tagisdate=?,
		tagismsg=?,
		ph_overall=?,
		ph_archer=?,
		ph_brawler=?,
		ph_shaman=?,
		ph_swordsman=?,
		int_overall=?,
		int_archer=?,
		int_brawler=?,
		int_shaman=?,
		int_swordsman=?
		WHERE
		id=?
		", [
			$val_tagisseason,
			$val_tagisdate,
			$val_tagismessage,
			$val_ph_overall,
			$val_ph_archer,
			$val_ph_brawler,
			$val_ph_shaman,
			$val_ph_swordsman,
			$val_int_overall,
			$val_int_archer,
			$val_int_brawler,
			$val_int_shaman,
			$val_int_swordsman,
			$itemid
		]);
	}

	public function fire_saveucchanges($val_ucdate, $val_ucmessage, $val_ph_ucwin, $val_int_ucwin, $itemid)
	{
		return $this->QuickFire("UPDATE tbl_ucwins SET
		ucdate=?,
		ucmsg=?,
		ph_ucwin=?,
		int_ucwin=?
		WHERE
		id=?
		", [$val_ucdate, $val_ucmessage, $val_ph_ucwin, $val_int_ucwin, $itemid]);
	}
	public function look_gethackathonsingle($itemid)
	{
		return $this->QuickLook("SELECT * FROM tbl_hackathonwins WHERE id=?", [$itemid]);
	}
	public function look_getucsingle($itemid)
	{
		return $this->QuickLook("SELECT * FROM tbl_ucwins WHERE id=?", [$itemid]);
	}
	public function look_gettagissingle($itemid)
	{
		return $this->QuickLook("SELECT * FROM tbl_tagiswins WHERE id=?", [$itemid]);
	}
	public function fire_savefeachanges($val_title, $val_desc, $itemid, $featureimg)
	{
		return $this->QuickFire("UPDATE tbl_features SET feattitle=?, featuredesc=?, featureimg=? WHERE id=?", [$val_title, $val_desc, $featureimg, $itemid]);
	}
	public function look_featuresingleinfo($itemid)
	{
		return $this->QuickLook("SELECT * FROM tbl_features WHERE id=?", [$itemid]);
	}
	public function fire_savenewschanges($txt_headline, $txt_description, $itemid, $coverphoto)
	{
		return $this->QuickFire("UPDATE tbl_news SET headline=? , description=? , coverphoto=? WHERE id=?", [$txt_headline, $txt_description, $coverphoto, $itemid]);
	}
	public function look_newinfosingle($newsid)
	{
		return $this->QuickLook("SELECT * FROM tbl_news WHERE id=?", [$newsid]);
	}
	public function fire_saveupdatechanges($val_version, $val_tba, $val_title, $val_description, $val_releaseDate, $currentupdateid)
	{
		return $this->QuickFire("UPDATE tbl_updates SET version=?, headline=?, details=?, releasedate=?, tba=? WHERE id=?", [$val_version, $val_title, $val_description, $val_releaseDate, $val_tba, $currentupdateid]);
	}
	public function look_getmyinfobasic($accid)
	{
		return $this->QuickLook("SELECT description,datecreated, feature_set  FROM tbl_accounts WHERE id =?", [$accid]);
	}
	public function fire_changepassword($itemid, $oldpass, $newpass)
	{
		$out = json_decode($this->QuickLook("SELECT * FROM tbl_accounts WHERE  id=? AND password=? ", [$itemid, $oldpass]), true);


		if (count($out) != 0) {
			$this->QuickFire("UPDATE tbl_accounts SET password=? WHERE id=? AND password=? ", [$newpass, $itemid, $oldpass]);
			return "true";
		} else {
			return "false";
		}


	}
	public function fire_changerole($itemid, $newrole)
	{
		return $this->QuickFire("UPDATE tbl_accounts SET description=? WHERE id=?", [$newrole, $itemid]);
	}
	public function fire_changeusername($itemid, $newusername)
	{
		return $this->QuickFire("UPDATE tbl_accounts SET username=? WHERE id=?");
	}
	public function fire_changeprofilepic($itemid, $newprofilepic)
	{
		return $this->QuickFire("UPDATE tbl_accounts SET profilepic=? WHERE id=?", [$newprofilepic, $itemid]);
	}



	public function look_fulljobinfo($itemid)
	{
		return $this->QuickLook("SELECT * FROM tbl_jobs WHERE id=?", [$itemid]);
	}
	public function look_getpublicmembers()
	{
		return $this->QuickLook("SELECT * FROM tbl_teammember ORDER BY  CAST(order_no AS INT)  ASC");
	}
	public function look_publishedjobposting()
	{
		return $this->QuickLook("SELECT id, jobtitle, shortdesc FROM tbl_jobs WHERE status='1'");
	}
	public function fire_addcontributor($inp_profilepic, $inp_name, $inp_description, $inp_featureset, $inp_password)
	{
		$datecreated = date("Y-m-d");
		$out = json_decode($this->QuickLook("SELECT * FROM tbl_accounts WHERE username=?", [$inp_name]), true);
		if (count($out) == 0) {
			return $this->QuickFire("INSERT INTO tbl_accounts
			(username,password,description,feature_set,profilepic,datecreated)
			VALUES(?,?,?,?,?,?)", [$inp_name, $inp_password, $inp_description, $inp_featureset, $inp_profilepic, $datecreated]);
		} else {
			return json_encode(array("status" => "already existing"));
		}
	}
	public function look_allcontributors($managerid)
	{
		return $this->QuickLook("SELECT * FROM tbl_accounts WHERE id != ?", [$managerid]);
	}
	public function look_publicupdatedetailsful($featureid)
	{

		$out = $this->QuickLook("SELECT * FROM  tbl_updateitems LEFT JOIN tbl_updates ON tbl_updates.id = tbl_updateitems.item_parentid 
		WHERE 
		tbl_updates.id=? ORDER BY tbl_updateitems.type ASC, CAST (tbl_updateitems.order_num AS INT) DESC ", [$featureid]);

		if (json_decode($out, true) === []) {

			$out = $this->QuickLook("SELECT *,'' as item_title FROM tbl_updates WHERE tbl_updates.id=?", [$featureid]);
		}

		return $out;
	}
	public function fire_deleteupdaterec($recid)
	{
		$this->QuickFire("DELETE FROM tbl_updates WHERE id=?", [$recid]);
		return $this->QuickFire("DELETE FROM tbl_updateitems WHERE item_parentid=?", [$recid]);
	}
	public function fire_deletefeatureitem($itemid)
	{
		return $this->QuickFire("DELETE FROM tbl_updateitems WHERE id=?", [$itemid]);
	}
	public function look_updatebasicinfo($itemId)
	{
		return $this->QuickLook("SELECT * FROM tbl_updates WHERE id=?", [$itemId]);
	}
	public function look_publicupdates()
	{
		return $this->QuickLook("SELECT * FROM tbl_updates ORDER BY dateposted DESC");
	}
	public function look_updateitems($id)
	{
		return $this->QuickLook("SELECT id,item_cover,item_title, order_num FROM tbl_updateitems WHERE item_parentid=? ORDER BY CAST(order_num AS INT) ASC", [$id]);
	}
	public function fire_newupdateitem($item_id, $item_cover, $item_title, $item_description, $type)
	{
		return $this->QuickFire("INSERT INTO tbl_updateitems (item_parentid,item_cover, item_title, item_desc, type) VALUES(?,?,?,?,?)", [$item_id, $item_cover, $item_title, $item_description, $type]);
	}
	public function look_updatesfromadmin()
	{
		return $this->QuickLook("SELECT id, version, headline, releasedate,dateposted, tba FROM tbl_updates ORDER BY dateposted DESC");
	}
	public function look_addnewupdatesetup($updatecoverfile, $updatetitle, $updatedescription, $releasedate, $tba, $versionnumber)
	{
		$current_date = date("Y-m-d H:i:s");
		$this->QuickFire("INSERT INTO tbl_updates
		(dateposted,headline,coverphoto,details,version,releasedate,tba)
		VALUES(?,?,?,?,?,?,?)", [
			$current_date,
			$updatetitle,
			$updatecoverfile,
			$updatedescription,
			$versionnumber,
			$releasedate,
			$tba
		]);
		return $this->QuickLook("SELECT id FROM tbl_updates WHERE dateposted=? AND headline=? AND coverphoto=?", [$current_date, $updatetitle, $updatecoverfile]);
	}
	public function look_showlatestnews()
	{
		return $this->QuickLook("SELECT * FROM tbl_news  ORDER BY dateposted DESC LIMIT 2");
	}
	public function fire_deletenews($currentnewsnumber)
	{
		return $this->QuickFire("DELETE FROM tbl_news WHERE id=?", [$currentnewsnumber]);
	}
	public function look_singlenewspublic($contentno)
	{
		return $this->QuickLook("SELECT * FROM tbl_news WHERE id=? ORDER BY id DESC LIMIT 1", [$contentno]);
	}
	public function look_publicnews()
	{
		return $this->QuickLook("SELECT * FROM tbl_news  ORDER BY dateposted DESC");
	}
	public function fire_getallnews()
	{
		return $this->QuickLook("SELECT * FROM tbl_news ORDER BY dateposted DESC");
	}
	public function fire_publishnews($newsheadline, $coverphoto, $description)
	{
		$current_date = date("Y-m-d H:i:s");
		return $this->QuickFire("INSERT INTO tbl_news (headline,coverphoto,description,dateposted) VALUES(?,?,?,?)", [$newsheadline, $coverphoto, $description, $current_date]);
	}
	public function fire_createaccount($username, $password, $roles, $profilepic)
	{
		$featset = "";
		$datecreated = date("Y-m-d");
		$out = json_decode($this->QuickLook("SELECT * FROM tbl_accounts WHERE username=?", [$username]), true);
		if (count($out) == 0) {
			return $this->QuickFire("INSERT INTO tbl_accounts (username,password,description,feature_set,profilepic,datecreated)
			VALUES(?,?,?,?,?,?)", [$username, $password, $roles, $featset, $profilepic, $datecreated]);
		} else {
			return json_encode(array("status" => "already existing"));
		}
	}
	public function look_getchaptersinglepublic($chapter)
	{
		$current_date = date("Y-m-d");
		return $this->QuickLook("SELECT * FROM tbl_lore WHERE publishdate <= ? AND chapter=?", [$current_date, $chapter]);
	}
	public function look_getpublishedchapters()
	{
		$current_date = date("Y-m-d");
		return $this->QuickLook("SELECT publishdate,coverimg, chapter,title   FROM tbl_lore WHERE publishdate <= '" . $current_date . "'");
	}
	public function look_homefeatured()
	{
		return $this->QuickLook("SELECT img, title, description,link, btn_name  FROM tbl_home WHERE cont_type='featured'");
	}
	public function look_latestfeatured()
	{
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type='featured' ORDER BY id DESC LIMIT 1");
	}
	public function look_hackwinnersofalltime()
	{
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
	public function look_gethackathonwinshistory()
	{
		return $this->QuickLook("SELECT hackdate, hackmsg,ph_ne,ph_fe,ph_peli,int_ne,int_fe,int_peli FROM tbl_hackathonwins ORDER BY hackdate DESC");
	}
	public function look_gettagiswinshistory()
	{
		return $this->QuickLook("SELECT tagisdate, tagismsg, tagisseason,ph_overall,ph_archer,ph_brawler,ph_shaman,ph_swordsman,int_overall,int_archer,int_brawler,int_shaman,int_swordsman FROM tbl_tagiswins ORDER BY tagisdate DESC");
	}
	public function homecoverphoto()
	{
		return $this->QuickLook("SELECT img FROM tbl_home WHERE cont_type='cover' ORDER BY id DESC LIMIT 1");
	}
	public function homelogo()
	{
		return $this->QuickLook("SELECT img, title FROM tbl_home WHERE cont_type='logo' ORDER BY id DESC LIMIT 1");
	}
	public function homehackathonwinners()
	{
		return $this->QuickLook("SELECT * FROM tbl_hackathonwins ORDER BY hackdate DESC LIMIT 1");
	}
	public function homefeatures()
	{
		return $this->QuickLook("SELECT * FROM tbl_features ORDER BY CAST(order_no AS INT) ASC");
	}
	public function homebottompanel()
	{
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type LIKE '%bottom%'");
	}
	public function homeucwins()
	{
		return $this->QuickLook("SELECT * FROM tbl_ucwins");
	}

	public function hometagiswins()
	{
		return $this->QuickLook("SELECT * FROM tbl_tagiswins");
	}

	public function fire_updatejobstatus($currentid, $status)
	{
		return $this->QuickFire("UPDATE tbl_jobs SET status=? WHERE id=?", [$status, $currentid]);
	}
	public function fire_deletejob($currentid)
	{
		return $this->QuickFire("DELETE FROM tbl_jobs WHERE id=?", [$currentid]);
	}
	public function fire_addjob($jobtitle, $shortdesc, $fulldesc)
	{
		return $this->QuickFire("INSERT INTO tbl_jobs (jobtitle, shortdesc, fulldesc, status) VALUES (?, ?, ?, '0')", [$jobtitle, $shortdesc, $fulldesc]);
	}
	public function look_getjob()
	{
		return $this->QuickLook("SELECT * FROM tbl_jobs");
	}
	public function look_deleteteam($currentid)
	{
		return $this->QuickFire("DELETE FROM tbl_teammember WHERE id=?", [$currentid]);
	}
	public function fire_addteam($facepic, $fullname, $positionname, $ordernumber)
	{
		return $this->QuickFire("INSERT INTO tbl_teammember (imgpath, fullname, position, order_no) VALUES (?, ?, ?, ?)", [$facepic, $fullname, $positionname, $ordernumber]);
	}
	public function look_getteam()
	{
		return $this->QuickLook("SELECT * FROM tbl_teammember");
	}
	public function fire_deletechapter($currentId)
	{
		return $this->QuickFire("DELETE FROM tbl_lore WHERE id=?", [$currentId]);
	}
	public function look_chapterfull($currentId)
	{
		return $this->QuickLook("SELECT story,coverimg FROM tbl_lore WHERE id=?", [$currentId]);
	}
	public function look_addedstories()
	{
		return $this->QuickLook("SELECT id, SUBSTR(story,1,256) as story,chapter,coverimg,title,publishdate  FROM tbl_lore");
		// return $this->QuickLook("SELECT * FROM tbl_lore");
	}
	public function fire_newstordata($vl_coverimg, $vl_chapnum, $vl_chaptitle, $vl_chapstory, $vl_publishdt)
	{
		return $this->QuickFire("INSERT INTO tbl_lore (coverimg, chapter, title, story, publishdate) VALUES (?, ?, ?, ?, ?)", [$vl_coverimg, $vl_chapnum, $vl_chaptitle, $vl_chapstory, $vl_publishdt]);
	}
	public function deletehackwin($currentId)
	{
		return $this->QuickFire("DELETE FROM tbl_hackathonwins WHERE id=?", [$currentId]);
	}
	public function deleteucwin($currentId)
	{
		return $this->QuickFire("DELETE FROM tbl_ucwins WHERE id=?", [$currentId]);
	}
	public function deletetagiswin($currentId)
	{
		return $this->QuickFire("DELETE FROM tbl_tagiswins WHERE id=?", [$currentId]);
	}
	public function gethackwins()
	{
		return $this->QuickLook("SELECT id,hackdate,ph_ne,ph_peli,ph_fe,int_ne,int_peli,int_fe FROM tbl_hackathonwins ORDER BY hackdate DESC");
	}
	public function getucwins()
	{
		return $this->QuickLook("SELECT id,ucdate,ph_ucwin,int_ucwin FROM tbl_ucwins ORDER BY ucdate DESC");
	}
	public function gettagiswins()
	{
		return $this->QuickLook("SELECT * FROM tbl_tagiswins ORDER BY tagisdate DESC");
	}
	public function look_addnewhackwin($vl_hackdate, $vl_hackmessage, $vl_ph_ne, $vl_ph_fe, $vl_ph_peli, $vl_int_ne, $vl_int_fe, $vl_int_peli)
	{
		return $this->QuickFire("INSERT INTO tbl_hackathonwins
		(hackdate, hackmsg, ph_ne, ph_fe, ph_peli, int_ne, int_fe, int_peli) VALUES
		(?, ?, ?, ?, ?, ?, ?, ?)
		", [$vl_hackdate, $vl_hackmessage, $vl_ph_ne, $vl_ph_fe, $vl_ph_peli, $vl_int_ne, $vl_int_fe, $vl_int_peli]);
	}

	public function look_addnewucwin($vl_ucdate, $vl_ucmessage, $vl_ph_ucwin, $vl_int_ucwin)
	{
		return $this->QuickFire("INSERT INTO tbl_ucwins
		(ucdate, ucmsg, ph_ucwin, int_ucwin) VALUES
		(?, ?, ?, ?)
		", [$vl_ucdate, $vl_ucmessage, $vl_ph_ucwin, $vl_int_ucwin]);
	}
	public function look_addnewtagiswin(
		$vl_tagisseason,
		$vl_tagisdate,
		$vl_tagismessage,
		$vl_ph_tagiswin_overall,
		$vl_ph_tagiswin_archer,
		$vl_ph_tagiswin_brawler,
		$vl_ph_tagiswin_shaman,
		$vl_ph_tagiswin_swordsman,
		$vl_int_tagiswin_overall,
		$vl_int_tagiswin_archer,
		$vl_int_tagiswin_brawler,
		$vl_int_tagiswin_shaman,
		$vl_int_tagiswin_swordsman
	) {
		return $this->QuickFire("INSERT INTO tbl_tagiswins
		(
		tagisseason,
		tagisdate, 
		tagismsg, 
		ph_overall,
		ph_archer,
		ph_brawler,
		ph_shaman,
		ph_swordsman,
		int_overall,
		int_archer,
		int_brawler,
		int_shaman,
		int_swordsman) VALUES
		(?, ?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?)
		", [
			$vl_tagisseason,
			$vl_tagisdate,
			$vl_tagismessage,
			$vl_ph_tagiswin_overall,
			$vl_ph_tagiswin_archer,
			$vl_ph_tagiswin_brawler,
			$vl_ph_tagiswin_shaman,
			$vl_ph_tagiswin_swordsman,
			$vl_int_tagiswin_overall,
			$vl_int_tagiswin_archer,
			$vl_int_tagiswin_brawler,
			$vl_int_tagiswin_shaman,
			$vl_int_tagiswin_swordsman
		]);
	}

	public function look_singlebottominfo($ctype)
	{
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type=?", [$ctype]);
	}
	public function look_bottompanelinfo()
	{
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type LIKE '%bottom_%'");
	}
	public function fire_updateabottompnl($title, $desc, $proimg, $btnname, $link, $type)
	{
		$dt = date("Y-m-d H:i:s");
		$out = json_decode($this->QuickLook("SELECT id FROM tbl_home WHERE cont_type=?", [$type]), true);

		if (count($out) == 0) {
			return $this->QuickFire("INSERT INTO tbl_home (title, description, img, btn_name, link, cont_type, date_recorded) VALUES (?, ?, ?, ?, ?, ?, ?)
			", [$title, $desc, $proimg, $btnname, $link, $type, $dt]);
		} else {

			if ($proimg == "") {
				return $this->QuickFire("UPDATE tbl_home SET
				title=?,
				description=?,

				btn_name=?,
				link=?,
				date_recorded=?
		
				WHERE
				cont_type=?
		
				", [$title, $desc, $btnname, $link, $dt, $type]);
			} else {
				return $this->QuickFire("UPDATE tbl_home SET
				title=?,
				description=?,
				img=?,
				btn_name=?,
				link=?,
				date_recorded=?
		
				WHERE
				cont_type=?
		
				", [$title, $desc, $proimg, $btnname, $link, $dt, $type]);
			}

		}

	}
	public function fire_deleteFeature($featid)
	{
		return $this->QuickFire("DELETE FROM tbl_features WHERE id=?", [$featid]);
	}
	public function look_addedfeatures()
	{
		return $this->QuickLook("SELECT * FROM tbl_features ORDER BY CAST(order_no AS INT) ASC");
	}
	public function fire_addnewfeature($featitle, $featdesc, $featimg)
	{
		return $this->QuickFire("INSERT INTO tbl_features (feattitle, featuredesc, featureimg) VALUES (?, ?, ?)", [$featitle, $featdesc, $featimg]);
	}
	public function look_lasestcover()
	{
		return $this->QuickLook("SELECT * FROM tbl_home WHERE cont_type='cover' ORDER BY date_recorded DESC");
	}
	public function fire_addnewhomefeat($ctype, $img, $title, $desc, $link, $btnname)
	{
		$dt = date("Y-m-d H:i:s");
		return $this->QuickFire("INSERT INTO tbl_home (cont_type, img, title, description, link, btn_name, date_recorded) VALUES (?, ?, ?, ?, ?, ?, ?)", [$ctype, $img, $title, $desc, $link, $btnname, $dt]);
	}
	public function fire_login($uname, $pass)
	{
		// check if accounts are existing

		$out = json_decode($this->QuickLook("SELECT id FROM tbl_accounts"), true);

		if (count($out) == 0) {
			//setup required
			return "setup";
		} else {
			return $this->QuickLook("SELECT username,feature_set,id, profilepic, feature_set FROM tbl_accounts WHERE
			username=? AND
			password=? LIMIT 1", [$uname, $pass]);
		}


	}


	// NEW END TO END ENCRYPTION ENGINE IMPORTED IN PALARO 20 TECH
	function sdmenc($data)
	{
		global $passkey;
		$keycode = openssl_digest(utf8_encode($passkey), "sha512", true);
		$string = substr($keycode, 10, 24);
		$utfData = utf8_encode($data);
		$encryptData = openssl_encrypt($utfData, "DES-EDE3", $string, OPENSSL_RAW_DATA, '');
		$base64Data = base64_encode($encryptData);
		return $base64Data;
	}
	function sdmdec($data)
	{
		global $passkey;
		$keycode = openssl_digest(utf8_encode($passkey), "sha512", true);
		$string = substr($keycode, 10, 24);
		$utfData = base64_decode($data);
		$decryptData = openssl_decrypt($utfData, "DES-EDE3", $string, OPENSSL_RAW_DATA, '');
		return $decryptData;
	}





	// CODE BOOSTERS
	public function SimpleQuickSum($q)
	{
		$q = $this->c->prepare($q);
		$q->execute();
		return $q->rowCount();
	}
	public function QuickSum($q)
	{
		$q = $this->c->prepare($q);
		$q->execute();
		return json_encode(array(number_format($q->rowCount())));
	}

	public function QuickLook($q, $par = array())
	{
		$q = $this->c->prepare($q);
		if ($q->execute($par)) {
			return json_encode($q->fetchall(PDO::FETCH_ASSOC));
		} else {
			return $q->errorInfo();
		}

	}
	public function QuickFire($q, $par = array())
	{
		$q = $this->c->prepare($q);
		if ($q->execute($par)) {
			return json_encode(array("true"));
		} else {
			return json_encode(array("false"));
		}
	}


}
?>