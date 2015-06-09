<?php
namespace Member\Controller;
use Think\Controller;
Class IndexController extends Controller{
    public function index(){
    	$close_goods = M("goods")->where(array("cid"=>1))->limit(8)->select();
    	$this->assign("close_goods",$close_goods);

    	$shoes_goods = M("goods")->where(array("cid"=>3))->limit(8)->select();
    	$this->assign("shoes_goods",$shoes_goods);

    	$soccer_goods = M("goods")->where(array("cid"=>4))->limit(8)->select();
   		$this->assign("soccer_goods",$soccer_goods);

    	$this->display();
    }

    /**
     * 处理用户上传图像
     */
    public function uploadHeadImage(){
    	$tempFile = $_FILES['Filedata']['tmp_name'];
    	$targetFolder = '/kicker/Public/uploads/headimages';
    	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
		$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];

		//验证文件类型
		$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
		$fileParts = pathinfo($_FILES['Filedata']['name']);

		if (in_array($fileParts['extension'],$fileTypes)) {
			move_uploaded_file($tempFile,$targetFile);
			echo '1';
		} else {
			echo '0';
		}
    }

}