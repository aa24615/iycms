<?php
namespace app\api\controller;
require EXTEND_PATH.'/ip/ClientInfo.class.php';
class Leave extends Common {
    public function add(){
        error_reporting(E_ERROR | E_PARSE );
        $Info = new \ClientInfo();
        $db = db("leave");
        $data['content'] = input("post.content") ? : $this->error("留言内容不能为空");
        $data['pid'] = input("post.pid",0);
        $data['qq'] = input("post.qq",0);
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
    //查顶级
    public function index(){
        $p = input("param.p",1);
        $db = db("leave");
        $where['pid'] = 0;
        $data['count'] = $db->where($where)->count();
        $list = $db->where($where)->order("time desc")->page($p,10)->select();
        $data['list']= $this->getList($list) ? : [];
        return json($data);
    }
    //查子级
    private function reply($id){
        $db = db("leave");
        $where['pid'] = $id;
        $list = $db->where($where)->order("time desc")->limit(100)->select();
        return $this->getList($list) ? : [];
    }
    //处理列表中的数据
    private function getList($list){
        $i = 0;
        $user = db("user");
        foreach ($list as $v){
            $F = $user->where("qq",$v['qq'])->find();
            $list[$i]['time'] = get_timejq($list[$i]['time']);
            $list[$i]['name'] = $F['name'] ? : "匿名";
            $list[$i]['region'] = trim( $list[$i]['region']);
            $list[$i]['head'] = $F['pic'] ? $this->host.url('getHead?qq='.$v['qq']) : $this->host."/static/common/image/head.jpg";
            $list[$i]['list'] = $this->reply($v['id']);
            $list[$i]['url'] = $F['url'];
            $i++;
        }
        return $list;
    }
    public function getHead(){
        header('Content-type: image/png');
        $qq = input("param.qq");
        $url = "http://qlogo.store.qq.com/qzone/".$qq."/".$qq."/100";


        if($data=cache("qqHead_".$qq)){
           return $data;
        }

        $data  = file_get_contents($url);
        cache("qqHead_".$qq,$data,86400*7);
        return $data;
    }
}