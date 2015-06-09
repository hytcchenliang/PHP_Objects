<?php
namespace Admin\Model;
use Think\Model;
class  CountriesModel extends Model{
	public function getlist(){
		return $this->order("countries_name")->select();
	}
}
?>