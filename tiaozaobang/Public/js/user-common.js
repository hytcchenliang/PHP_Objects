$(function(){
	
	//打开修改头像窗口
	$("#origin_ph").mouseover(function(){
		$("#change_ph").css("display","block");
	});
	$("#change_ph").mouseleave(function(){
		$(this).css("display","none");
	});
	$("#change_ph").click(function(){
		$(".head-img-box").removeClass("hide");
	});
	//关闭修改头像窗口
	$("#close-head-img,#cancel-img-box").click(function(){
		$(".head-img-box").addClass("hide");
		$("#op-container").removeClass("hide");
		$("#selectbanner").attr("src",'');
		$("#selectbanner").addClass("hide");
		$("#previewImg").attr("src",'');
		$(".wrap-previewArea").addClass("hide");
	});

	//选择上传头像
	$("input[name=photo]").click(function(){
		loading('1');
	});
	$("#upload-person-img").click(function(){
		$("input[name=photo]").click().change(function(){
			$("#changePh").click();
		});
	});

	
	//上传图片的裁剪操作
	$("#selectbanner").imgAreaSelect({
        aspectRatio: '1:1',
        handles: true,
        onSelectChange: preview,
        onSelectEnd: function (img, selection) {
            var originalImg = new Image();
            originalImg.src = $("#selectbanner").attr("src");//定义一个和原图一样image对象，以此获取原图的真实宽高
            var scaleX = originalImg.width / img.width;
            var scaleY = originalImg.height / img.height;
            x1 = Math.round(scaleX * selection.x1);
            y1 = Math.round(scaleY * selection.y1);
            selectwidth = Math.round(scaleX * selection.width);
            selectheight = Math.round(scaleY * selection.height);
            $("#person-img").attr("src",$("#selectbanner").attr("src"));
            photo=$("#person-img").attr("src");
        }
    });

	//确认上传裁剪图片
    $("#upload-ok").click(function(){
    	if($("#selectbanner").attr("src")==''){
    		alertMsg("亲！您还没有完成上传图片，让伦家如何继续！");
    		return;
    	}
    	if(photo==''){
    		alertMsg("亲！为了防止头像失真，还是把图片裁剪下吧！");
		    return;
    	}
    	$("#circular-loading").removeClass('hidden');
    	$.post(
	        '/tiaozaobang/Home/User/crop',
	        {x1 : x1, y1 : y1,selectwidth : selectwidth,selectheight : selectheight,photo : photo},
			function(data) { 
				$.post(
			        '/tiaozaobang/Home/User/updateheadimg',
			        {imgpath : $("#selectbanner").attr("src")},
			        function(data) { 
						$("#circular-loading").addClass('hidden');
			            window.location.reload();
					}
				);
			}
	    );
    });
    
});


//上传图片时loading动画的显隐
function loading(state){
	if (state=='0') {
		$("img.loading").addClass("hide");
	}else{
		$("img.loading").removeClass("hide");
	}
}
//上传成功后将上传的图片加载出来用于裁剪
function ShowPhoto(photoUrl){
	$("#op-container").addClass("hide");
	$("#selectbanner").attr("src",photoUrl);
	$("#selectbanner").removeClass("hide");
	$("#previewImg").attr("src",photoUrl);
	$(".wrap-previewArea").removeClass("hide");
}
//裁剪图片预览
function preview(img, selection) {
    var scaleX = 200 / (selection.width || 1);
    var scaleY = 200 / (selection.height || 1);
    $("#previewImg").css({
        "width": Math.round(scaleX * img.width) + 'px',
        "height": Math.round(scaleY * img.height) + 'px',
        "left": '-' + Math.round(scaleX * selection.x1) + 'px',
        "top": '-' + Math.round(scaleY * selection.y1) + 'px'
    });
}
//定义全局变量，保存真实裁剪的图片信息
var x1 = 0, y1 = 0, selectwidth = 200, selectheight = 200,photo='';