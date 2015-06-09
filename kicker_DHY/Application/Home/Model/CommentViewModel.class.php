<?php 
namespace Home\Model;
use Think\Model\ViewModel;
Class CommentViewModel extends ViewModel{
	/**
	 * 定义视图模型
	 */
	public $viewFields = array(
		'Comment' => array('user_id','goods_id','time','content'),
		'User' => array('uname','head_image','_on' => 'Comment.user_id = User.uid','_type' => 'INNER'),
	);
	/**
	 * 根据商品id获取对应的评论
	 */
	public function getComments($gid){
		return $this->where(array("goods_id"=>$gid))->order('time desc')->select();
	}
	/**
	 * 获取商品的平均评分
	 */
	public function getAvgRating($gid){
		$fields = array(
			'count(comm_id) as c',
			'sum(rating) as s'
		);
		$res = $this->field($fields)->where(array("goods_id"=>$gid))->find();
		return round($res["s"]/$res["c"],1);
	}
}

 ?>