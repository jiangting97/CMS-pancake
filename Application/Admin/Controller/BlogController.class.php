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

}