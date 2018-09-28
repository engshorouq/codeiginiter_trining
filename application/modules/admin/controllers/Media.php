<?php
/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 12:12 م
 */
class Media extends  MY_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'MEDIA_PKG';
    }

    function index(){
    $this->load->view('display_media');


    }
    function count_media(){

        $this->Admin_model->procedure = 'COUNT_MEDIA';
        $rs = $this->Admin_model->get_media();
        //var_dump($rs);die;
        return $rs;
    }
    function display_main($id){

        $rs = Modules::run('admin/Categories/get_category_child/'.$id);
        var_dump($rs);die;
        $data['rows']=$rs;
        $this->load->view('add_media',$data);

    }
    function display(){
        $this->Admin_model->procedure = 'MEDIA_LIST';

        $rs = $this->Admin_model->getList('',0,100);
        $data['rows']=$rs;
        $this->load->view('display_media',$data);
    }


    function add_media($cat_id)
    {

        $this->Admin_model->procedure = 'MEDIA_INSERT';
        $this->load->helper('form');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $file_path = $this->upload_file();

            $params = array(
                array('name' => 'TITLE', 'value' => $this->p_title, 'type' => '', 'length' => -1),
                array('name' => 'DESCRIPTION', 'value' => $this->p_description, 'type' => '', 'length' => -1),
                array('name' => 'IMG', 'value' => $file_path, 'type' => '', 'length' => -1),
                array('name' => 'URL', 'value' => $this->p_url, 'type' => '', 'length' => -1),

                array('name' => 'CATEGORYID', 'value' => $cat_id, 'type' => '', 'length' => -1),
                array('name' => 'ISPUBLISHED', 'value' => $this->p_published, 'type' => '', 'length' => -1),
            );
            $result = $this->Admin_model->insert($params);

            redirect('admin/Media/add_media/'.$cat_id);
            echo "done " . $result.$file_path;
        } else {
            $data['id']=$cat_id;

            $this->load->view('create_media',$data);
        }

    }
    function display_id_cat($cat_id){
        $this->Admin_model->procedure='MEDIA_GET_CAT';
        $rs=$this->Admin_model->get($cat_id);

        return $rs;
    }

    function display_id($id = 0,$id_parent=0)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $file_path = $this->upload_file();

            $params = array(
                array('name' => 'ID', 'value' => $this->p_id, 'type' => '', 'length' => -1),
                array('name' => 'TITLE', 'value' => $this->p_title, 'type' => '', 'length' => -1),
                array('name' => 'DESCRIPTION', 'value' => $this->p_body, 'type' => '', 'length' => -1),
                array('name' => 'IMG', 'value' => $file_path, 'type' => '', 'length' => -1),
                array('name' => 'URL', 'value' => $this->p_url, 'type' => '', 'length' => -1),
                array('name' => 'CATEGORYID', 'value' => $id_parent, 'type' => '', 'length' => -1),
                array('name' => 'ISPUBLISHED', 'value' => $this->p_published, 'type' => '', 'length' => -1),

            );

            $result = $this->_update_media($params);
           // var_dump($result);die;
            redirect('admin/Categories/get_category_child/'.$id_parent);
        }
        else{

            $this->load->helper('form');
            $this->Admin_model->procedure = 'MEDIA_GET';

            $rs = $this->Admin_model->get($id);


            $data['rows'] = $rs;

            $data['id']=$id;
            $data['parent_id']=$id_parent;



            $this->load->view('update_media',$data);
        }
        //$this->load->view('display_posts');
    }
    function _update_media($data)
    {

        $this->Admin_model->procedure = 'MEDIA_UPDATE';
        //$this->load->helper('form');
        $result = $this->Admin_model->update($data);
        return $result;

    }

    function delete_post()
    {
        $this->Admin_model->procedure = 'MEDIA_DELETE';

        $rs = $this->Admin_model->delete($this->p_media_id);

    }

    function _private_f(){
        echo 'should be private ';
    }
}