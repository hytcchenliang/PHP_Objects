<?php 
namespace Member\Controller;
use Think\Controller;
Class LoginController extends Controller{

	public function index(){

		$this->display();
	}

	public function checklogin(){

		if (!IS_POST) throw new Exception("非法请求");

		//验证码检测
		$verify = new \Think\Verify();
		if (!$verify->check(I('code'))) {
			$this->error('验证码错误');
		}
		
		$username = I("username");
		$password = md5(I("password"));

		$id = M("user")->where(array("uname" => $username,"password" => $password))->find();

		if ($id) {	
			$_SESSION["userid"] = $id["uid"];
			$_SESSION["username"] = $id["uname"];
			$this->success("登录成功！",U("Home/index/index"));
		
		}
		else{
			$this->error("用户名或者密码不正确!",U("Member/login/index"));
		}

	}

	//生成验证码
	Public function verify(){
		ob_clean();
		$config = array(
			'fontSize' =>14,
			'length' => 4,
			'imageW' => 100,
			'imageH' => 38

		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

	/**
	 * 用户退出
	 */
	public function logout(){
		session_unset();
		session_destroy();
		$this->success('退出成功',U("Home/index/index"));
	}
}

 ?>