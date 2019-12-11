<?php
namespace app\admin\model;
use think\Model;
class Backup extends Model{
	protected function initialize(){
		parent::initialize();
		$this->backup = "../backup/";
	}
	public function get_time($file){
		$dir = $this->backup;
		$time=filemtime($dir.$file);
		return date("Y-m-d H:i:s",$time);
	}
	
	public function get_size($file){
		$dir = $this->backup.$file;
		$z = 0;
		if($dh = opendir($dir)){		
			while (($file = readdir($dh)) !== false){
				if(!is_dir($dir."/".$file) && $file!="." && $file!=".."){
					$z += filesize($dir."/".$file);
				}
			}
			closedir($dh);
		}
		return $z;
	}
	
	public function get_count($file){
		$dir = $this->backup.$file;
		$c = 0;
		if($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false){
				if(!is_dir($dir."/".$file) && $file!="." && $file!=".."){
					$c++;
				}
			}
			closedir($dh);
		}
		return $c;
	}
	public function get_list($dir){
		$list = [];
		if($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false){
				if(is_dir($dir."/".$file) && $file!="." && $file!=".."){
					$list[] = [
						"name" => $file,
						'download' => url("download?dir=".$file)
					];
				}
			}
			closedir($dh);
		}
		return $list;
	}
	public function get_table($table_dir){
		$list = [];
		$dir = $this->backup.$table_dir;
		if($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false){
				if(!is_dir($dir."/".$file) && $file!="." && $file!=".."){
					$list[] = [
						"name" => $file,
						'size' => get_size(filesize($dir."/".$file)),
						'time' => date("Y-m-d H:i:s",filemtime($dir."/".$file)),
						'download' => url("download?dir=".$table_dir."&name=".$file)
					];
				}
			}
			closedir($dh);
		}
		return $list;
	}
	public function del($table_dir){
		$dir = $this->backup.$table_dir;
		if($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false){
				if(!is_dir($dir."/".$file) && $file!="." && $file!=".."){
					if(!@unlink($dir."/".$file)){
						return false;
					}
				}
			}
			closedir($dh);
		}
		if(!@rmdir($dir)){
			return false;
		}
		//删除打包文件
		@unlink("uploads/backup/".$table_dir.".zip");
		
		return true;
	}
	
	public function export($table, $dir,$single){
		//创建DB对象
		$db = db();
		$result = $db->query("SHOW CREATE TABLE `{$table}`");
		$sql  = "\n";
		$sql .= "-- -----------------------------\n";
		$sql .= "-- 数据库由iycms博客管理系统备份\n";
		$sql .= "-- -----------------------------\n";
		$sql .= "\n";
		$sql .= "-- -----------------------------\n";
		$sql .= "-- 表结构  `{$table}`\n";
		$sql .= "-- -----------------------------\n";
		$sql .= "DROP TABLE IF EXISTS `{$table}`;\n";
		$sql .= trim($result[0]['Create Table']) . ";\n\n";
	
		if(!$this->write($sql, $table, $dir,$single)){
			return false;
		}
		//echo $sql; exit;
		//数据总数
		$count = $db->table($table)->count();
		//备份表数据
		if($count){
			//写入数据注释
			$sql  = "-- -----------------------------\n";
			$sql .= "-- 表数据  `{$table}` 共{$count}条\n";
			$sql .= "-- -----------------------------\n";
			if(!$this->write($sql, $table, $dir,$single)){
				return false;
			}
			//备份数据记录
			$list = $db->table($table)->select();
			foreach ($list as $v){
				$data = [];
				foreach ($v as $str){
					$data[] = preg_replace("/'/","\'",$str);
				}
				$sql = "INSERT INTO `{$table}` VALUES ('" .implode("','", $data). "');\n";
				if(!$this->write($sql, $table, $dir,$single)){
					return false;
				}
			}
		}
		return true;
	}
	
	//写入本文
	public function write($data,$table,$name,$single){
		
		$dir = $this->backup;
		if (!file_exists($dir)){
			mkdir ($dir,0777,true);
		}
		$dir= $dir.$name."/";
		if (!file_exists($dir)){
			mkdir ($dir,0777,true);
		}
		if($single==1){
			$filename = $dir.config("database.database").".sql";
		}else{
			$filename = $dir.$table.".sql";
		}
		
		$handle=fopen($filename,"a");
		$str=fwrite($handle,$data);
		fclose($handle);
		return $str;
	}
}