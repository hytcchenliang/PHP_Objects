$(function(){


	//前端输入格式验证
	$("#regform").validate({				
			rules: {
				username:{
					required:true,
					maxlength:20
				},
	            password: {
	                required: true,
	                minlength: 5
	            },
	            confirm_password: {
	                required: true,
	                minlength: 5,
	                equalTo: "#password"
	            },
	            usermail:{
	            	required:true,
	            	email:true
	            }
        	},
        	messages: {
        		username:{
					required:"请输入用户名",
					maxlength:"用户名不能大于20位"
				},
	            password: {
	                required: "请填写密码",
	                minlength: "确认密码不能小于{0}个字符"
	            },
	            confirm_password: {
	                required: "请确认密码",
	                minlength: "确认密码不能小于{0}个字符",
	                equalTo: "两次输入密码不一致嘛"
	            },
	            usermail:{
	            	required:"请填写邮箱",
	            	email:"请输入正确的邮箱地址"
	            }
        	}
	});

	//动态验证用户名是否被占用
	$("#username").keyup(function(){

		var username = $(this).val().toString();
		if (username!="") {
			$.ajax({
				type : "POST",
				url : checkUrl,
				data : {username:username},
				success : function(res){
					//用户名已存在
					if (res.status==1) {
						$("#checkuser").html(res.msg);
						$("#checkuser").css({"color":"#ff0000"});
						$(".ok_btn").attr("disabled",true);
					}
					//用户名不存在
					else{
						$("#checkuser").html(res.msg);
						$("#checkuser").css({"color":"#66ff00"});
						$(".ok_btn").attr("disabled",false);
					}									
				}
			});		
		}
		else{
			$("#checkuser").css({"color":"#ff0000"});
			$("#checkuser").html("用户名不能为空！");
			$(".ok_btn").attr("disabled",true);
		}
	});

})