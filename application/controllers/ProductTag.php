<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductTag extends MY_Controller {

	var $allow_permission = TRUE; 

	var $is_authen = FALSE; 

	var $is_translation = TRUE; 

	var $page_id = 8; 

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->render('normal_page', 'ProductTag', 'ProductTag/index', null);
	}

	public function create() {
		$data['pageName'] = 'เพิ่มแท็กสินค้า';
		$this->render('normal_page', 'ProductTagCreate', 'ProductTag/form', FALSE, $data);
	}
	
	public function edit($ProductTagID = null) {
		$data['ProductTagID'] = $ProductTagID;
		$data['pageName'] = 'แก้ไขแท็กสินค้า';
		$this->render('normal_page', 'ProductTagEdit', 'ProductTag/form', FALSE, $data);
    }

}