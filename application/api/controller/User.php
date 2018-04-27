<?php
/**
 * Created by PhpStorm.
 * User: aa24615
 * Date: 2018/4/27
 * Time: 下午2:06
 */
namespace app\api\controller;
class User extends Common {
    //把用户信息入库
    public function add(){
        $data = input('post.');
        $db = db("user");
        $data['time'] = time();
        $data['pic'] = "http://qlogo.store.qq.com/qzone/".$data['qq']."/".$data['qq']."/100";

        if(!$db->where("qq",$data['qq'])->find()){
            if($db->insert($data)){
                return json(['code'=>1]);
            }else{
                $this->error("失败");
            }
        }else{
            $this->error("已存在");
        }


    }
    //获取QQ信息
    public function qqInfo(){
        $qq = input("param.qq");
        $data = file_get_contents("http://www.koukoucha.com/main/{$qq}/");
        $data = iconv("GBK", "UTF-8", $data);
        preg_match ('/class="hl_nick">(.*)<\/div>/', $data, $out);
        $msg['name'] = $out[1];
        $msg['pic'] = "http://qlogo.store.qq.com/qzone/".$qq."/".$qq."/100";
        $msg['url'] = "http://user.qzone.qq.com/".$qq;
        $msg['email'] = $qq."@qq.com";
        return json($msg);
    }
}

