<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 12:14 م
 */
class Post_Categories extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'POSTS_CATEGORIES_PKG';
    }

    function index(){

        $this->Admin_model->procedure = 'POSTS_CATEGORIES_LIST';

        $rs = $this->Admin_model->getList('',0,100);

        print_r($rs);
    }
    function delete($id_post){
        $this->Admin_model->procedure='POSTS_CATEGORIES_DELETE';
        $rs=$this->Admin_model->delete($id_post);

    }
    function add($cat_id,$post_id){

        $this->Admin_model->procedure='POSTS_CATEGORIES_INSERT';
        $this->load->helper('form');
        $params=array(
            array('name' => 'POSTID', 'value' => $post_id, 'type' => '', 'length' => -1),
            array('name' => 'CATEGORYID', 'value' => $cat_id, 'type' => '', 'length' => -1)
        );
        $result = $this->Admin_model->insert($params);
    }


    function _private_f(){
        echo 'should be private ';
    }
}
