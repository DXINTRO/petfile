<?php

class Signin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
    }

    public function index() {
        if ($this->session->userdata('user_objectId')) {
            redirect("/user");
        } else if ($this->session->userdata('admin_objectId')) {
            redirect("/admin");
        } else {

            $data['stylesheets'] = array('0' => 'justified-nav.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('layout_navbar', '', true);

            $data['content_body'] = $this->load->view('sign_in', '', true);
            $this->load->view("layout", $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $email = $this->session->userdata('current_email');
        $q = "INSERT INTO audit_trail 
                                    (
                                    `description`,`time`,`type`)
                                    VALUES
                                    (
                                    '" . $this->GETIP() . " Desconectado <br/> Email :" . $email . "',
                                    NOW(),'LOG OUT'); ";
        $f = $this->db->query($q);
        redirect("/");
    }

    public function postSignIn() {
        try {
            $this->load->library('encrypt');
            $email = $this->input->post("userEmail");
            $password = $this->input->post("userPassword");
            $query = $this->db->query("SELECT objectId,user_level,email,first_name from users where password='" . md5($password) . "' AND email='" . $email . "';");
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if ($row->user_level == 1) {
                    $this->session->set_userdata('user_objectId', '' . $row->objectId . '');
                    $this->session->set_userdata('user_level', '' . $row->user_level . '');
                } else if ($row->user_level == 2 || $row->user_level == 3 || $row->user_level == 4 || $row->user_level == 5 || $row->user_level == 6) {
                    $this->session->set_userdata('admin_objectId', '' . $row->objectId . '');
                    $this->session->set_userdata('user_level', '' . $row->user_level . '');
                }
                $this->session->set_userdata('current_name', $row->first_name . '-' . $row->email);
                $this->session->set_userdata('current_email', $row->email);
                $q = "INSERT INTO audit_trail 
                                    (
                                    `description`,`time`,`type`)
                                    VALUES
                                    (
                                    '" . $this->GETIP() . " conectado <br/> Email :" . $row->email . "',
                                    NOW(),'LOG IN'); ";
                $f = $this->db->query($q);

                set_status_header((int) 200);
            } else {
                set_status_header((int) 401);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    private function GETIP() {
        $ipaddress = '';
        if (isset($_SERVER['SERVER_ADDR']))
            $ipaddress = $_SERVER['SERVER_ADDR'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

}
