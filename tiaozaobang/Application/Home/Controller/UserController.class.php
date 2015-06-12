<?php
namespace Home\Controller;
use Think\Controller;
header('Content-Type: text/html; charset=utf-8');
class UserController extends Controller {
    //User控制器个人资料首页
    public function index(){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->user_common();
        $this->display();
    }

    //User控制器我发布的商品
    public function goods(){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->user_common();
        
        $my_products=M("goods")->field('goodid,goodname,gooddes,pubtime,goodimg1,salestate')->where(array("sellerid" => $cur_User_id))->order('pubtime desc')->select();
        $this->assign("my_products",$my_products);

        $this->display();
    }

    //用户个人中心页公共部分
    public function user_common(){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->assign("cur_User_id",$cur_User_id);
        if($cur_User_id=='') $this->error('您尚未登录,请登陆后查看',U("Home/Index/index"),3);
        if($cur_User_id!=''){
            $cur_User=M("User")->where('userid='.$cur_User_id)->find();
            $this->assign("cur_User",$cur_User);
            $cur_User_Level=D("UserView")->getUserLevel($cur_User["integral"]);
            $this->assign("cur_User_Level",$cur_User_Level);
            $need_integral=D("UserView")->getNeedIntegral($cur_User["integral"]);
            $this->assign("need_integral",$need_integral);
        }
        $res=M("goods")->field('count(goodid)')->where(array("sellerid" => $cur_User_id,"salestate" => '2'))->find();
        $selled_Count=$res["count(goodid)"];
        $this->assign("selled_Count",$selled_Count);
    }

    //User控制器我的收藏
    public function favorites(){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->user_common();
        $res=M("collection")->field('goodsid')->where(array("userid" => $cur_User_id))->select();
        $favorites=array();
        foreach ($res as $val) {
            $favorites[]=$val["goodsid"];
        }
        if(!empty($favorites)){
            $my_enshrine=M("goods")->field('goodid,goodname,gooddes,pubtime,goodimg1,salestate')->where('goodid in ('.implode(",",$favorites).')')->order('pubtime desc')->select();
            $this->assign("my_enshrine",$my_enshrine);
        }
        $this->display();
    }

    //User控制器消息中心
    public function message($all=0){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->user_common();
        $this->assign("all",$all);
        $res=M("collection")->field('goodsid')->where(array("userid" => $cur_User_id))->select();
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $sql='select msgid,senderid,receiverid,msgcontent,goodsid,goodname,parentmsg,headimg senderimg,username sendername from message,user,goods';
        if($all==0){
            $sql.=' where userid=senderid and message.goodsid=goods.goodid and senderid!=receiverid and receiverid='.$cur_User_id.' and haveread=0 order by msgid';
        }else{
            $sql.=' where userid=senderid and message.goodsid=goods.goodid and senderid!=receiverid and receiverid='.$cur_User_id.' order by msgid';
        }
        $msg=$Model->query($sql);
        $this->assign("my_messages",$msg);
        
        $this->display();
    }

    //User控制器用户认证
    public function cert($all=0){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->user_common();
        
        $this->display();
    }

    //用户完善学校信息
    public function school(){
        //只有当用户在session有效时才能合法访问该页面
        if (!isset($_SESSION["SchoolInfo"])) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $school_items=M("school")->select();
        $this->assign("school_items",$school_items);
        $year_items=array();
        for($i=date("Y");$i>=date("Y")-10;$i--){
            $year_items[]=$i;
        }
        $this->assign("year_items",$year_items);
        $this->display();
    }
    //根据学校id获取该校所有二级学院信息
    public function getacademy(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $schoolid=I('schoolid');
        $academy_items=M("department")->field('deptid,deptname')->where(array("parentschool" => $schoolid))->select();
        $html='';
        foreach ($academy_items as $academy) {
            $html.='<li><a value="'.$academy["deptid"].'" href="javascript:;">'.$academy["deptname"].'</a></li>';
        }
        $this->ajaxReturn($html);
    }
    //更新用户学校信息
    public function updateSchoolInfo(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $User=M("user");
        $data["schoolid"]=I('schoolid');
        $data["deptid"]=I('deptid');
        $data["grade"]=substr(I('grade'),2);
        $result=$User->where('userid='.$_SESSION["userid"])->field('schoolid,deptid,grade')->save($data);
        if($result===false){
            $this->ajaxReturn("fail");
        }else{
            $this->ajaxReturn("ok");
        }
    }

    //上传头像
    public function upload(){
        if (!IS_POST) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'headpic/'; // 设置附件上传（子）目录
        $upload->saveName = array('uniqid','');
        $upload->replace = true;
        $upload->autoSub  = false;
        // 上传文件 
        $info = $upload->uploadOne($_FILES['photo']);
        if(!$info) {// 上传错误提示错误信息
            $errorInfo=$upload->getError();
            echo "<script>parent.loading('0')</script>";
            echo "<script>parent.alertMsg('$errorInfo')</script>";
        }else{// 上传成功
            $imgpath=__ROOT__.'/Public/uploads/headpic/'.$info['savename'];
            echo "<script>parent.loading('0')</script>";
            echo "<script>parent.ShowPhoto('$imgpath')</script>";
        }
    }
    //裁剪图片
    public function crop(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $x1=I("x1");
        $y1=I("y1");
        $selectwidth=I("selectwidth");
        $selectheight=I("selectheight");
        $photo=str_replace('/tiaozaobang','.',I("photo"));
        $image = new \Think\Image(); 
        $image->open($photo);
        $image->crop($selectwidth,$selectheight,$x1,$y1)->save($photo);
        //$image->thumb(180, 180)->save($photo);生成固定180*180的缩略图，但图像容易失真
        $this->ajaxReturn("ok");
    }

    //把修改后的图片更新到数据库中
    public function updateheadimg(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $User=M("user");
        $data["headimg"]=I('imgpath');
        $User->where('userid='.$_SESSION["userid"])->field('headimg')->save($data);
    }

    //检测用户昵称是否可以使用
    public function checkUserNick(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $username=I('usernick');
        $result=M("user")->field('userid')->where(array("username" => $username))->find();
        if(empty($result)||$result["userid"]==$_SESSION["userid"]){
            $this->ajaxReturn("true");
        }else{
            $this->ajaxReturn("false");
        }
    }

    //更新用户基本信息
    public function updateBaseInfo(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $User=M("user");
        $data["username"]=I('usernick');
        $data["tel"]=I('phone');
        $data["qq"]=I('qq');
        $result=$User->where('userid='.$_SESSION["userid"])->field('username,tel,qq')->save($data);
        if($result===false){
            $this->ajaxReturn("fail");
        }else{
            $res=$User->field('username,tel,qq')->where('userid='.$_SESSION["userid"])->find();
            D("UserView")->addIntegral($_SESSION["userid"],3);
            $this->ajaxReturn($res);
        }
    }
    
    //检测用户原密码输入是否正确
    public function checkOldPwd(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $result=M("user")->field('pwd')->where('userid='.$_SESSION["userid"])->find();
        if($result["pwd"]==I('oldPwd')){
            $this->ajaxReturn("true");
        }else{
            $this->ajaxReturn("false");
        }
    }
    
    //修改密码
    public function updatePwd(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $User=M("user");
        $data["pwd"]=I('newPwd');
        $result=$User->where('userid='.$_SESSION["userid"])->field('pwd')->save($data);
        if($result===false){
            $this->ajaxReturn("fail");
        }else{
            $this->ajaxReturn("ok");
        }
    }

    //将读过的未读消息状态设为已读
    public function read(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $msgid=I('msgid');
        $User=M("message");
        $data["haveread"]='1';
        $result=$User->where('msgid='.$msgid)->field('haveread')->save($data);
        if($result===false){
            $this->ajaxReturn("fail");
        }else{
            $this->ajaxReturn("ok");
        }
    }

    //统计未读消息数量，推送到用户页面
    public function unreadMessage(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $receiverid=I('userid');
        $msg=M("message");
        $result=$msg->where('senderid!=receiverid and haveread=0 and receiverid='.$receiverid)->count('msgid');
        $this->ajaxReturn($result);
    }
}
?>

