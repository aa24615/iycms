<?php
namespace app\api\controller;
require EXTEND_PATH.'/ip/ClientInfo.class.php';
class Leave extends Common {
    public function add(){
        error_reporting(E_ERROR | E_PARSE );
        $Info = new \ClientInfo();
        $db = db("leave");
        $data['content'] = input("post.content");
        $data['pid'] = input("post.id",0);
        $data['uid'] = 0;
        $data['time'] = time();
        $data['ip'] = $this->req->ip();
        $data['browser'] = $Info->browser();
        $data['lang'] = $Info->lang();
        $data['os'] = $Info->os();
        $data['region'] = $Info->region();

        if($db->insert($data)){
            return json(['code'=>1]);
        }else{
            $this->error("失败");
        }
    }

    public function index(){
        $p = input("param.p",1);
        $db = db("leave");
        $where['pid'] = 0;
        $data['count'] = $db->where($where)->count();
        $list = $db->where($where)->order("time desc")->page($p,10)->select();
        $i=0;
        foreach ($list as $v){
            $list[$i]['time'] = date("Y-m-d H:i:s",$list[$i]['time']);
            $list[$i]['head'] = $this->host."/static/common/image/head.jpg";
            $i++;
        }
        $data['list']= $list;
        return json($data);

    }
}