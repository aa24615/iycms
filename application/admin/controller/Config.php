<?php
namespace app\admin\controller;
class Config extends Common{
    public function index(){
    	if($this->req->isPost()){
    		$post = input("post.");
    		$content = "<?php\n";
    		$content .= "\treturn [\n";
    		 
    		foreach ($post as $k=>$v){
    			$content .= "\t\t'{$k}' => '{$v}',\n";
    		}
    		$content .= "\t];\n";
    		$content .= "?>";
    		$is=file_put_contents(ROOT_PATH."/application/extra/config.php", $content);
    		if($is){
    			$this->success("保存成功");
    		}else{
    			$this->error("保存失败");
    		}
    	}else{
    		return view();
    	}
    }
    public function password(){
    	if($this->req->isPost()){
    		$post = input("post.");
    		if($post['pwd1']!=$post['pwd2']){
    			$this->error("二次密码不一致");
    		}
    		$data['pwd'] = get_password($post['pwd1']);
    		$data['key'] = MD5($data['pwd']);
    		if(db("admin")->where("id",$this->id)->update($data)!==false){
    			$this->success("修改成功");
    		}else{
    			$this->error("修改失败");
    		}
    	}else{
    		return view();
    	}
	}
	public function cache(){
		if(rmdir_all("../runtime")){
			$this->success("清除成功");
		}else{
			$this->error("清除失败");
		}
	}
}
