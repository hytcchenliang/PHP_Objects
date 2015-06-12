<?php
namespace Home\Controller;
use Think\Controller;
header('Content-Type: text/html; charset=utf-8');
class IndexController extends Controller {
    public function index(){
    	$this->search();
    }

    public function search($keyword='',$page=1,$order_by='1'){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->assign("cur_User_id",$cur_User_id);
        if($cur_User_id!=''){
            $cur_User=M("User")->where('userid='.$cur_User_id)->find();
            $this->assign("cur_User",$cur_User);
            $cur_User_Level=D("UserView")->getUserLevel($cur_User["integral"]);
            $this->assign("cur_User_Level",$cur_User_Level);
        }

       	$match_goods = D("GoodsView")->searchGoods($keyword,$page,$order_by);
       	$this->assign("keyword",$keyword);
    	$this->assign("match_goods",$match_goods);
        $this->assign("order_by",$order_by);
    	$order_by1=U("Home/Index/search").'?keyword='.$keyword.'&order_by=1';
    	$order_by2=U("Home/Index/search").'?keyword='.$keyword.'&order_by=2';
    	$order_by3=U("Home/Index/search").'?keyword='.$keyword.'&order_by=3';
    	$order_by4=U("Home/Index/search").'?keyword='.$keyword.'&order_by=4';
    	$order_by5=U("Home/Index/search").'?keyword='.$keyword.'&order_by=5';
    	$this->assign("order_by1",$order_by1);
    	$this->assign("order_by2",$order_by2);
    	$this->assign("order_by3",$order_by3);
    	$this->assign("order_by4",$order_by4);
    	$this->assign("order_by5",$order_by5);
    	$goods_count=D("GoodsView")->getCountOfGoods($keyword);
    	$pagesize=D("GoodsView")->getPageSize();
    	$page_count=(intval($goods_count)%$pagesize==0) ? intval($goods_count)/$pagesize : ceil(intval($goods_count)/$pagesize);
    	$pages_arr=array();
    	for ($i=1; $i <= $page_count; $i++) { 
    		$pages_arr[]=U("Home/Index/search").'?keyword='.$keyword.'&page='.$i.'&order_by='.$order_by;
    	}
    	$pre_page=($page==1) ? U("Home/Index/search").'?keyword='.$keyword.'&page=1&order_by='.$order_by : U("Home/Index/search").'?keyword='.$keyword.'&page='.($page-1).'&order_by='.$order_by;
    	$next_page=($page==$page_count) ? U("Home/Index/search").'?keyword='.$keyword.'&page='.$page.'&order_by='.$order_by : U("Home/Index/search").'?keyword='.$keyword.'&page='.($page+1).'&order_by='.$order_by;
    	$this->assign("cur_page",$page);
    	$this->assign("page_count",$page_count);
    	$this->assign("pre_page",$pre_page);
    	$this->assign("next_page",$next_page);
		$this->assign("pages_arr",$pages_arr);
		$this->display();
    }

    public function category($id=1,$page=1,$order_by='1'){
        $cur_User_id=isset($_SESSION["userid"])?$_SESSION["userid"]:'';
        $this->assign("cur_User_id",$cur_User_id);
        if($cur_User_id!=''){
            $cur_User=M("User")->where('userid='.$cur_User_id)->find();
            $this->assign("cur_User",$cur_User);
            $cur_User_Level=D("UserView")->getUserLevel($cur_User["integral"]);
            $this->assign("cur_User_Level",$cur_User_Level);
        }

        //获取分类id对应的分类名全称
    	$categoryName=D("Category")->getFullNameById($id);
       	$this->assign("keyword",$categoryName);
        $match_goods = D("GoodsView")->searchGoodsByCategory($id,$page,$order_by);
    	$this->assign("match_goods",$match_goods);
        $this->assign("order_by",$order_by);
    	$order_by1=U("Home/Index/category").'?id='.$id.'&order_by=1';
    	$order_by2=U("Home/Index/category").'?id='.$id.'&order_by=2';
    	$order_by3=U("Home/Index/category").'?id='.$id.'&order_by=3';
    	$order_by4=U("Home/Index/category").'?id='.$id.'&order_by=4';
    	$order_by5=U("Home/Index/category").'?id='.$id.'&order_by=5';
    	$this->assign("order_by1",$order_by1);
    	$this->assign("order_by2",$order_by2);
    	$this->assign("order_by3",$order_by3);
    	$this->assign("order_by4",$order_by4);
    	$this->assign("order_by5",$order_by5);
    	$goods_count=D("GoodsView")->getCountByCategoryId($id);
    	$pagesize=D("GoodsView")->getPageSize();
    	$page_count=(intval($goods_count)%$pagesize==0) ? intval($goods_count)/$pagesize : ceil(intval($goods_count)/$pagesize);
    	$pages_arr=array();
    	for ($i=1; $i <= $page_count; $i++) { 
    		$pages_arr[]=U("Home/Index/category").'?id='.$id.'&page='.$i.'&order_by='.$order_by;
    	}
    	$pre_page=($page==1) ? U("Home/Index/category").'?id='.$id.'&page=1&order_by='.$order_by : U("Home/Index/category").'?id='.$id.'&page='.($page-1).'&order_by='.$order_by;
    	$next_page=($page==$page_count) ? U("Home/Index/category").'?id='.$id.'&page='.$page.'&order_by='.$order_by : U("Home/Index/category").'?id='.$id.'&page='.($page+1).'&order_by='.$order_by;
    	$this->assign("cur_page",$page);
    	$this->assign("page_count",$page_count);
    	$this->assign("pre_page",$pre_page);
    	$this->assign("next_page",$next_page);
		$this->assign("pages_arr",$pages_arr);
		$this->display();
    }
    
}
?>