<?php 
namespace Admin\Controller;
use Think\Controller;
class OrdersController extends AdminCommonController{
	/**
	 * 显示订单列表
	 */
	public function orderslist() {
		$filter['billno']= I('sn');
		$order_list = D("Member/OrdersView")->getAllOrders($filter);
		$this->assign('order_list',$order_list);
		$this->display();
	}

	/**
	 * 订单详情
	 */
	public function ordersDetail(){
		$oid = I('id');
		$order = D('Member/OrdersView')->getOrderGoods($oid);
		$this->assign('order',$order);
		$this->assign('order_billno',$order[0]['billno']);
		$this->assign('order_add_time',$order[0]['add_time']);
		$shippingInfo = D('Member/OrdersView')->getOrderAddress($order[0]['address_id']);
		$this->assign('shippingInfo',$shippingInfo);	
		$this->display();
	}

	/**
	 * 删除订单(假删)
	 */
	public function delOrder(){
		$oid = I('id');
		if (M('Orders')->where(array('order_id'=>$oid))->save(array('is_delete'=>1))) {
			$this->success('删除订单成功!');
		}
	}

	/**
	 * 批量删除订单(假删)
	 */
	public function batch_del_orders(){

		if (IS_AJAX === false) {
			exit();
		}
		$ids = I('id');
		$map['order_id'] = array('in',$ids);
		if (M('Orders')->where($map)->save(array('is_delete'=>1))) {
			$this->ajaxReturn('删除订单成功！','json');
		}else{
			$this->ajaxReturn('删除订单失败！','json');
		}
	}

	/**
	 * 批量更改订单状态
	 */
	public function do_orders_status(){

		if (IS_POST === false) {
			exit();
		}
		$ids = I('id');
		$order_status = I('orders_status');
		$map['order_id'] = array('in',$ids);
		if (M('Orders')->where($map)->save(array('status'=>$order_status))) {
			$this->success('修改订单状态成功！');
		}else{
			$this->error('修改订单状态失败！');
		}
	}

	/**
	 * 导出excel
	 */
	public function excel(){
		$filter['order_id'] = I('id');
		$filename = "订单统计信息-" . date ( "Y-m-d-H-i-s" ) . ".xls";
		$orders = D("Member/OrdersView")->getAllOrders($filter);
		// var_dump($orders);
		// die();
		header ( "Content-type:application/vnd.ms-excel" );
		header ( "Content-Type: application/download" );
		header ( "Content-Disposition:filename=$filename" );
		echo iconv ( "utf-8", "utf-8", "ID" ) . "\t";
		echo iconv ( "utf-8", "utf-8", "编号" ) . "\t";
		echo iconv ( "utf-8", "utf-8", "创建时间" ) . "\t";
		echo iconv ( "utf-8", "utf-8", "金额" ) . "\t";
		echo iconv ( "utf-8", "utf-8", "付款方式" ) . "\t";
		echo iconv ( "utf-8", "utf-8", "会员账号" ) . "\t";
		echo "\n";

		foreach ($orders as $order_id => $order) {
			echo $order_id. "\t";
			echo $order['billno']. "\t";
			echo date("Y-m-d H:i:s",intval($order['add_time'])). "\t";
			echo $order['total_price']. "\t";
			echo $order['pay_method']. "\t";
			echo $order['user_name']. "\t";
			echo "\n";
		}
		

	}
	
}

 ?>