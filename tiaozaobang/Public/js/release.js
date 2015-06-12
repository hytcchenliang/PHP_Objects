$(function(){
	//文本框获得焦点与失去焦点时改变其颜色
	$(".form-input-wr input,.form-input-wr textarea").focus(function(){
		$(this).parent().removeClass("form-alert");
		$(this).parent().css({"border-color":"rgb(68, 193, 165)","background-color":"rgb(255, 255, 255)"});
	});
	$(".form-input-wr input,.form-input-wr textarea").blur(function(){
		if($(this).val()==''){
			$(this).parent().css({"border-color":"rgb(208, 224, 226)","background-color":"rgb(246, 249, 249)"});
		}
	});

	//添加图片
	$(".up-img-bg,.upload-img").click(function(){
		$("input[name=photo]").click();
	});

	//fileinput值发生改变时的事件
	$("input[name=photo]").change(function(){
		$("#add_photo").click();
		$(".photo-area").removeClass("init-up").addClass("over-up");
		$(".up-img-bg").addClass("hide");
		$(".up-bg").addClass("hide");
		if($("#upload-area>.photo").length==3){
			$(".upload-img").addClass("hide");
		}
	});

	//取消选中的将要上传的图片
	$(document).on('click','span.close',function(){
		$(this).parent().remove();
		if($("#upload-area>.photo").length<4){
			$(".upload-img").removeClass("hide");
		}
		if($("#upload-area>.photo").length<1){
			$(".photo-area").removeClass("over-up").addClass("init-up");
			$(".up-img-bg").removeClass("hide");
			$(".up-bg").removeClass("hide");
		}
	});

	//选择商品的一级分类
	$(".goods-cat .form-value").click(function(){
		$(this).find(".select").addClass("show");
		$(".goods-cat .form-value-l").removeClass("show");
	});

	$(".goods-cat .form-value ul li").click(function(){
		$(this).parent().removeClass("show");
		var cat_id=$(this).attr("value");
		var cat_name=$(this).find("span").text();
		var pk=$(this).attr("pk");
		$("#cat").attr("value",cat_id);
		$(".goods-cat .form-input-wr span").text(cat_name);
		$(".goods-cat .form-input-wr").css({"border-color":"rgb(68, 193, 165)","background-color":"rgb(255, 255, 255)"});
		$("#cat_l").attr("value",'');
		$(".goods-cat .form-input-l-wr span").text("请选择");
		$(".form-value-l").addClass("show");
		$(".form-value-l ul li").removeClass("show")
		$(".form-value-l ul li."+pk).addClass("show");
		return 0;
	});

	//选择商品的二级分类
	$(".goods-cat .form-value-l").click(function(){
		$(this).find(".select").addClass("show");
	});

	$(".goods-cat .form-value-l ul li").click(function(){
		$(this).parent().removeClass("show");
		var cat_id=$(this).attr("value");
		var cat_name=$(this).find("span").text();
		$("#cat_l").attr("value",cat_id);
		$(".goods-cat .form-input-l-wr span").text(cat_name);
		$(".goods-cat .form-input-l-wr").css({"border-color":"rgb(68, 193, 165)","background-color":"rgb(255, 255, 255)"});
		$(".form-value-l").addClass("show");
	});
	$(document).click(function(){
		$(".goods-cat ul.select").removeClass("show");
	});

	//选择商品价格是否可刀
	$(".goods-discount span").click(function(){
		$(this).siblings().removeClass("sel");
		$(this).addClass("sel");
		$("#discount").attr("value",$(this).attr("data-value"));
	});

	//提交发布数据
	$(".form-submit").click(function(){
		var photos=$("#upload-area>.photo");
		var imgArr=new Array("","","","");
		for(var i=0;i<photos.length;i++){
			imgArr[i]=photos.eq(i).find("img").attr("src");
		}
		var goodimg1=imgArr[0],goodimg2=imgArr[1],goodimg3=imgArr[2],goodimg4=imgArr[3];
		var title=$("#title").val(),desc=$("#desc").val(),trade_place=$("#trade_place").val(),
		price=$("#price").val(),tel=$("#tel").val(),qq=$("#qq").val(),discount=$("#discount").val();
		var catArr=Array($("#cat").val(),$("#cat_l").val());
		var category=(catArr[1]=='')?catArr[0]:catArr[1];
		if(goodimg1==''){
			alertMsg("要有图有真相哦！亲！");
			return;
		}
		if(title==''||desc==''||trade_place==''||price==''){
			alertMsg("每项数据都不能留空哦！亲！");
			return;
		}
		if(tel==''&&qq==''){
			alertMsg("请至少留下qq或tel其中一个联系方式！亲！");
			return;
		}
		if($("#form-share").prop("checked")==false){
			alertMsg("亲！要发布商品必须同意本协议哦！");
			return;
		}
		if(Valid_Form.validGoodTitle(title)==false){
	    	alertMsg("商品标题最多25个字");
	    	return;
	     }else if (Valid_Form.validGoodDes(desc)==false) {
	    	alertMsg("商品描述至少15个字");
	    	return;
	    }else if (Valid_Form.validPlace(trade_place)==false) {
	    	alertMsg("交易地点最多20字");
	    	return;
	    }else if (Valid_Form.validPrice(price)==false) {
	    	alertMsg("价格需为5位以内的整数");
	    	return;
	    }else if (Valid_Form.validTel(tel)==false) {
	    	alertMsg("您的手机号码输入有误");
	    	return;
	    }else if (Valid_Form.validQQ(qq)==false) {
	    	alertMsg("qq号为6-12位数字");
	    	return;
	    }else if (category=='') {
	    	alertMsg("请给商品归类吧！亲！");
	    	return;
	    }else{
		    $("#circular-loading").removeClass('hidden');
		    var data={
		    	goodname : title, gooddes : desc, price : price, place : trade_place,
		        	category : category, discount : discount, goodimg1 : goodimg1,
		        	 goodimg2 : goodimg2, goodimg3 : goodimg3, goodimg4 : goodimg4
		    }
		    $.post(
		        '/tiaozaobang/Home/Release/publish',
		        data,
		        function(res) {
		            $("#circular-loading").addClass('hidden');
		            if (res != 'fail') {
		                $(".reg-cover").hide();
		                window.location.href='/tiaozaobang/Home/goods/index?goodsid='+res;
		            }else{
		            	alertMsg("发布失败");
		            }
		        }
		    );
		}
	});
	$(".goods-desc .form-key").click(function(){
		alert(Valid_Form.validGoodDes($("#desc").val()));
	});
	//编辑发布数据
	$(".form-submit2").click(function(){
		var photos=$("#upload-area>.photo");
		var imgArr=new Array("","","","");
		for(var i=0;i<photos.length;i++){
			imgArr[i]=photos.eq(i).find("img").attr("src");
		}
		var goodimg1=imgArr[0],goodimg2=imgArr[1],goodimg3=imgArr[2],goodimg4=imgArr[3];
		var goodsid=$("button.form-submit2").attr("edit_goodsid"),title=$("#title").val(),desc=$("#desc").val(),
		trade_place=$("#trade_place").val(),price=$("#price").val(),tel=$("#tel").val(),qq=$("#qq").val(),
		discount=$("#discount").val();var catArr=Array($("#cat").val(),$("#cat_l").val());
		var category=(catArr[1]=='')?catArr[0]:catArr[1];
		if(goodimg1==''){
			alertMsg("要有图有真相哦！亲！");
			return;
		}
		if(title==''||desc==''||trade_place==''||price==''){
			alertMsg("每项数据都不能留空哦！亲！");
			return;
		}
		if(tel==''&&qq==''){
			alertMsg("请至少留下qq或tel其中一个联系方式！亲！");
			return;
		}
		if($("#form-share").prop("checked")==false){
			alertMsg("亲！要发布商品必须同意本协议哦！");
			return;
		}
		if(Valid_Form.validGoodTitle(title)==false){
	    	alertMsg("商品标题最多25个字");
	    	return;
	     }else if (Valid_Form.validGoodDes(desc)==false) {
	    	alertMsg("商品描述至少15个字");
	    	return;
	    }else if (Valid_Form.validPlace(trade_place)==false) {
	    	alertMsg("交易地点最多20字");
	    	return;
	    }else
	     if (Valid_Form.validPrice(price)==false) {
	    	alertMsg("价格需为5位以内的整数");
	    	return;
	    }else if (Valid_Form.validTel(tel)==false) {
	    	alertMsg("您的手机号码输入有误");
	    	return;
	    }else if (Valid_Form.validQQ(qq)==false) {
	    	alertMsg("qq号为6-12位数字");
	    	return;
	    }else if (category=='') {
	    	alertMsg("请给商品归类吧！亲！");
	    	return;
	    }else{
		    $("#circular-loading").removeClass('hidden');
		    var data={
		    	goodid : goodsid, goodname : title, gooddes : desc, price : price, place : trade_place,
		        	category : category, discount : discount, goodimg1 : goodimg1,
		        	 goodimg2 : goodimg2, goodimg3 : goodimg3, goodimg4 : goodimg4
		    }
		    $.post(
		        '/tiaozaobang/Home/edit/update',
		        data,
		        function(res) {
		            $("#circular-loading").addClass('hidden');
		            if (res == 'ok') {
		                $(".reg-cover").hide();
		                window.location.href='/tiaozaobang/Home/goods/index?goodsid='+goodsid;
		            }else{
		            	alertMsg("修改失败");
		            }
		        }
		    );
		}
	});
});

function addPhoto(imgpath){
	var html='';
	html+='<div class="photo">';
    html+='    <div><img src="'+imgpath+'" alt="上传的图片" class="image"></div>';
    html+='    <span class="close"></span>';
    html+='</div>';
    $(html).insertBefore($("#upload"));
}

