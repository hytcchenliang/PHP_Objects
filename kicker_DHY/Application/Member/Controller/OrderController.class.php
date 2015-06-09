<?php 
namespace Member\Controller;
use Think\Controller;
class OrderController extends CommonController{

	/**
	 * 个人中心
	 */
	public function account(){
		$his_orders = D('OrdersView')->getHistory($this->uid);
		$this->assign('his_orders',$his_orders);
		$this->display();
	}

	/**
	 * 查看历史订单
	 */
	public function history(){
		$his_orders = D('OrdersView')->getHistory($this->uid);
		$this->assign('his_orders',$his_orders);
		$order_count = count($his_orders);
		$this->assign('order_count',$order_count);
		$this->display();
	}

	/**
	 * 根据订单号查看单个订单信息
	 */
	public function viewOrder(){
		$order_id = I('order_id');
		$order_goods = D('OrdersView')->getOrderGoods($order_id);
		$total_price = $order_goods[0]['total_price'];
		$billno = $order_goods[0]['billno'];
		$address = D('OrdersView')->getOrderAddress($order_goods[0]['address_id']);
		$address_str = $address['province'].$address['city'].$address['country'].$address['street'];
		$this->assign('address_str',$address_str);
		$consignee = $address['consignee'];
		$this->assign('consignee',$consignee);
		$postcode = $address['postcode'];
		$this->assign('postcode',$postcode);
		$tel = $address['tel'];
		$this->assign('tel',$tel);
		$this->assign('billno',$billno);
		$this->assign('total_price',$total_price);
		$this->assign('order_goods',$order_goods);
		$this->display();
	}

	/**
	 * 添加订单
	 */
	public function addOrder(){
		$data = array(
			'cartIdStr' => I('cartIdStr'),
			'address_id' => I('address_id'),
			'remark' => I('remark'),
			'total_price' => I('total_price'),
			'user_id' => $this->uid
		);
		$order_id = D('Orders')->addOrder($data);
		if ($order_id) {
			//添加订单成功，清空购物车
			if (A("Member/Cart")->clearCart()) {
				$this->redirect('Member/Buy/index/?order_id='.$order_id);
				//$this->success('提交订单成功!',U('Member/Order/Buy?order_id="'.$order_id.'"'));
			};
		}
	}

	/**
	 * 取消订单(假删)
	 */
	public function delOrder(){

	}
}

 ?>