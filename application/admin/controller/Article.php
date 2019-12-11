<?php

namespace app\admin\controller;

use think\Controller;

class Article extends Common {

    public function index() {
        $db = db("Article");
        $where = [];
        $list = $db->order("time desc")->where($where)->select();
        $this->assign("list", $list);
        return view();
    }

    public function add() {
        if ($this->req->isPost()) {
            $data = input("post.");
            $data['time'] = time();
            $db = db("article");
            $data['pic'] = $data['pic'] ?: "/static/common/image/pic.png";
            //保存关键词
            $keys = db("keys");
            foreach (explode(",",$data['key']) as $v){
                if($v=trim($v)){
                    if(!$keys->where('name',$v)->find()){
                        $key[] =["name"=>$v];
                    }  
                }
            }
            if(isset($key)){
                $keys->insertAll($key);
            }
            
            if ($db->insert($data)) {
                $this->success("添加成功", url("index"));
            } else {
                $this->error("添加失败");
            }
        } else {
            $list = db("Category")->order("sort")->where(["pid" => 0])->select();
            $this->assign("list", $list);
            return view();
        }
    }

    public function update() {
        $db = db("article");
        $where['id'] = input('param.id') ?: $this->error("id不能为空");
        if ($this->req->isPost()) {
            $data = input("post.");
            $data['pic'] = $data['pic'] ?: "/static/common/image/pic.png";
            
            //保存关键词
            $keys = db("keys");
            foreach (explode(",",$data['key']) as $v){
                if($v=trim($v)){
                    if(!$keys->where('name',$v)->find()){
                        $key[] =["name"=>$v];
                    }  
                }
            }
            if(isset($key)){
                $keys->insertAll($key);
            }
            
            
            if ($db->where($where)->update($data)) {
                $this->success("修改成功", url("index"));
            } else {
                $this->error("修改失败");
            }
        } else {

            $F = $db->where($where)->find() ?: $this->error("参数错误");
            $this->assign("F", $F);

            $list = db("Category")->order("sort")->where(['pid' => 0])->select();
            $this->assign("list", $list);

            return view();
        }
    }

    public function state() {
        $db = db("Article");
        $where['id'] = input('param.id') ?: $this->error("id不能为空");
        $F = $db->where($where)->find();
        $state = ($F['state'] == 1) ? 0 : 1;
        if ($db->where($where)->setField("state", $state) !== false) {
            $this->success("修改成功");
        } else {
            $this->error("修改失败");
        }
    }

    public function top() {
        $db = db("Article");
        $where['id'] = input('param.id') ?: $this->error("id不能为空");
        $F = $db->where($where)->find();
        $state = ($F['top'] == 1) ? 0 : 1;
        if ($db->where($where)->setField("top", $state) !== false) {
            $this->success("修改成功");
        } else {
            $this->error("修改失败");
        }
    }

    public function experiment() {
        $db = db("Article");
        $where['id'] = input('param.id') ?: $this->error("id不能为空");
        $F = $db->where($where)->find();
        $state = ($F['experiment'] == 1) ? 0 : 1;
        if ($db->where($where)->setField("experiment", $state) !== false) {
            $this->success("修改成功");
        } else {
            $this->error("修改失败");
        }
    }

    public function works() {
        $db = db("Article");
        $where['id'] = input('param.id') ?: $this->error("id不能为空");
        $F = $db->where($where)->find();
        $state = ($F['works'] == 1) ? 0 : 1;
        if ($db->where($where)->setField("works", $state) !== false) {
            $this->success("修改成功");
        } else {
            $this->error("修改失败");
        }
    }

    public function del() {
        $db = db("Article");
        $where['id'] = input('param.id') ?: $this->error("id不能为空");
        if ($db->where($where)->delete()) {
            $this->success("删除成功");
        } else {
            $this->error("删除失败");
        }
    }

}
