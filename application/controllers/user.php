<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
    }

    public function index() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');
            $checkActiveReservation = $this->db->query("SELECT * from users_reservation
					WHERE userId='" . $userId . "' 
					AND confirmed = 2;");
            $num = $checkActiveReservation->num_rows();
            if ($num > 1) {
                $servicesData['activeReservation'] = "true";
            } else {
                $servicesData['activeReservation'] = "false";
            }

            $query = $this->db->query("SELECT * FROM services;");
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('user_navbar', '', true);

            $doctorsData['list_of_doctors'] = $this->getAllDoctors();
            $servicesData['services'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_homepage', $servicesData, true);
            $data['content_body'] = $this->load->view('user_homepage', $doctorsData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function getAllDoctors() {
        if ($this->session->userdata('user_objectId')) {
            $query = $this->db->query("SELECT * FROM doctors;");
            return $query->result_array();
        }
    }

    public function searchUserServices() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');
            $checkActiveReservation = $this->db->query("SELECT * from users_reservation
					WHERE userId='" . $userId . "' 
					AND confirmed = 2;");
            $num = $checkActiveReservation->num_rows();
            if ($num > 1) {
                $servicesData['activeReservation'] = "true";
            } else {
                $servicesData['activeReservation'] = "false";
            }

            $inputEmail = $this->input->post('userEmailSearch');
            $servicesort = $this->input->post('serviceSort');

            $query = $this->db->query("SELECT * FROM services WHERE service_name LIKE '%" . $inputEmail . "%' AND `group` LIKE '%" . $servicesort . "%';");
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('user_navbar', '', true);

            $servicesData['services'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_homepage', $servicesData, true);


            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function signIn() {
        
    }

    public function postSignIn() {
        try {

            $this->load->library('encrypt');
            $email = $this->input->post("userEmail");
            $password = $this->input->post("userPassword");
            $query = $this->db->query("SELECT objectId,user_level,email from users where password='" . md5($password) . "' AND email='" . $email . "';");
            echo "SELECT objectId,user_level,email from users where password='" . md5($password) . "' AND email='" . $email . "';";
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if ($row->user_level == 1) {
                    $this->session->set_userdata('user_objectId', '' . $row->objectId . '');
                    $this->session->set_userdata('user_level', '' . $row->user_level . '');
                } else if ($row->user_level == 2 || $row->user_level == 3 || $row->user_level == 4 || $row->user_level == 5 || $row->user_level == 6) {
                    $this->session->set_userdata('admin_objectId', '' . $row->objectId . '');
                    $this->session->set_userdata('user_level', '' . $row->user_level . '');
                }
                $auditLog = $this->db->query("INSERT INTO audit_trail 
                                            (`objectId`,
                                            `description`,
                                            `time`,
                                            `type`)
                                            VALUES
                                            (NULL,
                                            '" . $_SERVER['REMOTE_ADDR'] . " logged in. <br/> Email :" . $row->email . "',
                                            NULL,
                                            'LOG IN'
                                            );
                                            ");

                set_status_header((int) 200);
            } else {
                set_status_header((int) 401);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function checkReservationAvailable() {

        $reserveDate = $this->input->post("reserveDate");
        $reserveTime = $this->input->post("reserveTime");
        $reserveDateTime = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', '' . $reserveDate . ' ' . $reserveTime . '')));
        $serviceId = $this->input->post("serviceId");
        $doctorsId = $this->input->post("doctorsId");

        $query = $this->db->query("SELECT * from users_reservation 
					where reserveDateTime='" . $reserveDateTime . "' 
					AND serviceId='" . $serviceId . "' and doctorsId=" . $doctorsId . ";");

        if ($this->db->affected_rows() > 0) {
            set_status_header((int) 500);
        } else {
            set_status_header((int) 200);
        }
    }

    public function getPetName() {
        if ($this->session->userdata('user_objectId')) {
            $userId = $this->session->userdata('user_objectId');
            $queryPet = $this->db->query("SELECT * from pets where userId='" . $userId . "'");
            if ($queryPet->num_rows() > 0) {
                $pet = $queryPet->row();
                $this->output->append_output($pet->petName);
            } else {
                $this->output->append_output("");
            }
        }
    }

    public function addReservation() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');
            $checkActiveReservation = $this->db->query("SELECT * from users_reservation
					WHERE userId='" . $userId . "' 
					AND confirmed = 2;");
            $num = $checkActiveReservation->num_rows();
            if ($num > 1) {
                $servicesData['activeReservation'] = "true";
            } else {
                $servicesData['activeReservation'] = "false";
            }

            $reserveDate = $this->input->post("reserveDate");
            $reserveTime = $this->input->post("reserveTime");
            $reserveDateTime = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', '' . $reserveDate . ' ' . $reserveTime . '')));
            $serviceId = $this->input->post("serviceId");
            $userId = $this->session->userdata('user_objectId');
            $doctorsId = $this->input->post("doctorsId");

            $query = $this->db->query("INSERT INTO 
					 users_reservation(objectId,
						serviceId,
						userId,
						reserveDate,
						reserveTime,
						reserveDateTime,
						confirmed,
						doctorsId,
						timestamp)
					VALUES (NULL,'" . $serviceId . "',
						'" . $userId . "',
						'" . $reserveDate . "',
						'" . $reserveTime . "',
						'" . $reserveDateTime . "',2," . $doctorsId . ",
						NULL);");

            if ($this->db->affected_rows() > 0) {
                $auditLog = $this->db->query("INSERT INTO audit_trail 
										(`objectId`,
										`description`,
										`time`,
										`type`)
										VALUES
										(NULL,
										'User " . $this->session->userdata('user_objectId') . " added reservation. Reservation ID: " . $this->db->insert_id() . "',
										NULL,
										'ADD RESERVATION'
										);
										");
                set_status_header((int) 200);
            } else {
                set_status_header((int) 500);
            }
        }
    }

    public function updateReservation() {
        if ($this->session->userdata('user_objectId')) {
            $reserveDate = $this->input->post("reserveDate");
            $reserveTime = $this->input->post("reserveTime");
            $reserveDateTime = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', '' . $reserveDate . ' ' . $reserveTime . '')));
            $serviceId = $this->input->post("serviceId");
            $userId = $this->session->userdata('user_objectId');
            $doctorsId = $this->input->post("doctorsId");

            $query = $this->db->query("UPDATE  users_reservation 
					SET  reserveDate= '" . $reserveDate . "',
					reserveTime='" . $reserveTime . "',
					reserveDateTime='" . $reserveDateTime . "', doctorsId=" . $doctorsId . "   
					WHERE users_reservation.objectId =" . $serviceId . ";");

            if ($this->db->affected_rows() > 0) {
                $auditLog = $this->db->query("INSERT INTO audit_trail 
                                (`objectId`,
                                `description`,
                                `time`,
                                `type`)
                                VALUES
                                (NULL,
                                'User " . $this->session->userdata('user_objectId') . " updated a reservation. Reservation ID: " . $serviceId . "',
                                NULL,
                                'UPDATE RESERVATION'
                                );
                                ");
                set_status_header((int) 200);
            } else {
                set_status_header((int) 500);
            }
        }
    }

    public function printForUser() {
        $this->load->helper(array('dompdf', 'file'));
        $registrationId = $this->input->post('registrationId');
        $query = $this->db->query("SELECT * from users_reservation ur 
					INNER JOIN users us ON us.objectId = ur.userId 
					INNER JOIN services serv ON ur.serviceId = serv.objectId 
					WHERE ur.objectId='" . $registrationId . "';");

        $servicesData['reservations'] = $query->result_array();


        $html = $this->load->view('admin_reservation_receipt', $servicesData, true);
        pdf_create($html, 'reservation_receipt');
    }

    public function deleteReservation() {
        if ($this->session->userdata('user_objectId')) {
            $serviceId = $this->input->post("serviceId");

            $query = $this->db->query("DELETE FROM users_reservation WHERE users_reservation.objectId = " . $serviceId . ";");

            if ($this->db->affected_rows() > 0) {
                $auditLog = $this->db->query("INSERT INTO audit_trail 
                                            (`objectId`,
                                            `description`,
                                            `time`,
                                            `type`)
                                            VALUES
                                            (NULL,
                                            'User " . $this->session->userdata('user_objectId') . " deleted a reservation. Reservation ID: " . $serviceId . "',
                                            NULL,
                                            'DELETE RESERVATION'
                                            );
                                            ");
                set_status_header((int) 200);
            } else {
                set_status_header((int) 500);
            }
        }
    }

    public function manageReservation() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');

            $query = $this->db->query("SELECT ur.objectId as reservationobjectId,
					svs.objectId as serviceObjectId,
					svs.service_name,
					ur.reserveDate,
					ur.reserveTime,
					ur.confirmed,
					svs.price, ur.doctorsId 
					FROM users_reservation ur 
					INNER JOIN services svs 
					ON ur.serviceId = svs.objectId  
					WHERE ur.userId='" . $userId . "' 
					ORDER BY ur.reserveDateTime DESC;");

            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('user_navbar', '', true);

            $servicesData['list_of_reservations'] = $query->result_array();
            $doctorsData['list_of_doctors'] = $this->getAllDoctors();
            $data['content_body'] = $this->load->view('user_manage_reservation', $doctorsData, true);
            $data['content_body'] = $this->load->view('user_manage_reservation', $servicesData, true);


            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    // public function sortProduct(){
    // 	if($this->session->userdata('user_objectId')){
    // 		$userId = $this->session->userdata('user_objectId');
    // 		$sortType = $this->input->post('productType');
    // 		$checkActiveorders = $this->db->query("SELECT * from users_order 
    // 			WHERE usersId='".$userId."' 
    // 			AND batchOrderId IS NOT NULL 
    // 			AND active=1;");
    // 		$servicesData['activeOrder'] ="false";
    // 		if ($checkActiveorders->num_rows() > 0)
    // 		{
    // 			$servicesData['activeOrder'] ="true";
    // 		}
    // 		$query = $this->db->query("SELECT * from products where product_type like '%".$sortType."' LIMIT 0 , 2000;");	
    // 		$data['stylesheets'] =array('jumbotron-narrow.css');
    // 		$data['show_navbar'] ="true";
    // 		$data['content_navbar'] = $this->load->view('user_navbar','',true);
    // 		$servicesData['list_of_poducts'] = $query->result_array();
    // 		$data['content_body'] = $this->load->view('user_order',$servicesData,true);
    // 		$this->load->view("layout",$data);
    // 	}else{
    // 		redirect("/");
    // 	}
    // }

    public function order() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');


            $checkActiveorders = $this->db->query("SELECT * from users_order 
					WHERE usersId='" . $userId . "' 
					AND batchOrderId IS NOT NULL 
					AND active=1;");

            $servicesData['activeOrder'] = "false";
            if ($checkActiveorders->num_rows() > 0) {
                $servicesData['activeOrder'] = "true";
            }

            $query = $this->db->query("SELECT * from products LIMIT 0 , 2000;");

            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('user_navbar', '', true);

            $servicesData['list_of_poducts'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_order', $servicesData, true);


            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function searchorder() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');


            $checkActiveorders = $this->db->query("SELECT * from users_order 
					WHERE usersId='" . $userId . "' 
					AND batchOrderId IS NOT NULL 
					AND active=1;");

            $servicesData['activeOrder'] = "false";
            if ($checkActiveorders->num_rows() > 0) {
                $servicesData['activeOrder'] = "true";
            }
            $inputEmail = $this->input->post('userEmailSearch');
            $categorysort = $this->input->post('userSort');
/////// gojo
            $query = $this->db->query("SELECT * from products WHERE product_name LIKE '%" . $inputEmail . "%' AND product_type LIKE '%" . $categorysort . "%' LIMIT 0 , 2000;");

            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('user_navbar', '', true);

            $servicesData['list_of_poducts'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_order', $servicesData, true);


            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function addOrder() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');
            $productId = $this->input->post('productId');
            $productAmount = $this->input->post('productAmount');
            $totalPrice = $this->input->post('totalPrice');
            date_default_timezone_set('Asia/Manila');
            $orderDate = $dateToday = date('Y-m-d H:i:s');

            $query = $this->db->query("INSERT INTO users_order  
					VALUES (NULL,
						'" . $productId . "',
						'" . $userId . "',
						'" . $productAmount . "',
						'" . $totalPrice . "',
						'" . $orderDate . "',
						NULL,1,NULL,NULL);");

            $newOrderID = $this->db->insert_id();

            $updateProduct = $this->db->simple_query("UPDATE products set product_quantity = (CASE WHEN ((product_quantity - " . $productAmount . ") < 0) THEN product_quantity ELSE (product_quantity - " . $productAmount . ") END) WHERE objectId='" . $productId . "';");

            if ($this->db->affected_rows() > 0 && updateProduct) {
                $auditLog = $this->db->query("INSERT INTO audit_trail 
                                            (`objectId`,
                                            `description`,
                                            `time`,
                                            `type`)
                                            VALUES
                                            (NULL,
                                            'User " . $this->session->userdata('user_objectId') . " added a order to cart. Order ID: " . $newOrderID . "',
                                            NULL,
                                            'ADD ORDER TO CART'
                                            );
										");
                set_status_header((int) 200);
            } else {
                set_status_header((int) 500);
            }
        } else {
            redirect("/");
        }
    }

    public function updateOrder() {
        if ($this->session->userdata('user_objectId')) {

            $orderObjectId = $this->input->post("orderObjectId");
            $newAmount = $this->input->post("newAmount");
            $newTotalPrice = $this->input->post("newTotalPrice");
            $incremental = $this->input->post("incremental");
            $productId = $this->input->post("productId");
            $userId = $this->session->userdata('user_objectId');

            $query = $this->db->query("UPDATE  users_order SET  productAmount= '" . $newAmount . "',totalPrice='" . $newTotalPrice . "' WHERE users_order.objectId =" . $orderObjectId . ";");
            $updateProduct = $this->db->simple_query("UPDATE products set 
					product_quantity = (product_quantity + " . $incremental . ") 
					WHERE objectId='" . $productId . "';");



            if ($this->db->affected_rows() > 0) {
                $auditLog = $this->db->query("INSERT INTO audit_trail 
										(`objectId`,
										`description`,
										`time`,
										`type`)
										VALUES
										(NULL,
										'User " . $this->session->userdata('user_objectId') . " updated a order. Order ID: " . $orderObjectId . "',
										NULL,
										'UPDATED ORDER'
										);
										");
                set_status_header((int) 200);
            } else {
                set_status_header((int) 500);
            }
        }
    }

    public function deleteUserOrder() {
        if ($this->session->userdata('user_objectId')) {

            $orderObjectid = $this->input->post("orderObjectId");
            $incremental = $this->input->post("incremental");
            $productId = $this->input->post("productId");

            $query = $this->db->query("DELETE FROM users_order WHERE users_order.objectId = " . $orderObjectid . ";");
            $updateProduct = $this->db->simple_query("UPDATE products set 
					product_quantity = (product_quantity + " . $incremental . ") 
					WHERE objectId='" . $productId . "';");

            if ($this->db->affected_rows() > 0) {
                $auditLog = $this->db->query("INSERT INTO audit_trail 
										(`objectId`,
										`description`,
										`time`,
										`type`)
										VALUES
										(NULL,
										'User " . $this->session->userdata('user_objectId') . " deleted a order. Order ID: " . $orderObjectid . "',
										NULL,
										'DELETED ORDER'
										);
										");
                set_status_header((int) 200);
            } else {
                set_status_header((int) 500);
            }
        }
    }

    public function payOrder() {
        if ($this->session->userdata('user_objectId')) {

            $batchId = $this->input->post("batchId");
            $remitId = $this->input->post("remitId");
            $trackingNo = $this->input->post("trackingNo");

            $updateOrder = $this->db->query("UPDATE users_order set trackingNo = '" . $trackingNo . "', center = '" . $remitId . "' WHERE batchOrderId='" . $batchId . "';");
            if ($this->db->affected_rows() > 0) {
                set_status_header((int) 200);
            } else {
                set_status_header((int) 200);
            }
        }
    }

    public function viewCart() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');

            $checkActiveorders = $this->db->query("SELECT * from users_order 
					WHERE usersId='" . $userId . "' 
					AND batchOrderId IS NOT NULL 
					AND active=1;");

            $servicesData['activeOrder'] = "false";
            if ($checkActiveorders->num_rows() > 0) {
                $servicesData['activeOrder'] = "true";
            }
            // $updater = $this->db->query("UPDATE users_order SET active =0 
            // 	WHERE usersId=".$userId." 
            // 	AND orderDate <=  DATE_SUB(NOW(), INTERVAL 1 DAY);");

            $deleter = $this->db->query("DELETE FROM  users_order WHERE usersId=" . $userId . " 
					AND orderDate <=  DATE_SUB(NOW(), INTERVAL 1 DAY) AND active = 1; ");

            $query = $this->db->query("SELECT uo.objectId as orderObjectid, 
					prod.objectId as productObjectId, 
					uo.productAmount, 
					uo.totalPrice, 
					uo.batchOrderId as batchOrderId,
					prod.product_name,
					prod.product_price, 
					(SELECT SUM(uo.totalPrice) from users_order uo 
				 INNER JOIN  products prod ON uo.productId = prod.objectId 
				 WHERE uo.usersId='" . $userId . "' AND uo.active =1 
				 AND uo.orderDate >=  DATE_SUB(NOW(), INTERVAL 1 DAY)) as totalAll 
				 from users_order uo 
				 INNER JOIN  products prod ON uo.productId = prod.objectId 
				 WHERE uo.usersId='" . $userId . "' 
				 AND uo.active=1 AND uo.orderDate >=  DATE_SUB(NOW(), INTERVAL 1 DAY)
				 ORDER BY orderDate DESC 
				 LIMIT 0 , 2000;");


            $servicesData['batchOrderId'] = "false";

            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('user_navbar', '', true);

            $servicesData['list_of_orders'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_viewcart', $servicesData, true);


            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("/");
    }

    public function cancelOrder() {
        if ($this->session->userdata('user_objectId')) {
            $userId = $this->session->userdata('user_objectId');

            $addBatchNumber = $this->db->query("UPDATE users_order SET batchOrderId = NULL,
					trackingNo = NULL, center = NULL 
					WHERE usersId=" . $userId . " 
					AND active=1;");

            if ($this->db->affected_rows() > 0) {
                set_status_header((int) 200);
            } else {
                set_status_header((int) 200);
            }
        }
    }

    public function checkoutOrder() {
        if ($this->session->userdata('user_objectId')) {
            $userId = $this->session->userdata('user_objectId');




            $batchId = $this->db->query("SELECT * from users_order 
					WHERE usersId='" . $userId . "' 
					AND batchOrderId IS NOT NULL GROUP BY batchOrderId");


            $orderBatchNumber = $batchId->num_rows() + 1;

            $addBatchNumber = $this->db->query("UPDATE users_order SET batchOrderId =" . $orderBatchNumber . " 
					WHERE usersId=" . $userId . " 
					AND active=1;");

            if ($this->db->affected_rows() > 0) {
                $auditLog = $this->db->query("INSERT INTO audit_trail
										(`objectId`,
										`description`,
										`time`,
										`type`)
										VALUES
										(NULL,
										'User " . $this->session->userdata('user_objectId') . " checkout cart. Cart ID/Receipt #: " . $orderBatchNumber . "',
										NULL,
										'CHECKOUT CART'
										);
										");
                set_status_header((int) 200);
            } else {
                set_status_header((int) 200);
            }
        }
    }

    public function generateOrderReceipt() {
        if ($this->session->userdata('user_objectId')) {
            $this->load->helper(array('dompdf', 'file'));

            $userId = $this->session->userdata('user_objectId');


            $query = $this->db->query("SELECT uo.objectId as orderObjectid, 
					prod.objectId as productObjectId, 
					ur.first_name,
					ur.last_name,
					uo.productAmount, 
					uo.totalPrice,
					prod.product_name,
					prod.product_price,
					uo.batchOrderId, 
					(SELECT SUM(uo.totalPrice) from users_order uo 
				 WHERE uo.usersId='" . $userId . "' AND uo.batchOrderId IS NOT NULL AND uo.active =1) as totalAll 
				 from users_order uo 
				 INNER JOIN  products prod ON uo.productId = prod.objectId 
				 INNER JOIN  users ur ON uo.usersId = ur.objectId 
				 WHERE uo.usersId='" . $userId . "' 
				 AND uo.batchOrderId IS NOT NULL 
				 AND uo.active =1 
				 ORDER BY orderDate DESC 
				 LIMIT 0 , 2000;");

            $servicesData['list_of_orders'] = $query->result_array();
            $userlevel = $this->session->userdata('user_level');
            $servicesData['reportTitle'] = "Order Slip";


            $html = $this->load->view('user_order_receipt_report', $servicesData, true);

            // $this->output->append_output($html);


            pdf_create($html, 'order_receipt');
        } else {
            redirect("/");
        }
    }

}

?>
