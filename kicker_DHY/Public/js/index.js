$(function(){

	$(".shopClass").hover(function(){
		$(this).css("background-color","#4593FD");
		$(".shopClass_show").fadeIn();
	},
		function(){
			$(this).css("background-color","");
			$(".shopClass_show").fadeOut();
	});

	$(".imgA").click(function(){

		var imgid = $(this).attr("imgid");
		$(".imgA").removeClass("active");
		$(this).addClass("active");

		$(".imgBoxLi").fadeOut();
		$(".img"+imgid).fadeIn();
	});

	/*购物车*/
	$(".shopCar").hover(function(){
		$(".cart_inner").show();
	},function(){
		$(".cart_inner").hide();
	});

	

})


/*删除购物车中的商品*/
function delCart(gid){
	$.ajax({
		type : "POST",
		url : delCartUrl,
		data : {gid : gid},
		success : function(){				
			$("li[gid ="+gid+"]").remove();
			//再次获取商品的总价
			$.ajax({
				type : 'POST',
				url : getTotalUrl,
				data : {},
				success : function(res){
					if (res == false) {
						$(".total_num").html('0');				
						$(".total_price").html('0');
					};
					var total_num = res["total_num"];
					var total_price = res['total_price'];
					$(".total_num").html(total_num);				
					$(".total_price").html(total_price);
				}
			});
		}
	});
}

/*清空购物车*/
function clearCart(){
	$.ajax({
		type : "POST",
		url : clearCartUrl,
		data : {},
		success : function(res){
			if (res.status == 1) {
				var html = "";
				html += '<div class="no_carts">';
				html += '购物车中还没有商品，去逛逛吧^_^';
				html += '</div>';
				$(".cart_inner ul").html('');
				$(".total_num").html('0');
				$(".total_price").html('0');
				$(".cart_inner").prepend(html);
			};
		}
	});
}
