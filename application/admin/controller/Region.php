<?php
namespace app\admin\controller;
use think\Controller;
class Region extends Common{
	public function city(){
		$parent_id = input("get.parent_id");
		return json(get_list('region',['parent_id'=>$parent_id],999));
	}
}