<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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
                                    <td width="50"><input type="text" placeholder="Buscar Nombre o Especie" id="Search_pet"></td>
                                    <td width="100">
                                        <button id="nuevo-paciente" class="btn btn-primary btn-sm">Nueva Mascota</button>
                                    </td>
                                </tr>
                            </table>
                        </section>
                        <div class="registros" id="agrega-registros">
                            <table class="table table-striped table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th width="100">Nombre Mascota</th>
                                        <th width="70">Especie</th>
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
													<td><button id="petBtnAnamnesis" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#anamnesis" onclick="cargaDatosMascotaFicha(\'' . $dat['petName'] . '\',\'' . $dat['objectId'] . '\')">Ficha Atenciòn</button></td>
													<td><button id="petBtnHistorial" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#historial">Ficha Clìnica</button></td>
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
												
												</tr>
                                        </tr> ';
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
                                                            <input type="text" class="form-control" id="petName" name="petName" onkeypress="return soloLetras(event)" minlength="5" required>
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
                                                            <input type="text" class="form-control" name="petRace" id="petRace" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required>
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
                                                            <input type="number" class="form-control" name="petAge" id="petAge" placeholder="" maxlength="2" required>
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
                                                            <textarea  class="form-control" name="petHistory" id="petHistory" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required></textarea>
                                                        </div>
                                                    </td>
                                                <tr>
                                                    <td>
                                                        <div class="panel-body">
                                                            <select class="form-control reserveDoctorSelect" name="petOwnerReg" id="petOwnerReg" >
                                                                <option>Seleccione un Cliente</option>
                                                                <?php
                                                                $sql = "SELECT users.objectId,users.first_name,users.last_name FROM users WHERE users.objectId ORDER BY users.objectId desc";
                                                                $rec = mysql_query($sql);
                                                                while ($row = mysql_fetch_array($rec)) {
                                                                    echo "<option value='" . $row['objectId'] . "'>" . $row['first_name'] . "  " . $row['last_name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
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

                        <!-- MODAL PARA ANAMNESIS-->
                        <div class="modal fade" id="anamnesis" tableindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div  class="modal-dialog">   
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                                        <div class="col-sm-12"><label for=""> <h4>Ficha de Atenciòn Mèdica<h4></label></div>
                                                        </div>
                                          <form id="formulario2" class="formulario"  onsubmit="return false;" >
                                                        <div class="modal-body">
                                                           
                                                           
                                                           
                                                           
                                                           <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label for="lastName">Mascota</label>
                                                                    <input type="text" class="form-control" id="mascota-ficha" name="petWeight" value="..." onkeypress="return numeros(event)" readonly />
                                                                    
                                                                    
                                                                    
                                                                    <input type="hidden" id="mascota-id" name="mascota-id" value="">
                                                                    
                                                                </div>
															</div>      
                                                           
                                                            
                                                            

                                                            

                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label for="lastName">Peso</label>
                                                                    <input type="text" class="form-control" id="petWeight" name="petWeight" placeholder="Peso" onkeypress="return numeros(event)">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="lastName">Temperatura</label>
                                                                    <input type="text" class="form-control" id="petTemperature" name="petTemperature" placeholder="Temperatura" onkeypress="return numeros(event)">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="lastName">Frec. Cardiaca</label>
                                                                    <input type="text" class="form-control" id="petHeartRate" name="petHeartRate" placeholder="Frec. Cardiaca" onkeypress="return numeros(event)">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="lastName">Mucosas</label>
                                                                    <select class="form-control" name="petMucous" id="petMucous" >

                                                                        <option value="Congestionada">Congestionada</option>
                                                                        <option value="Normal">Normal</option>   
                                                                    </select>

<!--<input type="text" class="form-control" id="petMucous" name="petMucous" placeholder="Mucosas">-->

                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label for="lastName">Frec. Resp.</label>
                                                                    <input type="text" class="form-control" id="petBreathingFrecuency" name="petBreathingFrecuency" placeholder="Frec. Respiratoria" onkeypress="return numeros(event)">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="lastName">Turgencia Piel</label>
                                                                    <select class="form-control" name="petTllc" id="petTllc" >
                                                                        <option value=" 1 Segundo"> 0 Segundo</option> 
                                                                        <option value=" 1 Segundo">1 Segundo</option>
                                                                        <option value=" 2 Segundos">2 Segundo</option>    
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="lastName">Pulso</label>
                                                                    <input type="text" class="form-control" id="petPulse" name="petPulse" placeholder="Pulso" onkeypress="return numeros(event)">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="lastName">Pliege Cutaneo</label>
                                                                    <select class="form-control" name="petTllc" id="petTllc" >
                                                                        <option value="< 1 Segundo">< 1 Segundo</option>
                                                                        <option value="> 1 Segundo">> 1 Segundo</option>   
                                                                    </select>
                                                            <!--<input type="text" class="form-control" id="PetTllc" name="PetTllc" placeholder="TLL.C">-->

                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label for="petObservation">Observaciones</label>
                                                                    <textarea class="form-control" rows="3" id="petObservation" name="petObservation" placeholder="Otras Observaciones"></textarea>
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label for="petAnamnesis">Anamnesis</label>
                                                                    <textarea class="form-control" rows="3" id="petAnamnesis" name="petAnamnesis" placeholder="Describe historial medico"></textarea>
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label for="petPreviousDiseases">Enfermedades o procedimientos anteriores</label>
                                                                    <textarea class="form-control" rows="3" id="petPreviousDiseases" name="petPreviousDiseases" placeholder="Describir procedimientos"></textarea>
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label for="petPosiblesDiagnoses">Posibles Diagnosticos</label>
                                                                    <textarea class="form-control" rows="3" id="petPosiblesDiagnoses" name="petPosiblesDiagnoses" placeholder="Describir procedimientos"></textarea>
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label for="petDefinitiveDiagnoses">Diagnostico Definitivo</label>
                                                                    <textarea class="form-control" rows="3" id="petDefinitiveDiagnoses" name="petDefinitiveDiagnoses" placeholder="Describir procedimientos"></textarea>
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label for="petCboResponsibleTab">Responsable Ficha</label>
                                                                        <select class="form-control" name="petCboResponsibleTab" id="petCboResponsibleTab" >
                                                                            <option>Seleccione Doctor</option>
                                                                            <?php
                                                                            $sql = "Select doctors.objectId,doctors.doctor_name from doctors where doctors.objectId order by doctors.objectId ASC";
                                                                            $rec = mysql_query($sql);
                                                                            while ($row = mysql_fetch_array($rec)) {
                                                                                echo "<option value='" . $row['objectId'] . "'>" . $row['doctor_name'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="petCboResponsiblePet">Responsable Mascota</label>

                                                                        <select class="form-control" name="petCboResponsiblePet" id="petCboResponsiblePet" >
                                                                            <option >Seleccione Cliente</option>
                                                                            <?php
                                                                            $sql = "SELECT users.objectId,users.first_name,users.last_name FROM users WHERE users.objectId ORDER BY users.objectId desc";
                                                                            $rec = mysql_query($sql);
                                                                            while ($row = mysql_fetch_array($rec)) {
                                                                                echo "<option value='" . $row['objectId'] . "'>" . $row['first_name'] . "  " . $row['last_name'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>

                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="petCreationDate">Fecha de Creacion</label>
                                                                        <input class="form-control" value="<?php echo date("Y-m-d H:i:s") ?>" rows="3"  name="petCreationDate" id="petCreationDate" readonly>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" data-dismiss="modal" onClick="guardarFichaMascota();">Registrar</button>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

                                                        </div>
											</form>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        <!--termina modal para anamnesis-->

                                                        <!--Comienza modal historial-->

                                                        <div class="modal fade" id="historial" tableindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div  class="modal-dialog">   
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                                                                        <div class="col-sm-12"><label for=""> <h4>Ficha Clìnica Paciente<h4></label></div>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-3">
                                                                                                    <label for="petCboVacine">Vacuna</label>
                                                                                                    <select class="form-control" name="petCboVacine" id="petCboVacine" >
                                                                                                        <option value="Rural">Si</option>
                                                                                                        <option value="No">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-sm-3">
                                                                                                    <label for="petCboDeworning">Desparasitaciones</label>
                                                                                                    <select class="form-control" name="petCboDeworning" id="petCboDeworning" >
                                                                                                        <option value="Si">Si</option>
                                                                                                        <option value="No">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-sm-3">
                                                                                                    <label for="petCboDiet">Dieta</label>
                                                                                                    <select class="form-control" name="petCboDiet" id="petCboDiet" >
                                                                                                        <option value="Si">Si</option>
                                                                                                        <option value="No">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-sm-3">
                                                                                                    <label for="petPetProvenance">Procedencia</label>
                                                                                                    <select class="form-control" name="petPetProvenance" id="petPetProvenance" >
                                                                                                        <option value="Rural">Rural</option>
                                                                                                        <option value="Urbana">Urbana</option>
                                                                                                        <option value="Mixta">Mixta</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-3"><textarea class="form-control" rows="3" name="petAppliedProduct" id="petAppliedProduct" placeholder="Productos Aplicados"></textarea></div>
                                                                                                <div class="col-sm-3"><textarea class="form-control" rows="3" name="petDateDeworming" id="petDateDeworming" placeholder="Fechas Desparasitaciones"></textarea></div>
                                                                                                <div class="col-sm-3"><textarea class="form-control" rows="3" name="petDietApplied" id="petDietApplied" placeholder="Dietas Aplicadas"></textarea></div>

                                                                                                <div class="col-sm-3">
                                                                                                    <label for="petCboStatusReproductive">Estado Reproductivo</label>
                                                                                                    <select class="form-control" name="petCboStatusReproductive" id="petCboStatusReproductive" >
                                                                                                        <option value="Si">Si</option>
                                                                                                        <option value="No">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br/>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <label for="petObservatiosHistory">Observaciones</label>
                                                                                                    <textarea class="form-control" rows="3" name="petObservatiosHistory" id="petObservatiosHistory" placeholder="Otras Observaciones"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br/>

                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <label for="petPreviousDiagnostic">Diagnostico Anterior</label>
                                                                                                    <textarea class="form-control" rows="3" name="petPreviousDiagnostic" id="petPreviousDiagnostic" placeholder="Describir procedimientos"></textarea>
                                                                                                </div>
                                                                                            </div>

                                                                                            <br/>

                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <label for="petResponsibleHistory">Responsable Historial</label>
                                                                                                    <select class="form-control" name="petResponsibleHistory" id="petResponsibleHistory" >
                                                                                                        <option value="Donald Trump">Si</option>
                                                                                                        <option value="Hilary Clinton">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <label for="petOwner">Dueño Mascota</label>
                                                                                                    <select class="form-control" name="petOwner" id="petOwner" >
                                                                                                        <option value="Obama">Si</option>
                                                                                                        <option value="Michelle">No</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <label for="petCreationDate">Fecha de Creacion</label>
                                                                                                    <input class="form-control" rows="3"  name="petCreationDate"
                                                                                                    value="<?php echo date("Y-m-d H:i:s") ?>" id="petCreationDate" readonly>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Registrar</button>
                                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                                                        </div>
                                                                                        </div>

                                                                                        </div>
                                                                                        </div>
                                                                                        <!--Termina modal para Historial>
                                                                                         
                                                                                               
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
