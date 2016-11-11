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

		public function constant_physiological(){

			$this->load->library('encrypt');
			
  			//$objectId = $this->input->post("");
  			$petWeight = $this->input->post("petWeight");
  			$petTemperature = $this->input->post("petTemperature");
  			$petHeartRate = $this->input->post("petHeartRate");
  			$petBreathingFrecuency = $this->input->post("petBreathingFrecuency");
  			$petMucous = $this->input->post("petMucous");
  			$petSkinTurgor = $this->input->post("petSkinTurgor");
  			$petPulse = $this->input->post("petPulse");
  			$petOther = $this->input->post("petOther");
  			$petAnamnesis = $this->input->post("petAnamnesis");
  			$petDiseasesProcedures = $this->input->post("petDiseasesProcedures");
  			$petHistoryId = $this->input->post("petHistoryId");

			if($inputEmail){
				$query = $this->db->query("INSERT INTO constant_physiological VALUES (NULL,'".$petWeight."', '".$petTemperature."', '".$petHeartRate."', '".$petBreathingFrecuency."','".$petMucous."','".$petSkinTurgor."','".$petPulse."','".$petOther."','".$petAnamnesis."','".$petDiseasesProcedures."',NULL);");
				$query= $this->db->query("SELECT petHistoryId FROM constant_physiological WHERE objectId ='".$inputEmail."'");
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