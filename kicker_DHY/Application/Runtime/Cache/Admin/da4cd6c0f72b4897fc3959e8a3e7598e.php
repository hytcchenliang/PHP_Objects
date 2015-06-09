<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/kicker/Public/skin/css/reset.css" /> <!-- RESET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/kicker/Public/skin/css/main.css" /> <!-- MAIN STYLE SHEET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/kicker/Public/skin/css/2col.css" title="2col" /> <!-- DEFAULT: 2 COLUMNS -->
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="/kicker/Public/skin/css/1col.css" title="1col" /> <!-- ALTERNATE: 1 COLUMN -->
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="/kicker/Public/skin/css/main-ie6.css" /><![endif]--> <!-- MSIE6 -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/kicker/Public/skin/css/style.css" /> <!-- GRAPHIC THEME -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/kicker/Public/skin/css/mystyle.css" /> <!-- WRITE YOUR CSS CODE HERE -->
    <!-- <script type="text/javascript" src="/kicker/Public/skin/Js/My97DatePicker/WdatePicker.js"></script>  -->
   <link rel="stylesheet" media="screen,projection" type="text/css" href="/kicker/Public/skin/Js/jquery-calendar.css" />
	<script type="text/javascript" src="/kicker/Public/skin/Js/jquery.js"></script>    
	<script type="text/javascript" src="/kicker/Public/skin/Js/switcher.js"></script>
	<script type="text/javascript" src="/kicker/Public/skin/Js/toggle.js"></script>
	<script type="text/javascript" src="/kicker/Public/skin/Js/ui.core.js"></script>
	<script type="text/javascript" src="/kicker/Public/skin/Js/ui.tabs.js"></script>
	<!--<script type="text/javascript" src="/kicker/Public/skin/Js/ui.selectable.js"></script>-->
    <script type="text/javascript" src="/kicker/Public/skin/Js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="/kicker/Public/skin/Js/jquery.imagePreview.js"></script>
    <script type="text/javascript" src="/kicker/Public/skin/Js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/kicker/Public/skin/Js/jquery-calendar.js"></script>
    
    
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
		var imgsrc=$('#btn-create img').attr('src');
		$('#btn-create img').hover(function(){
			var regexp=new RegExp('(.*)\.jpg$');
			this.src=this.src.replace(regexp,"$1_2.jpg");
		},function(){
			this.src=imgsrc;
		})
		//$("#listform tbody").selectable();
	});
	</script>
	<title><?php echo C('SYSTEM_NAME'); echo C('SYSTEM_VAR');?></title>
</head>

<body>
<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">

		<p class="f-left box">

			<!-- Switcher -->
			<span class="f-left" id="switcher">
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="/kicker/Public/skin/design/switcher-1col.gif" alt="1 Column" /></a>
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="/kicker/Public/skin/design/switcher-2col.gif" alt="2 Columns" /></a>
			</span>

			项目名称: <strong><?php echo C('SYSTEM_NAME');?></strong>

		</p>

		<p class="f-right">User: <strong><a href="#"><?php echo ($userName); ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="<?php echo U('Index/loginOut');?>" id="logout">Log out</a></strong></p>

	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">

		<ul class="box f-right">
			<li><a href="/kicker/" target="_blank"><span><strong>网站首页 &raquo;</strong></span></a></li>
		</ul>

		<ul class="box">
			<li id="menu-active"><a href="<?php echo U('Admin-Index/index');?>"><span>首页</span></a></li> <!-- Active -->
			<li><a href="<?php echo U('Ad/adlist');?>"><span>广告管理</span></a></li>
			<li><a href="<?php echo U('Orders/orderslist');?>"><span>订单管理</span></a></li>
			<li><a href="<?php echo U('Members/memberslist');?>"><span>会员管理</span></a></li>
			<li><a href="<?php echo U('Cate/catelist');?>"><span>类别管理</span></a></li>
			<li><a href="<?php echo U('Products/productslist');?>"><span>产品管理</span></a></li>
			<li><a href="<?php echo U('Article/articlelist');?>"><span>文章管理</span></a></li>
            <li><a href="<?php echo U('Setting/Cache');?>"><span>更新缓存</span></a></li>
		</ul>

	</div> <!-- /header -->



	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Logo (Max. width = 200px) -->
				<p id="logo"><a href="/kicker/" target="_blank" ><img src="/kicker/Public/skin/admin/easy_logo.jpg" alt="Our logo" title="Visit Site" style=" border:none;" /></a></p>

				<!-- Search -->
				<form action="<?php echo U('Products/productslist');?>" method="get">
					<fieldset>
						<legend>产品搜索</legend>

						<p><input type="text" size="17" name="name" class="input-text" />&nbsp;<input type="submit" value="OK" class="input-submit-02" /><br />
                        <select name="cateid" class="input-text" style="width:100%">
                        <option value="">请选择...</option>
                         <option value="isnew">最新产品</option>
                        <option value="ishot">热卖产品</option>
                        <option value="isrec">推荐产品</option>
                        <option value="isprice">特价产品</option>
                        <option value="isdown">下架产品</option>
                        <?php if(is_array($catetree)): $i = 0; $__LIST__ = $catetree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo class_str_insert($vo['deep'],"&nbsp;&nbsp;&nbsp;"); echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <br />
						

					</fieldset>
				</form>

				<!-- Create a new project -->
				<p id="btn-create" class="box"><a href="<?php echo U('Products/add');?>"><span>添加产品</span></a></p>

			</div> <!-- /padding -->

			<ul class="box">
				
                <li id="submenu-active"><a href="javascript:void(0);">系统设置</a> <!-- Active -->
					<ul>
						<li><a href="<?php echo U('Setting/base');?>">基本设置</a></li>
						<li><a href="<?php echo U('Setting/payment');?>">支付设置</a></li>
						<li><a href="<?php echo U('Shipping/index');?>">配送方式</a></li>
						
					    <li><a href="<?php echo U('Members/discountlist');?>">折扣管理</a></li>
                        <li><a href="<?php echo U('Currencies/currencieslist');?>">货币设置</a></li>
                        <li><a href="<?php echo U('Setting/mail');?>">邮件设置</a></li>
                        <li><a href="<?php echo U('Ad/adlist');?>">广告管理</a></li>
                        <li><a href="<?php echo U('Sitemap/index');?>">网站地图</a></li>
                       <!-- <li><a href="<?php echo U('Webcall/index');?>">客服管理</a></li>-->
                        <li><a href="<?php echo U('Coupon/index');?>">优惠券</a></li>
                        <li><a href="<?php echo U('Ipblock/index');?>">区域封锁</a></li>
                        <li><a href="<?php echo U('Newsletter/index');?>">邮件订阅</a></li>
                        <li><a href="<?php echo U('Nav/index');?>">自定义导航</a></li>
                        <li><a href="<?php echo U('Setting/ShippingAddress');?>">发货地址</a></li>
                        <li><a href="<?php echo U('Sqlbackup/index');?>">数据库备份</a></li>
                        <li><a href="<?php echo U('Templates/index');?>">模板管理</a></li>
					</ul>
				</li>
                <li id="submenu-active"><a href="javascript:void(0);">分类管理</a> <!-- Active -->
					<ul>
						<li><a href="<?php echo U('Cate/add');?>">添加分类</a></li>
						<li><a href="<?php echo U('Cate/catelist');?>">分类列表</a></li>
                        <li><a href="<?php echo U('Brand/brandlist');?>">品牌管理</a></li>
                        <li><a href="<?php echo U('Virtualcat/index');?>">虚拟分类</a></li>
					</ul>
				</li>
                <li id="submenu-active"><a href="javascript:void(0);">产品管理</a> <!-- Active -->
					<ul>
						<li><a href="<?php echo U('Products/add');?>">添加产品</a></li>
                        <li><a href="<?php echo U('Products/productslist');?>">产品列表</a></li>
						<li><a href="<?php echo U('Type/catelist');?>">产品类型</a></li>
						<li><a href="<?php echo U('Products/csv');?>">批量CSV</a></li>
						
                        <li><a href="<?php echo U('Products_ask/index');?>">网站留言</a></li>
						<li><a href="<?php echo U('Products/batchedit');?>">批量修改</a></li>
                        <li><a href="<?php echo U('Products/easyupload');?>">批量上传</a></li>
                        <li><a href="<?php echo U('Ftpbatch/index');?>">批量处理</a></li>
					</ul>
				</li>
                <li id="submenu-active"><a href="javascript:void(0);">会员/订单管理</a> <!-- Active -->
					<ul>
					
					    <li><a href="<?php echo U('Members/groupslist');?>">会员等级</a></li>
						<li><a href="<?php echo U('Members/memberslist');?>">会员列表</a></li>
						<li><a href="<?php echo U('Members/points');?>">会员积分</a></li>
                        <li><a href="<?php echo U('Orders/orderslist');?>">订单列表</a></li>
					</ul>
				
                <li id="submenu-active"><a href="javascript:void(0);">文章/下载管理</a> <!-- Active -->
					<ul>
						<li><a href="<?php echo U('Article/add');?>">新增文章</a></li>
						<li><a href="<?php echo U('Article/articlelist');?>">文章列表</a></li>
                        <li><a href="<?php echo U('Article_cate/catelist');?>">文章类别</a></li>
						<li><a href="<?php echo U('Down/downlist');?>">下载列表</a></li>
                        <li><a href="<?php echo U('Down_cate/catelist');?>">下载类别</a></li>
					</ul>
				</li>
				<li id="submenu-active"><a href="javascript:void(0);">权限维护</a> <!-- Active -->
					<ul>
						<li><a href="<?php echo U('Role/roleList');?>">角色管理</a></li>
						<li><a href="<?php echo U('Node/nodelist');?>">节点管理</a></li>
                        <li><a href="<?php echo U('User/userlist');?>">后台用户</a></li>
					</ul>
				</li>
		
				
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />
		
		
<script type="text/javascript">
var submenu_active=$.cookie('submenu_active') || 0;
$('#aside ul.box>li>ul').each(function(i){
	if(i!=submenu_active){
		$(this).hide();
	}
});
$('#aside ul.box>li>ul>li>a').each(function(){
	if($(this).attr('href')==$.cookie('submenu_active_a')){
		$(this).css({'font-weight':'bold'});
	}
});
$('#aside ul.box>li>ul>li>a').click(function(){
	$.cookie('submenu_active_a',$(this).attr('href'));
});
$('#aside ul.box>li>a').click(function(){
	$.cookie('submenu_active',$(this).parent().index());
	$(this).parent().children('ul').toggle('fast').parent().siblings().children('ul').slideUp('fast');
});
</script>
<!-- Content (Right Column) -->
		<div id="content" class="box">

			<h1>欢迎使用EasyCart系统</h1>
            <!--<p class="msg info">提示：</p>-->	
            <div class="tabs box">
				<ul>
					<li><a href="#tab01"><span>欢迎使用</span></a></li>
					<li><a href="#tab02"><span>服务器信息</span></a></li>
					<li><a href="#tab03"><span>程序发布</span></a></li>
					<li><a href="#tab04"><span>安装使用</span></a></li>
				</ul>
			</div> 
			
			<div id="tab01">
			<p><img src="/kicker/Public/skin/admin/step.jpg" border="0" usemap="#Map" />
              <map name="Map" id="Map">
                <area shape="rect" coords="153,14,277,52" href="<?php echo U('Type/catelist');?>" />
                <area shape="rect" coords="295,15,415,52" href="<?php echo U('Cate/add');?>" />
                <area shape="rect" coords="432,15,556,52" href="<?php echo U('Cate/catelist');?>" />
                <area shape="rect" coords="570,14,694,53" href="<?php echo U('Products/add');?>" />
                <area shape="rect" coords="710,14,836,53" href="<?php echo U('Products/productslist');?>" />
              </map>
            </p>
			本站共有 <a href="<?php echo U('Products/productslist');?>"><?php echo ((isset($product_count) && ($product_count !== ""))?($product_count):0); ?></a> 个产品 , <a href="<?php echo U('Cate/catelist');?>"><?php echo ((isset($cate_count) && ($cate_count !== ""))?($cate_count):0); ?></a> 个类别<br/>
			今天共新增了 <a href="<?php echo U('Orders/orderslist');?>"><?php echo ((isset($order_count) && ($order_count !== ""))?($order_count):0); ?></a> 个订单 , <a href="<?php echo U('Members/memberslist');?>"><?php echo ((isset($member_count) && ($member_count !== ""))?($member_count):0); ?></a> 个会员  , <a href="<?php echo U('Products_ask/index');?>"><?php echo ((isset($ask_count) && ($ask_count !== ""))?($ask_count):0); ?></a> 个留言 , <?php echo ((isset($cart_count) && ($cart_count !== ""))?($cart_count):0); ?> 个购物车 , 登录了 <a href="<?php echo U('Members/memberslist');?>"><?php echo ((isset($member_last_login_count) && ($member_last_login_count !== ""))?($member_last_login_count):0); ?></a> 个会员 , <?php echo ((isset($orders_status1) && ($orders_status1 !== ""))?($orders_status1):0); ?> 个未付款 , <?php echo ((isset($orders_status2) && ($orders_status2 !== ""))?($orders_status2):0); ?> 个已付款 <br/>
			本周共新增了 <a href="<?php echo U('Orders/orderslist');?>"><?php echo ((isset($week_order_count) && ($week_order_count !== ""))?($week_order_count):0); ?></a> 个订单 , <a href="<?php echo U('Members/memberslist');?>"><?php echo ((isset($week_member_count) && ($week_member_count !== ""))?($week_member_count):0); ?></a> 个会员 , <a href="<?php echo U('Products_ask/index');?>"><?php echo ((isset($week_ask_count) && ($week_ask_count !== ""))?($week_ask_count):0); ?></a> 个留言 <br/>
			本月共新增了 <a href="<?php echo U('Orders/orderslist');?>"><?php echo ((isset($month_order_count) && ($month_order_count !== ""))?($month_order_count):0); ?></a> 个订单 , <a href="<?php echo U('Members/memberslist');?>"><?php echo ((isset($month_member_count) && ($month_member_count !== ""))?($month_member_count):0); ?></a> 个会员 , <a href="<?php echo U('Products_ask/index');?>"><?php echo ((isset($month_ask_count) && ($month_ask_count !== ""))?($month_ask_count):0); ?></a> 个留言 <br/>
            </div> 
            <div id="tab02">
            <form action="<?php echo U('Info/doInsert');?>" name="myform" method="post">
            <table width="100%">
                    <tr>
						<td colspan="2" >服务器信息:
					    </td>
					</tr>
                    <tr>
						<td style="width:220px;">操作系统:</td>
						<td><?php echo ($info['操作系统']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">运行环境:</td>
						<td><?php echo ($info['运行环境']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">PHP运行方式:</td>
						<td><?php echo ($info['PHP运行方式']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">版本:</td>
						<td><?php echo ($info['版本']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">上传附件限制:</td>
						<td><?php echo ($info['上传附件限制']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">执行时间限制:</td>
						<td><?php echo ($info['执行时间限制']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">服务器时间:</td>
						<td><?php echo ($info['服务器时间']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">北京时间:</td>
						<td><?php echo ($info['北京时间']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">服务器域名/IP:</td>
						<td><?php echo ($info['服务器域名/IP']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">剩余空间:</td>
						<td><?php echo ($info['剩余空间']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">register_globals:</td>
						<td><?php echo ($info['register_globals']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">magic_quotes_gpc:</td>
						<td><?php echo ($info['magic_quotes_gpc']); ?></td>
					</tr>
                    <tr>
						<td style="width:220px;">magic_quotes_runtime:</td>
						<td><?php echo ($info['magic_quotes_runtime']); ?></td>
					</tr>
                                       
               
                    
            </table>
            </form>
            </div> 
            <div id="tab03">
            <script type="text/javascript" src="http://www.0594trade.com/api.php?mod=js&bid=68"></script>
            </div>
            <div id="tab04">
            <script type="text/javascript" src="http://www.0594trade.com/api.php?mod=js&bid=70"></script>
            </div>
		</div> <!-- /content -->
	</div> <!-- /cols -->
	<hr class="noscreen" />

	<!-- Footer -->
	<div id="footer" class="box">

		<p class="f-left">&copy; 2010 EasyCart All Rights Reserved</p>

	</div> <!-- /footer -->

</div> <!-- /main -->
</body>
</html>