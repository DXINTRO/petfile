<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
    }

    private function checkAllowed($notAllowedLevels) {//checkea los permisos del usuario
        $userLevel = $this->session->userdata('user_level');
        if (in_array($userLevel, $notAllowedLevels)) {// si en el array $notAllowedLevels existen los datos del $userLevel return true 
        }
    }

    public function index() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(4);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');

            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);
            $query = $this->db->query("SELECT * FROM users where activo=1");
            $usersData['users'] = $query->result_array();
            $data['content_body'] = $this->load->view('admin_homepage', $usersData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function addProduct() {
        $pname = $this->input->post('productName');
        $pqty = $this->input->post('productQty');
        $pprice = $this->input->post('productPrice');
        $ptype = $this->input->post('productType');

        $query = $this->db->query("INSERT INTO products 
                                (`objectId`,
                                `product_name`,
                                `product_quantity`,
                                `product_price`,
                                `product_type`)
                                VALUES
                                (
                                NULL,
                                '" . $pname . "',
                                " . $pqty . ",
                                " . $pprice . ",
                                '" . $ptype . "'
                                );");

        if ($this->db->affected_rows() > 0) {
            set_status_header((int) 200);
            redirect('/admin/manageproducts');
        } else {
            set_status_header((int) 400);
        }
    }

    public function editProduct() {
        $pname = $this->input->post('productNameEdit');
        $pqty = $this->input->post('productQtyEdit');
        $pprice = $this->input->post('productPriceEdit');
        $ptype = $this->input->post('productTypeEdit');
        $pid = $this->input->post('productIdToEdit');
        $updateActive = $this->db->query("UPDATE products 
                                        SET
                                        `product_name` = '" . $pname . "',
                                        `product_quantity` = " . $pqty . ",
                                        `product_price` = " . $pprice . ",
                                        `product_type` = '" . $ptype . "' 
                                        WHERE objectId='" . $pid . "';");

        redirect("/admin/manageproducts");
    }

    public function deleteProductAdmin() {
        $pid = $this->input->post('objectId');

        $query = $this->db->query("DELETE FROM products WHERE objectId = " . $pid . ";");

        if ($this->db->affected_rows() > 0) {
            set_status_header((int) 200);
            redirect("/admin/manageproducts");
        } else {
            set_status_header((int) 400);
        }
    }

    public function searchUsers() {
        $inputEmail = $this->input->post('userEmailSearch');


        $inputEmail = $this->input->post('userEmailSearch');

        $navbarData['userLevel'] = $this->session->userdata('user_level');

        $data['stylesheets'] = array('jumbotron-narrow.css');
        $data['show_navbar'] = "true";
        $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);
        $query = $this->db->query("SELECT * FROM users where email LIKE '%" . $inputEmail . "%'");
        $usersData['users'] = $query->result_array();

        $data['content_body'] = $this->load->view('admin_homepage', $usersData, true);

        $this->load->view("layout", $data);
    }

    public function backup() {

        // Load the DB utility class
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup = & $this->dbutil->backup();

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('/path/to/mybackup.gz', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('mybackup.gz', $backup);
    }

    public function audit() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);
            $query = $this->db->query("SELECT * FROM audit_trail 
					ORDER BY time DESC;");
            $usersData['audits'] = $query->result_array();

            $data['content_body'] = $this->load->view('admin_audit', $usersData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function manageProducts() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $query = $this->db->query("SELECT * FROM products;");

            $usersData['products'] = $query->result_array();

            $data['content_body'] = $this->load->view('admin_products', $usersData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function searchAdminProducts() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);
            $inputEmail = $this->input->post('userEmailSearch');

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $query = $this->db->query("SELECT * FROM products where product_name LIKE '%" . $inputEmail . "%';");

            $usersData['products'] = $query->result_array();

            $data['content_body'] = $this->load->view('admin_products', $usersData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function billing() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $customer = $this->db->query("SELECT * FROM users WHERE user_level=1;");
            $billingData['customers'] = $customer->result_array();

            $doc = $this->db->query("SELECT * FROM doctors");
            $billingData['docs'] = $doc->result_array();

            $surgery = $this->db->query("SELECT * FROM services WHERE active=3;");
            $billingData['surgerys'] = $surgery->result_array();

            $payment = $this->db->query("SELECT batchOrderId,usersId,active,trackingNo,center from users_order 
						WHERE batchOrderId IS NOT NULL 
						AND trackingNo IS NOT NULL
						GROUP BY batchOrderId 
						ORDER BY orderDate DESC;");
            $billingData['payments'] = $payment->result_array();

            $data['content_body'] = $this->load->view('admin_billing', $billingData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function billingmerge() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $customer = $this->db->query("SELECT * FROM users WHERE user_level=1;");
            $billingData['customers'] = $customer->result_array();

            $doc = $this->db->query("SELECT * FROM doctors");
            $billingData['docs'] = $doc->result_array();

            $surgery = $this->db->query("SELECT * FROM services WHERE active=3;");
            $billingData['surgerys'] = $surgery->result_array();

            $payment = $this->db->query("SELECT batchOrderId,usersId,active,trackingNo,center from users_order 
						WHERE batchOrderId IS NOT NULL 
						AND trackingNo IS NOT NULL
						GROUP BY batchOrderId 
						ORDER BY orderDate DESC;");
            $billingData['payments'] = $payment->result_array();


            $query = $this->db->query("SELECT batchOrderId,usersId,active from users_order 
						WHERE batchOrderId IS NOT NULL
						GROUP BY batchOrderId 
						ORDER BY orderDate DESC;");

            $ordersData['list_of_orders'] = $query->result_array();

            $billingData['order_table'] = $this->load->view('admin_order_table', $ordersData, true);


            $query = $this->db->query("SELECT 
					ur.objectId as reservationobjectId,
					svs.objectId as serviceObjectId,
					u.objectId as usersObjectId,
					u.username,
					u.email,
					u.first_name,
					u.last_name,
					svs.service_name,
					ur.reserveDate,
					ur.reserveTime,
					svs.price,
					ur.confirmed,
					ur.timestamp
					FROM users_reservation ur 
					INNER JOIN services svs ON ur.serviceId = svs.objectId 
					INNER JOIN users u ON ur.userId = u.objectId 
					ORDER BY ur.reserveDateTime DESC;");

            $services = $this->db->query("SELECT * FROM services where active=1;");

            $usersData['reservations'] = $query->result_array();
            $billingData['serviceslist'] = $services->result_array();




            $data['content_body'] = $this->load->view('admin_billing_merge_all', $billingData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function generateBilling() {
        if ($this->session->userdata('admin_objectId')) {
            $this->load->helper(array('dompdf', 'file'));


            $reportMonthFrom = $this->input->post("reportMonthFrom");
            $reportYearFrom = $this->input->post("reportYearFrom");
            $reportDayFrom = $this->input->post("reportDayFrom");
            $reportMonthTo = $this->input->post("reportMonthTo");
            $reportYearTo = $this->input->post("reportYearTo");
            $reportDayTo = $this->input->post("reportDayTo");

            $customerId = $this->input->post("customer");
            $petName = $this->input->post("petName");
            $surgeryId = $this->input->post("surgery");
            $doctorId = $this->input->post("doctor");


            $reportDateFrom = date('d-m-Y', strtotime(str_replace('-', '/', '' . $reportMonthFrom . '/' . $reportDayFrom . '/' . $reportYearFrom . '')));
            $reportDateto = date('d-m-Y', strtotime(str_replace('-', '/', '' . $reportMonthTo . '/' . $reportDayTo . '/' . $reportYearTo . '')));

            $timeDiff = abs(strtotime(str_replace('-', '/', '' . $reportMonthTo . '/' . $reportDayTo . '/' . $reportYearTo . '')) - strtotime(str_replace('-', '/', '' . $reportMonthFrom . '/' . $reportDayFrom . '/' . $reportYearFrom . '')));

            $numDays = ($timeDiff / 86400) + 1;



            $billingData['daysNumber'] = $numDays;
            $billingData['petName'] = $petName;

            $customer = $this->db->query("SELECT * FROM users WHERE objectId='" . $customerId . "';");
            $billingData['customers'] = $customer->result_array();

            $doc = $this->db->query("SELECT * FROM doctors WHERE objectId='" . $doctorId . "';");
            $billingData['docs'] = $doc->result_array();

            $surgery = $this->db->query("SELECT * FROM services WHERE objectId='" . $surgeryId . "';");
            $billingData['surgerys'] = $surgery->result_array();


            $billingData['reportDateFrom'] = $reportDateFrom;
            $billingData['reportDateto'] = $reportDateto;

            $html = $this->load->view('admin_generated_billing', $billingData, true);
            // $this->output->append_output($html);
            pdf_create($html, 'salesReport');
        } else {
            redirect("/");
        }
    }

    public function sales() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            // $query = $this->db->query("SELECT * FROM products;");
            // $usersData['products'] = $query->result_array();

            $data['content_body'] = $this->load->view('admin_sales', '', true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function generateSalesReport() {
        if ($this->session->userdata('admin_objectId')) {
            $this->load->helper(array('dompdf', 'file'));


            $reportMonthFrom = $this->input->post("reportMonthFrom");
            $reportYearFrom = $this->input->post("reportYearFrom");
            $reportMonthTo = $this->input->post("reportMonthTo");
            $reportYearTo = $this->input->post("reportYearTo");
            $reportMode = $this->input->post("reportMode");

            $reportDateFrom = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', '' . $reportMonthFrom . '/01/' . $reportYearFrom . '')));
            $reportDateto = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', '' . $reportMonthTo . '/01/' . $reportYearTo . '')));
            $reportDateto = date_format(date_modify(new DateTime($reportDateto), 'last day of  this month'), 'd-m-Y H:i:s');

            //NEED TO OPTIMIZE :P
            if ($reportMode == "Daily") {
                $query = $this->db->query("SELECT SUM(allSales.gross) as saleGross,allSales.saleDate
											from (
											SELECT SUM(totalPrice)as gross,uo.orderDate as saleDate FROM users_order uo WHERE uo.active=0 GROUP BY day(uo.orderDate)
											UNION ALL
											SELECT SUM(price) as gross, ur.reserveDateTime as saleDate from users_reservation ur INNER JOIN services serv ON serv.objectId = ur.serviceId WHERE ur.confirmed=1 GROUP BY day(ur.reserveDateTime)) as allSales 
											WHERE allSales.saleDate >= '" . $reportDateFrom . "' AND allSales.saleDate <='" . $reportDateto . "' 
											GROUP BY day(allSales.saleDate);");
            } else if ($reportMode == "Weekly") {
                $query = $this->db->query("SELECT SUM(allSales.gross) as saleGross,week(allSales.saleDate) as saleDate, allSales.saleDate as rawSaleDate 
											from (
											SELECT SUM(totalPrice)as gross,uo.orderDate as saleDate FROM users_order uo 
											WHERE uo.orderDate >= '" . $reportDateFrom . "' AND uo.orderDate <='" . $reportDateto . "' 
											AND uo.active=0 GROUP BY week(uo.orderDate)
											UNION ALL
											SELECT SUM(price) as gross, ur.reserveDateTime as saleDate from users_reservation ur INNER JOIN services serv ON serv.objectId = ur.serviceId 
											WHERE ur.reserveDateTime >= '" . $reportDateFrom . "' AND ur.reserveDateTime <='" . $reportDateto . "' 
											AND ur.confirmed=1 GROUP BY week(ur.reserveDateTime)) as allSales 
											GROUP BY week(allSales.saleDate);");
            } else if ($reportMode == "Monthly") {
                $query = $this->db->query("SELECT SUM(allSales.gross) as saleGross,month(allSales.saleDate) as saleDate, allSales.saleDate as rawSaleDate 
											from (
											SELECT SUM(totalPrice)as gross,uo.orderDate as saleDate FROM users_order uo 
											WHERE uo.orderDate >= '" . $reportDateFrom . "' AND uo.orderDate <='" . $reportDateto . "' 
											AND uo.active=0 GROUP BY month(uo.orderDate)
											UNION ALL
											SELECT SUM(price) as gross, ur.reserveDateTime as saleDate from users_reservation ur INNER JOIN services serv ON serv.objectId = ur.serviceId 
											WHERE ur.reserveDateTime >= '" . $reportDateFrom . "' AND ur.reserveDateTime <='" . $reportDateto . "' 
											AND ur.confirmed=1 GROUP BY month(ur.reserveDateTime)) as allSales 
											GROUP BY month(allSales.saleDate);");
            }

            $allItems = $this->db->query("SELECT * from (SELECT uo.orderDate as saleDate, 
											prod.product_name as itemName,
											uo.productAmount as itemQuantity,
											prod.product_price as itemPrice,
											uo.totalPrice as itemTotalPrice,
											WEEK(uo.orderDate) as itemWeek,
											YEAR(uo.orderDate) as itemYear
											FROM users_order uo 
											INNER JOIN products as prod ON uo.productId = prod.objectId
											WHERE uo.orderDate >= '" . $reportDateFrom . "' AND uo.orderDate <='" . $reportDateto . "'
											AND uo.active=0 
												UNION ALL 
													SELECT ur.reserveDateTime as saleDate, 
													serv.service_name as itemName,
													1 as itemQuantity,
													serv.price as itemPrice, 
													serv.price as itemTotalPrice,
													WEEK(ur.reserveDateTime) as itemWeek,
													YEAR(ur.reserveDateTime) as itemYear
													from users_reservation ur 
													INNER JOIN services serv ON serv.objectId = ur.serviceId 
													WHERE ur.reserveDateTime >= '" . $reportDateFrom . "' AND ur.reserveDateTime <='" . $reportDateto . "' 
													AND ur.confirmed=1) allItems
										ORDER by allItems.saleDate ASC;");
            $salesReport['allItems'] = $allItems->result_array();

            $salesReport['sales'] = $query->result_array();
            $salesReport['reportMode'] = $reportMode;



            $salesReport['reportDateFrom'] = $reportDateFrom;
            $salesReport['reportDateto'] = $reportDateto;


            $html = $this->load->view('admin_generated_sales_report', $salesReport, true);
            // $this->output->append_output($html);
            pdf_create($html, 'salesReport');
        } else {
            redirect("/");
        }
    }

    public function userorder() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(4);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $query = $this->db->query("SELECT batchOrderId,usersId,active from users_order 
						WHERE batchOrderId IS NOT NULL
						GROUP BY batchOrderId 
						ORDER BY orderDate DESC;");

            $ordersData['list_of_orders'] = $query->result_array();
            $tableOrder['order_table'] = $this->load->view('admin_order_table', $ordersData, true);


            $data['content_body'] = $this->load->view('admin_order', $tableOrder, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function userorderembed() {


        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(4);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $query = $this->db->query("SELECT batchOrderId,usersId,active from users_order 
						WHERE batchOrderId IS NOT NULL
						GROUP BY batchOrderId 
						ORDER BY orderDate DESC;");

            $ordersData['list_of_orders'] = $query->result_array();
            $tableOrder['order_table'] = $this->load->view('admin_order_table', $ordersData, true);


            $data['content_body'] = $this->load->view('admin_order_embed', $tableOrder, true);

            $this->load->view("layout_embed", $data);
        } else {
            redirect("/");
        }
    }

    public function searchUserOrder() {
        if ($this->session->userdata('admin_objectId')) {
            $inputEmail = $this->input->post('userEmailSearch');


            $userByEmail = $this->db->query("SELECT * FROM users where email='" . $inputEmail . "'");

            if ($userByEmail->num_rows() > 0) {
                $user = $userByEmail->row();

                // $query = $this->db->query("SELECT uo.objectId as orderObjectid, 
                // 	prod.objectId as productObjectId, 
                // 	uo.productAmount, 
                // 	uo.totalPrice, 
                // 	prod.product_name,
                // 	prod.product_price
                //  from vet_app.users_order uo 
                //  INNER JOIN  vet_app.products prod ON uo.productId = prod.objectId 
                //  WHERE uo.usersId='".$user->objectId."' 
                //  ORDER BY uo.orderDate DESC 
                //  LIMIT 0 , 2000;");

                $query = $this->db->query("SELECT batchOrderId,usersId,active from users_order 
						WHERE usersId='" . $user->objectId . "' 
						AND batchOrderId IS NOT NULL
						GROUP BY batchOrderId 
						ORDER BY orderDate DESC;");

                $ordersData['list_of_orders'] = $query->result_array();

                $this->load->view('admin_order_table', $ordersData);
            }
        } else {
            redirect("/");
        }
    }

    public function deleteAdminOrder() {
        if ($this->session->userdata('admin_objectId')) {
            $usersId = $this->input->post('usersId');
            $batchOrderId = $this->input->post('batchOrderId');

            $updateActive = $this->db->query("UPDATE users_order SET active=3,batchOrderId=NULL 
					WHERE usersId=" . $usersId . " AND batchOrderId = " . $batchOrderId . ";");
            if ($this->db->affected_rows() > 0) {
                set_status_header((int) 200);
            } else {
                set_status_header((int) 400);
            }
        } else {
            redirect("/");
        }
    }

    public function processOrder() {
        if ($this->session->userdata('admin_objectId')) {
            $usersId = $this->input->post('usersId');
            $batchOrderId = $this->input->post('batchOrderId');

            $query = $this->db->query("SELECT uo.objectId as orderObjectid, 
						prod.objectId as productObjectId,
						uo.usersId as usersObjectId,
						uo.batchOrderId, 
						uo.productAmount, 
						uo.totalPrice, 
						prod.product_name,
						prod.product_price
					 from users_order uo 
					 INNER JOIN  products prod ON uo.productId = prod.objectId 
					 WHERE uo.usersId='" . $usersId . "' 
					 AND uo.batchOrderId='" . $batchOrderId . "' 
					 ORDER BY uo.orderDate DESC 
					 LIMIT 0 , 2000;");

            $ordersData['list_of_orders'] = $query->result_array();
            $this->load->view('admin_process_order', $ordersData);
        } else {
            redirect("/");
        }
    }

    public function generateOrderReceipt() {
        if ($this->session->userdata('admin_objectId')) {

            $this->load->helper(array('dompdf', 'file'));

            $userId = $this->input->post('usersId');




            $batchId = $this->db->query("SELECT * from users_order 
					WHERE usersId='" . $userId . "' 
					AND batchOrderId IS NOT NULL GROUP BY batchOrderId");


            $batchOrderId = $batchId->num_rows();

            // $this->output->append_output("SELECT * from users_order 
            // WHERE usersId='".$userId."' 
            // AND batchOrderId IS NOT NULL GROUP BY batchOrderId");

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
				 WHERE uo.usersId='" . $userId . "' AND uo.batchOrderId IS NOT NULL) as totalAll 
				 from users_order uo 
				 INNER JOIN  products prod ON uo.productId = prod.objectId 
				 INNER JOIN  users ur ON uo.usersId = ur.objectId 
				 WHERE uo.usersId='" . $userId . "' 
				 AND uo.batchOrderId='" . $batchOrderId . "' 
				 AND uo.batchOrderId IS NOT NULL 
				 ORDER BY orderDate DESC 
				 LIMIT 0 , 2000;");

            $servicesData['list_of_orders'] = $query->result_array();
            $servicesData['reportTitle'] = "Receipt No.";

            $updateActive = $this->db->query("UPDATE users_order SET active=0 
					WHERE usersId=" . $userId . ";");

            $html = $this->load->view('user_order_receipt_report', $servicesData, true);

            // $this->output->append_output($html);

            pdf_create($html, 'order_receipt');
        } else {
            redirect("/");
        }
    }

    public function confirmReservation() {
        if ($this->session->userdata('admin_objectId')) {

            $this->load->helper(array('dompdf', 'file'));


            $registrationId = $this->input->post('registrationId');


            $query = $this->db->query("SELECT * from users_reservation ur 
					INNER JOIN users us ON us.objectId = ur.userId 
					INNER JOIN services serv ON ur.serviceId = serv.objectId 
					WHERE ur.objectId='" . $registrationId . "';");

            $servicesData['reservations'] = $query->result_array();

            $updateActive = $this->db->query("UPDATE users_reservation SET confirmed=1 
					WHERE  objectId='" . $registrationId . "';");

            $html = $this->load->view('admin_reservation_receipt', $servicesData, true);

            // $this->output->append_output($html);

            pdf_create($html, 'reservation_receipt');
        } else {
            redirect("/");
        }
    }

    public function approveReservation() {
        if ($this->session->userdata('admin_objectId')) {



            $registrationId = $this->input->post('registrationId');




            $updateActive = $this->db->query("UPDATE users_reservation SET confirmed=2 
					WHERE  objectId='" . $registrationId . "';");

            redirect("/admin/manageReservation");
        } else {
            redirect("/");
        }
    }

    public function getAllDoctors() {
        if ($this->session->userdata('admin_objectId')) {

            $query = $this->db->query("SELECT * FROM doctors;");
            return $query->result_array();
        }
    }

    public function manageReservation() {
        if ($this->session->userdata('admin_objectId')) {

            $arrayAllowed = array(3);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $query = $this->db->query("SELECT 
					ur.objectId as reservationobjectId,
					svs.objectId as serviceObjectId,
					u.objectId as usersObjectId,
					u.username,
					u.email,
					u.first_name,
					u.last_name,
					svs.service_name,
					ur.reserveDate,
					ur.reserveTime,
					svs.price,
					ur.confirmed,
					ur.timestamp
					FROM users_reservation ur 
					INNER JOIN services svs ON ur.serviceId = svs.objectId 
					INNER JOIN users u ON ur.userId = u.objectId 
					ORDER BY ur.reserveDateTime DESC;");

            $services = $this->db->query("SELECT * FROM services where active=1;");

            $usersData['reservations'] = $query->result_array();
            $usersData['serviceslist'] = $services->result_array();
            $usersData['list_of_doctors'] = $this->getAllDoctors();
            $data['content_body'] = $this->load->view('admin_reservation', $usersData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function manageReservationembed() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3);
            $this->checkAllowed($arrayAllowed);

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $query = $this->db->query("SELECT 
					ur.objectId as reservationobjectId,
					svs.objectId as serviceObjectId,
					u.objectId as usersObjectId,
					u.username,
					u.email,
					u.first_name,
					u.last_name,
					svs.service_name,
					ur.reserveDate,
					ur.reserveTime,
					svs.price,
					ur.confirmed,
					ur.timestamp
					FROM users_reservation ur 
					INNER JOIN services svs ON ur.serviceId = svs.objectId 
					INNER JOIN users u ON ur.userId = u.objectId 
					ORDER BY ur.reserveDateTime DESC;");

            $services = $this->db->query("SELECT * FROM services where active=1;");

            $usersData['reservations'] = $query->result_array();
            $usersData['serviceslist'] = $services->result_array();

            $usersData['list_of_doctors'] = $this->getAllDoctors();

            $data['content_body'] = $this->load->view('admin_reservation_embed', $usersData, true);

            $this->load->view("layout_embed", $data);
        } else {
            redirect("/");
        }
    }

    public function searchAdminReservation() {
        if ($this->session->userdata('admin_objectId')) {

            $arrayAllowed = array(3);
            $this->checkAllowed($arrayAllowed);
            $inputEmail = $this->input->post('userEmailSearch');

            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $query = $this->db->query("SELECT 
					ur.objectId as reservationobjectId,
					svs.objectId as serviceObjectId,
					u.objectId as usersObjectId,
					u.username,
					u.email,
					u.first_name,
					u.last_name,
					svs.service_name,
					ur.reserveDate,
					ur.reserveTime,
					svs.price,
					ur.confirmed,
					ur.timestamp
					FROM users_reservation ur 
					INNER JOIN services svs ON ur.serviceId = svs.objectId 
					INNER JOIN users u ON ur.userId = u.objectId 
					WHERE u.email LIKE '%" . $inputEmail . "%' 
					ORDER BY ur.reserveDateTime DESC;");

            $services = $this->db->query("SELECT * FROM services where active=1;");

            $usersData['reservations'] = $query->result_array();
            $usersData['serviceslist'] = $services->result_array();

            $data['content_body'] = $this->load->view('admin_reservation', $usersData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function deleteAdminReservation() {
        if ($this->session->userdata('admin_objectId')) {
            $serviceId = $this->input->post("reservationObjecId");

            $query = $this->db->query("DELETE FROM users_reservation WHERE users_reservation.objectId = " . $serviceId . ";");

            if ($this->db->affected_rows() > 0) {
                set_status_header((int) 200);
            } else {
                set_status_header((int) 400);
            }
        }
    }

    public function addReservation() {
        $doctorsId = $this->input->post("doctorsId");
        $inputEmail = $this->input->post("reservationUserEmail");
        $reserveDate = $this->input->post("reserveDate");
        $reserveTime = $this->input->post("reserveTime");
        $serviceId = $this->input->post("serviceId");
        //'2012-06-18 10:34:09'
        $reserveDateTime = $reserveDate . ' ' . $reserveTime;
        if ($this->session->userdata('admin_objectId')) {// si existe la seccion has esto 
            //Consutar si la hora esta tomada
            $userByEmail = $this->db->query("SELECT * FROM users where email='" . $inputEmail . "'");
            $user = $userByEmail->row();

            $pokiyt = "INSERT INTO `users_reservation`
                    (
                    `serviceId`,
                    `userId`,
                    `reserveDate`,
                    `reserveTime`,
                    `reserveDateTime`,
                    `confirmed`,
                    `doctorsId`,
                    `timestamp`)
                    VALUES
                    (
                   '" . $serviceId . "',
                    '" . $user->objectId . "',
                   '" . $reserveDate . "',
                   '" . $reserveTime . "',
                   STR_TO_DATE('" . $reserveDateTime . "','%d/%m/%Y %h:%i %p'),
                    2,
                     '" . $doctorsId . "',
                    NOW());";
            if ($this->db->query($pokiyt)) {
                if ($this->db->affected_rows() > 0) {
                    set_status_header((int) 200);
                } else {
                    set_status_header((int) 400);
                }
            }
        }
    }

    public function editReservation() {
        if ($this->session->userdata('admin_objectId')) {
            $reserveDate = $this->input->post("reserveDate");
            $reserveTime = $this->input->post("reserveTime");
            $reserveDateTime = $reserveDate . ' ' . $reserveTime;
            $serviceId = $this->input->post("serviceId");
            $reservationId = $this->input->post("reservationId");

            $inputEmail = $this->input->post("reservationUserEmail");

            $userByEmail = $this->db->query("SELECT * FROM users where email='" . $inputEmail . "'");

            $user = $userByEmail->row();

            $query = $this->db->query("UPDATE users_reservation 
				SET serviceId='" . $serviceId . "',
				userId='" . $user->objectId . "',
				reserveDate='" . $reserveDate . "',
				reserveTime='" . $reserveTime . "',
				reserveDateTime= STR_TO_DATE('" . $reserveDateTime . "','%d/%m/%Y %h:%i %p')
				where objectId ='" . $reservationId . "';");

            if ($this->db->affected_rows() > 0) {
                set_status_header((int) 200);
            } else {
                set_status_header((int) 200);
            }
        }
    }

    public function checkRutExist() {
        $inputRut = $this->input->post("userRutCheck");
        $query = $this->db->query("SELECT  * FROM users where user_rut='" . $inputRut . "'");
        $row = $query->row();
        if (!empty($row)) {
            set_status_header((int) 200);
        } else {
            set_status_header((int) 400);
        }
    }

    public function checkEmailExist() {
        $inputEmail = $this->input->post("userEmailCheck");
        $query = $this->db->query("SELECT  * FROM users where email='" . $inputEmail . "'");
        $row = $query->row();
        if ($query->num_rows() > 0) {
            if ($row->user_level == 1) {
                $queryPet = $this->db->query("SELECT * from pets where userId='" . $row->objectId . "'");
                if ($queryPet->num_rows() > 0) {
                    $pet = $queryPet->row();
                    $this->output->append_output($pet->petName);
                }
            }

            set_status_header((int) 200);
        } else {
            set_status_header((int) 400);
        }
    }

    
    
    public function addService() {
        $serviceName = $this->input->post("serviceName");
        $groupName = $this->input->post("groupName");
        $priceBox = $this->input->post("priceBox");
        $pk_form = $this->input->post("pk_form");
        if ($pk_form == '0' || $pk_form == null) {
            $query = $this->db->query("INSERT INTO `services`
                                        (
                                        `service_name`,
                                        `group`,
                                        `price`,
                                        `active`)
                                        VALUES
                                        (
                                        '" . $serviceName . "',
                                        '" . $groupName . "',
                                        '" . $priceBox . "',
                                        1);");
        } else {
            $query = $this->db->query("UPDATE services set service_name='" . $serviceName . "', `group`='" . $groupName . "', price =" . $priceBox . " where objectId=" . $pk_form . ";");
        }

        if ($this->db->affected_rows() > 0) {
            set_status_header(200);
        } else {
            set_status_header(203);
        }
        $query = $this->db->query("SELECT * FROM services where active<>0;");
        $services= $query->result_array();
        foreach ($services as $row) {
                    echo "<tr>";
                    echo "<td class='vert servicesId'>" . $row['objectId'] . "</td>";
                    echo "<td class='vert servicesName'>" . $row['service_name'] . "</td>";
                    echo "<td class='vert group'>" . $row['group'] . "</td>";
                    echo "<td class='vert price'>$ " . $row['price'] . "</td>";
                    echo "<td class='vert'>";
                    echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-primary btn-sm editServiceFromAdmin pull-left' style='margin-right: 5px;'>Editar</button>";
                    echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-danger btn-sm removeServiceFromAdmin pull-right'>Borrar</button>";
                    echo "</td>";
                    echo "</tr>";
                }
    }

    public function deleteService() {
        $serviceObjectId = $this->input->post("serviceObjectId");
        $query = $this->db->query("UPDATE `services` SET `active`='1' WHERE `objectId` = " . $serviceObjectId . ";");
        if ($this->db->affected_rows() > 0) {
            set_status_header((int) 200);
        } else {
            set_status_header((int) 500);
        }
    }

    public function searchServicesName() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);
            $servicesName = $this->input->post('servicesNameSearch');
            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);
            $query = $this->db->query("SELECT * FROM services where service_name LIKE '%" . $servicesName . "%' and active<>0;");
            $servicesData['services'] = $query->result_array();
            $data['content_body'] = $this->load->view('admin_service', $servicesData, true);
            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function manageservice() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);
            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);
            $query = $this->db->query("SELECT * FROM services where active<>0;");
            $servicesData['services'] = $query->result_array();
            $data['content_body'] = $this->load->view('admin_service', $servicesData, true);
            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function addUser() {
        $this->load->library('encrypt');
        $pk_form = $this->input->post("pk_form");

        $inputRut = $this->input->post("inputRut");
        $inputEmail = $this->input->post("inputEmail");
        $inputPassword = $this->input->post("inputPassword");
        $username = $this->input->post("username");
        $firstName = $this->input->post("firstName");
        $lastName = $this->input->post("firstName");
        $userLevel = $this->input->post("userLevel");
        $address = $this->input->post("address");
        $city = $this->input->post("city");
        $contactNo = $this->input->post("contactNo");

        if ($pk_form == '0') {

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
                    '" . md5($inputPassword) . "',
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
//            if ($this->db->affected_rows() > 0) {
//                if ($userLevel == 1) {
//                    $queryEmail = $this->db->query("SELECT objectId FROM users WHERE email ='" . $inputEmail . "'");
//                    $row = $queryEmail->row();
//                    $DFGH = "INSERT INTO `pets`
//                                (
//                                `petName`,
//                                `petSpecies`,
//                                `petRace`,
//                                `petGender`,
//                                `petAge`,
//                                `petColor`,
//                                `petHistory`,
//                                `petIncome`,
//                                `userId`,
//                                `activo`)
//                                VALUES
//                                (
//                                '" . $petName . "',
//                                '" . $petSpecies . "',
//                                '" . $petRace . "',
//                                '" . $petGender . "',
//                                '" . $petAge . "',
//                                '" . $petColor . "',
//                                '" . $petHistory . "',
//                                now(),
//                                '" . $row->objectId . "',
//                                1);";
//                    $this->db->query($DFGH);
                if ($this->db->affected_rows() > 0) {
                    set_status_header((int) 200);
                } else {
                    set_status_header((int) 400);
                }
            } else {
                set_status_header((int) 400);
            }
        } else {
            $e = '';
            if (!preg_match('/^[a-f0-9]{32}$/', $inputPassword)) {
                $e = " `password`= '" . md5($inputPassword) . "',";
            }
            $fv = "UPDATE `users` SET `user_rut`='" . $inputRut . "',
                `username`='" . $username . "',
                $e
                `first_name`= '" . $firstName . "',
                `last_name`= '" . $lastName . "',
                `email`= '" . $inputEmail . "',
                `user_level`= '" . $userLevel . "',
                `address`= '" . $address . "',
                `city`= '" . $city . "',
                `contactNo`= '" . $contactNo . "' WHERE `objectId`='" . $pk_form . "';";
            if ($this->db->query($fv)) {
                set_status_header((int) 200);
            }
        }
    }

    public function deleteUser() {
        $userObjectId = $this->input->post("userObjectId");
        $deletePetUser = $this->db->query("UPDATE `pets` SET `activo`='0' WHERE `userId`= " . $userObjectId . ";");
        $query = $this->db->query("UPDATE `clinica`.`users` SET `activo`='0' WHERE objectId = " . $userObjectId . ";");
        if ($this->db->affected_rows() > 0) {
            set_status_header((int) 200);
        } else {
            set_status_header((int) 400);
        }
    }

    public function getUser() {
        $userObjectId = $this->input->post("id");
        $query = $this->db->query("SELECT * FROM users where objectId='" . $userObjectId . "'  and activo=1;");
        $data = $query->result();
        echo '{"response":1,"data":' . json_encode($data[0]) . '}';
    }

    public function generateNewPassword() {
        $this->load->library('encrypt');
        $userObjectId = $this->input->post("userObjectId");
        $inputPassword = md5($this->input->post("inputPassword"));

        $query = $this->db->query("UPDATE users 
				SET password = '" . $inputPassword . "' 
				WHERE users.objectId = " . $userObjectId . ";");

        if ($this->db->affected_rows() > 0) {
            set_status_header((int) 200);
        } else {
            set_status_header((int) 500);
        }
    }

    public function generateUserPDF() {
        $this->load->helper(array('dompdf', 'file'));

        $reportMonthFrom = $this->input->post("reportMonthFrom");
        $reportYearFrom = $this->input->post("reportYearFrom");
        $reportMonthTo = $this->input->post("reportMonthTo");
        $reportYearTo = $this->input->post("reportYearTo");

        $reportDateFrom = date('d-m-Y ', strtotime(str_replace('-', '/', '' . $reportMonthFrom . '/01/' . $reportYearFrom . '')));
        $reportDateto = date('d-m-Y ', strtotime(str_replace('-', '/', '' . $reportMonthTo . '/01/' . $reportYearTo . '')));
        $reportDateto = date_format(date_modify(new DateTime($reportDateto), 'last day of  this month'), 'd-m-Y ');

        $query = $this->db->query("SELECT * FROM users 
				WHERE createdAt >= '" . $reportDateFrom . "' 
				AND createdAt <='" . $reportDateto . "' and activo=1;");
        $usersData['users'] = $query->result_array();

        $usersData['reportDateFrom'] = $reportDateFrom;
        $usersData['reportDateto'] = $reportDateto;

        $html = $this->load->view('admin_user_report', $usersData, true);
        pdf_create($html, 'userReport');
    }

    public function generateProductReport() {
        $this->load->helper(array('dompdf', 'file'));

        $reportMonthFrom = $this->input->post("reportMonthFrom");
        $reportYearFrom = $this->input->post("reportYearFrom");
        $reportMonthTo = $this->input->post("reportMonthTo");
        $reportYearTo = $this->input->post("reportYearTo");

        $reportDateFrom = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', '' . $reportMonthFrom . '/01/' . $reportYearFrom . '')));
        $reportDateto = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', '' . $reportMonthTo . '/01/' . $reportYearTo . '')));
        $reportDateto = date_format(date_modify(new DateTime($reportDateto), 'last day of  this month'), 'd-m-Y H:i:s');


        // $query = $this->db->query("SELECT * FROM products 
        // 	WHERE createdAt >= '".$reportDateFrom."' 
        // 	AND createdAt <='".$reportDateto."';");
        // NOTE CHANGE THIS
        $query = $this->db->query("SELECT * FROM products;");

        $usersData['products'] = $query->result_array();


        $usersData['reportDateFrom'] = $reportDateFrom;
        $usersData['reportDateto'] = $reportDateto;


        $html = $this->load->view('admin_products_report', $usersData, true);
        // $this->output->append_output($html);
        pdf_create($html, 'productReport');
    }

    public function generateReservationReport() {
        $this->load->helper(array('dompdf', 'file'));

        $reportMonthFrom = $this->input->post("reportMonthFrom");
        $reportYearFrom = $this->input->post("reportYearFrom");
        $reportMonthTo = $this->input->post("reportMonthTo");
        $reportYearTo = $this->input->post("reportYearTo");

        $reportDateFrom = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', '' . $reportMonthFrom . '/01/' . $reportYearFrom . '')));
        $reportDateto = date('d-m-Y H:i:s', strtotime(str_replace('-', '/', '' . $reportMonthTo . '/01/' . $reportYearTo . '')));
        $reportDateto = date_format(date_modify(new DateTime($reportDateto), 'last day of  this month'), 'd-m-Y H:i:s');

        $query = $this->db->query("SELECT 
					ur.objectId as reservationobjectId,
					svs.objectId as serviceObjectId,
					u.objectId as usersObjectId,
					u.username,
					u.email,
					u.first_name,
					u.last_name,
					svs.service_name,
					ur.reserveDate,
					ur.reserveTime,
					svs.price,
					ur.confirmed
					FROM users_reservation ur 
					INNER JOIN services svs ON ur.serviceId = svs.objectId 
					INNER JOIN users u ON ur.userId = u.objectId 
					WHERE ur.reserveDateTime >= '" . $reportDateFrom . "' 
					AND ur.reserveDateTime <='" . $reportDateto . "' 
					ORDER BY ur.reserveDateTime DESC;");


        $usersData['reservations'] = $query->result_array();


        $usersData['reportDateFrom'] = $reportDateFrom;
        $usersData['reportDateto'] = $reportDateto;


        $html = $this->load->view('admin_reservation_report', $usersData, true);


        // $this->output->append_output($html);

        pdf_create($html, 'admin_reservation_report');


        // $this->output->set_header('Content-type: application/pdf');
        // $this->output->set_header('Content-Disposition: attachment; filename="admin_reservation_report.pdf"');
        // $data = pdf_create($html, '', false);
        // 	$this->output->append_output($data);
    }

    public function edita_paciente() {
        $id = $this->input->post('id-pacie');
        $nombre = $this->input->post('petName');
        $Species = $this->input->post('petSpecies');
        $Race = $this->input->post('petRace');
        $sexo = $this->input->post('petGender');
        $edad = $this->input->post('petAge');
        $color = $this->input->post('petColor');
        $obse = $this->input->post('petHistory');

        $this->db->query("update  sniosad,s");
        if ($this->db->affected_rows() > 0) {
            echo '{"response":' . json_encode($this->refrescartablapet()) . '}';
        }
    }

    public function busca_paciente() {
        $dato = $this->input->post('dato');
        if (!empty($dato)) {
            $q = "SELECT pets.objectId,pets.petName,pets.petSpecies,pets.petRace,pets.petGender,pets.petAge,pets.petColor,pets.petHistory,pets.petIncome,users.first_name,users.last_name FROM pets,users WHERE (petName LIKE '%" . $dato . "%' or petSpecies LIKE '%" . $dato . "%' or first_name like '%" . $dato . "%' or last_name like '%" . $dato . "%')  and pets.userId = users.objectId and users.activo = 1 ORDER BY pets.objectId ASC";
            $datos = $this->refrescartablapet(false, $q);
        } else {
            $datos = $this->refrescartablapet();
        }

        echo '{"response":' . json_encode($datos) . '}';
    }

    public function agrega_paciente() {
        $id = $this->input->post('id-pacie');
        $nombre = $this->input->post('petName');
        $Species = $this->input->post('petSpecies');
        $Race = $this->input->post('petRace');
        $sexo = $this->input->post('petGender');
        $edad = $this->input->post('petAge');
        $color = $this->input->post('petColor');
        $obse = $this->input->post('petHistory');
        $clie = $this->input->post('petOwnerReg');
        $cliente = intval($clie);

        $q = "INSERT INTO `pets` (`objectId`,`petName`,`petSpecies`,`petRace`,`petGender`,`petAge`,`petColor`,`petHistory`,`petIncome`,`userId`) VALUES(null,'" . $nombre . "','" . $Species . "','" . $Race . "','" . $sexo . "','" . $edad . "','" . $color . "','" . $obse . "',NOW(),'" . $cliente . "')"; // PUCHO QL CAMBIA AKI POR EL ID DEL CLIENTE DE TU SELLLECT QUE TUUU ARAS XD
        if ($this->db->query($q)) {
            echo '{"response":' . json_encode($this->refrescartablapet()) . '}';
        } else {
            echo null;
        }
    }

    public function elimina_paciente() {
        $id = $this->input->post("id");
        $query = $this->db->query("DELETE FROM pets WHERE objectId = '$id'");
        if ($this->db->affected_rows() > 0) {
            echo '{"response":' . json_encode($this->refrescartablapet()) . '}';
        } else {
            set_status_header((int) 500);
        }
    }

    public function pet() {// new
        if ($this->session->userdata('admin_objectId')) {// si es admin entra 
            //////////////////////////Permisos/////////////////////////////////
            $arrayAllowed = array(3, 4);
            $this->checkAllowed($arrayAllowed);
            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            ///////////////////////////////////////////////////////////////////
            //////////////////////////datos que se envian /////////////////////
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true"; //muestra la barra culia
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true); // la barra de menus 
            $dokpfdgh['TABLE_REGISTROS'] = $this->refrescartablapet(true);
            $data['content_body'] = $this->load->view('admin_Pets', $dokpfdgh, true);
            ///////////////////////////////////////////////////////////////////
            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function refrescartablapet($bol = false, $q = null) {
        $aaa = '';
        if ($q == null) {
            $q = "SELECT pets.objectId,pets.petName,pets.petSpecies,pets.petRace,pets.petGender,pets.petIncome,users.first_name,users.last_name FROM pets,users WHERE pets.userId = users.objectId and users.activo=1 ORDER BY pets.objectId ASC";
        }

        $query = $this->db->query($q);
        $TABLE_REGISTROS = $query->result_array();
        if ($bol) {
            return $TABLE_REGISTROS;
        }
        foreach ($TABLE_REGISTROS as $dat) {
            $aaa .= '<tr>
                                        			<td>' . $dat['petName'] . '</td>
                                                	<td>' . $dat['petSpecies'] . '</td>
                                                	<td>' . $dat['petRace'] . '</td>
                                                	<td>' . $dat['petGender'] . '</td>
                                                	<td>' . $dat['petIncome'] . '</td>
                                                	<td>' . $dat['first_name'] . '</td>
                                                	<td>' . $dat['last_name'] . '</td>
													<td><button id="petBtnAnamnesis" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#anamnesis">Ficha Atenciòn</button></td>
													<td><button id="petBtnHistorial" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#historial">Ficha Clinica</button></td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td><button id="nuevo-paciente" class="btn-warning btn-sm">Editar</button></td>
													<td><button id="nuevo-paciente" class="btn-danger btn-sm">Eliminar</button></td>
												
												</tr>';
        }
        return $aaa;
    }

    public function agregar_fichamascota() {

        $id = $this->input->post('id_ficha');
        $petWeight = $this->input->post('petWeiht');
        $petTemperature = $this->input->post('petTemperature');
        $petHeartRate = $this->input->post('petHeartRate');
        $petMucous = $this->input->post('petMucous');
        $petBreathingFrecuency = $this->input->post('petBreathingFrecuency');
        $petSkinTurgor = $this->input->post('petSkinTurgor');
        $petPulse = $this->input->post('petPulse');
        $PetTllc = $this->input->post('PetTllc');
        $PetObservation = $this->input->post('PetObservation');
        $petAnamnesis = $this->input->post('petAnamnesis');
        $petPreviousDiseases = $this->input->post('petPreviousDiseases');
        $petPosiblesDiagnoses = $this->input->post('petPosiblesDiagnoses');
        $petDefinitiveDiagnoses = $this->input->post('petDefinitiveDiagnoses');

        $petCboRespTab = $this->input->post('petCboResponsibleTab');
        $petCboResponsibleTab = intval($petCboRespTab);

        $petCboRespPet = $this->input->post('petCboResponsiblePet');
        $petCboResponsiblePet = intval($petRespPet);

        $petAnamnesisCreation = $this->input->post('petAnamnesisCreation');

        $petHistoId = $this->input->post('petHistoryId');
        $petHistoryId = intval(7);


        $q = "INSERT INTO `constant_physiological`(
			`petWeight`,
			`petTemperature`,
			`petHeartRate`,
			`petMucous`,
			`petBreathingFrecuency`,
			`petSkinTurgor`,
			`petPulse`,
			`PetTllc`,
			`PetObservation`,
			`petAnamnesis`,
			`petPreviousDiseases`,
			`petPosiblesDiagnoses`,
			`petDefinitiveDiagnoses`,
			`petCboResponsibleTab`,
			`petCboResponsiblePet`,
			`petAnamnesisCreation`,
			`petHistoryId`)
				VALUES
			(
			'" . $petWeight . "',
			'" . $petTemperature . "',
			'" . $petHeartRate . "',
			'" . $petMucous . "',
			'" . $petBreathingFrecuency . "',
			'" . $petSkinTurgor . "',
			'" . $petPulse . "',
			'" . $PetTllc . "',
			'" . $PetObservation . "',
			'" . $petAnamnesis . "',
			'" . $petPreviousDiseases . "',
			'" . $petPosiblesDiagnoses . "',
			'" . $petDefinitiveDiagnoses . "',
			'" . $petCboResponsibleTab . "',
			'" . $petCboResponsiblePet . "',
			now(),
			'" . $petHistoryId . "')";




        if ($this->db->query($q)) {
            echo '{"response":' . json_encode($this->refrescartablapet()) . '}';
        } else {
            echo null;
        }
    }

}
