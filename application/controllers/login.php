<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: mkilani
 * Date: 07/09/14
 * Time: 09:18 ص
 */

class Login extends MY_Controller{

    var $MODEL_NAME= 'login_model';
    var $user_id ;
    var $user_pwd ;

    function  __construct(){
        parent::__construct();
        $this->load->model($this->MODEL_NAME);


    }

    function index($message=null){

        $data['title']='دخول المستخدمين';
        $data['content']='login_index';
        $data['msg']=$message;

        $this->check_session();
        $this->load->view('login_index',$data);
    }



    function check_session(){
        if(isset($this->user->id) or $this->user->id!=''){
           $this->logout();
        }
    }



    function check_user(){
        $this->check_session();
        $min= 3;
        if(!$this->session->userdata('count_login')){
            $this->session->set_userdata('count_login',0);
        }

        if($this->session->userdata('count_login')>=6 ){ // 7 tries
            $this->index("يجب الانتظار لمدة $min دقائق لتتمكن من تسجيل الدخول");
            if(!$this->session->userdata('last_login')){
                $this->session->set_userdata('last_login',time());
            }

            if( $this->session->userdata('last_login') and $this->session->userdata('last_login')+($min*60) < time()){
                $this->session->set_userdata('count_login',0);
                $this->session->unset_userdata('last_login');
            }

        }else {
            $user_data= $this->{$this->MODEL_NAME}->get($this->p_username, $this->p_password);
            if( count($user_data)==1 and $user_data[0]['ISACTIVE']==1 and strtolower(trim($user_data[0]['USERNAME']))== $this->p_username){

                $user = new User();
                $user->id= $user_data[0]['ID'];
                $user->username= $user_data[0]['USERNAME'];

                $this->session->set_userdata('user_data',$user);

                $p_url= $this->session->userdata('curr_page_url');
                if( 1 and isset($p_url) and $p_url and strlen($p_url) > 5 ){
                    redirect($p_url);
                }else{

                    redirect('/admin/Main/'); // '/welcome/home'
                }

            } elseif ( count($user_data)==1 and $user_data[0]['ISACTIVE']==0 and strtolower(trim($user_data[0]['USERNAME']))== $this->user_id){
                $this->index('لا تستطيع الدخول على هذا الحساب في الوقت الحالي، يرجى مراجعة ادارة الحاسوب قسم البرمجة');
            } else { //$this->UnAuthorized();
                $this->session->set_userdata('count_login', $this->session->userdata('count_login')+1);
                $this->index('اسم المستخدم او كلمة المرور المدخلة خاطئة');
            }
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $this->login_model->closeConnection();
        redirect('/login/');
    }

}

