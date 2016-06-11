<?php
/**
 * Created by PhpStorm.
 * User: jiangting
 * Date: 16/6/1
 * Time: 下午7:51
 */

namespace Admin\Controller;

use Think\Page;

class NewsController extends CommonController
{
    public function addBlogs()
    {
        $type = M("type")->select();
        $this->assign('type',$type);
//        dump(type)
        $this->display();
    }

    public function addNewsHandler()
    {

        $newstitle = I("newstitle");
        $newscontent = I("newscontent");
        $addtime = I("addtime");

        //TODO 做校验

        $news['newstitle'] = $newstitle;
        $news['newscontent'] = $newscontent;
        $news['addtime'] = $addtime;

        if (M("news")->add($news)) {
            $json['error_code'] = 0;
        } else {
            $json['error_code'] = 1;
        }
        echo json_encode($json);
    }


    public function modifyNews()
    {

        $newsid = I("newsid");
        dump($newsid);
        $news = M("news")->where("newsid='$newsid'")->find();

        $this->assign('news', $news);

        $this->display();


    }

    public function modifyNewsHandler()
    {

        $newsid = I("newsid");
        $newstitle = I("newstitle");
        $newscontent = I("newscontent");
        $addtime = I("addtime");

        //TODO 做校验
        $news['newsid'] = $newsid;
        $news['newstitle'] = $newstitle;
        $news['newscontent'] = $newscontent;
        $news['addtime'] = $addtime;


        if (M("news")->save($news)) {
            $json['error_code'] = 0;
        }
        echo json_encode($json);


    }

    public function delNews()
    {
        $newsid = I("newsid");
        if (M("news")->where("newsid='$newsid'")->delete()) {
            $ret['error_code'] = 0;
        } else {
            $ret['error_code'] = 1;
        }

        echo json_encode($ret);
    }

    public function searchTypeNews()
    {
        $type = I("type");

        $news = M("news"); // 实例化User对象
        if ($type == '') {
            $count = $news->count();// 查询满足要求的总记录数
        } else {
            $count = $news->where('type=' . $type)->count();// 查询满足要求的总记录数
        }

        $Page = new Page($count, 2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $news->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $list = $news->limit($Page->firstRow . ',' . $Page->listRows)->select();


        $this->assign('newsList', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display('index/index'); // 输出模板


    }


    public function orderNews(){
        $postData = I("postData");
        $errors = array();
        if ($postData) {
            foreach ($postData as $newsid => $order) {
                $pat = '/^[0-9]*$/';
                if (!preg_match($pat, $order)) {
                    throw_exception('id 不合法');
                }
                $data['newsid'] = $newsid;
                $data['listorder'] = intval($order);

                $ret = M("news")->save($data);


                if ($ret == false) {

                    $aa = M("news")->field("listorder")->where("newsid='$newsid'")->find();
                    if ($aa['listorder'] != $data) {
                        $errors[] = $newsid;
                    }

                }
            }
        }
        if (!$errors) {
            $ret['error_code'] = 0;

        } else {
            $ret['error_code'] = 1;
        }
        echo json_encode($ret);
    }
}
