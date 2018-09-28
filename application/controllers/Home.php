<?php

/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 07/08/16
 * Time: 09:54 ص
 */
class Home extends MY_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = '';
    }

    function index()
    {
        $this->load->view('home');
    }

    function _get_structure($id)
    {
        $this->Admin_model->package = 'SYS_MENUS_PKG';
        $this->Admin_model->procedure = 'TREE_GET_PUBLISHED';
        $rs = $this->Admin_model->get($id);

        $i = 0;
        foreach ($rs as $row) {
            $rs[$i]['fullurl'] = $this->_generate_url($row['TYPEMENU'], $row['URL']);
            echo $rs[$i]['fullurl'];
            $rs[$i]['subs'] = $this->_get_structure($row['ID']);
            $i++;
        }

        return $rs;
    }


    function _generate_url($type, $url)
    {

        switch ($type) {
            case 1:
                return base_url('posts/details/' . $url);
            case 2:
                return base_url('Posts/display_all_post/' . $url);

            case 3:
                break;
            case 4:
                return $url . ':;';
            case 5:
                return 'http://' . $url;
            case 6:
                return $url . ':;';
            case 7:
                return $url . ':;';

        }
    }

    function display_sys_menu()
    {
        $this->Admin_model->package = 'SYS_MENUS_PKG';
        $this->load->helper('generate_list_helper');

        $options = array(
            'template_head' => '<ul>',
            'template_foot' => '</ul>',
            'use_top_wrapper' => false,
        );
        $template = '<li ><a href="{FULLURL}">{MENU}</a> {SUBS} </li>';
        $resource = $this->_get_structure(0);


        $tree = '' . generate_list($resource, $options, $template) . '';
        return $tree;
    }
}

