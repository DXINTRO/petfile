<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
//$registro = mysql_query("SELECT * FROM pets WHERE petName LIKE '%".$dato."%' OR petSpecies LIKE '%".$dato."%' ORDER BY objectId ASC");
$registro = mysql_query("SELECT pets.objectId,pets.petName,pets.petSpecies,pets.petRace,pets.petGender,pets.petAge,pets.petColor,pets.petHistory,pets.petIncome,users.first_name,users.last_name FROM pets,users WHERE (petName LIKE '%".$dato."%' or petSpecies LIKE '%".$dato."%' or first_name like '%".$dato."%' or last_name like '%".$dato."%')  and pets.userId = users.objectId ORDER BY pets.objectId ASC");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="100">Nombre Mascota</th>
                <th width="100">Especie</th>
                <th width="100">Raza</th>
           		<th width="70">Sexo</th>
                <th width="150">Fecha Registro</th>
				<th width="150">Nombre Cliente</th>
				<th width="150">Apellido Cliente</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['petName'].'</td>
                <td>'.$registro2['petSpecies'].'</td>
                <td>'.$registro2['petRace'].'</td>
                <td>'.$registro2['petGender'].'</td>
				<td>'.$registro2['petIncome'].'</td>
				<td>'.$registro2['first_name'].'</td>
				<td>'.$registro2['last_name'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['objectId'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['objectId'].');" class="glyphicon glyphicon-remove-circle"></a></td>
			 </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>