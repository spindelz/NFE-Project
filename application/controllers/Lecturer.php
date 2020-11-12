<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturer extends MY_Controller{
    
    var $allow_permission = TRUE;

    var $is_authen = TRUE;

    var $is_translation = TRUE;
    
    var $page_id = 11;

    function __construct() {
        parent :: __construct();
        $this->load->model('Lecturer_model');
    }

    function index(){
        $user_logined = $this->session->userdata('user_logined');

        if(!isset($user_logined)){
            redirect(SITE.'home/login');
        }

        $this->render('normal_page', 'Lecturer','Lecturer/index');
    }

    function form($id = ''){
        $user_logined = $this->session->userdata('user_logined');

        if(!isset($user_logined)){
            redirect(SITE.'home/login');
        }

        $data = array();
        $data['LecturerID'] = 1;

        $this->render('normal_page', 'Lecturer','Lecturer/form', false, $data);
    }

}