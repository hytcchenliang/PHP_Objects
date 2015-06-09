<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="Shortcut icon" href="http://passport.feng.com/favicon.ico">   
<link rel="Bookmark" href="http://passport.feng.com/favicon.ico">
<title>注册 - 踢球者会员中心</title>
<link rel="stylesheet" type="text/css" href="/kicker/Public/style/ss_common.css" />
<link type="text/css"  rel="stylesheet" href="/kicker/Public/style/base.css"/>
<link type="text/css"  rel="stylesheet"  href="/kicker/Public/style/reg.css" />
<script type="text/javascript" src="/kicker/Public/JS/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/kicker/Public/JS/jquery.validate.min.js"></script>
<script type="text/javascript" src="/kicker/Public/JS/reg.js"></script>
<script type="text/javascript">
		var checkUrl = '<?php echo U("Home/Reg/checkUser",'','');?>'
</script>


</head>
<body>
	<!-- Container -->
	<div id="container" class="container login_container">
		<div id="content" class="content register_content">
			<div class="inner register_inner">
				<h1>用户注册</h1>
				<div class="register_panel" id="register_panel">
					<div class="tabs">
						<ul>
							<li><a href="#email_register" class="current">用户注册</a></li>
						</ul>
					</div>
					<div id="email_register" class="login_form email_register_form">
						<div class="noform">
							<ul>
								<form method="post" action="<?php echo U('Home/Reg/AddUser');?>" id="regform">
									<li class="pic"><span class="user_pic"><img src="/kicker/Public/images/noavatar_middle.gif" height="132" width="132" alt="" name="user_face" id="user_face" /></span>
									<input type="hidden" name="face" id="face" /><a href="javascript:;" class="edit" title="上传头像"><span>上传头像</span><input type="file" name="face_file" id="face_file" /></a>
									</li>
									<li><span class="txt"><i class="user"></i><input type="text" placeholder="用户名" name="username" id="username" autocomplete="off"  /><span id="checkuser"></span></span>
									</li>							
									<li><span class="txt"><i class="email"></i><input type="email" placeholder="Email" name="usermail" id="email" autocomplete="off"/><span class="right_input_icon hide"></span></span>
									</li>
									<li><span class="txt"><i class="pwd"></i><input type='password' placeholder="密码" name="password" id="password" autocomplete="off" oncopy="return false" onpaste="return false"/><span class="right_input_icon hide"></span></span>
									</li>
									<li><span class="txt"><i class="pwd"></i><input type='password' placeholder="确认密码" name="confirm_password" id="confirm_password" autocomplete="off" oncopy="return false" onpaste="return false"/><span class="right_input_icon hide"></span></span>
									</li>																
									<li class="btns"><button class="btn ok_btn" type="submit"><span>注册<i></i></span></button>
									</li>
								</form>
							</ul>
							<div class="ext_links"><a href="<?php echo U("Home/login/index");?>"><i class="arrow"></i>立即登录</a></div>
						</div>
					</div>				
				</div>				
			</div>
		</div>
		<!-- Footer -->
<div class="footer">
	<div class="copyright"><p>Copyright 2007-2014  &copy; Joyslink Inc. All rights reserved 保留所有权利</p></div>
</div>	</div>
	
	<!--头像上传弹出框-->
	<div class="upload_header">
		<div class="upload_header_mask"></div>
		<div class="head_wrap">
			<h1>调整你的照片位置和尺寸<a href="javascript:;" title="关闭">关闭</a></h1>
			<iframe frameborder="no" border="0" framespacing="0"  style=" border:none; height:370px; width:350px;"></iframe>
			<div class="header_cut">
				<button class="cut_yes"><span>确定</span></button>
				<button class="cut_no"><span>取消</span></button>
			</div>
			<div class="mask hide">
				<div class="maskAlpha"></div>
				<i></i>
			</div>
		</div>
	</div>
	
	<textarea id="email_rigster_pwd_tmpl" class="tmpl" style="display:none">
		<input type='password' name="password" id="password" autocomplete="off" oncopy="return false" onpaste="return false"/>
	</textarea>
	<textarea id="phone_rigster_pwd_tmpl" class="tmpl" style="display:none">
		<input type='password' name="password" id="password_phone" autocomplete="off" oncopy="return false" onpaste="return false"/>
	</textarea>


<!-- <script type="text/javascript" src="js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="common_assets/js/sso_login.js"></script> -->
<script type="text/javascript" >
function ds_confirm(content,yesText,noText,onyes,onno,onhide){ds.dialog({id : 'ds_dialog_confirm',fixed : true,left : '50%',top : '40%',title : '消息确认',content : content,onyes : onyes ,onhide : onhide,onno : onno,yesText : yesText,noText : noText});}
function showBtnLoading(){$('.commonBtn').parent().addClass('loading_mask');}
function hideBtnLoading(){$('.commonBtn').parent().removeClass('loading_mask');}
function doJump(){
	$.ajax({
		type:'post',
		url: "/index.php?r=user/GetJumpUrl",
		data:{},
		dataType:"json",
		cache: false,
		async: true,
	    success: function(data){
	    	if(typeof data.status == 'string' && data.status == 'success'){
	    		$("#syn_div").html(data.info.syn_str);
	    		setTimeout(function(){
	    			if(data.info.link==location.href){
	    				location.href = './';;
	    			}else{
	    				location.href = data.info.link;
	    			}
				}, data.info.wait);
	   	   	}else{
	   	   	}
	    },
	    error:function(){
	    	alert("服务器繁忙，请稍候！");
	    }
	});
}
jQuery.easing.easeOutBack = function(x, t, b, c, d, s){ if (s == undefined) s = 1.70158; return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;};
</script>


	<script type="text/javascript">
	//Register Form effect (Radio & Select)
	jQuery(function($){
		$('.login_form').baseFormHandle();
		$('.login_form select').renderSelect();
		$('input[name=gender]').renderRadio();

		var focusTimer, shell = $('#register_panel');
		shell.delegate('.tabs a', 'click', function(e){
			e.preventDefault();
			unbindAll();
			
			var self = $(this), id = self.attr('href').slice(1);
			shell.find('.tabs a').removeClass('current');
			self.addClass('current');

			shell[0].className = 'register_panel ' + id;
			
			clearTimeout(focusTimer);
			focusTimer = setTimeout(function(){
				//$('#' + id).find('input[type=text]').eq(0).focus();
			}, 640);

			$.hideAllErrorTips();
			bindAll();
		});

		focusTimer = setTimeout(function(){
			if(location.hash.indexOf('mobile') > -1){
				shell.find('.tabs a').eq(1).trigger('click');
			}
		}, 160);
		
		bindAll();
		
		var xhr,p_xhr,m_xhr,c_xhr;
		function unbindAll(){
			if(xhr){
				xhr.abort();
			}
			if(p_xhr){
				p_xhr.abort();
			}
			if(m_xhr){
				m_xhr.abort();
			}
			
			$('#username,#password,#check_code,#phone_number,#mobile_code,#password_phone').unbind();
		}
		function bindAll(){
			
			$("#username").focus(function(){
				$(this).parents("li").next("li.hide").removeClass("hide");
			}).blur(function(){
				$(this).parents("li").next("li").addClass("hide");
			});
			
			$("#phone_number").focus(function(){
				$(this).parents("li").next("li.hide").removeClass("hide");
			}).blur(function(){
				$(this).parents("li").next("li").addClass("hide");
			});
			
			var mobileErrorStatus = $('#mobile_code_status')[0];
			
			$('#email_register').delegate('#username,#email,#password', 'blur', function(e){
				if(xhr){
					xhr.abort();
				}
				if( $(this).val()==""){
					$(this).next().removeClass('right_input_icon').addClass('error_input_icon').show();
					return;
				}
				var itemName =  $(this).attr("name");
				var gender = $("input[name=gender]:checked").val();
				var ajaxData = {"username":$('#username').val(),"email":$('#email').val(),"password":$('#password').val(),"check_code":$('#check_code').val(),"province":$('#province').val(),"city":$('#city').val(),"gender":gender,"face":$('#face').val()};
				xhr = $.ajax({
					type:'post',
					url: '/index.php?r=user/RegisterValidate',
					data:ajaxData,
					dataType:"json",
					cache: false,
					async: true,
			        success: function(data){
			        	xhr = null;
			        	if(typeof data.status == 'string' && data.status == 'success'){
			        		$.hideAllErrorTips();
			       	   	}else{
			       	   		var hasError = false;
				       	   	var status = data ? data.status : null;
			       	   		var errArr = data.info;
			       	   		var errItems = ""; 
			       	   		for(var i=0;i<errArr.length;i++){
			       	   			errItems = errArr[i];
			       	   			if(itemName==errItems.item){
			       	   				hasError = true;
					       	   		if(errItems.status=="username_exists"){
					       	   			var field = $('#username');
					       	   			field.showErrorTips('用户名“<em>'+ field.val() +'</em>”已被注册，<br>可能是您以前的账号，使用<a href="/index.php?r=user/recall"><b>帐户回忆系统</b></a>了解进一步信息》',true,10000000);
					       	   		}else{
						       	   		errField = $("#"+errItems.item);
						       	   		errField.showErrorTips(errItems.info);
					       	   		}
			       	   			}
			       	   		}
			       	   		if(!hasError){
			       	   			$("#"+itemName).next().removeClass('error_input_icon').addClass('right_input_icon').show();
			       	   			$.hideAllErrorTips();
			       	   		}else{
			       	   			$("#"+itemName).next().removeClass('right_input_icon').addClass('error_input_icon').show();
			       	   		}
			       	   	}
			        },
			        error:function(){
			        }
			     });
			});
			$('#email_register').delegate('#check_code', 'keyup', function(e){
				if(c_xhr){
					c_xhr.abort();
				}
				var code = $(this).val();
				if(code==""){
					$("#check_code_ico").hide();
					return;
				}
				c_xhr = $.ajax({
					type:'post',
					url: '/index.php?r=user/validateCode',
					data:{"check_code":code},
					dataType:"json",
					cache: false,
					async: true,
			        success: function(data){
			        	c_xhr = null;
			        	if(typeof data.status == 'string' && data.status == 'success'){
			        		$("#check_code_ico").removeClass('error_input_icon').addClass('right_input_icon').show();
			       	   	}else{
			       	   		$("#check_code_ico").removeClass('right_input_icon').addClass('error_input_icon').show();
			       	   	}
			        },
			        error:function(){
			        }
			     });
			});
			
			$('#mobile_register').delegate('#mobile_code,#password_phone', 'blur', function(e){	//#phone_number,
				if(m_xhr){
					m_xhr.abort();
				}
				if( $(this).val()==""){
					//$(this).next().removeClass('right_input_icon').addClass('error_input_icon').show();
					return;
				}
				var itemName =  $(this).attr("name");
				var ajaxData = {'phonenumber':$('#phone_number').val(),'phonekey':$('#mobile_code').val(),'password':$('#password_phone').val(),'face':$('#face_phone').val()};
				m_xhr = $.ajax({
					type:'post',
					url: '/index.php?r=user/PhoneRegisterValidate',
					data:ajaxData,
					dataType:"json",
					cache: false,
					async: true,
			        success: function(data){
			        	m_xhr = null;
			        	//$("#phone_number,#mobile_code,#password_phone").next().removeClass('error_input_icon').addClass('right_input_icon').show();
			        	mobileErrorStatus.className = '';
			        	$('#mobile_code_status').hide();
			        	if(typeof data.status == 'string' && data.status == 'success'){
			        		//$('#'+data.info.item).next().removeClass('error_input_icon').addClass('right_input_icon').show();
			        		$.hideAllErrorTips();
			       	   	}else{
			       	   		//$('#'+data.info.item).next().removeClass('right_input_icon').addClass('error_input_icon').show();
			       	   		if(data.info.item=="mobile_code"){
			       	   			$('#mobile_code_status').show();
			       	   			mobileErrorStatus.className = 'error';
			       	   		}
				       	   	if(data.status=="username_exists"){
			       	   			var field = $('#phone_number');
			       	   			field.showErrorTips('手机号“<em>'+ field.val() +'</em>”已被注册，<br>可能是您以前的账号，使用<a href="/index.php?r=user/recall"><b>帐户回忆系统</b></a>了解进一步信息》',true,10000000);
			       	   		}else{
				       	   		var field = $('#'+data.info.item);
				       	   		field.showErrorTips(data.info.info);
			       	   		}
			       	   	}
			        },
			        error:function(){
			        }
			     });
			});
			
		}
		
		//邮箱注册
		var email_register = $('#email_register');
		//验证码
		var codeImg = email_register.find('.code_img img');
		function toggleCodeImg(){
			var 
			src = codeImg.attr('longDesc'),
			postfix = src.indexOf('?') < 0 ? '?_=' : '&_=';
			codeImg.attr('src', src + postfix + (+new Date/5000).toFixed());
			if($('#check_code').val()!=""){
				$("#check_code_ico").removeClass('right_input_icon').addClass('error_input_icon').show();
			}
		}
		if(codeImg.length){
			codeImg.bind('click', toggleCodeImg);
			toggleCodeImg();
		}
		
		email_register.find('.ok_btn').click(function(e){
			e.preventDefault();
			submitRegister();
		});
		email_register.delegate('#username,#email,#password,#check_code', 'keydown', function(e){
			var codeOffset = e.keyCode - 39;
			if(e.keyCode==13){
				e.preventDefault();
				submitRegister();
			}
		});
		
		function showEmailRegisterLoading(){
			var registerBtn = email_register.find('.ok_btn');
			registerBtn.addClass('disabled');
			registerBtn.parents('.noform').addClass('loading');
			registerBtn.parents('.noform').find('input').attr('disabled',true);
		}
		
		function hideEmailRegisterLoading(){
			var registerBtn = email_register.find('.ok_btn');
			registerBtn.removeClass('disabled');
			registerBtn.parents('.noform').removeClass('loading');
			registerBtn.parents('.noform').find('input').attr('disabled',false);
		}

		function submitRegister(){
			$.hideAllErrorTips();
			
			if(!$("#ck_1").attr("checked")){
				return;
			}
			
			unbindAll();
			
			var errField;
			var fields = [$('#username'),$('#email'),$('#password'),$('#check_code')];
			var hasError = false; 
			for(var i=0;i<fields.length;i++){
				errField = fields[i];
				if(errField.val() == ''){
					errField.next().removeClass('right_input_icon').addClass('error_input_icon').show();
					if(!hasError){
						errField.showErrorTips(errField.parent().find('label').text() + ' 不能为空');
						hasError = true;
					}
				}
			};
			if(hasError){
				return;
			}
			
			//普通注册
			showEmailRegisterLoading();
			
			var gender = $("input[name=gender]:checked").val();
			var ajaxData = {"username":$('#username').val(),"email":$('#email').val(),"password":$('#password').val(),"check_code":$('#check_code').val(),"province":$('#province').val(),"city":$('#city').val(),"gender":gender,"face":$('#face').val()};
			$.ajax({
				type:'post',
				url: '/index.php?r=user/RegisterProcess',
				data:ajaxData,
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
		        	bindAll();
		        	if(typeof data.status == 'string' && data.status == 'success'){
		        		window.location = '/index.php?r=user/EmailActive';
		       	   	}else{
		       	   		hideEmailRegisterLoading();
		       	   		var status = data ? data.status : null;
		       	   		var errItems = data.info;
		       	   		
		       	   		if(status=="username_exists"){
		       	   			var field = $('#username');
		       	   			field.showErrorTips('用户名“<em>'+ field.val() +'</em>”已被注册，<br>可能是您以前的账号，使用<a href="/index.php?r=user/recall"><b>帐户回忆系统</b></a>了解进一步信息》',true,10000000);
		       	   		}else{
			       	   		errField = $("#"+errItems.item);
			       	   		errField.showErrorTips(errItems.info);
		       	   		}
		       	   	}
		        },
		        error:function(){
		        	bindAll();
		        	hideEmailRegisterLoading();
		        }
		     });

		}
		
		//手机注册
		var mobile_register = $('#mobile_register');
		var countTimer;
		var phoneCodeImg = $("#phone_code_check_code").parent().find("img");

		function checkPhoneNum(){
			var field = $('#phone_number'), phoneNum = field.val().replace(/\s+/g, '');
			if(phoneNum == ''){
				field.showErrorTips('手机号码 不能为空！');
				return false;
			}
			if(!/^1\d{10}$/.test(phoneNum)){
				field.showErrorTips('手机号码 格式错误！');
				return false;
			}
			return true;
		}
		
		var mobileErrorStatus = $('#mobile_code_status')[0];
		function showCodeError(msg){
			mobileErrorStatus.title = msg || '验证码错误';
			mobileErrorStatus.className = 'error';
		}

		function hideCodeError(){
			mobileErrorStatus.className = 'ok';
			mobileErrorStatus.title = '';
		}
		
		function fitPhoneNumber(num){
			num = (num + '00000000000').replace(/\s+/g, '').slice(0, 11);
			return num.replace(/(\d{3})(\d{4})(\d{4})/, '$1 $2 $3');
		}
		
		function togglePhoneCodeImg(){
			var 
			src = phoneCodeImg.attr('longDesc'),
			postfix = src.indexOf('?') < 0 ? '?_=' : '&_=';
			phoneCodeImg.attr('src', src + postfix + (+new Date/5000).toFixed());
		}
		
		if(phoneCodeImg.length){
			phoneCodeImg.bind('click', togglePhoneCodeImg);
			togglePhoneCodeImg();
		}
		
		//获取验证码
		var countTimer, countCircle, countdowning = false;
		
		var obj_validation_code = mobile_register.find('a.get_code');
		var qr_code_top = obj_validation_code.offset().top;
		var qr_code_left = obj_validation_code.offset().left;
		var qr_confirm = $("#qr_confirm");			
		$(".write_validation").css({left:qr_code_left - 320,top:qr_code_top});
		obj_validation_code.click(function(){
			if(countdowning){ return; }

			if(!checkPhoneNum()){ return; }
			
			var numField = $('#phone_number').prop('disabled', true);
			var phonenumber = numField.val();
			numField.parent().addClass('txt_disabled');
			
			togglePhoneCodeImg();
			$("#phone_code_check_code").val('').focus();
			$(".write_validation").css({'left':qr_code_left - 215,'top':qr_code_top,'filter':'alpha(opacity=100)','opacity':1,'z-index':99});
		});
		
		qr_confirm.click(function(e){
			e.preventDefault();
			if(countdowning){ return; }
			if(!checkPhoneNum()){ return; }
			var numField = $('#phone_number').prop('disabled', true);
			var phonenumber = numField.val();
			numField.parent().addClass('txt_disabled');
			
			var ajaxData = {'phonenumber':phonenumber,'check_code':$("#phone_code_check_code").val()};
			$.ajax({
				type:'post',
				url: "/index.php?r=user/PhoneRegisterGetCode1",
				data:ajaxData,
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
		        	if(data.status=="codeError"){
		        		var field = $('#'+data.info.item);
		       	   		field.showErrorTips(data.info.info);
		       	   		ds.stopTimeout(countTimer);
			       	   	counter.parent().addClass('hide');
						self.removeClass('hide');
						countdowning = false;
		       	   		return;
	       	   		}else{
	       	   			$(".write_validation").css({left:qr_code_left - 320,top:qr_code_top,'filter':'alpha(opacity=0)','opacity':0,'z-index':0});
	       	   		}
					if(typeof data.status == 'string' && data.status == 'success'){
		       	   	}else{
		       	   		if(data.status=="username_exists"){
		       	   			var field = $('#phone_number');
		       	   			field.showErrorTips('手机号“<em>'+ field.val() +'</em>”已被注册，<br>可能是您以前的账号，使用<a href="/index.php?r=user/recall"><b>帐户回忆系统</b></a>了解进一步信息》',true,10000000);
		       	   		}else{
			       	   		var field = $('#'+data.info.item);
			       	   		field.showErrorTips(data.info.info);
		       	   		}
		       	   		numField.val(phonenumber);
		       	   		ds.stopTimeout(countTimer);
		       	   		restoreCount();
		       	   	}
		        },
		        error:function(){
		        }
		     });
			
			var 
			delay = parseInt('90'),
			self =  obj_validation_code.addClass('hide'),
			counter = self.parent().find('.counter em');
			counter.parent().removeClass('hide');

			if(!countCircle){
				countCircle = new Circle({
					container: counter.parent()[0],
					fillColor: '#B4B4B4',
					lineWidth: 2,
					size: 38
				});
			}
			countCircle.update(0, false);
			counter.html(delay);

			countdowning = true;
			ds.stopTimeout(countTimer);
			countTimer = ds.startTimeout(delay*1000, function(queue, c){
				if(c % 4 === 0){
					var s = parseInt(queue.remaining/1000, 10), val = 1 - s/delay;
					counter.html(('00'+s).slice(-2));
					countCircle.update(val);
				}
			}, restoreCount);
			
			function restoreCount(){
				numField.parent().removeClass('txt_disabled');
				numField.prop('disabled', false);

				counter.parent().addClass('hide');
				self.removeClass('hide');
				
				countdowning = false;
			}

			$('#mobile_code').focus();

		});
		
		mobile_register.find('.ok_btn').click(function(e){
			e.preventDefault();
			submitPhoneRegister();
		});
		mobile_register.delegate('#phone_number,#mobile_code,#password_phone', 'keydown', function(e){
			var codeOffset = e.keyCode - 39;
			if(e.keyCode==13){
				e.preventDefault();
				submitPhoneRegister();
			}
		});
		
		function showPhoneRegisterLoading(){
			var registerBtn = mobile_register.find('.ok_btn');
			registerBtn.addClass('disabled');
			registerBtn.parents('.noform').addClass('loading');
			registerBtn.parents('.noform').find('input').attr('disabled',true);
		}
		
		function hidePhoneRegisterLoading(){
			var registerBtn = mobile_register.find('.ok_btn');
			registerBtn.removeClass('disabled');
			registerBtn.parents('.noform').removeClass('loading');
			registerBtn.parents('.noform').find('input').attr('disabled',false);
		}

		function submitPhoneRegister(){

			if(!$("#ck_2").attr("checked")){
				return;
			}
			unbindAll();
			if(!checkPhoneNum()){ return; }
			
			var codeField = $('#mobile_code');
			if(codeField.val() == ''){
				//showCodeError();
				return codeField.showErrorTips('验证码不能为空！');
			}
			codeField = $('#password_phone');
			if(codeField.val() == ''){
				//codeField.next().removeClass('right_input_icon').addClass('error_input_icon').show();
				return codeField.showErrorTips('密码不能为空！');
			}
			showPhoneRegisterLoading();
			var phonenumber = $('#phone_number').val();
			var ajaxData = {'phonenumber':phonenumber,'phonekey':$('#mobile_code').val(),'password':$('#password_phone').val(),'face':$('#face_phone').val()};
			$.ajax({
				type:'post',
				data:ajaxData,
				url: '/index.php?r=user/PhoneRegisterProcess',
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
		        	bindAll();
					if(typeof data.status == 'string' && data.status == 'success'){
						window.location = '/index.php?r=user/PhoneRegisterSuccess';
		       	   	}else{
		       	   		hidePhoneRegisterLoading();
			       	   	if(data.status=="username_exists"){
		       	   			var field = $('#phone_number');
		       	   			field.showErrorTips('手机号“<em>'+ field.val() +'</em>”已被注册，<br>可能是您以前的账号，使用<a href="/index.php?r=user/recall"><b>帐户回忆系统</b></a>了解进一步信息》',true,10000000);
		       	   		}else{
			       	   		var field = $('#'+data.info.item);
			       	   		field.showErrorTips(data.info.info);
		       	   		}
		       	   	}
		        },
		        error:function(){
		        	bindAll();
		        	hidePhoneRegisterLoading();
		        }
		     });
			
		}
		
		
	});
	</script>
	<script type="text/javascript">
	//头像上传
	jQuery(function($){
		$.ajaxSetup({ cache: true });
		
		var placeImg = 'images/place.png';
		$.getScript('js/uploader/jquery.uploader.js', function(){
			var 
			valField = $('#face'),
			imgElem = $('#user_face'),
			fileField = $('#face_file'),
			uploaderOptions = {
				dataType: 'json',
				action: "/index.php?r=user/uploadAvatar",
				accept: 'image/gif,image/jpeg,image/x-png',
				allowExts: 'jpg,png,gif',
				maxFileSize: 2048 * 1024,
				maxFileCount: 1,
				type:'auto',
				typeOrder: ['ajax','iframe'],
				onbeforeupload: function(){
					imgElem.addClass('loading').attr('lsrc', imgElem.attr('src')).attr('src', placeImg);
				},
				onupload: function(e, data){
					this.reset();
					if(data && data.status === 'success'){
						var src = 'js/set_header/set_head.html?avatar='+data.info.avatar+'&width='+data.info.width+'&height='+data.info.height;
						var upload_header = $(".upload_header");
						upload_header.find('iframe').attr('src',src);
						upload_header.show();
						upload_header.find(".head_wrap h1 a").unbind();
						upload_header.find(".head_wrap h1 a").click(function(e){
							e.preventDefault();
							imgElem.removeClass('loading').attr('src', imgElem.attr('lsrc'));
							$(this).parents(".upload_header").hide();
						});
						upload_header.find(".cut_yes").unbind();
						upload_header.find(".cut_yes").click(function(e){
							e.preventDefault();
							var obj = this;
							upload_header.addClass('disabled');
							upload_header.find('.mask').removeClass('hide');
							var form = upload_header.find("iframe").contents().find('form');
							$.ajax({
								type:'post',
								url: "/index.php?r=user/uploadAvatarCut",
								data: form.serialize(),
								dataType:"json",
								cache: false,
								async: true,
						        success: function(data){
						        	upload_header.removeClass('disabled');
						        	upload_header.find('.mask').addClass('hide');
						        	if(typeof data.status == 'string' && data.status == 'success'){
						        		imgElem.removeClass('loading').attr('src', data.info.avatar);
						        		valField.val(data.info.avatar);
						        		$(obj).parents(".upload_header").hide();
						       	   	}else{
						       	   		ds.dialog.alert(data.info);
						       	   	}
						        },
						        error:function(){
						        	upload_header.removeClass('disabled');
						        	upload_header.find('.mask').addClass('hide');
						        }
						    });
							
							
						});
						upload_header.find(".cut_no").unbind();
						upload_header.find(".cut_no").click(function(e){
							e.preventDefault();
							imgElem.removeClass('loading').attr('src', imgElem.attr('lsrc'));
							$(this).parents(".upload_header").hide();
						});
						return;
						
					}else{
						imgElem.removeClass('loading').attr('src', imgElem.attr('lsrc'));
						ds.dialog.alert(data.info);
					}
				},
				onerror: function(e, ex){
					this.reset();
					var errMsg;
					if(ex.type === 'add'){
						errMsg = '选择的文件大小超过限制，请重新选择！';
						if(ex.errorCode === -110){
							errMsg = '请选择正确的文件格式，用户图像支持以下格式：<br><b>' + this.ops.allowExts + '</b>';
						}
						ds.dialog.alert(errMsg);
					}
				}
			};

			//Init Uploader
			fileField.uploader(uploaderOptions);
			
			
			var 
			valField_phone = $('#face_phone'),
			imgElem_phone = $('#user_face_phone'),
			fileField_phone = $('#face_file_phone'),
			uploaderOptions_phone = {
				dataType: 'json',
				action: '/index.php?r=user/uploadAvatar',
				accept: 'image/gif,image/jpeg,image/x-png',
				allowExts: 'jpg,png,gif',
				maxFileSize: 2048 * 1024,
				maxFileCount: 1,
				type:'auto',
				typeOrder: ['ajax','iframe'],
				onbeforeupload: function(){
					imgElem_phone.addClass('loading').attr('lsrc', imgElem_phone.attr('src')).attr('src', placeImg);
				},
				onupload: function(e, data){
					this.reset();
					if(data && data.status === 'success'){
						var src = 'js/set_header/set_head.html?avatar='+data.info.avatar+'&width='+data.info.width+'&height='+data.info.height;
						var upload_header = $(".upload_header");
						upload_header.find('iframe').attr('src',src);
						upload_header.show();
						upload_header.find(".head_wrap h1 a").unbind();
						upload_header.find(".head_wrap h1 a").click(function(e){
							e.preventDefault();
							imgElem_phone.removeClass('loading').attr('src', imgElem_phone.attr('lsrc'));
							$(this).parents(".upload_header").hide();
						});
						upload_header.find(".cut_yes").unbind();
						upload_header.find(".cut_yes").click(function(e){
							e.preventDefault();
							var obj = this;
							upload_header.addClass('disabled');
							upload_header.find('.mask').removeClass('hide');
							var form = upload_header.find("iframe").contents().find('form');
							$.ajax({
								type:'post',
								url: "/index.php?r=user/uploadAvatarCut",
								data: form.serialize(),
								dataType:"json",
								cache: false,
								async: true,
						        success: function(data){
						        	upload_header.removeClass('disabled');
						        	upload_header.find('.mask').addClass('hide');
						        	if(typeof data.status == 'string' && data.status == 'success'){
						        		imgElem_phone.removeClass('loading').attr('src', data.info.avatar);
						        		valField_phone.val(data.info.avatar);
						        		$(obj).parents(".upload_header").hide();
						       	   	}else{
						       	   		ds.dialog.alert(data.info);
						       	   	}
						        },
						        error:function(){
						        	upload_header.removeClass('disabled');
						        	upload_header.find('.mask').addClass('hide');
						        }
						    });
							
							
						});
						upload_header.find(".cut_no").unbind();
						upload_header.find(".cut_no").click(function(e){
							e.preventDefault();
							imgElem_phone.removeClass('loading').attr('src', imgElem_phone.attr('lsrc'));
							$(this).parents(".upload_header").hide();
						});
						return;
						
						imgElem_phone.removeClass('loading').attr('src', data.info.avatar);
						valField_phone.val(data.info.avatar);

						this.reset();
					}else{
						imgElem.removeClass('loading').attr('src', imgElem.attr('lsrc'));
						ds.dialog.alert(data.info);
					}
				},
				onerror: function(e, ex){
					this.reset();
					var errMsg;
					if(ex.type === 'add'){
						errMsg = '选择的文件大小超过限制，请重新选择！';
						if(ex.errorCode === -110){
							errMsg = '请选择正确的文件格式，用户图像支持以下格式：<br><b>' + this.ops.allowExts + '</b>';
						}
						ds.dialog.alert(errMsg);
					}
				}
			};

			//Init Uploader
			fileField_phone.uploader(uploaderOptions_phone);
			
		});
		
	});
	</script>
	<script type="text/javascript">
	//邮箱注册
	jQuery(function($){
		
		
	});
	
	//手机注册
	jQuery(function($){
		
		
	});
	

	//globar_topbar
	jQuery(function($){
		var 
		linkTimer,
		linkPanel = $('#globar_topbar_links'),
		linkFocusStyle = linkPanel.find('.focus').prop('style');
		if(linkFocusStyle){
			linkPanel.delegate('li a', 'mouseenter', function(){
				var self = $(this);
				clearTimeout(linkTimer);
				
				linkFocusStyle.left = self.position().left + 'px';
				linkFocusStyle.width = self.innerWidth() + 'px';
			})
			.bind('mouseleave', function(){
				clearTimeout(linkTimer);
				linkTimer = setTimeout(function(){
					linkFocusStyle.left = '';
				}, 240);
			});
		}
	});
	
	//用户协议
	jQuery(function($){
		$('.agreement').delegate('span.nocheck', 'click', function(event) {
			event.preventDefault();
			$(this).hasClass('check')?$(this).removeClass('check'):$(this).addClass('check');
			if($(this).hasClass('check')){
				$(this).find('input[type=checkbox]').attr("checked",true);
				$(this).parent().parent().parent().find('button').removeClass('disabled');
			}else{
				$(this).find('input[type=checkbox]').attr("checked",false);
				$(this).parent().parent().parent().find('button').addClass('disabled');
			}
		});
	});
	
	$('input[name=gender]').bind('change',function(){
		var face = $("#face").val();
		if(face=="" || face==0 || face==1 || face==2){
			var gender = $(this).val();
			if(gender==0){
				$('#user_face').attr("src","ucenter/images/noavatar_middle.gif");
			}else if(gender==1){
				$('#user_face').attr("src","ucenter/images/boy_middle.png");
			}else if(gender==2){
				$('#user_face').attr("src","ucenter/images/girl_middle.png");
			}
		}
		
	});
	</script>
	<script type="text/javascript">
	$("#province").change(function(){
		var regionId = this.value ;
		var ajaxData = {'province':regionId};
		$.ajax({
			type:'post',
			url: "index.php?r=user/GetCity",
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	        	if(typeof data.status == 'string' && data.status == 'success'){
	        		var cityList = data.info.cityList ;
					var city_html = '';
					for(var i=0; i<cityList.length ;i++){
						city_html += '<option value="'+cityList[i].id+'">'+cityList[i].city_name+'</option>';
					}
					$("#city").html(city_html);
					var city_name = $("#city option").eq(0).attr('selected', 'true').text();
					$("#city").parent().find('.city').find('em').html(city_name);
	       	   	}else{
	       	   	}
	        },
	        error:function(){
	        	//alert("服务器繁忙，请稍候！");
	        }
	     });
	});
	　　
	jQuery(function($){
		$(document).bind('click', function(){
			var tmpl = $('#email_rigster_pwd_tmpl').val();
			$("#txt_password").replaceWith(tmpl);
			var tmp2 = $('#phone_rigster_pwd_tmpl').val();
			$("#txt_password_phone").replaceWith(tmp2);
		});
	});
	
	
	//邮箱自动提示
	//$('#container').delegate('#email', 'focus', function(e){
	$("#email").focus(function(){
        var $lable  = $(this).parent().prev();
        if($lable.attr('for')==='email'){
            $lable.hide();
        }
    });
    $("#email").mailAutoComplete({
        mailArr: "qq.com,sina.com,sohu.com,126.com,msn.com,163.com,foxmail.com,gmail.com,hotmail.com,139.com,188.com,163.net,21cn.com,263.net,51.com,56.com,aol.com,bokee.com,china.com,citiz.net,donews.com,etang.com,eyou.com,inbox.com,ku6.com,live.cn,live.com,lycos.com,mail.china.com,tom.com,tw.live.com,vip.163.com,vip.qq.com,vip.sina.com,vip.sohu.com,x.cn,xinhuanet.com,xuite.net,yahoo.cn,yahoo.com.cn,yahoo.com,yahoo.com.tw,yahoo.sg,yeah.net".split(","), //邮件数组
        boxClass: "out_box",
        listClass: "list_box",
        focusClass: "focus_box",
        autoClass: false,
        textHint: true
    });
	
	</script>
	

<!--用户提示-->
<textarea id="security_1_tmpl" class="tmpl" style="display:none">
<div class="security_upBox">
	<div class="user_prompts">
		<div class="label_card">
			<div class="coninner">
				<div class="header_img">
					<img src="<%=userInfo.avatar%>" height="137" width="137" />
					<i class="mask"></i>
				</div>
				<p>UID：<span><%=userInfo.uid%></span></p>
				<p><b class="name"><%=userInfo.username%></b></p>
				<p>年龄：<span><%=userInfo.fengbirthday%></span></p>
			</div>
		</div>

		<div class="score_num">
			<div class="ten">
				<ul></ul>
				<span class="rel_num"><%=userInfo.saftScore%></span>
			</div>
			<div class="end">0</div>
			<div class="fen">分</div>
		</div>
		
		<div class="hint">亲爱的锋友，<span><%=userInfo.registerDateStr%></span>在威锋出生，现已过去<%=userInfo.viaDateStr%>，你的帐户一直处于非安全状态。花几分钟的时间保护你的威锋帐户，提高帐户安全系数吧。</div>
		<p><a href="javascript:displaySecurity_2_tmpl();" class="commonBtn">提高账户安全</a></p>
		<p class="jumpBtn"><a href="javascript:;" name='saft_info_jump' data-flag='tip'>跳过</a><span class="hide"><img src="images/loading_m.gif" height="28" width="28" /></span></p>
	</div>
</div>
</textarea>

<!--设置安全提问-->
<textarea id="security_2_tmpl" class="tmpl" style="display:none">
<div class="security_upBox scroll_box">
	<div class="security_question">
	<form action='index.php?r=saft/bindSaftQSetSaftQProcess' method="post" id="set_saft_form">
		<input type='hidden' name='nextItem' id='nextItem' value='<%=nextItem%>'>
		<div class="fCode_usestyle fCode_usestyle_next">
			<ul>
				<li><h1 style="color:#0096ff; font-size:24px; font-weight:400; border-bottom:0; text-align:center;">设置安全提问</h1></li>
				<li>
					<div class="labcon">
						<label class="name_gray">问题一</label>
						<div class="select_panel">
							<select name="safeQ1" id="safeQ1">
								<% for(var item,i=0,len=qItems[0].length; i<len&&(item=qItems[0][i]); i++){ %>
									<option value="<%=item%>"><%=item%></option>
								<% } %>
							</select>
						</div>
					</div>
				</li>
				<li class="hide hidepro"><div class="labcon"><label class="name_gray">问题</label><input type="text" class="common_inputbox" value="" name="safeQ1_diy" id="safeQ1_diy"></div></li>
				<li>
					<div class="labcon">
						<label class="analog_tag" >答案</label>
						<input type="text" class="common_inputbox" name="safeA1" id="safeA1"/>
						<a class="input_empty" href="javascript:;" title="清空">清空</a>	
					</div>
				</li>

				<li>
					<div class="labcon">
						<label class="name_gray">问题二</label>
						<div class="select_panel">
							<select name="safeQ2" id="safeQ2">
								<% for(var item,i=0,len=qItems[1].length; i<len&&(item=qItems[1][i]); i++){ %>
									<option value="<%=item%>"><%=item%></option>
								<% } %>
							</select>
						</div>
					</div>
				</li>
				<li class="hide hidepro"><div class="labcon"><label class="name_gray">问题</label><input type="text" class="common_inputbox" value="" name="safeQ2_diy" id="safeQ2_diy"></div></li>
				<li>
					<div class="labcon">
						<label class="analog_tag" >答案</label>
						<input type="text" class="common_inputbox" name="safeA2" id="safeA2" />
						<a class="input_empty" href="javascript:;" title="清空">清空</a>	
					</div>
				</li>

				<li>
					<div class="labcon">
						<label class="name_gray">问题三</label>
						<div class="select_panel">
							<select name="safeQ3" id="safeQ3">
								<% for(var item,i=0,len=qItems[2].length; i<len&&(item=qItems[2][i]); i++){ %>
									<option value="<%=item%>"><%=item%></option>
								<% } %>
							</select>
						</div>
					</div>
				</li>
				<li class="hide hidepro"><div class="labcon"><label class="name_gray">问题</label><input type="text" class="common_inputbox" value="" name="safeQ3_diy" id="safeQ3_diy"></div></li>
				<li>
					<div class="labcon">
						<label class="analog_tag" >答案</label>
						<input type="text" class="common_inputbox" name="safeA3" id="safeA3" />
						<a class="input_empty" href="javascript:;" title="清空">清空</a>	
					</div>
				</li>

				<li>
					<p>
						<a href="javascript:submitSaft();" class="commonBtn">确定</a>
						<span class="big_mask"><i class="loading_icon"></i></span>
					</p>
				</li>
			</ul>
		</div>
	</form>	
		<div class="score_num">
			<div class="ten">
				<ul></ul>
				<span class="rel_num"><%=userInfo.saftScore%></span>
			</div>
			<div class="end">0</div>
			<div class="fen">分</div>
		</div>
	</div>
</div>
</textarea>

<!--设置邮箱-->
<textarea id="security_3_tmpl" class="tmpl" style="display:none">
	<div class="security_upBox">
		<div class="binding_email">
			<div class="fCode_usestyle">
			<form action='index.php?r=site/alterEmailProcess' method="post" id="bind_email_set_form">
				<input type='hidden' name='nextItem' id='nextItem' value='<%=nextItem%>'>
			   <ul>
				 <li><h1>绑定新邮箱</h1></li>
				  <li>
					<div class="labcon"><input type="text" placeholder="新邮箱" class="common_inputbox" name="b_email" id="b_email" value="<%=userInfo.email%>"></div>
					<p class="hint hide">效验码已发送到您的邮箱 <s class="cue_point"></s></p>
				 </li>
				<li><div class="txt txt_noicon txt_code labcon"><input type="text" name="emailToken" id="emailToken" class="common_inputbox inputbox_code"><span class="code_ext"><a href="javascript:;" class="btn get_code"><span>获取验证码</span></a><span class="counter hide"><em>00</em>重新发送</span><i class="hide" id="emailToken_status"></i></span></div></li>
				<li>
					<p>
						<a href="javascript:submitEmail();" class="commonBtn">确定</a>
						<span class="big_mask"><i class="loading_icon"></i></span>
					</p>
					<p class="jumpBtn"><a href="javascript:;" name='saft_info_jump' data-flag='<%=nextItem%>'>跳过</a><span class="hide"><img src="images/loading_m.gif" height="28" width="28" /></span></p>
				</li>
			   </ul>
			</form>
			</div>
			
			<div class="score_num">
				<div class="ten">
					<ul></ul>
					<span class="rel_num"><%=userInfo.saftScore%></span>
				</div>
				<div class="end">0</div>
				<div class="fen">分</div>
			</div>
		</div>
	</div>
</textarea>

<!--绑定手机-->
<textarea id="security_4_tmpl" class="tmpl" style="display:none">
	<div class="security_upBox">
		<div class="binding_email">
		<form action='index.php?r=saft/bindPhoneSetPhoneProcess' method="post" id="bind_phone_set_form">
			<input type='hidden' name='nextItem' id='nextItem' value='<%=nextItem%>'>
			<div class="fCode_usestyle">
			   <ul>
				 <li><h1>绑定手机</h1></li>
				  <li>
					<div class="labcon"><input type="text" placeholder="输入手机号码（暂时仅支持中国地区）" class="common_inputbox" name="bindphonenumber" id="bindphonenumber"></div>
					<p class="hint">验证码会以短信的形式发送到您的手机</p>
				 </li>
				<li><div class="txt txt_noicon txt_code labcon"><input type="text" name="mobilephoneToken" id="mobilephoneToken" maxlength="6" class="common_inputbox inputbox_code"><span class="code_ext"><a href="javascript:;" class="btn get_code"><span>免费获取校验码</span></a><span class="counter hide"><em>00</em>重新发送</span><i class="hide" id="mobile_code_status"></i></span></div></li>
				<li>
					<p>
						<a href="javascript:submitPhone();" class="commonBtn">确定</a>
						<span class="big_mask"><i class="loading_icon"></i></span>
					</p>
					<p class="jumpBtn"><a href="javascript:;" name='saft_info_jump' data-flag='<%=nextItem%>'>跳过</a><span class="hide"><img src="images/loading_m.gif" height="28" width="28" /></span></p>
				</li>
			   </ul>
			</div>
		</form>
			<div class="score_num">
				<div class="ten">
					<ul></ul>
					<span class="rel_num"><%=userInfo.saftScore%></span>
				</div>
				<div class="end">0</div>
				<div class="fen">分</div>
			</div>
		</div>
	</div>
</textarea>

<!--设置支付密码-->
<textarea id="security_5_tmpl" class="tmpl" style="display:none">
	<div class="security_upBox">
		<div class="set_paypassword">
			<div class="fCode_usestyle">
			<form action='index.php?r=pwd/findPayPwdResetProcess' method="post" id="find_pwd_set_form">
				<input type='hidden' name='nextItem' id='nextItem' value='<%=nextItem%>'>
			   <ul>
				 	<li><h1>设置支付密码</h1></li>
				 	<li><h2>现在开始设置支付密码，保护您的帐户余额、威游币，为您的安全支付保驾护航 。</h2></li>
					<li>
						<div class="labcon">
							<label class="analog_tag" >支付密码</label>
							<input type='password' value="" class="common_inputbox" name="newPassword" id="newPassword" maxLength=20 autocomplete="off" oncopy="return false" onpaste="return false">
							<a class="input_empty" href="javascript:;" title="清空">清空</a>	
						</div>
					</li>
					<li>
						<div class="labcon">
							<label class="analog_tag" >确认支付密码</label>
							<input type='password' value="" class="common_inputbox" name="newPassword2" id="newPassword2" maxLength=20 autocomplete="off" oncopy="return false" onpaste="return false">
							<a class="input_empty" href="javascript:;" title="清空">清空</a>	
						</div>
					</li>
				<li>
					<p>
						<a href="javascript:submitPayPwd();" class="commonBtn">确定</a>
						<span class="big_mask"><i class="loading_icon"></i></span>
					</p>
					<p class="jumpBtn"><a href="javascript:;" name='saft_info_jump' data-flag='<%=nextItem%>'>跳过</a><span class="hide"><img src="images/loading_m.gif" height="28" width="28" /></span></p>
				</li>
			   </ul>
			</form>
			</div>
			
			<div class="score_num">
				<div class="ten">
					<ul></ul>
					<span class="rel_num"><%=userInfo.saftScore%></span>
				</div>
				<div class="end">0</div>
				<div class="fen">分</div>
			</div>
		</div>
	</div>
</textarea>

<!--威锋密保-->
<textarea id="security_6_tmpl" class="tmpl" style="display:none">
	<div class="security_upBox">
		<div class="set_wekey">
			<input type='hidden' name='nextItem' id='nextItem' value='<%=nextItem%>'>
			<h1>
				<p>想体验二维码一键扫描的快捷吗？</p>
				<p>现在使用威锋密保来保护你的的帐户吧。</p>
			</h1>
			<div class="download">
				<div class="download_way">
					<span class="tel_icon ios"></span>
					<p class="telName">Ios</p>
					<a href="<%=wekeyIosUrl%>" target="_blank" class="download_btn"><i class="ios"></i>苹果版下载</a>
					<span class="code_img"><img src="<%=wekeyIosQrUrl%>" height="100" width="100" alt="" /></span>
				</div>
				
				<div class="download_way mid_space">
					<span class="tel_icon android"></span>
					<p class="telName">Android</p>
					<a href="<%=wekeyAndroidUrl%>" target="_blank" class="download_btn"><i class="android"></i>安卓版下载</a>
					<span class="code_img"><img src="<%=wekeyAndroidQrUrl%>" height="100" width="100" alt="" /></span>
				</div>
				
				<div class="download_way">
					<span class="tel_icon wp8"></span>
					<p class="telName">WindowsPhone</p>
					<a href="<%=wekeyWPUrl%>" target="_blank" class="download_btn"><i class="wp8"></i>Wp8版下载</a>
					<span class="code_img"><img src="<%=wekeyWPQrUrl%>" height="100" width="100" alt="" /></span>
				</div>
			</div>
			<div class="tel_numbox hide">
				<div class="labcon"><input type="text" value="" placeholder="输入手机号码（暂时仅支持中国地区）" class="common_inputbox" name="bindphonenumber" id="bindphonenumber"></div>
				<p class="hint">下载链接会以短信的形式发送到您的手机</p>
			</div>
			<p>
				<a href="javascript:submitWekey();" class="commonBtn">确定</a>
				<span class="big_mask"><i class="loading_icon"></i></span>
			</p>
			<p class="jumpBtn hide"><a href="javascript:;" name='saft_info_jump' data-flag='<%=nextItem%>'>跳过</a><span class="hide"><img src="images/loading_m.gif" height="28" width="28" /></span></p>
		</div>
	</div>
</textarea>

<textarea id="security_7_tmpl" class="tmpl" style="display:none">
	<div class="security_upBox">
		<div class="complete_box">
			<% if (userInfo.saftScore>=8){ %>
			<h1>非常不错，您的帐户已经获得<span class="full_point <% if (userInfo.saftScore<10){ %>hide<% } %>">分</span></h1>
			<% }else if(userInfo.saftScore>=5){ %>
			<h1>您的帐户已经获得<span class="full_point hide">分</span></h1>
			<% }else if(userInfo.saftScore<5){ %>
			<h1>您的帐户仅获得<span class="full_point hide">分</span></h1>
			<% } %>
			<h2>已激活安全选项</h2>
			<ul>
				<li class="<%if(userInfo.emailActive==1){%>activate<%}else{%>prompt<%}%>"><i></i>邮箱已验证<%if(userInfo.emailActive==1){%><span class="other">（<%=userInfo.email_after_interference%>）</span><%}%></li>
				<li class="<%if(userInfo.saftActive==1){%>activate<%}else{%>prompt<%}%>"><i></i>安全提问已设置</li>
				<li class="<%if(userInfo.mobileActive==1){%>activate<%}else{%>prompt<%}%>"><i></i>手机已绑定<%if(userInfo.mobileActive==1){%> <span class="other">（<%=userInfo.bindphonenumber_after_interference%>）</span> <%}%></li>
				<li class="<%if(userInfo.payPwdActive==1){%>activate<%}else{%>prompt<%}%>"><i></i>支付密码已设置</li>
				<li class="<%if(userInfo.wekeyActive==1){%>activate<%}else{%>prompt<%}%>"><i></i>威锋密保已绑定</li>
			</ul>
			<% if (appid>1){ %>
				<p><a href="javascript:;" class="commonBtn" name='saft_info_jump' data-flag='tip'>跳转至<%=appname%></a><span class="hide"><img src="images/loading_m.gif" height="28" width="28" /></span></p>
				<p class="jumpBtn"><a href="javascript:jump_current_item('passport',this);"  >进入我的账户中心</a><span class="hide"><img src="images/loading_m.gif" height="28" width="28" /></span></p>
			<% }else{ %>
				<p><a href="javascript:jump_current_item('passport',this);" class="commonBtn" >跳转至<%=appname%></a><span class="hide"><img src="images/loading_m.gif" height="28" width="28" /></span></p>
			<% } %>
			<% if (userInfo.saftScore<10){ %>
			<div class="score_num">
				<div class="ten">
					<ul></ul>
					<span class="rel_num"><%=userInfo.saftScore%></span>
				</div>
				<div class="end">0</div>
				<div class="fen">分</div>
			</div>
			<% } %>
		</div>
	</div>
</textarea>
<script type="text/javascript">
	function jump_current_item(code,obj){
		$.hideAllErrorTips();
		$(obj).next('span').removeClass('hide');
		$(obj).hide();
		if(code=='tip'){
			doJump();
		}else if(code=='saft'){
			displaySecurity_3_tmpl();
		}else if(code=='email'){
			displaySecurity_3_tmpl();
		}else if(code=='phone'){
			displaySecurity_4_tmpl();
		}else if(code=='pay_pwd'){
			displaySecurity_5_tmpl();
		}else if(code=='wekey'){
			displaySecurity_6_tmpl();
		}else if(code=='complete'){
			displaySecurity_7_tmpl();
		}else if(code=='passport'){
			location.href='index.php?r=site/index';
		}
	}

	function displaySecurity_1_tmpl(){
		var ajaxData = {};
		$.ajax({
			type:'post',
			url: "index.php?r=site/InproveSaft1",
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	     	   	if(typeof data.status == 'string' && data.status == 'success'){
	     			var tmpl = $('#security_1_tmpl').val();
		     	   	var html = ds.tmpl(tmpl, data.info);
		     	   	var onhide = function(){doJump();this.close();};
		     	  	ds_confirm(html,'','',false,false,onhide);
		     	  	buildScore();
		     	  	$('.security_upBox').delegate('a[name=saft_info_jump]','click',function(e){
		     	  		e.preventDefault();
		     	  		jump_current_item($(this).attr("data-flag"),this);
		     	  	});
	       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
				}
	       	   	else{
	          		ds.dialog.alert(data.info.info);
	       	   	}
	        },
	        error:function(){
	        	ds.dialog.alert("服务器繁忙，请稍候！");
	        }
	     });
	}
	
	//设置安全问题
	function displaySecurity_2_tmpl(){
		showBtnLoading();
		var ajaxData = {};
		$.ajax({
			type:'post',
			url: "index.php?r=site/InproveSaft2",
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	        	hideBtnLoading();
	     	   	if(typeof data.status == 'string' && data.status == 'success'){
	     			var tmpl = $('#security_2_tmpl').val();
		     	   	var html = ds.tmpl(tmpl, data.info);
		     	   	//console.log(html);
		     	   	var onhide = function(){doJump();this.close();};
		     	  	ds_confirm(html,'','',false,false,onhide);
		     	  	buildScore();
		     	  	$('.select_panel').find('select').bind('change', function(){
		    			var val = this.options[this.selectedIndex].value;
		    		})
		    		.renderSelect();
		     	  	initSaft();
		     	  	$('.security_upBox').delegate('a[name=saft_info_jump]','click',function(e){
		     	  		e.preventDefault();
		     	  		jump_current_item($(this).attr("data-flag"),this);
		     	  	});
		     	  	
		     	  	rebindEvent();
	       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
				}
	       	   	else{
	       	   		ds.dialog.alert(data.info.info);
	       	   	}
	        },
	        error:function(){
	        	hideBtnLoading();
	        	ds.dialog.alert("服务器繁忙，请稍候！");
	        }
	     });
	}
	
	//设置邮箱
	function displaySecurity_3_tmpl(){
		var ajaxData = {};
		$.ajax({
			type:'post',
			url: "index.php?r=site/InproveSaft3",
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	     	   	if(typeof data.status == 'string' && data.status == 'success'){
	     			var tmpl = $('#security_3_tmpl').val();
		     	   	var html = ds.tmpl(tmpl, data.info);
		     	   	//console.log(html);
		     	   	var onhide = function(){doJump();this.close();};
		     	  	ds_confirm(html,'','',false,false,onhide);
		     	  	buildScore();
		     	  	initEmail(data.info.getEmailTokenUrl,data.info.keyTimeOut);
		     	  	$('.security_upBox').delegate('a[name=saft_info_jump]','click',function(e){
		     	  		e.preventDefault();
		     	  		jump_current_item($(this).attr("data-flag"),this);
		     	  	});
	       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
				}
	       	   	else{
	       	   		ds.dialog.alert(data.info.info);
	       	   	}
	        },
	        error:function(){
	        	ds.dialog.alert("服务器繁忙，请稍候！");
	        }
	     });
	}
	
	//绑定手机
	function displaySecurity_4_tmpl(){
		var ajaxData = {};
		$.ajax({
			type:'post',
			url: "index.php?r=site/InproveSaft4",
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	     	   	if(typeof data.status == 'string' && data.status == 'success'){
	     			var tmpl = $('#security_4_tmpl').val();
		     	   	var html = ds.tmpl(tmpl, data.info);
		     	   	//console.log(html);
		     	   	var onhide = function(){doJump();this.close();};
		     	  	ds_confirm(html,'','',false,false,onhide);
		     	  	buildScore();
		     	  	initPhone(data.info.phoneGetCodeUrl,data.info.messageType,data.info.phoneKeyTimeOut);
		     	  	$('.security_upBox').delegate('a[name=saft_info_jump]','click',function(e){
		     	  		e.preventDefault();
		     	  		jump_current_item($(this).attr("data-flag"),this);
		     	  	});
	       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
				}
	       	   	else{
	       	   		ds.dialog.alert(data.info.info);
	       	   	}
	        },
	        error:function(){
	        	ds.dialog.alert("服务器繁忙，请稍候！");
	        }
	     });
	}
	
	//设置支付密码
	function displaySecurity_5_tmpl(){
		var ajaxData = {};
		$.ajax({
			type:'post',
			url: "index.php?r=site/InproveSaft5",
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	     	   	if(typeof data.status == 'string' && data.status == 'success'){
	     			var tmpl = $('#security_5_tmpl').val();
		     	   	var html = ds.tmpl(tmpl, data.info);
		     	   	//console.log(html);
		     	   	var onhide = function(){doJump();this.close();};
		     	  	ds_confirm(html,'','',false,false,onhide);
		     	  	buildScore();
		     	  	initPayPwd();
		     	  	$('.security_upBox').delegate('a[name=saft_info_jump]','click',function(e){
		     	  		e.preventDefault();
		     	  		jump_current_item($(this).attr("data-flag"),this);
		     	  	});
		     	  	rebindEvent();
	       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
				}
	       	   	else{
	       	   		ds.dialog.alert(data.info.info);
	       	   	}
	        },
	        error:function(){
	        	ds.dialog.alert("服务器繁忙，请稍候！");
	        }
	     });
	}
	
	//设置绑定密保
	function displaySecurity_6_tmpl(){
		var ajaxData = {};
		$.ajax({
			type:'post',
			url: "index.php?r=site/InproveSaft6",
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	     	   	if(typeof data.status == 'string' && data.status == 'success'){
		     	   	var tmpl = $('#security_6_tmpl').val();
		     		var html = ds.tmpl(tmpl, data.info);
		       	   	var onhide = function(){doJump();this.close();};
		       	  	ds_confirm(html,'','',false,false,onhide);
		       	 	$(".set_wekey .download .download_way").each(function(){
		    			$(this).find(".tel_icon").hover(function(){
		    				$(this).siblings(".code_img").stop().animate({"top":0,"opacity":1},400);
		    				$(".code_img").mouseover(function(){
		    					$(this).stop().animate({"top":0,"opacity":1},400);
		    				});
		    				$(".code_img").mouseout(function(){
		    					$(this).stop().animate({"top":-100,"opacity":0},400);
		    				});
		    			},function(){
		    				$(this).siblings(".code_img").stop().animate({"top":-100,"opacity":0},400);
		    			});
		    		});
		       	 	$('.security_upBox').delegate('a[name=saft_info_jump]','click',function(e){
		     	  		e.preventDefault();
		     	  		jump_current_item($(this).attr("data-flag"),this);
		     	  	});
	       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
				}
	       	   	else{
	       	   		ds.dialog.alert(data.info.info);
	       	   	}
	        },
	        error:function(){
	        	ds.dialog.alert("服务器繁忙，请稍候！");
	        }
	     });
	}
	
	function displaySecurity_7_tmpl(){
		var ajaxData = {};
		$.ajax({
			type:'post',
			url: "index.php?r=site/InproveSaft7",
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	     	   	if(typeof data.status == 'string' && data.status == 'success'){
	     			var tmpl = $('#security_7_tmpl').val();
		     	   	var html = ds.tmpl(tmpl, data.info);
		     	   	//console.log(html);
		     	   	var onhide = function(){doJump();this.close();};
		     	  	ds_confirm(html,'','',false,false,onhide);
		     	  	buildScore();
		     	  	$('.security_upBox').delegate('a[name=saft_info_jump]','click',function(e){
		     	  		e.preventDefault();
		     	  		jump_current_item($(this).attr("data-flag"),this);
		     	  	});
	       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
				}
	       	   	else{
	       	   		ds.dialog.alert(data.info.info);
	       	   	}
	        },
	        error:function(){
	        	ds.dialog.alert("服务器繁忙，请稍候！");
	        }
	     });
	}
	
	function submitSaft(){
		$('#set_saft_form').submit();
	}
	function initSaft(){
		var form = $('#set_saft_form');
		form.bind('submit', function(e){
			e.preventDefault();
			var errField;
			var fields = [$('#safeA1'),$('#safeA2'),$('#safeA3')];
			for(var i=0;i<fields.length;i++){
				errField = fields[i];
				if(errField.val() == ''){
					errField.focus();
					errField.showErrorTips(errField.parent().find('.analog_tag').html() + ' 不能为空');
					return;
				}
			};
			showBtnLoading();
			$.ajax({
				type:'post',
				url: form.attr("action"),
				data:form.serialize(),
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
		        	if(typeof data.status == 'string' && data.status == 'success'){
		        		jump_current_item($('#nextItem').val(),this);
		       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
					}else{
		       	   		hideBtnLoading();
		       	   		var status = data ? data.status : null;
		       	   		var errItems = data.info;
		       	   		errField = $("#"+errItems.item);
		       	   		errField.showErrorTips(errItems.info);
		       	   	}
		        },
		        error:function(){
		        	hideBtnLoading();
		        }
		     });
		});
	}
	
	function submitEmail(){
		$('#bind_email_set_form').submit();
	}
	
	function initEmail(getEmailTokenUrl,keyTimeOut){
		
		$('#bind_email_set_form').baseFormHandle();
		var countTimer, form = $('#bind_email_set_form');
		
		var mobileErrorStatus = $('#emailToken_status')[0];
		function showCodeError(msg){
			mobileErrorStatus.title = msg || '验证码错误';
			mobileErrorStatus.className = 'error';
		}

		function hideCodeError(){
			mobileErrorStatus.className = 'ok';
			mobileErrorStatus.title = '';
		}
		
		//获取验证码
		var countTimer, countCircle, countdowning = false;
		form.find('a.get_code').bind('click', function(e){
			e.preventDefault();
			if(countdowning){ return; }
			
			var errField;
			var fields = [$('#b_email')];
			for(var i=0;i<fields.length;i++){
				errField = fields[i];
				if(errField.val() == ''){
					errField.showErrorTips(errField.attr('placeholder') + ' 不能为空');
					return;
				}
			};
			
			var ajaxData = {"b_email":$('#b_email').val()};
			$.ajax({
				type:'post',
				url: getEmailTokenUrl,
				data:ajaxData,
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
					if(typeof data.status == 'string' && data.status == 'success'){
		        		
		       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
					}else{
		       	   		if(data.info.item=='email'){
		       	   			data.info.item = 'b_email';
		       	   		}
		       	   		var field = $('#'+data.info.item);
		       	   		field.showErrorTips(data.info.info);

		       	   		ds.stopTimeout(countTimer);
		       	   		restoreCount();
		       	   	}
		        },
		        error:function(){
		        }
		     });
			
			var 
			delay = parseInt(keyTimeOut),
			
			self = $(this).addClass('hide'),
			counter = self.parent().find('.counter em');
			counter.parent().removeClass('hide');

			if(!countCircle){
				countCircle = new Circle({
					container: counter.parent()[0],
					fillColor: '#B4B4B4',
					lineWidth: 2,
					size: 38
				});
			}
			countCircle.update(0, false);
			counter.html(delay);

			countdowning = true;
			ds.stopTimeout(countTimer);
			countTimer = ds.startTimeout(delay*1000, function(queue, c){
				if(c % 4 === 0){
					var s = parseInt(queue.remaining/1000, 10), val = 1 - s/delay;
					counter.html(('00'+s).slice(-2));
					countCircle.update(val);
				}
			}, restoreCount);
			
			function restoreCount(){

				counter.parent().addClass('hide');
				self.removeClass('hide');
				
				countdowning = false;
			}


			$('#emailToken').focus();

		});
		
		form.bind('submit', function(e){
			e.preventDefault();
			
			var errField;
			var fields = [$('#b_email')];
			for(var i=0;i<fields.length;i++){
				errField = fields[i];
				if(errField.val() == ''){
					errField.showErrorTips(errField.attr('placeholder') + ' 不能为空');
					return;
				}
			};
			
			var codeField = $('#emailToken');
			if(codeField.val() == ''){
				//showCodeError();
				return codeField.showErrorTips('验证码不能为空！');
			}

			showBtnLoading();
			
			$.ajax({
				type:'post',
				url: form.attr("action"),
				data:form.serialize(),
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
		        	if(typeof data.status == 'string' && data.status == 'success'){
		        		jump_current_item($('#nextItem').val(),this);
		       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
					}else{
		       	   		hideBtnLoading();
		       	   		var status = data ? data.status : null;
		       	   		var errItems = data.info;
			       	   	if(errItems.item=='email'){
			       	   		errItems.item = 'b_email';
		       	   		}
		       	   		errField = $("#"+errItems.item);
		       	   		errField.showErrorTips(errItems.info);
		       	   	}
		        },
		        error:function(){
		        	hideBtnLoading();
		        }
		     });
		});
	}
	
	function submitPhone(){
		$('#bind_phone_set_form').submit();
	}
	function initPhone(phoneGetCodeUrl,messageType,phoneKeyTimeOut){
		$('#bind_phone_set_form').baseFormHandle();
		var countTimer, form = $('#bind_phone_set_form');
		
		var mobileErrorStatus = $('#mobile_code_status')[0];
		function showCodeError(msg){
			mobileErrorStatus.title = msg || '验证码错误';
			mobileErrorStatus.className = 'error';
		}
		
		function showCodeRight(){
			mobileErrorStatus.className = 'ok';
			mobileErrorStatus.title = '';
		}

		function hideCodeError(){
			mobileErrorStatus.className = 'hide';
			mobileErrorStatus.title = '';
		}
		
		//获取验证码
		var countTimer, countCircle, countdowning = false;
		form.find('a.get_code').bind('click', function(e){
			e.preventDefault();
			if(countdowning){ return; }
			
			var errField = $('#bindphonenumber');
			if(errField.val() == ''){
				errField.showErrorTips('手机号码 不能为空');
				return;
			}
			
			var ajaxData = {"bindphonenumber":$('#bindphonenumber').val(),'messageType':messageType};
			$.ajax({
				type:'post',
				url: phoneGetCodeUrl,
				data:ajaxData,
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
					if(typeof data.status == 'string' && data.status == 'success'){
		        		
		       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
					}else{
		       	   		var field = $('#'+data.info.item);
		       	   		field.showErrorTips(data.info.info);

		       	   		ds.stopTimeout(countTimer);
		       	   		restoreCount();
		       	   	}
		        },
		        error:function(){
		        }
		     });
			
			var 
			delay = parseInt(phoneKeyTimeOut),
			
			self = $(this).addClass('hide'),
			counter = self.parent().find('.counter em');
			counter.parent().removeClass('hide');

			if(!countCircle){
				countCircle = new Circle({
					container: counter.parent()[0],
					fillColor: '#B4B4B4',
					lineWidth: 2,
					size: 38
				});
			}
			countCircle.update(0, false);
			counter.html(delay);

			countdowning = true;
			ds.stopTimeout(countTimer);
			countTimer = ds.startTimeout(delay*1000, function(queue, c){
				if(c % 4 === 0){
					var s = parseInt(queue.remaining/1000, 10), val = 1 - s/delay;
					counter.html(('00'+s).slice(-2));
					countCircle.update(val);
				}
			}, restoreCount);
			
			function restoreCount(){

				counter.parent().addClass('hide');
				self.removeClass('hide');
				
				countdowning = false;
			}


			$('#mobilephoneToken').focus();

		});

		form.bind('submit', function(e){
			e.preventDefault();
			
			var errField = $('#bindphonenumber');
			if(errField.val() == ''){
				errField.showErrorTips('手机号码 不能为空');
				return;
			}
			
			var codeField = $('#mobilephoneToken');
			if(codeField.val() == ''){
				//showCodeError();
				return codeField.showErrorTips('验证码不能为空！');
			}

			showBtnLoading();
			
			$.ajax({
				type:'post',
				url: form.attr("action"),
				data:form.serialize(),
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
		        	if(typeof data.status == 'string' && data.status == 'success'){
		        		jump_current_item($('#nextItem').val(),this);
		       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
					}else{
		       	   		hideBtnLoading();
		       	   		var status = data ? data.status : null;
		       	   		var errItems = data.info;
		       	   		errField = $("#"+errItems.item);
		       	   		errField.showErrorTips(errItems.info);
		       	   	}
		        },
		        error:function(){
		        	hideBtnLoading();
		        }
		     });
		});
		
		var xhr;
		$('#mobilephoneToken').bind('keyup',function(e){
			if(xhr){
				xhr.abort();
			}
			var code = $(this).val();
			if(code==""){
				hideCodeError();
				return;
			}
			if(code.length!=6){
				showCodeError();
				return;
			}
			xhr = $.ajax({
				type:'post',
				url: '',
				data:{"mobilephoneToken":code,"bindphonenumber":$('#bindphonenumber').val()},
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
		        	xhr = null;
		        	if(typeof data.status == 'string' && data.status == 'success'){
		        		showCodeRight();
		       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
					}else{
		       	   		showCodeError();
		       	   	}
		        },
		        error:function(){
		        }
		     });
		});
	}
	
	function submitPayPwd(){
		$('#find_pwd_set_form').submit();
	}
	function initPayPwd(){
		var form = $('#find_pwd_set_form');
		form.bind('submit', function(e){
			e.preventDefault();
			$.hideAllErrorTips();
			var errField;
			var fields = [$('#newPassword'),$('#newPassword2')];
			for(var i=0;i<fields.length;i++){
				errField = fields[i];
				if(errField.val() == ''){
					errField.showErrorTips(errField.parent().find('.analog_tag').html() + ' 不能为空');
					return;
				}
			};
			
			showBtnLoading();
			$.ajax({
				type:'post',
				url: form.attr("action"),
				data:form.serialize(),
				dataType:"json",
				cache: false,
				async: true,
		        success: function(data){
		        	if(typeof data.status == 'string' && data.status == 'success'){
		        		jump_current_item($('#nextItem').val(),this);
		       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
					}else{
		       	   		hideBtnLoading();
		       	   		var status = data ? data.status : null;
		       	   		var errItems = data.info;
		       	   		errField = $("#"+errItems.item);
		       	   		errField.showErrorTips(errItems.info);
		       	   	}
		        },
		        error:function(){
		        	hideBtnLoading();
		        }
		     });
		});
	}
	
	function submitWekey(){
		showBtnLoading();
		jump_current_item($('#nextItem').val(),this);
		return;
		var ajaxData = {'phonenumber':$("#bindphonenumber").val()};
		$.ajax({
			type:'post',
			url: 'index.php?r=site/sendWekeyUrl',
			data:ajaxData,
			dataType:"json",
			cache: false,
			async: true,
	        success: function(data){
	        	if(typeof data.status == 'string' && data.status == 'success'){
	        		jump_current_item($('#nextItem').val(),this);
	       	   	}else if(data && data.status === 'need_login'){
						ds.dialog.alert('登录已失效，需重新登录',function(){window.location = "index.php?r=user/login";});
				}else{
	       	   		hideBtnLoading();
	       	   		var status = data ? data.status : null;
	       	   		var errItems = data.info;
	       	   		errField = $("#"+errItems.item);
	       	   		errField.showErrorTips(errItems.info);
	       	   	}
	        },
	        error:function(){
	        	hideBtnLoading();
	        }
	     });
	}
	
	function buildScore(){
		var num_value=$(".score_num").find(".rel_num").text();
		var ul=$(".security_upBox .score_num .ten ul").eq(0);
		if(num_value>0){
			ul.stop().animate({"top": "-" + (78 * (num_value - 1 ))},500,"easeOutBack");
		}else{
			ul.hide();
		}
	}
	
	function rebindEvent(){
		$('.fCode_usestyle .labcon').delegate('input','focus',function(){
  			var labconValue=$('.fCode_usestyle .labcon').text();
  			$(this).prev('label.analog_tag').hide();
  			$(this).keyup(function(){
  				$(this).siblings('a.input_empty').show();
  			});
  		});
  		$('.fCode_usestyle .labcon').delegate('input','blur',function(){	
  			$(this).siblings('a.input_empty').hide(200);			
  			if($(this).val()==''){
  				$(this).prev('label.analog_tag').show();
  			}else{
  				$(this).prev('label.analog_tag').hide();		
  			}
  		});	
  		$('.fCode_usestyle .labcon').delegate('a.input_empty','click',function(){
  			$(this).hide();
  			$(this).parent('.labcon').find('input').val('');
  			$(this).parent('.labcon').find('label.analog_tag').show();
  		});
	}
</script>
<div style="display:none" id="syn_div">
</div>
</body>
</html>