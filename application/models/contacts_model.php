<?php 
	class contacts_model extends CI_Model{

		function set(){
			$this->db->set('contact_firstname',$this->input->post('contactFname'));
			$this->db->set('contact_lastname',$this->input->post('contactName'));
			$this->db->set('contact_email',$this->input->post('contactEmail'));
			$this->db->set('contact_subject',$this->input->post('contactSubject'));
			$this->db->set('contact_message',$this->input->post('contactMessage'));
			$this->db->set('contact_datesubmit',date('Y-m-d'));
		}

		function create(){
			$this->set();
			return $this->db->insert('tb_contact');
		}
		function list_data(){
			$this->db->order_by('contact_id');
			$this->db->group_by('contact_id');
			return $this->db->get('tb_contact');
		}

	}
?>