<?php 
namespace Admin\Controller;
use Think\Controller;
Class IndexController extends AdminCommonController{


	public function Index(){
		// session_unset();
		// session_destroy();
		$this->display();
	}

	
}

 ?>