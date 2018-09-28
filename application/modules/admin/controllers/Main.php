<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 12:14 م
 */
class Main extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = '';
    }

  function index(){

      $this->load->view('index');
  }
    function header_username(){
        $username=$this->user->fullname;
        return $username;
    }




    function _private_f(){
        echo 'should be private ';
    }
}
