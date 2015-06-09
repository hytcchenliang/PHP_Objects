<?php 
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{

	public function _initialize(){

		$this->assign('userIsLogin',isset($_SESSION["userid"]));
		$this->assign('userName',$_SESSION["username"]);

		$cartContrl = A("Member/Cart");
		$carts = $cartContrl->getCartData();
		$this->assign("carts",$carts['carts']);
		$this->assign("total_num",$carts['total_num']);
		$this->assign("total_price",$carts['total_price']);
		// if (!isset($_SESSION["userid"])) {

		// 	$this->redirect('Home/Login/index');
		// }

	}


}

 ?>