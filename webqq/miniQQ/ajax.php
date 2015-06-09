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
	$deleFriendId=isset($_POST["deleFriendId"])?$_POST["deleFriendId"]:"";
	$groupfId=isset($_POST["groupfId"])?$_POST["groupfId"]:"";//被分组的好友
	$friend_groupId=isset($_POST["friend_groupId"])?$_POST["friend_groupId"]:"";//好友目前的分组
	$groupMaxid=isset($_POST["groupMaxid"])?$_POST["groupMaxid"]:"";

	$myid=isset($_POST["myid"])?$_POST["myid"]:"";
	$chatid=isset($_POST["chatid"])?$_POST["chatid"]:"";
	$Lastjilu=isset($_POST["Lastjilu"])?$_POST["Lastjilu"]:"";
	$msgId=isset($_POST["msgId"])?$_POST["msgId"]:"";

	$addedgrouname=isset($_POST["addedgrouname"])?$_POST["addedgrouname"]:"";
	$deletedgrouname=isset($_POST["deletedgrouname"])?$_POST["deletedgrouname"]:"";
	$mynewshuo=isset($_POST["mynewshuo"])?$_POST["mynewshuo"]:"";
	$db=new ezSQL_mysql();
	//插入消息记录
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
	//获取未读消息记录
	if($flag=="getmsg"){
		$sql1="select id as messageId,msgContent,msgSender,msgReceiver,msgSendTime,msgState from messageinfo where msgState='noread' and msgReceiver=$ReceID";
		$res1=$db->get_results($sql1);
		if(!$res1){
			echo "{}";
		}
		else{
			echo json_encode($res1);
		}
		die();
	}
	//消息已读改变状态
	if($flag=="changesate"){
		// echo "string";
		$sql2="UPDATE messageinfo SET msgState='haveread' WHERE msgState='noread' and msgReceiver=$ReceID and msgSender=$FromID";
		$db->query($sql2);
		die();
	}
	//已获取的消息改变消息状态
	if($flag=="changestatebymsgid"){
		// echo "string";
		$sql2="UPDATE messageinfo SET msgState='haveread' WHERE msgState='noread' and id=".$msgId;
		$db->query($sql2);
		die();
	}
	//好友退出改变状态
	if ($flag == "logout") {
		//session_start();
		unset($_SESSION["onlineID"]);
		$sqloff="update userinfo set userState='offline' where id=".$ReceID."";
		$db->query($sqloff);
		echo json_encode("已退出登录");
		die();
	}
	//好友登陆改变状态
	if ($flag == "getonline") {
		$seeOnline="select id from userinfo where userState='online'";
		$res=$db->get_results($seeOnline);
		foreach ($res as $geton) {
			echo $geton->id.",";
   		}
		die();
	}
	//获取所有离线好友
	if($flag == "getoffline"){
		$seeOffline="select id from userinfo where userState='offline'";
		$res=$db->get_results($seeOffline);
		foreach ($res as $getoff) {
			echo $getoff->id.",";
   		}
   		die();
	}
    //注册
	if($flag == "zhuce"){
			$zhucemima=md5($zhucemima);
			$zhuce="INSERT INTO userinfo(id,userpwd,userNickname,userHeadImage,userState,user_groups) values(null,'".$zhucemima."','".$zhucename."','headimages/0.png','offline',0)";
			$res=$db->query($zhuce);
			echo $zhucename;
		    die();
	
		// echo $zhucemima;
	}
	//获取注册qq账号
	if($flag=="newuser"){
		$newuser="select max(id) from userinfo";
		$res=$db->get_results($newuser);
	 	$result=(array)$res[0];
	 	echo json_encode($result["max(id)"]);
	    die();
	}
	//获取聊天记录
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
     
    if($flag=="addnewfriend"){
        //添加好友
            $db=new ezSQL_mysql();
            $friendId=isset($_POST["friendId"])?$_POST["friendId"]:"";
            $friendNick=isset($_POST["friendNick"])?$_POST["friendNick"]:"";
            $myId=isset($_POST["myId"])?$_POST["myId"]:"";
            $idarr=explode(",",trim($friendId,","));
            $namearr=explode(",",trim($friendNick,","));
            for($i=0;$i<count($idarr);$i++){
            	$newFriendArr[$i]["friend_id"]=$idarr[$i];
            	$newFriendArr[$i]["friend_name"]=$namearr[$i];
            }
            foreach($newFriendArr as $key =>$val){
            	//判断是否存在次好友记录
            	$sql_isexist="select * from `friendsinfo` where `userid` =".$myId." AND `friendid` =".(int)$val["friend_id"];
            	$res_isexist=$db->query($sql_isexist);
            	if($res_isexist){
            		//修改
            		$sql_update="UPDATE  `friendsinfo` SET `is_active` =1 WHERE `userid` =".$myId." AND `friendid` =".(int)$val["friend_id"];
            		$res=$db->query($sql_update);
            		echo json_encode("修改成功！");
            	}
            	else{
	                $sql="insert into friendsinfo(id,userid,friendid,friendNoteName,friend_group,is_active) values(default,".$myId.",".(int)$val["friend_id"].",'".$val["friend_name"]."',0,1)";
	                $res=$db->query($sql);
	                echo json_encode("添加成功！");
       			}
            }
            die();
        }
     //删除好友
     if($flag=="delefriend"){
     	$sql="UPDATE `friendsinfo` SET `is_active` = 2 where `friendid`=".$deleFriendId." AND `userid`=".$myid;
     	$res=$db->query($sql);
     	echo json_encode("删除成功！");
     }

     //重新分组+
     if($flag=="newgroupadd"){
     	$sql1="select user_groups from userinfo where id='".$myid."'";
     	$res1=$db->get_results($sql1);
 		$group=(array)$res1[0];
 		$mygroup=$group["user_groups"];
 		$mygroupArr=explode("|",$mygroup);
 		$thesegroupIds=array();
 		foreach ($mygroupArr as $key => $value) {
 			if((int)$value>(int)$friend_groupId){
 				array_push($thesegroupIds,(int)$value);
 			}
 		}
 		$the_groupid=100;
 		foreach ($thesegroupIds as $keyids => $valueids) {
 			if((int)$valueids<(int)$the_groupid){
 				$the_groupid=(int)$valueids;
 			}
 		}
 		if($the_groupid==100){
 			$the_groupid=$friend_groupId;
 		}
     	$friend_groupId=$the_groupid;
     	$sql="UPDATE `friendsinfo` SET `friend_group` = ".$friend_groupId." where `friendid`=".$groupfId." AND `userid`=".$myid;
     	$res=$db->query($sql);
     	echo json_encode("renew group success");
     }

     //重新分组-
     if($flag=="newgroupdown"){
     	$sql1="select user_groups from userinfo where id='".$myid."'";
     	$res1=$db->get_results($sql1);
 		$group=(array)$res1[0];
 		$mygroup=$group["user_groups"];
 		$mygroupArr=explode("|",$mygroup);
 		$thesegroupIds=array();
 		foreach ($mygroupArr as $key => $value) {
 			if((int)$value<(int)$friend_groupId){
 				array_push($thesegroupIds,(int)$value);
 			}
 		}
 		$the_groupid=0;
 		foreach ($thesegroupIds as $keyids => $valueids) {
 			if((int)$valueids>(int)$the_groupid){
 				$the_groupid=(int)$valueids;
 			}
 		}
 		if($the_groupid==0){
 			$the_groupid=0;
 		}
     	$friend_groupId=$the_groupid;
     	$sql="UPDATE `friendsinfo` SET `friend_group` = ".$friend_groupId." where `friendid`=".$groupfId." AND `userid`=".$myid;
     	$res=$db->query($sql);
     	echo json_encode("renew group success");
     }

    //添加分组
     if($flag=="createGroup"){
     	$sql1="select * from `groups` where group_name = '".$addedgrouname."'";
     	$res1=$db->query($sql1);
     	if($res1){
	 		$sql2="select group_id from `groups` where group_name ='".$addedgrouname."'";
	    	$res2=$db->get_results($sql2);
	 		$groupId=(array)$res2[0];
	 		$group_id=$groupId["group_id"];

     		$sql4="select user_groups from `userinfo` where id='".$myid."'";
     		$res4=$db->get_results($sql4);
     		$res4[0]=(array)$res4[0];
     		$groustr=$res4[0]["user_groups"];
     		$groustr.="|".$group_id;

     		$sql5="update `userinfo` set user_groups='".(string)$groustr."' where id='".$myid."'";
     		$res5=$db->query($sql5);
     		echo json_encode("creating success");
     	}
     	else{
     		$sql2="select MAX(group_id) from `groups`";
     		$res2=$db->get_results($sql2);
     		$maxgroup=(array)$res2[0];
     		$maxgroupid=$maxgroup["MAX(group_id)"];

     		$insertId=$maxgroupid+1;
     		$sql3="insert into groups(group_id,group_name,is_active) values(".$insertId.",'".$addedgrouname."',1)";
     		$res3=$db->query($sql3);

     		$sql4="select user_groups from `userinfo` where id='".$myid."'";
     		$res4=$db->get_results($sql4);
     		$res4[0]=(array)$res4[0];
     		$groustr=$res4[0]["user_groups"];
     		$groustr.="|".$insertId;

     		$sql5="update `userinfo` set user_groups='".(string)$groustr."' where id='".$myid."'";
     		$res5=$db->query($sql5);
     		echo json_encode("creating success");
     	}
     }

     //删除分组
     if($flag=="deleGroup"){
     	$sql1="select user_groups from userinfo where id='".$myid."'";
     	$res1=$db->get_results($sql1);
 		$group=(array)$res1[0];
 		$mygroup=$group["user_groups"];
 		$mygroupArr=explode("|",$mygroup);

 		$sql2="select group_id from `groups` where group_name ='".$deletedgrouname."'";
    	$res2=$db->get_results($sql2);
    	if($res2[0]){
 			$groupId=(array)$res2[0];
 			$group_id=$groupId["group_id"];
 		}
 		else{
 			echo json_encode("can't  find this group");
 			die();
 		}
 		if($group_id!=0){
	 		$uptedGroupStr="";
	 		foreach ($mygroupArr as $key => $value) {
	 			if($value!=$group_id){
	 				$uptedGroupStr.=$value."|";
	 			}
	 		}
	 		$uptedGroupStr=trim($uptedGroupStr,"|");

	 		$sql3="update `userinfo` set user_groups='".(string)$uptedGroupStr."' where id='".$myid."'";
	 		$res3=$db->query($sql3);

	 		$sql4="update `friendsinfo` set friend_group = 0 where userid ='".$myid."' AND friend_group ='".$group_id."'";
	 		$res4=$db->query($sql4);
	 		echo json_encode("deleting success");
 		}
 		else{
 			echo json_encode("can not delete this group");
 		}
     }

     //修改
     if($flag=="changeshuo"){
     	$sql1="update `userinfo` set user_qianming='".$mynewshuo."' where id ='".$myid."'";
     	$res1=$db->query($sql1);
     	echo json_encode("OK");
     }
?>