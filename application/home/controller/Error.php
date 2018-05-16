<?php
namespace app\home\controller;
class Error{
    public function index(){
        $this->index("这个页面真没有","/");
    }
}