<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM pets WHERE objectId = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM pets ORDER BY objectId ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="150">Nombre Mascota</th>
                <th width="150">Especie </th>
                <th width="150">Raza</th>
           		<th width="150">Sexo</th>
                <th width="150">Fecha Registro</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
						<td>'.$registro2['petName'].'</td>
                        <td>'.$registro2['petSpecies'].'</td>
                        <td>'.$registro2['petRace'].'</td>
                        <td>'.$registro2['petGender'].'</td>
						<td>'.$registro2['petIncome'].'</td>
				<td><a href="javascript:editarPaciente('.$registro2['objectId'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['objectId'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>