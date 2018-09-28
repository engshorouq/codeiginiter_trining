<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ahmed Barakat
 * Date: 7/7/14
 * Time: 9:29 AM
 */
class MY_Controller extends MX_Controller
{

    public $controller;
    public $action;
    public $module;

    protected $ora;
    protected $page_size = 200;

    public $user;
    private  static $instance;

    protected $today;
    protected $prev_year;



    function __construct()
    {

        parent::__construct();

        self::$instance =& $this;



        $this->controller = $this->router->class;
        $this->action = $this->router->method;
        $this->module = $this->router->fetch_module();
        $this->user=new user();
       /* if($this->session->userdata('user_data')){
            $this->user=$this->session->userdata('user_data');
        }else{
            if(($this->controller != 'login' && $this->_exclude_pages()) || (strtolower($this->module) == 'admin' || strtolower($this->module) == 'cpanel'))
            {
                echo ". $this->module , $this->controller , $this->action ";
                //die;
                redirect('/login/','location',302);
            }
        }*/
       if($this->session->userdata('user_data')){
            $this->user=$this->session->userdata('user_data');
        }else{
            if($this->controller != 'login')
                redirect('/login/','location',302);
        }

        /***
         * Convert Query Strings To Vars ..
         */
        foreach ($_GET as $key => $value) {
            $key = 'q_' . $key;
            $this->$key = $value; //Creates a public variable of the key and sets it to value

        }
        //////////////////////////////////////////////////////////
        foreach ($_FILES as $key => $value) {
            $key = 'f_' . $key;
            $this->$key = $value; //Creates a public variable of the key and sets it to value

        }
        //////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////
        /***
         * Convert Post Data To Vars ..
         */
        foreach ($_POST as $key => $value) {
            $key = 'p_' . $key;
            $this->$key = $value; //Creates a public variable of the key and sets it to value

        }
     }

    function _current_url()
    {
        $url = $this->uri->uri_string();
        return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
    }
    function remove_querystring_var($url, $key) {
        $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
        $url = substr($url, 0, -1);
        $url =str_replace('&page=','',$url);
        $url =str_replace('page=','',$url);
        return $url;
    }
//////////////////////////////////////////////////////////////////////////////
    function upload_file(){
       // $ext=pathinfo($image,PATHINFO_EXTENSION);
        $attachment_name= uniqid().date("dmyish");
        if($attachment_name!='' ){
            $config['upload_path']= './uploads/';
            $config['allowed_types']= 'word|doc|docx|xl|xls|xlsx|csv|pdf|zip|rar|tif|jpg|jpeg|png';
            $config['max_size']= 1024*350; // KB
            $config['file_name']= $attachment_name;

            //create the folder if it's not already exists
            if(!is_dir($config['upload_path']))
                mkdir($config['upload_path'],0755,TRUE);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')){
                print_r($this->upload->display_errors());
                return '';
            }
            else{
                $file_data= $this->upload->data();
                $file_path=substr($file_data['full_path'],strpos($file_data['full_path'],'uploads'));
                return $file_path;

            }
        }else
            echo "لم يتم رفع الصورة بنجاح";
        return '';
    }




    function IsAuthorized(){
        $__AntiForgeryToken = $this->input->post('__AntiForgeryToken');


        if($this->AntiForgeryToken() != $__AntiForgeryToken){
            header('HTTP/1.0 401 Unauthorized');
            header('HTTP/1.1 401 Unauthorized');

            die();
        }
    }

    function UnAuthorized(){
        header('HTTP/1.0 401 Unauthorized');
        header('HTTP/1.1 401 Unauthorized');
        redirect('UnAuthorized',null,401);
        die();
    }

    function print_error_msg($message,$print_message =null){

        header("HTTP/1.0 500 {$message}");
        header("HTTP/1.0 500 {$message}");
        print $print_message;
        die;
    }

    function return_json($result){
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
    }

    function Is_success($message){

        $success = false;

        if(strpos($message, '"msg":1') !==false){
            $success = true;
        }

        if(trim($message) == '1' ){
            $success = true;
        }

        if(!$success)
        {

            $this->print_error_msg($message,$this->_oracle_error_message($message));
        }

    }

    function _oracle_error_message($message){

        preg_match('/\w+\s+(?P<name>\w+-\d+):[\s+\w+]+\(\"(?P<db>\w+)\".\"(?P<tbl>\w+)\".\"(?P<col>\w+)\"\)[\s+\w+]+/', $message, $match);

        if(count($match) > 0)
            if(array_key_exists($match["name"],$this->ora->ORA))
            {

                $result = array("message"=>$this->ora->ORA[$match["name"]],"col"=>strtolower($match["col"]));
                return json_encode($result);

            }else{
                $result = array("message"=>$message,"col"=>strtolower( $match["col"]));
                return json_encode($result);
            }
        else return $message;


    }

    public static function &get_instance()
    {
        return self::$instance;
    }



    /**
     * @param $params
     * @param $data
     *
     * extract data from param in array of params
     */
    function date_format(&$params,$cols){

        $i = 0;
        foreach($params as $array){

            if(is_array($cols)){

                foreach($cols as $col){
                    //$params[$i][$col] =DateTime::createFromFormat($this->SERVER_DATE_FORMAT, $array[$col])->format($this->DATEFORMAT);
                }

            }else{

                // $params[$i][$cols] =DateTime::createFromFormat($this->SERVER_DATE_FORMAT, $array[$cols])->format($this->DATEFORMAT);
            }
            $i++;

        }


    }


    function get_table_count ($sql){
        $this->load->model('settings/system_info_model');
        $rs =  $this->system_info_model->get_table_count($sql);


        if(count($rs)> 0)
            return $rs;
        else array();
    }


    function print_error($msg){
        echo $msg;
        $this->print_error_msg('invalid data entry .. ');
    }


    function stringDateToDate($date){

        $year = substr($date,0,3);
        $month =  substr($date,4);
        return date("01/{$month}/{$year}");

    }

    function _loadDatePicker(){
        add_css('datepicker3.css');
        add_css('combotree.css');
        add_js('moment.js');
        add_js('bootstrap-datetimepicker.js');
    }



}