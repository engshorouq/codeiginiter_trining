<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 24/07/16
 * Time: 09:14 م
 */
class Group_Users extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'USERS_GROUPS_PKG';
    }

    function index(){
        $rs=Modules::run('admin/Groups/display');
        $data['rows']=$rs;

        $this->load->view('group_users_main',$data);
    }
    function get_id($id_user){
        $this->Admin_model->procedure='GET_GROUP_ID';
        $rs=$this->Admin_model->get($id_user);
        return $rs;
    }

    function delete_group_user(){
        $this->Admin_model->procedure='GROUPS_USERS_DELETE';
        $rs=$this->Admin_model->delete($this->p_user);

        var_dump($this->p_user);


        var_dump(count($this->p_group));

        var_dump($this->p_user);
        //die;
        for($i=0;$i<count($this->p_group);$i++){
            $this->add_group_user($this->p_user,$this->p_group[$i]);
        }
        redirect('admin/Group_Users/');

    }

    function add_group_user($user_id,$group_id){
        $this->Admin_model->procedure='USERS_GROUPS_INSERT';

        $params = array(

            array('name' => 'USERID', 'value' => $user_id, 'type' => '', 'length' => -1),
            array('name' => 'GROUPID', 'value' => $group_id, 'type' => '', 'length' => -1),
        );
        $result = $this->Admin_model->insert($params);
    }
}