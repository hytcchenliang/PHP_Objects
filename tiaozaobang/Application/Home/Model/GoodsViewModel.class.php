<?php 
namespace Home\Model;
use Think\Model\ViewModel;
Class GoodsViewModel extends ViewModel{
	/**
	 * 定义视图模型
	 */
	//每页显示的商品数
	const pagesize=8;
	public $viewFields = array(
		'goods' => array('goodid','goodname','sellerid','gooddes','price','place','pubtime','category','goodimg1','salestate','views'),
		'user' => array('userid','username','schoolid','deptid','grade','integral','identstate','_on' => 'goods.sellerid = user.userid'),
		'school'=>array('schoolid','schoolname', '_on'=>'user.schoolid=school.schoolid'),
		'department'=>array('deptid','deptname','shortname', '_on'=>'user.deptid=department.deptid'),
	);
	
	/**
	 *根据搜索关键字搜索匹配商品
	 */
	public function searchGoods($keyword='',$pagenum=1,$orderby='1'){
		$where = 'goodname like "%'.$keyword.'%" and salestate =0';
		$orderArray= array('1' => 'pubtime desc', '2' => 'integral desc',
			'3' => 'price asc','4' => 'price desc','5' => 'views desc');
		return $this->where($where)->order($orderArray[$orderby])->page($pagenum,self::pagesize)->select();
	}
	/**
	 *根据商品分类搜索匹配商品
	 */
	public function searchGoodsByCategory($categoryid=1,$pagenum=1,$orderby='1'){
		$child=D("Category")->getChildCategory($categoryid);
		if(empty($child)){
			$where = 'category in ('.$categoryid.') and salestate =0';
		}else{
			$where = 'category in ('.$categoryid.','.implode(",",$child).') and salestate =0';
		}
		$orderArray= array('1' => 'pubtime desc', '2' => 'integral desc',
			'3' => 'price asc','4' => 'price desc');
		return $this->where($where)->order($orderArray[$orderby])->page($pagenum,self::pagesize)->select();
	}
	/**
	 * 计算搜索匹配商品的总数
	 */
	public function getCountOfGoods($keyword=''){
		$where = 'goodname like "%'.$keyword.'%" and salestate =0';
		$goods_count = $this->where($where)->count('goodid');
		return $goods_count;
	}
	public function getCountByCategoryId($id){
		$child=D("Category")->getChildCategory($id);
		if(empty($child)){
			$where = 'category in ('.$id.') and salestate =0';
		}else{
			$where = 'category in ('.$id.','.implode(",",$child).') and salestate =0';
		}
		$goods_count = $this->where($where)->count('goodid');
		return $goods_count;
	}
	/**
	 * 获取每页显示的商品数
	 */
	public function getPageSize(){
		return self::pagesize;
	}
}
 ?>