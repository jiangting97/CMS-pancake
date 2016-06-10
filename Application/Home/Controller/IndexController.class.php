<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;

class IndexController extends Controller
{
    private $limit = 2;
    public function index()
    {
        $type = M("type")->select();
        if( $type ){
            $this->assign("type", $type);
            $this->assign("defaultType", $type[0]['id']);
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
            $this->assign("article", $article);
            $this->display();
        } else {
            $this->error("无此文章!");
        }
    }

    public function showTab(){
        $limit = $this->limit;
        $typeId = I("typd_id");
        $pageNum = I("page")-1;
        $start = $pageNum * $limit;
        $count  = M("article")->where("type='$typeId'")->count();// 查询满足要求的总记录数
//        $list = M("article")->where("type='$typeId'")->order('addtime desc')->page($pageNum." , ".$this->limit)->select();
        $list = M("article")->where("type='$typeId'")->order('id desc')->limit("$start, $limit")->select();
        $res['list'] = $list;
        $res['curPage'] = $pageNum;
        $res['typeId'] = $typeId;
        $res['totalPage'] = ceil(floatval($count) / floatval($this->limit));
        $res['count'] = $count;
        echo json_encode($res);
    }

}