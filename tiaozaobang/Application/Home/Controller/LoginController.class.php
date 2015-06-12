<?php
namespace Home\Controller;
use Think\Controller;
header('Content-Type: text/html; charset=utf-8');
class LoginController extends Controller {
    /**
     * 用户登录
     */
    public function index(){
    	if (!IS_POST) $this->error('非法请求页面',U("Home/Index/index"),5);        
        $username = I("username");
        $password = I("password");
        $loginstyle = I("loginstyle");
        if($loginstyle=='username'){
            $user = M("user")->field('userid,lastlogin')->where(array("username" => $username,"pwd" => $password))->find();
        }
        if($loginstyle=='email'){
            $user = M("user")->field('userid,lastlogin')->where(array("email" => $username,"pwd" => $password))->find();
        }
        if (!empty($user)) {  
            //登陆成功后写入session
            $_SESSION["userid"] = $user["userid"];
            //获取用户最后一次登录时间和当前时间对比，只有当天首次登录才会增加积分
            $lastLoginDate=date("Y-m-d",strtotime($user["lastlogin"]));
            $curDate=date("Y-m-d",time());
            if($lastLoginDate!=$curDate){
                D("UserView")->addIntegral($user["userid"],5);
            }
            //更新用户当前登录时的时间
            $user=M("user");
            $user->lastlogin=date("Y-m-d H:i:s",time());
            $user->where('userid='.$_SESSION["userid"])->save();
            $this->ajaxReturn('ok');
        }
        else{
            $this->ajaxReturn('fail');
        }
    }

    /**
     * 用户退出登录
     */
    public function logout(){
        session_unset();
        session_destroy();
        $this->ajaxReturn('ok');
    }

    /**
     * 用户注册账号
     */
    public function regist(){
        if (!IS_AJAX) $this->error('非法请求页面',U("Home/Index/index"),5); 
        $username = I("username");
        $password = I("password");
        $email = I("email");
        $Model = M('user');
        $Model->username = $username;
        $Model->pwd = $password;
        $Model->email = $email;
        $Model->headimg='/tiaozaobang/Public/images/avatar'.rand(1,8).'.png';//随机生成默认头像
        $newUserId=$Model->add();//向数据库插入数据并返回插入成功的自增主键的值，这里为userid
        if (!empty($newUserId)) {
            //注册成功后写入session
            $_SESSION["userid"] = $newUserId;
            //设置session,可以使用户在session有效期内有权访问指定页，过期则无法访问
            $_SESSION["SchoolInfo"]='able';
            $this->ajaxReturn('ok');
        }
        else{
            $this->ajaxReturn('fail');
        }
    }

    //检测用户名是否已被注册
    public function checkUsername(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $username=I('username');
        $result=M("user")->field('userid')->where(array("username" => $username))->find();
        if(!empty($result)){
            $this->ajaxReturn("true");
        }else{
            $this->ajaxReturn("false");
        }
    }
    //检测邮箱是否已被使用
    public function checkUserEmail(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $email=I('email');
        $result=M("user")->field('userid')->where(array("email" => $email))->find();
        if(!empty($result)){
            $this->ajaxReturn("true");
        }else{
            $this->ajaxReturn("false");
        }
    }
}
?>