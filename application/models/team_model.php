<?php 
	class team_model extends CI_Model{
		function set(){
			$this->db->set('team_name',$this->input->post('team_name',true));
			$this->db->set('team_description',$this->input->post('team_description',true));

		}

		function create($avatar_image){
			$this->set();
			$this->db->set('team_avatar',$avatar_image);
			return $this->db->insert('tb_team');
		}

		function list_data(){
			$this->db->order_by('team_id');
			$this->db->group_by('team_id');
			//$this->db->limit($num,$offset);
			return $this->db->get('tb_team');
		}
	}
?>