<?php 
namespace Home\Controller;
use Think\Controller;
Class DetailController extends CommonController{

	public function Index(){

		$gid = I("gid");
		$this->assign("goods_id",$gid);
		$goods_detail = M("goods")->where(array("gid"=>$gid))->find();

		//商品标题
		$this->assign("title",$goods_detail["main_title"]);
		$this->assign("sub_title",$goods_detail["sub_title"]);

		//商品价格
		$this->assign("price",$goods_detail["price"]);

		//商品图片
		$big_img = explode(',',$goods_detail["big_images"]);
		$large_img = explode(',',$goods_detail["large_images"]);
		
		$img_arr = array();
		foreach ($big_img as $key => $value) {
			$img_arr[$key]['big_img'] = $value;
			$img_arr[$key]['large_img'] = $large_img[$key];
		}

		$this->assign("img_arr",$img_arr);
		$sm_img = explode(',',$goods_detail["sm_images"]);
		$this->assign("sm_img",$sm_img);

		//商品属性
		$goods_attr = explode(",", $goods_detail["attr"]);
		$this->assign("goods_attr",$goods_attr);
		
		//商品描述
		$des_img = explode(',',$goods_detail["des_img"]);
		$this->assign("des_img",$des_img);
		$this->assign("des_txt",$goods_detail["des_txt"]);

		$db = D("goods");
		$related_goods = $db->getRelatedGoods($goods_detail["cid"]);//相关商品
		$hot_goods = $db->getHotGoods();//热卖商品
		$this->assign('related_goods',$related_goods);
		$this->assign('hot_goods',$hot_goods);

		//商品评论
		$db = D("CommentView");
		$comments = $db->getComments($gid);
		$this->assign("comments",$comments);
		$this->assign("comments_num",count($comments));

		//商品评分
		$rating = $db->getAvgRating($gid);
		$this->assign("rating",$rating);
		
		$this->display();
	}

}

 ?>