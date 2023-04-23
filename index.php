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

	case "getmyinfobasic":
		$out = UC()->look_getmyinfobasic(sdmdec($_GET["user_id"]));
		echo $out;
		break;
	case "changepassword":
		$out = UC()->fire_changepassword(sdmdec($_POST["oridignid"]),
		$_POST["inp_oldpassword"],
		$_POST["inp_inpnewpassword"]
	
	);
		echo $out;
		break;

		case "changerole":
			$out = UC()->fire_changerole(sdmdec($_POST["oridignid"]),
			sdmdec($_POST["inp_rolenew"])
		);
			echo $out;
			break;

			case "changeusername":
				$out = UC()->fire_changeusername(sdmdec($_POST["oridignid"]),
				sdmdec($_POST["inp_username"])
			
			);
				echo $out;
				break;

				case "changeprofilepic":
					$out = UC()->fire_changeprofilepic(sdmdec($_POST["oridignid"]),
					sdmdec($_POST["profilepic"])
				);
					echo $out;
					break;




	case "fulljobinfo":
		$out = UC()->look_fulljobinfo(sdmdec($_GET["itemid"]));
		echo $out;
		break;
 case "getpublicmembers":
	$out = UC()->look_getpublicmembers();
	echo $out;
	break;
	 case "publishedjobposting":
		$out = UC()->look_publishedjobposting();
		echo $out;
		break;
	case "addcontributor":
		$out = UC()->fire_addcontributor(sdmdec(
			$_POST["inp_profilepic"]),
		sdmdec($_POST["inp_name"]),
		sdmdec($_POST["inp_description"]),
		sdmdec($_POST["inp_featureset"]),
		$_POST["inp_password"],
	);
		echo $out;
		break;
	break;
	case "allcontributors":
		$out = UC()->look_allcontributors(sdmdec($_GET["managerid"]));
		echo $out;
		break;
	case "publicupdatedetailsful":
		$out = UC()->look_publicupdatedetailsful(sdmdec($_GET["updateno"]));
		echo $out;
		break;
	case "deleteupdaterec":
		$out = UC()->fire_deleteupdaterec(sdmdec($_POST["current_updateid"]));
		echo $out;
		break;
	case "deletefeatureitem":
		$out = UC()->fire_deletefeatureitem(sdmdec($_POST["current_itemId"]));
		echo $out;
	break;
	case "updatebasicinfo":
		$out = UC()->look_updatebasicinfo(sdmdec($_GET["itemId"]));
		echo $out;
		break;
	case "publicupdates":
		$out = UC()->look_publicupdates();
		echo $out;
		break;
	case "updateitems":
	$out = UC()->look_updateitems(sdmdec($_GET["current_updateid"]));
	echo $out;
	break;
	case "newupdateitem":
	$out = UC()->fire_newupdateitem(
		sdmdec($_POST["item_id"]),
		sdmdec($_POST["item_cover"]),
		sdmdec($_POST["item_title"]),
		sdmdec($_POST["item_description"])
	);
	echo $out;
	break;
	case "updatesfromadmin":
	$out = UC()->look_updatesfromadmin();
	echo $out;
	break;
	case "addnewupdatesetup":
		$out = UC()->look_addnewupdatesetup(sdmdec($_POST["updatecoverfile"]),sdmdec($_POST["updatetitle"]),sdmdec($_POST["updatedescription"]),sdmdec($_POST["releasedate"]),sdmdec($_POST["versionnumber"]));
		echo $out;
		break;
	case "showlatestnews":
		$out = UC()->look_showlatestnews();
		echo $out;
		break;
	case "deletenews":
		$out = UC()->fire_deletenews(sdmdec($_POST["currentnewsnumber"]));
		echo $out;
		break;
	case "singlenewspublic":
		$out = UC()->look_singlenewspublic(sdmdec($_GET["contentno"]));
		echo $out;
		break;
	case "publicnews":
		$out = UC()->look_publicnews();
		echo $out;
		break;
	case "getallnews":
		$out = UC()->fire_getallnews();
		echo $out;
		break;
	case "publishnews":
		$out = UC()->fire_publishnews(sdmdec($_POST["newsheadline"]),sdmdec($_POST["coverphoto"]),sdmdec($_POST["description"]));
		echo $out;
	break;
	case "createaccount":
		$out = UC()->fire_createaccount(sdmdec($_POST["username"]),$_POST["pass"],sdmdec($_POST["roles"]),sdmdec($_POST["profilepic"]));
		echo $out;
		break;
	case "getchaptersinglepublic":
		$out = UC()->look_getchaptersinglepublic(sdmdec($_GET["chapter"]));
		echo $out;
		break;
	case "getallpublishedchapters":
		$out = UC()->look_getpublishedchapters();
		echo $out;
		break;
	case "homefeatured":
		$out = UC()->look_homefeatured();
		echo $out;
		break;
	case "latestfeatured":
		$out = UC()->look_latestfeatured();
			echo $out;
		break;
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
		$out = UC()->fire_login(
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