<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: mkilani
 * Date: 07/09/14
 * Time: 09:08 ص
 */

class Login_model extends MY_Model{
    var $PKG_NAME= "USERS_PKG";
    var $TABLE_NAME= 'USER_CHECK';

    function get($user_id, $user_pwd){
        $cursor = $this->db->get_cursor();
        $params =array(
            array('name'=>':USERNAME','value'=>$user_id ,'type'=>'','length'=>-1),
            array('name'=>':PASSWORD','value'=>$user_pwd ,'type'=>'','length'=>-1),
            array('name'=>':REF_CUR_OUT','value'=>$cursor ,'type'=>OCI_B_CURSOR),
            array('name'=>':MSG_OUT','value'=>'MSG_OUT','type'=>SQLT_CHR,'length'=>-1)
        );
        $result = $this->conn->excuteProcedures($this->PKG_NAME, $this->TABLE_NAME, $params);
        return $result[$cursor];
    }

}
