<?php 
namespace Member\Model;
use Think\Model\ViewModel;
Class OrdersViewModel extends ViewModel{
	
	/**
	 * 定义订单视图模型
	 */
	public $viewFields = array(
		'Order_goods' => array('goods_num','goods_attr','total_money'),
		'Orders' => array('user_id','order_id'=>'oid','billno','add_time','total_price','status','pay_method','address_id','_on'=>'Order_goods.order_id = Orders.order_id'),
		'Goods' => array('gid','main_title','goods_img','price','_on'=>'Order_goods.goods_id = Goods.gid'),
	);

	/**
	 * 根据user_id获取对应的订单信息
	 */
	public function getOrder($uid){
		return $this->select();
	}

	/**
	 * 获取所有订单
	 */
	public function getAllOrders($filter){
		$orders = array();
		$where = "is_delete = 0";
		if (!empty($filter['billno'])) {
			$where .= " and billno like '%".$filter['billno']."%'";
		}
		if (!empty($filter['order_id'])) {
			$where .= " and Orders.order_id in (".$filter['order_id'].")";
		}

		$order_goods = $this->field('oid,billno,add_time,total_price,pay_method,status,user_id')->where($where)->select();
		foreach ($order_goods as $order_goods_k => $order_goods_v) {
			if (!array_key_exists($order_goods_v['oid'], $orders)){
				$orders[$order_goods_v['oid']]['billno'] = $order_goods_v['billno'];
				$orders[$order_goods_v['oid']]['add_time'] = $order_goods_v['add_time'];
				$orders[$order_goods_v['oid']]['user_name'] = M('User')->where(array('uid'=>$order_goods_v['user_id']))->getField('uname');
				$orders[$order_goods_v['oid']]['status'] = $order_goods_v['status'];
				$orders[$order_goods_v['oid']]['total_price'] = $order_goods_v['total_price'];
				$orders[$order_goods_v['oid']]['pay_method'] = $order_goods_v['pay_method'];
			}
		}
		krsort($orders);
		return $orders;
	}

	/**
	 * 获取某会员的历史订单
	 */
	public function getHistory($uid){
		$orders = array();
		$order_goods = $this->where(array('user_id'=>$uid))->select();
		foreach ($order_goods as $order_goods_k => $order_goods_v) {
			if (!array_key_exists($order_goods_v['oid'], $orders)){
				$orders[$order_goods_v['oid']]['billno'] = $order_goods_v['billno'];
				$orders[$order_goods_v['oid']]['add_time'] = $order_goods_v['add_time'];
				$orders[$order_goods_v['oid']]['consignee'] = M('user_address')->where(array('address_id'=>$order_goods_v['address_id']))->getField('consignee');
				$orders[$order_goods_v['oid']]['status'] = $order_goods_v['status'];
				$orders[$order_goods_v['oid']]['total_price'] = $order_goods_v['total_price'];
				$orders[$order_goods_v['oid']]['pay_method'] = $order_goods_v['pay_method'];
			}	
			$orders[$order_goods_v['oid']]['goods_info'][$order_goods_k]['goods_img'] = $order_goods_v['goods_img'];
			$orders[$order_goods_v['oid']]['goods_info'][$order_goods_k]['main_title'] = $order_goods_v['main_title'];
			$orders[$order_goods_v['oid']]['goods_info'][$order_goods_k]['gid'] = $order_goods_v['gid'];
		}
		krsort($orders);
		return $orders;
	}

	/**
	 * 根据order_id获取订单商品信息
	 */
	public function getOrderGoods($order_id){
		return $this->where(array('oid'=>$order_id))->select();
	}

	/**
	 * 获取地址信息
	 */
	public function getOrderAddress($address_id){
		return M('user_address')->field('province,city,country,street,tel,postcode,consignee')->where(array('address_id'=>$address_id))->find();
	}
}

 ?>