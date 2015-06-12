<?php
namespace Home\Controller;
use Think\Controller;
header('Content-Type: text/html; charset=utf-8');
class ProfileController extends Controller {
    //User控制器个人资料首页
    public function index(){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->assign("cur_User_id",$cur_User_id);
        if($cur_User_id=='') $this->error('您尚未登录,请登陆后查看',U("Home/Index/index"),3);
        if($cur_User_id!=''){
            $cur_User=M("User")->where('userid='.$cur_User_id)->find();
            $this->assign("cur_User",$cur_User);
            $cur_User_Level=D("UserView")->getUserLevel($cur_User["integral"]);
            $this->assign("cur_User_Level",$cur_User_Level);
        }

        $v_userid=I('user');
        $selled_Count=M("goods")->where(array("sellerid" => $v_userid,"salestate" => '2'))->count('goodid');
        $this->assign("selled_Count",$selled_Count);
        $v_user=M("User")->where('userid='.$v_userid)->find();
        $this->assign("v_user",$v_user);
        $v_user_Level=D("UserView")->getUserLevel($v_user["integral"]);
        $this->assign("v_user_Level",$v_user_Level);
        $schoolname=M('school')->field('schoolname')->where(array("schoolid" => $v_user["schoolid"]))->find();
        $deptname=M('department')->field('deptname')->where(array("deptid" => $v_user["deptid"]))->find();
        $v_user_school=$schoolname["schoolname"].'  '.$deptname["deptname"].'  '.'20'.$v_user["grade"].'级';
        $this->assign("v_user_school",$v_user_school);
        $my_products=M("goods")->field('goodid,goodname,gooddes,price,place,pubtime,goodimg1,salestate')->where(array("sellerid" => $v_userid))->order('pubtime desc')->select();
        $this->assign("my_products",$my_products);
        $this->display();
    }

}
?>

