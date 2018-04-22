<?php
namespace app\api\controller;
class Article extends Common {
    public function index() {
        $p = input("param.p",1);
        $t = input("param.t",0);
        $db = db("article");
        $where['experiment'] = 0;
        $where['works'] = 0;
        $where['state'] = 1;
        
        if($t!=0){
            $where['type'] = $t;
        }
      
        $count = $db->where($where)->count();
        $list = $db->where($where)->order("top desc,id desc")->page($p,10)->select();
       
        for($i=0;$i<count($list);$i++){
            $list[$i]['pic'] = $this->host.$list[$i]['pic'];
            $list[$i]['desc'] = substr(html2text($list[$i]['body']),0,250);
            $list[$i]['typename'] = get_find("category",['id'=>$list[$i]['type']],"name");
            $list[$i]['time'] = date("Y-m-d H:i:s",$list[$i]["time"]);
            $list[$i]['p'] = 1;//评论
        }
        $data['count'] = $count;
        $data['data'] = $list;
        $data['hot'] = $db->where($where)->order("a desc")->limit(10)->select();
        return json($data);
    }
    public function experiment(){
        $db = db("article");
        $where['experiment'] = 1;
        $where['state'] = 1;
        
        $list = $db->where($where)->order("top desc,id desc")->select();
       
        for($i=0;$i<count($list);$i++){
            $list[$i]['pic'] = $this->host.$list[$i]['pic'];
            $list[$i]['desc'] = substr(html2text($list[$i]['body']),0,250);
            $list[$i]['typename'] = get_find("category",['id'=>$list[$i]['type']],"name");
            $list[$i]['date'] = date("Y-m-d",$list[$i]["time"]);
            $list[$i]['p'] = 1;//评论
        }
        return json($list);
    }
    
    public function content(){
        $id = input("param.id");
        $db = db("article");
        $F = $db->where("id",$id)->find();
        $F['time'] = date("Y-m-d H:i:s",$F["time"]);
        $F['update'] = $F["update"] ? date("Y-m-d H:i:s",$F["update"]) : "从未更新";
        $F['typename'] = get_find("category",['id'=>$F['type']],'name') ? : "未分类";
        $F['body'] = preg_replace('/src="/','src="'.$this->host.'/',$F['body']);
        $F['tag'] = explode(",",$F['key']);
        $F['url'] = $this->host."/content/".$id;
        $desc = substr(html2text($F['body']),0,250);
        $logo = $this->host."/favicon.png";
        $F['qz_share'] = "http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=".$F['url']."&title=".$F['title']."&desc=".$desc."&summary=".$desc."&site=-SOURCE-&pics=".$logo;
        $F['qq_share'] = "http://connect.qq.com/widget/shareqq/index.html?url=".$F['url']."&title=".$F['title']."&source=-SOURCE-&desc=".$desc."&pics=".$logo."&summary=".$desc;
        $F['wb_share'] = "http://service.weibo.com/share/mobile.php?url=".$F['url']."&title=".$F['title']."&pic=".$logo."&appkey=2235474446";
        return json($F);
    }
    public function a(){
        $id = input("param.id");
        $db = db("article");
        $db->where("id",$id)->setInc("a");
        $F=$db->where("id",$id)->field("a")->find();
        return json($F);
    }
    public function z(){
        $id = input("param.id");
        $db = db("article");
        if($db->where("id",$id)->setInc("z")!==FALSE){
            return json(['code'=>1]);
        }else{
            return json(['code'=>0]);
        }
    }
}
