$(function(){
	//选中下拉列表
	$(".sel-hd").click(function(){
		$(".sel-content").removeClass("slide-down");
		$(this).parent().find(".sel-content").addClass("slide-down");
	});

	//选择学校列表中的学校
	$(".sel-school .sel-items li a").click(function(){
		var schoolid=$(this).attr("value");
		//两次所选学校不同时清空上一次所选二级学院信息
		if(schoolid!=$(".sel-school").attr("pk")){
			$(".sel-academy").attr("pk",'');
			$(".sel-academy").find("input").attr("value",'');
		}
		$(".sel-school").attr("pk",schoolid);
		var schoolname=Trim.trim($(this).text());
		$(".sel-school").find("input").attr("value",schoolname);
		$(".sel-school").find(".sel-content").removeClass("slide-down");
		
		//异步获取所选学校所有的二级学院信息
		$.post(
	        '/tiaozaobang/Home/User/getacademy',
	        {schoolid : schoolid},
	        function(res) {
	            $(".sel-academy").find(".sel-items").html(res);
	        }
	    );
	});

	//选择二级学院列表中的学院
	$(document).on("click",".sel-academy .sel-items li a",function(){
		$(".sel-academy").attr("pk",$(this).attr("value"));
		var academy=Trim.trim($(this).text());
		$(".sel-academy").find("input").attr("value",academy);
		$(".sel-academy").find(".sel-content").removeClass("slide-down");
	});

	//选择入学年份
	$(".sel-adyear .sel-items li a").click(function(){
		$(".sel-adyear").attr("pk",$(this).attr("value"));
		var adyear=Trim.trim($(this).text());
		$(".sel-adyear").find("input").attr("value",adyear);
		$(".sel-adyear").find(".sel-content").removeClass("slide-down");
	});

	//提交学校信息
	$(".optpk-btn").click(function(){
		var schoolid = $(".sel-school").attr("pk");
		var deptid = $(".sel-academy").attr("pk");
		var grade = $(".sel-adyear").attr("pk");
		$.post(
	        '/tiaozaobang/Home/User/updateSchoolInfo',
	        {schoolid : schoolid, deptid : deptid, grade : grade},
	        function(res) {
	            if(res=='ok'){
	            	$("p.tip").removeClass("hidden");
	            	setTimeout(autoGoto,1000);
	            }else{
	            	alert("提交失败！");
	            }
	        }
	    );
	});

	setTimeout(isComplete,100);
});


//检测用户是否完成全部信息的录入，是则显示提交按钮
function isComplete(){
	var schoolSelected=($(".sel-school").attr("pk").length==0)? false : true;
	var academySelected=($(".sel-academy").attr("pk").length==0)? false : true;
	var adyearSelected=($(".sel-adyear").attr("pk").length==0)? false : true;
	if(schoolSelected && academySelected && adyearSelected){
		$(".optpk-container").removeClass("hidden");
	}else{
		$(".optpk-container").addClass("hidden");
	}
	setTimeout(isComplete,100);

}

//成功提交信息后自动跳转页面
var time=3;
function autoGoto(){
	time--;
	$("p.tip i").text(time);
	if(time==0){
		window.location.href='/tiaozaobang';
	}
	setTimeout(autoGoto,1000);
}

//去除多余空格
var Trim={
 	trim:function(str){ //删除左右两端的空格
　　    return str.replace(/(^\s*)|(\s*$)/g,"");
　　},
　　ltrim:function(str){ //删除左边的空格
　　    return str.replace(/(^\s*)/g,"");
　　},
　　rtrim:function(str){ //删除右边的空格
　　    return str.replace(/(\s*$)/g,"");
　　},
}