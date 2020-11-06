<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_model extends MY_Model {

	public $table_name = 'Organization';

	public $primary_key = 'OrganizationID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataAll($criteria){
        $this->db->select('*');
        $this->db->from($this->table_name);
        
        $this->db->order_by('OrganizationCode', 'ASC');

        if(array_key_exists('isActive', $criteria) && !empty($criteria['isActive'])){
			$this->db->where('Organization.isActive', $criteria['isActive']);
        }

        if(array_key_exists('OrganizationLavel', $criteria) && !empty($criteria['OrganizationLavel'])){
			$this->db->where_in('Organization.OrganizationLavel', $criteria['OrganizationLavel']);
        }

        if(array_key_exists('Amphur', $criteria) && !empty($criteria['Amphur'])){
			$this->db->where_in('Organization.AmphurID', $criteria['Amphur']);
        }

		$result = $this->db->get()->result_array();
        return $result; 
    }

}