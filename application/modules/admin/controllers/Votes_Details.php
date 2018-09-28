<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 23/07/16
 * Time: 12:55 م
 */
class Votes_Details extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'VOTES_DETAILS_PKG';
    }

    function index(){
        $this->Admin_model->procedure='VOTES_DETAILS_LIST';
        $rs=$this->Admin_model->getList('',0,100);
        $data['rows']=$rs;

    }

    function add_votes_details($votes_id,$answer){
        $this->Admin_model->procedure = 'VOTES_DETAILS_INSERT';
        $this->load->helper('form');

            $params = array(
                array('name' => 'VOTEID', 'value' => $votes_id, 'type' => '', 'length' => -1),
                array('name' => 'ANSWER', 'value' => $answer, 'type' => '', 'length' => -1),
            );
            $result = $this->Admin_model->insert($params);
    }
    function get_vote_details($id){
         $this->Admin_model->procedure = 'VOTES_DETAILS_GET';

        $rs = $this->Admin_model->get($id);
        return $rs;

    }



}