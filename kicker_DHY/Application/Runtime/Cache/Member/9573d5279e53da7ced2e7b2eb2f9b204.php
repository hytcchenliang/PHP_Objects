<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>提交订单</title>
<link type="text/css" rel="stylesheet" href="/kicker/Public/style/reset.css">
<link type="text/css" rel="stylesheet" href="/kicker/Public/style/main.css">
<link rel="stylesheet" type="text/css" href="/kicker/Public/style/base.css">
<link rel="stylesheet" type="text/css" href="/kicker/Public/style/cart.css">
<script type="text/javascript" src="/kicker/Public/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$(function(){
		/*减少购物车商品数*/
		$(".cut").click(function(){
			var num = parseInt($(this).parent().find(".cart_num").val());
			if (num>1) {
				$(this).parent().find(".cart_num").val(num-1);
			};
		});

		$(".plus").click(function(){
			var num = parseInt($(this).parent().find(".cart_num").val());
			$(this).parent().find(".cart_num").val(num+1);
		});

		$(".add_address_btn").click(function(){
			$(".new_address").slideDown();
		});

		$(".cancel_add").click(function(){
			$(".new_address").hide();
		});

		$(".step_radio[is_default='1']").addClass('selected');

		$(".step_radio").click(function(){
			$(".step_radio").removeClass('selected');
			$(this).addClass('selected');
		});

		//复选框
		$("#all").click(function(){
			if ($(this).attr('select')=='1') {
				$(".chk_cart").removeAttr('checked');
				$(this).attr('select','0');
			}else{
				$(".chk_cart").click();
				$(".chk_cart").attr('checked',true);
				$(this).attr('select','1');
			}
		});



	});
/*更新购物车商品数量*/
function updateCartNum(gid){
	var num = $(".cart_num[gid="+gid+"]").val();
	$.ajax({
		type : "POST",
		url : updateUrl,
		data : {gid : gid , num : num},
		success:function(res){
			if (res.status == true) {
				var price = $(".cart_num[gid="+gid+"]").parent().parent().find('.price').html();
				var total_price = res['carts']['total_price'];
				var xiaoji = price * num;
				$(".cart_num[gid="+gid+"]").parent().parent().find('.xiaoji').html(xiaoji);
				$(".order_price").html(total_price);
			};
		}
	});
}
/*自增购物车数量*/
function incCartNum(cart_id){
	var num = $(".cart_num[cid="+cart_id+"]").val();
	$.ajax({
		type : 'POST',
		url : IncUrl,
		data : {cart_id : cart_id},
		success : function(res){	
			var total_price = res['total_price'];
			$(".order_price").html(total_price);
			var key = $(".xiaoji[cid="+cart_id+"]").attr('k');
			var xiaoji = res['carts'][key]['xiaoji'];
			$(".xiaoji[cid="+cart_id+"]").html(xiaoji);
		}
	});
}
/*自减购物车数量*/
function decCartNum(cart_id){
	var num = parseInt($(".cart_num[cid="+cart_id+"]").val());
	if (num>1) {
		$.ajax({
			type : 'POST',
			url : DecUrl,
			data : {cart_id : cart_id},
			success : function(res){		
				var total_price = res['total_price'];
				$(".order_price").html(total_price);
				var key = $(".xiaoji[cid="+cart_id+"]").attr('k');
				var xiaoji = res['carts'][key]['xiaoji'];
				$(".xiaoji[cid="+cart_id+"]").html(xiaoji);
			}
		});
	};
	
}

/*验证收货地址*/
function checkAddress(){
	var errorStr = '';
	if ($("#firstname").val() == '') {
		errorStr = '请填写收货人！';
	};
	if ($("#s_province").val()=='省份' || $("#s_city").val()=='地级市' || $("#s_county").val()=='市、县级市') {
		errorStr = '请填写省市县！';
	};
	if ($("#street").val()=='') {
		errorStr = '请填写街道地址！';
	};
	if ($("#mobile").val()=='' && $("#telephone_number").val()=='') {
		errorStr = '请填写联系方式';
	};
	if (errorStr != '') {
		alert(errorStr);
		return false;
	};
	$("#addressForm").submit();
	
}
/*添加订单*/
function addOrder(){
	var cartIdStr = '';
	var address_id = $(".selected input").val();
	var remark = $("#customer_note").val();
	var total_price = $(".order_price").html();
	$(".chk_cart:checked").each(function(){
		cartIdStr += $(this).val()+',';
	});
	if (cartIdStr == '') {
		alert('请勾选需要购买的商品！');
		return false;
	}else{
		location.href = addOrderUrl+"?cartIdStr="+cartIdStr+"&address_id="+address_id+"&remark="+remark+"&total_price="+total_price+"";
	}
}
</script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>
<body>
<!-- <div class="headerBar">
	<div class="topBar">
		<div class="comWrap">
			<div class="leftArea">
				<a href="#" class="collection">收藏kicker</a>
			</div>
			<div class="rightArea">
				欢迎来到慕课网！<a href="#">[登录]</a><a href="#">[免费注册]</a>
			</div>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWrap">
			<div class="logo fl">
				<a href="#"></a>
			</div>
			<div class="stepBox fr">
				<div class="step"></div>
				<ul class="step_text">
					<li class="s01 active">我的购物车</li>
					<li class="s02">填写核对订单</li>
					<li class="s03">订单提交成功</li>
				</ul>
			</div>
		</div>
	</div>
</div> -->
<script type="text/javascript" src="/kicker/Public/js/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="/kicker/Public/style/jquery-ui.css">
<script type="text/javascript">
$(function() {
    var availableTags = [
      "巴萨",
      "曼联",
      "曼城",
      "切尔西",
      "米兰",  
      "阿森纳",
      "阿贾克斯",
      "足球鞋",
      "短袖球衣",
      "足球",
      "美津浓",
      "内马尔",
      "C罗",
      "梅西",
      "碎丁足球鞋"
    ];
    $(".search_text" ).autocomplete({
      source: availableTags
    });
 });
	var addCartUrL = '<?php echo U("Member/Cart/Add");?>';
	var delCartUrl = '<?php echo U("Member/Cart/del");?>';
	var clearCartUrl = '<?php echo U("Member/Cart/clearCart");?>';
	var updateUrl = '<?php echo U("Member/Cart/updateGoodsNum");?>';
	var IncUrl = '<?php echo U("Member/Cart/IncCartNum");?>';
	var DecUrl = '<?php echo U("Member/Cart/DecCartNum");?>';
	var getTotalUrl = '<?php echo U("Member/Cart/getTotalPrice");?>';
	var addOrderUrl = '<?php echo U("Member/Order/addOrder");?>';
	var addCollectUrl = '<?php echo U("Member/Collect/addCollect");?>';
	var delCollectUrl = '<?php echo U("Member/Collect/delCollect");?>';

function countCart(){
	var obj = $(".cart_inner li").html();
	if (obj == undefined) {
		alert('购物车中还没有商品');
	}else{
		window.location.href='<?php echo U("Member/Cart/index");?>';
	}
}
/*搜索关键词*/
function searchKeyword(){
	var keyword = $(".search_text").val();
	if (keyword == "") {
		alert('请输入关键词');
	}else{
		window.location.href='<?php echo U("Home/Filter/index");?>?k='+keyword+'&page=1';
	}
}
</script>
<div class="headerBar">
	<div class="topBar">
		<div class="comWrap">
			<div class="leftArea">
				<a href="#" class="collection">收藏踢球者！</a>
			</div>
			<div class="rightNav">
				<?php if($userIsLogin): ?><div>欢迎您：<?php echo ($userName); ?></div>
					<div><a href="<?php echo U('Member/Order/account');?>">[个人中心]</a></div>
					<div><a href="<?php echo U('Member/Login/logout');?>">[注销]</a></div>
					<?php else: ?>	
						<!--登录注册-->
						<div><a class='title' href="<?php echo U('Member/Reg/index');?>">[注册]</a></div>
						<div><a class='title' href="<?php echo U('Member/Login/index');?>">[登录]</a></div><?php endif; ?>	
			</div>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWrap">
			<div class="logo fl">
			</div>
			<div class="search_box fl">
				<input type="text" class="search_text fl" onkeydown="javascript:if(event.keyCode==13) searchKeyword();">
				<input type="button" value="搜 索" class="search_btn fr" onclick="searchKeyword()">
			</div>
			<div class="shopCar fr">
				<span class="shopText fl">购物车</span>
				<span class="shopNum fr total_num">
					<?php if($total_num): echo ($total_num); ?>
						<?php else: ?>0<?php endif; ?>
				</span>
				<div class="cart_inner">
					<ul>
						<?php if($carts): if(is_array($carts)): foreach($carts as $key=>$val): ?><li gid=<?php echo ($val["gid"]); ?>>
									<a href="" class="pic">
										<img src="/kicker/Public/<?php echo ($val["goods_img"]); ?>">
									</a>
									<p class="tit"><?php echo ($val["main_title"]); ?></p>
									<div class="prop">
										单价:
										<em>￥<?php echo ($val["price"]); ?></em>
										数量：
										<em class="gnum"><?php echo ($val["goods_num"]); ?></em>
									</div>
									<a href="javascript:;" class="del" gid=<?php echo ($val["gid"]); ?> onclick="delCart(<?php echo ($val["gid"]); ?>)"></a>
								</li><?php endforeach; endif; ?>
							<?php else: ?>
								<div class="no_carts">
									购物车中还没有商品，去逛逛吧^_^
								</div><?php endif; ?>			
					</ul>
					<div class="cart_funs">
						<div class="total">
							共有
							<span class="total_num">
								<?php if($total_num): echo ($total_num); ?>
									<?php else: ?>0<?php endif; ?>								
							</span>
							件商品
							小计:￥
							<span class="total_price">
								<?php if($total_price): echo ($total_price); ?>
									<?php else: ?>0<?php endif; ?>
							</span>
						</div>
						<div class="btns clear">
							<a href="javascript:;" class="cart_btns clear_btn" onclick="clearCart()">清空购物车</a>
							<a href="javascript:;" class="cart_btns count_btn" onclick="countCart()">立即结算</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="navBox">
		<div class="comWrap clearfix">
			<div class="shopClass fl">
				<h3><a href="<?php echo U("Home/index/index");?>">全部商品分类</a><i class="shopClass_icon"></i></h3>
				<div class="shopClass_show">
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
				</div>
				<div class="shopClass_list hide">
					<div class="shopClass_cont">
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a>
							</dd>
						</dl>
					</div>
				</div>
			</div>
			<ul class="nav fl">
				<li><a href="#" class="active">数码城</a></li>
				<li><a href="#">天黑黑</a></li>
				<li><a href="#">团购</a></li>
				<li><a href="#">发现</a></li>
				<li><a href="#">二手特卖</a></li>
				<li><a href="#">名品会</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="shoppingCart">
	<div class="inner_cart">
		<div class="title">
			<h2>
				<i class="cart"></i>
					结账
			</h2>
		</div>
		<div class="inner clear">
			<!--收货地址-->
			<div class="one_step addr_step">
					<div class="step_title"><h3><em class="index">1</em>选择收货地址</h3></div>
					<div class="step_main" id="addressUl">
						<div class="clearfix step_radio_wrap">
							<?php if(is_array($address)): foreach($address as $key=>$val): ?><div class="step_radio" is_default="<?php echo ($val["is_default"]); ?>">
								<input type="radio" name="billing_address_id" id="billing_address_id_86425" provinceid="2" cityid="2" value="<?php echo ($val["address_id"]); ?>" checked=""><label for="addr_1"><span class="city_name"><?php echo ($val["province"]); ?> <?php echo ($val["city"]); ?><em><?php echo ($val["country"]); ?></em><strong class="name">（<em><?php echo ($val["consignee"]); ?></em>收）</strong></span>	<span class="addr_tel"><?php echo ($val["street"]); ?>&nbsp;（<?php echo ($val["consignee"]); ?>&nbsp;收）<em>联系电话：<?php echo ($val["tel"]); ?> </em> 
		                        </span></label><div class="btns"><a href="javascript:;" data-addrid="86425" class="btn edit"><span>修改地址</span></a><a href="javascript:;" onclick="saveAddressDefault(86425)" class="btn set_def"><span>设为默认</span></a></div><i class="arrow"></i>
	                        	</div><?php endforeach; endif; ?>	
                        </div>
						<div class="add_addr">	
						<a href="javascript:;" class="add_address_btn"><i class="add"></i><span>新增收货地址</span></a>
						</div>
						<div class="new_address" style="display:none">
							<form id="addressForm" name="addressForm" action="<?php echo U("Member/Cart/addAddress");?>" method="post" >
							<input type="button" class="add_input" value="确定" onclick="checkAddress()">
							<input type="button" class="cancel_add" value="取消">
							<input type="hidden" name="id" id="id" value="0">
							<input type="hidden" name="country_id" id="country_id" value="CN">
							<table width="100%" border="0" cellspacing="0" cellpadding="0"> 
								<tbody>
									<tr>
										<th><em>*</em><label for="firstname">收货人：</label></th> 
										<td><input name="firstname" id="firstname" type="text" value=""><em id="firstname_error" class="error_em"></em></td>
									</tr>
									<tr>
										<th><em>*</em>省：</th> 
										<td><label for="region_id"><select id="s_province" name="province"></select></label><em>市：<select id="s_city" name="city" ></select></em><em>区县：<select id="s_county" name="country"></select></em><em id="address_error" class="error_em"></em>
										<p class="note">
										<script type="text/javascript" src="/kicker/Public/js/area.js"></script>
										<script type="text/javascript">_init_area();</script>
										若列表中没有您需要的区县地址信息，请将您的区县地址填入街道地址中</p> </td> 
									</tr>
									<tr>
										<th><em>*</em><label for="postcode">邮编：</label></th> 
										<td><input name="postcode" id="postcode" type="text" size="10" placeholder="6位数字" value=""><em id="postcode_error" class="error_em"></em></td> 
									</tr>
									<tr>
										<th><em>*</em><label for="street">街道地址：</label></th>
										<td><textarea name="street" id="street" rows="2" cols="10"></textarea><em id="street_error" class="error_em"></em></td> 
									</tr>
									<tr>
										<th><em>*</em><label for="mobile">手机：</label></th> 
										<td>
											<input name="mobile" id="mobile" type="text" value="" placeholder="手机号码"><em id="phone_error" class="error_em"></em>
											<div class="note">手机、固定电话可任选一项填写</div>
										</td>
									</tr>
									<tr>
										<th><label for="telephone_area_code">固定电话：</label></th>
										<td><input name="telephone_area_code" id="telephone_area_code" type="text" value="" placeholder="区号"><em>-</em><input name="telephone_number" id="telephone_number" type="text" value="" placeholder="电话号码"><em id="telephone_error" class="error_em"></em></td> 
									</tr>
								</tbody>
							</table> 
							</form>
						</div>
					</div>
			</div>
			<!--支付和配送-->
			<div class="one_step ship_step">
					<div class="step_title has_err"><h3><em class="index">2</em>支付和配送</h3></div>
					<div class="step_main">
												<div class="clearfix step_radio_wrap">
							<div class="step_radio_tit">请选择支付方式<!-- <em>（在线支付享双倍积分）</em> --></div>
							 			            	<div id="pay_type_1" class="step_radio selected">
							  <label for="pay_mode1" style="background-image:url(http://www.fengbuy.com/skin/frontend/fengbuy/default/images/pay_type_1.png)">
							    <em>
							      在线支付<b>享双倍积分</b>
							    </em>
							  </label>
							  <label for="pay_mode1" class="ext" style="background-image:url(http://www.fengbuy.com/skin/frontend/fengbuy/default/images/support_pay_online.png);width:190px">
							    <span>
	
							      支持银联和支付宝
							    </span>
							  </label>
							  <input name="pay_mode" id="pay_mode1" type="radio" value="online" onchange="changeShippingMethod(this); return false ;" checked="checked">
							  <i class="arrow">
							  </i>
							</div>
							<div id="pay_type_2" class="step_radio ">
							  <label for="pay_mode2" style="background-image:url(http://www.fengbuy.com/skin/frontend/fengbuy/default/images/pay_type_0.png)">
							    <em>
							      货到付款
							    </em>
							  </label>
							  <input type="radio" name="pay_mode" id="pay_mode2" value="cod" onchange="changeShippingMethod(this); return false ;">
							  <i class="arrow">
							  </i>
							</div>		
			                						</div>
						<div class="clearfix step_radio_wrap ship_radio_wrap">
							<div class="step_radio_tit">
								<span>请选择运送方式</span>
								<span class="hintInfo">商品金额满<em>59</em>元圆通申通包邮，满<em>188</em>元顺丰EMS包邮</span>
								<a class="fareInfo" href="http://www.fengbuy.com/others?id=41/" title="运费说明" target="_blank" id="ship_notes">运费说明</a>
								<a class="limitation" href="javascript:;" title="配送时效" id="fareInfo">配送时效</a>
							</div>
							<div id="shippingContent"><div class="step_radio "><label for="shipping_method_5" style="background-image:url(http://www.fengbuy.com/skin/frontend/fengbuy/default/images/shunfeng.png)"><em>顺丰速运</em></label><div class="note"><span>+10元</span></div><input type="radio" value="5" name="shipping_method" id="shipping_method_5" onchange="calculateShippingMethod()" code="SF"><i class="arrow"></i></div><div class="step_radio selected"><label for="shipping_method_8" style="background-image:url(http://www.fengbuy.com/skin/frontend/fengbuy/default/images/sto.png)"><em>申通快递</em></label><div class="note"><span>免邮费</span></div><input type="radio" value="8" name="shipping_method" id="shipping_method_8" onchange="calculateShippingMethod()" code="STO" checked=""><i class="arrow"></i></div><div class="step_radio "><label for="shipping_method_6" style="background-image:url(http://www.fengbuy.com/skin/frontend/fengbuy/default/images/ems.png)"><em>EMS</em></label><div class="note"><span>+10元</span></div><input type="radio" value="6" name="shipping_method" id="shipping_method_6" onchange="calculateShippingMethod()" code="EMS"><i class="arrow"></i></div></div>
						</div>
						<!-- <div class="intro">主要大中城市能按时到达（包含次日达1天，隔日达2-3天），偏远及非派送区需要转其它快递。</div> -->
					</div>
			</div>
			<!--备注-->
			<div class="one_step remark_step">
				<div class="step_title"><h3><em class="index">3</em>备注说明</h3></div>
				<div class="step_main">
					<p class="tit">添加备注：（对订单的要求或特别注明）</p>
					<div class="txt_area"><p class="count">剩余<em id="remarkLength">120</em>字</p><textarea name="customer_note" id="customer_note" rows="3" cols="100" onkeyup="checkRemarkLength(this,'remarkLength')"></textarea></div>
				</div>
			</div>
			<!--购物车列表-->
			<div class="cart_order_list">
				<div class="step_title"><h3><em class="index">4</em>商品清单</h3></div>
				<div class="cart_order">
					<ul>
						<li class="chk">
							<input type="checkbox" id="all" title="全选" select="1" checked>
							<label for="all">全选</label>
						</li>
						<li class="pic">商品图</li>
						<li class="tit">商品/属性</li>
						<li class="price">单价</li>
						<li class="count">数量</li>
						<li class="amount">小计</li>
					</ul>
				</div>
				<div class="cart_list">
					<ul class="cart_ul">
						<?php if(is_array($carts)): foreach($carts as $key=>$val): ?><li class="cart_item">
							<span class="chk">
								<input type="checkbox"  class="chk_cart" checked value="<?php echo ($val["cart_id"]); ?>">
							</span>
							<div class="pro_info">
								<div class="pro_props clear">
									<a href="" class="pic">
										<img src="/kicker/Public/<?php echo ($val["goods_img"]); ?>">
									</a>
									<h4 class="tit">
										<a href=""><?php echo ($val["main_title"]); ?></a>
									</h4>
									<em class="price"><?php echo ($val["price"]); ?></em>
									<span class="count_wrap">
										<a href="javascript:;" class="cut" onmouseup="decCartNum(<?php echo ($val["cart_id"]); ?>)"></a>
										<input type="text" value="<?php echo ($val["goods_num"]); ?>" class="cart_num" gid="<?php echo ($val["gid"]); ?>" cid="<?php echo ($val["cart_id"]); ?>" onblur="updateCartNum(<?php echo ($val["gid"]); ?>)">
										<a href="javascript:;" class="plus" onmouseup="incCartNum(<?php echo ($val["cart_id"]); ?>)"></a>
									</span>
									<em class="price total_price">
										￥
										<span class="xiaoji" cid="<?php echo ($val["cart_id"]); ?>" k="<?php echo ($key); ?>"><?php echo ($val["xiaoji"]); ?></span>
									</em>
									<a href="javascript:;" class="del_cart">收藏</a>
								</div>
								<div class="pro_infos clear">
									<div class="attr_info">已选尺寸：<?php echo ($val["goods_attr"]); ?></div>
									<div class="stock_info">现货供应</div>
								</div>
							</div>
							</li><?php endforeach; endif; ?>			
					</ul>
				</div>
			</div>
			<div class="cart_total_num">
			订单总计：￥
			<span class="order_price"><?php echo ($total_price); ?></span>
			</div>
			<div class="cart_buy clear">
				<a href="javascript:;" class="cal_btn" onclick="addOrder()">现在结账</a>
			</div>
		</div>		
	</div>
</div>
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">kicker简介</a><i>|</i><a href="#">kicker公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 kicker权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="/kicker/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/kicker/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/kicker/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/kicker/Public/images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>