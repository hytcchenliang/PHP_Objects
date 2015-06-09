<?php 
namespace Home\Controller;
use Think\Controller;
Class FilterController extends CommonController{

	public function index(){

		//分类id
		$cid = I('cid');
		$this->assign("cur_cid",$cid);
		//品牌
		$band = I('band');
		$this->assign("cur_band",$band);
		//尺寸
		$size = I('size');
		$this->assign("cur_size",$size);
		//价格区间
		$min_price = I('min_price');
		$max_price = I('max_price');
		$this->assign("cur_range",$min_price."-".$max_price);
		//排序
		$order = I('order');
		$this->assign("order",$order);
		$sort =  I('sort');
		$sort = empty($sort)?'desc':$sort;
		$this->assign("sort",$sort);
		//分页
		$page = I('page');
		$this->assign("page",$page);

		//关键词
		$keyword = I('k');
		$this->assign('keyword',$keyword);

		/**
		 * 筛选商品
		 */
		$db = D("goods");
		$goods_count = count($db->filterGoods($cid,$band,$size,$min_price,$max_price,$order,$sort,$keyword));
		$goods = $db->filterGoods($cid,$band,$size,$min_price,$max_price,$order,$sort,$keyword,$page);
		// var_dump($goods);
		// die();
		$page_num = getPageNum($goods_count);
		$page_arr = getPageArr($page_num);
		$this->assign("page_arr",$page_arr);
		$this->assign("page_num",$page_num);


		$this->assign("goods_count",$goods_count);
		$this->assign("goods",$goods);
		
		/**
		 * 根据分类id获取分类的尺寸和品牌
		 */
		$db = M("category");
	    $res = $db->field('attr,band')->where(array('cid'=>$cid))->find();
	    $size = explode(',' , $res["attr"]);
	    $this->assign("size",$size);
	    $band = explode(',' , $res["band"]);
	    $this->assign("band",$band);
	    $this->display();
	}


	public function filter(){

		
	}
}

 ?>