<div class="alert alert-success addpetSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong><strong>
            </div>
            <div class="panel panel-default" id="admin_Pets">
                <!-- Default panel contents -->
                <div class="panel-heading">Ficha Clinica </div>
                <div class="panel-body">

                    <div class="panel panel-default">
                        <section>
                            <table border="0" align="center">
                                <tr>
                                    <td width="380"><input type="text" placeholder="ingrese el nombre de Mascota" id="Search_pet"/ ></td>
                                    <td width="100"><button id="nuevo-paciente" class="btn btn-primary btn-sm">Nueva Mascota</button></td>
                                </tr>
                            </table>
                        </section>
                        <div class="registros" id="agrega-registros">
                            <table class="table table-striped table-condensed table-hover">
                                <thead>
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
                                </thead>
                                <tbody>
                                    <?php
                                    $aaa = '';
                                    foreach ($TABLE_REGISTROS as $dat) {
                                        $aaa.= '<tr>
                                        <td>' . $dat['petName'] . '</td>
                                                <td>' . $dat['petSpecies'] . '</td>
                                                <td>' . $dat['petRace'] . '</td>
                                                <td>' . $dat['petGender'] . '</td>
                                                <td>' . $dat['petIncome'] . '</td>
                                                <td>' . $dat['first_name'] . '</td>
                                                <td>' . $dat['last_name'] . '</td>
                                                <td><a href="javascript:editarPaciente(' . $dat['objectId'] . ');" class="glyphicon glyphicon-edit"></a> <a data-objectid="'. $dat['objectId'] .'" id="eliminarpet" class="glyphicon glyphicon-remove-circle"></a></td>
                                         </tr>';
                                    }
                                    echo $aaa;
                                    ?>
                                </tbody>
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
                                    <form id="formulario1" class="formulario"  onsubmit="return false;" >
                                        <div class="modal-body">
                                            <table border="0" width="100%">
                                                <tr>
                                                    <td colspan="2"><input type="text" required="required" id="id-pacie" name="id-pacie" readonly style="visibility:hidden; height:5px;"/></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    	<div class="col-lg-12">
  	  														<label for="lastName">Nombre Mascota</label>
				    										<input type="text" class="form-control" id="petName" name="petName" onkeypress="return soloLetras(event)" minlength="3" required>
  	  													</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    	<div class="col-lg-12">
															<label for="lastName">Especie</label>
				    										<select class="form-control" name="petSpecies" id="petSpecies" >
			    												<option value="Perro">Perro</option>
                    											<option value="Gato">Gato</option>   
			   												</select>
				    									</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    	<div class="col-lg-12">
  	  														<label for="lastName">Raza</label>
				    										<input type="text" class="form-control" name="petRace" id="petRace" onkeypress="return soloLetras(event)"/ placeholder="" minlength="3" required>
  	  													</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-lg-12">
															<label for="lastName">Genero</label>
				    										<select class="form-control" name="petGender" id="petGender" >
			    												<option value="Macho">Macho</option>
                    											<option value="Hembra">Hembra</option>   
			   												</select>
				    									</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    	<div class="col-lg-12">
  	  														<label for="lastName">Edad</label>
				    										<input type="text" class="form-control" name="petAge" id="petAge" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required>
  	 													</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    	<div class="col-lg-12">
  	   														<label for="lastName">Color</label>
				    										<input type="text" class="form-control" name="petColor" id="petColor" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required>
  	  													</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    	<div class="col-lg-12">
  	   														<label for="lastName">Observaciones</label>
															<textarea  class="form-control" name="petHistory" id="petHistory" onkeypress="return soloLetras(event)"/ placeholder="" minlength="3" required></textarea>
														</div>
                                                    </td>
                                                </tr>
                                          
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Registrar" onclick="agregaPaciente()" class="btn btn-success" id="reg"/>
                                            <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Confirmar Eliminar</h4>
                        </div>

                        <div class="modal-body clearfix">

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button"  onclick="eliminarPaciente($(this))"class="btn btn-primary confirmAction">Aceptar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="footer">
                <p>&copy; PetFile 2016</p>
            </div>
            </div>
