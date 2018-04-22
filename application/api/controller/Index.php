<?php

namespace app\api\controller;

use think\Controller;

class Index extends Common {

    public function index() {

        $color = ['', 'success', 'info', 'warning', 'danger'];

        $info = [];
        foreach (db('info')->select() as $v) {
            if(in_array($v['name'], ['my_city','my_area','my_province','home_city','home_area','home_province'])){
                $info[$v['name']] = get_find("region", ['region_id' => $v['value']], 'region_name');
            } else {
                $info[$v['name']] = ($v['name'] != "head") ? $v['value'] : $this->host . $v['value'];
            }
        }
        $data['info'] = $info;


        $data['skills'] = db('skills')->where(['value' => ['gt', 0]])->select() ?: [];
        $work = db('work')->where('state', 1)->select() ?: [];
        for ($i = 0; $i < count($work); $i++) {
            $work[$i]['body'] = str_replace("\n","<br />",$work[$i]['body']);
        }
        $data['work'] = $work;

        $keys = db('keys')->order('a desc')->limit(30)->select() ?: [];
        for ($i = 0; $i < count($keys); $i++) {
            $keys[$i]['color'] = $color[rand(0, 4)];
        }
        $data['keys'] = $keys;

        $data['web'] = config('config');
        $data['flink'] = db('flink')->where('state', 1)->select() ?: [];
        $category[] = ['name' => "全部文章", "id" => 0, 'an' => true, 'list' => []];
        $categorys = db('category')->order("sort")->where('state', 1)->where('pid', 0)->select() ?: [];
        for ($i = 0; $i < count($categorys); $i++) {
            $category[$i + 1] = $categorys[$i];
            $category[$i + 1]['list'] = db("category")->order("sort")->where('state', 1)->where("pid", $categorys[$i]['id'])->select() ?: [];
        }
        $data['category'] = $category;

        $data['article_a'] = db("article")->limit(10)->order("a desc")->field("body",true)->select();
        $data['article_z'] =  db("article")->limit(10)->order("z desc")->field("body",true)->select();

        return json($data);
    }

}
