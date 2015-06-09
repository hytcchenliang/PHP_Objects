<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<div class="top">Smart Chat tools</div>
	<div class="logbody">
		<form action="index.php" method="post">
			<div class="logbodyL">
				<div class="logbodyLtop">安全登录防止盗号</div>
				<div class="saomiao">
					<div class="soamiaoIn">
						<!-- <div class="soamiaoInIn"></div> -->
					</div>
				</div>
				<span class="spansaomiao">Smart Chat tools手机版扫描二维码</span>
			</div>
			<div class="logbodyR">
				<div class="logbodyRtop">帐号密码登录</div>
				<span class="error">帐号和密码不匹配！</span>
				<div class="yonghu">
					<input name="username" type="text" class="userid"/>
				</div>
				<div class="mima">
					<input name="password" type="password" class="userpwd"/>
				</div>	
				<input type="submit" id="tijiao" value="登 录">
				<a id="btnzhuce" href="zhuce.php">注册</a>
				<span class="spanjoin">感谢您留步参与Smart Chat tools的试验</span>
			</div>
		</form>
	</div>
	<div class="phoneqq">使用手机访问Smart Chat tools</div>
	<?php
	   session_start();
	   unset($_SESSION["onlineID"]);
	   unset($_SESSION["onlinename"]);
	   $geterror=isset($_GET["error"])?$_GET["error"]:""; 
	   if($geterror=="wronglogin"||$geterror=="needlogin"){
		   	$js='showerror()';
		    echo " <script> ". $js .";</script>";
	   }
	   else{
	   		$js='hideerror()';
		    echo " <script> ". $js .";</script>";
	   }
	?>
</body>
</html>
