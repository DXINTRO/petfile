<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de Mascotas</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>

<body>
<header>Ficha Clinica Morita</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="335"><input type="text" placeholder="Buscar mascota" id="bs-pacie"/></td>
            <td width="100"><button id="nuevo-paciente" class="btn btn-primary">Nuevo</button></td>
        </tr>
    </table>
    </section>
    <div class="registros" id="agrega-registros">
        <table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="100">Nombre Mascota</th>
                <th width="100">Especie</th>
                <th width="100">Raza</th>
           		<th width="70">Sexo</th>
                <th width="150">Fecha Registro</th>
				<th width="150">Nombre Cliente</th>
				<th width="150">Apellido Cliente</th>
                <th width="50">Opciones</th>
            </tr>
        <?php
			//C:\virtualhost\sitiolocal\public\petfile\application\config
			include('../php/conexion.php');
            //include('..petfile/application/database.php');
            $registro = mysql_query("SELECT pets.objectId,pets.petName,pets.petSpecies,pets.petRace,pets.petGender,pets.petIncome,users.first_name,users.last_name FROM pets,users WHERE pets.userId = users.objectId ORDER BY pets.objectId ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['petName'].'</td>
                		<td>'.$registro2['petSpecies'].'</td>
                		<td>'.$registro2['petRace'].'</td>
                		<td>'.$registro2['petGender'].'</td>
						<td>'.$registro2['petIncome'].'</td>
						<td>'.$registro2['first_name'].'</td>
						<td>'.$registro2['last_name'].'</td>
						<td><a href="javascript:editarPaciente('.$registro2['objectId'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarPaciente('.$registro2['objectId'].');" class="glyphicon glyphicon-remove-circle"></a></td>
			 </tr>';       
            }
        ?>
        </table>
    </div>
    <!-- MODAL PARA EL REGISTRO DE MASCOTAS-->
    <div class="modal fade" id="registra-paciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Pacientes</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
            
      
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-pacie" name="id-pacie" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="140">Nombre Mascota: </td>
                        <td><input type="text" required="required" readonly="readonly" id="petName" name="petName"/></td>
                    </tr>
                	<tr>
                    	<td>Especie:</td>
                        <td><select required="required" name="petSpecies" id="petSpecies">
                        		<option value="Perro">Perro</option>
                                <option value="Gato">Gato</option>    
                            </select></td>
                    </tr>
                    <tr>
                    	<td>Raza: </td>
                        <td><input type="number" required="required" name="petRace" id="petRace"/></td>
                    </tr>
                    <tr>
                    	<td>Genero:</td>
                        <td><select required="required" name="petGender" id="petGender">
                        		<option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>    
                            </select></td>
                    </tr>
                    <tr>
                    	<td>Edad: </td>
                        <td><input type="text"  required="required" name="petAge" id="petAge"/></td>
                    </tr>
                     <tr>
                    	<td>Color: </td>
                        <td><input type="text"  required="required" name="petColor" id="petColor"/></td>
                    </tr>
                     <tr>
                    	<td>Observaciones: </td>
                        <td><textarea required="required" name="petHistory" id="petHistory">  </textarea></td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
                
                
            </div>
            
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
      

</body>

</html>