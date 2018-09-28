<?php

/**
 * Created by PhpStorm.
 * User: abedalla
 * Date: 02/07/16
 * Time: 10:16 ص
 */
class Posts extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
        $this->Admin_model->package = 'POSTS_PKG';
    }

/*delete multi posts --ok*/
    function delete_all()
    {
        $this->Admin_model->package = 'POSTS_PKG';
        $this->Admin_model->procedure = 'POST_DELETE';


        /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {*/
            for ($i = 0; $i < count($this->p_delete); $i++) {
                $this->Admin_model->package = 'POSTS_PKG';
                $this->Admin_model->delete($this->p_delete[$i]);
                //Modules::run('admin/Post_Categories/delete', $this->p_delete[$i]);
            }

       /* } else {
            redirect('admin/Posts/display_cat');
        }
        redirect('admin/Posts/display_cat');*/
    }

    //for display all posts
    function display()
    {
        $this->Admin_model->procedure = 'POSTS_LIST';

        $rs = $this->Admin_model->getList('', 0, 100);

        /*$data['content']= 'posts_index';*/
        return $rs;

        //$this->load->view('display_posts', $data);
    }

/*the count of the posts in the website*/
    function count_posts()
    {
        $this->Admin_model->procedure = 'COUNT_POSTS';
        $rs = $this->Admin_model->get_media();
        return $rs;
    }

/*for display all posts that not classified --ok*/
    function display_pages()
    {
        $this->Admin_model->procedure = 'GET_POST_PAGES';
        $rs = $this->Admin_model->get_post();
        $data['rows'] = $rs;
        $this->load->view('display_posts', $data);
    }


    function display_pages_menu()
    {
        $this->Admin_model->procedure = 'GET_POST_PAGES';
        $rs = $this->Admin_model->get_post();
        return $rs;
    }


    /*function for display all posts that classified --ok*/
    function display_cat()
    {
        $this->Admin_model->procedure = 'GET_POST_CAT';

        $rs = $this->Admin_model->get_post();
        $data['rows'] = $rs;
        $this->load->view('display_posts_cat', $data);

    }


    /* for display the post details for update it*/
    function display_id($id = 0)
    {
        $this->Admin_model->package='POSTS_PKG';
        $this->load->helper('form');
        $this->Admin_model->procedure = 'POSTS_GET';

        $rs = $this->Admin_model->get($id);
        $data['result'] = $rs;
        $data['id'] = $id;
        $this->load->view('update_posts', $data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $file_path = $this->upload_file();
            $params = array(
                array('name' => 'ID', 'value' => $this->p_id, 'type' => '', 'length' => -1),
                array('name' => 'TITLE', 'value' => $this->p_title, 'type' => '', 'length' => -1),
                array('name' => 'BODY', 'value' => $this->p_body, 'type' => '', 'length' => -1),
                array('name' => 'IMG', 'value' => $file_path, 'type' => '', 'length' => -1),
                array('name' => 'MEDIAID', 'value' => $this->p_media, 'type' => '', 'length' => -1),
                array('name' => 'KEYWORDS', 'value' => $this->p_keyword, 'type' => '', 'length' => -1),
                array('name' => 'USERID', 'value' => $this->user->id, 'type' => '', 'length' => -1),
                array('name' => 'WRITER', 'value' => $this->p_writer, 'type' => '', 'length' => -1),
                array('name' => 'ISPUBLISHED', 'value' => $this->p_ispublished, 'type' => '', 'length' => -1),

            );
            $result = $this->_update_post($params);

         //var_dump($result);die;
            redirect('admin/Posts/display_cat');
        }
        //$this->load->view('display_posts');
    }
    function _update_post($data)
    {
        $this->Admin_model->package='POSTS_PKG';

        $this->Admin_model->procedure = 'POSTS_UPDATE';
        //$this->load->helper('form');
        $result = $this->Admin_model->update($data);
        return $result;

    }
/*the end of update--ok*/


    //for insert anew post
    /*function for add new post--ok*/
    function add_post()
    {

        $this->Admin_model->procedure = 'POSTS_INSERT';
        $this->load->helper('form');
        //echo $this->Admin_model->package;
        //echo "<br>";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $file_path = $this->upload_file();

            $params = array(
                array('name' => 'TITLE', 'value' => $this->p_title, 'type' => '', 'length' => -1),
                array('name' => 'BODY', 'value' => $this->p_body, 'type' => '', 'length' => -1),
                array('name' => 'IMG', 'value' => $file_path, 'type' => '', 'length' => -1),
                array('name' => 'MEDIAID', 'value' => $this->p_media, 'type' => '', 'length' => -1),
                array('name' => 'ISPUBLISHED', 'value' => $this->p_published, 'type' => '', 'length' => -1),
                array('name' => 'KEYWORDS', 'value' => $this->p_keyword, 'type' => '', 'length' => -1),
                array('name' => 'USERID', 'value' => $this->user->id, 'type' => '', 'length' => -1),
                array('name' => 'WRITER', 'value' => $this->p_writer, 'type' => '', 'length' => -1),
                array('name' => 'PUBLISHEDDATE', 'value' => $this->p_date, 'type' => '', 'length' => -1),
                array('name' => 'TYPE_CAT', 'value' => $this->p_type_cat, 'type' => '', 'length' => -1),


            );
            $result = $this->Admin_model->insert($params);
            if ($this->p_category != null) {
                for ($i = 0; $i < count($this->p_category); $i++) {
                    //var_dump($this->p_category[$i]);
                    echo "<br>";
                    Modules::run('admin/Post_Categories/add', $this->p_category[$i], $result);
                }
               // echo $result;

            }

            //var_dump($this->Admin_model->package);die;
            redirect('admin/Posts/add_post');

        } else {

            $this->load->view('add_post');
        }

    }


    /*for add post that not classified--ok*/
    function add_post_paging()
    {
        $this->Admin_model->procedure = 'POSTS_INSERT';
        $this->load->helper('form');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $file_path = $this->upload_file();

            $params = array(
                array('name' => 'TITLE', 'value' => $this->p_title, 'type' => '', 'length' => -1),
                array('name' => 'BODY', 'value' => $this->p_body, 'type' => '', 'length' => -1),
                array('name' => 'IMG', 'value' => $file_path, 'type' => '', 'length' => -1),
                array('name' => 'MEDIAID', 'value' => $this->p_media, 'type' => '', 'length' => -1),
                array('name' => 'ISPUBLISHED', 'value' => $this->p_published, 'type' => '', 'length' => -1),
                array('name' => 'KEYWORDS', 'value' => $this->p_keyword, 'type' => '', 'length' => -1),
                array('name' => 'USERID', 'value' => $this->user->id, 'type' => '', 'length' => -1),
                array('name' => 'WRITER', 'value' => $this->p_writer, 'type' => '', 'length' => -1),
                array('name' => 'PUBLISHEDDATE', 'value' => $this->p_date, 'type' => '', 'length' => -1),
                array('name' => 'TYPE_CAT', 'value' => $this->p_type_cat, 'type' => '', 'length' => -1),


            );
            $result = $this->Admin_model->insert($params);
            redirect('admin/Posts/add_post_paging');

        } else {

            $this->load->view('add_post_paging');
        }
    }



/* for delete the posts by id */
    function delete_post()
    {
        $this->Admin_model->procedure = 'POST_DELETE';

        echo $this->p_post_id_delete;


        $rs = $this->Admin_model->delete($this->p_post_id_delete);

        //redirect('admin/Posts/display_cat');
    }

    function index()
    {
        $rs = $this->display();
        $data['rows'] = $rs;

        $this->load->view('display_posts', $data);
    }



    /*for search about the post by title and the date published --ok*/
    function search()
    {
        $this->Admin_model->package='POSTS_PKG';

        $sql = '';
        $this->Admin_model->procedure = 'POSTS_LIST';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->p_title != null || $this->p_date != null) {
                $sql .= isset($this->p_title) && $this->p_title != null ? " AND TITLE LIKE '%{$this->p_title}%' AND TYPE_CAT='{$this->p_type_cat}'" : '';
                $sql .= isset($this->p_date) && $this->p_date != null ? " AND PUBLISHEDDATE LIKE  TO_DATE( '{$this->p_date}','YYYY-MM-DD') AND TYPE_CAT='{$this->p_type_cat}' " : '';

                $rs = $this->Admin_model->getList($sql, 0, 100);
                $data['rows'] = $rs;
                if($this->p_type_cat == 1){

                $this->load->view('display_posts', $data);
                }
                else if($this->p_type_cat == 0)
                    $this->load->view('display_posts_cat', $data);

            } else {

                if ($this->p_type_cat == 1) {
                    redirect('admin/Posts/display_pages');
                } else if ($this->p_type_cat == 0) {
                    redirect('admin/Posts/display_cat');
                }

            }

        } else {
            if ($this->p_type_cat == 1) {
                redirect('admin/Posts/display_pages');
            } else if ($this->p_type_cat == 0) {
                redirect('admin/Posts/display_cat');
            }
        }
    }

    /* end the search */


    function _private_f()
    {
        echo 'should be private ';
    }
}