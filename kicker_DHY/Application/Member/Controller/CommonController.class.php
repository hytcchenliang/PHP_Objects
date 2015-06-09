<?php 
namespace Member\Controller;
use Think\Controller;

class CommonController extends Controller{

	public $uid = null;

	/**
	 * 初始化
	 */
	public function _initialize(){
		if (!isset($_SESSION["userid"])) {
			$this->redirect('Member/Login/index');
		}else{
			
			$this->uid = $_SESSION["userid"];

			$this->assign('userIsLogin',isset($_SESSION["userid"]));
			$this->assign('userName',$_SESSION["username"]);

			$cartContrl = A("Member/Cart");
			$carts = $cartContrl->getCartData();
			$this->assign("carts",$carts['carts']);
			$this->assign("total_num",$carts['total_num']);
			$this->assign("total_price",$carts['total_price']);
		}

	}


}

 ?>