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

		public function historypet(){

			$this->load->library('encrypt');
			
  			$petVacunation = $this->input->post("petVacunation");
 			$petDeworning = $this->input-post("petDeworning");
  			$petDiet = $this->input->post("petDiet");
			$petProduct =$this->input->post("petProduct");
			$petDate = $this->input->post("petDate");
  			$petReproductiveStatus = $this->input->post("petReproductiveStatus");
  			$petProvenance = $this->input->post("petProvenance");
  			$petRural = $this->input->post("petRural");
  			$petUrban = $this->input->post("petUrban");
  			

			if($inputEmail){
				$query = $this->db->query("INSERT INTO users VALUES (NULL,'".$username."', '".$inputPassword."', '".$firstName."', '".$lastName."','".$inputEmail."',1,NULL,'".$address."','".$city."','".$contactNo."');");
				$query= $this->db->query("SELECT objectId FROM users WHERE email ='".$inputEmail."'");
				$row = $query->row();
				if ($this->db->affected_rows() > 0)
				{
					$query = $this->db->query("INSERT INTO pets VALUES(NULL,'".$petName."','".$petSpecies."','".$petRace."','".$petGender."','".$petAge."','".$petColor."','".$petHistory."', '".$row->objectId."');");
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