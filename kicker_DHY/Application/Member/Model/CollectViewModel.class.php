<?php 
namespace Member\Model;
use Think\Model\ViewModel;
Class CollectViewModel extends ViewModel{

	/**
	 * 定义收藏列表视图模型
	 */
	public $viewFields = array(
		'Collect' => array('id','user_id','goods_id','remark','add_time'),
		'Goods' => array('main_title','goods_img','price','_on'=>'Collect.goods_id = Goods.gid')
	);

	/**
	 * 获取用户的收藏
	 */
	public function getCollect($uid){
		return $this->where(array('user_id'=>$uid))->select();
	}

	/**
	 * 添加收藏
	 */
	public function addCollect($uid,$gid){
		if (!empty($uid)&&!empty($gid)) {
			if (M('Collect')->where(array('user_id'=>$uid,'goods_id'=>$gid))->find()) {
				return false;
			}else{
				$data = array(
				'user_id' => $uid,
				'goods_id' => $gid,
				'add_time' => time(),
				);
				return M('Collect')->add($data);
			}	
		}
	}

	/**
	 * 修改备注
	 */
	public function updateCollect(){

	}

	/**
	 * 取消收藏
	 */
	public function delCollect($id){
		return M('collect')->where(array('id'=>$id))->delete();
	}

}

 ?>