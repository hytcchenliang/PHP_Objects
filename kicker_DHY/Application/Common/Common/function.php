<?php 

function getPageNum($count){
	if ($count<=3) {
		return 1;
	}else{
		if ($count%3 == 0) {	
			return $count/3;
		}else{
			return floor($count/3)+1;
		}
	}
}

function getPageArr($num){
	$arr = array();
	for($i = 0;$i<$num;$i++){
		$arr[$i] = $i+1;
	}
	return $arr;
}

 ?>