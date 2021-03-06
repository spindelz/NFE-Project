<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    public $allow_permission = FALSE;

    public $is_authen = TRUE;

    public $is_translation = FALSE;

    public $page_id = 0;

    public function __construct() {
        parent::__construct();

        define('SITE',site_url());
        define('ASSETS_SITE',base_url('assets'));
        define('ASSETS_CSS',base_url('assets/css'));
        define('ASSETS_IMG',base_url('assets/img'));
        define('ASSETS_JS',base_url('assets/js'));

        define('ERROR_INVALID_MODE','Error mode is invalid!!');
    }
    
    protected function render($template = '', $page_name = '', $content = null, $is_admin = false, $data = null){
        switch($template){
            case 'normal_page':
                if($this->is_authen){
                    $this->checkAuthen($is_admin);
                }
                $this->load->view('template/head');
                // $this->load->view('template/sidebar');
                $data_header['page'] = $page_name;
                $user_logined = $this->session->userdata('user_logined');
                $site = $this->session->userdata('Site');
                if(isset($user_logined)){
                    $data_header['FullName'] = $user_logined['PrefixName'] . ' ' . @$user_logined['FirstName'] . ' ' . @$user_logined['LastName'];
                    $data_header['UserTypeID'] = (int)$user_logined['UserTypeID'];
                    $data_header['Site'] = (isset($site) || !empty($site) ? $site : 1);
                    if(array_search((int)$user_logined['UserTypeID'], array(5,6,7)) > -1){
                        $data_header['StudentCode'] = $user_logined['UserID'];
                        $data_header['PersonalID'] = $user_logined['PersonalID'];
                        $data_header['UserTypeName'] = $user_logined['UserTypeName'];
                    }else{
                        $data_header['Position'] = $user_logined['UserTypeName'];
                    }
                }
                $data_header['pageID'] = $this->page_id;
                
                $this->load->view('template/header', $data_header);
                $data['AmphurID'] = $this->config->item('NFE_AmphurID');
                $this->load->view($content, $data);
                $script_file = explode('/', $content);
                $script_file = $script_file[0];
                // $view["assets_js"] = !is_null($assets_js) ? $this->js_asset($assets_js) : '';
                // echo '<pre>'; print_r($user_logined); echo '</pre>'; die();
                $this->load->view('template/footer');
                
                // echo $data['AmphurID']; die();
                $this->load->view('template/script');
                $this->load->view($content.'_js', $data);
                $this->load->view('template/foot');
                
                break;
            case 'login_page':
                $this->load->view('template/head');
                
                $this->load->view($content, $data);
                $script_file = explode('/', $content);
                $script_file = $script_file[0];

                $this->load->view('template/script');
                $this->load->view($content.'_js');
                $this->load->view('template/foot');
                break;
            case 'blank_page':
                $this->load->view('template/head');
                $this->load->view($content, $data);
                $this->load->view('template/script');
                $this->load->view($content.'_js');

                // $view["assets_js"] = !is_null($assets_js) ? $this->js_asset($assets_js) : '';
                break;
        }
    }

    protected function check_permission($rankID, $roleID, $userID){

        if(is_null($rankID) || is_null($userID)){
            return false;
        }

        $result = $this->permission_model->check_permission($rankID, $roleID, $userID);

        return count($result) > 0 ? true : false;

    }

    protected function checkAuthen($is_admin){
        $user = $this->session->userdata('user_logined');
        if(!isset($user)){
            if($is_admin){
                redirect(base_url('Auth/login'));
            }else{
                redirect(base_url('Home/login'));
            }
        }
    }

    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    protected function format_date_sql($date){
        $str = explode('/',$date);
        return $str[2]."-".$str[1]."-".$str[0];
    }

    protected function format_date($date){
        if(!is_null($date)){
            $str = explode('-',$date);
            return $str[2]."/".$str[1]."/".$str[0];
        }else{
            return '';
        }
    }

    function js_asset($asset_name) {
        return '<script src="' . ASSETS_JS . $asset_name . '"></script>';
    }

    function url_index($index){
        $str_url = uri_string();
        $str_url = explode('/', $str_url);
        return $str_url[$index];
        
    }

}