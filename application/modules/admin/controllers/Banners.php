<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 23/07/16
 * Time: 12:55 م
 */
class Banners extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'BANNERS_PKG';
    }

    function index(){
        $this->Admin_model->package='BANNERS_PKG';
        $this->Admin_model->procedure='BANNERS_LIST';
        $rs=$this->Admin_model->getList('',0,100);
        $data['rows']=$rs;
        $this->load->view('banners_main',$data);
    }
    function display_all(){
        $this->Admin_model->package='BANNERS_PKG';
        $this->Admin_model->procedure='BANNERS_LIST';
        $rs=$this->Admin_model->getList('',0,100);
        return $rs;

    }

    function search(){
        $this->Admin_model->package='BANNERS_PKG';
        $sql = '';
        $this->Admin_model->procedure = 'BANNERS_LIST';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->p_title != null || $this->p_date != null ) {

                $sql .= isset($this->p_title) && $this->p_title != null ? " AND TITLE LIKE '%{$this->p_title}%' " : '';

                $sql .= isset($this->p_date) && $this->p_date != null ? " AND PUBLISHEDDATE LIKE '%{$this->p_date}%' " : '';

                $rs = $this->Admin_model->getList($sql, 0, 100);
                $data['rows'] = $rs;
                $this->load->view('banners_main', $data);

            } else{

                    redirect('admin/Banners/index');

            }
        }
    }

    function add_banner(){
        $this->Admin_model->package='BANNERS_PKG';
        $this->Admin_model->procedure = 'BANNERS_INSERT';
        $this->load->helper('form');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $params = array(
                array('name' => 'TITLE', 'value' => $this->p_title, 'type' => '', 'length' => -1),
                array('name' => 'BODY', 'value' => $this->p_body, 'type' => '', 'length' => -1),
                array('name' => 'ISPUBLISHED', 'value' => $this->p_published, 'type' => '', 'length' => -1),
                array('name' => 'PUBLISHEDDATE', 'value' => $this->p_date, 'type' => '', 'length' => -1),
                array('name' => 'DURATION', 'value' => $this->p_duration, 'type' => '', 'length' => -1),
                array('name' => 'USERID', 'value' => '', 'type' => '', 'length' => -1),


            );
            $result = $this->Admin_model->insert($params);
            redirect('admin/Banners/add_banner');

        } else {

            $this->load->view('add_banner');
        }

    }

    function display_id($id = 0)
    {
        $this->load->helper('form');
        $this->Admin_model->package='BANNERS_PKG';
        $this->Admin_model->procedure = 'BANNERS_GET';

        $rs = $this->Admin_model->get($id);
        $data['result'] = $rs;
        $data['id'] = $id;
        $this->load->view('update_banner', $data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $params = array(
                array('name' => 'ID', 'value' => $this->p_id, 'type' => '', 'length' => -1),
                array('name' => 'TITLE', 'value' => $this->p_title, 'type' => '', 'length' => -1),
                array('name' => 'BODY', 'value' => $this->p_body, 'type' => '', 'length' => -1),
                array('name' => 'ISPUBLISHED', 'value' => $this->p_published, 'type' => '', 'length' => -1),
                /*array('name' => 'PUBLISHEDDATE', 'value' => $this->p_date, 'type' => '', 'length' => -1),*/
                array('name' => 'DURATION', 'value' => $this->p_duration, 'type' => '', 'length' => -1),
            );
            $result = $this->_update_post($params);

            redirect('admin/Banners/index');
        }

    }
    function _update_post($data)
    {
        $this->Admin_model->package='BANNERS_PKG';

        $this->Admin_model->procedure = 'BANNERS_UPDATE';

        $result = $this->Admin_model->update($data);
        return $result;
    }
    function delete_banner()
    {
        $this->Admin_model->procedure = 'BANNERS_DELETE';

        echo $this->p_banner_id_delete;


        $rs = $this->Admin_model->delete($this->p_banner_id_delete);

    }
    function delete_all_banners(){
        $this->Admin_model->package='BANNERS_PKG';
        $this->Admin_model->procedure = 'BANNERS_DELETE';



            for ($i = 0; $i < count($this->p_delete); $i++) {
                $this->Admin_model->delete($this->p_delete[$i]);
            }
    }

}