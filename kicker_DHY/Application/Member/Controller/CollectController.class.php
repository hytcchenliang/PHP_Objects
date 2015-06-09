<?php 
namespace Member\Controller;
use Think\Controller;
class CollectController extends CommonController{


	/**
	 * 页面显示
	 */
	public function index(){
		$collect = D('CollectView')->getCollect($this->uid);
		$this->assign('collect',$collect);
		$this->display();
	}

	/**
	 * 添加收藏
	 */
	public function addCollect(){
		if (IS_AJAX === false) {
			exit();
		}

		if (is_null($this->uid)) {
			$this->ajaxReturn(array('status'=>0),'json');
		}else{
			$gid = I('gid');
			$id = D('CollectView')->addCollect($this->uid,$gid);
			if ($id) {
				$this->ajaxReturn(array('status'=>1),'json');
			}else{
				$this->ajaxReturn(array('status'=>2),'json');
			}
		}
	}

	/**
	 * 取消订单
	 */
	public function delCollect(){
		if (IS_AJAX === false) {
			exit();
		}
		$id = I('colid');
		if (D('CollectView')->delCollect($id)) {
			$this->ajaxReturn(array('status'=>1),'json');
		}
	}
}
 ?>