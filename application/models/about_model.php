<?php 
	class about_model extends CI_Model{
		function set(){
			$this->db->set('about_subject',$this->input->post('about_subject'));
			$this->db->set('about_description',$this->input->post('about_description'));
		}

		function create(){
			$this->set();
			return $this->db->insert('tb_about');
		}

		function list_data($num='',$offset=''){
			$this->db->order_by('about_id','asc');
			$this->db->limit($num,$offset);
			return $this->db->get('tb_about');
		}

		function delete($id){
			$this->db->where('about_id',$id);
			return $this->db->delete('tb_about');
		}

		function update($id){
			$this->set();
			$this->db->where('about_id',$id);
			return $this->db->update('tb_about');
		}
	}
?>