 <div class="header">
        <ul class="nav nav-pills pull-right adminNavbar">
 <?php
 	if($userLevel ==4){
         	echo'<li class="navReserveManage"><a href="'.base_url().'admin/manageReservation">Reservations</a></li>';
         	echo'<li><a href="'.base_url().'user/logout">Log-Out</a></li>';
        
 	}else if ($userLevel ==3) {
 			echo'<li class="navAdminUserManage"><a href="'.base_url().'admin">Manage Users</a></li>';
         	echo'<li class="navProducts"><a href="'.base_url().'admin/userorder">Order</a></li>';
         	echo'<li><a href="'.base_url().'user/logout">Log-Out</a></li>';
 	}
	else if ($userLevel ==5) {
 	 echo'<li class="navBilling"><a href="'.base_url().'admin/billing">Billing</a></li>';
         	echo'<li><a href="'.base_url().'user/logout">Log-Out</a></li>';
 	}
	else if ($userLevel ==6) {
echo'<li class="navProducts"><a href="'.base_url().'admin/manageproducts">Products</a></li>';
         	echo'<li class="navProducts"><a href="'.base_url().'admin/userorder">Order</a></li>';
			  echo'<li class="navSalesReport"><a href="'.base_url().'admin/sales">Sales</a></li>';
         	echo'<li><a href="'.base_url().'user/logout">Log-Out</a></li>';
 	}
	elseif ($userLevel ==2) {
 	       echo'<li class="navAdminUserManage"><a href="'.base_url().'admin">Users</a></li>';
         	echo'<li class="navProducts"><a href="'.base_url().'admin/manageproducts">Products</a></li>';
                echo'<li class="navService"><a href="'.base_url().'admin/manageservice">Service</a></li>';
         	echo'<li class="navProducts"><a href="'.base_url().'admin/userorder">Order</a></li>';
         	echo'<li class="navReserveManage"><a href="'.base_url().'admin/manageReservation">Reservations</a></li>';
                echo'<li class="navSalesReport"><a href="'.base_url().'admin/sales">Sales</a></li>';
                echo'<li class="navBilling"><a href="'.base_url().'admin/billing">Billing</a></li>';
                echo'<li class="navBilling"><a href="'.base_url().'admin/audit">Audit Trail</a></li>';
                echo'<li class="navBilling"><a href="'.base_url().'admin/backup">Backup DB</a></li>';
         	echo'<li><a href="'.base_url().'user/logout">Log-Out</a></li>';
 	}
 ?>
 
 </ul>
        <h3 class="text-muted">Admin</h3>
</div>