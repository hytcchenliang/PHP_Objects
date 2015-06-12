<?php
namespace Home\Controller;
use Think\Controller;
header('Content-Type: text/html; charset=utf-8');
class EditController extends Controller {
    public function index(){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->assign("cur_User_id",$cur_User_id);
        if($cur_User_id!=''){
            $cur_User=M("User")->where('userid='.$cur_User_id)->find();
            $this->assign("cur_User",$cur_User);
            $cur_User_Level=D("UserView")->getUserLevel($cur_User["integral"]);
            $this->assign("cur_User_Level",$cur_User_Level);
        }

    	$goodsid=I('goodsid');
    	$match_goods = M("Goods")->where('goodid='.$goodsid)->find();
        if(empty($match_goods)){
            $this->error('该页面不存在',U("Home/Index/index"),3);
            exit();
        }
        if($match_goods["sellerid"]!=$cur_User_id){
            $this->error('对不起，您不是该商品的发布者，没有编辑权限',U("Home/Goods/index?goodsid=$goodsid"),3);
            exit();
        }
        $this->assign("match_goods",$match_goods);
    	$goodsImg = array('goodsImg1' => $match_goods["goodimg1"],'goodsImg2' => $match_goods["goodimg2"],
    		'goodsImg3' => $match_goods["goodimg3"], 'goodsImg4' => $match_goods["goodimg4"]);
    	$this->assign("goodsImg",$goodsImg);

        $first_Category=M("category")->field('id,cataName')->where(array("parentCata"=>'0'))->select();
        $this->assign("first_Category",$first_Category);
        $second_Category=M("category")->field('id,cataName,parentCata')->where('parentCata!=0')->select();
        $this->assign("second_Category",$second_Category);
    	
        $this->display();
    }

    public function update(){
        if (!IS_POST) $this->error('页面不存在！',U("Home/Index/index"),3);
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        if($cur_User_id==''){
            $this->error('要发布商品必须先登录哦，亲！',U("Home/Index/index"),3);
            exit();
        }
        $data = array(
            'goodid' => I('goodid'),
            'goodname' => I('goodname'),
            'sellerid' => $_SESSION["userid"],
            'gooddes' => I('gooddes'),
            'price' => I('price'),
            'place' => I('place'),
            'category' => I('category'),
            'discount' => I('discount'),
            'pubtime' => date("Y-m-d H:i:s"),
            'goodimg1' => I('goodimg1'),
            'goodimg2' => I('goodimg2'),
            'goodimg3' =>I('goodimg3'),
            'goodimg4' => I('goodimg4')
            );
        $result=M('goods')->data($data)->save();
        if ($result === false) {
            $this->ajaxReturn('fail');
        } else {
            $this->ajaxReturn('ok');
        }
    }

}
?>