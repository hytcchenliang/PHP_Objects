$(function(){
	$(document).ready(viewsAdd());
	//商品图片切换显示效果
	$(".ershou-small-photos").mouseover(function(){
		var src=$(this).find("img").attr("src");
		$(".bigger").attr("src",src);
		$(".small").removeClass("cur");
		$(this).find("img").addClass("cur");
	});

	//评论前登录
	$(".comment-login").click(function(){
		$(".login-cover").show();
	});

	//评论框字数控制
	$("textarea[name=comment-input]").keyup(function(){
		var text=$(this).val();
		if(text.length>140){
			$(this).val(text.substring(0,140));
		}
	});
		
	//提交评论
	$(".sub-comment").click(function(){
		var commentContent=$("textarea[name=comment-input]").val();
		if(commentContent.length==0){
			alertMsg("评论不能为空");
			return;
		}
		if(commentContent.length>250){
			alertMsg("字数超出限制");
			return;
		}
		var senderHeadimg=$("#person_info").find(".avatar").attr("src");
		var sendername=$("#person_info").find(".person_name").text();
		var receivername=$("input#receivername").val();
		var parentmsg=$("input#parentMsgId").val();
		var senderid=$("input#senderid").val();
		var receiverid=$("input#receiverid").val();
		var goodsid=$("#goods_id").val();
		
		$.post(
	        '/tiaozaobang/Home/Goods/comment',
	        {senderid : senderid, receiverid : receiverid, goodsid : goodsid, msgcontent : commentContent, parentmsg : parentmsg},
	        function(res) {
				var html='';
				html+='<div class="comment">';
		        html+='    <img class="avatar" src="'+senderHeadimg+'" alt="头像">';
		        html+='    <div class="commentator">';
		        html+='        '+sendername;
		        if(parentmsg!='0'){
		        	html+='    	<span class="rpy-to">'+receivername+'</span>';
		        }
		        html+='    </div>';
		        html+='    <p class="comment">'+commentContent+'</p>';
		        html+='    <div class="man">';
		        html+='        <span class="rpl" href="javascript:;" onclick="reply('+res+','+senderid+',\''+sendername+'\')">回复</span>';
		        html+='    </div>';
		        html+='</div>';
				$(html).insertBefore($(".post-comment"));
				clearCommentWr();
	        }
	    );
	});
});

//增加浏览数
function viewsAdd(){
	var goodsid = $("#goods_id").val();
	$.post(
        '/tiaozaobang/Home/Goods/viewsAdd',
        {goodsid : goodsid},
        function() {
        }
    );
}

//添加收藏
function favorites(){
	var goodsid = $("#goods_id").val(),
        favorites_num = parseInt($(".ershou-favorite").text());
	$.post(
        '/tiaozaobang/Home/Goods/favorites',
        {goodsid : goodsid},
        function(res) {
	        if (res== '0') {
	            alertMsg("您尚未登录，请登录，亲！");
	            return;
	        }
	        if (res== '1') {
	            favorites_num++;
	            $(".ershou-favorite").css('background-image', 'url("/tiaozaobang/Public/css/images/heart_full.png")');
	        } else {
	            favorites_num--;
	            $(".ershou-favorite").css('background-image', 'url("/tiaozaobang/Public/css/images/heart.png")');
	        }
	        $(".ershou-favorite").text(favorites_num);
        }
    );
}

//回复评论
function reply(msgid,senderid,sendername){
	$("input#parentMsgId").val(msgid);
	$("input#receiverid").val(senderid);
	$("input#receivername").val(sendername);
	$("textarea[name=comment-input]").attr("placeholder",'回复 '+sendername+'：');
	$("textarea[name=comment-input]").focus();
}
//清空评论框
function clearCommentWr(){
	var nomalReceiverid=$("input#nomalReceiverid").val();
	$("input#parentMsgId").val('0');
	$("input#receiverid").val(nomalReceiverid);
	$("textarea[name=comment-input]").attr("placeholder","");
	$("textarea[name=comment-input]").val('');
}