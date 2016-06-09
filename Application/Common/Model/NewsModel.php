<?php
/**
 * Created by PhpStorm.
 * User: jiangting
 * Date: 16/6/6
 * Time: 下午10:03
 */

namespace Common\Model;


use Think\Model;

class NewsModel extends Model
{
    private $_db= '';
    public function __construct()
    {
        $this->_db = M('news');
    }

    public function insert($data=array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
}