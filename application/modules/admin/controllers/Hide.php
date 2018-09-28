<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 27/07/16
 * Time: 11:19 ص
 */
class Hide extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'HIDE_PKG';
    }

    function index(){
       /* $rs=$this->display();
        $data['rows']=$rs;
        $this->load->view('display_users',$data);*/
    }
    function count_visitor(){
        $this->Admin_model->procedure = 'COUNT_HIDE';
        $rs = $this->Admin_model->get_media();
        //var_dump($rs);die;
        return $rs;
    }
    function site_char(){
        $this->Admin_model->procedure = 'COUNT_MONTH_YEAR';
        $rs = $this->Admin_model->get_media();
        //var_dump($rs);die;
        return $rs;
    }


}