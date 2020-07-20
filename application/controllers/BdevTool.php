<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BdevTool extends MY_Controller {

    var $allow_permission = FALSE;

    var $is_authen = FALSE;

	var $is_translation = FALSE;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->render('login_page', 'BdevTool', 'tool', TRUE, null);
    }

    public function test(){
        $msg = 'G1234';
        $key = $this->config->item('encryption_key');
        $pass = $msg;
        $encrypted_string = $this->encrypt->encode($pass);
        echo $encrypted_string.'<br>';
        $plaintext_string = $this->encrypt->decode($encrypted_string);
        echo $plaintext_string.'<br>';

        // $ciphertext = $this->encryption->encrypt('G1234');
        // echo $ciphertext.'<br>';

        // echo $this->encryption->decrypt($ciphertext);
    }

    public function genViewFolder(){
        if(is_dir(APPPATH.'views/')){
            mkdir(APPPATH.'views/'.$_POST['ViewName']);
            if(is_dir(APPPATH.'views/'.$_POST['ViewName'])){
                echo 'success';
            }else{
                echo 'fail';
            }
        }else{
            echo 'fail';
        }
        
    }

    public function genViewFile(){
        if(is_dir(APPPATH.'views/')){
            switch ($_POST['Type']) {
                case 'index':
                    fopen(APPPATH.'views/'.$_POST['ViewName'].'/index.php', "w");
                    if(file_exists(APPPATH.'views/'.$_POST['ViewName'].'/index.php')){
                        echo 'success';
                    }else{
                        echo 'fail';
                    }
                    break;
                case 'js':
                    fopen(APPPATH.'views/'.$_POST['ViewName'].'/index_js.php', "w");
                    if(file_exists(APPPATH.'views/'.$_POST['ViewName'].'/index_js.php')){
                        echo 'success';
                    }else{
                        echo 'fail';
                    }
                    break;
                case 'css':
                    fopen(APPPATH.'views/'.$_POST['ViewName'].'/index_css.php', "w");
                    if(file_exists(APPPATH.'views/'.$_POST['ViewName'].'/index_css.php')){
                        echo 'success';
                    }else{
                        echo 'fail';
                    }
                    break;
                            
                default:
                    echo 'fail';
                    break;
            }
        }else{
            echo 'fail';
        }
    }

    public function genControllerFile(){
        if(is_dir(APPPATH.'controllers/')){

            $folder_type = '';
            if(!isset($_POST['OutsideFolder'])){
                $folder_type = '/index';
            }

            $file = fopen(APPPATH.'controllers/'.$_POST['ControllerName'].'.php', "wb") or die("Unable to open file!");
            $text = "<?php\n";
            $text .= "defined('BASEPATH') OR exit('No direct script access allowed');\n\n";
            $text .= "class ".$_POST['ControllerName']." extends MY_Controller {\n\n";
            $text .= "\tvar $"."allow_permission = FALSE; \n\n";
            $text .= "\tvar $"."is_authen = FALSE; \n\n";
            $text .= "\tvar $"."is_translation = FALSE; \n\n";
            $text .= "\tvar $"."page_id = [PageID]; \n\n";
            $text .= "\tfunction __construct() {\n";
            $text .= "\t\tparent::__construct();\n";
            $text .= "\t}\n\n";
            $text .= "\tpublic function index() {\n";
            $text .= "\t\t$"."this"."->render('".$_POST['PageType']."', '".$_POST['ControllerName']."', '".strtolower($_POST['ControllerName']).$folder_type."', null);\n";
            $text .= "\t}\n\n";
            $text .= "}";
            fwrite($file, $text);
            fclose($file);

            if(file_exists(APPPATH.'controllers/'.$_POST['ControllerName'].'.php')){
                echo 'success';
            }else{
                echo 'fail';
            }
        }else{
            echo 'fail';
        }
        
    }

    public function genAPIFile(){
        if(is_dir(APPPATH.'controllers/api/')){
            $file = fopen(APPPATH.'controllers/api/'.$_POST['TableName'].'.php', "wb") or die("Unable to open file!");

            $text = "<?php\n";
            $text .= "defined('BASEPATH') OR exit('No direct script access allowed');\n\n";
            $text .= "require APPPATH . '/libraries/REST_Controller.php';\n\n";
            $text .= "use Restserver\Libraries\REST_Controller;\n\n";
            $text .= "class ".$_POST['TableName']." extends REST_Controller {\n\n";
            $text .= "\tpublic $" . "default_language" . " = null;\n\n";
            $text .= "\tpublic $" . "primary_key" . " = '".$_POST['PK']."';\n\n";

            $text .= "\tfunction __construct() {\n";
            $text .= "\t\tparent::__construct();\n\n";
            $text .= "\t\t$" . "this" . "->load->model('".$_POST['TableName']."_model');\n";
            $text .= "\t}\n\n";

            $text .= "\tpublic function index_get(){\n";
            $text .= "\t\t$" . "data" . " = array();\n";
            $text .= "\t\t$" . "limit" . "   = 100;\n";
            $text .= "\t\t$" . "offset" . "  = 0;\n\n";
            $text .= "\t\textract($" . "this" . "->get());\n\n";
            $text .= "\t\tif ($" . "this" . "->get($" . "this" . "->primary_key)) {\n";
            $text .= "\t\t\t$" . "data" . " = $" . "this" . "->".$_POST['TableName']."_model->getByKey($" . "this" . "->get($" . "this" . "->primary_key), $" . "convert_display" . " = true);\n";
            $text .= "\t\t} else {\n";
            $text .= "\t\t\t$" . "data" . " = $" . "this" . "->".$_POST['TableName']."_model->getAll($" . "limit" . ", $" . "offset" . ", $" . "convert_display" . " = true);\n";
            $text .= "\t\t}\n\n";
            $text .= "\t\t$" . "this" . "->response(empty($" . "data" . ") ? '' : $" . "data" . ", parent::HTTP_OK);\n";
            $text .= "\t}\n\n";

            $text .= "\tpublic function index_post(){\n";
            $text .= "\t\t$" . "csrf_token_name" . " = $" . "this" . "->config->item('csrf_token_name');\n\n";
            $text .= "\t\t$" . "input" . " = $" . "this" . "->post();\n\n";
            $text .= "\t\tif (array_key_exists($" . "csrf_token_name" . ", $" . "input" . ")) {\n";
            $text .= "\t\t\tunset($" . "input" . "[$" . "csrf_token_name" . "]);\n";
            $text .= "\t\t}\n\n";
            $text .= "\t\t$" . "data" . " = $" . "this" . "->security->xss_clean($" . "input" . ");\n\n";
            $text .= "\t\t$" . "this" . "->".$_POST['TableName']."_model->set_data_format($" . "data" . ");\n\n";
            $text .= "\t\t$" . "result" . " = $" . "this" . "->".$_POST['TableName']."_model->insert($" . "data" . ");\n\n";
            $text .= "\t\tif ($" . "result" . ") {\n";
            $text .= "\t\t\t$" . "this" . "->response($" . "result" . ", parent::HTTP_OK);\n";
            $text .= "\t\t} else {\n";
            $text .= "\t\t\t$" . "this" . "->response(lang('save_failure'), parent::HTTP_BAD_REQUEST);\n";
            $text .= "\t\t}\n";
            $text .= "\t}\n\n";
            
            $text .= "\tpublic function index_put(){\n";
            $text .= "\t\t$" . "csrf_token_name" . " = $" . "this" . "->config->item('csrf_token_name');\n\n";
            $text .= "\t\t$" . "input" . "  = $" . "this" . "->put();\n\n";
            $text .= "\t\tif (array_key_exists($" . "csrf_token_name" . ", $" . "input" . ")) {\n";
            $text .= "\t\t\tunset($" . "input" . "[$" . "csrf_token_name" . "]);\n";
            $text .= "\t\t}\n\n";
            $text .= "\t\t$" . "data" . " = $" . "this" . "->security->xss_clean($" . "input" . ");\n\n";
            $text .= "\t\t$" . "this" . "->".$_POST['TableName']."_model->set_data_format($" . "data" . ");\n\n";
            $text .= "\t\t$" . "result" . " = $" . "this" . "->".$_POST['TableName']."_model->update($" . "data" . ");\n";
            $text .= "\t\tif ($" . "result" . ") {\n";
            $text .= "\t\t\t$" . "this" . "->response($" . "result" . ", parent::HTTP_OK);\n";
            $text .= "\t\t} else {\n";
            $text .= "\t\t\t$" . "this" . "->response(lang('save_failure'), parent::HTTP_BAD_REQUEST);\n";
            $text .= "\t\t}\n";
            $text .= "\t}\n\n";

            $text .= "\tpublic function index_delete(){\n";
            $text .= "\t\t$" . "result" . " = array();\n\n";
            $text .= "\t\t$" . "input" . " = $" . "this" . "->delete();\n";
            $text .= "\t\t$" . "data" . "  = array();\n";
            $text .= "\t\tif (array_key_exists('data', $" . "input" . ")) {\n";
            $text .= "\t\t\t$" . "data" . " = $" . "input" . "['data'];\n";
            $text .= "\t\t}\n\n";
            $text .= "\t\tif (!empty($" . "data" . ")) {\n";
            $text .= "\t\t\t$" . "result" . " = $" . "this" . "->".$_POST['TableName']."_model->deleteList($" . "data" . ");\n";
            $text .= "\t\t} else {\n";
            $text .= "\t\t\t$" . "result" . " = $" . "this" . "->".$_POST['TableName']."_model->delete($" . "input" . ");\n";
            $text .= "\t\t}\n\n";
            $text .= "\t\tif ($" . "result" . ") {\n";
            $text .= "\t\t\t$" . "this" . "->response($" . "result" . ", parent::HTTP_OK);\n";
            $text .= "\t\t} else {\n";
            $text .= "\t\t\t$" . "this" . "->response(lang('delete_failure'), parent::HTTP_BAD_REQUEST);\n";
            $text .= "\t\t}\n";
            $text .= "\t}\n\n";

            $text .= "\tpublic function ajax_list_post(){\n";
            $text .= "\t\t$" . "debug" . " = '';\n";
            $text .= "\t\t$" . "list" . "  = array();\n";
            $text .= "\t\t$" . "data" . "  = array();\n";
            $text .= "\t\t$" . "no" . "    = $" . "_POST" . "['start'];\n\n";
            $text .= "\t\t$" . "criteria" . " = $" . "this" . "->input->post('criteria');\n\n";
            $text .= "\t\t$" . "this" . "->session->set_userdata('criteria', $" . "criteria" . ");\n\n";
            $text .= "\t\t$" . "list" . "  = $" . "this" . "->".$_POST['TableName']."_model->get_datatables($" . "criteria" . ");\n";
            $text .= "\t\t$" . "debug" . " = $" . "this" . "->db->last_query();\n\n";
            $text .= "\t\tforeach ($" . "list" . " as &$" . "entity" . ") {\n\n";
            $text .= "\t\t\t$" . "label_no" . " = '<label>' . ++$" . "no" . " . '</label>';\n\n";
            $text .= "\t\t\t$" . "entity" . "['no'] = $" . "label_no" . ";\n\n";
            $text .= "\t\t\t$" . "entity" . "['[PrimaryKey]'] = $" . "entity" . "['[PrimaryKey]'];\n";
            $text .= "\t\t}\n\n";
            $text .= "\t\t$" . "output" . " = array(\n";
            $text .= "\t\t\t'draw'            => $" . "_POST" . "['draw'],\n";
            $text .= "\t\t\t'recordsTotal'    => $" . "this" . "->".$_POST['TableName']."_model->count_all(),\n";
            $text .= "\t\t\t'recordsFiltered' => $" . "this" . "->".$_POST['TableName']."_model->count_filtered($" . "criteria" . "),\n";
            $text .= "\t\t\t'data'            => $" . "list" . ",\n";
            $text .= "\t\t\t'debug'           => $" . "debug" . ",\n";
            $text .= "\t\t\t);\n";
            $text .= "\t\t$" . "this" . "->response($" . "output" . ", parent::HTTP_OK);\n";
            $text .= "\t}\n";
            
            $text .= "}";
            fwrite($file, $text);
            fclose($file);

            if(file_exists(APPPATH.'controllers/api/'.$_POST['TableName'].'.php')){
                echo 'success';
            }else{
                echo 'fail';
            }
        }else{
            echo 'fail';
        }
        
    }

    public function genModelFile(){
        if(is_dir(APPPATH.'models/')){
            $file = fopen(APPPATH.'models/'.$_POST['TableName'].'_model.php', "wb") or die("Unable to open file!");

            $text = "<?php\n";
            $text .= "defined('BASEPATH') OR exit('No direct script access allowed');\n\n";
            $text .= "class ".$_POST['TableName']."_model extends MY_Model {\n\n";
            $text .= "\tpublic $" . "table_name" . " = '".$_POST['TableName']."';\n\n";
            $text .= "\tpublic $" . "primary_key" . " = '".$_POST['PK']."';\n\n";
            $text .= "\tpublic $" . "is_translation" . " = false;\n\n";
            $text .= "\tpublic $" . "table_translation_name" . " = null;\n\n";

            $text .= "\tprivate function _get_datatables_query($" . "criteria" . " = array()) {\n";
            $text .= "\t\t$"."this"."->_setFrom();\n\n";
            $text .= "\t\tif (array_key_exists('keyword', $"."criteria".") && !empty($"."criteria"."['keyword'])) {\n";
            $text .= "\t\t\t$"."this"."->db->like('".$_POST['TableName'].".[Column1]', $"."criteria"."['keyword']);\n";
            $text .= "\t\t}\n";
            $text .= "\t}\n\n";

            $text .= "\tpublic function get_datatables($"."criteria"."){\n";
            $text .= "\t\t$"."this"."->_get_datatables_query($"."criteria".");\n\n";
            $text .= "\t\t$"."this"."->db->select('*');\n\n";
            $text .= "\t\t$"."this"."->db->order_by($"."this"."->primary_key, 'ASC');\n\n";
            $text .= "\t\t$"."query"." = $"."this"."->db->get();\n\n";
            $text .= "\t\treturn $"."query"."->result_array();\n";
            $text .= "\t}\n\n";

            $text .= "\tpublic function count_filtered($"."criteria"."){\n";
            $text .= "\t\t$"."this"."->_get_datatables_query($"."criteria".");\n";
            $text .= "\t\t$"."results"." = $"."this"."->db->count_all_results();\n";
            $text .= "\t\treturn $"."results".";\n";
            $text .= "\t}\n\n";
            
            $text .= "\tpublic function count_all(){\n";
            $text .= "\t\t$"."this"."->_get_datatables_query();\n";
            $text .= "\t\treturn $"."this"."->db->count_all_results();\n";
            $text .= "\t}\n\n";
            
            $text .= "}";
            fwrite($file, $text);
            fclose($file);

            if(file_exists(APPPATH.'models/'.$_POST['TableName'].'_model.php')){
                echo 'success';
            }else{
                echo 'fail';
            }
        }else{
            echo 'fail';
        }
    }

    public function getCurrency(){
        $homepage = file_get_contents('https://fxtop.com/th/countries-currencies.php');
        $array_content = explode('<table border="1" cellpadding="0" cellspacing="0" >', $homepage);
        $array_content = explode('</table>', $array_content[1]);
        $table_content = $array_content[0];
        $count = substr_count($table_content, '<tr><td>');
        $datas = array();

        $list = explode('<tr><td>', $table_content);

        for ($i = 1; $i < count($list); $i++) {
            $data_row = array();
            $array_link = explode('<a', $list[$i]);

            $link1 = $array_link[1];
            $country_zone = explode('</a>', $link1);
            $country = explode('>', $country_zone[0]);
            $data_row['country'] = trim($country[1]);
            $zone = explode('</td><td>', $country_zone[1]);
            $zone = explode('</td><td>', $zone[1]);
            $data_row['zone'] = trim($zone[0]);

            $link2 = $array_link[2];
            $currency = explode('</a>', $link2);
            $currency = explode('>', $currency[0]);
            $data_row['currency'] = trim($currency[1]);
            
            $link3 = $array_link[3];
            $pair_code = explode('</a>', $link3);
            $pair = explode('>', $pair_code[0]);
            $data_row['pair'] = trim($pair[1]);
            $code = explode('<td>', $pair_code[1]);
            $code = explode('</td></tr>', $code[2]);
            $data_row['country_code'] = trim($code[0]);

            array_push($datas, $data_row);
        }

        $query = '';
        $this->load->model('Country_model');
        foreach ($datas as $key => $value) {
            $query .= 'INSERT INTO currency (CountryName, CountryCode, Zone, CurrencyName, Pair, isActive, CreatedDate, UpdatedDate) VALUES (\''.$datas[$key]['country'].'\', \''.$datas[$key]['country_code'].'\', \''.$datas[$key]['zone'].'\', \''.$datas[$key]['currency'].'\', \''.$datas[$key]['pair'].'\', 1, \''.date('yy-m-d H:i:s').'\', \''.date('yy-m-d H:i:s').'\');<br>';
        }
        echo $query;
        
    }

}
