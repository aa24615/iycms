<?php
namespace app\api\controller;
use think\Controller;
class Common extends Controller{
    public function _initialize(){
    	header('Access-Control-Allow-Origin:*');
    	$this->host = "http://".$_SERVER['HTTP_HOST'];
    }
    
}
