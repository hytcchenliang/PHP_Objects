<?php 
namespace Admin\Controller;
use Think\Controller;
Class GoodsController extends AdminCommonController{

	/**
	 * 商品列表
	 */
	public function goodslist(){
		$goods_list = M('Goods')->select();
		$this->assign('goods_list',$goods_list);
		$this->display();
	}

	/**
	 * 更改商品状态
	 */
	public function setStatus(){
		if (IS_AJAX === false) {
			exit();
		}
		$id = I('id');
		$type = I('type');
		$status = M('Goods')->where(array('gid'=>$id))->getField($type);
		$status_set = empty($status)?1:0;
		if (M('Goods')->where(array('gid'=>$id))->save(array($type=>$status_set))) {
			$img_url = getStatus($status_set,true);
			$this->ajaxReturn($img_url,'json');
		}

	}

}

 ?>