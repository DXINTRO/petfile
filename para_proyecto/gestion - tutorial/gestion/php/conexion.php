<?php
$conexion = mysql_connect('127.0.0.1', 'avalos12', 'avalos12');
mysql_select_db('tienda', $conexion);

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>