<?php
namespace app\admin\controller;
use think\Controller;
class Leave extends Common{
	public function index(){
		$this->assign("list",[]);
		return view();
	}
}