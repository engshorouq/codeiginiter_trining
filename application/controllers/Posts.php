<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 09/08/16
 * Time: 09:19 ص
 */
class Posts extends MY_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
    }
    /* for display spasefic category*/
    function category($id,$view,$class=null){
    $this->Admin_model->package='CATEGORIES_PKG';
        $this->Admin_model->procedure='CATEGORIES_GET';
        $rs=$this->Admin_model->get($id);
        $data['rows']=$rs;
        $this->load->view($view,$data);
    }

    /*for get postid from tbl_posts_categories*/
    function display_posts_cat($id_cat){
        $this->Admin_model->package='POSTS_CATEGORIES_PKG';
        $this->Admin_model->procedure='ALL_POSTS_BY_CAT';
        $rs=$this->Admin_model->get($id_cat);
        return $rs;
    }
    /*for display all posts */
    function display_post($id_cat){
        $this->Admin_model->package='POSTS_PKG';
        $this->Admin_model->procedure='POSTS_GET_ORDER';
        $rs=$this->Admin_model->get_post_order($id_cat);
        return $rs;
    }

    function display_tab(){
        $this->Admin_model->package='POSTS_PKG';
        $this->Admin_model->procedure='POSTS_GET_ORDER';
        $cat_id=$this->p_cat_id;

        $rs=$this->Admin_model->get_post_order($cat_id);
        $data['rows']=$rs;
        $this->load->view('box_tab',$data);
    }

    function display_all_post($id_cat){
        $this->Admin_model->package='POSTS_PKG';
        $this->Admin_model->procedure='POSTS_GET_ORDER';
        $rs=$this->Admin_model->get_post_order($id_cat);
        $data['rows']=$rs;
        $this->load->view('display_post_cat',$data);
    }


    function details($id){
        $this->Admin_model->package='POSTS_PKG';
        $this->Admin_model->procedure='POSTS_GET';
        $rs=$this->Admin_model->get($id);
        $data['rows']=$rs;
        $this->load->view('post',$data);
    }

}