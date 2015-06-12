<?php 
namespace Home\Model;
use Think\Model;
Class CategoryModel extends Model{
	/**
	 *根据分类id获得分类名
	 */
	public function getNameById($id){
		$categoryName=$this->field('id')->find();
		if(empty($res)){
			return '该分类不存在';
		}
		return $categoryName;
	}

	/**
	 *根据分类id获得分类全称（一级分类名+二级分类名）
	 */
	public function getFullNameById($id=1){
		$res=$this->where(array("id"=>$id))->find();
		if(empty($res)){
			return '该分类不存在';
		}
    	if($res["parentCata"]=='0'){
    		$categoryName=$res["cataName"];
    	}else{
    		$res1=$this->field('cataName')->where(array("id"=>$res["parentCata"]))->find();
    		$categoryName=$res1["cataName"].' —— '.$res["cataName"];
    	}
    	return $categoryName;
	}

	/**
	 *根据一级分类id获得其所有二级分类
	 */
	public function getChildCategory($id=1){
		$res=$this->distinct(true)->field('id')->where(array("parentCata"=>$id))->select();
    	$child=array();
    	foreach ($res as $val) {
    		$child[]=$val["id"];
    	}
    	return $child;
	}

	

}

 ?>