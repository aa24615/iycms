<?php
namespace app\admin\controller;
use think\Controller;
class Common extends Controller{
    public function _initialize(){
    	$key = cookie("key") ? : $this->redirect("login/index");
		
		$Admin=db("admin")->where("key",$key)->find() ? : $this->redirect("login/index");
	
		$this->id = $Admin["id"];
		$this->req = request();
		
		if(input("get.this")==1){
			cookie("menu_this",url($this->req->controller().'/'.$this->req->action()));
		}
		
		$menu = db("menu")->where(['pid'=>0,"state"=>1])->select();
		$this->assign("menu",$menu);
		
		$this->breadcrumb();
		//$this->assign("controller",$this->req->controller());
		//$this->assign("action",$this->req->action());
		//$this->assign("this_menu",$this->req->controller()."/".$this->req->action());
    }
    
    //面包屑
    private function breadcrumb(){
    	$this->db = db("menu");
    	$F = $this->db->where("url",$this->req->controller()."/".$this->req->action())->find();
    	$this->data[] = ["name"=>"首页","url"=>"/admin"];
    	$this->breadcrumb_find($F);
    	$this->data[] = $F;
    	$this->assign("breadcrumb",$this->data);
    	
    }
    
    private function breadcrumb_find($F){
    	$is = $this->db->where("id",$F['pid'])->find();
    	if($is){
    		$this->data[] = $is;
    		$this->breadcrumb_find($is);
    	}
    }
}
