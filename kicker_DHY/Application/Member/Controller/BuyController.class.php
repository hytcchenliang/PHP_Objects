<?php 
namespace Member\Controller;
use Think\Controller;
class BuyController extends Controller{

	public function index(){
		$order_id = I('order_id');
		$order_total = M('orders')->where(array('order_id'=>$order_id))->getField('total_price');
		$this->assign('order_total',$order_total);
		$this->assign('order_id',$order_id);
		$this->display();
	}
}

 ?>