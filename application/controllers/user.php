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
            $query = $this->db->query("SELECT * FROM services WHERE `services`.`group` = 'BASICO'");
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['content_navbar'] = $this->load->view('user_navbar', $navbarData, true);

            $servicesData['list_of_doctors'] = $this->getAllDoctors();
            $servicesData['list_of_Pets'] = $this->getAllPets();
            $servicesData['services'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_homepage', $servicesData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function manageReservation() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');
            $q = "SELECT * FROM get_users_reservation
         WHERE userId='" . $userId . "' ORDER BY reserveDateTime DESC;";
            $query = $this->db->query($q);
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['content_navbar'] = $this->load->view('user_navbar', $navbarData, true);
            $servicesData['list_of_doctors'] = $this->getAllDoctors();
            $servicesData['list_of_Pets'] = $this->getAllPets();
            $servicesData['list_of_reservations'] = $query->result_array();
            $data['content_body'] = $this->load->view('user_manage_reservation', $servicesData, true);


            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

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
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['content_navbar'] = $this->load->view('user_navbar', $navbarData, true);

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
            $query = $this->db->query("SELECT * from products WHERE product_name LIKE '%" . $inputEmail . "%' AND product_type LIKE '%" . $categorysort . "%' LIMIT 0 , 2000;");

            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['content_navbar'] = $this->load->view('user_navbar', $navbarData, true);

            $servicesData['list_of_poducts'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_order', $servicesData, true);


            $this->load->view("layout", $data);
        } else {
            redirect("/");
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
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['content_navbar'] = $this->load->view('user_navbar', $navbarData, true);

            $servicesData['services'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_homepage', $servicesData, true);


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

    public function getAllPets() {
        if ($id = $this->session->userdata('user_objectId')) {
            $query = $this->db->query("SELECT * FROM pets where userId ='" . $id . "' and activo=1;");
            return $query->result_array();
        }
    }

    public function checkReservationAvailable() {
        $pk_form = $this->input->post("pk_form");
        $Q = '';
        if (!is_null($pk_form)) {
            $Q = " AND  objectId<>'" . $pk_form . "' ";
        }
        $reserveDate = $this->input->post("reserveDate");
        $reserveTime = $this->input->post("reserveTime");
        $reserveDateTime = $reserveDate . ' ' . $reserveTime;
        //SELECT STR_TO_DATE('16/11/2016 04:00 PM','%d/%m/%Y %h:%i %p');  
        $Id = $this->session->userdata('user_objectId');
        $serviceId = $this->input->post("serviceId");
        $doctorsId = $this->input->post("doctorsId");
        $PetsId = $this->input->post("petsId");

        $Wedf = "SELECT * from users_reservation 
					where reserveDateTime= STR_TO_DATE('" . $reserveDateTime . "','%d/%m/%Y %h:%i %p') 
					AND serviceId='" . $serviceId . "' " . $Q . " and doctorsId=" . $doctorsId . " and pettId='" . $PetsId . "';";
        $f = "SELECT * FROM users_reservation where userId ='" . $Id . "' " . $Q . " and  pettId='" . $PetsId . "';";
        if ($queryPet = $this->db->query($Wedf)) {
            if ($queryPet->num_rows() > 0) {
                set_status_header(500);
            } ELSE {
                if ($fs = $this->db->query($f)) {
                    if ($fs->num_rows() > 1) {
                        set_status_header(203);
                    } else {
                        set_status_header(200);
                    }
                }
            }
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
        if ($userId = $this->session->userdata('user_objectId')) {
            $reserveDate = $this->input->post("reserveDate");
            $reserveTime = $this->input->post("reserveTime");
            $reserveDateTime = $reserveDate . ' ' . $reserveTime;
            //SELECT STR_TO_DATE('16/11/2016 04:00 PM','%d/%m/%Y %h:%i %p');  

            $serviceId = $this->input->post("serviceId");
            $doctorsId = $this->input->post("doctorsId");
            $PetsId = $this->input->post("petsId");


            $query = $this->db->query("INSERT INTO 
					 users_reservation(
						serviceId,
						userId,
						pettId,
						reserveDate,
						reserveTime,
						reserveDateTime,
						confirmed,
						doctorsId,
						timestamp)
					VALUES ('" . $serviceId . "',
						'" . $userId . "',
						'" . $PetsId . "',
						'" . $reserveDate . "',
						'" . $reserveTime . "',
						STR_TO_DATE('" . $reserveDateTime . "','%d/%m/%Y %h:%i %p'),2," . $doctorsId . ",
						NOW());");

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
            $pk_form = $this->input->post("pk_form");
            $reserveDate = $this->input->post("reserveDate");
            $reserveTime = $this->input->post("reserveTime");
            $reserveDateTime = $reserveDate . ' ' . $reserveTime;
            //SELECT STR_TO_DATE('16/11/2016 04:00 PM','%d/%m/%Y %h:%i %p');  

            $serviceId = $this->input->post("serviceId");
            $doctorsId = $this->input->post("doctorsId");
            $PetsId = $this->input->post("petsId");
            $r = "UPDATE `users_reservation` 
                        SET 
                            `serviceId` = '" . $serviceId . "',
                            `pettId` = '" . $PetsId . "',
                            `reserveDate` = '" . $reserveDate . "',
                            `reserveTime` = '" . $reserveTime . "',
                            `reserveDateTime` = STR_TO_DATE('" . $reserveDateTime . "','%d/%m/%Y %h:%i %p'),
                            `confirmed` = '2',
                            `doctorsId` = '" . $doctorsId . "',
                            `timestamp` = now()
                        WHERE
                            `objectId` = '" . $pk_form . "'; ";
            $query = $this->db->query($r);

            if ($this->db->affected_rows() > 0) {
                $auditLog = $this->db->query("INSERT INTO audit_trail 
                                (
                                `description`,
                                `time`,
                                `type`)
                                VALUES
                                (
                                'User " . $this->session->userdata('user_objectId') . " updated a reservation. Reservation ID: " . $serviceId . "',
                                NULL,
                                'UPDATE RESERVATION'
                                );  ");
                set_status_header((int) 200);
            } else {
                set_status_header((int) 500);
            }
        }
    }

    public function getREservation() {
        $userObjectId = $this->input->post("id");
        $query = $this->db->query("SELECT * FROM users_reservation where objectId='" . $userObjectId . "';");
        $data = $query->result();
        echo '{"response":1,"data":' . json_encode($data[0]) . '}';
    }

    public function printForUser() {
        $this->load->helper(array('dompdf', 'file'));
        $registrationId = $this->input->get('id');
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

    public function addOrder() {
        if ($this->session->userdata('user_objectId')) {

            $userId = $this->session->userdata('user_objectId');
            $productId = $this->input->post('productId');
            $productAmount = $this->input->post('productAmount');
            $totalPrice = $this->input->post('totalPrice');
            date_default_timezone_set('America/Santiago');
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
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['content_navbar'] = $this->load->view('user_navbar', $navbarData, true);

            $servicesData['list_of_orders'] = $query->result_array();

            $data['content_body'] = $this->load->view('user_viewcart', $servicesData, true);


            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
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
