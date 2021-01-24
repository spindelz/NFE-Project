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

        $this->db->where('Organization.isActive', 1);

        if(array_key_exists('OrganizationLavel', $criteria) && !empty($criteria['OrganizationLavel'])){
			$this->db->where_in('Organization.OrganizationLavel', $criteria['OrganizationLavel']);
        }

        if(array_key_exists('Amphur', $criteria) && !empty($criteria['Amphur'])){
			$this->db->where_in('Organization.AmphurID', $criteria['Amphur']);
        }

        $this->db->order_by('OrganizationCode', 'ASC');

		$result = $this->db->get()->result_array();
        return $result; 
    }

    public function getOrganizationCode($OrganizationID){
        $this->db->select('OrganizationCode');
        $this->db->from($this->table_name);
        $this->db->where('OrganizationID', $OrganizationID);

        $result = $this->db->get()->row_array();
        return $result; 
    }

}