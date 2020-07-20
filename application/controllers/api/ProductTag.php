<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ProductTag extends REST_Controller {

	public $default_language = null;

	public $primary_key = 'TagID';

	function __construct() {
		parent::__construct();

		$this->load->model('ProductTag_model');
	}

	public function index_get(){
		$data = array();
		$limit   = 100;
		$offset  = 0;
		$ProductTagID = $this->get($this->primary_key);

		if ($ProductTagID) {
			$result = $this->ProductTag_model->getByKey($ProductTagID, $convert_display = true);
		} else {
			$result = $this->ProductTag_model->get_datatable($limit, $offset, $convert_display = true);
			foreach ($result as $key => &$value) {
				$value['UpdatedDate'] = to_date_string($value['UpdatedDate']);
			}
		}

		$data['data'] = $result;
		$data['length'] = count($result);
		$data['debug'] = $this->db->last_query();

		$this->response(empty($data) ? '' : $data, parent::HTTP_OK);
	}

	public function index_post(){
		$csrf_token_name = $this->config->item('csrf_token_name');

		$input = $this->post();

		if (array_key_exists($csrf_token_name, $input)) {
			unset($input[$csrf_token_name]);
		}

		$data = $this->security->xss_clean($input);

		// $this->ProductTag_model->set_data_format($data);
		unset($data['ProductTagID']);
		$result = $this->ProductTag_model->insert($data, true);

		if ($result) {
			$this->response($result, parent::HTTP_OK);
		} else {
			$this->response('ไม่สามารถบันทึกข้อมูลได้', parent::HTTP_BAD_REQUEST);
		}
	}

	public function index_put(){
		$csrf_token_name = $this->config->item('csrf_token_name');

		$input  = $this->put();

		if (array_key_exists($csrf_token_name, $input)) {
			unset($input[$csrf_token_name]);
		}

		$data = $this->security->xss_clean($input);
		$ProductTagID = $data['ProductTagID'];
		unset($data['ProductTagID']);
		// $this->ProductTag_model->set_data_format($data);

		$result = $this->ProductTag_model->update($data, array($this->primary_key => $ProductTagID));
		if ($result) {
			$this->response($result, parent::HTTP_OK);
		} else {
			$this->response('ไม่สามารถบันทึกข้อมูลได้', parent::HTTP_BAD_REQUEST);
		}
	}

	public function index_delete(){
		$result = array();

		$input = $this->delete();
		$data  = array();
		if (array_key_exists('data', $input)) {
			$data = $input['data'];
		}

		if (!empty($data)) {
			$result = $this->ProductTag_model->deleteList($data);
		} else {
			$result = $this->ProductTag_model->delete($input);
		}

		if ($result) {
			$this->response($result, parent::HTTP_OK);
		} else {
			$this->response('ไม่สามารถลบข้อมูลได้', parent::HTTP_BAD_REQUEST);
		}
	}

	public function ajax_list_post(){
		$debug = '';
		$list  = array();
		$data  = array();
		$no    = $_POST['start'];

		$criteria = $this->input->post('criteria');

		$this->session->set_userdata('criteria', $criteria);

		$list  = $this->ProductTag_model->get_datatables($criteria);
		$debug = $this->db->last_query();

		foreach ($list as &$entity) {

			$label_no = '<label>' . ++$no . '</label>';

			$entity['no'] = $label_no;

			$entity['[PrimaryKey]'] = $entity['[PrimaryKey]'];
		}

		$output = array(
			'draw'            => $_POST['draw'],
			'recordsTotal'    => $this->ProductTag_model->count_all(),
			'recordsFiltered' => $this->ProductTag_model->count_filtered($criteria),
			'data'            => $list,
			'debug'           => $debug,
			);
		$this->response($output, parent::HTTP_OK);
	}

	public function search_get(){
		$data = array();
		$csrf_token_name = $this->config->item('csrf_token_name');

		$input = $this->get();

		if (array_key_exists($csrf_token_name, $input)) {
			unset($input[$csrf_token_name]);
		}

		$input = $this->security->xss_clean($input);

		$result = $this->ProductTag_model->getByFilter($input);
		
		$data['data'] = $result;
		$data['length'] = count($result);
		$data['debug'] = $this->db->last_query();

		$this->response(empty($data) ? '' : $data, parent::HTTP_OK);
	}
}