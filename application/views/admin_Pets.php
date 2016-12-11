<div class="alert alert-success addpetSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong></strong>
</div>
<div class="panel panel-default" id="admin_Pets">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <span>Ficha Clinica </span>
    </div>
    <div class="panel-body clearfix">

        <div class="panel panel-default">
            <section>
                <table border="0" align="center">
                    <tr>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-3">
                            <div class="bs-component">
                                <input type="text" maxlength="30" class="form-control" id="Search_pet" placeholder="Buscar"  aria-required="true">
                            </div>
                        </div>
                        <label class="col-sm-3 control-label"><button id="nuevo-paciente" class="btn btn-primary btn-sm">Nueva Mascota</button></label>
                    </div>
                    </tr>
                </table>
            </section>
            <div class="registros" id="agrega-registros">
                <table class="table table-striped table-condensed table-hover">
                    <thead>
                        <tr>
                            <th width="100">Nombre</th>
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
                            $aaa .= '<tr>
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
        </div> 
    </div>
</div>
<!-- MODAL PARA EL REGISTRO DE MASCOTAS-->

<div class="modal fade" id="registra-paciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b>Registro de Pacientes</b></h4>
            </div>
            <div class="modal-body">
                <form id="formulario1" class="formulario"  onsubmit="return false;" >
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label ></label>
                                <input type="text" required="required" id="id-pacie" name="id-pacie" readonly style="visibility:hidden; height:5px;"/>
                            </div>
                            <div class="form-group">
                                <label >Nombre Mascota:</label>
                                <input type="text" class="form-control" id="petName" name="petName" onkeypress="return soloLetras(event)" minlength="5" required>
                            </div><div class="form-group">
                                <label >Especie:</label>
                                <select class="form-control" name="petSpecies" id="petSpecies" >
                                    <option value="Perro">Perro</option>
                                    <option value="Gato">Gato</option>   
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Raza:</label>
                                <input type="text" class="form-control" name="petRace" id="petRace" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required>

                            </div>
                            <div class="form-group">
                                <label >Genero:</label>
                                <select class="form-control" name="petGender" id="petGender" >
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>   
                                </select>
                            </div><div class="form-group">
                                <label for="usr">Edad:</label>
                                <input type="number" class="form-control" name="petAge" id="petAge" placeholder="" maxlength="2" required>
                            </div>
                            <div class="form-group">
                                <label >Color:</label>
                                <input type="text" class="form-control" name="petColor" id="petColor" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required>
                            </div>
                            <div class="form-group">
                                <label >Seleccione un Cliente:</label>
                                <select class="form-control" name="petOwnerReg" id="petOwnerReg" >
                                </select>     
                            </div>
                            <div class="form-group">
                                <label >Observaciones:</label>
                                <textarea  class="form-control" name="petHistory" id="petHistory" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required></textarea>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Registrar" onclick="agregaPaciente()" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA ANAMNESIS-->
<div class="modal fade" id="anamnesis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div  class="modal-dialog">   
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b>Ficha de Atenciòn Mèdica</b></h4>
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
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="petObservation">Medicamentos Prohibidos para la Mascota</label>
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
                        <div class="col-md-4">
                            <label for="petCboResponsibleTab">Responsable Ficha</label>
                            <select class="form-control" name="petCboResponsibleTab" id="petCboResponsibleTab" >
                                <option>Seleccione Doctor</option>
<!--                                                                    <?phSp
                                $sql = "Select doctors.objectId,doctors.doctor_name from doctors where doctors.objectId order by doctors.objectId ASC";
                                $rec = mysql_query($sql);
                                while ($row = mysql_fetch_array($rec)) {
                                    echo "<option value='" . $row['objectId'] . "'>" . $row['doctor_name'] . "</option>";
                                }
                                ?>-->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="petCboResponsiblePet">Responsable Mascota</label>

                            <select class="form-control" name="petCboResponsiblePet" id="petCboResponsiblePet" >
                                <option >Seleccione Cliente</option>
                                <!--<?phSp
                                $sql = "SELECT users.objectId,users.first_name,users.last_name FROM users WHERE users.objectId ORDER BY users.objectId desc";
                                $rec = mysql_query($sql);
                                while ($row = mysql_fetch_array($rec)) {
                                    echo "<option value='" . $row['objectId'] . "'>" . $row['first_name'] . "  " . $row['last_name'] . "</option>";
                                }
                                ?>-->
                            </select>

                        </div>
                        <div class="col-md-4">
                            <label for="petCreationDate">Fecha de Creacion</label>
                            <input class="form-control" value="<?php echo date("Y-m-d H:i:s") ?>"   name="petCreationDate" id="petCreationDate" readonly>
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

<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div  class="modal-dialog">   
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b>Ficha de Clinica Mèdica</b></h4>
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
                        <input class="form-control"   name="petCreationDate"
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
                <button type="button" onclick="eliminarPaciente($(this))" class="btn btn-primary confirmAction">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="footer">
    <p>&copy; PetFile 2016</p>
</div>
</div>
