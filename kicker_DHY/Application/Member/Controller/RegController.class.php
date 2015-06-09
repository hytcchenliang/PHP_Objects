<?php 
namespace Member\Controller;
use Think\Controller;
Class RegController extends Controller{

	public function index(){

		$this->display();
	}

	public function checkUser(){

		if (IS_AJAX===false) throw new Exception("非法请求");
		 
		$username = I('username');

		$user = M("user")->where(array('uname' => $username))->select();

		if ($user) {
			$data = array('status'=>1,'msg'=>"用户名已经存在");		
		}
		else{
			$data = array('status'=>0,'msg'=>'用户名可以使用');
		}
		$this->ajaxReturn($data,'json');
	}

	public function AddUser(){

		if (IS_POST === false) throw new Exception("非法请求！");

		$data = array(
			"uname" => I("username"),
			"password" => md5(I("password")),
			"email" => I("usermail")
		);

		$id = M("user")->data($data)->add();

		if ($id) {
			$this->success('注册成功！',U("Member/login/index"));
		}
		else{
			$this->error('注册失败',U("Member/reg/index"));
		}


	}
}

 ?>