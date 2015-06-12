<?php
namespace Home\Controller;
use Think\Controller;
header('Content-Type: text/html; charset=utf-8');
class GoodsController extends Controller {
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
        }
    	$goodsImg = array('goodsImg1' => $match_goods["goodimg1"],'goodsImg2' => $match_goods["goodimg2"],
    		'goodsImg3' => $match_goods["goodimg3"], 'goodsImg4' => $match_goods["goodimg4"]);
    	$this->assign("match_goods",$match_goods);
    	$this->assign("goodsImg",$goodsImg);
    	$match_UserInfo = D("UserView")->getUserById($match_goods["sellerid"]);
    	$this->assign("match_UserInfo",$match_UserInfo);
    	$UserLevel=D("UserView")->getUserLevel($match_UserInfo["integral"]);
    	$this->assign("UserLevel",$UserLevel);
        if($match_goods["sellerid"]==$cur_User_id){
            $this->assign("show_eidt",'1');
        }
        //商品被收藏数
        $res=M("collection")->field('count(id)')->where(array("goodsid" => $goodsid))->find();
        $favorites_count=$res["count(id)"];
        $this->assign("favorites_count",$favorites_count);
        //评论区
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $sql='select msgid,senderid,receiverid,msgcontent,parentmsg,a.headimg senderimg,a.username sendername,b.username receivername from message,user a,user b '
        .'where a.userid=message.senderid and b.userid=message.receiverid and goodsid='.$goodsid.' order by msgid';
        $comments=$Model->query($sql);
        //$comments2=D("CommentView")->getCommentsByGoodsID($goodsid);
        $this->assign("Comments",$comments);
    	$this->display();
    }

    public function viewsAdd(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        $goods=M("goods");
        $goodsid=I('goodsid');
        $goods->where(array("goodid" => $goodsid))->setInc('views');
    }
    
    //将商品下架
    public function off_shelf(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $goods=M("goods");
        $goodsid=I('goodsid');
        $data["salestate"]='1';
        $result=$goods->where(array("goodid" => $goodsid))->field('salestate')->save($data);
        if($result===false){
            $this->ajaxReturn("fail");
        }else{
            D("UserView")->addIntegral($_SESSION["userid"],2);
            $this->ajaxReturn("ok");
        }
    }

    //将商品确认售出
    public function sold(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $goods=M("goods");
        $goodsid=I('goodsid');
        $data["salestate"]='2';
        $result=$goods->where(array("goodid" => $goodsid))->field('salestate')->save($data);
        if($result===false){
            $this->ajaxReturn("fail");
        }else{
            D("UserView")->addIntegral($_SESSION["userid"],5);
            $this->ajaxReturn("ok");
        }
    }

    //将商品重新上架
    public function on_shelf(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $goods=M("goods");
        $goodsid=I('goodsid');
        $data["salestate"]='0';
        $result=$goods->where(array("goodid" => $goodsid))->field('salestate')->save($data);
        if($result===false){
            $this->ajaxReturn("fail");
        }else{
            D("UserView")->addIntegral($_SESSION["userid"],5);
            $this->ajaxReturn("ok");
        }
    }

    //收藏商品
    public function favorites(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) {
            $this->ajaxReturn("0");
            exit();
        };
        $goods=M("collection");
        $userid=$_SESSION["userid"];
        $goodsid=I('goodsid');
        $data["userid"]=$userid;
        $data["goodsid"]=$goodsid;
        $res=$goods->field('id')->where(array("goodsid" => $goodsid,"userid" =>$userid))->find();
        if(empty($res)){
            $goods->add($data);
            D("UserView")->addIntegral($_SESSION["userid"],2);
            $this->ajaxReturn('1');
        }else{
            $goods->where(array("goodsid" => $goodsid,"userid" =>$userid))->delete();
            D("UserView")->addIntegral($_SESSION["userid"],-2);
            $this->ajaxReturn('2');
        }
    }

    //取消收藏
    public function cancel_favorites(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) {
            $this->ajaxReturn("0");
            exit();
        };
        $goods=M("collection");
        $userid=$_SESSION["userid"];
        $goodsid=I('goodsid');
        $data["userid"]=$userid;
        $data["goodsid"]=$goodsid;
        $goods->where(array("goodsid" => $goodsid,"userid" =>$userid))->delete();
        D("UserView")->addIntegral($_SESSION["userid"],-2);
        $this->ajaxReturn('1');
    }
    

    //评论商品或对评论进行评论
    public function comment(){
        if (!IS_AJAX) $this->error('非法请求页面,3秒后自动跳转到首页',U("Home/Index/index"),3);
        if(!isset($_SESSION["userid"])) $this->error('请先登录，亲！',U("Home/Index/index"),3);
        $comment=M("message");
        $data["senderid"]=I('senderid');
        $data["receiverid"]=I('receiverid');
        $data["msgcontent"]=I('msgcontent');
        $data["goodsid"]=I('goodsid');
        $data["parentmsg"]=I('parentmsg');
        $msgid=$comment->add($data);
        D("UserView")->addIntegral($_SESSION["userid"],1);
        $this->ajaxReturn($msgid);
    }
}
?>