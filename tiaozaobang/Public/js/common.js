$(function(){	
	/*********登陆用户下拉菜单*********/
	$("#have_login").hover(function(){
		$("#user_fun").stop().slideDown();
	},function(){
		$("#user_fun").stop(true,true).slideUp();
	});

	/***********************用户登录注册窗口*******************/
	$(".button[data-type='l']").click(function(){
		$(".login-cover").show(1000);
	});
	$(".button[data-type='r']").click(function(){
		$(".reg-cover").slideDown(1000);
	});
	$(".login-cover").click(function(){$(".login-cover").hide(1000);});
	$(".reg-cover").click(function(){$(".reg-cover").slideUp(1000);});

	$(".reg").click(function(){
		$(".reg-cover").show();
		$(".login-cover").hide();
	});
	$(".log").click(function(){
		$(".login-cover").show();
		$(".reg-cover").hide();
	});

	/******退出登录******/
	$("#exit_login").click(function(){
		logout();
	});
	/******提交登录******/
	$(".login-wr").find(".submit").click(function(){
		login();
	});
	/******提交注册******/
	$(".reg-wr").find(".submit").click(function(){
		regist();
	});
	/*********浏览器窗口尺寸发生变化时*********/
	$(window).resize(function(){
	   if ($(window).width()<960) {
	   		$(".header-main").css("width","960px");
	   }else if($(window).width()<1280){
	   		$(".header-main").css("width","auto");
	   }else{
	   		$(".header-main").css("width","80%");
	   };
	});
	
	/*********回到顶部*********/
	if($(".return-to-top").length>0){
        returnToTop();
    };
    
    /********* 页面收缩 *******/
    $(window).scroll(function() {
        pageScroll();
    });

    $("#remind-msg").click(function(){
    	$(this).hide();
    });
    //注册时检测用户名是否已被注册
    $("#uname").blur(function(){
        var username = $("#uname").val();
        $.post(
            '/tiaozaobang/Home/Login/checkUsername',
            {username : username},
            function(res) {
                if(res=='true'){
                    alertMsg("该用户名已被注册，换一个姿态吧，亲！");
                    return;
                }else{
                    return;
                }
            }
        );
    });
    //注册时检测用户邮箱是否已被使用
    $("#email").blur(function(){
        var email = $("#email").val();
        $.post(
            '/tiaozaobang/Home/Login/checkUserEmail',
            {email : email},
            function(res) {
                if(res=='true'){
                    alertMsg("该邮箱已被使用，想一想是不是您曾经已经加入我们了，亲！");
                    return;
                }else{
                    return;
                }
            }
        );
    });
    //通过轮询的方式异步推送未读消息
    unreadMessagePush();
});

/**************** 回到顶部 *********************/
function returnToTop(){
    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('.return-to-top').fadeIn(100);
        } else {
            $('.return-to-top').fadeOut(100);
        }
    });

    $('.return-to-top').click(function(event) {
        event.preventDefault();
        $(".return-to-top").addClass("move");
        $('html, body').animate({
            scrollTop: 0
        }, 500, function() {
            $(".return-to-top").hide();
            $(".return-to-top").removeClass("move");
        });
    });
}

/**************** 页面收缩 *********************/
function pageScroll(){
    header = $("header"),
    nav = $("nav");
    var scroll_top;
    if(this.scrollY !== undefined){
        scroll_top = this.scrollY;
    }else{
        scroll_top = document.documentElement.scrollTop;
    }
    if(scroll_top > 0) {
        $(header).addClass("scroll");
        $(nav).addClass("scroll");
        $(".nav-icons").addClass("hidden");
    }
    else{
        $(header).removeClass("scroll");
        $(nav).removeClass("scroll");
        setTimeout(function(){
            $(".nav-icons").removeClass("hidden");
        },150);
    }
}

/**************** 消息提示框 *********************/
function alertMsg(text){
	$("p.msg-text").html(text);
	$("#remind-msg").show(500);
}
/**************** 登录 *********************/
function login(){
    var username = $("#user-name").val();
    var password = $("#pw").val();
    var loginstyle='username';//登录方式 username:使用用户名登录 email:使用密码登录
    if (username.length == 0 || password.length == 0)
    {
        alertMsg("账号和密码不能为空");
        return;
    }
    if(Valid_Form.validName(username)==false&&Valid_Form.validEmail(username)==false){
    	alertMsg("用户名格式不正确");
    	return;
    }else if(Valid_Form.validName(username)==true){
        loginstyle='username';
    }else{
        loginstyle='email';
    }
    if(Valid_Form.validPwd(password)==false){
        alertMsg("密码格式不正确");
        return;
    }
    $("#circular-loading").removeClass('hidden');
    $.post(
        '/tiaozaobang/Home/Login',
        {username : username, password : password,loginstyle : loginstyle},
        function(res) {
            $("#circular-loading").addClass('hidden');
            if (res == 'ok') {
                window.location.reload();
            }else{
            	alertMsg("用户名或密码错误");
            }
        }
    );
}
/**************** 退出登录 *********************/
function logout(){
    $.post(
        '/tiaozaobang/Home/Login/logout',
        {},
        function(res) {
            if (res == 'ok') {
                window.location.reload();
            }
        }
    );
}

/**************** 注册 *********************/
function regist(){
    var username = $("#uname").val();
    var email = $("#email").val();
    var password = $("#passw").val();
    var cpassw = $("#cpassw").val();
    
    if (username.length == 0 || email.length == 0 || password.length == 0 || cpassw.length == 0)
    {
        alertMsg("所有要求填写的信息都不能为空哦，亲！^_^ ");
        return;
    }
    if(Valid_Form.validName(username)==false){
    	alertMsg("用户名需为汉字、字母、数字或下划线,且不能超过25个汉字");
    	return;
    }else if (Valid_Form.validEmail(email)==false) {
    	alertMsg("您填写的邮箱格式不正确哦，亲！^_^");
    	return;
    }else if (Valid_Form.validPwd(password)==false) {
    	alertMsg("密码由20位以内的字母、数字或下划线组成");
    	return;
    }else if (password!=cpassw) {
    	alertMsg("两次密码输入不一致，请检查");
    	return;
    }else{
	    $("#circular-loading").removeClass('hidden');
	    $.post(
	        '/tiaozaobang/Home/Login/regist',
	        {username : username, password : password, email : email},
	        function(res) {
	            $("#circular-loading").addClass('hidden');
	            if (res == 'ok') {
                    window.location.href='/tiaozaobang/Home/User/school';
	            }else{
	            	alertMsg("注册失败了，亲！");
	            }
	        }
	    );
	}
}


////通过轮询的方式异步推送未读消息
function unreadMessagePush(){
    var userid=$("#userid").text();
    if(userid.length==0){
        return;
    }
    $.post(
        '/tiaozaobang/Home/User/unreadMessage',
        {userid : userid},
        function(res) {
            if(res==0){
                $(".person_message").css("visibility","hidden");
            }else{
                $(".person_message").css("visibility","visible");
            }
            $(".person_message").text(res);
        }
    );  
    setTimeout(unreadMessagePush,5000);
}

//表单验证
var Valid_Form={
	validName:function(value) {
        return /^[a-zA-Z0-9_\u4e00-\u9fa5]{1,25}$/.test(value);
    },
    validPwd:function(value) {
        return /^[a-zA-Z0-9_]{6,20}$/.test(value);
    },
    validEmail:function(value) {
        return /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/.test(value);
    },
    validQQ:function (value) {
        return /^[1-9][0-9]{5,11}$/.test(value);
    },
    validTel:function(value) {
        return /^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/.test(value);
    },
    validGoodTitle:function(value) {
        return /^[^']{1,25}$/.test(value);
    },
    validGoodDes:function(value) {
        return /^[^']{15,500}$/.test(value);
    },
    validPlace:function(value) {
        return /^[^']{1,50}$/.test(value);
    },
    validPrice:function(value) {
        return /^[0-9]{1,5}$/.test(value);
    },

};

/**
 * 统计字数
 * @param  字符串
 * @return 数组[当前字数, 最大字数]
 */
function check (str,maxnum) {
    var num = [0, maxnum];
    for (var i=0; i<str.length; i++) {
        //字符串不是中文时
        if (str.charCodeAt(i) >= 0 && str.charCodeAt(i) <= 255){
            num[0] = num[0] + 0.5;//当前字数增加0.5个
        } else {//字符串是中文时
            num[0]++;//当前字数增加1个
        }
    }
    return num;
}
