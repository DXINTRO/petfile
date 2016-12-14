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
        $pk_form = $this->input->post("pk_form");
        $Q = '';
        if ($pk_form == '0' || is_null($pk_form)) {

            $q = "INSERT INTO products 
                                (
                                `product_name`,
                                `product_quantity`,
                                `product_price`,
                                `product_type`)
                                VALUES
                                (
                                '" . $pname . "',
                                " . $pqty . ",
                                " . $pprice . ",
                                '" . $ptype . "'
                                );";
        } else {
            $q = "UPDATE products 
                                        SET
                                        `product_name` = '" . $pname . "',
                                        `product_quantity` = " . $pqty . ",
                                        `product_price` = " . $pprice . ",
                                        `product_type` = '" . $ptype . "' 
                                        WHERE objectId='" . $pk_form . "';";
        }

        if ($this->db->query($q)) {
            set_status_header((int) 200);
            $query = $this->db->query("SELECT * FROM products;");

            $products = $query->result_array();
            foreach ($products as $row) {
                $productquantity = intval($row['product_quantity']);
                if ($productquantity <= 10) {
                    echo "<tr style='color:red'>";
                } else {
                    echo "<tr>";
                }
                echo "<td class='vert productObjectId'>" . $row['objectId'] . "</td>";
                echo "<td class='vert productName'>" . $row['product_name'] . "</td>";
                echo "<td class='vert productQuanitty'>" . $row['product_quantity'] . "</td>";
                echo "<td class='vert productPrice'>$ " . $row['product_price'] . "</td>";
                echo "<td class='vert productType'>" . $row['product_type'] . "</td>";
                echo "<td class='vert'>";
                echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-primary btn-sm editProductAdmin pull-left' style='margin-right: 5px;'>Editar</button>";
                echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-danger btn-sm removeProductAdmin pull-right'>Borrar</button>";
                echo "</td>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            set_status_header((int) 400);
        }
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

            $customer = $this->db->query("SELECT * FROM users WHERE user_level=1 and activo=1;");
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
            $billingData['list_of_Pets'] = $this->getAllPets();
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

            $customer = $this->db->query("SELECT * FROM users WHERE user_level=1 AND activo=1;");
            $billingData['customers'] = $customer->result_array();

            $doc = $this->db->query("SELECT * FROM doctors where activo=1");
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

            $billingData['list_of_orders'] = $query->result_array();
            $query = $this->db->query(" SELECT 
                                        `ur`.`objectId` AS `reservationobjectId`,
                                        `svs`.`objectId` AS `serviceObjectId`,
                                        `u`.`objectId` AS `usersObjectId`,
                                        `pets`.`petName` AS `petName`,
                                        `u`.`username` AS `username`,
                                        `u`.`email` AS `email`,
                                        `u`.`first_name` AS `first_name`,
                                        `u`.`last_name` AS `last_name`,
                                        `svs`.`service_name` AS `service_name`,
                                        `ur`.`reserveDate` AS `reserveDate`,
                                        `ur`.`reserveTime` AS `reserveTime`,
                                        `svs`.`price` AS `price`,
                                        `ur`.`confirmed` AS `confirmed`,
                                        `ur`.`timestamp` AS `timestamp`
                                    FROM
                                        (((`users_reservation` `ur`
                                        JOIN `services` `svs` ON ((`ur`.`serviceId` = `svs`.`objectId`)))
                                        JOIN `users` `u` ON ((`ur`.`userId` = `u`.`objectId`)))
                                       JOIN `pets` ON ((`ur`.`pettId` = `pets`.`objectId`)))
                                    WHERE
                                        (`u`.`activo` = 1) GROUP BY `ur`.`objectId`  ORDER BY `ur`.`reserveDateTime` DESC");

            $services = $this->db->query("SELECT * FROM services where active=1;");

            $billingData['reservations'] = $query->result_array();
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
            $customerId = $this->input->post("customer");
            $petName = $this->input->post("PetsId");
            $doctorId = $this->input->post("doctor");
            $surgeryId = $this->input->post("surgery");

            $reportMonthFrom = $this->input->post("reportMonthFrom");
            $reportYearFrom = $this->input->post("reportYearFrom");
            $reportDayFrom = $this->input->post("reportDayFrom");
            $reportMonthTo = $this->input->post("reportMonthTo");
            $reportYearTo = $this->input->post("reportYearTo");
            $reportDayTo = $this->input->post("reportDayTo");



            $reportDateFrom = date('d-m-Y', strtotime(str_replace('-', '/', '' . $reportMonthFrom . '/' . $reportDayFrom . '/' . $reportYearFrom . '')));
            $reportDateto = date('d-m-Y', strtotime(str_replace('-', '/', '' . $reportMonthTo . '/' . $reportDayTo . '/' . $reportYearTo . '')));

            $timeDiff = abs(strtotime(str_replace('-', '/', '' . $reportMonthTo . '/' . $reportDayTo . '/' . $reportYearTo . '')) - strtotime(str_replace('-', '/', '' . $reportMonthFrom . '/' . $reportDayFrom . '/' . $reportYearFrom . '')));

            $numDays = ($timeDiff / 86400) + 1;



            $billingData['daysNumber'] = $numDays;


            $customer = $this->db->query("SELECT * FROM users WHERE objectId='" . $customerId . "';");
            $billingData['customers'] = $customer->result_array();

            $PET = $this->db->query("SELECT * FROM pets WHERE objectId='" . $petName . "';");
            $petdata = $PET->result()[0];

            $doc = $this->db->query("SELECT * FROM doctors WHERE objectId='" . $doctorId . "';");
            $billingData['docs'] = $doc->result_array();

            $surgery = $this->db->query("SELECT * FROM services WHERE objectId='" . $surgeryId . "';");
            $billingData['surgerys'] = $surgery->result_array();


            $billingData['reportDateFrom'] = $reportDateFrom;
            $billingData['reportDateto'] = $reportDateto;
            $billingData['petName'] = $petdata->petName;
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
            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);

            $query = $this->db->query("SELECT * FROM clinica.prescription_view WHERE petsactivo='1'
						ORDER BY idprescription DESC;");

            $ordersData['TABLE_REGISTROS'] = $query->result_array();
            $tableOrder['order_table'] = $this->load->view('admin_order_table', $ordersData, true);
            $data['content_body'] = $this->load->view('admin_order', $tableOrder, true);
            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function PrintRecetta() {
        if ($this->session->userdata('admin_objectId')) {
            $this->load->helper(array('dompdf', 'file'));
            $id = $this->input->get('id');
            $q = "SELECT * FROM clinica.prescription_view where idprescription= '" . $id . "';";
            $datos = [];
            if ($query = $this->db->query($q)) {
                $datos['data'] = $query->result()[0];
            }
            $html = $this->load->view('admin_resetta_report', $datos, true);
            // $this->output->append_output($html);
            pdf_create($html, 'Report');
        } else {
            redirect("/");
        }
        die(print_r($id));
    }

    public function getAllPets() {
        if ($id = $this->session->userdata('admin_objectId')) {
            $query = $this->db->query("SELECT * FROM pets where userId ='" . $id . "' and activo=1;");
            return $query->result_array();
        }
    }

    public function getPets_por_id() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = $this->db->query("SELECT * FROM pets where userId ='" . $id . "' and activo=1;");
            $data = $query->result();
            if (!empty($data)) {
                $r = "<option   value='' selected='selected' >Mascotas</option>";
            foreach ($data as $i => $ares) {
                $r .= "<option value='".$ares->objectId."' selected='selected' >".$ares->petName."</option>";
            }
            echo $r;
            } else {
                echo  "<option  value='' selected='selected' >Sin Mascotas</option>";
            }
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

    public function manageReservationembed() {
        if ($this->session->userdata('admin_objectId')) {
            $arrayAllowed = array(3);
            $this->checkAllowed($arrayAllowed);
            $navbarData['userLevel'] = $this->session->userdata('user_level');
            $navbarData['current_name'] = $this->session->userdata('current_name');
            $data['stylesheets'] = array('jumbotron-narrow.css');
            $data['show_navbar'] = "true";
            $data['content_navbar'] = $this->load->view('admin_navbar', $navbarData, true);
            $query = $this->db->query(" SELECT 
                                        `ur`.`objectId` AS `reservationobjectId`,
                                        `svs`.`objectId` AS `serviceObjectId`,
                                        `u`.`objectId` AS `usersObjectId`,
                                        `pets`.`petName` AS `petName`,
                                        `u`.`username` AS `username`,
                                        `u`.`email` AS `email`,
                                        `u`.`first_name` AS `first_name`,
                                        `u`.`last_name` AS `last_name`,
                                        `svs`.`service_name` AS `service_name`,
                                        `ur`.`reserveDate` AS `reserveDate`,
                                        `ur`.`reserveTime` AS `reserveTime`,
                                        `svs`.`price` AS `price`,
                                        `ur`.`confirmed` AS `confirmed`,
                                        `ur`.`timestamp` AS `timestamp`
                                    FROM
                                        (((`users_reservation` `ur`
                                        JOIN `services` `svs` ON ((`ur`.`serviceId` = `svs`.`objectId`)))
                                        JOIN `users` `u` ON ((`ur`.`userId` = `u`.`objectId`)))
                                       JOIN `pets` ON ((`ur`.`pettId` = `pets`.`objectId`)))
                                    WHERE
                                        (`u`.`activo` = 1)  GROUP BY `ur`.`objectId`  ORDER BY `ur`.`reserveDateTime` DESC");

            $services = $this->db->query("SELECT * FROM services where active=1;");

            $usersData['reservations'] = $query->result_array();
            $usersData['serviceslist'] = $services->result_array();
            $usersData['list_of_doctors'] = $this->getAlldoc();
            $data['content_body'] = $this->load->view('admin_reservation_embed', $usersData, true);

            $this->load->view("layout_embed", $data);
        } else {
            redirect("/");
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

            $query = $this->db->query(" SELECT 
                                        `ur`.`objectId` AS `reservationobjectId`,
                                        `svs`.`objectId` AS `serviceObjectId`,
                                        `u`.`objectId` AS `usersObjectId`,
                                        `pets`.`petName` AS `petName`,
                                        `u`.`username` AS `username`,
                                        `u`.`email` AS `email`,
                                        `u`.`first_name` AS `first_name`,
                                        `u`.`last_name` AS `last_name`,
                                        `svs`.`service_name` AS `service_name`,
                                        `ur`.`reserveDate` AS `reserveDate`,
                                        `ur`.`reserveTime` AS `reserveTime`,
                                        `svs`.`price` AS `price`,
                                        `ur`.`confirmed` AS `confirmed`,
                                        `ur`.`timestamp` AS `timestamp`
                                    FROM
                                        (((`users_reservation` `ur`
                                        JOIN `services` `svs` ON ((`ur`.`serviceId` = `svs`.`objectId`)))
                                        JOIN `users` `u` ON ((`ur`.`userId` = `u`.`objectId`)))
                                       JOIN `pets` ON ((`ur`.`pettId` = `pets`.`objectId`)))
                                    WHERE
                                        (`u`.`activo` = 1) GROUP BY `ur`.`objectId`  ORDER BY `ur`.`reserveDateTime` DESC");

            $services = $this->db->query("SELECT * FROM services where active=1;");

            $usersData['reservations'] = $query->result_array();
            $usersData['serviceslist'] = $services->result_array();
            $usersData['list_of_doctors'] = $this->getAlldoc();
            $usersData['list_of_Pets'] = $this->getAllPets();
            $data['content_body'] = $this->load->view('admin_reservation', $usersData, true);

            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    public function searchAdminReservation() {
        
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

    public function checkReservationAvailable() {

        $reserveDate = $this->input->post("reserveDate");
        $reserveTime = $this->input->post("reserveTime");
        $reserveDateTime = $reserveDate . ' ' . $reserveTime;
        //SELECT STR_TO_DATE('16/11/2016 04:00 PM','%d/%m/%Y %h:%i %p');  
        $Id = $this->session->userdata('admin_objectId');
        $serviceId = $this->input->post("serviceId");
        $doctorsId = $this->input->post("doctorsId");
        $PetsId = $this->input->post("petsId");

        $Wedf = "SELECT * from users_reservation 
					where reserveDateTime= STR_TO_DATE('" . $reserveDateTime . "','%d/%m/%Y %h:%i %p') 
					AND serviceId='" . $serviceId . "' " . $Q . " and doctorsId=" . $doctorsId . " and pettId='" . $PetsId . "';";
        $f = "SELECT * FROM users_reservation where userId ='" . $Id . "'  and  pettId='" . $PetsId . "';";
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

    public function addReservation() {
        if ($userId = $this->session->userdata('admin_objectId')) {
            $reserveDate = $this->input->post("reserveDate");
            $reserveTime = $this->input->post("reserveTime");
            $reserveDateTime = $reserveDate . ' ' . $reserveTime;
            //SELECT STR_TO_DATE('16/11/2016 04:00 PM','%d/%m/%Y %h:%i %p');  

            $serviceId = $this->input->post("serviceId");
            $doctorsId = $this->input->post("doctorsId");
            $PetsId = $this->input->post("petsId");

            $q = "INSERT INTO 
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
						NOW());";
            $query = $this->db->query($q);

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
        if ($pk_form == '0' || is_null($pk_form)) {
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
        $services = $query->result_array();
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

        if ($pk_form == '0' || is_null($pk_form)) {

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
                if ($this->db->affected_rows() > 0) {
                    $id = $this->db->insert_id();
                    $this->addPets($_POST, $id);
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

        $query = $this->db->query("SELECT * FROM products;");

        $usersData['products'] = $query->result_array();
        $usersData['reportDateFrom'] = $reportDateFrom;
        $usersData['reportDateto'] = $reportDateto;


        $html = $this->load->view('admin_products_report', $usersData, true);
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
        $Q = " SELECT 
        `ur`.`objectId` AS `reservationobjectId`,
        `svs`.`objectId` AS `serviceObjectId`,
        `u`.`objectId` AS `usersObjectId`,
        `pets`.`petName` AS `petName`,
        `u`.`username` AS `username`,
        `u`.`email` AS `email`,
        `u`.`first_name` AS `first_name`,
        `u`.`last_name` AS `last_name`,
        `svs`.`service_name` AS `service_name`,
        `ur`.`reserveDate` AS `reserveDate`,
        `ur`.`reserveTime` AS `reserveTime`,
        `svs`.`price` AS `price`,
        `ur`.`confirmed` AS `confirmed`,
        `ur`.`timestamp` AS `timestamp`
    FROM
        (((`users_reservation` `ur`
        JOIN `services` `svs` ON ((`ur`.`serviceId` = `svs`.`objectId`)))
        JOIN `users` `u` ON ((`ur`.`userId` = `u`.`objectId`)))
       JOIN `pets` ON ((`ur`.`pettId` = `pets`.`objectId`)))
    WHERE
        (`u`.`activo` = 1 and ur.reserveDateTime >= '" . $reportDateFrom . "' 
					AND ur.reserveDateTime <='" . $reportDateto . "')
                                            GROUP BY `ur`.`objectId`
    ORDER BY `ur`.`reserveDateTime` DESC";
        $query = $this->db->query($Q);

        $usersData['reservations'] = $query->result_array();
        $usersData['reportDateFrom'] = $reportDateFrom;
        $usersData['reportDateto'] = $reportDateto;
        $html = $this->load->view('admin_reservation_report', $usersData, true);
        pdf_create($html, 'admin_reservation_report');
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

    public function get_pet_modal() {
        $id = $this->input->post("id");
        $Q = "SELECT `pets_v_users`.`user_rut`,
                `pets_v_users`.`first_name`,
                `pets_v_users`.`last_name`,
                `pets_v_users`.`email`,
                `pets_v_users`.`user_level`,
                `pets_v_users`.`createdAt`,
                `pets_v_users`.`address`,
                `pets_v_users`.`city`,
                `pets_v_users`.`contactNo`,
                `pets_v_users`.`usersactivo`,
                `pets_v_users`.`petsobjectId`,
                `pets_v_users`.`petName`,
                `pets_v_users`.`petSpecies`,
                `pets_v_users`.`petRace`,
                `pets_v_users`.`petGender`,
                `pets_v_users`.`petAge`,
                `pets_v_users`.`petColor`,
                `pets_v_users`.`petHistory`,
                `pets_v_users`.`petIncome`,
                `pets_v_users`.`userId`
            FROM `pets_v_users` where petsobjectId='" . $id . "'   ";
        if ($query = $this->db->query($Q)) {
            $datos = $query->result();
            echo '{"data":' . json_encode($datos[0]) . '}';
        }
    }

    public function addPets($param = [], $id = '') {
        if ((isset($param['petName'])) && (isset($param['petSpecies']) && (isset($param['petRace'])))) {
            $Q = "INSERT INTO `clinica`.`pets`
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
                           '" . $param['petName'] . "',
                           '" . $param['petSpecies'] . "',
                            '" . $param['petRace'] . "',
                           '" . $param['petGender'] . "',
                          '" . $param['petAge'] . "',
                          '" . $param['petColor'] . "',
                          '" . $param['petHistory'] . "',
                            NOW(),
                           '" . $id . "',
                            1);";
            if ($this->db->query($Q)) {
                return true;
            }
        } else {
            $petName = $this->input->post("petName");
            $petSpecies = $this->input->post("petSpecies");
            $petRace = $this->input->post("petRace");
            $petAge = $this->input->post("petAge");
            $petColor = $this->input->post("petColor");
            $petOwnerReg = $this->input->post("petOwnerReg");
            $petGender = $this->input->post("petGender");
            $petHistory = $this->input->post("petHistory");
            $pk_form = $this->input->post("pk_form");
            if ($pk_form == '0' || is_null($pk_form)) {

                $q = "INSERT INTO `clinica`.`pets`
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
                            NOW(),
                           '" . $petOwnerReg . "',
                            1);";
            } else {
                $q = "UPDATE `clinica`.`pets` 
                            SET 
                                `petName` = '$petName',
                                `petSpecies` = '$petSpecies',
                                `petRace` = '$petRace',
                                `petGender` = '$petGender',
                                `petAge` = '$petAge',
                                `petColor` = '$petColor',
                                `petHistory` = ' $petHistory',
                                `userId` = '$petOwnerReg'
                            WHERE
                                `objectId` = '$pk_form';";
            }
            if ($this->db->query($q)) {
                if ($this->db->affected_rows() > 0) {
                    echo '{"data":' . json_encode($this->refrescartablapet()) . '}';
                } else {
                    echo '{"data":null}';
                }
            }
        }
    }

    public function delete_pets() {
        $id = $this->input->post("id");
        $query = $this->db->query("UPDATE `pets` SET `activo`='0' WHERE `objectId`= '$id'");
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
            $dokpfdgh['list_of_users'] = $this->getAllUsers();
            $query = $this->db->query("SELECT * FROM products;");
            $dokpfdgh['list_of_doc'] = $this->getAlldoc();
            $dokpfdgh['products'] = $query->result_array();
            $data['content_body'] = $this->load->view('admin_Pets', $dokpfdgh, true);
            ///////////////////////////////////////////////////////////////////
            $this->load->view("layout", $data);
        } else {
            redirect("/");
        }
    }

    private function getAllUsers() {
        $query = $this->db->query("SELECT * FROM clinica.users where activo=1");
        return $query->result_array();
    }

    private function getAlldoc() {
        $query = $this->db->query("SELECT * FROM clinica.doctors where activo=1");
        return $query->result_array();
    }

    public function refrescartablapet($bol = false, $q = null) {
        $aaa = '';
        if ($q == null) {
            $q = "SELECT pets.objectId,pets.petName,pets.petSpecies,pets.petRace,pets.petGender,pets.petIncome,users.first_name,users.last_name FROM pets,users WHERE pets.userId = users.objectId and users.activo=1 and pets.activo=1 ORDER BY pets.objectId ASC";
        }

        $query = $this->db->query($q);
        $TABLE_REGISTROS = $query->result_array();
        if ($bol) {
            return $TABLE_REGISTROS;
        }
        foreach ($TABLE_REGISTROS as $dat) {
            $aaa .= '<tr data-dataid="' . $dat['objectId'] . '">
                                <td>' . $dat['petName'] . '</td>
                                <td>' . $dat['petSpecies'] . '</td>
                                <td>' . $dat['petRace'] . '</td>
                                <td>' . $dat['petGender'] . '</td>
                                <td>' . $dat['petIncome'] . '</td>
                                <td>' . $dat['first_name'] . '</td>
                                <td>' . $dat['last_name'] . '</td>
                                <td><div class="btn-group">
                                    <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear"></i>  <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="txt-color-green registra-paciente"  href="#" onclick="return false;"><i class="fa fa-edit"></i> Editar</a>
                                        </li>
                                        <li>
                                            <a class="txt-color-red delete" href="#"  onclick="return false;"><i class="fa fa-trash-o"></i> Eliminar</a>
                                        </li>
                                      
                                        <li>
                                            <a class="txt-color-red historial" href="#"  onclick="return false;"><i class="fa fa-paw" aria-hidden="true"></i></i> Ficha Clìnica</a>
                                        </li>
                                        <li>
                                            <a class="txt-color-red anamnesis" href="#"  onclick="return false;" ><i class="fa fa-paw" aria-hidden="true"></i></i> Ficha Atenciòn</a>
                                        </li>
                                          <li>
                                            <a class="txt-color-red receta" href="#"  onclick="return false;" ><i class="fa fa-paw" aria-hidden="true"></i></i> Nueva Receta</a>
                                        </li>
                                    </ul>
                                  </div>
                                </td>
                          </tr> ';
        }
        return $aaa;
    }

    public function get_fichaAtention_modal() {
        $id = $this->input->post("id");
        $Q = "SELECT 
                    `constant_physiological`.`objectId`,
                    `constant_physiological`.`petId`,
                    `constant_physiological`.`petWeight`,
                    `constant_physiological`.`petTemperature`,
                    `constant_physiological`.`petHeartRate`,
                    `constant_physiological`.`petMucous`,
                    `constant_physiological`.`petBreathingFrecuency`,
                    `constant_physiological`.`PetTllc`,
                    `constant_physiological`.`petPulse`,
                    `constant_physiological`.`thickness`,
                    `constant_physiological`.`lstmedicament_textarea`,
                    `constant_physiological`.`petAnamnesis`,
                    `constant_physiological`.`petPreviousDiseases`,
                    `constant_physiological`.`petPosibles_Diagnosticos`,
                    `constant_physiological`.`petDiagnostico_Definitivo`,
                    `constant_physiological`.`PetObservation`,
                    `constant_physiological`.`Responsable_doc`,
                    `constant_physiological`.`userid`,
                    `constant_physiological`.`petCreationAnamnesis`
                FROM
                    `clinica`.`constant_physiological`
                WHERE
                    `constant_physiological`.`petId` = '" . $id . "';";

        if ($query = $this->db->query($Q)) {
            $datos = $query->result();
            if (!empty($datos)) {
                $dataarray = [];
                if ($query2 = $this->db->query("SELECT idproducts_pets FROM clinica.products_pets where idpet='" . $id . "';")) {
                    $array = $query2->result();
                    foreach ($array as $value) {
                        foreach ($value as $valuse) {
                            array_push($dataarray, $valuse);
                        }
                    }
                }
                echo '{"dataarray":' . json_encode($dataarray) . ',"data":' . json_encode($datos[0]) . '}';
            } else {
                echo '{"data":null}';
            }
        }
    }

    public function addfichaAtention() {
        $petId = $this->input->post('pk_form');
        $petWeight = $this->input->post('petWeight');
        $petTemperature = $this->input->post('petTemperature');
        $petHeartRate = $this->input->post('petHeartRate');
        $petBreathingFrecuency = $this->input->post('petBreathingFrecuency');
        $petTllc = $this->input->post('petTllc');
        $petPulse = $this->input->post('petPulse');
        $petMucous = $this->input->post('petMucous');
        $thickness = $this->input->post('thickness');
        $petAnamnesis = $this->input->post('petAnamnesis');
        $lstmedicament_textarea = $this->input->post('lstmedicament_textarea');
        $petPreviousDiseases = $this->input->post('petPreviousDiseases');
        $petPosiblesDiagnoses = $this->input->post('petPosibles_Diagnosticos');
        $petDefinitiveDiagnoses = $this->input->post('petDiagnostico_Definitivo');
        $Responsable_doc = $this->input->post('Responsable_doc');
        $userid = $this->input->post('userid');
        if ($this->db->query("DELETE FROM `clinica`.`constant_physiological` WHERE `petId`='" . $petId . "';")) {
            
        }
        $q = "INSERT INTO `clinica`.`constant_physiological`
                                (
                                `petId`,
                                `petWeight`,
                                `petTemperature`,
                                `petHeartRate`,
                                `petBreathingFrecuency`,
                                `PetTllc`,
                                `petMucous`,
                                `petPulse`,
                                `thickness`,
                                `lstmedicament_textarea`,
                                `petAnamnesis`,
                                `petPreviousDiseases`,
                                `petPosibles_Diagnosticos`,
                                `petDiagnostico_Definitivo`,
                                `PetObservation`,
                                `Responsable_doc`,
                                `userid`,
                                `petCreationAnamnesis`)
                                VALUES
                                (
                                '" . $petId . "',
                                '" . $petWeight . "',
                                '" . $petTemperature . "',
                                '" . $petHeartRate . "',
                                '" . $petBreathingFrecuency . "',
                                 '" . $petTllc . "',
                                 '" . $petMucous . "',
                                  '" . $petPulse . "',
                                  '" . $thickness . "',
                                 '" . $lstmedicament_textarea . "',
                                  '" . $petAnamnesis . "',
                                  '" . $petPreviousDiseases . "',
                                 '" . $petPosiblesDiagnoses . "',
                                 '" . $petDefinitiveDiagnoses . "',
                                  'null',
                                 '" . $Responsable_doc . "',
                                 '" . $userid . "',
                                NOW());";
        if ($this->db->query($q)) {
            if ($this->db->query("DELETE FROM `clinica`.`products_pets` WHERE `idpet`='" . $petId . "';")) {

                $list = (isset($_POST['lstmedicament'])) ? $_POST['lstmedicament'] : [];
                foreach ($list as $key => $value) {
                    $r = "INSERT INTO `clinica`.`products_pets`
                                        (`idproducts_pets`,
                                        `idpet`)
                                        VALUES
                                        ('" . $value . "',
                                        '" . $petId . "');";
                    if (!$this->db->query($r)) {
                        echo 'fail';
                    }
                }
                set_status_header((int) 200);
            }
        } else {
            echo null;
        }
    }

    public function get_history_modal() {
        $id = $this->input->post("id");

        $Q = "SELECT `history`.`objectId`,
                `history`.`petId`,
                `history`.`petCboVaccine`,
                `history`.`petCboDeworming`,
                `history`.`petCboDiet`,
                `history`.`petAppliedProducts`,
                `history`.`petDateDeworming`,
                `history`.`petCboProvenance`,
                `history`.`petCboReproductiveStatus`,
                `history`.`petDietApplied`,
                `history`.`petObservationHistory`,
                `history`.`petPreviousDiagnostic`,
                `history`.`petCboResponbibleHistory`,
                `history`.`petCboPetOwner`,
                `history`.`petHistorialCreation`
            FROM `clinica`.`history` 
             WHERE
                    `history`.`petId` = '" . $id . "';";

        if ($query = $this->db->query($Q)) {
            $datos = $query->result();
            if (!empty($datos)) {
                echo '{"data":' . json_encode($datos[0]) . '}';
            } else {
                echo '{"data":null}';
            }
        }
    }

    public function addHistory() {
        $petId = $this->input->post('pk_form');
        $petCboVaccine = $this->input->post('petCboVaccine');
        $petCboDeworming = $this->input->post('petCboDeworming');
        $petCboDiet = $this->input->post('petCboDiet');
        $petPetProvenance = $this->input->post('petPetProvenance');
        $petAppliedProducts = $this->input->post('petAppliedProducts');
        $petDateDeworming = $this->input->post('petDateDeworming');
        $petDietApplied = $this->input->post('petDietApplied');
        $petCboStatusReproductive = $this->input->post('petCboReproductiveStatus');
        $petObservationHistory = $this->input->post('petObservationHistory');
        $petPreviousDiagnostic = $this->input->post('petPreviousDiagnostic');
        $petCboResponbibleHistory = $this->input->post('petCboResponbibleHistory');
        $petCboPetOwner = $this->input->post('petCboPetOwner');
        if ($this->db->query("DELETE FROM `clinica`.`history` WHERE `petId`='" . $petId . "';")) {
            
        }
        $q = "INSERT INTO `clinica`.`history`
                                    (
                                    `petId`,
                                    `petCboVaccine`,
                                    `petCboDeworming`,
                                    `petCboDiet`,
                                    `petAppliedProducts`,
                                    `petDateDeworming`,
                                    `petCboProvenance`,
                                    `petCboReproductiveStatus`,
                                    `petDietApplied`,
                                    `petObservationHistory`,
                                    `petPreviousDiagnostic`,
                                    `petCboResponbibleHistory`,
                                    `petCboPetOwner`,
                                    `petHistorialCreation`)
                                    VALUES
                                    (
                                    '" . $petId . "',
                                    '" . $petCboVaccine . "',
                                    '" . $petCboDeworming . "',
                                    '" . $petCboDiet . "',
                                    '" . $petAppliedProducts . "',
                                    '" . $petDateDeworming . "',
                                    '" . $petPetProvenance . "',
                                    '" . $petCboStatusReproductive . "',
                                    '" . $petDietApplied . "',
                                    '" . $petObservationHistory . "',
                                    '" . $petPreviousDiagnostic . "',
                                    '" . $petCboResponbibleHistory . "',
                                    '" . $petCboPetOwner . "',
                                    NOW());";
        if ($this->db->query($q)) {
            set_status_header((int) 200);
        } else {
            set_status_header((int) 500);
        }
    }

    function get_prescription_modal() {
        $id = $this->input->post("id");
        $q = "SELECT * FROM clinica.prescription_view where petsobjectId= '" . $id . "';";

        if ($query = $this->db->query($q)) {
            $datos = $query->result();
            if (!empty($datos)) {
                echo '{"data":' . json_encode($datos[0]) . '}';
            } else {
                echo '{"data":null}';
            }
        } else {
            set_status_header((int) 500);
        }
    }

    function addRecetta() {
        $id = $this->input->post("id");
        $campo = $this->input->post("campo");
        if ($campo != null) {
            $del = "DELETE FROM `clinica`.`prescription` WHERE `idpets`= '" . $id . "'";
            $this->db->query($del);
            $Q = "INSERT INTO `clinica`.`prescription` (`Formulario`, `Fecha_creacion`, `idpets`) VALUES ('" . $campo . "',NOW(), '" . $id . "');";
        } else {
            $Q = "DELETE FROM `clinica`.`prescription` WHERE `idpets`= '" . $id . "'";
        }
        if ($this->db->query($Q)) {
            set_status_header((int) 200);
        } else {
            set_status_header((int) 202);
        }
    }

}
