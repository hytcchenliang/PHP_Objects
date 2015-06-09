<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link type="text/css" rel="stylesheet" href="/kicker/Public/style/reset.css">
<link type="text/css" rel="stylesheet" href="/kicker/Public/style/main.css">
<script type="text/javascript" src="/kicker/Public/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/kicker/Public/js/index.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
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
<div class="banner clearfix">
	<div class="banner_bar banner_big">
		<ul class="imgBox">
			<li class="imgBoxLi img1" style="display:none;"><a href="#"></a></li>
			<li class="imgBoxLi img2"><a href="#"></a></li>
		</ul>
		<div class="imgNum">
			<a href="javascript:;" class="imgA" imgid = "1"></a>
			<a href="javascript:;" class="imgA active" imgid="2"></a>
		</div>
		<a href="javascript:;" class="prev"></a>
		<a href="javascript:;" class="next"></a>
	</div>
</div>
<div class="shopArea">
	<div class="shopTit comWidth">
		<span class="icon"></span><h3>1F 球衣</h3>
		<a href="<?php echo U("Home/Filter/index");?>?cid=1&page=1" class="more">更多&gt;&gt;</a>
	</div>
	<div class="shopList comWidth clearfix">
		<div class="leftArea">
			<div class="banner_bar banner_sm">
				<ul class="imgBox">
					<li><a href="#"><img src="/kicker/Public/images/left1.png" alt="banner"></a></li>
					<li><a href="#"><img src="/kicker/Public/images/left1.png" alt="banner"></a></li>
				</ul>
				<div class="imgNum">
					<a href="#" class="active">
				</div>
			</div>
		</div>
		<div class="rightArea">
			<div class="shopList_top clearfix">
				<?php if(is_array($close_goods)): foreach($close_goods as $key=>$good): ?><div class="shop_item">
						<div class="shop_img">
							<a href="<?php echo U("Home/Detail/index");?>?gid=<?php echo ($good["gid"]); ?>"><img src="/kicker/Public/<?php echo ($good["goods_img"]); ?>" alt=""></a>
						</div>
						<div class="goods_info">
							<h3><?php echo ($good["main_title"]); ?></h3>
							<p>
								<span style="margin-right:10px;">￥<?php echo ($good["old_price"]); ?></span>
								已售
								<span><?php echo ($good["buy"]); ?></span>
								件
							</p>
						</div>
					</div><?php endforeach; endif; ?>		
			</div>
		</div>
	</div>
</div>
<div class="shopArea">
	<div class="shopTit comWidth">
		<span class="icon"></span><h3>2F 球鞋</h3>
		<a href="<?php echo U("Home/Filter/index");?>?cid=3&page=1" class="more">更多&gt;&gt;</a>
	</div>
	<div class="shopList comWidth clearfix">
		<div class="leftArea">
			<div class="banner_bar banner_sm">
				<ul class="imgBox">
					<li><a href="#"><img src="/kicker/Public/images/left3.png" alt="banner"></a></li>
				</ul>
				<div class="imgNum">
					<a href="#" class="active">
				</div>
			</div>
		</div>
		<div class="rightArea">
			<div class="shopList_top clearfix">
				<?php if(is_array($shoes_goods)): foreach($shoes_goods as $key=>$good): ?><div class="shop_item">
						<div class="shop_img">
							<a href="<?php echo U("Home/Detail/index");?>?gid=<?php echo ($good["gid"]); ?>"><img src="/kicker/Public/<?php echo ($good["goods_img"]); ?>" alt=""></a>
						</div>
						<div class="goods_info">
							<h3><?php echo ($good["main_title"]); ?></h3>
							<p>
								<span style="margin-right:10px;">￥<?php echo ($good["old_price"]); ?></span>
								已售
								<span><?php echo ($good["buy"]); ?></span>
								件
							</p>
						</div>
					</div><?php endforeach; endif; ?>		
			</div>
		</div>
	</div>
</div>
<div class="shopArea">
	<div class="shopTit comWidth">
		<span class="icon"></span><h3>3F 足球</h3>
		<a href="<?php echo U("Home/Filter/index");?>?cid=4&page=1" class="more">更多&gt;&gt;</a>
	</div>
	<div class="shopList comWidth clearfix">
		<div class="leftArea">
			<div class="banner_bar banner_sm">
				<ul class="imgBox">
					<li><a href="#"><img src="/kicker/Public/images/left4.png" alt="banner"></a></li>
				</ul>
				<div class="imgNum">
					<a href="#" class="active">
				</div>
			</div>
		</div>
		<div class="rightArea">
			<div class="shopList_top clearfix">
				<?php if(is_array($soccer_goods)): foreach($soccer_goods as $key=>$good): ?><div class="shop_item">
						<div class="shop_img">
							<a href="<?php echo U("Home/Detail/index");?>?gid=<?php echo ($good["gid"]); ?>"><img src="/kicker/Public/<?php echo ($good["goods_img"]); ?>" alt=""></a>
						</div>
						<div class="goods_info">
							<h3><?php echo ($good["main_title"]); ?></h3>
							<p>
								<span style="margin-right:10px;">￥<?php echo ($good["old_price"]); ?></span>
								已售
								<span><?php echo ($good["buy"]); ?></span>
								件
							</p>
						</div>
					</div><?php endforeach; endif; ?>		
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