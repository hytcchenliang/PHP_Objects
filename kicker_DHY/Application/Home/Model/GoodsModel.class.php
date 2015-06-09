<?php 
namespace Home\Model;
use Think\Model;
Class GoodsModel extends Model{
	/**
	 *获得相关商品
	 */
	public function getRelatedGoods($cid){
		$fields = array(
			'gid',
			'main_title',
			'goods_img',
			'price',
			'buy'
		);
		return $this->field($fields)->where(array('cid'=>$cid))->limit(5)->select();
	}
	/**
	 *获得热卖商品
	 */
	public function getHotGoods(){
		$fields = array(
			'gid',
			'main_title',
			'goods_img',
			'price',
			'buy'
		);
		return $this->field($fields)->order('buy desc')->limit(5)->select();
	}

	/**
	 * 筛选商品
	 */
	public function filterGoods($cid,$band,$size,$minprice,$maxprice,$order,$sort,$keyword,$page){
		$where = "";
		$order_str="";
		if (!empty($cid)) {
			$where = "cid=".$cid;
		}else{
			$where = "cid in (1,3,4)";
		}
		if (!empty($band)) {
			$where .= ' and band ="'.$band.'"';
		}
		if (!empty($size)) {
			$where .= ' and attr like "%'.$size.'%"';
		}
		if (!empty($maxprice)) {
			$where .=' and (price between '.$minprice.' and '.$maxprice.')';
		}
		if (!empty($order) && !empty($sort)) {
			$order_str .= $order." ".$sort;
		}
		if (!empty($page)) {
			$page = 3*(intval($page)-1);
			$limit = $page.',3';
		}
		if (!empty($keyword)) {
			$where .= ' and main_title like "%'.$keyword.'%"';
		}
		//return $where;
		return $this->field('gid,main_title,price,goods_img,buy')->where($where)->order($order_str)->limit($limit)->select();
	}

	/**
	 * 获取单个商品信息
	 */
	public function getOneGood($where){
		$fields = array(
			'main_title',
			'gid',
			'goods_img',
			'price',
		);
		return $this->field($fields)->where($where)->find();
	}



}

 ?>