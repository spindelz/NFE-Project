<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Users extends REST_Controller {

	public $default_language = null;

	public $primary_key = 'UserID';

	function __construct() {
		parent::__construct();

		$this->load->model('Users_model');
	}

	public function index_get(){
		$data = array();
		$limit   = 100;
		$offset  = 0;

		extract($this->get());

		if ($this->get($this->primary_key)) {
			$data = $this->Users_model->getByKey($this->get($this->primary_key), $convert_display = true);
		} else {
			$data = $this->Users_model->getAll($limit, $offset, $convert_display = true);
		}

		$this->response(empty($data) ? '' : $data, parent::HTTP_OK);
	}

	public function index_post(){
		$csrf_token_name = $this->config->item('csrf_token_name');

		$input = $this->post();

		if (array_key_exists($csrf_token_name, $input)) {
			unset($input[$csrf_token_name]);
		}

		$data = $this->security->xss_clean($input);

		$this->Users_model->set_data_format($data);

		$result = $this->Users_model->insert($data);

		if ($result) {
			$this->response($result, parent::HTTP_OK);
		} else {
			$this->response(lang('save_failure'), parent::HTTP_BAD_REQUEST);
		}
	}

	public function index_put(){
		$csrf_token_name = $this->config->item('csrf_token_name');

		$input  = $this->put();

		if (array_key_exists($csrf_token_name, $input)) {
			unset($input[$csrf_token_name]);
		}

		$data = $this->security->xss_clean($input);

		$this->Users_model->set_data_format($data);

		$result = $this->Users_model->update($data);
		if ($result) {
			$this->response($result, parent::HTTP_OK);
		} else {
			$this->response(lang('save_failure'), parent::HTTP_BAD_REQUEST);
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
			$result = $this->Users_model->deleteList($data);
		} else {
			$result = $this->Users_model->delete($input);
		}

		if ($result) {
			$this->response($result, parent::HTTP_OK);
		} else {
			$this->response(lang('delete_failure'), parent::HTTP_BAD_REQUEST);
		}
	}

	public function ajax_list_post(){
		$debug = '';
		$list  = array();
		$data  = array();
		$no    = $_POST['start'];

		$criteria = $this->input->post('criteria');

		$this->session->set_userdata('criteria', $criteria);

		$list  = $this->Users_model->get_datatables($criteria);
		$debug = $this->db->last_query();

		foreach ($list as &$entity) {

			$label_no = '<label>' . ++$no . '</label>';

			$entity['no'] = $label_no;

			$entity['[PrimaryKey]'] = $entity['[PrimaryKey]'];
		}

		$output = array(
			'draw'            => $_POST['draw'],
			'recordsTotal'    => $this->Users_model->count_all(),
			'recordsFiltered' => $this->Users_model->count_filtered($criteria),
			'data'            => $list,
			'debug'           => $debug,
			);
		$this->response($output, parent::HTTP_OK);
	}
}