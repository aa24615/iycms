<?php
namespace app\admin\controller;
class Uploads extends Common{
    public function head(){
	    $path = ROOT_PATH . 'public' . DS . 'uploads'.DS.$this->req->action().DS;
    	return $this->upload($path);
    }
    public function file(){
    	$path = ROOT_PATH . 'public' . DS . 'uploads'.DS.$this->req->action().DS.date("Ym").DS;
    	return $this->upload($path);
    }
    
    public function pic(){
    	$path = ROOT_PATH . 'public' . DS . 'uploads'.DS.$this->req->action().DS.date("Ym").DS;
    	return $this->upload($path);
    }
    
    private function upload($path,$name="file",$size=5242880,$ext="jpg,png,gif"){
    	$file = $this->req->file($name);
    	if($file){
    		$info = $file->rule('uniqid')->validate(['size'=>$size,'ext'=>$ext])->move($path);
    		if($info){
    			$data =[
    					"code" => 1,
    					"msg"  => "上传成功",
    					"url"  => '/uploads/'.$this->req->action().'/'.($this->req->action()=="head" ? "" : date("Ym/")).$info->getFilename()
    			];
    		}else{
    			$data =[
    					"code" => 0,
    					"msg"  => $file->getError()
    			];
    		}
    	}else{
    		$data =[
    				"code" => 0,
    				"msg"  => "没有选择上传文件"
    		];
    	}
    	return json($data);
    }
}
