<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//计算多少分秒之前
//$time 时间戳
//最后得出 xx秒前
function get_timejq($time){
    //计算天数
    $timediff = time()-$time;
    $days = intval($timediff/86400);
    if($days==1) {
        return "昨天 " . date("H:i:s", $time);
    }
    if($days==2){
        return "前天 ".date("H:i:s",$time);
    }
    if($days<5 and $days>2){
        return $days."天前";
    }
    if($days>5){
        return date("Y-m-d",$time);
    }

    //计算小时数
    $remain = $timediff%86400;
    $hours = intval($remain/3600);
    if($hours!=0){
        return $hours."小时前";
    }
    //计算分钟数
    $remain = $remain%3600;
    $mins = intval($remain/60);
    if($mins!=0){
        return $mins."分钟前";
    }
    //计算秒数
    $secs = $remain%60;

    return $secs."秒前";

}



//html转text
function html2text($str){  
  $str = preg_replace("/<style .*?<\/style>/is", "", $str);
  $str = preg_replace("/<script .*?<\/script>/is", "", $str);  
  $str = preg_replace("/<br \s*\/?\/>/i", "", $str);  
  $str = preg_replace("/<\/?p>/i", "", $str);  
  $str = preg_replace("/<\/?td>/i", "", $str);  
  $str = preg_replace("/<\/?div>/i", "", $str);  
  $str = preg_replace("/<\/?blockquote>/i", "", $str);  
  $str = preg_replace("/<\/?li>/i", "", $str);  
  $str = preg_replace("/\&nbsp\;/i", "", $str);  
  $str = preg_replace("/\&nbsp/i", "", $str);  
  $str = preg_replace("/\&amp\;/i", "", $str);  
  $str = preg_replace("/\&amp/i", "", $str);    
  $str = preg_replace("/\&lt\;/i", "", $str);  
  $str = preg_replace("/\&lt/i", "", $str);  
  $str = preg_replace("/\&ldquo\;/i", '', $str);  
  $str = preg_replace("/\&ldquo/i", '', $str);  
  $str = preg_replace("/\&lsquo\;/i", "", $str);  
  $str = preg_replace("/\&lsquo/i", "", $str);  
  $str = preg_replace("/\&rsquo\;/i", "", $str);  
  $str = preg_replace("/\&rsquo/i", "", $str);  
  $str = preg_replace("/\&gt\;/i", "", $str);   
  $str = preg_replace("/\&gt/i", "", $str);   
  $str = preg_replace("/\&rdquo\;/i", '', $str);   
  $str = preg_replace("/\&rdquo/i", '', $str);   
  $str = strip_tags($str);  
  $str = html_entity_decode($str, ENT_QUOTES);  
  $str = preg_replace("/\&\#.*?\;/i", "", $str);          
 
 return $str;
 }
 

//删除文件夹所有
function rmdir_all($dir) {
	if(!is_dir($dir)){
		return true;
	}
	//先删除目录下的文件
	$dh = opendir($dir);
	while ($file = readdir($dh)) {
		if ($file != "." && $file != "..") {
			$fullpath = $dir . "/" . $file;
			if (!is_dir($fullpath)) {
				@unlink($fullpath);
			}else{
				rmdir_all($fullpath);
			}
		}
	}
	closedir($dh);
	//删除当前文件夹：
	if (@rmdir($dir)) {
		return true;
	} else {
		return false;
	}
}

//大小转换
function get_size($size) {
	$prec=3;
	$f="";
	if($size<0){$f = "-";}
	$size = round(abs($size));
	$units = array(0=>"B", 1=>"KB", 2=>"MB", 3=>"GB", 4=>"TB");
	if ($size==0) return str_repeat(" ", $prec)."0$units[0]";
	$unit = min(4, floor(log($size)/log(2)/10));
	$size = $size * pow(2, -10*$unit);
	$digi = $prec - 1 - floor(log($size)/log(10));
	$size = round($size * pow(10, $digi)) * pow(10, -$digi);
	return $f.$size.$units[$unit];
}

function get_password($pwd){
	return substr(MD5($pwd),8,16);
}

function get_count($table, $where = "", $field = "") {
	$db = db ( $table );
	if ($field) {
		$count = $db->where ( $where )->sum ( $field );
	} else {
		$count = $db->where ( $where )->count ();
	}
	return $count ? $count : 0;
}

function get_list($table,$where="",$limit=10,$order=""){
	$db = db ( $table );
	return $db->where($where)->limit($limit)->order($order)->select();
}

function get_find($table,$where="",$field=""){
	$db = db ( $table );
	$F = $db->where($where)->find();
	if($field){
		return $F[$field];
	}else{
		return $F;
	}
}


