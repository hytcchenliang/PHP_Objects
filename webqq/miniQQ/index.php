<?php
    include_once "ez_sql_core.php";
    include_once "ez_sql_mysql.php";
    session_start();
    $userid=isset($_POST["username"])?$_POST["username"]:""; 
    $userpwd=isset($_POST["password"])?$_POST["password"]:""; 
    $onuserid=isset($_SESSION["onlineID"])?$_SESSION["onlineID"]:""; 
    $onusername=isset($_SESSION["onlinename"])?$_SESSION["onlinename"]:""; 
    $thisSkin=isset($_GET["thisSkin"])?$_GET["thisSkin"]:""; 
    if($userid!=""&&$userpwd!=""){
        $db=new ezSQL_mysql();
        $sql="select * from userinfo where id='" . $userid . "' and userpwd='" . md5($userpwd). "'";
        $res=$db->get_row($sql);
        if(!$res){
                header("location:login.php?error=wronglogin");
                die();
        }else{
                $_SESSION["onlineID"] =$userid;
                $_SESSION["onlinename"]=$res->userNickname;
                $sqlon="update userinfo set userState='online' where id=".$userid."";
                $db->query($sqlon);
        }	
    }
    else{
        if($onuserid==""){
            header("location:login.php?error=needlogin");
            die();
        }
    }
	//当前登录人信息
	$db=new ezSQL_mysql();
    $sql="select * from userinfo where id=".$_SESSION["onlineID"];
    $res=$db->get_results($sql);
    if($res){
   		foreach($res as $myinfo) {
   			$myname=$myinfo->userNickname;
   			$mypic=$myinfo->userHeadImage;
            $myqianming=$myinfo->user_qianming;
   		}
   }
   //已经登陆
    if($userid==""){
        $userid=$_SESSION["onlineID"];
    }
?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <?php 
        if($thisSkin){
            echo '<link class="yangshi" rel="stylesheet" type="text/css" href='.$thisSkin .'>';
        }
        else{
            echo '<link class="yangshi" rel="stylesheet" type="text/css" href="css/index_shuimo.css">';
        }
    ?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="js/index.js"></script>
	
</head>
<body>
	<div class="bodyA">
        <div class="biaoqing">
            <li class="biaoLi" biaoqingId="[微笑]">微笑</li>
            <li class="biaoLi" biaoqingId="[撇嘴]">撇嘴</li>
            <li class="biaoLi" biaoqingId="[色]">色</li>
            <li class="biaoLi" biaoqingId="[发呆]">发呆</li>
            <li class="biaoLi" biaoqingId="[得意]">得意</li>
            <li class="biaoLi" biaoqingId="[流泪]">流泪</li>
            <li class="biaoLi" biaoqingId="[害羞]">害羞</li>
            <li class="biaoLi" biaoqingId="[闭嘴]">闭嘴</li>
            <li class="biaoLi" biaoqingId="[睡]">睡</li>
            <li class="biaoLi" biaoqingId="[大哭]">大哭</li>
            <li class="biaoLi" biaoqingId="[尴尬]">尴尬</li>
            <li class="biaoLi" biaoqingId="[大怒]">大怒</li>
            <li class="biaoLi" biaoqingId="[调皮]">调皮</li>
            <li class="biaoLi" biaoqingId="[呲牙]">呲牙</li>
            <li class="biaoLi" biaoqingId="[惊讶]">惊讶</li>
            <li class="biaoLi" biaoqingId="[难过]">难过</li>
            <li class="biaoLi" biaoqingId="[酷]">酷</li>
            <li class="biaoLi" biaoqingId="[冷汗]">冷汗</li>
            <li class="biaoLi" biaoqingId="[抓狂]">抓狂</li>
            <li class="biaoLi" biaoqingId="[吐]">吐</li>
            <li class="closebiao" >CLOSE</li>
        </div>
        <!-- <div class="logout">注销</div> -->
        <div class="myinfo">
                <div class="myinfotop">
                        <div class="myinfotopL">
                                <img src="<?php echo $mypic;?>" class="myheadimg">
                        </div>
                        <div class="myinfotopR">
                                <span class="namespan" userId="<?php echo $userid;?>"><?php echo $myname;?></span>
                                <br>
                                <span class="shuoshuospan">
                                    <?php echo $myqianming; ?>
                                </span>
                                <input type="text" name="renewshuo" class="changeshuo"></input>
                        </div>
                </div>
                <div class="myinfobottom">
                        <a id="li1" href="https://qzone.qq.com" ></a>
                        <a id="li2" href="https://mail.qq.com/cgi-bin/loginpage"></a>
                        <a id="li3" href="http://t.qq.com"></a>
                        <a id="li4" href="http://v.qq.com/"></a>
                        <a id="li5" href="http://www.qq.com/"></a>
                        <a id="li6" href="http://y.qq.com/#type=index"></a>
                        <a id="li7" href="http://wallet.tenpay.com/web/"></a>
                        <a id="li8" href="http://home.pengyou.com/index.php?mod=home"></a>
                        <a id="li9" href="http://www.weiyun.com/index.html"></a>
                </div>
        </div>
		<div class="qqdiv">
            <div id="qqtitle" class="Backcolorclass">
            <div class="titleL">会话</div>
            
            </div>

            <div class="BBottom" BID="2" id="BBottom2">
            <div class="fenzu">
                    <div class="fenzuIn" FIid="1">
                            <li>联系人列表</li>
                    </div>
<!--                     <div class="fenzuIn" FIid="2">
                            <li>群</li>
                    </div>
                    <div class="fenzuIn" FIid="3">
                            <li>讨论组</li>
                    </div>
 -->            </div>
			<div class="friendbody" id="pengyouzu" FBid="1">
<!-- 我的好友 begin-->
                <!-- 分组 -->
                <?php
                    $db=new ezSQL_mysql();
                    $loginId= $userid;
                    //读出登陆者的哪些群（1|2|3）
                    $sql_groupid="select user_groups from userinfo where id = ".$loginId;
                    $res_groupid=$db->get_row($sql_groupid);
                    $groupStr=$res_groupid->user_groups;
                    if(strlen($groupStr)>0){
                        //将群字符串分割
                        $groupArr=  explode("|",trim($groupStr,"|"));
                        foreach ($groupArr as $keygroupId => $valuegroupId) {
                            $groupArr[$keygroupId]=(int)$valuegroupId;
                        }
                        sort($groupArr);
                        foreach($groupArr as $key =>$val){
                            //根据每个群id读出群id,群名称
                            $sql_groupname="select group_id,group_name from groups where group_id = ".(int)$val;
                            // $res_groupname=$db->get_row($sql_groupname);
                            // $groupName[$key]=$res_groupname->group_name;
                            $res_groupname=$db->get_results($sql_groupname);
                            // print_r($res_groupname);
                            // exit();
                            $group[$key]=$res_groupname[0];
                        }
                    foreach($group as $key_group=>$val_group){
                        $group_id=$val_group->group_id;
                        $group_name=$val_group->group_name;
                ?>
                    <div class="friendlistkind list1" kid=<?=$group_id?> >
                    <div class="friendlistkindL"></div>
                    <div class="friendlistkindR"><?=$group_name?></div>
                    <!-- 查询在线人数 -->
                    <?php 
                        $db=new ezSQL_mysql();
                        $sql_allcount="select userinfo.id,userinfo.userNickname,userinfo.userHeadImage,userinfo.user_qianming,friendsinfo.friendNotename,userinfo.userState from userinfo,friendsinfo where userinfo.id=friendsinfo.friendid and friendsinfo.friend_group =".$group_id." and friendsinfo.userid='".$_SESSION["onlineID"]."'" ;
                        $res_allcount=$db->get_results($sql_allcount);
                        $allcount=count($res_allcount);
                        

                        $db=new ezSQL_mysql();
                        $sql_onlinecount="select userinfo.id,userinfo.userNickname,userinfo.userHeadImage,userinfo.user_qianming,friendsinfo.friendNotename,userinfo.userState from userinfo,friendsinfo where userinfo.userState='online' and userinfo.id=friendsinfo.friendid and friendsinfo.friend_group =".$group_id." and friendsinfo.userid='".$_SESSION["onlineID"]."'" ;
                        $res_onlinecount=$db->get_results($sql_onlinecount);
                        if($res_onlinecount){
                             $onlinecount=count($res_onlinecount);
                        }
                        else{
                            $onlinecount=0;
                        }
                    ?>
                    <span class="onlinenumber"><?=$onlinecount ?>/<?=$allcount ?></span>
                </div>
                <!-- 好友 -->
               <div class="friendlist" lid=<?=$group_id?> id="friendlist1">
                    <?php
                        $db=new ezSQL_mysql();
                        $sql1="select userinfo.id,userinfo.userNickname,userinfo.userHeadImage,userinfo.user_qianming,friendsinfo.friendNotename,userinfo.userState from userinfo,friendsinfo where is_active = 1 AND userinfo.id=friendsinfo.friendid and friendsinfo.friend_group =".$group_id." and friendsinfo.userid='".$_SESSION["onlineID"]."'" ;
                        $res1=$db->get_results($sql1);
                        $html="";
                        $html1="";
                        if($res1){
                            foreach($res1 as $friend){
                                $cuheadimg=$friend->userHeadImage;
                                $cunickname=$friend->userNickname;
                                $cunotename=$friend->friendNotename;
                                $qianming=$friend->user_qianming;
                                $cuid=$friend->id;
                                if($friend->userState=="online"){
                                    $html.="<li class='friendli' fid='$cuid' username='$cunotename''>";
                                    $html.="<div class='friendLiL'>";
                                    $html.="<a ><img class='fheadimg zaixian' ppid='$cuid' src='$cuheadimg'/> </a>";
                                    $html.="<div class='redcircle'></div>";
                                    $html.="</div>";
                                    $html.="<div class='friendLiR'>";
                                    $html.="<div class='webname'>";
                                    $html.="$cunotename";
                                    $html.="<span>($cunickname)</span>";
                                    $html.="</div>";
                                    $html.="<div class='shuoshuo'>";
                                    $html.="<span>".$qianming."</span>";
                                    $html.="</div>";
                                    $html.="</div>";
                                    $html.="<div class='renew_group'>";
                                    $html.="<div class='renew_btn renew_groupL'>+</div>";
                                    $html.="<div class='renew_btn renew_groupR'>-</div>";
                                    $html.="</div>";
                                    $html.="<div class='delefriend_btn'>删除</div>";
                                    $html.="</li>";
                                }
                                else{
                                    $html1.="<li class='friendli' fid='$cuid' username='$cunotename''>";
                                    $html1.="<div class='friendLiL'>";
                                    $html1.="<a ><img class='fheadimg lixian' src='$cuheadimg' ppid='$cuid'/> </a>";
                                    $html1.="<div class='redcircle'></div>";
                                    $html1.="</div>";
                                    $html1.="<div class='friendLiR'>";
                                    $html1.="<div class='webname'>";
                                    $html1.="$cunotename";
                                    $html1.="<span>($cunickname)</span>";
                                    $html1.="</div>";
                                    $html1.="<div class='shuoshuo'>";
                                    $html1.="<span>".$qianming."</span>";
                                    $html1.="</div>";
                                    $html1.="</div>";
                                    $html1.="<div class='renew_group'>";
                                    $html1.="<div class='renew_btn renew_groupL'>+</div>";
                                    $html1.="<div class='renew_btn renew_groupR'>-</div>";
                                    $html1.="</div>";
                                    $html1.="<div class='delefriend_btn'>删除</div>";

                                    $html1.="</li>";
                                }
                                // $html.="<li class='friendli'><img class='fheadimg' src='$cuheadimg'/></li>";
                            }
                        }
                        echo "$html";
                        echo "$html1";
                    ?>
                </div>
                <?php
                    }
                }
                else{
                    ?>
                    <div class="friendlistkind list1"?> 
                    <div class="friendlistkindL"></div>
                    <div class="friendlistkindR">我的好友</div>
                    <span class="onlinenumber">0</span>
                <?php
                    }
                ?>
                <div class="friendlistkind thenewgroup">
                    <div class="thenewgroupL">
                        <input class="inputgroup"></input>
                    </div>
                    <div class="thenewgroupR">确定添加</div>
                </div>

                <div class="friendlistkind">
                    <div class="addnewgroup">新建分组</div>
                </div>

                <div class="friendlistkind thedelegroup">
                    <div class="thedelegroupL">
                        <input class="inputgroupdele"></input>
                    </div>
                    <div class="thedelegroupR">确定删除</div>
                </div>
                <div class="friendlistkind">
                    <div class="delegroup">删除分组</div>
                </div>
    <!-- 我的好友 end-->
    <!-- 我的好友 begin-->
    			</div>
    <!-- qq窗体下面的四个按钮 -->
<!--     			<div class="friendbody" id="qunzu" FBid="2">
    				<li class="friendli"  username="淮师群">
    					<div class="friendLiL">
    						<a href=""><img src="Images/head/1.jpg"> </a>
    					</div>
    					<div class="friendLiR">
    						<div class="webname">
    							淮师群
    							<span>(fisher)</span>
    						</div>
    						<div class="shuoshuo">
    							<span>[在线]别叫我大哥。</span>
    						</div>
    					</div>
    				</li>
    			</div>

    			<div class="friendbody" id="taolunzu" FBid="3">
    				<li class="friendli" username="兄弟会">
    					<div class="friendLiL">
    						<a href=""><img src="Images/head/1.jpg"> </a>
    					</div>
    					<div class="friendLiR">
    						<div class="webname">
    							兄弟会
    							<span>(fisher)</span>
    						</div>
    						<div class="shuoshuo">
    							<span>[在线]别叫我大哥。</span>
    						</div>
    					</div>
    				</li> 
    			</div> -->
			</div>

			<div class="BBottom" BID="1" id="huihua">
						
			</div>
			<div class="BBottom" BID="3" id="faxian">
				<div class="friendArea">
                    <?php 
                        $db=new ezSQL_mysql();
                        $sql_user="select friendid from friendsinfo where is_active=1 AND userid = ".$userid;
                        $userIds=$db->get_results($sql_user);
                        $userIdStr="";
                        if($userIds){
                            foreach( $userIds as $key =>$val){
                                $userIds[$key]=$val->friendid;
                            }
                            foreach ($userIds as $key => $value){
                                $userIdStr.= $value.",";
                            }
                        }
                        // $userIdStr=trim($userIdStr,",");
                        $userIdStr.=$userid;
                        $sql_new_friend="SELECT userinfo.userNickname,userinfo.id,userinfo.userNickname,userinfo.userHeadImage FROM userinfo where id not in (".$userIdStr.")";
                        $res_new_friend=$db->get_results($sql_new_friend);
                    foreach($res_new_friend as $keynew =>$valnew){
                        $valnew=(array)$valnew;
                        $imageurl=$valnew["userHeadImage"];
                    ?>
		    <div class="newfriend" chosed="false">
                       <img src="<?php echo $imageurl;?>" class="newfriendImg"></img>
                       <span class="friend_nickname"><?=$valnew["userNickname"]?></span>
                       <span class="friend_id"><?=$valnew["id"]?></span>
                    </div>
                    <?php
                        }
                    ?>
				</div>
				<div class="btnaddnew">确定添加</div>
			</div>
			<div class="BBottom" BID="4" id="shezhi">
                <div class="logout">退出账号</div>
                <div class="titleR">个性换肤</div>
			</div>

			<div class="qqbottom">
				<li class="qqbottomli Backcolorclass" id="qqbottomli1" BLIid="1">
					<div class="qqbottomlipic" id="qqbottomli1pic"></div>
					<span class="qqbottomspan" id="qqbottomspan1">会话记录</span>
				</li>
				<li class="qqbottomli Backcolorclass" id="qqbottomli2" BLIid="2">
					<div class="qqbottomlipic" id="qqbottomli2pic"></div>
					<span class="qqbottomspan" id="qqbottomspan2">好友列表</span>
				</li>
				<li class="qqbottomli Backcolorclass" id="qqbottomli3" BLIid="3">
					<div class="qqbottomlipic" id="qqbottomli3pic"></div>
					<span class="qqbottomspan" id="qqbottomspan3">发现好友</span>
				</li>
				<li class="qqbottomli Backcolorclass" id="qqbottomli4" BLIid="4">
					<div class="qqbottomlipic" id="qqbottomli4pic"></div>
					<span class="qqbottomspan" id="qqbottomspan4">设置</span>
				</li>
			</div>	
		</div>
		<div class="bodyAR">
			<ul class="minimenu">
			</ul>	
		</div>			
</body>
</html>
