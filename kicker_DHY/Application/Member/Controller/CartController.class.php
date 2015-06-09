<?php
namespace Org\Util;
namespace Member\Controller;
use Think\Controller;
class CartController extends Controller{
	private $uid=null;
	/**
	 * 初始化
	 */
	public function _initialize(){
		if(isset($_SESSION['userid'])){
			$this->uid = $_SESSION["userid"];
			//把session里的购物车数据，写入数据库
			$this->writeCart();
		}
		//$this->setNav();
		//$this->assign('userIsLogin',isset($_SESSION[C('RBAC_AUTH_KEY')]));
	}
	/**
	 * 显示购物车页
	 */	
	public function index(){
		if(!isset($_SESSION['userid'])){
			$this->redirect("Member/login/index");
		}
		if(IS_AJAX === false){
			$carts = $this->getCartData();
			$address = $this->getAddress();
			$this->assign('address',$address);
			$this->assign('carts',$carts['carts']);
			$this->assign('total_price',$carts['total_price']);
			$this->display();
		}else{
			if(isset($data[0])){
				exit(json_encode(array('status'=>true,'data'=>$data[0])));
			}else{
				exit(json_encode(array('status'=>false)));
			}
		}
		
	}
	/**
	 * 获得购物车的数据
	 */
	public  function getCartData(){
		$db = new \Member\Model\CartViewModel();
		$result = array();
		//用户没有登录
		if(is_null($this->uid)){
			if(!isset($_SESSION['cart']['goods'])){
				return;
			};		
			$carts = $_SESSION['cart']['goods'];
			foreach ($carts as $v){
				$data = $db->getOneGood(array('gid'=>$v['id']));
				$data['goods_num'] = $v['num'];
				$result[] = $data;
			}
		//用户登录了
		}else{
			$result = $db->getCartAll($this->uid);
		}
		$data = $this->disCart($result);
		return $data;
	}
	
	/**
	 * 处理购物车数据
	 */
	public function disCart($cart){
		$carts = array();
		if(empty($cart)) return false;
		$total_num = 0;
		$total_price = 0;
		foreach ($cart as $k=>$v){
			$carts[$k]['goods_num'] = $v['goods_num'];
			$carts[$k]['goods_attr'] = $v['goods_attr'];
			$carts[$k]['price'] = $v['price'];
			$carts[$k]['xiaoji'] = $v['goods_num']*$v['price'];
			$carts[$k]['gid'] = $v['gid'];
			$carts[$k]['cart_id'] = $v['cart_id'];
			$carts[$k]['goods_img'] = $v['goods_img'];
			$carts[$k]['main_title'] = $v['main_title'];
			$total_num += $carts[$k]['goods_num'];
			$total_price += $carts[$k]['xiaoji'];
		}
		return array('carts'=>$carts,'total_num'=>$total_num,'total_price'=>$total_price);
	}
	
	
	/***
	 * 添加购物车
	 */
	public function add(){
		if(IS_AJAX === false) throw  new Exception('请求错误！');
		$result = array();
		//用户没有登录
		if(is_null($this->uid)){
			$data = array(
				'id'=>intval(I('gid')),
				'name'=>'',
				'num'=>intval(I('gnum')),
				'price'=>0,
				'size'=>I('size')	
			);
			\Org\Util\Cart::add($data);
		}else{//用户登录了
			$data = array();
			$data['goods_id'] = intval( I('gid'));
			$data['user_id'] = intval($this->uid);
			$data['goods_num'] = intval(I('gnum'));
			$data['goods_attr'] = I('size');
			$this->checkAdd($data);
		}
		$carts = $this->getCartData();
		$this->ajaxReturn($carts,'JSON');	
	}
	/**
	 * 把session的数据，写入到数据库
	 */
	private function writeCart(){
		if(!isset($_SESSION['cart']['goods'])) return ;
		$carts = $_SESSION['cart']['goods'];	
		foreach ($carts as $v){
			$data = array();
			$data['user_id'] = intval($this->uid);
			$data['goods_id'] = $v['id'];
			$data['goods_num'] = $v['num'];
			$data['goods_attr'] = $v['size'];
			$this->checkAdd($data);
		}
		unset($_SESSION['cart']);
	}
	/**
	 * 验证添加 
	 * 存在自增加购物车商品数
	 * 不存在，添加新数据
	 */
	private function checkAdd($data){
		$where = array('user_id'=>$data['user_id'],'goods_id'=>$data['goods_id']);
		$db = D('Member/cartView');
		$cart_id  = $db->checkCart($where);
		if($cart_id){
			return $db->incCart($cart_id,$data['goods_num']);
		}else{
			return $db->addCart($data);
		}
	}
	/**
	 * 更新购物车商品数
	 */
	public function updateGoodsNum(){
		if(IS_AJAX === false) return false;
		$gid = intval(I('gid'));
		$num = intval(I('num'));
		$result = array();
		//用户没有登录
		if(is_null($this->uid)){
			foreach ($_SESSION['cart']['goods'] as $k=>$v){
				if($v['id'] == $gid){
					$_SESSION['cart']['goods'][$k]['num'] = $num;
					$result = array(
						'status'=>true,
						'num'=>$num	
					);
				}
			}
		}else{ //用户登录
			$db = D('Member/cartView');
			$where = array(
				'goods_id'=>$gid,
				'user_id'=>$this->uid		
			);
			if($db->updateCartNum($where,$num)){
				$carts = $this->getCartData();
				$result = array(
						'status'=>true,
						'carts'=>$carts
				);
			}
		}

		$this->ajaxReturn($result,'json');
	}
	
	/**
	 * 删除购物车
	 */
	public function del(){
		if(IS_AJAX === false) exit;
		$gid = I('gid');
		/**
		 * 用户没有登录
		 */
		$result = array();
		$result['status'] = false;
		if(is_null($this->uid)){
			foreach ($_SESSION['cart']['goods'] as $k=>$v){
				if($v['id'] == $gid){
					unset($_SESSION['cart']['goods'][$k]);
					$result['status'] = true;
				}
			} 
		}else{	//用户登录了
			$where = array('user_id'=>$this->uid,'goods_id'=>$gid);
			$db = D('Member/cartView');
			if($db->delCart($where)){
				$result['status'] = true;
			}
		}
		$this->ajaxReturn($result,'json');
	}
	
	/**
	 * 获得商品总价和总数
	 */
	public function getTotalPrice(){
		if (IS_AJAX === false) exit();		
		$data = $this->getCartData();
		$this->ajaxReturn($data,'json');
	}

	/**
	 * 清空购物车
	 */
	public function clearCart(){
		
		if(is_null($this->uid)) {
			\Org\Util\Cart::delAll();
			$this->ajaxReturn(array('status'=>1),'json');
		}else{
			$where = array('user_id'=>intval($this->uid));
			$db = D('Member/CartView');
			if($db->delCart($where)){
				if (IS_AJAX === true) {
		 			$this->ajaxReturn(array('status'=>1),'json');
		 		}else{
		 			return true;
		 		}
			}
		}	
	}
	/**
	 * 自增购物车数量
	 */
	public function IncCartNum(){
		if (IS_AJAX === false) {
			exit();
		}
		$cart_id = I('cart_id');
		$db = M('cart')->where(array('cart_id'=>$cart_id))->setInc('goods_num',1);
		if ($db) {
			$data = $this->getCartData();
			$this->ajaxReturn($data,'json');
		}
	}

	/**
	 * 自减购物车数量
	 */
	public function DecCartNum(){
		if (IS_AJAX === false) {
			exit();
		}
		$cart_id = I('cart_id');
		$db = M('cart')->where(array('cart_id'=>$cart_id))->setDec('goods_num',1);
		if ($db) {
			$data = $this->getCartData();
			$this->ajaxReturn($data,'json');
		}
	}

	/**
	 * 添加收货地址
	 */
	public function addAddress(){
		if (IS_POST === false) {
			exit();
		}
		$data = array(
			'user_id' => $this->uid,
			'province' => I('province'),
			'city' => I('city'),
			'country' => I('country'),
			'street' => I('street'),
			'tel' => I('mobile'),
			'postcode' =>I('postcode'),
			'consignee' => I('firstname')
		);
		$db = M('user_address')->add($data);
		if ($db) {
			$this->success('添加收货地址成功',U('Member/cart/index'));
		}
	}
	
	/**
	 * 获得收货地址
	 */
	public function getAddress(){
		return M('user_address')->where(array('user_id'=>$this->uid))->select();
	}
}
?>