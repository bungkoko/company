<?php
	class portfolio_model extends CI_Model{

		function set(){
			$this->db->set('portfolio_subject',$this->input->post('portfolio_subject'));
			$this->db->set('portfolio_description',$this->input->post('portfolio_description'));
			$this->db->set('portfolio_start',$this->input->post('portfolio_start'));
			$this->db->set('portfolio_finish',$this->input->post('portfolio_finish'));
			$this->db->set('tb_service_service_id',$this->input->post('tb_service_service_id'));
		} 

		function create($image_path){
			$this->set();
			$this->db->set('portfolio_image',$this->config->item('upload_path_portfolio').$image_path);
			return $this->db->insert('tb_portfolio');
		}

		function list_portfolio($num='',$offset=''){
			$this->db->join('tb_service','tb_service.service_id=tb_portfolio.tb_service_service_id');
			$this->db->order_by('portfolio_id','asc');
			$this->db->limit($num,$offset);
			return $this->db->get('tb_portfolio');
		}

		function delete($id){
			$this->db->where('portfolio_id',$id);
			return $this->db->delete('tb_portfolio');
		}
	}
?>