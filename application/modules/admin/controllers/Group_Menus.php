<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 24/07/16
 * Time: 10:50 ص
 */
class Group_Menus extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'GROUPS_MENUS_PKG';
    }

    function index(){
        $rs=Modules::run('admin/Groups/');
        $data['rows']=$rs;
        $this->load->view('group_menus_main');
    }
    function delete_group_menu(){
        $this->Admin_model->procedure='GROUPS_MENUS_DELETE';
        $rs=$this->Admin_model->delete($this->p_group);
        var_dump($this->p_group);
        var_dump(count($this->p_menu));
        var_dump($this->Admin_model->package);
        //die;
        for($i=0;$i<count($this->p_menu);$i++){
            $this->add_group_menu($this->p_group,$this->p_menu[$i]);
        }
        redirect('admin/Group_Menus/');

    }

    function add_group_menu($group_id,$menu_id){
        $this->Admin_model->procedure='GROUPS_MENUS_INSERT';

        $params = array(
            array('name' => 'GROUPID', 'value' => $group_id, 'type' => '', 'length' => -1),
            array('name' => 'MENUID', 'value' => $menu_id, 'type' => '', 'length' => -1),
        );
        $result = $this->Admin_model->insert($params);
        var_dump($result);
    }
}