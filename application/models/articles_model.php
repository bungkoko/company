<?php 
 	class articles_model extends CI_Model{
 	
 		function set(){
 			$this->db->set('articles_subject',$this->input->post('articles_subject'));
 			
 			$this->db->set('articles_date',date('Y-m-d'));
 			$this->db->set('articles_modified_date',date('Y-m-d'));
 			$this->db->set('articles_post',$this->input->post('articles_post'));
 			$this->db->set('articles_status',$this->input->post('articles_status'));
 			$this->db->set('tb_admin_admin_id',$this->session->userdata('user_id'));
 		}

 		function create(){
 			$this->set();
 			$this->db->set('articles_subject_slug',$this->create_slug());
 			return $this->db->insert('tb_article');
 		}

 		function slug($title) {
			return strtolower(url_title($title));
		}

		function create_slug($type="insert", $id="") {
			$slug = $this->slug($this->input->post('articles_subject'));		

			$this->db->where('articles_subject_slug',$slug);		

			if($type=="update"):
				$this->db->where('articles_id !=',$id);
			endif;

			$result = $this->db->get('tb_article')->num_rows();
			
			if ($result > 0 ):
				$suffix = 2;
				do {
					$alt_slug = $slug.'-'.$suffix;
					$this->db->where('articles_subject_slug',$alt_slug);
					$alt_result = $this->db->get('tb_article')->num_rows();
					$suffix++;
				} while($alt_result > 0);

				return $alt_slug;
			endif;
			
			return $slug;
		}

		function list_data($num='', $offset=''){
			$this->db->join('tb_admin','tb_admin.admin_id=tb_article.tb_admin_admin_id');
			$this->db->order_by('articles_id','desc');
			$this->db->limit($num,$offset);
			return $this->db->get('tb_article');
		}

		function delete_data($id){
			$this->db->where('articles_id',$id);
			return $this->db->delete('tb_article');
		}

		function update($id) {
			$this->set();
			$this->db->set('articles_subject_slug', $this->create_slug('update', $id));
			$this->db->set('articles_modified_date',date('Y-m-d'));
			//$this->db->set('content_modified', date('Y-m-d H:i:s'));
			$this->db->where('articles_id', $id);
			$this->db->update('tb_article');
		}

		/*function update(){
			$this->db->set('articles')
		}*/
		function get($id){
			$this->db->where('articles_id',$id);
			return $this->db->get('tb_article')->row();
		}

 	}
?>