<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class IndexController extends CommonController {
    public function index(){
//        $newsList = M("news")->select();
//        $this->assign("newsList", $newsList);
//        $this->display();


        $news = M("news"); // 实例化User对象
        $count      = $news->count();// 查询满足要求的总记录数
        $Page       = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $news->limit($Page->firstRow.','.$Page->listRows)->order("listorder desc")->select();
        $this->assign('newsList',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板

    }

    public function getNews() {
        $ret = M("news")->where("")->find();
        
        
    }
}