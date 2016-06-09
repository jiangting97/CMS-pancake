<?php
namespace Common\Model;
use Think\Model;

class AdinMOdel extends Model {

    private $_db = '';
    public function __construct() {
        $this->_db = M('admin');
    }

    public function getAdminByUsername($username) {
        $ret = $this->_db->where('username"'.$username.'"')->find();
        return $ret;
    }
}