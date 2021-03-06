<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;

class IndexController extends Controller
{
    private $limit = 7;
    public function index()
    {
        $type = M("type")->select();
        if( $type ){
            $this->assign("type", $type);
            $this->assign("defaultType", 0);
            $this->assign("defaultPage", 1);
        }
        $this->display(); // 输出模板
    }

    public function link(){
        $this->display();
    }

    public function read(){
        $id = I("id");

        $article = M("article")->where("id='$id'")->find();
        if ($article) {
            $article['content'] = html_entity_decode($article['content']);
            $ret['error_code'] = 0;
            $ret['article'] = $article;

        } else {
            $ret['error_code'] = 1;
            $ret['msg'] = "无此文章";
        }
        echo json_encode($ret);
    }

    public function getArticle(){
        $id = I("id");
        $callback = I("callback");
        $article = M("article")->where("id='$id'")->find();
        if ($article) {
            $article['content'] = html_entity_decode($article['content']);
            $ret['error_code'] = 0;
            $ret['article'] = $article;
        }else{
            $ret['error_code'] = 1;
            $ret['msg'] = "无此文章";
        }
        $res = json_encode($ret);
        echo $callback."($res)";

    }

    public function getType(){
        $type = json_encode(M("type")->select());
        $callback = I("callback");
        echo $callback."($type)";
    }

    public function showTab(){
        $limit = $this->limit;
        $callback = I("callback");
        $typeId = I("typd_id");
        $pageNum = I("page")-1;
        $start = $pageNum * $limit;
        $count  = M("article")->where("type='$typeId'")->count();// 查询满足要求的总记录数
        if($typeId != 0) {
            $count  = M("article")->where("type='$typeId'")->count();// 查询满足要求的总记录数
            $list = M("article")->where("type='$typeId'")->order('id desc')->limit("$start, $limit")->select();
        }  else {
            $count  = M("article")->count();// 查询满足要求的总记录数
            $list = M("article")->order('id desc')->limit("$start, $limit")->select();
        }
        $res['list'] = $list;
        $res['curPage'] = $pageNum;
        $res['typeId'] = $typeId;
        $res['totalPage'] = ceil(floatval($count) / floatval($this->limit));
        $res['count'] = $count;

        $ret = json_encode($res);

        echo $callback."($ret)";
    }

}