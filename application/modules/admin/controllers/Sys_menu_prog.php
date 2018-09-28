<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 24/07/16
 * Time: 12:59 ص
 */
class Sys_menu_prog extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'SYS_MENUS_PROG_PKG';
    }
    function _get_structure($id)
    {
        //$this->Admin_model->procedure('TREE_GET');\\\\\\\
        $this->Admin_model->procedure = 'TREE_GET';
        $rs = $this->Admin_model->get($id);
        $i = 0;
        foreach ($rs as $row) {
            $rs[$i]['subs'] = $this->_get_structure($row['ID']);
            $i++;
        }
        return $rs;
    }
    function _get_structure_group($id,$group_id)
    {
        $this->Admin_model->package='SYS_MENUS_PROG_PKG';
        //$this->Admin_model->procedure('TREE_GET');\\\\\\\
        $this->Admin_model->procedure = 'TREE_GET_GROUP';
        $rs = $this->Admin_model->get_group($id,$group_id);
        $i = 0;
        foreach ($rs as $row) {
            $rs[$i]['subs'] = $this->_get_structure_group($row['ID'],$group_id);
            $i++;
        }
        return $rs;
    }

    function index()
    {

        $this->load->helper('generate_list');

        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<li class="dd-item"  data-id="{ID}"><div class="dd-handle" ondblclick="javascript:getmenu({ID});" data-text="{TYPEMENU}" data-order="{ISPUBLISHED}" data-class="{URL}" data-displayInput="{MENU}"><span>{MENU}</span></div> {SUBS} </li>';
        $resource = $this->_get_structure(0);


        $data['tree'] = '<ol class="dd-list" id="menu-root" >' . generate_list($resource, $options, $template) . '</ol>';

        $this->load->view('sys_menu_prog', $data);
    }


    function display()
    {
        $this->Admin_model->package='SYS_MENUS_PROG_PKG';
        //$this->Admin_model->procedure = 'SYS_MENUS_LIST';
        $this->load->helper('generate_list');
        $group_id = $this->p_group_id;
        //$rs = $this->Admin_model->getList('', 0, 100);
        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );

        $template = '<li class="dd-item"  data-id="{ID}"><input type="checkbox" class="checks" {IS_CHECK} name="menu[]" value="{ID}">&nbsp; &nbsp;<label for="category" class="control-label">{MENU}</label>{SUBS}</li>';
        $resource = $this->_get_structure_group(0,$group_id);
        $tree = '<ol class="dd-list" >' . generate_list($resource, $options, $template) . '</ol>';
            //var_dump( $tree);die;
        echo $tree;

    }


    function add_menus(){

        $this->Admin_model->procedure = 'SYS_MENUS_INSERT';
        $this->load->helper('form');


        $params = array(
            array('name' => 'NAME', 'value' => $this->p_name, 'type' => '', 'length' => -1),
            array('name' => 'URL', 'value' => $this->p_url, 'type' => '', 'length' => -1),
            array('name' => 'PARENTID', 'value' => $this->p_parentID, 'type' => '', 'length' => -1),
        );
        $result = $this->Admin_model->insert($params);


        if (intval($result) <= 0)
            $this->print_error('فشل في حفظ البيانات');
        echo $result;

    }

    function delete_menu(){
        $this->Admin_model->procedure = 'MENUS_DELETE';
        $id = $this->p_menu_id_delete;

        $rs = $this->Admin_model->delete($id);
    }

    function edit_menu(){


        //$this->Admin_model->procedure = 'GET_MENU';
        //$this->Admin_model->get($id);
        //$this->load->view('edit_menu');
        //$this->load->helper('form');

        $this->Admin_model->procedure='SYS_MENUS_UPDATE';
        $params = array(
            array('name' => 'ID', 'value' => $this->p_parentID, 'type' => '', 'length' => -1),
            array('name' => 'MENU', 'value' => $this->p_name, 'type' => '', 'length' => -1),
            array('name' => 'URL', 'value' => $this->p_url, 'type' => '', 'length' => -1),
        );
        $result = $this->Admin_model->update($params);
        //redirect('admin/Sys_Menus/index');


    }

}
