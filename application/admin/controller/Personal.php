<?php
namespace app\admin\controller;
use think\Controller;
class Personal extends Common{
	public function info(){
		$db = db("info");
		$where = [];
		if($this->req->isPost()){
			$data = input("post.");
			
			foreach ($data as $k=>$v){
				$where["name"] = $k;
				if($db->where($where)->find()){
					$db->where($where)->setField("value",$v);
				}else{
					$k!="file" && $db->insert(["name"=>$k,"value"=>$v]);
				}
			}
			
			$this->success("更新完成");
			
		}else{
			foreach ($db->select() as $v){
				//echo $v['name'].":'{\$F.".$v['name']."}',";
				$F[$v['name']] = $v['value'];
			}
			
			$this->assign("F",$F);
			return view();
		}
	}
	
	public function skills(){
		$db = db("skills");
		if($this->req->isPost()){
			$data = input("post.");
                        $data = $data['name'];
			//print_r($data['name']);exit;
                        for ($i=1;$i<count($data);$i++){
                            $db->where("id",$i)->update(["name"=>$data[$i]['name'],"value"=>$data[$i]['value']]);
                        }
			
			$this->success("更新完成");
			
		}else{
			$list = $db->order("id")->limit(80)->select();
                        
			$this->assign("list", json_encode($list));
			return view();
		}
	}
	
	
}