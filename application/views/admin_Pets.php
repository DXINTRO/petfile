<style>span.multiselect-native-select{position:relative}span.multiselect-native-select select{border:0!important;clip:rect(0 0 0 0)!important;height:1px!important;margin:-1px -1px -1px -3px!important;overflow:hidden!important;padding:0!important;position:absolute!important;width:1px!important;left:50%;top:30px}.multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li.multiselect-group label{margin:0;padding:3px 20px 3px 20px;height:100%;font-weight:700}.multiselect-container>li.multiselect-group-clickable label{cursor:pointer}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}</style>
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
    <div class="modal-dialog modal-lg" style="width: 54%;">
        <div class="modal-content">
            <form  id="addpets"  method="post"   action="addPets" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><b>Registro de Pacientes</b></h4>
                </div>
                <div class="modal-body">
                    <section id="content" class="table-layout">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre Paciente:</label>
                                    <div class="col-sm-9">
                                        <div class="bs-component">
                                            <input type="text" class="form-control" id="petName" name="petName" onkeypress="return soloLetras(event)"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Especie:</label>
                                    <div class="col-sm-9">
                                        <div class="bs-component">
                                            <select class="form-control valid" name="petSpecies" id="petSpecies">
                                                <option value="Perro">Perro</option>
                                                <option value="Gato">Gato</option>
                                            </select> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Raza:</label>
                                    <div class="col-sm-9">
                                        <div class="bs-component">
                                            <input type="text" class="form-control" name="petRace" id="petRace" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Genero:</label>
                                    <div class="col-sm-9">
                                        <div class="bs-component">
                                            <select class="form-control" name="petGender" id="petGender" >
                                                <option value="Macho">Macho</option>
                                                <option value="Hembra">Hembra</option>   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Edad:</label>
                                    <div class="col-sm-9">
                                        <div class="bs-component">
                                            <input type="number" class="form-control" name="petAge" id="petAge" placeholder="" maxlength="2" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Color:</label>
                                    <div class="col-sm-9">
                                        <div class="bs-component">
                                            <input type="text" class="form-control" name="petColor" id="petColor" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Seleccione un Cliente:</label>
                                    <div class="col-sm-9">
                                        <div class="bs-component">
                                            <select class="form-control" name="petOwnerReg" id="petOwnerReg" >
                                                <?php
                                                foreach ($list_of_users as $row) {
                                                    echo "<option value='" . $row['objectId'] . "'>" . $row['first_name'] . "-" . $row['last_name'] . "</option>";
                                                }
                                                ?>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Observaciones:</label>
                                    <div class="col-sm-7">
                                        <div class="bs-component">
                                            <textarea  class="form-control" name="petHistory" id="petHistory" onkeypress="return soloLetras(event)" placeholder="" minlength="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer"> <input type="hidden" name="pk_form" value="0" class="pk_form"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Guardar" class="btn btn-success" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL PARA ANAMNESIS-->
<div class="modal fade" id="anamnesis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="
         width: 50%;
         ">    
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b>Ficha de Atenciòn Mèdica</b></h4>
            </div>
            <form id="fichaAtention"   action="addfichaAtention"  class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="lastName">Mascota</label>
                            <input type="text" class="form-control" id="petname" name="petname" value="..." readonly />
                        </div>
                    </div>   
                    <br/>
                    <br/>
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
                            <select class="form-control" name="thickness" id="thickness" >
                                <option value="<1 Segundo"> mayor 1 Segundo</option>
                                <option value=">1 Segundo"> menor 1 Segundo</option>   
                            </select>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Medicamentos Prohibidos para la Mascota</label>
                                <div class="col-sm-12">
                                    <div class="bs-component">
                                        <select size="5" name="lstmedicament[]" multiple="multiple" id="lstmedicament">
                                            <?php
                                            foreach ($products as $row) {
                                                echo "<option value='" . $row['objectId'] . "'>" . substr($row['product_name'], 0, 25) . "</option>";
                                            }
                                            ?>
                                        </select>   
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="bs-component">
                                        <textarea class="form-control" rows="3" id="lstmedicament_textarea" name="lstmedicament_textarea" placeholder="Otros"></textarea>
                                    </div>
                                </div>
                            </div>
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
                            <textarea class="form-control"  rows="3" id="petPosibles_Diagnosticos" name="petPosibles_Diagnosticos" placeholder="Describir procedimientos"></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="petDefinitiveDiagnoses">Diagnostico Definitivo</label>
                            <textarea class="form-control" rows="3" id="petDiagnostico_Definitivo" name="petDiagnostico_Definitivo" placeholder="Describir procedimientos"></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="petCboResponsibleTab">Responsable Ficha</label>
                            <select class="form-control" name="Responsable_doc" id="Responsable_doc" >
                                <option>Seleccione Doctor</option>
                                <?php
                                foreach ($list_of_doc as $row) {
                                    echo "<option value='" . $row['objectId'] . "'>" . $row['doctor_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="petCboResponsiblePet">Responsable Mascota</label>

                            <select class="form-control" name="userid" id="userid" >
                                <option >Seleccione Cliente</option>
                                <?php
                                foreach ($list_of_users as $row) {
                                    echo "<option value='" . $row['objectId'] . "'>" . $row['first_name'] . "-" . $row['last_name'] . "</option>";
                                }
                                ?>

                            </select>

                        </div>
                        <div class="col-md-4">
                            <label for="petCreationDate">Fecha de Creacion</label>
                            <input class="form-control" value="<?php echo date("Y-m-d H:i:s") ?>"   name="petCreationDate" id="petCreationDate" readonly>
                        </div>
                    </div>

                </div>
                <div class="modal-footer"> <input type="hidden" name="pk_form" value="0" class="pk_formA"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" >Guardar</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!--termina modal para anamnesis-->

<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div  class="modal-dialog">   
        <form  id="historialform"  method="post"   action="addHistory" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><b>Ficha de Clinica Mèdica</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="petCboVacine">Vacuna</label>
                            <select class="form-control" name="petCboVaccine" id="petCboVaccine" >
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="petCboDeworning">Desparasitaciones</label>
                            <select class="form-control" name="petCboDeworming" id="petCboDeworming" >
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
                        <div class="col-sm-3"><textarea class="form-control" rows="3" name="petAppliedProducts" id="petAppliedProducts" placeholder="Productos Aplicados"></textarea></div>
                        <div class="col-sm-3"><textarea class="form-control" rows="3" name="petDateDeworming" id="petDateDeworming" placeholder="Fechas Desparasitaciones"></textarea></div>
                        <div class="col-sm-3"><textarea class="form-control" rows="3" name="petDietApplied" id="petDietApplied" placeholder="Dietas Aplicadas"></textarea></div>

                        <div class="col-sm-3">
                            <label for="petCboStatusReproductive">Estado Reproductivo</label>
                            <select class="form-control" name="petCboReproductiveStatus" id="petCboReproductiveStatus" >
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="petObservatiosHistory">Observaciones</label>
                            <textarea class="form-control" rows="3" name="petObservationHistory" id="petObservationHistory" placeholder="Otras Observaciones"></textarea>
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
                            <select class="form-control" name="petCboResponbibleHistory" id="petCboResponbibleHistory" >
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="petOwner">Dueño Mascota</label>
                            <select class="form-control" name="petCboPetOwner" id="petCboPetOwner" >
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="petCreationDate">Fecha de Creacion</label>
                            <input class="form-control"   name="petCreationDate"
                                   value="<?php echo date("Y-m-d H:i:s") ?>" id="petCreationDate" readonly>
                        </div>
                    </div>

                </div>
                <div class="modal-footer"> <input type="hidden" name="pk_form" value="0" class="pk_formH"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" >Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                <button type="button" id="elimina_paciente" class="btn btn-primary confirmAction">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="prescription" tabindex="-1" role="dialog" aria-labelledby="prescriptionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="prescriptionLabel">Receta Morita</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Paciente:</label>
                            <div class="col-sm-12">
                                <div class="bs-component">
                                    <p class="text-left Paciente">Left aligned text.</p>
                                </div>
                            </div>
                        </div>
                    </div>
         
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Especie:</label>
                            <div class="col-sm-12">
                                <div class="bs-component">
                                    <p class="text-left Especie">Left aligned text.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Propietario:</label>
                            <div class="col-sm-12">
                                <div class="bs-component">
                                    <p class="text-left Propietario">Left aligned text.</p>
                                </div>
                            </div>
                        </div>
                    </div>
               
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">RUT:</label>
                            <div class="col-sm-12">
                                <div class="bs-component">
                                    <p class="text-left RUT">Left aligned text.</p>
                                </div>
                            </div>
                        </div>
                    </div>
              
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Domicilio:</label>
                            <div class="col-sm-9">
                                <div class="bs-component">
                                    <p class="text-left Domicilio">Left aligned text.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                              <label class="col-sm-12 control-label">ContraIndicaciones:</label>
                            <div class="col-sm-12">
                                <p class="text-left ContraIndicaciones">Left aligned text.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">RP:</label>
                            <div class="col-sm-12">
                                <div class="bs-component">
                                    <textarea class="form-control" rows="13" name="petObservationHistory" id="petObservationHistory" placeholder="Receta"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-9">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-9">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="bs-component">
                                    <p class="text-left"><?php echo date("Y-m-d H:i:s") ?></p>
                                </div>
                            </div>
                            <label class="col-sm-12 control-label">Fecha</label>
                        </div>
                    </div>
           
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="bs-component">
                                    <p class="text-left">____________________</p>
                                </div>
                            </div>
                            <label class="col-sm-12 control-label">Firma</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> <input type="hidden" name="pk_form" value="0" class="pk_formP"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p>&copy; PetFile 2016</p>
</div>
</div>
