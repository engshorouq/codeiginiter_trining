<?php

/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 12:04 م
 */
class Categories extends MY_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'CATEGORIES_PKG';
    }

    function _get_structure_page($id, $id_source, $dsh = ' ')
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';

        $this->Admin_model->procedure = 'TREE_GET';
        $rs = $this->Admin_model->get_posts_tree($id, $id_source);
        $i = 0;
        foreach ($rs as $row) {
            $rs[$i]['NAME'] = $dsh . $rs[$i]['NAME'];
            $rs[$i]['subs'] = $this->_get_structure_page($row['ID'], $id_source, $dsh . '- ');
            $i++;
        }
        return $rs;
    }

    function _get_structure($id)
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'TREE_GET';
        $rs = $this->Admin_model->get_posts_tree($id, '');
        $i = 0;
        foreach ($rs as $row) {

            $rs[$i]['subs'] = $this->_get_structure($row['ID']);
            $i++;
        }
        return $rs;
    }

    function _get_structure_media($id)
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'TREE_GET_MEDIA';
        $rs = $this->Admin_model->get($id);
        $i = 0;
        foreach ($rs as $row) {
            $rs[$i]['subs'] = $this->_get_structure_media($row['ID']);
            $i++;
        }
        return $rs;
    }


    function _get_structure_media_sys_menu($PARENTID, $id, $dsh = ' ')
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'TREE_GET_MEDIA';
        $rs = $this->Admin_model->get_media_tree($PARENTID, $id);
        echo $rs;

        $i = 0;
        foreach ($rs as $row) {
            $rs[$i]['NAME'] = $dsh . $rs[$i]['NAME'];
            $rs[$i]['subs'] = $this->_get_structure_media_sys_menu($row['ID'], $id, $dsh . '- ');
            $i++;
        }
        return $rs;
    }

    function _get_structure_media_sys_menu_($PARENTID, $dsh = ' ')
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'TREE_GET_MEDIA';
        $rs = $this->Admin_model->get($PARENTID);
        echo $rs;

        $i = 0;
        foreach ($rs as $row) {
            $rs[$i]['NAME'] = $dsh . $rs[$i]['NAME'];
            $rs[$i]['subs'] = $this->_get_structure_media_sys_menu_($row['ID'], $dsh . '- ');
            $i++;
        }
        return $rs;
    }


    function index()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->load->helper('generate_list');
        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<li class="dd-item"  data-id="{ID}"><div class="dd-handle" ondblclick="javascript:getCategory({ID});" data-displayInput="{NAME}"><span>{NAME}</span></div> {SUBS} </li>';
        $resource = $this->_get_structure(0);


        $data['tree'] = '<ol class="dd-list" id="category-root" >' . generate_list($resource, $options, $template) . '</ol>';

        $this->load->view('display_categories', $data);
    }

    function display_sys_menu($id)
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->load->helper('generate_list');
        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<option value="{ID}" {IS_SELECT}><li class="dd-item"  data-id="{ID}"><label for="category" class="control-label">{NAME}</label>{SUBS}</li></option>';
        $resource = $this->_get_structure_page(0, $id);
        $tree = '<ol class="dd-list" >' . generate_list($resource, $options, $template) . '</ol>';


        return $tree;

    }
    function display_sys_menu_cat()
    {
        $user_id=$this->p_cat_id;
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->load->helper('generate_list');
        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<option value="{ID}" {IS_SELECT}><li class="dd-item"  data-id="{ID}"><label for="category" class="control-label">{NAME}</label>{SUBS}</li></option>';
        $resource = $this->_get_structure_page(0, $user_id);
        $tree = '' . generate_list($resource, $options, $template) . '';
        $data['tree']=$tree;
        echo $tree;

    }


    function display_sys_menu_media_up($id)
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';

        $this->load->helper('generate_list');
        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<option value="{ID}" {IS_SELECTED}><li class="dd-item"  data-id="{ID}"><label for="category" class="control-label">{NAME}</label>{SUBS}</li></option>';
        $resource = $this->_get_structure_media_sys_menu(0, $id);
        $tree = '<ol class="dd-list" >' . generate_list($resource, $options, $template) . '</ol>';


        return $tree;

    }

    function display_sys_menu_media()
    {

        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->load->helper('generate_list');
        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<option value="{ID}"><li class="dd-item"  data-id="{ID}"><label for="category" class="control-label">{NAME}</label>{SUBS}</li></option>';
        $resource = $this->_get_structure_media_sys_menu(0, '');
        $tree = '<ol class="dd-list" >' . generate_list($resource, $options, $template) . '</ol>';


        return $tree;

    }


    function display_cat_media()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->load->helper('generate_list');
        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<li class="dd-item"  data-id="{ID}"><input type="radio" class="checks" name="media" value="{ID}">&nbsp; &nbsp;<label for="category" class="control-label">{NAME}</label>{SUBS}</li>';
        $resource = $this->_get_structure_media(0);
        $tree = '<ol class="dd-list" >' . generate_list($resource, $options, $template) . '</ol>';


        return $tree;
    }

    function display()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'CATEGORIES_LIST';
        $this->load->helper('generate_list');

        $rs = $this->Admin_model->getList('', 0, 100);
        $options = array(
            'template_head' => '<ol class="dd-list">',
            'template_foot' => '</ol>',
            'use_top_wrapper' => false,
        );
        $template = '<li class="dd-item"  data-id="{ID}"><input type="checkbox" class="checks" name="category[]" value="{ID}">&nbsp; &nbsp;<label for="category" class="control-label">{NAME}</label>{SUBS}</li>';
        $resource = $this->_get_structure(0);
        $tree = '<ol class="dd-list" >' . generate_list($resource, $options, $template) . '</ol>';


        return $tree;
    }

    function count_categories()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';

        $this->Admin_model->procedure = 'COUNT_CATEGORIES';
        $rs = $this->Admin_model->get_media();
        //var_dump($rs);die;
        return $rs;
    }

    function display_media()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'GET_CATEGORIES_MEDIA';
        $rs = $this->Admin_model->get_media();
        return $rs;
    }

    function get_category_child($id)
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';

        $this->Admin_model->procedure = 'GTE_CATEGORIES_CHILD';
        $rs = $this->Admin_model->get($id);

        $data['rows'] = $rs;
        $data['id_post'] = $id;

        $this->load->view('add_media', $data);

    }

    function get_data($id)
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'CATEGORIES_GET';
        $result = $this->Admin_model->get($id);
        return $result;

    }


    function display_id($id = 0)
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->load->helper('form');
        $this->Admin_model->procedure = 'CATEGORIES_GET';

        $rs = $this->Admin_model->get($id);


        $data['rows'] = $rs;
        $data['id'] = $id;
        $this->load->view('update_category', $data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = array(
                array('name' => 'ID', 'value' => $this->p_id, 'type' => '', 'length' => -1),
                array('name' => 'NAME', 'value' => $this->p_name, 'type' => '', 'length' => -1),
                array('name' => 'TYPE', 'value' => $this->p_type, 'type' => '', 'length' => -1),
                array('name' => 'PARENTID', 'value' => '', 'type' => '', 'length' => -1),
            );
            $result = $this->_update_category($params);
            // $this->load->view('posts_index');
            redirect('admin/Categories/display');
        } else {
            $this->load->view('update_category');
        }
        $this->load->view('display_categories');
    }

    function edit_category()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'CATEGORIES_UPDATE';
        $this->load->helper('form');


        $params = array(
            array('name' => 'ID', 'value' => $this->p_cat_id, 'type' => '', 'length' => -1),
            array('name' => 'NAME', 'value' => $this->p_cat_name, 'type' => '', 'length' => -1),
            array('name' => 'TYPE', 'value' => $this->p_cat_type, 'type' => '', 'length' => -1),
        );
        $result = $this->Admin_model->update($params);


    }

    function _update_category($data)
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';

        $this->Admin_model->procedure = 'CATEGORIES_UPDATE';
        $result = $this->Admin_model->update($data);
        return $result;

    }

    function search()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $sql = '';
        $this->Admin_model->procedure = 'CATEGORIES_LIST';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->p_name != null) {

                $sql .= isset($this->p_name) && $this->p_name != null ? " AND NAME LIKE '%{$this->p_name}%' " : '';

                $rs = $this->Admin_model->getList($sql, 0, 100);
                $data['rows'] = $rs;

                $this->load->view('display_categories', $data);
            } else if ($this->p_title != null) {
                $sql .= isset($this->p_title) && $this->p_title != null ? " AND TYPE LIKE '%{$this->p_title}%' " : '';

                $rs = $this->Admin_model->getList($sql, 0, 100);
                $data['rows'] = $rs;
                $this->load->view('display_categories', $data);

            }

        } else {
            $this->load->view('display_categories');
        }
    }

    function delete_category()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';

        $this->Admin_model->procedure = 'CATEGORIES_DELETE';
        $id = $this->p_cat_id_delete;

        $rs = $this->Admin_model->delete($id);
    }

    function add_categories()
    {
        $this->Admin_model->package = 'CATEGORIES_PKG';
        $this->Admin_model->procedure = 'CATEGORIES_INSERT';
        $this->load->helper('form');


        $params = array(
            array('name' => 'NAME', 'value' => $this->p_name, 'type' => '', 'length' => -1),
            array('name' => 'TYPE', 'value' => $this->p_type, 'type' => '', 'length' => -1),
            array('name' => 'PARENTID', 'value' => $this->p_parentID, 'type' => '', 'length' => -1),
        );
        $result = $this->Admin_model->insert($params);


        if (intval($result) <= 0)
            $this->print_error('فشل في حفظ البيانات');
        echo $result;


    }

    function _private_f()
    {
        echo 'should be private ';
    }
}