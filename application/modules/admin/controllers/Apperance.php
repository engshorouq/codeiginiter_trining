<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 07/08/16
 * Time: 10:46 ص
 */
class Apperance extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'APPERANCE_PKG';
    }

    function index(){
        $this->Admin_model->procedure = 'APPERANCE_DElETE';
        $this->load->helper('form');


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->Admin_model->delete_all();
            for($i=0;$i<count($this->p_name_app);$i++) {
               $name= $this->p_name_app[$i];
                $type=$this->p_type[$i];
               $id= $this->p_source_id[$i];
                $params = array(
                    array('name' => 'NAME', 'value' => $name, 'type' => '', 'length' => -1),
                    array('name' => 'TYPE', 'value' => $type, 'type' => '', 'length' => -1),
                    array('name' => 'SOURCE_ID', 'value' => $id, 'type' => '', 'length' => -1),
                );


                $this->add_apperance($params);
            }

            redirect('admin/Apperance/display');

        } else {

            $this->load->view('apperance');
        }

    }
    function add_apperance($params){
        $this->Admin_model->procedure = 'APPERANCE_INSERT';

        $this->load->helper('form');
        $result = $this->Admin_model->insert($params);


    }
    function display(){
        $this->Admin_model->procedure='APPERANCE_LIST';
        $this->load->helper('form');
        $rs=$this->Admin_model->getList('',0,100);
        $data['rows']=$rs;
        $this->load->view('apperance',$data);
    }
    function display_apperance(){
        $this->Admin_model->package='APPERANCE_PKG';
        $this->Admin_model->procedure='APPERANCE_LIST';
        $this->load->helper('form');
        $rs=$this->Admin_model->getList('',0,100);
        return $rs;
    }
}