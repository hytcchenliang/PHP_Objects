<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>购物订单打印</title>
<style type="text/css" media="print">
.noprint {
	display : none
}
</style>
<style type="text/css" media="screen,print">
#think_run_time,#think_page_trace {
	display:none;	
}
.x-barcode {
	padding:0;
	margin:0
}
body {
	margin:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
.td_frame {
	padding:5px 0 5px 0;
	border-bottom:2px solid #000000;
}
img {
	padding:2px;
	border:0;
}
p {
	margin:8px 0 8px 0;
}
h1 {
	font-size:16px;
	font-weight:bold;
	margin:0;
}
h2 {
	font-size:14px;
	font-weight:bold;
	margin:0;
}
.table_data_title {
	font-size:14px;
	font-weight:bold;
	height:25px;
}
.table_data_content {
	height:20px;
	line-height:20px;
}
#print_confirm {
	width:100%;
	height:30px;
	border-top:1px solid #999999;
	padding-top:4px;
	background-color:#5473ae;
	position:absolute;
}
#btn_print {
	width:71px;
	height:24px;
	background-image:url(/kicker/Public/skin/orders/btn_print.gif);
	cursor:pointer;
	margin-left:auto;
	margin-right:auto;
}
#barcode {
	width:150px;
	height:50px;
	background:url(/kicker/Public/skin/orders/bar_code.gif) no-repeat;
}
</style>

<script type="text/javascript" src="/kicker/Public/skin/Js/jquery.js"></script> 
<script language="JavaScript" type="text/javascript">
	$(function(){
		$('#chk_pic_print').click(function(){
				$(this).attr('checked') && $('img').show() || $('img').hide();
			}
		);
		$('#btn_print').click(function(){
			window.print();
		});
		$('#remove').click(function(){
			var index=$(this).parent().index();
			$(this).parentsUntil('table').children('tr').each(function(i,el){
				$(el).children('td').eq(index).remove();
			});
		});
		$('.removeone').click(function(){
			$(this).parent().parent().hide();
		});
	});
</script>
</head>
<body>
<div id="print1">
  <table class="table_frame" align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
    <tbody>
      <tr>
        <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td class="td_frame"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3"></td>
                        <td><div id="chk_print1" class="noprint">
                            <input name="chk_pic_print" id="chk_pic_print" checked="checked" type="checkbox">
                            <label class="label_pic_print" for="chk_pic_print">打印图片</label>
                          </div></td>
                      </tr>
                      <tr>
                        <td><img src=".././<?php echo GetValue('sitelogo');?>" height="60" width="150px"></td>
                        <td width="35%"><h1><?php echo GetValue('sitename');?></h1> 
                          <?php echo GetValue('siteurl');?></td>
                        <td style="font-size: 16pt;" width="40%"></td>
                        <td width="20%"><p>客户：<?php echo ($shippingInfo["member_firstname"]); ?> <?php echo ($shippingInfo["member_lastname"]); ?></p>
                          <p> 电话：<?php echo ($shippingInfo["member_telephone"]); ?></p></td>
                      </tr>
                    </tbody>
                  </table></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <td class="td_frame"><table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
            <tbody>
              <tr>
                <td><h2>订单号：<?php echo ($order_billno); ?></h2></td>
                <td align="right"><h2>订购日期：<?php echo (date('Y-m-d H:i:s',$order_add_time)); ?></h2></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <td class="td_frame"><table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
            <tbody>
              <tr class="table_data_title">
                <td>No</td>
                <td>ID</td>
                <td>商品图片</td>
                <td>商品名称</td>
                <td>货号</td>
                <td>成本价</td>
                <td>供应商</td>
                <td>单价</td>
                <td>属性</td>
                <td>数量</td>
                <td>小计</td>
                <td><a href="###" id="remove">移出</a></td>
              </tr>
              <?php if(is_array($order)): foreach($order as $key=>$val): ?><tr>
                <td><?php echo ($val["oid"]); ?></td>
                <td><?php echo ($val["gid"]); ?></td>
                 <td><img class="product" src="/kicker/Public/<?php echo ($val["goods_img"]); ?>" align="absmiddle" height="60" width="60"></td> 
                <td><?php echo ($val["main_title"]); ?></td>
                
                <td><?php echo ($vo["serial"]); ?></td>
                <td><?php echo ($shippingInfo["currencies_code"]); echo ($vo["costprice"]); ?></td>
                <td><?php echo ($vo["provider"]); ?></td>
                
                <td><?php echo ($val["price"]); ?></td>
                <td> <?php echo ($val["goods_attr"]); ?></td>
                <td><?php echo ($val["goods_num"]); ?></td>
                <td><?php echo ($val["total_money"]); ?></td>
                <td><a href="###" class="removeone">移出</a></td>
              </tr><?php endforeach; endif; ?>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <td class="td_frame"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
              <tr>
                <td style="height: 150px;" valign="top" width="80%"> <p>订单附言：</p>
                <?php echo ($shippingInfo["BuyNote"]); ?>
                </td>
                <td valign="top" width="20%">
                <?php if(($products_total) > "0"): ?><p>商品总价：<?php echo ($shippingInfo["currencies_code"]); echo ($products_total); ?></p><?php endif; ?>
                <?php if(!empty($discount['text'])): ?><p>折扣信息：<?php echo ($discount['text']); ?></p><?php endif; ?>
                <?php if(($shippingInfo['shippingmoney']) > "0"): ?><p>配送费用：<?php echo ($shippingInfo["currencies_code"]); echo ($shippingInfo["shippingmoney"]); ?></p><?php endif; ?>
                  <?php if(($shippingInfo['insurance']) > "0"): ?><p>保价费用：<?php echo ($shippingInfo["currencies_code"]); echo ($shippingInfo["insurance"]); ?></p><?php endif; ?>
                  <?php if(($shippingInfo['paymoney']) > "0"): ?><p>支付手续费：<?php echo ($shippingInfo["currencies_code"]); echo ($shippingInfo["paymoney"]); ?></p><?php endif; ?>
                  <?php if(($total_weight) > "0"): ?><p>总重量：<?php echo ($total_weight); ?>千克</p><?php endif; ?>
                  <p>总金额：<?php echo ($shippingInfo["currencies_code"]); echo ($shippingInfo['orders_total']); ?></p>
                  </td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      </table>
       <table class="table_frame" align="center" border="0" cellpadding="0" cellspacing="0" width="90%" style="font-size:16px;">
      <tr>
        <td class="td_frame" align="center"><table width="90%" border="0" cellpadding="0" cellspacing="1" style="background-color:#000">
  <tr> 
    <td colspan="4" bgcolor="#FFFFFF" style="font-weight: bold;">收货信息</td>
  </tr>
  <tr>
    <td width="12%" rowspan="2" bgcolor="#FFFFFF">姓名:</td>
    <td width="34%" bgcolor="#FFFFFF"><?php echo ($shippingInfo[consignee]); ?></td>
    <td width="33%" bgcolor="#FFFFFF">支付方式:</td>
    <td width="21%" bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Email:<?php echo ($shippingInfo["delivery_email"]); ?></td>
    <td width="33%" bgcolor="#FFFFFF">配送方式:</td>
    <td width="21%" bgcolor="#FFFFFF"><?php echo ($shippingInfo['shipping_method']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">省:</td>
    <td bgcolor="#FFFFFF"><?php echo ($shippingInfo["province"]); ?></td>
    <td bgcolor="#FFFFFF">市:</td>
    <td bgcolor="#FFFFFF"><?php echo ($shippingInfo["city"]); ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">县:</td>
    <td bgcolor="#FFFFFF"><?php echo ($shippingInfo["country"]); ?></td>
    <td bgcolor="#FFFFFF">地址:</td>
    <td bgcolor="#FFFFFF"><?php echo ($shippingInfo["street"]); ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">邮编:</td>
    <td bgcolor="#FFFFFF"><?php echo ($shippingInfo["postcode"]); ?></td>
    <td bgcolor="#FFFFFF">电话:</td>
    <td bgcolor="#FFFFFF"><?php echo ($shippingInfo["tel"]); ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">备注信息:</td>
    <td colspan="3" bgcolor="#FFFFFF"><?php echo ($shippingInfo["BuyNote"]); ?></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#FFFFFF" style="text-align: center;">此次共购买 <span style="color: #F93;"><?php echo ($products_sum); ?></span> 件商品 应付总金额 <span style="color: #F93;"><?php echo ($shippingInfo["currencies_code"]); echo ($shippingInfo['orders_total']); ?></span></td> 
  </tr>
</table></td>
      </tr>
      
    </tbody>
  </table>
</div>
<div id="print2"> </div>
<div  id="print_confirm" class="noprint">
  <div id="btn_print"></div>
</div>
</body>
</html>