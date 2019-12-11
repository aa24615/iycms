<?php
/*
 * 梦雪php取客户端信息类 (升级版)
 * 版本 v1.1 更新时间 2016.10.30
 * 代码更新地址 www.flash127.com 
 * 代码整理 小曾 
 * email admin@php127.com
 * 
 */

/*
 * >> 用法 <<
 * 
 * $Info = new ClientInfo();
 * echo $Info->browser(); //浏览器类型
 * echo "<br />";
 * echo $Info->lang(); //浏览器语言
 * echo "<br />";
 * echo $Info->os(); //操作系统 升级版
 * echo "<br />";
 * echo $Info->ip(); //ip地址
 * echo "<br />";
 * echo $Info->region(); //ip归属地 默认返回 国家 省级 市(区)
 * 
 * 在本地测试可能取到的是127.0.0.1 所以可能有小报错,请关闭报错即可!
 * 
 * $Info->region(ip地址|可不填,返回类型(string为字符串|array为数组),返回值(仅string有效)1为xx 2为xx xx 3为 xx xx xx);
 * 详情请看函数 region();
 * 
 * 
 */
class ClientInfo {
    ////获得访客浏览器类型
    function browser() {
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $br = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/MSIE/i', $br)) {
                $br = 'MSIE';
            } elseif (preg_match('/Firefox/i', $br)) {
                $br = 'Firefox';
            } elseif (preg_match('/Chrome/i', $br)) {
                $br = 'Chrome';
            } elseif (preg_match('/Safari/i', $br)) {
                $br = 'Safari';
            } elseif (preg_match('/Opera/i', $br)) {
                $br = 'Opera';
            } else {
                $br = 'Other';
            }
            return $br;
        } else {
            return false;
        }
    }
    //获得访客浏览器语言
    function lang() {
        if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $lang = substr($lang, 0, 5);
            if (preg_match("/zh-cn/i", $lang)) {
                $lang = "简体中文";
            } elseif (preg_match("/zh/i", $lang)) {
                $lang = "繁体中文";
            } else {
                $lang = "English";
            }
            return $lang;
        } else {
            return false;
        }
    }
    //获取访客操作系统  升级版
    function os() {
        $Agent = $_SERVER['HTTP_USER_AGENT'];
        if (!empty($Agent)){
	        if (@preg_match('/Win/', $Agent) && strpos($Agent, '95')) {
	            $os = '/=Windows 95/=';
	        } elseif (@preg_match('/Win 9x/', $Agent) && strpos($Agent, '/4\.90/')) {
	            $os = 'Windows ME';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/98/', $Agent)) {
	            $os = 'Windows 98';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/NT 5\.0/', $Agent)) {
	            $os = 'Windows 2000';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/NT 6\.0/', $Agent)) {
	            $os = 'Windows Vista';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/NT 10/', $Agent)) {
	            $os = 'Windows 10';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/NT 8/', $Agent)) {
	            $os = 'Windows 8';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/NT 6/', $Agent)) {
	            $os = 'Windows 7';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/NT 5/', $Agent)) {
	            $os = 'Windows XP';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/NT/', $Agent)) {
	            $os = 'Windows NT';
	        } elseif (@preg_match('/Win/', $Agent) && @preg_match('/32/', $Agent)) {
	            $os = 'Windows 32';
	        } elseif (@preg_match('/linux/', $Agent)) {
	            $os = 'Linux';
	        } elseif (@preg_match('/unix/', $Agent)) {
	            $os = 'Unix';
	        } else if (@preg_match('/sun/', $Agent) && @preg_match('/os/', $Agent)) {
	            $os = 'SunOS';
	        } elseif (@preg_match('/ibm/', $Agent) && @preg_match('/os/', $Agent)) {
	            $os = 'IBM OS/2';
	        } elseif (@preg_match('/Mac/', $Agent)) {
	            $os = 'Mac';
	        } elseif (@preg_match('/PowerPC/', $Agent)) {
	            $os = 'PowerPC';
	        } elseif (@preg_match('/AIX/', $Agent)) {
	            $os = 'AIX';
	        } elseif (@preg_match('/HPUX/', $Agent)) {
	            $os = 'HPUX';
	        } elseif (@preg_match('/NetBSD/', $Agent)) {
	            $os = 'NetBSD';
	        } elseif (@preg_match('/BSD/', $Agent)) {
	            $os = 'BSD';
	        } elseif (@preg_match('/OSF1/', $Agent)) {
	            $os = 'OSF1';
	        } elseif (@preg_match('/IRIX/', $Agent)) {
	            $os = 'IRIX';
	        } elseif (@preg_match('/FreeBSD/', $Agent)) {
	            $os = 'FreeBSD';
            }else{
	        	$os = '未知';
	        }
        }else{
        	$os = false;
        }
        return $os;
    }
    //获得访客真实ip
    function ip() {
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //获取代理ip
            $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        }
        if ($ip) {
            $ips = array_unshift($ips, $ip);
        }
        $count = count($ips);
        for ($i = 0; $i < $count; $i++) {
            if (!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) { //排除局域网ip
                $ip = $ips[$i];
                break;
            }
        }
        $tip = empty($_SERVER['REMOTE_ADDR']) ? $ip : $_SERVER['REMOTE_ADDR'];
        return $tip;
    }
    //根据ip获得访客所在地地名
    function region($ip = '',$type="string",$n=3) {
        if (empty($ip)) {
            $ip = $this->ip();
        }
        $ipadd = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=" . $ip); //根据新浪api接口获取
        if ($ipadd) {
            $charset = iconv("gbk", "utf-8", $ipadd);
            preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $charset, $ipadds);
            if($type=='string'){
            	if($n==3){
            		$region = $ipadds[0][0] . " " . $ipadds[0][1] . " " . $ipadds[0][2];
            	}elseif($n==2){
            		$region = $ipadds[0][1] . " " . $ipadds[0][2];
            	}elseif($n==1){
            		$region = $ipadds[0][2];
            	}
            }elseif($type=='array'){
            	$region = array(
            		'countries' => $ipadds[0][0],
            		'province' => $ipadds[0][1],
            		'city'	=> $ipadds[0][2] 
            	);
            }
            
            return $region;
        } else {
            return false;
        }
    }
}
?>
