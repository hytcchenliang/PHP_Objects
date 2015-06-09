<?php
/**
 * 购物车模型 
 */
namespace Member\Model;
use Think\Model\ViewModel;
class CartViewModel extends ViewModel{
	public $viewFields = array(
		'Cart' => array('goods_num','goods_attr','user_id','cart_id'),
		'Goods' => array('main_title','price','goods_img','gid','_on' => 'Cart.goods_id = Goods.gid','_type' => 'INNER'),
	);
	/**
	 * 获取商品的数据
	 */
	public function getOneGood($where){
		$fields = array(
			'main_title',
			'gid',
			'goods_img',
			'price',
		);
		return M('goods')->field($fields)->where($where)->find();
	}
	/**
	 * 添加购物车
	 */
	public function addCart($data){
		return $this->table('hy_cart')->add($data);
	}
	/**
	 * 验证购物车信息是否存在
	 */
	public function checkCart($where){
		$result = $this->field('cart_id')->where($where)->find();
		return isset($result['cart_id'])?$result['cart_id']:null;
	}
	
	/**
	 * 自增购物车
	 */
	public function incCart($id,$num){
		return M('cart')->where(array('cart_id'=>$id))->setInc('goods_num',$num);
	}
	/**
	 * 统计购物车总数
	 */
	public function countCart($where){
		return $this->where($where)->count();
	}
	/**
	 * 更新购物车商品数量
	 */
	public function updateCartNum($where,$num){
		return $this->where($where)->save(array('goods_num'=>$num));
	}
	
	/**
	 * 获取所有购物车的数据
	 */
	public function getCartAll($uid){
		$fields = array(
			'main_title',
			'gid',
			'goods_img',
			'price',
			'cart_id',
			'goods_num',
			'goods_attr'
		);
		return $this->field($fields)->where(array('user_id'=>$uid))->select();
	}
	/**
	 *删除购物车
	 */
	public function delCart($where){
		$db = M('Cart');
		return $db->where($where)->delete();
	}

}








?>