<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OpenClass extends MY_Controller{
    
    var $allow_permission = TRUE;

    var $is_authen = TRUE;

    var $is_translation = TRUE;
    
    var $page_id = 9;

    function __construct() {
        parent :: __construct();
        $this->load->model('OpenClass_model');
    }

    function index(){
        $user_logined = $this->session->userdata('user_logined');

        if(!isset($user_logined)){
            redirect(SITE.'home/login');
        }

        $this->render('normal_page', 'OpenClass','OpenClass/index',FALSE);

    }

    function form($id){
        $user_logined = $this->session->userdata('user_logined');

        if(!isset($user_logined)){
            redirect(SITE.'home/login');
        }

        $data = array();

        if($id){
            $data['ClassID'] = $id;
        }

        $this->render('normal_page', 'OpenClass','OpenClass/form', $data);

    }

}