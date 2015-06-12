//下架商品
function off_shelf(goodsid){
	if(confirm("下架后商品别人将看不到，是否确认下架？")){
		$.post(
	        '/tiaozaobang/Home/Goods/off_shelf',
	        {goodsid : goodsid},
	        function(res) {
	            if(res=='ok'){
		    		window.location.reload();
		    	}else{
					alertMsg("下架失败");
		    	}
	        }
	    );
	}
	
}
//确认商品卖出
function sold(goodsid){
	if(confirm("确认售出后商品别人将看不到，是否确认售出？")){
		$.post(
	        '/tiaozaobang/Home/Goods/sold',
	        {goodsid : goodsid},
	        function(res) {
	            if(res=='ok'){
		    		window.location.reload();
		    	}else{
					alertMsg("售出失败");
		    	}
	        }
	    );
	}
}

//重新上架
function on_shelf(goodsid){
	$.post(
        '/tiaozaobang/Home/Goods/on_shelf',
        {goodsid : goodsid},
        function(res) {
            if(res=='ok'){
	    		window.location.reload();
	    	}else{
				alertMsg("上架失败");
	    	}
        }
    );
}

//取消收藏
function cancel_favorites(goodsid){
	$.post(
        '/tiaozaobang/Home/Goods/cancel_favorites',
        {goodsid : goodsid},
        function(res) {
            if(res=='1'){
	    		$("#goods"+goodsid).remove();
	    	}else{
				alertMsg("取消收藏失败！");
	    	}
        }
    );
}

