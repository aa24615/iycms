<?php
namespace app\admin\controller;
use think\Controller;
class Category extends Common{
	public function index(){
		$db = db("Category");
		$where['pid'] = 0;
		$list = $db->order("sort")->where($where)->select();
		$this->assign("list",$list);
		return view();
	}
	
	public function add(){
		
		$db = db("Category");
		
		if($this->req->isPost()){
			$data = input("post.");
			$data['sort'] = isset($data['sort']) ? $data['sort'] : 99;
			$data['state'] = isset($data['state']) ? 1 : 0 ;
			if($db->insert($data)){
				$this->success("添加成功",url("index"));
			}else{
				$this->error("添加失败");
			}
		}else{
	
			$where['pid'] = 0;
			$list = $db->order("sort")->where($where)->select();
			$this->assign("list",$list);
			return view();
		}
	}
	
	public function update(){
		$db = db("Category");
		$where['id'] = input('param.id') ? : $this->error("id不能为空");
		if($this->req->isPost()){
	
			$data = input("post.");
			$data['sort'] = isset($data['sort']) ? $data['sort'] : 99;
			$data['state'] = isset($data['state']) ? 1 : 0 ;
			if($db->where($where)->update($data)!==false){
				$this->success("修改成功",url("index"));
			}else{
				$this->error("修改失败");
			}
		}else{
	
			$F = $db->where($where)->find() ? : $this->error("参数错误");
			$this->assign("F",$F);
	
			$list = $db->order("sort")->where(['pid'=>0])->select();
			$this->assign("list",$list);
	
			return view();
		}
	}
	
	
	public function state(){
		$db = db("Category");
		$where['id'] = input('param.id') ? : $this->error("id不能为空");
		$type = input("param.type") ? : $this->error("type不能为空");
		$F = $db->where($where)->find();
		
		$state = ($F[$type]==1) ? 0 : 1;
		
		if($db->where($where)->setField($type,$state)!==false){
			$this->success("修改成功");
		}else{
			$this->error("修改失败");
		}
	}
	
	public function del(){
		$db = db("Category");
		$where['id'] = input('param.id') ? : $this->error("id不能为空");
		 
		if($db->where($where)->delete()){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}