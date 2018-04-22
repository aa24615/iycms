<?php
namespace app\admin\controller;
use think\Controller;
class Comments extends Common{
	public function index(){
		$this->assign("list",[]);
		return view();
	}
}