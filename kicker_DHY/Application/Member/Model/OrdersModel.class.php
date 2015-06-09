<?php 
namespace Member\Model;
use Think\Model;
Class OrdersModel extends Model{
	
	/**
	 * 添加订单
	 */
	public function addOrder($data){
		$order = array(
			'user_id' => $data['user_id'],
			'address_id' => $data['address_id'],
			'remark' => $data['remark'],
			'status' => 0,
			'add_time' => time(),
			'pay_method' => 'Alipay',
			'billno' => 'HY'.time()
		);
		$cart_id_str = rtrim($data['cartIdStr'],',');
		$order_id = $this->data($order)->add();
		if ($order_id) {
			$carts = M('cart')->where('cart_id in ('.$cart_id_str.')')->select();
			$order_total = 0;
			foreach ($carts as $cart_k => $cart_v) {
				$price = M('goods')->where(array('gid'=>$cart_v['goods_id']))->getField('price');
				$data = array(
					'order_id' => $order_id,
					'goods_id' => $cart_v['goods_id'],
					'goods_num' => $cart_v['goods_num'],
					'total_money' => $cart_v['goods_num']*$price,
					'goods_attr' => $cart_v['goods_attr'],
				);
				$order_total += $cart_v['goods_num']*$price;
				M('order_goods')->data($data)->add();		
			}
			M('orders')->where(array('order_id'=>$order_id))->save(array('total_price'=>$order_total));
			return $order_id;
		}
	}

	/**
	 * 删除订单
	 */
	public function delOrder(){

	}

	
}


 ?>