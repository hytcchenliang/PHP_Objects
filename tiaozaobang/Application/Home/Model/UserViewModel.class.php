<?php 
namespace Home\Model;
use Think\Model\ViewModel;
Class UserViewModel extends ViewModel{
	/**
	 * 定义视图模型
	 */
	public $viewFields = array(
		'user' => array('userid','username','tel','qq','headimg','schoolid','deptid','grade','integral','identstate'),
		'school'=>array('schoolid','schoolname', '_on'=>'user.schoolid=school.schoolid'),
		'department'=>array('deptid','deptname','shortname', '_on'=>'user.deptid=department.deptid'),
	);
	
	/**
	 * 根据用户id获取实例
	 */
	public function getUserById($userid){
		return $this->where(array('userid' => $userid ))->find();
	}

	/**
	 * 根据用户积分返回其对应等级
	 */
	public function getUserLevel($integral){
		if($integral<25){return 1;}
		if(25<=$integral&&$integral<75){return 2;}
		if(75<=$integral&&$integral<150){return 3;}
		if(150<=$integral&&$integral<250){return 4;}
		if(250<=$integral&&$integral<375){return 5;}
		if(375<=$integral&&$integral<525){return 6;}
		if(525<=$integral&&$integral<700){return 7;}
		if(700<=$integral&&$integral<1000){return 8;}
		if(1000<=$integral&&$integral<1500){return 9;}
		if(1500<=$integral&&$integral<2500){return 10;}
		if(2500<=$integral&&$integral<3500){return 11;}
		if(3500<=$integral&&$integral<5000){return 12;}
		if(5000<=$integral&&$integral<7000){return 13;}
		if(7000<=$integral&&$integral<10000){return 14;}
		if(10000<=$integral&&$integral<15000){return 15;}
		if($integral>=15000){return 16;}
	}

	/**
	 * 计算用户距离升级还差多少积分
	 */
	public function getNeedIntegral($curIntegral){
		if($curIntegral<25){return 25-$curIntegral;}
		if(25<=$curIntegral&&$curIntegral<75){return 75-$curIntegral;}
		if(75<=$curIntegral&&$curIntegral<150){return 150-$curIntegral;}
		if(150<=$curIntegral&&$curIntegral<250){return 250-$curIntegral;}
		if(250<=$curIntegral&&$curIntegral<375){return 375-$curIntegral;}
		if(375<=$curIntegral&&$integral<525){return 525-$curIntegral;}
		if(525<=$curIntegral&&$curIntegral<700){return 700-$curIntegral;}
		if(700<=$curIntegral&&$curIntegral<1000){return 1000-$curIntegral;}
		if(1000<=$curIntegral&&$curIntegral<1500){return 1500-$curIntegral;}
		if(1500<=$curIntegral&&$curIntegral<2500){return 2500-$curIntegral;}
		if(2500<=$curIntegral&&$curIntegral<3500){return 3500-$curIntegral;}
		if(3500<=$curIntegral&&$curIntegral<5000){return 5000-$curIntegral;}
		if(5000<=$curIntegral&&$curIntegral<7000){return 7000-$curIntegral;}
		if(7000<=$curIntegral&&$curIntegral<10000){return 10000-$curIntegral;}
		if(10000<=$curIntegral&&$curIntegral<15000){return 15000-$curIntegral;}
		if($integral>=15000){return 0;}
	}

	/**
	 * 增加积分,参数为用户的id和要增加的积分数
	 */
	public function addIntegral($userid,$num){
		$user=M("user");
        $user->where(array("userid" => $userid))->setInc('integral',$num);
	}
}

 ?>