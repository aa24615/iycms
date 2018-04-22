<?php
namespace app\admin\controller;
use think\Controller;
class Menu extends Common{
	public function index(){
		$db = db("Menu");
		$list = $db->order("date_start")->select();
		$this->assign("list",$list);
		return view();
	}
	
	public function add(){
		$db = db("Menu");
		if($this->req->isPost()){
			$data = input("post.");
			if($db->insert($data)){
				$this->success("添加成功",url("index"));
			}else{
				$this->error("添加失败");
			}
		}else{
			$list = $db->select();
			$this->assign("list",$list);
			return view();
		}
	}
	
	public function update(){
		$db = db("Menu");
		$where['id'] = input('param.id') ? : $this->error("id不能为空");
		if($this->req->isPost()){
			$data = input("post.");
			$data["state"] = isset($data["state"]) ? 1 : 0;
			if($db->where($where)->update($data)){
				$this->success("修改成功",url("index"));
			}else{
				$this->error("修改失败");
			}
		}else{
			$F = $db->where($where)->find();
			$this->assign("F",$F);
			return view();
		}
	}
	
	public function isan(){
		$db = db("Menu");
		$where['id'] = input('param.id') ? : $this->error("id不能为空");
		$F = $db->where($where)->find();
		$state = ($F['isan']==1) ? 0 : 1;
		if($db->where($where)->setField("isan",$state)!==false){
			$this->success("修改成功");
		}else{
			$this->error("修改失败");
		}
	}
	
	public function del(){
		$db = db("work");
		$where['id'] = input('param.id') ? : $this->error("id不能为空");
		if($db->where($where)->delete()){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}