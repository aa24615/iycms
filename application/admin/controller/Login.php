<?php
namespace app\admin\controller;
use think\Controller;
class Login extends Controller{
    public function index(){
    	if(request()->isPost()){
    		$db = db("Admin");
    		$where['user']= input("post.user") ? : $this->error("用户名不能为空");
    		$pwd = input("post.pwd") ? : $this->error("密码不能为空");
    		if($F=$db->where($where)->find()){
    			if($F['pwd']!==get_password($pwd)){
    				$this->error("密码错误");
    			}
    			cookie("key",$F['key']);
    			$this->success("登陆成功",url("index/index"));
    		}else{
    			$this->error("用户名错误");
    		}
    	}else{
    		$data = ['user'=>"admin",'pwd'=>get_password("admin"),"key"=>MD5(get_password("admin"))];
    		
    		//db('admin')->insert($data);
    		
    		return view();
    	}
    }
    
    public function out(){
    	cookie("key",null);
    	$this->redirect("/");
    }
    
}
