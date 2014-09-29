<?php
	include_once "ez_sql_core.php";
	include_once "ez_sql_mysql.php";
	session_start();
	$userid=isset($_POST["username"])?$_POST["username"]:""; 
	$userpwd=isset($_POST["password"])?$_POST["password"]:""; 
	$onuserid=isset($_SESSION["onlineID"])?$_SESSION["onlineID"]:""; 
	$onusername=isset($_SESSION["onlinename"])?$_SESSION["onlinename"]:""; 
	if($userid!=""&&$userpwd!=""){
		$db=new ezSQL_mysql();
		$sql="select * from userinfo where id='" . $userid . "' and userpwd='" . $userpwd . "'";
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
   		}
   }
?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<link class="yangshi" rel="stylesheet" type="text/css" href="css/index0.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="js/index.js"></script>
	
</head>
<body>
	<div class="bodyA">
			<div class="biaoqing">
				<li class="biaoLi" biaoqingId="[微笑]">1</li>
				<li class="biaoLi" biaoqingId="[撇嘴]">2</li>
				<li class="biaoLi" biaoqingId="[色]">3</li>
				<li class="biaoLi" biaoqingId="[发呆]">4</li>
				<li class="biaoLi" biaoqingId="[得意]">5</li>
				<li class="biaoLi" biaoqingId="[流泪]">6</li>
				<li class="biaoLi" biaoqingId="[害羞]">7</li>
				<li class="biaoLi" biaoqingId="[闭嘴]">8</li>
				<li class="biaoLi" biaoqingId="[睡]">9</li>
				<li class="biaoLi" biaoqingId="[大哭]">10</li>
				<li class="biaoLi" biaoqingId="[尴尬]">11</li>
				<li class="biaoLi" biaoqingId="[大怒]">12</li>
				<li class="biaoLi" biaoqingId="[调皮]">13</li>
				<li class="biaoLi" biaoqingId="[呲牙]">14</li>
				<li class="biaoLi" biaoqingId="[惊讶]">15</li>
				<li class="biaoLi" biaoqingId="[难过]">16</li>
				<li class="biaoLi" biaoqingId="[酷]">17</li>
				<li class="biaoLi" biaoqingId="[冷汗]">18</li>
				<li class="biaoLi" biaoqingId="[抓狂]">19</li>
				<li class="biaoLi" biaoqingId="[吐]">20</li>
				<li class="closebiao" >21</li>
			</div>
			<div class="logout">注销</div>
			<div class="myinfo">
				<div class="myinfotop">
					<div class="myinfotopL">
						<img src="<?php echo $mypic;?>" class="myheadimg">
					</div>
					<div class="myinfotopR">
						<span class="namespan" userId="<?php echo $userid;?>"><?php echo $myname;?></span>
						<br>
						<span class="shuoshuospan">温暖谁</span>
					</div>
				</div>
				<div class="myinfobottom">
					<li id="li1"></li>
					<li id="li2"></li>
					<li id="li3"></li>
					<li id="li4"></li>
					<li id="li5"></li>
					<li id="li6"></li>
					<li id="li7"></li>
					<li id="li8"></li>
					<li id="li9"></li>
				</div>
			</div>
			<div class="qqdiv">
				<div id="qqtitle" class="Backcolorclass">
				<div class="titleL">会话</div>
				<div class="titleR">换肤</div>
				

				</div>

				<div class="BBottom" BID="2" id="BBottom2">
				<div class="fenzu">
					<div class="fenzuIn" FIid="1">
						<li>朋友</li>
					</div>
					<div class="fenzuIn" FIid="2">
						<li>群</li>
					</div>
					<div class="fenzuIn" FIid="3">
						<li>讨论组</li>
					</div>
				</div>
				<div class="friendbody" id="pengyouzu" FBid="1">
<!-- 我的好友 begin-->
					<div class="friendlistkind list1" kid="1" >
						<div class="friendlistkindL"></div>
						<div class="friendlistkindR">朋友</div>
						<span class="onlinenumber">3/8</span>
					</div>
					<div class="friendlist" lid="1" id="friendlist1">
							<?php
								$db=new ezSQL_mysql();
								$sql1="select userinfo.id,userinfo.userNickname,userinfo.userHeadImage,friendsinfo.friendNotename,userinfo.userState from userinfo,friendsinfo where userinfo.id=friendsinfo.friendid and friendsinfo.userid='".$_SESSION["onlineID"]."'";
								$res1=$db->get_results($sql1);
								$html="";
								$html1="";
								if($res1){
									foreach($res1 as $friend){
										$cuheadimg=$friend->userHeadImage;
										$cunickname=$friend->userNickname;
										$cunotename=$friend->friendNotename;
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
											$html.="<span>我是hellokitty！</span>";
											$html.="</div>";
											$html.="</div>";
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
											$html1.="<span>我是hellokitty！</span>";
											$html1.="</div>";
											$html1.="</div>";
											$html1.="</li>";
										}
										// $html.="<li class='friendli'><img class='fheadimg' src='$cuheadimg'/></li>";
									}
								}
								echo "$html";
								echo "$html1";
								?>
					</div>
<!-- 我的好友 end-->
<!-- 我的好友 begin-->
					<div class="friendlistkind list2" kid="2">
						<div class="friendlistkindL"></div>
						<div class="friendlistkindR">大学同学</div>
						<span class="onlinenumber">3/30</span>
					</div>
					<div class="friendlist" lid="2">
						
			    </div>
			</div>
<!-- qq窗体下面的四个按钮 -->
			<div class="friendbody" id="qunzu" FBid="2">
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
			</div>
			</div>

			<div class="BBottom" BID="1" id="huihua">
						
			</div>
			<div class="BBottom" BID="3" id="faxian">

			</div>
			<div class="BBottom" BID="4" id="shezhi">

			</div>

			<div class="qqbottom">
				<li class="qqbottomli Backcolorclass" id="qqbottomli1" BLIid="1">
					<div class="qqbottomlipic" id="qqbottomli1pic"></div>
					<span class="qqbottomspan" id="qqbottomspan1">会话</span>
				</li>
				<li class="qqbottomli Backcolorclass" id="qqbottomli2" BLIid="2">
					<div class="qqbottomlipic" id="qqbottomli2pic"></div>
					<span class="qqbottomspan" id="qqbottomspan2">联系人</span>
				</li>
				<li class="qqbottomli Backcolorclass" id="qqbottomli3" BLIid="3">
					<div class="qqbottomlipic" id="qqbottomli3pic"></div>
					<span class="qqbottomspan" id="qqbottomspan3">发现</span>
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
