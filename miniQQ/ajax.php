<?php
	include_once "ez_sql_core.php";
	include_once "ez_sql_mysql.php";
	session_start();
	$flag=isset($_POST["flag"])?$_POST["flag"]:""; 
	$sendID=isset($_POST["sendID"])?$_POST["sendID"]:""; 
	$receiveID=isset($_POST["receiveID"])?$_POST["receiveID"]:""; 
	$ReceID=isset($_SESSION["onlineID"])?$_SESSION["onlineID"]:""; 
	$MSG=isset($_POST["MSG"])?$_POST["MSG"]:""; 
	$FromID=isset($_POST["FromID"])?$_POST["FromID"]:""; 
	$zhucename=isset($_POST["username"])?$_POST["username"]:"";
	$zhucemima=isset($_POST["usermima"])?$_POST["usermima"]:"";
	$surezhucemima=isset($_POST["sureusermima"])?$_POST["sureusermima"]:"";
	$newid=isset($_POST["newid"])?$_POST["newid"]:"";

	$myid=isset($_POST["myid"])?$_POST["myid"]:"";
	$chatid=isset($_POST["chatid"])?$_POST["chatid"]:"";
	$Lastjilu=isset($_POST["Lastjilu"])?$_POST["Lastjilu"]:"";
	$db=new ezSQL_mysql();
	if($flag=="send"){
		$sql="INSERT INTO messageinfo(id, msgContent,msgSender, msgReceiver, msgSendTime, msgState) VALUES (null,'$MSG',$sendID,$receiveID,now(),'noread')";
		$res=$db->query($sql);
		if(!$res){
			// echo "no";
		}
		else{
			// echo "yes";
		}
		die();
	}

	if($flag=="getmsg"){
		$sql1="select * from messageinfo where msgState='noread' and msgReceiver=$ReceID";
		$res1=$db->get_results($sql1);
		if(!$res1){
			// echo "no";
		}
		else{
			echo json_encode($res1);
		}
		die();
	}
	if($flag=="changesate"){
		// echo "string";
		$sql2="UPDATE messageinfo SET msgState='haveread' WHERE msgState='noread' and msgReceiver=$ReceID and msgSender=$FromID";
		$db->query($sql2);
		die();
	}
	if ($flag == "logout") {
		unset($_SESSION["onlineID"]);
		$sqloff="update userinfo set userState='offline' where id=".$ReceID."";
		$db->query($sqloff);
		die();
	}
	if ($flag == "getonline") {
		$seeOnline="select id from userinfo where userState='online'";
		$res=$db->get_results($seeOnline);
		foreach ($res as $geton) {
			echo $geton->id.",";
   		}
		die();
	}
	if($flag == "getoffline"){
		$seeOffline="select id from userinfo where userState='offline'";
		$res=$db->get_results($seeOffline);
		foreach ($res as $getoff) {
			echo $getoff->id.",";
   		}
   		die();
	}

	if($flag == "zhuce"){
			$zhuce="INSERT INTO userinfo(id,userpwd,userNickname,userHeadImage,userState) values(null,'".$zhucemima."','".$zhucename."','headimages/0.png','offline')";
			$res=$db->query($zhuce);
			echo $zhucename;
		    die();
	
		// echo $zhucemima;
	}

	if($flag=="newuser"){
		$newuser="select id from userinfo where userNickname='".$newid."'";
		$res=$db->get_results($newuser);
	   foreach ($res as $uid){
	   	 echo $uid->id.",";
	   }
	   die();
	}

	if($flag=="getjilu"){
		$getjilu="select msgContent from messageinfo where (msgSender='".$myid."' and msgReceiver='".$chatid."')or(msgSender='".$chatid."' and msgReceiver='".$myid."')";	
		$res=$db->get_results($getjilu);
		foreach($res as $jilu) {
			echo $jilu->msgContent.",";
		}
		die();
	}
	if($flag=="addfrmjilu"){
		$sqll="select msgSender,msgContent,msgReceiver from messageinfo where (msgSender='".$myid."' and msgReceiver='".$chatid."')or(msgSender='".$chatid."' and msgReceiver='".$myid."')";
		$res=$db->get_results($sqll);
	    echo json_encode($res);
	    die();
	}
?>