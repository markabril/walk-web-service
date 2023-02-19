<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods:POST");
header('Content-Type: text/html; charset=utf-8');
include_once "includes/connection.php";
include_once "models/queries.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$passkey = "walkeregc2023";

if(isset($_POST["tag"])) {	//POST
	$tag = sdmdec($_POST["tag"],$passkey);
}else if(isset($_GET["tag"])){ //GET
	$tag = sdmdec($_GET["tag"],$passkey);
}

// =============== FUNCTION PATTERN (PALARO 20) TECHNOLOGIES ===============
// Look - To fetch data                           =
// Fire - To add data                             =
// Lift - To update data                          =
// Kill - To delete data                          =
// ================================================

switch ($tag) {
	case "gethackathonwinshistory":
		$out = UC()->look_gethackathonwinshistory();
		echo $out;
	break;
	case "homecoverphoto":
		$out = UC()->homecoverphoto();
		echo $out;
	break;
	case "homehackathonwinners":
		$out = UC()->homehackathonwinners();
		echo $out;
	break;
	case "homefeatures":
		$out = UC()->homefeatures();
		echo $out;
	break;
	case "homebottompanel":
		$out = UC()->homebottompanel();
		echo $out;
	break;

	case "updatejobstatus":
		$out = UC()->fire_updatejobstatus(sdmdec($_POST["currentId"]),sdmdec($_POST["status"]));
		echo $out;
		break;
	case "deletejob":
		$out = UC()->fire_deletejob(sdmdec($_GET["currentId"]));
		echo $out;
		break;
	case "addjob":
		$out = UC()->fire_addjob(sdmdec($_POST["jobtitle"]),sdmdec($_POST["shortdesc"]),sdmdec($_POST["fulldesc"]));
		echo $out;
	break;
	case "getjob":
		$out = UC()->look_getjob();
		echo $out;
	break;
	case "deleteteam":
		$out = UC()->look_deleteteam(sdmdec($_GET["currentId"]));
		echo $out;
		break;
	case "addteam":
		$out = UC()->fire_addteam(sdmdec($_POST["facepic"]),sdmdec($_POST["fullname"]),sdmdec($_POST["positionname"]),sdmdec($_POST["ordernumber"]));
		echo $out;
	break;
	case "getteam":
		$out = UC()->look_getteam();
		echo $out;
	break;
	case "deletechapter":
		$out = UC()->fire_deletechapter(sdmdec($_GET["currentId"]));
		echo $out;
		break;
	case "chapterfull":
		$out = UC()->look_chapterfull(sdmdec($_GET["currentId"]));
		echo $out;
		break;
	case "addedstories":
		$out = UC()->look_addedstories();
		echo $out;
	break;
	case "newstordata":
		$out = UC()->fire_newstordata(sdmdec($_POST["vl_coverimg"]),sdmdec($_POST["vl_chapnum"]),sdmdec($_POST["vl_chaptitle"]),sdmdec($_POST["vl_chapstory"]),sdmdec($_POST["vl_publishdt"]));
		echo $out;
	break;
	case "deletehackwin":
		$out = UC()->deletehackwin(sdmdec($_GET["currentId"]));
		echo $out;
		break;
	case "gethackwins":
		$out = UC()->gethackwins();
		echo $out;
	break;
	case "addnewhackwin":

		$out = UC()->look_addnewhackwin(
			sdmdec($_POST["vl_hackdate"]),
			sdmdec($_POST["vl_hackmessage"]),
			sdmdec($_POST["vl_ph_ne"]),
			sdmdec($_POST["vl_ph_fe"]),
			sdmdec($_POST["vl_ph_peli"]),
			sdmdec($_POST["vl_int_ne"]),
			sdmdec($_POST["vl_int_fe"]),
			sdmdec($_POST["vl_int_peli"])
		);
		echo $out;


		break;
	case "getbottomsingleinfo":
		$out = UC()->look_singlebottominfo(sdmdec($_GET["conttype"]));
		echo $out;
		break;
	case "getbottompanelinfos":
		$out = UC()->look_bottompanelinfo();
		echo $out;
		break;
	case "updateabottompnl":
		$out = UC()->fire_updateabottompnl(
			sdmdec($_POST["title"]),
			sdmdec($_POST["desc"]),
			sdmdec($_POST["promimg"]),
			sdmdec($_POST["btnname"]),
			sdmdec($_POST["link"]),
			sdmdec($_POST["type"])
		);
		echo $out;
	break;
	case "deleteafeature":
		$out = UC()->fire_deleteFeature(sdmdec($_GET["featureid"]));
		echo $out;
		break;
	case "getalladdedfeatures":
		$out = UC()->look_addedfeatures();
		echo $out;
		break;
	case "addnewfeaturenow":
		$out = UC()->fire_addnewfeature(
			sdmdec($_POST['feattitle']),
			sdmdec($_POST['featdesc']),
			sdmdec($_POST['featimg']));

		echo $out;
	break;
	case "getlatestcover":
		$out = UC()->look_lasestcover();
			echo $out;
		break;
	case "addhomefeature":
		$out = UC()->fire_addnewhomefeat(
			sdmdec($_POST['conttype']),
			sdmdec($_POST['img']),
			sdmdec($_POST['title']),
			sdmdec($_POST['desc']),
			sdmdec($_POST['link']),
			sdmdec($_POST['btnhome'])
		);
			echo $out;
	break;
	case "loginattempt":
		$out = UC()->fire_deletetournament(
		sdmdec($_POST['paruname']),
		$_POST['parpassword']);
		echo $out;
	break;
}

function UC() {
    $c = new connection();
    $c = $c->sdm_connect();
    $sdm_q = new sdm_query($c);
    $c = null;
    return $sdm_q;
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
?>