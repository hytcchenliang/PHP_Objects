<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>订单列表</title>
	<link type="text/css" rel="stylesheet" href="/kicker/Public/style/reset.css">
	<link type="text/css" rel="stylesheet" href="/kicker/Public/style/main.css">	
	<link rel="stylesheet" type="text/css" href="/kicker/Public/style/account.css">
	<link rel="stylesheet" type="text/css" href="/kicker/Public/style/base2.css">
	<link rel="stylesheet" type="text/css" href="/kicker/Public/style/cart.css">
	<script type="text/javascript" src="/kicker/Public/js/jquery-1.10.2.js"></script>
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
					<div><a href="<?php echo U('Member/Order/history');?>">[个人中心]</a></div>
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
<div id="container" class="clearfix wrap container">
	<!--Main-->
 <div id="personal_info" class="content"> 
	<div class="account-content address_manage">
      <div class="title_bar">
			<h2 id="orderView_order_no">订单号142000685849550 - 等待付款</h2>
						<a href="http://www.fengbuy.com/ucenter-client/index/pay/order_id/133291/key/d656abaeb9454c306bd1d6eb112e1c09" target="_blank" class="btn_n_pay btn btn_mt"><span>现在支付</span></a>
			<span id="order_countdown" class="countdown" title="订单保留剩余时间"><i></i><em>剩余 58分11秒</em></span>
						<span class="function_btn">
			<a href="http://www.fengbuy.com/account/order/history/" class="btn_function btn" id="orderView_back"><span>返回</span></a>
						<a href="#" class="btn_function btn" id="orderView_cancelOrder"><span>取消订单</span></a>
									<a href="http://www.fengbuy.com/account/order/print/order_id/133291" target="_blank" class="btn_function btn"><span>打印订单</span></a>
			</span>
		</div>
   
        <div class="personal_account clearfix">
		<div class="commodity_consult">
		  	
          <p class="explain" style="padding-left:72px">尊敬的客户，请您在60分钟内（自订单提交成功之时起算）完成付款，逾时系统将自动取消您的订单！</p>
           
          <!--步骤-->
          										<div class="step_order">
								<div class="inner">
									<ol class="steps">
										<li id="status1" class="first"><span class="done"><em>提交订单</em><i></i></span></li>
										<li id="status2"><span class="wait"><em>等待客服处理</em><i></i></span></li>
										<li id="status3"><span><em>商品出库</em><i></i></span></li>
										<li id="status4"><span><em>配货发货</em><i></i></span></li>
										<li id="status5" class="last"><span><em>完成</em><i></i></span></li>
									</ol>
								</div>
							</div>
											<!--货到付款步骤-->
						<div class="tab_nav mt">
							<ul>
															<li><a href="#order_items" class="current">订购商品</a></li>
																<li><a href="#order_info">订单信息</a></li>
								<li><a href="#order_trace">订单跟踪</a></li>
																<li><a href="#flow_info">物流跟踪</a></li>
															</ul>
						</div>
						  		 			 <!-- 订单商品 -->
					<div id="order_items" class="order-items">
						<div class="order_title"><h3>订购商品
												</h3></div>
						<div class="info-list" id="mycomments_shell"> 
						<!-- item list begin -->
							<table class="data-table cart-table">
								<thead>
									<tr>
										<th>商品图</th>
										<th>商品信息</th>
																				<th>价格</th>
										<th>件数</th>
										<th>小计</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="product_img">
											<a href="#"  target="_blank"><img src="http://www.fengbuy.com/media/catalog/product/cache/1/thumbnail/100x/9df78eab33525d08d6e5fb8d27136e95/h/_/h_2.jpg" >
											</a>
										</td>
										<td>
											<h2 class="product-name">
											<a href="#" target="_blank">Innerexile 因乐 capsule 独创斜切断面设计 LED电源显示 双USB 车载充电器-红色
											</a></h2>
											选择尺码:红色
											<br>	
										</td>
										<td class="a-right"><span class="cart-price"> <span class="price">¥148</span> </span>
										</td>
										<td class="a-center">1</td>
										<td><span class="cart-price"> <span class="price">¥148</span> </span></td>
									</tr>
									<tr>
										<td class="product_img"><a href="#"  target="_blank"><img src="" ></a>
										</td>
										<td>
											<h2 class="product-name"> <a href="http://www.fengbuy.com/mcdodo-for-ipad-air-6161.html" target="_blank">MCDODO/麦多多 纳米超强防爆钢化玻璃保护膜 高清贴膜 独家AKR表面处理 for iPad Air/2-玻璃膜</a></h2>
											选择尺码:玻璃膜<br>
										</td>
										<td class="a-right"><span class="cart-price"> <span class="price">¥78</span> </span>
										</td>
										<td class="a-center">1</td>
										<td><span class="cart-price"> <span class="price">¥78</span> </span></td>
									</tr>
								</tbody>
							</table>
						<!-- item list end -->
						<div class="step_total">
						      
							<table>
								<tbody>
									<tr>
										<th>订单商品小计：</th>
										<td><span id="summary_subtotal">¥226</span></td>
									</tr>
													                    
				                    				                    
				                     				                    				                    				                    				                    <tr>
										<th>运费：</th>
										<td>+ <span id="summary_shipping_fee">¥0.00</span></td>
									</tr>
									<tr>
										<td colspan="2" class="b">
											实付金额：<strong class="summary_total">¥226.00</strong>
											<p><span class="other-info">价格已包含所有费用</span></p>
										</td>
									</tr>
								</tbody>
							</table>
													 </div>
						</div>
					</div>
							 			 <!-- 订单信息 -->
				<div id="order_info" class="my-account_content box-account order-details">
					 <dl class="order-info">
		             <dd>
		              <ul id="order-info-tabs">
		                <li class="current">订单信息</li>
		              </ul>
		            </dd>
		          </dl>
		          <!--<p class="order-date">订单日期：2011年12月15日</p> -->
		          <div class="col2-set order-info-box clearfix">
		            <div class="col-1">
		              <div class="box">
		                <h2>物流信息 </h2>
		                <div class="box-content"> 快递公司：顺丰速运<br>
					                  配送方式：顺丰速运<br>
					                  快递单号：<!--  <span class="tracking"><a href="#">物流跟踪</a></span>--><br>
					                  预计到达时间: 预计到达时间以快递官方公示为准；具体收货时间以实际当地派送为准<br>
		                </div>
		              </div>
		            </div>
		            <div class="col-2">
		              <div class="box">
		                <h2>配送地址</h2>
		                <div class="box-content">
		                  <address>
					                  联系人：欧赔<br>
					                  地址：天津市天津市河西区的弟弟弟弟<br>
					                  邮政编码：300000<br>
					                  固定电话：-<br>
					                  移动电话：18352332612		                  </address>
		                </div>
		              </div>
		            </div>
		          </div>
		          <div class="col2-set order-info-box clearfix">
		          	<div class="col-1">
		              <div class="box">
		                <h2>发票信息</h2>
		                	                	<div class="box-content"> 没有开具发票  </div>
	                			              </div>
		            </div>
		            <div class="col-2">
		              <div class="box box-payment">
		                <h2>支付信息</h2>
		                <div class="box-content">
		                  <div class="box-content">
										                  		<p>支付金额: ¥0.00</p>
			                		                  	  <p>余额支付: ¥0.00 </p>
						 </div>
		                </div>
		              </div>
		            </div>
		          </div>
		          			</div>
		  <!-- 订单跟踪 -->
		  <div id="order_trace">
			<div class="order_title"><h3>订单跟踪</h3></div>
			<table class="order-data-table data-table">
                <thead><tr><th width="368">处理时间</th><th>处理信息</th></tr></thead>
                <tbody id="orderView_history"><tr>	<td>2014-12-31 14:20:59</td>	<td>提交订单成功</td></tr></tbody>
              </table>
		  </div>
		  <!-- 物流跟踪 -->
		  		  <div id="flow_info">
			<div class="order_title"><h3>物流跟踪</h3></div>
			<table class="order-data-table data-table" style="border-bottom-width:1px;">
				<thead><tr><th colspan="2">物流信息</th></tr></thead>
				<tbody>
					<tr>
						<td>快递公司：<em>顺丰速运</em></td>
						<td>快递单号：<em></em></td>
					</tr>
				</tbody>
			</table>
			<table class="order-data-table data-table">
				<thead><tr><th width="368">处理时间</th><th>处理信息</th></tr></thead>
				<tbody id="logistics_history"><tr><td colspan="2"><div class="user_level_info_tips"><p><em style="color:red;font-size:14px;margin-right:.3em">*</em>很抱歉，物流公司未能返回有效的查询结果，可能是由于物流公司未能及时录入物流跟踪信息，请稍后再试。您可尝试通过物流公司官方查询页面进行查询，请点击这里【<a target="_blank" href="http://www.sf-express.com"><strong>顺丰速运</strong></a>】</p></div></td></tr></tbody>
			  </table>
		  </div>
		  		  <!-- Bottom Links -->
          <div class="buttons-set">
            <p class="back-link"><a href="<?php echo U('Member/Order/history');?>"><small>« </small>返回我的订单</a></p>
          </div>


   </div> 
   </div>
  </div>
  </div>
   <!--Sliderbar-->
	 

<div class="sliderbar">	<div class="slider header_slider">	<div class="header_box">		<span class="up_kuang"></span>		<span><img width="52" height="52" alt="" src="http://q.qlogo.cn/qqapp/100537426/805D716FC702D5C4A2BB774B4CD873E8/100"></span>	</div>	<div class="name"><h3>Hi~QQ用户梅小跳</h3>	</div>	<div class="person_info">		<p><span>会员等级：</span><b>注册会员</b></p>		<p><span>积分：</span>0</p>		<p><span>优惠券：</span>0</p>		<p><span>现金卡：</span>0</p>		<p><span>We券：</span>0</p>	</div></div>	<div class="slider wf_slider">	<div class="title">		<h2><a href="http://www.fengbuy.com/account/order/account/">我的kicker商城</a></h2>	</div>		<div class="slider category_slider">			<ul><li><dl><dt><a href="javascript:;" class="close"></a><a href="javascript:;">交易管理</a></dt><dd><a href="<?php echo U('Member/Order/history');?>" class="">我的订单</a></dd><dd><a href="http://www.fengbuy.com/account/return/index/" class="">我的退换货</a></dd><dd><a href="<?php echo U('Member/Collect/index');?>" class="">我的收藏</a></dd></dl></li><li><dl><dt><a href="javascript:;" class="close"></a><a href="javascript:;">客户服务</a></dt><dd><a id="_FB_myComments" href="<?php echo U('Member/Order/Comments');?>" class="">商品评价/晒单<span class="reply">新回复<em>(0)</em></span></a></dd><dd><a id="_FB_myConsults" href="http://www.fengbuy.com/account/consult/productConsult/" class="">商品咨询<span class="reply">新回复<em>(0)</em></span></a></dd><dd><a id="_FB_myMessages" href="http://www.fengbuy.com/account/message/index/" class="">我的留言<span class="reply">新回复<em>(0)</em></span></a></dd><dd><a id="_FB_myArrivals" href="http://www.fengbuy.com/account/alerts/index/" class="">到货提醒<span class="reply">新通知<em id="arrivalEm">(0)</em></span></a></dd><dd><a id="_FB_myReduces" href="http://www.fengbuy.com/account/notification/index/" class="">降价通知<span class="reply">新通知<em id="deprreciateEm">(0)</em></span></a></dd></dl></li><li><dl><dt><a href="javascript:;" class="close"></a><a href="javascript:;">账户管理</a></dt><dd><a href="http://www.fengbuy.com/account/accountInfo/accountInfo/" class="">个人账户</a></dd><dd><a href="http://www.fengbuy.com/account/accountInfo/accountAddress/" class="">地址管理</a></dd><dd><a href="http://www.fengbuy.com/account/integral/index/" class="">我的积分</a></dd><dd><a href="http://www.fengbuy.com/account/giftCard/index/" class="">我的优惠券</a></dd><dd><a href="http://www.fengbuy.com/account/cashCard/index/" class="">我的现金卡</a></dd><dd><a href="http://www.fengbuy.com/account/mylevel/index/" class="">我的会员等级</a></dd><dd><a href="http://www.fengbuy.com/account/prize/index/" class="">我的奖品</a></dd><dd><a href="http://www.fengbuy.com/account/try/index/" class=""><em class="tips new">New</em>我的试用</a></dd></dl></li>			</ul>		</div></div><script type="text/javascript">jQuery(function($){var rtype=/(open|close)/i,getData=function(dt){var parentDl=dt.data('parent_dl')||dt.parent(),minHeight=dt.data('min_height')||dt.height(),maxHeight=dt.data('max_height')||parentDl.height();if(!dt.data('parent_dl')){dt.data('parent_dl',parentDl);dt.data('min_height',minHeight);dt.data('max_height',maxHeight);}return{parentDl:parentDl,minHeight:minHeight,maxHeight:maxHeight};},maxLength=13,rchs=/[^\u0000-\u00ff]/g,shell=$('.category_slider');shell.click(function(e){var isOpen,data,tar=e.target,dt=$(tar).parent();if(rtype.test(tar.className)&&dt[0].nodeName.toUpperCase()==='DT'){isOpen=RegExp.$1.toLowerCase()==='close';(data=getData(dt)).parentDl.animate({height:isOpen?data.minHeight:data.maxHeight});tar.className=isOpen?'open':'close';e.preventDefault();}});});</script></div></div>
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">kicker简介</a><i>|</i><a href="#">kicker公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 kicker权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="/kicker/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/kicker/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/kicker/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/kicker/Public/images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>