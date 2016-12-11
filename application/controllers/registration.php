<?php

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function index() {
        $data['stylesheets'] = array('0' => 'justified-nav.css');
        $data['show_navbar'] = "true";
        $data['content_navbar'] = $this->load->view('layout_navbar', '', true);
        $data['content_body'] = $this->load->view('sign_up', '', true);
        $this->load->view("layout", $data);
    }

    public function register() {
        $this->load->library('encrypt');
        $inputRut = $this->input->post("inputRut");
       $inputEmail = $this->input->post("inputEmail");
        $inputPassword = md5($this->input->post("inputPassword"));
        $username = $this->input->post("username");
        $firstName = $this->input->post("firstName");
        $lastName = $this->input->post("lastName");
        $userLevel = 1;
        $address = $this->input->post("address");
        $city = $this->input->post("city");
        $contactNo = $this->input->post("contactNo");

        $petName = $this->input->post("petName");
        $petSpecies = $this->input->post("petSpecies");
        $petRace = $this->input->post("petRace");
        $petGender = $this->input->post("petGender");
        $petAge = $this->input->post("petAge");
        $petColor = $this->input->post("petColor");
        $petHistory = $this->input->post("petHistory");
        if (filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
            $FVAD = "INSERT INTO `users`
                    (
                    `user_rut`,
                    `username`,
                    `password`,
                    `first_name`,
                    `last_name`,
                    `email`,
                    `user_level`,
                    `createdAt`,
                    `address`,
                    `city`,
                    `contactNo`,
                    `activo`)
                    VALUES
                    (
                    '" . $inputRut . "',
                    '" . $username . "',
                    '" . $inputPassword . "',
                    '" . $firstName . "',
                    '" . $lastName . "',
                    '" . $inputEmail . "',
                    '" . $userLevel . "',
                    NOW(),
                    '" . $address . "',
                    '" . $city . "',
                    '" . $contactNo . "',
                    1);
                    ";

            $this->db->query($FVAD);
            if ($this->db->affected_rows() > 0) {
                if ($userLevel == 1) {
                    $queryEmail = $this->db->query("SELECT objectId FROM users WHERE email ='" . $inputEmail . "'");
                    $row = $queryEmail->row();
                    $DFGH = "INSERT INTO `pets`
                                (
                                `petName`,
                                `petSpecies`,
                                `petRace`,
                                `petGender`,
                                `petAge`,
                                `petColor`,
                                `petHistory`,
                                `petIncome`,
                                `userId`,
                                `activo`)
                                VALUES
                                (
                                '" . $petName . "',
                                '" . $petSpecies . "',
                                '" . $petRace . "',
                                '" . $petGender . "',
                                '" . $petAge . "',
                                '" . $petColor . "',
                                '" . $petHistory . "',
                                now(),
                                '" . $row->objectId . "',
                                1);";
                    $this->db->query($DFGH);
                    if ($this->db->affected_rows() > 0) {
                        set_status_header((int) 200);
                    } else {
                        set_status_header((int) 400);
                    }
                } else {
                    set_status_header((int) 200);
                }
            } else {
                set_status_header((int) 400);
            }
        } else {
            set_status_header((int) 400);
        }
    }

}

?>