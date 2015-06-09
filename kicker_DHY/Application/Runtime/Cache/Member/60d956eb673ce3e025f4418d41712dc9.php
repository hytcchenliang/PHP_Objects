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

<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>
<body>
<div class="headerBar">
	<div class="topBar">
		<div class="comWrap">
			<div class="leftArea">
				<a href="#" class="collection">收藏kicker</a>
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
					<li class="s01">我的购物车</li>
					<li class="s02">填写核对订单</li>
					<li class="s03 active">订单提交成功</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="clearfix wrap container checkout_shell checkout_result">	<div class="clearfix info_box" tabindex="-1">
		<div class="con">
			<div class="con_t">
				<div class="con_b">
					<div class="main_info">
						<form action="http://www.fengbuy.com/ucenter-client/index/pay/order_id/132389/key/af6aa2c8157d3e5d5ddf274698429405/" method="post" target="_blank">
							<i class="ico success"></i>
							<h2>感谢您在踢球者商城购物，订单已成功提交！</h2>
							<ul>
								<li>订单编号：<a href="<?php echo U('Member/Order/ViewOrder');?>?order_id=<?php echo ($order_id); ?>">141949319946960</a><input type="button" value="查看订单" onclick="window.open(this.getAttribute('data-url'), '_blank')" data-url="<?php echo U('Member/Order/ViewOrder');?>?order_id=<?php echo ($order_id); ?>"></li>
								<li>支付方式：在线支付</li>
								
								<li class="tips"><strong><i></i>请于60分钟内完成支付，逾时系统将取消您的订单！</strong></li>
								
								<li class="price">应付总价：<em>¥<?php echo ($order_total); ?>元</em></li>
							</ul>
							<button type="submit" class="btn pay_btn"><span>支付中心支付</span></button>	
						</form>
					</div>
					<div class="info_bottom">您的订单已经在处理中，如果您有任何问题可以与我们联系;<br>电话：400-607-8090（踢球者商城客户服务热线）<br>或【<a href="http://www.fengbuy.com/account/message/index/" target="_blank">联系客服</a>】</div>
					<div class="info_tips">
						<h4>温馨提示：</h4>
						<p>您在收货时，若发现下列情形，请您务必<strong>拒收</strong>并与我们联系：</p>
						<p>1. 外包装有明显污损及其他损坏情况</p>
						<p>2. 产品原包装已拆封或有明显污损及其他损坏情况</p>
					</div>
				</div>
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