<?php

/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 23/07/16
 * Time: 12:42 م
 */
class Votes extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'VOTES_PKG';
    }

    function index()
    {
        $this->Admin_model->procedure = 'VOTES_LIST';
        $rs = $this->Admin_model->getList('', 0, 100);

        $data['rows'] = $rs;
        $this->load->view('votes_main', $data);
    }

   function display_all(){
       $this->Admin_model->procedure='VOTES_LIST';
       $rs = $this->Admin_model->getList('', 0, 100);
       return $rs;
   }
    function display_votes(){
        $this->Admin_model->package = 'VOTES_PKG';
        $this->Admin_model->procedure='VOTES_LIST_DATE';
        $rs = $this->Admin_model->get_post();
        return $rs;
    }

    function search()
    {
        $sql = '';
        $this->Admin_model->procedure = 'VOTES_LIST';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->p_question != null || $this->p_date != null) {

                $sql .= isset($this->p_question) && $this->p_question != null ? " AND QUESTION LIKE '%{$this->p_question}%' " : '';

                $sql .= isset($this->p_date) && $this->p_date != null ? " AND PUBLISHEDDATE LIKE '%{$this->p_date}%' " : '';

                $rs = $this->Admin_model->getList($sql, 0, 100);
                $data['rows'] = $rs;
                $this->load->view('votes_main', $data);

            } else {

                redirect('admin/Votes/index');

            }
        }

    }
    function delete_vote(){
        $this->Admin_model->procedure = 'VOTES_DELETE';

        //echo $this->p_banner_id_delete;


        $rs = $this->Admin_model->delete($this->p_vote_id_delete);
    }
    function delete_all_votes(){

        $this->Admin_model->procedure = 'VOTES_DELETE';


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            for ($i = 0; $i < count($this->p_delete); $i++) {
                $this->Admin_model->delete($this->p_delete[$i]);
            }
            redirect('admin/Votes/index');
        } else {
            redirect('admin/Votes/index');
        }
    }

    function add_vote()
    {

        $this->Admin_model->procedure = 'VOTES_INSERT';
        $this->load->helper('form');
        //echo $this->Admin_model->package;
        //echo "<br>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


           $params = array(
               array('name' => 'QUESTION', 'value' => $this->p_question, 'type' => '', 'length' => -1),
               array('name' => 'ISPUBLISHED', 'value' => $this->p_published, 'type' => '', 'length' => -1),
               array('name' => 'DURATION', 'value' => $this->p_duration, 'type' => '', 'length' => -1),
               array('name' => 'PUBLISHEDDATE', 'value' => $this->p_date, 'type' => '', 'length' => -1),
               array('name' => 'USERID', 'value' => $this->user->id, 'type' => '', 'length' => -1),


           );
           $result = $this->Admin_model->insert($params);



               for($i=0;$i<count($this->p_answer);$i++){
                   if($this->p_answer[$i]!=null)
               Modules::run('admin/Votes_Details/add_votes_details',$result,$this->p_answer[$i]);
               }


            redirect('admin/Votes/add_vote');

        } else {

            $this->load->view('add_votes');
        }


    }
    function display_vote_id($id){
        $this->Admin_model->package='VOTES_PKG';
        $this->Admin_model->procedure = 'VOTES_GET';

        $rs = $this->Admin_model->get($id);
        return $rs;
    }

    function display_id($id = 0)
    {
        $this->load->helper('form');
        $this->Admin_model->procedure = 'VOTES_GET';

        $rs = $this->Admin_model->get($id);
        $data['result'] = $rs;
        $data['id'] = $id;
        $this->load->view('update_vote', $data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $params = array(
                array('name' => 'ID', 'value' => $this->p_id, 'type' => '', 'length' => -1),

                array('name' => 'ISPUBLISHED', 'value' => $this->p_published, 'type' => '', 'length' => -1),

                array('name' => 'DURATION', 'value' => $this->p_duration, 'type' => '', 'length' => -1),

                array('name' => 'PUBLISHEDDATE', 'value' => $this->p_date, 'type' => '', 'length' => -1),
            );
            $result = $this->_update_post($params);
            redirect('admin/Votes/index');
        }

    }
    function _update_post($data)
    {

        $this->Admin_model->procedure = 'VOTES_UPDATE';
        $result = $this->Admin_model->update($data);
        return $result;
    }


    function update_published($published,$id){
        $this->Admin_model->procedure = 'VOTES_UPDATE_PUBLISHED';
        if($published == '0'){
            $published='1';
        }
        else{
            $published='0';
        }

        $params = array(
            array('name' => 'ID', 'value' => $id, 'type' => '', 'length' => -1),

            array('name' => 'ISPUBLISHED', 'value' => $published, 'type' => '', 'length' => -1),

        );
        $result = $this->Admin_model->update($params);
        redirect('admin/Votes/index');
    }

}