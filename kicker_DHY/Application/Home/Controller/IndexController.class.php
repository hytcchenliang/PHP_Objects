<?php
namespace Home\Controller;
use Think\Controller;
Class IndexController extends CommonController{
    public function index(){
    	$close_goods = M("goods")->where(array("cid"=>1))->limit(8)->select();
    	$this->assign("close_goods",$close_goods);

    	$shoes_goods = M("goods")->where(array("cid"=>3))->limit(8)->select();
    	$this->assign("shoes_goods",$shoes_goods);

    	$soccer_goods = M("goods")->where(array("cid"=>4))->limit(8)->select();
   		$this->assign("soccer_goods",$soccer_goods);

    	$this->display();
    }

}