$(function(){
	/***************************修改用户基本信息 begin*********************************/
    //编辑基本信息按钮点击事件
    $("#edit_info").click(function(){
    	$("#edit_info").addClass("hide");
    	$("#save_info").addClass("show");
    	$("#base_info ul.infos li span").css("display","none");;
    	$("#base_info ul.infos li input").css("display","inline");
    });
    //异步检测昵称是否可以使用
    var nickCanUse=true;
    $("#usernick input").blur(function(){
    	if($("#usernick input").val().length == 0){
    		alertMsg("昵称不能为空");
    		return;
    	}
    	$.post(
	        '/tiaozaobang/Home/User/checkUserNick',
	        {usernick : $("#usernick input").val()},
	        function(res) {
	            if(res=='false'){
		    		$("#usernick").find("p").text("该昵称已被占用");
		    		nickCanUse=false;
		    	}else{
					$("#usernick").find("p").text('');
					nickCanUse=true;
		    	}
	        }
	    );
    });
    $("#save_info").click(function(){
    	var usernick=$("#usernick input").val();
    	var phone = $("#phone").val();
	    var qq = $("#qq").val();
	    if(usernick.length == 0){
    		alertMsg("昵称不能为空");
    		return;
    	}
	    if (phone.length == 0 && qq.length == 0){
	        alertMsg("为方便买家能联系您，请至少留下一个联系方式，亲！^_^ ");
	        return;
	    }
	    if(!nickCanUse){
	    	alertMsg("该昵称已被占用，换个姿态吧，亲！^_^");
	    	return;
	    }else if (phone.length != 0 && Valid_Form.validTel(phone)==false) {
	    	alertMsg("您输入的手机号码格式貌似不对哦，请仔细检查，亲！^_^");
	    	return;
	    }else if (qq.length != 0 && Valid_Form.validQQ(qq)==false) {
	    	alertMsg("您输入的QQ号码格式貌似不对哦，请仔细检查，亲！^_^");
	    	return;
	    }else{
		    $("#circular-loading").removeClass('hidden');
		    $.post(
		        '/tiaozaobang/Home/User/updateBaseInfo',
		        {usernick : usernick,phone : phone, qq : qq},
		        function(res) {
		            $("#circular-loading").addClass('hidden');
		            if (res == 'fail') {
		                alertMsg("更新基本信息失败！");
		            }else{
		            	window.location.reload();
		            }
		        }
		    );
		}
    });

    /***************************修改用户基本信息 end*********************************/

    /***************************修改用户密码 begin*********************************/
    var oldPwd=false,newPwd=false,ensurePwd=false;
    $("#changepwd").click(function(){
    	$("#wrap_changepwd").slideDown();
    });
    $("#exit").click(function(){
    	$("#wrap_changepwd").slideUp();
    	$("#wrap_changepwd input").val('');
    	$("#wrap_changepwd p").text('');
    });
    //异步检测原密码输入是否正确
    $("#oldPwd input").blur(function(){
    	$.post(
	        '/tiaozaobang/Home/User/checkOldPwd',
	        {oldPwd : $("#oldPwd input").val()},
	        function(res) {
	            if(res=='false'){
		    		$("#oldPwd").find("p").text("原密码输入不正确");
		    		oldPwd=false;
		    	}else{
					$("#oldPwd").find("p").text('');
					oldPwd=true;
		    	}
	        }
	    );
    });
    $("#newPwd input").keyup(function(){
    	if(Valid_Form.validPwd($(this).val())==false){
    		$("#newPwd").find("p").text("密码可由6-20位数字、英文字母、下划线组成");
    		newPwd=false;
    	}else{
			$("#newPwd").find("p").text('');
			newPwd=true;
    	}
    });
    $("#ensurePwd input").keyup(function(){
    	if($(this).val()!=$("#newPwd input").val()){
    		$("#ensurePwd").find("p").text("两次密码输入不一致，请重新输入");
    		ensurePwd=false;
    	}else{
			$("#ensurePwd").find("p").text('');
			ensurePwd=true;
    	}
    });
    $("#ensure").click(function(){
    	if (oldPwd && newPwd && ensurePwd) {
    		$.post(
		        '/tiaozaobang/Home/User/updatePwd',
		        {newPwd : $("#newPwd input").val()},
		        function(res) {
		            if(res=='ok'){
			    		$("#wrap_changepwd").slideUp();
    					$("#wrap_changepwd input").val('');
    					alertMsg("密码修改成功");
			    	}else{
						alertMsg("密码修改失败");
			    	}
		        }
		    );
    	}
    });
    /***************************修改用户密码 end*********************************/
});