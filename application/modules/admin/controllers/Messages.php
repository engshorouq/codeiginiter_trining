<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 24/07/16
 * Time: 09:54 ص
 */
class Messages extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'MESSAGES_PKG';
    }

    function index(){
        $this->Admin_model->procedure='MESSAGES_LIST';
        $rs=$this->Admin_model->getList('',0,100);
        $data['rows']=$rs;
        $this->load->view('messages_main',$data);
    }
    function get_message($id){
        $this->Admin_model->procedure='GET_MESSAGE';
        $rs=$this->Admin_model->get($id);
        return $rs;

    }
    function display_messages(){
        $this->Admin_model->procedure='LIST_MESSAGE_HEADER';
        $rs=$this->Admin_model->get_media();
        return $rs;

    }

    function search(){
        $sql = '';
        $this->Admin_model->procedure = 'MESSAGES_LIST';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

var_dump($this->p_date_from);

                $sql .= isset($this->p_title) && $this->p_title != null ? " AND SUBJECT LIKE '%{$this->p_title}%' " : '';
                $sql .= isset($this->p_body) && $this->p_body != null ? " AND BODY LIKE '%{$this->p_body}%' " : '';
                $sql .= isset($this->p_email) && $this->p_email != null ? " AND EMAIL LIKE '%{$this->p_email}%' " : '';
            $sql .= isset($this->p_date_from) && $this->p_date_from != null ? " AND TRUNC(CREATEDATE) >=to_date( '{$this->p_date_from}','YYYY-MM-DD') " : '';
            $sql .= isset($this->p_date_to) && $this->p_date_to != null ? " AND CREATEDATE <=to_date( '{$this->p_date_to}','YYYY-MM-DD') " : '';
                $rs = $this->Admin_model->getList($sql, 0, 100);

                $data['rows'] = $rs;
                $this->load->view('messages_main', $data);


        }
    }
}