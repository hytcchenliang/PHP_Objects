<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>注册用户</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/zhuce.css">
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/zhuce.js"></script>
</head>
<body>
    <div class="top"></div>
    <div class="mainbody">
    	<div class="MBL"></div>
    	<div class="MBR">
            <div class="MBRIn">
                <li class="infoLi">
                    <div class="Lip1">昵称</div>
                    <div class="Lip2">
                        <input type="text"  class="input username" />
                    </div>
                    <div class="Lip3 nameerror"></div>
                </li>
                <li class="infoLi">
                    <div class="Lip1">密码</div>
                    <div class="Lip2">
                        <input type="text"  class="input userpwd" /> 
                    </div>
                    <div class="Lip3 pwderror"></div>
                </li>
                <li class="infoLi">
                    <div class="Lip1">确认密码</div>
                    <div class="Lip2">
                        <input type="text"  class="input sureuserpwd" /> 
                    </div>
                     <div class="Lip3 sureerror"></div>
                </li>
                <li class="infoLi btnli">
                   <div class="tijiaozhuce" >立即注册</div>
                </li>
                <li class="infoLi btnli">
                   <div class="newnumber" ></div>
                </li>
            </div>
    		<!-- <form action="ajax.php"  method="post">
    			<li class="infoLi">
    				<div class="Lip1">昵称</div>
    				<div class="Lip2">
    					<input type="text" name="nicheng" class="input username" />
    				</div>
    			</li>
                <li class="infoLi">
                    <div class="Lip1">密码</div>
                    <div class="Lip2">
                        <input type="text" name="mima" class="input userpwd" /> 
                    </div>
                </li>
                <li class="infoLi">
                    <div class="Lip1">确认密码</div>
                    <div class="Lip2">
                        <input type="text" name="suremima" class="input sureuserpwd" /> 
                    </div>
                </li>
                <li class="infoLi btnli">
                   <input type="submit" class="tijiaozhuce" value="立即注册" />
                </li>
    		</form> -->
    	</div>
    </div>
</body>
</html>