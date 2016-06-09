<?php
/**
 * Created by PhpStorm.
 * User: jiangting
 * Date: 16/5/30
 * Time: 下午8:11
 */

namespace Admin\Controller;


use Think\Controller;

class CommonController extends Controller{
    public function _initialize(){
        if(!session("user")) {
            redirect(U('Login/index'));
        }
    }
}