<?php
namespace app\admin\controller;
use think\Controller;
use PclZip;
use app\admin\model\Backup;
class Mysql extends Common{
	public function backup(){
		set_time_limit(0);
		$table = input("param.table");
		if($table){
			$backup = new Backup();
			$dir = input("param.dir");
			$single = input("param.single",0);
			if($single!=1){
				@unlink("../backup/".$dir."/".$table.".sql");
			}
			if($backup->export($table, $dir,$single)){
				$this->success("备份成功");
			}else{
				$this->error("备份失败");
			}          
		}else{			
			$list = db()->query("SHOW TABLE STATUS");
			$this->assign("list",$list);
			return view();
		}	
	}
	public function reduction(){
		$dir = "../backup/";
		$backup = new Backup();
		$list = $backup->get_list($dir);
		$this->assign("backup",$backup);
		$this->assign("list",$list);
		return view();
	}
	public function table(){
		$dir = input("param.dir");
		$backup = new Backup();
		$list=$backup->get_table($dir);
		return json($list);
	}
	public function download(){
		$dir = input("param.dir");
		$name = input("param.name");
		if($name){
			$file = "../backup/".$dir."/".$name;
			$data=file_get_contents($file);
			exit($data);
		}else{
			import('zip.pclzip', EXTEND_PATH, '.lib.php');
			$zipname = 'uploads/backup/'.$dir.'.zip';
			@unlink($zipname);
			$zip = new PclZip($zipname);
			$zip = $zip->add("../backup/".$dir,PCLZIP_OPT_REMOVE_ALL_PATH);
			if ($zip == 0) {
				exit("打包失败");
			}else{
				header("Location: /".$zipname);
				exit();
			}				
		}
	}
	public function del(){
		$dir = input("param.dir");
		$backup = new Backup();
		if($backup->del($dir)){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	
	
}