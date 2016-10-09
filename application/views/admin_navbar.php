 <div class="header">
        <ul class="nav nav-pills pull-right adminNavbar">
 <?php
 	if($userLevel ==4){
         	
            echo'<li class="navReserveManage"><a href="'.base_url().'admin/manageReservation">Agenda de Horas</a></li>';
            echo'<li><a href="'.base_url().'user/logout">Cerrar Sesion</a></li>';
        
 	}else if ($userLevel ==3) {
 			
            echo'<li class="navProducts"><a href="'.base_url().'admin/manageproducts">Productos</a></li>';
            echo'<li class="navService"><a href="'.base_url().'admin/manageservice">Servicios</a></li>';
            echo'<li class="navReserveManage"><a href="'.base_url().'admin/manageReservation">Agenda de Horas</a></li>';
            echo'<li><a href="'.base_url().'user/logout">Logout</a></li>';
			
 	}
	else if ($userLevel ==5) {
            echo'<li class="navBilling"><a href="'.base_url().'admin/billing">Facturación</a></li>';
            echo'<li class="navBilling"><a href="'.base_url().'admin/audit">Auditoria</a></li>';
            echo'<li class="navProducts"><a href="'.base_url().'admin/manageproducts">Productos</a></li>';
            echo'<li class="navSalesReport"><a href="'.base_url().'admin/sales">Ventas</a></li>';
            echo'<li><a href="'.base_url().'user/logout">Cerrar Sesion</a></li>';
 	}
	else if ($userLevel ==6) {
            echo'<li class="navProducts"><a href="'.base_url().'admin/manageproducts">Productos</a></li>';
            echo'<li class="navProducts"><a href="'.base_url().'admin/userorder">Ordenes</a></li>';
            echo'<li class="navSalesReport"><a href="'.base_url().'admin/sales">Ventas</a></li>';
            echo'<li class="navBilling"><a href="'.base_url().'admin/billing">Facturación</a></li>';
            echo'<li class="navAdminUserManage"><a href="'.base_url().'admin">Usuarios</a></li>';
            echo'<li class="navBilling"><a href="'.base_url().'admin/audit">Auditoria</a></li>';
            echo'<li><a href="'.base_url().'user/logout">Cerrar Sesion</a></li>';
 	}
	elseif ($userLevel ==2) {
 	    echo'<li class="navAdminUserManage"><a href="'.base_url().'admin">Usuarios</a></li>';
            echo'<li class="navProducts"><a href="'.base_url().'admin/manageproducts">Productos</a></li>';
            echo'<li class="navService"><a href="'.base_url().'admin/manageservice">Servicios</a></li>';
            echo'<li class="navProducts"><a href="'.base_url().'admin/userorder">Ordenes</a></li>';
            echo'<li class="navReserveManage"><a href="'.base_url().'admin/manageReservation">Agenda de Horas</a></li>';
            echo'<li class="navSalesReport"><a href="'.base_url().'admin/sales">Ventas</a></li>';
            echo'<li class="navBilling"><a href="'.base_url().'admin/billing">Facturación</a></li>';
            echo'<li class="navBilling"><a href="'.base_url().'admin/audit">Auditoria</a></li>';
            echo'<li class="navBilling"><a href="'.base_url().'admin/backup">Respaldo DB</a></li>';
            echo'<li><a href="'.base_url().'user/logout">Logout</a></li>';
 	}
 ?>
 
 </ul>
        <h3 class="text-muted">Admin</h3>
</div>