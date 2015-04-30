<?php 
	class contact extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('contacts_model');
		}

		function index(){
			$data['total_contact']=$this->contacts_model->list_data()->num_rows();
			$this->load->view('kt-admin/index',$data);
		}



	}
?>