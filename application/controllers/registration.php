<?php
	class Registration extends CI_Controller{
		public function __construct()
		{
		        parent::__construct();
		        // Your own constructor code

		}
		public function index(){
			$data['stylesheets'] =array('0'=>'justified-nav.css');
			$data['show_navbar'] ="true";
			$data['content_navbar'] = $this->load->view('layout_navbar','',true);
			$data['content_body'] = $this->load->view('sign_up','',true);
			$this->load->view("layout",$data);
		}

		public function register(){

			$this->load->library('encrypt');
			$inputEmail = $this->input->post("inputEmail");
			$inputPassword = md5($this->input->post("inputPassword"));
			$username = $this->input->post("username");
			$firstName = $this->input->post("firstName");
			$lastName = $this->input->post("lastName");
			$address = $this->input->post("address");
			$contactNo = $this->input->post("contactNo");
			$petName = $this->input->post("petName");
			$petType = $this->input->post("petType");
			$petGender =  $this->input->post("petGender");
			$petHistory = $this->input->post("petHistory");

			if($inputEmail){
				$query = $this->db->query("INSERT INTO users VALUES (NULL,'".$username."', '".$inputPassword."', '".$firstName."', '".$lastName."','".$inputEmail."',1,NULL,'".$address."','".$contactNo."');");
				$query= $this->db->query("SELECT objectId FROM users WHERE email ='".$inputEmail."'");
				$row = $query->row();
				if ($this->db->affected_rows() > 0)
				{
					$query = $this->db->query("INSERT INTO pets VALUES(NULL,'".$petName."','".$petType."','".$petGender."','".$petHistory."', '".$row->objectId."');");
					set_status_header((int)200);
				}else{
					set_status_header((int)400);
				}				
			}else{
				set_status_header((int)400);
			}
		}
	}
?>