<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 12:15 م
 */
class Users extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'USERS_PKG';
    }

    function index(){
        $rs=$this->display();
        $data['rows']=$rs;
        $this->load->view('display_users',$data);
    }
    function display(){
        $this->Admin_model->procedure = 'USERS_LIST';

        $rs = $this->Admin_model->getList('',0,100);

        return $rs;
    }


    function delete_all(){
        $this->Admin_model->procedure = 'USERS_DELETE';

            for ($i = 0; $i < count($this->p_delete); $i++) {
                $this->Admin_model->delete($this->p_delete[$i]);
            }

    }


    function count_users(){
        $this->Admin_model->package='USERS_PKG';
        $this->Admin_model->procedure = 'COUNT_USERS';
        $rs = $this->Admin_model->get_media();
        return $rs;
    }

    /*-----------------  for display in group_users ------------------------------------*/


    function display_users_group(){
        $this->Admin_model->procedure = 'USERS_LIST';
        $rs=$this->Admin_model->getList('',0,100);
        return $rs;

    }
    /*------------------------------------- end of functions display group_users---------------------------------------------*/

    function display_id_current_user(){
        $this->Admin_model->package='USERS_PKG';

        $this->Admin_model->procedure = 'USERS_GET';
        $rs = $this->Admin_model->get($this->user->id);
        return $rs;

    }
    function update_personal_info(){

        $this->load->helper('form');
        $this->Admin_model->procedure = 'USERS_UPDATE_PERSONAL';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = array(
                array('name' => 'ID', 'value' => $this->p_id, 'type' => '', 'length' => -1),
                array('name' => 'FULLNAME', 'value' => $this->p_fullName, 'type' => '', 'length' => -1),
                array('name' => 'PASSWORD', 'value' => $this->p_password, 'type' => '', 'length' => -1),
            );
            $result = $this->Admin_model->update($params);
            echo $result;
            redirect('admin/Main/');
        }
        else{
            $this->load->view('update_personal_profile');
        }
    }

    /*function user_sys_menus(){
        $user_id=$this->user->id;

        $this->Admin_model->procedure='GET_USER_GROUP';
        $rs=$this->Admin_model->get_user_sys_menus($user_id);

        return $rs;
    }*/
    function _get_structure($id)
    {
        $user_id=$this->user->id;
        //$this->Admin_model->procedure('TREE_GET');\\\\\\\
        $this->Admin_model->procedure = 'GET_USER_GROUP';
        $rs = $this->Admin_model->get_user_sys_menus($user_id,$id);
        $i = 0;
        foreach ($rs as $row) {
            $rs[$i]['subs'] = $this->_get_structure($row['ID']);
            $i++;
        }
        return $rs;
    }
    function user_sys_menus()
    {

        $this->load->helper('generate_list');

        $options = array(
            'template_head' => '<ol class="sub-menu">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<li id="header_item"><a href="/site/{URL}"><i class="{ICON}"></i><span class="title">{MENU}</span> <span id="header_select"></span><span class="{RESULT_ROW}"></span></a> {SUBS} </li>';
        $resource = $this->_get_structure(0);


        $tree = '' . generate_list($resource, $options, $template) . '';

        return $tree;
    }



    function display_id($id = 0)
    {
        $this->load->helper('form');
        $this->Admin_model->procedure = 'USERS_GET';

        $rs = $this->Admin_model->get($id);


        $data['rows'] = $rs;
        $data['id'] = $id;
        $this->load->view('update_USER',$data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = array(
                array('name' => 'ID', 'value' => $this->p_id, 'type' => '', 'length' => -1),
                array('name' => 'FULLNAME', 'value' => $this->p_fullName, 'type' => '', 'length' => -1),
                array('name' => 'PASSWORD', 'value' => $this->p_password, 'type' => '', 'length' => -1),
                array('name' => 'ISACTIVE', 'value' => $this->p_active, 'type' => '', 'length' => -1),
            );
            $result = $this->_update_user($params);
            echo $result;
            redirect('admin/Users/index');
        }

    }

    function _update_user($data){
        $this->Admin_model->procedure = 'USERS_UPDATE';
        //$this->load->helper('form');
        $result = $this->Admin_model->update($data);
        return $result;

    }

    function delete_user(){
        $this->Admin_model->procedure = 'USERS_DELETE';

        $rs = $this->Admin_model->delete($this->p_user_id_delete);
        //redirect('admin/Users/index');
    }

    function add_user(){
        $this->Admin_model->procedure = 'USERS_INSERT';
        $this->load->helper('form');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->p_password != $this->p_conf_password){
                //$data['error']="كلمة السر و تاكيد كلمة السر غير متطابقتين";
                redirect('admin/Users/add_user');
            }
            else{
                $params = array(
                    array('name' => 'FULLNAME', 'value' => $this->p_fullName, 'type' => '', 'length' => -1),
                    array('name' => 'USERNAME', 'value' => $this->p_username, 'type' => '', 'length' => -1),
                    array('name' => 'PASSWORD', 'value' => $this->p_password, 'type' => '', 'length' => -1),
                    array('name' => 'ISACTIVE', 'value' => $this->p_active, 'type' => '', 'length' => -1),
                );
                $result = $this->Admin_model->insert($params);
                //$data['result']=$result;
                redirect('admin/Users/add_user');
                //echo "done " . $result;
            }
        }else {

            $this->load->view('add_users');
        }

    }
    function search(){
        $sql = '';
        $this->Admin_model->procedure = 'USERS_LIST';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->p_name!=null || $this->p_active!=null){

                $sql .= isset($this->p_name) && $this->p_name != null ? " AND FULLNAME LIKE '%{$this->p_name}%' ":'';


                $sql .= isset($this->p_active) && $this->p_active != null ? " AND ISACTIVE LIKE '%{$this->p_active}%' ":'';

                $rs = $this->Admin_model->getList($sql, 0, 100);
                $data['rows']=$rs;
                $this->load->view('display_users',$data);


}
        } else {
            $this->load->view('display_users');
        }
    }

    function _private_f(){
        echo 'should be private ';
    }
}