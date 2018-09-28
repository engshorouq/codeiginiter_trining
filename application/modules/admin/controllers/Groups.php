<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 23/07/16
 * Time: 12:55 م
 */
class Groups extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'GROUPS_PKG';
    }

    function index(){
        $this->Admin_model->procedure='GROUPS_LIST';
        $rs=$this->Admin_model->getList('',0,100);
        $data['rows']=$rs;
        $this->load->view('group_main',$data);
    }
    function display(){
        $this->Admin_model->package = 'GROUPS_PKG';
        $this->Admin_model->procedure='GROUPS_LIST';
        $rs=$this->Admin_model->getList('',0,100);
        //var_dump($rs);
        //die;
        return $rs;
    }
    function display_user_menu(){
        $this->Admin_model->procedure='GROUPS_GET';
        $user_id=$this->p_user_id;
        $rs=$this->Admin_model->get_group_user($user_id);

        $data['rows']=$rs;

        $this->load->view('list_user',$data);

    }

    function search(){
        $sql = '';
        $this->Admin_model->procedure = 'GROUPS_LIST';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->p_name != null) {

                $sql .= isset($this->p_name) && $this->p_name != null ? " AND GROUPNAME LIKE '%{$this->p_name}%' " : '';


                $rs = $this->Admin_model->getList($sql, 0, 100);
                $data['rows'] = $rs;
                $this->load->view('group_main', $data);
            } else if ($this->p_name == null) {

                redirect('admin/Groups/index');

            }
        }
    }

    function add_group(){
        $this->Admin_model->procedure = 'GROUPS_INSERT';
        $this->load->helper('form');
        //echo $this->Admin_model->package;
        //echo "<br>";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $params = array(
                array('name' => 'GROUPNAME', 'value' => $this->p_name, 'type' => '', 'length' => -1),
            );
            $result = $this->Admin_model->insert($params);
            redirect('admin/Groups/add_group');

        } else {

            $this->load->view('add_group');
        }

    }

    function display_id($id = 0)
    {
        $this->load->helper('form');
        $this->Admin_model->procedure = 'GROUPS_GET';

        $rs = $this->Admin_model->get($id);
        $data['result'] = $rs;
        $data['id'] = $id;
        $this->load->view('update_group', $data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $params = array(
                array('name' => 'ID', 'value' => $this->p_id, 'type' => '', 'length' => -1),
                array('name' => 'GROUPNAME', 'value' => $this->p_title, 'type' => '', 'length' => -1),

            );
            $result = $this->_update_post($params);
            redirect('admin/Groups/index');
        }

    }
    function _update_post($data)
    {

        $this->Admin_model->procedure = 'GROUPS_UPDATE';
        $result = $this->Admin_model->update($data);
        return $result;
    }
    function delete_group()
    {
        $this->Admin_model->procedure = 'GROUPS_DELETE';

        echo $this->p_group_id_delete;


        $rs = $this->Admin_model->delete($this->p_group_id_delete);

        //redirect('admin/Posts/display_cat');
    }
    function delete_all_groups(){
        $this->Admin_model->procedure = 'GROUPS_DELETE';



            for ($i = 0; $i < count($this->p_delete); $i++) {
                $this->Admin_model->delete($this->p_delete[$i]);
            }


    }

}