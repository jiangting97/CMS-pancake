<?php
/**
 * Created by PhpStorm.
 * User: jiangting
 * Date: 16/5/27
 * Time: 下午10:26
 */

namespace Admin\Controller;


use Think\Controller;

class LoginController extends Controller{
    public function index(){
        if(session("user")) {
            redirect(U('Index/index'));
        }
        $this->display();
   }
    
    
    public function loginVolidate(){
        $username = I("username");
        $password = I("password");
//        dump($username);
//        dump($password);
        if(!trim($username)) {
            dump("用户名不能为空");
            die();
        }
        if(!trim($password)) {
            dump('密码不能为空');
            die();
        }
        $ret = M("admin")->where("username='$username' and password='$password'")->find();
        if( $ret ){
//            dump($ret);
//            dump($ret['username']);
            session("user", $ret);
            $this->success("登陆成功!",U('Index/index'));
        }
    }
    public function logout() {
        session("user",null);
        $this->success("注销成功", U('Login/index'));
    }

}