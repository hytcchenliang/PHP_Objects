<?php
namespace Home\Controller;
use Think\Controller;
header('Content-Type: text/html; charset=utf-8');
class ReleaseController extends Controller {
    /**
     * 初始页
     */
    public function index(){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        if($cur_User_id==''){
            $this->error('要发布商品必须先登录哦，亲！',U("Home/Index/index"),3);
            exit();
        }

        $this->assign("cur_User_id",$cur_User_id);
        if($cur_User_id!=''){
            $cur_User=M("User")->where('userid='.$cur_User_id)->find();
            $this->assign("cur_User",$cur_User);
            $cur_User_Level=D("UserView")->getUserLevel($cur_User["integral"]);
            $this->assign("cur_User_Level",$cur_User_Level);
        }

        $first_Category=M("category")->field('id,cataName')->where(array("parentCata"=>'0'))->select();
        $this->assign("first_Category",$first_Category);
        $second_Category=M("category")->field('id,cataName,parentCata')->where('parentCata!=0')->select();
        $this->assign("second_Category",$second_Category);
    	$this->display();
    }

    //获取根据一级分类id二级分类
    public function getChildCategory($id=1){
        if (!IS_AJAX) exit();
        $child_Category=M("category")->field('id,cataName')->where(array("parentCata"=>$id))->select();
        if(empty($child_Category)){
            $this->ajaxReturn('null');
        }else{
            $this->ajaxReturn($child_Category,'json');
            // var_dump($child_Category);
            //return json_encode($child_Category);
        }
    }

    //上传
    public function upload(){
        if (!IS_POST) exit();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'goodspic/'; // 设置附件上传（子）目录
        $upload->saveName = array('uniqid','');
        $upload->autoSub  = false;
        $upload->hash  = true;
        // 上传文件 
        $info   =   $upload->uploadOne($_FILES['photo']);
        if(!$info) {// 上传错误提示错误信息
            $errorInfo=$upload->getError();
            echo "<script>parent.alertMsg('$errorInfo')</script>";
        }else{// 上传成功
            var_dump($info);
            $imgpath=__ROOT__.'/Public/uploads/goodspic/'.$info['savename'];
            echo "<script>parent.addPhoto('$imgpath')</script>";
        }
    }

    public function publish(){
        if (!IS_POST) $this->error('页面不存在！',U("Home/Index/index"),3);
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        if($cur_User_id==''){
            $this->error('要发布商品必须先登录哦，亲！',U("Home/Index/index"),3);
            exit();
        }
        $data = array(
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

        if ($result=M('goods')->data($data)->add()) {
            D("UserView")->addIntegral($_SESSION["userid"],10);
            $this->ajaxReturn($result);
        } else {
            $this->ajaxReturn('fail');
        }
    }
}
?>