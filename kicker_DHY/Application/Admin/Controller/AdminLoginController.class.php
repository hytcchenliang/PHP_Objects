<?php
namespace Admin\Controller;
use Think\Controller;
class AdminLoginController extends Controller {


	public function adminlogin() {
		//echo Session::get(C('USER_AUTH_KEY'));
		$map['username']=$_COOKIE['username'];
		$map['password']=$_COOKIE['password'];
		if(!empty($_COOKIE['username']) || !empty($_COOKIE['password'])){
	         $this->doCookies();
	    }      
		
		if (!$_SESSION[C('USER_AUTH_KEY')]) {
			$this->display ();
		} else {
			$this->redirect ( 'Admin/Index' );
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

	Public function doLogin() {

		if (!IS_POST) throw new Exception("非法请求");

		$map ['account'] = $_POST ['account'];
		$map ['status'] = array ('gt', 0 );

		//验证码检测
		$verify = new \Think\Verify();
		if (!$verify->check(I('verify'))) {
			$this->error('验证码错误');
		}

		$authInfo = \Org\Util\Rbac::authenticate ( $map );
		if (! $authInfo) {
			$this->error ( '登录错误：可能这个账户已被禁用！' );
		}
		if ($authInfo ['password'] != md5 ( $_POST ['password'] )) {
			$this->error ( '登录失败：密码错误！' );
		}

		//记录登录时间和ip
		$data = array(
			'last_login_time' => time(),
			'last_login_ip' => get_client_ip(),
		);
		M('User_admin')->where(array('id'=>$authInfo ['id']))->save($data);

		$_SESSION[C('USER_AUTH_KEY')] =  $authInfo ['id'];
		$_SESSION['email'] = $authInfo['email'];
		$_SESSION['loginUserName'] = !empty($authInfo ['nickname'])?$authInfo ['nickname']:$authInfo['account'];
		$_SESSION['login_count'] = $authInfo['login_count'];
		if($authInfo['isadministrator']==1){
			$_SESSION['administrator'] = true;
		}
		\Org\Util\Rbac::saveAccessList ();	
		if($_POST['chcookies']){
			setcookie("username", $_POST ['account'], time()+3600*24*30);
			setcookie("password", $_POST ['password'], time()+3600*24*30);
		}		
		$this->success ( '登录成功！',U('Admin/Index/index'));
	}

	public function doCookies() {
		$map ['account'] =$_COOKIE['username'];
		$map ['status'] = array ('gt', 0 );
		
		$authInfo = \Org\Util\Rbac::authenticate ( $map );
		if (! $authInfo) {
				$this->error ( '登录错误：可能这个账户已被禁用！' );
		}
		if ($authInfo ['password'] != md5 ($_COOKIE['password'] )) {
			$this->error ( '登录失败：密码错误！' );
		}
		
		//记录登录时间和ip
		$data = array(
			'last_login_time' => time(),
			'last_login_ip' => get_client_ip(),
		);
		M('User_admin')->where(array('id'=>$authInfo ['id']))->save($data);

		$_SESSION[C('USER_AUTH_KEY')] =  $authInfo ['id'];
		$_SESSION['email'] = $authInfo['email'];
		$_SESSION['loginUserName'] = !empty($authInfo ['nickname'])?$authInfo ['nickname']:$authInfo['account'];
		$_SESSION['login_count'] = $authInfo['login_count'];
		if($authInfo['isadministrator']==1){
			$_SESSION['administrator'] = true;
		}
		\Org\Util\Rbac::saveAccessList ();	
		$this->redirect ( 'Admin/Index/index' );
	}

	/**
	 * 注销用户
	 */
	public function LogOut(){
		session_unset();
		session_destroy();
		$this->success('退出成功',U("Admin/AdminLogin/adminlogin"));
	}
}