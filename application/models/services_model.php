<?php 
	class services_model extends CI_Model{
		
		function set(){
			$this->db->set('service_name',$this->input->post('service_name',true));
			$this->db->set('service_description',$this->input->post('service_description',true));
		}

		function create(){
			$this->set();
			return $this->db->insert('tb_service');
		}
		function list_data($num='', $offset=''){
			$this->db->order_by('service_id','desc');
			$this->db->limit($num,$offset);
			return $this->db->get('tb_service');
		}

		function all_service(){
			$this->db->order_by('service_id','asc');
			//$this->db->limit($num,$offset);
			return $this->db->get('tb_service');
		}

		function delete_data($id){
			$this->db->where('service_id',$id);
			return $this->db->delete('tb_service');
		}
	}
?>