<?php
/**
 * Created by PhpStorm.
 * User: jiangting
 * Date: 16/6/10
 * Time: 下午9:58
 */

namespace Admin\Controller;


use Org\Util\Date;

class BlogController extends CommonController{
    public function addBlog()
    {
        $type = M("type")->select();
        $this->assign('type',$type);
        $this->display();
    }

    public function saveBlog() {
        $blog['title'] = I("title");
        $blog['type'] = I('type');
        $blog['addtime'] = date("Y-m-d");
        $blog['content'] = I("content");
        dump($blog);
        M('article')->add($blog);
    }
    public function delBlog()
    {
        $id = I("id");
        if (M("article")->where("id='$id'")->delete()) {
            $ret['error_code'] = 0;
        } else {
            $ret['error_code'] = 1;
        }
        echo json_encode($ret);
    }

    public function editBlog() {
        $id = I("id");
        $article = M("article")->where("id='$id'")->find();
        $article['content'] = html_entity_decode($article['content']);
        $this->assign('article', $article);
        $type = M("type")->select();
        $this->assign('type',$type);
        $this->display();

    }

}