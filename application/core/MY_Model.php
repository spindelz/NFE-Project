<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *    @author spindelz
 *    @credit innosenz
 *    @version     [1]
 *    @date        2017-03-06
 *
 */

class MY_Model extends CI_Model{

	public $database_name = 'u823634085_nfe_main';

    /*
		    *    Table name for query builder.
		    *    Required parameter MUST be set.
		    *    ex. $table_name = "Users";
	*/
	public $table_name = null;

	/*
		    *    Primary key for query builder.
		    *    Required parameter MUST be set.
		    *    set array('column_name' => array of attribure)
		    *    ex. var $primary_key = array('UserID' => array('auto_increment' => TRUE));
		    *    or var $primary_key = "UserID" for one primary key and auto_increment is TRUE;
	*/
	public $primary_key = null;
	
	public $table_columns = null;
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');

        /*  check attribute */
		// $this->_validateProperties();
		$this->_setProperties();
    }

    protected function _setFrom(){
        $this->db->from($this->table_name);
	}
	
	protected function _setColumnSelect(){
        $this->db->select($this->table_name.'.*');
    }

    private function _validateProperties() {
		if (!isset($this->table_name) || empty($this->table_name)) {
			throw new Exception(get_class($this) . "'s " . '$table_name' . " does not set.", 1);
		}

		if (!isset($this->primary_key) || empty($this->primary_key)) {
			throw new Exception(get_class($this) . "'s " . '$primary_key' . " does not set.", 1);
		}

		if (is_string($this->primary_key)) {
			$this->primary_key = array($this->primary_key => array('auto_increment' => true));
		} else {
			$primary_key = array();
			foreach ($this->primary_key as $key => $value) {
				if (is_string($value)) {
					$primary_key[$value] = array('auto_increment' => true);
				} else {
					$primary_key[$key] = empty($value) ? array('auto_increment' => true) : $value;
				}
			}
			$this->primary_key = $primary_key;
		}
	}
	
	public function getAll($limit = false, $offeset = 0, $convert_display = false, $order_by = null) {
		
		if ($limit !== false) {
			$this->db->limit($limit, $offeset);
		}

		$this->_setColumnSelect();

		$this->_setFrom();

		if (!is_null($order_by)) {
			$this->db->order_by($order_by);
		}
		$this->db->where('isActive', 1);

		$results = $this->db->get()->result_array();

		if ($convert_display) {
			// foreach ($results as $key => &$value) {
			// 	$this->display_data_format($value);
			// }
		}

		return $results;
	}
	
	public function getByKey($key, $convert_display = false) {
		$this->_setColumnSelect();

		$this->_setFrom();
		// $this->_setFilter($key);
// echo $this->primary_key; die();
// 		$this->db->where($this->table_name . '.' . $this->primary_key, $key);
		$this->db->where($this->table_name . '.' . $this->primary_key, $key);
		$this->db->where('isActive', 1);
		$result = $this->db->get()->row_array();

		if ($convert_display) {
			// $this->display_data_format($result);
		}

		return $result;
	}

	// protected function _setFilter($key) {

	// 	foreach ($this->primary_key as $column_name => $attributes) {
	// 		if (is_array($key)) {
	// 			if (!array_key_exists($column_name, $key)) {
	// 				throw new Exception("Column : " . $column . "not found.", 1);
	// 			}
	// 			$this->db->where($this->table_name . '.' . $column_name, $key[$column_name]);
	// 		} else {
	// 			$this->db->where($this->table_name . '.' . $column_name, $key);
	// 		}
	// 	}
	// }

	public function display_data_format(&$data) {
		foreach ($this->table_columns as $key => $column) {
			switch ($column['DATA_TYPE']) {
				case 'date':
					if ( !empty($data[$column['name']]) && array_key_exists($column['name'], $data)) {
						$data[$column['name']] = to_date_string($data[$column['name']]);
					}
					break;
				case 'datetime':
				case 'datetime2':
					if ( !empty($data[$column['name']]) && array_key_exists($column['name'], $data)) {
						$data[$column['name']] = to_datetime_string($data[$column['name']]);
					}
					break;
				case 'time':
					if ( !empty($data[$column['name']]) && array_key_exists($column['name'], $data)) {
						$data[$column['name']] = to_time_string($data[$column['name']]);
					}
					break;
				case 'decimal':
					if (  !empty($data[$column['name']]) && array_key_exists($column['name'], $data)) {
						$data[$column['name']] = to_number_string($data[$column['name']]);
					}
					break;

				default:
					# code...
					break;
			}
		}
	}

	private function _setProperties() {

		if (!isset($this->table_columns) || empty($this->table_columns)) {
			$pathFile = './assets/temp/json/table_columns_'.$this->table_name.'.json';
			if (!file_exists($pathFile))  {
				$this->table_columns = $this->_findColumns();
				$this->_SaveFileJson($this->table_columns, 'table_columns_'.$this->table_name);
			}else{
				$recoveredData = file_get_contents($pathFile);
				$Data_columns = unserialize($recoveredData);
				$this->table_columns = $Data_columns['data'];
			}
		}

		if ($this->is_translation && !isset($this->table_translation_columns)) {
			$pathFileTranslation = './assets/temp/json/table_translation_columns_'.$this->table_name.'.json';
			if (!file_exists($pathFileTranslation))  {
				$this->table_translation_columns = array_column($this->_findColumnsTranslation(), 'name');
				$this->_SaveFileJson($this->table_translation_columns, 'table_translation_columns_'.$this->table_name);
			}else{
				$recoveredData = file_get_contents($pathFileTranslation);
				$Data_columns = unserialize($recoveredData);
				$this->table_translation_columns = $Data_columns['data'];
			}
		}
	}

	public function _SaveFileJson($data, $filename) {

		$this->load->helper('file');
		$array = array('data'=>$data,'debug'=>'' ,'date_create'=>date('Y-m-d_H:i:s'));
		$serializedData = serialize($array);
		write_file('assets/temp/json/'.$filename.'.json', $serializedData);

	}

	private function _findTable($table_name = null) {
		if (empty($table_name)) {
			$table_name = $this->table_name;
		}
		$table = $this->db->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLES.TABLE_NAME = '" . $table_name . "'")->row_array();

		return $table;
	}

	private function _findColumns() {

		$this->db->select('COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH');
		$this->db->from('INFORMATION_SCHEMA.COLUMNS');
		$this->db->where('TABLE_SCHEMA', $this->database_name);
		$this->db->where('TABLE_NAME', $this->table_name);
		$columns = $this->db->get()->result_array();
		// echo '<pre>'; print_r($columns); echo '</pre>'; die();
		return $columns;
	}

	public function _setColumnStandard(&$entity, $mode = "INSERT") {
		$user_logined = $this->session->userdata('user_logined');
		$user_id = $user_logined['UserID'];//getUserLogin(); // System or annonymouse;

		// $column_names = array_column($this->table_columns, 'name');

		if ($mode == "INSERT") {
			# code...

			// if (in_array("isActive", $column_names) && !array_key_exists('isActive', $entity)) {
				$entity['isActive'] = 1;
			// }

			// if (in_array("CreatedBy", $column_names) && !array_key_exists('CreatedBy', $entity)) {
				$entity['CreatedBy'] = $user_id;
			// }

			// if (in_array("CreatedDate", $column_names) && !array_key_exists('CreatedDate', $entity)) {
				$entity['CreatedDate'] = get_current_datetime();
			// }

		}

		// if (in_array("UpdatedBy", $column_names) && !array_key_exists('UpdatedBy', $entity)) {
			$entity['UpdatedBy'] = $user_id;
		// }

		// if (in_array("UpdatedDate", $column_names) && !array_key_exists('UpdatedDate', $entity)) {
			$entity['UpdatedDate'] = get_current_datetime();
		// }
	}

	private function _setTranslationPrimaryKey(&$translation, $p, $id = 0, $lang_id = 1) {
		foreach ($this->primary_key as $column_name => $attributes) {
			if (isset($attributes['auto_increment']) && $attributes['auto_increment']) {
				$translation[$column_name] = $id;
			} else {
				$translation[$column_name] = $p[$column_name];
			}
		}
		$translation['LanguageID'] = $lang_id;
	}

	public function insert($entity, $use_trans = true, $lang_id = 1) {
		/* Declare Variable*/
		$insert_id = 0;
		// $translation = array();
		$count = count($this->primary_key);
		// $column_names = array_column($this->table_columns, 'name');
		
		/* Set column standard columns */
		$this->_setColumnStandard($entity);

		/* Remove auto_increment column*/
		// foreach ($this->primary_key as $column_name => $attributes) {
		// 	if (isset($attributes['auto_increment']) && $attributes['auto_increment']) {
		// 		unset($entity[$column_name]);
		// 	}
		// }
		
		// /* Validate and build transalation is have table transaction*/
		// if ($this->is_translation) {
		// 	foreach ($this->table_translation_columns as $key => $columns_name) {
		// 		if (array_key_exists($columns_name, $entity)) {
		// 			$translation[$columns_name] = $entity[$columns_name];
		// 		}
		// 	}
		// }
		
		// /* Validate And Unset Entity When  */
		// foreach ($entity as $key => $value) {
		// 	if (!in_array($key, $column_names)) {
		// 		unset($entity[$key]);
		// 	}
		// }

		/* Save to database */
		if ($use_trans) {
			$this->db->trans_start();
		}

		/* Insert main table*/
		$this->db->insert($this->table_name, $entity);

		$insert_id = $this->db->insert_id();

		/* Insert tranlation table*/
		// if ($this->is_translation && !empty($translation)) {
		// 	/* Assign primary key columns to table translation. */
		// 	$this->_setTranslationPrimaryKey($translation, $entity, $insert_id, $lang_id);

		// 	$this->db->insert($this->table_translation_name, $translation);
		// }

		if ($use_trans) {
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				return false;
			} else {
				$this->db->trans_commit();
				if ($count > 1) {
					return true;
				} else {
					return $insert_id;
				}
			}
		}
		return $insert_id;
	}

	public function update($entity, $key, $langID = null, $use_trans = true) {
		if (!isset($langID)) {
			$langID = $this->default_language;
		}
		/* Declare variables*/
		// $translation = array();
		// $table_condition = array();
		// $translation_condition = array();

		/*Build condition primary key*/
		// $table_condition = $this->_getTableCondition($entity, true);

		/* Set columns standard*/
		$this->_setColumnStandard($entity, 'UPDATE');

		/* Validate and build transalation is have table transaction*/
		// if ($this->is_translation) {
		// 	$translation_condition = $table_condition + array('LanguageID' => $langID);
		// 	$exists_translation = $this->db->get_where($this->table_translation_name, $translation_condition)->row_array();

		// 	foreach ($this->table_translation_columns as $key => $columns_name) {
		// 		if (array_key_exists($columns_name, $entity)) {
		// 			$translation[$columns_name] = $entity[$columns_name];
		// 			unset($entity[$columns_name]);
		// 		}
		// 	}
		// }
		// echo '<pre>'; print_r($key); echo '</pre>'; die();
		/* Save to database */
		if ($use_trans) {
			$this->db->trans_start();
		}
		
		/* Update main table*/
		if (!empty($entity)) {
			$result = $this->db->update($this->table_name, $entity, $key);
		}

		/* Update tranlation table*/
		// if ($this->is_translation && !empty($translation)) {
		// 	/* Insert translation if doesn't or update*/
		// 	if (empty($exists_translation)) {
		// 		/* Assign primary key columns to table translation. */
		// 		$this->db->insert($this->table_translation_name, $translation_condition + $translation);
		// 	} else {
		// 		$this->db->update($this->table_translation_name, $translation, $translation_condition);
		// 	}
		// }

		if ($use_trans) {
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				return false;
			} else {
				$this->db->trans_commit();
				return true;
			}
		}

		return true;
	}

	public function delete($entity, $use_trans = true) {
		/* Declare variables*/
		// $table_condition = array();
		// $translation_condition = array();

		/* Build table condition*/
		// $table_condition = $this->_getTableCondition($entity);

		/* Save to database */
		if ($use_trans) {
			$this->db->trans_start();
		}

		/* Update tranlation table*/
		// if ($this->is_translation) {
		// 	/* delete all translation */
		// 	$this->db->delete($this->table_translation_name, $table_condition);
		// }

		/* Delete table cascade*/
		// if (!empty($this->table_delete_cascade)) {
		// 	/* delete all translation */
		// 	foreach($this->table_delete_cascade as $tableDelete) {
		// 		$tbl = $tableDelete . '_model';

		// 		$this->load->model($tbl);

		// 		$primeryKeyName = "";

		// 		foreach ($this->primary_key as $column_name => $attributes) {
		// 			$primeryKeyName = $column_name;
		// 			break;
		// 		}

		// 		$criteria[$primeryKeyName] = $entity[$primeryKeyName];
		// 		$list = $this->$tbl->get_datatables($criteria);

		// 		foreach ($list as &$subData) {
		// 			$subKey = array();

		// 			foreach ($this->$tbl->primary_key as $column_name => $attributes) {
		// 				$subKey[$column_name] = &$subData[$column_name];
		// 				$subKey[$primeryKeyName] = $entity[$primeryKeyName];
		// 			}

		// 			$this->$tbl->delete($subKey);
		// 		}
		// 	}
		// }

		/* Delete main table*/
		$this->db->delete($this->table_name, $entity);

		if ($use_trans) {
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				return false;
			} else {
				$this->db->trans_commit();
				return true;
			}
		}
		return true;
	}

	public function soft_delete($key, $use_trans = true){
		$this->_setColumnStandard($entity, 'UPDATE');

		if ($use_trans) {
			$this->db->trans_start();
		}

		$entity['isActive'] = 0;	
		$result = $this->db->update($this->table_name, $entity, $key);

		if ($use_trans) {
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				return false;
			} else {
				$this->db->trans_commit();
				return true;
			}
		}

		return true;
	}

	public function set_data_format(&$data) {
		foreach ($this->table_columns as $key => $column) {
			switch ($column['system_type_name']) {
				case 'date':
				if (array_key_exists($column['name'], $data)) {
					$data[$column['name']] = convert_to_date($data[$column['name']]);
				}
				break;

				case 'datetime':
				if (array_key_exists($column['name'], $data)) {
					$data[$column['name']] = convert_to_datetime($data[$column['name']]);
				}
				break;
				case 'int':
				case 'decimal':
				if (array_key_exists($column['name'], $data)) {
					$data[$column['name']] = str_replace(',', '', $data[$column['name']]);

					if( $data[$column['name']] == '0' )
					{
						
						$data[$column['name']] = 0;

					}else if (empty($data[$column['name']])) {
						if ($column['is_nullable'] == '1') {
							$data[$column['name']] = null;
						} else {
							$data[$column['name']] = 0;
						}
					}
				}
				break;
				default:
				# code...
				break;
			}
		}
	}

}