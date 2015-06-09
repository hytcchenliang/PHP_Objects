$(function(){

	$(".tijiaozhuce").click(function(){
			    nickname=$(".username").val();
			var userpwd=$(".userpwd").val();
			var checkuserpwd=$(".sureuserpwd").val();
			var pattname=new RegExp("^[^']{1,10}$");
			var pattpwd=new RegExp("^[0-9a-zA-Z]{6,25}$");
			var checknickname=pattname.test(nickname)
			var checkpwd=pattpwd.test(userpwd)
			// alert(nickname);
			if (!checknickname||nickname=="") {
				$(".nameerror").html("昵称不可用，请重新输入！");
			}else{
				$(".nameerror").html("");
				if(!checkpwd){
					$(".pwderror").html("密码不可用，请重新输入!");
				}else{
					$(".pwderror").html("");
					if(userpwd!==checkuserpwd){
						$(".sureerror").html("两次输入的密码不一致！");
				    }else{
				    	$(".sureerror").html("");
				    	$.ajax({
						url:"ajax.php",
						type:"POST",
						async:"false",
						data:{flag:'zhuce',username:nickname,usermima:userpwd,sureusermima:checkuserpwd},
							success:function(res){
								// givenewuser()；
							}
					   });
				    $(".username").val("");
				    $(".userpwd").val("");
				    $(".sureuserpwd").val("");
				    givenewuser();
				    }
				}
			}

	});
});
//注册
var nickname;
//注册成功获取qq号码
 function givenewuser(){
	$.ajax({
	url:"ajax.php",
	type:"POST",
	data:{flag:'newuser'},
	success:function(res){
		$(".newnumber").html("恭喜您注册成功！请记住您的QQ号码："+res);
	}
	});
}