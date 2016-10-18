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
			$city = $this->input->post("city");
			$contactNo = $this->input->post("contactNo");
			
			$petName = $this->input->post("petName");
			$petSpecies= $this->input->post("petSpecies");
			$petRace = $this->input->post("petRace");
			$petGender =  $this->input->post("petGender");
			$petAge = $this->input->post("petAge");
			$petColor = $this->input->post("petColor");
			$petHistory = $this->input->post("petHistory");
			$petIncome = $this->input->post("petIncome");
			
	

			if($inputEmail){
				$query = $this->db->query("INSERT INTO users VALUES (NULL,'".$username."', '".$inputPassword."', '".$firstName."', '".$lastName."','".$inputEmail."',1,NULL,'".$address."','".$city."','".$contactNo."');");
				$query= $this->db->query("SELECT objectId FROM users WHERE email ='".$inputEmail."'");
				$row = $query->row();
				if ($this->db->affected_rows() > 0)
				{
					$query = $this->db->query("INSERT INTO pets VALUES(NULL,'".$petName."','".$petSpecies."','".$petRace."','".$petGender."','".$petAge."','".$petColor."','".$petHistory."',null, '".$row->objectId."');");
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