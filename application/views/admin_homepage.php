<div class="alert alert-success addUserSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong></strong>
</div>
<div class="panel panel-default" id="adminAddUser">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <span>USUARIOS DEL SISTEMA PETFILE</span>
    </div>
    <div class="panel-body clearfix">
        <div class="panel panel-default panelAddEditUser">
            <div class="panel-heading clearfix">
                <a style="color:#000000;" data-toggle="collapse" id="accordion" data-parent="#accordion" href="#addUsercollpase">
                    <span class="glyphicon glyphicon-hand-right"></span> 
                    <h3 class="panel-title" style="display:inline;">Agregar Usuario</h3></a></div>
            <div class="panel-body panel-collapse collapse clearfix" id="addUsercollpase">

                <form action="admin/addUser" method="POST" id="addUserAdmin" name="adduseradmin" class="clearfix" >
                    <div class="form-group col-lg-3">
                        <label for="inputEmail">Rut Usuario </label>
                        <input type="text" class="form-control" name="inputRut" id="inputRut" placeholder="Ingrese Rut " required="" pattern="\d{3,8}-[\d|kK]{1}" title="Debe ser un Rut válido">
                    </div>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th style="width:200px;">Email</th>
                                <th>Usuario</th>
                                <th style="">Nombre</th>
                                <th style="">Apellido</th>
                                <th style="">Nivel de Usuario</th>
                            </tr>
                            <tr>
                                <td><input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Ingresar Email" required></td>
                                <td><input type="text" class="form-control" name="username" id="username" placeholder="Nombre de Usuario" required onkeypress="return soloLetras(event)"></td>
                                <td><input type="text" class="form-control" name="firstName" id="firstName" placeholder="Nombre"  required onkeypress="return soloLetras(event)"></td>
                                <td><input type="text" class="form-control" name="lastName" id="lastName" placeholder="Apellido" required onkeypress="return soloLetras(event)"></td>
                                <td>
                                    <select class="form-control" name="userLevel" id="userLevelAdd">
                                        <option value=1>Cliente</option>
                                        <option value=2>Super Admin</option>
                                        <option value=3>Doctor</option>
                                        <option value=4>Secretaria</option>
                                        <option value=5>Contabilidad</option>
                                        <option value=6>Administrador Clínica</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="width:200px;">Direccion</th>
                                <th>Comuna</th>
                                <th style="">Numero Contacto</th>
                                <th style="">Contraseña</th>
                                <th style="">Conf. Contraseña</th>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="address" id="address" placeholder="Direccion" required ></td>
                                <td><input type="text" class="form-control" name="city" id="city" placeholder="Comuna" required onkeypress="return soloLetras(event)"></td>
                                <td><input class="form-control" name="contactNo" id="contactNo" placeholder="Numero Contacto" required onkeypress="return numeros(event)"></td>
                                <td> <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Contraseña" minlength="6" maxlength="50" required></td>
                                <td> <input type="password" class="form-control" name="confirm_inputPassword" id="confirm_inputPassword" placeholder="Confirmar Contraseña" minlength="6" maxlength="50" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <div >
                        <div class="form-group">
                            <label for="petHistory">Observaciones</label>
                            <textarea class="form-control" name="Observacion" id="Observacion" placeholder="Observacion"></textarea>
                        </div>
                    </div>
                    <div >
                        <div class="row">
                            <div >
                                <button type="submit"  class="btn btn-success pull-right" style="margin-left: 2em;">Guardar</button>
                            </div>
                            <div> 
                                <button type="button" id="resett" class="btn btn pull-right" style="margin-left: 2em;">Cancelar</button>
                            </div>
                            <div> 
                                <button type="button" id="addpetsbtn" class="btn btn-warning pull-right" style="margin-left: 2em;">Agregar Paciente</button>
                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="pk_form" value="0" class="pk_form"/>
                </form>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <a style="color:#000000;" data-toggle="collapse" data-parent="#accordion" href="#generateUserReportcollapse">
                    <span class="glyphicon glyphicon-hand-right"></span> 
                    <h3 class="panel-title" style="display:inline;">Generar Reporte</h3>
                </a>

            </div>
            <div class="panel-body panel-collapse collapse" id="generateUserReportcollapse">
                <div class="alert alert-danger" style="display:none;">
                    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                    <strong></strong>
                </div>  
                <form action="admin/generateUserPDF" method="POST" id="generatePDF">                    
                    <div class="row">
                        <div class="col-md-6 noPadding">
                            <div class="col-md-12">
                                <label> Desde</label></div>
                            <div class="col-md-6">
                                <select class="form-control reportMonthFrom" name="reportMonthFrom">
                                    <option value="01" selected="selected">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control reportYearFrom" name="reportYearFrom">
                                    <option value="0">Año</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 noPadding">
                            <div class="col-md-12">
                                <label> Hasta</label></div>
                            <div class="col-md-6">
                                <select class="form-control reportMonthTo" name="reportMonthTo">
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control reportYearTo" name="reportYearTo">
                                    <option value="0">Año</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 clearfix">
                            <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="generateUserReport">Generar Reporte</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


        <div class="input-group">
            <span class="input-group-btn">
                <button class="btn btn-default searchManageUser" type="button">Buscar</button>
            </span>
            <input type="text" class="form-control searchManageUserText" placeholder="Ingresar email de Usuario">
        </div>
    </div>

    <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
        <!-- Table -->
        <table class="table table-hover" id="adminUsersTable">
            <thead>
                <tr>
                    <th style="width:110px;">Rut</th>
                    <th style="">Email</th>
                    <th>Usuario</th>
                    <th style="">Nombre</th>
                    <th style="">Apellido</th>
                    <th style="">Nivel de Usuario</th>
                    <th style="width:150px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $row) {
                    $rut = (isset($row['user_rut'])) ? $row['user_rut'] : '';
                    echo "<tr>";
                    echo "<td class='vert userRut'>" . $rut . "</td>";
                    echo "<td class='vert userEmail'>" . $row['email'] . "</td>";
                    echo "<td class='vert userUsername'>" . $row['username'] . "</td>";
                    echo "<td class='vert userFirstName'>" . $row['first_name'] . "</td>";
                    echo "<td class='vert userLastName'>" . $row['last_name'] . "</td>";
                    echo "<td class='vert userUserLevel'>";
                    if ($row['user_level'] == 1) {
                        echo "<span data-userlevel=" . $row['user_level'] . ">Cliente</span>";
                    } else if ($row['user_level'] == 2) {
                        echo "<span data-userlevel=" . $row['user_level'] . ">Super Admin</span>";
                    } else if ($row['user_level'] == 3) {
                        echo "<span data-userlevel=" . $row['user_level'] . ">Doctor</span>";
                    } else if ($row['user_level'] == 4) {
                        echo "<span data-userlevel=" . $row['user_level'] . ">Secretaria</span>";
                    } else if ($row['user_level'] == 5) {
                        echo "<span data-userlevel=" . $row['user_level'] . ">Contabilidad</span>";
                    } else if ($row['user_level'] == 6) {
                        echo "<span data-userlevel=" . $row['user_level'] . ">Admin de Productos</span>";
                    }


                    echo "</td>";
                    echo "<td class='vert'>";
                    echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-primary btn-sm editUserFromAdmin pull-left' style='margin-right: 5px;'>Editar</button>";
                    echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-danger btn-sm removeUserFromAdmin pull-right'>Borrar</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirma Eliminar</h4>
            </div>

            <div class="modal-body clearfix">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary confirmAction">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="generateReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Generar Reporte</h4>
            </div>

            <div class="modal-body clearfix">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="registra-paciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 54%;">
        <div class="modal-content">
           <form  id="addpets"  method="post" class="form-horizontal">
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
<!--                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Seleccione un Cliente:</label>
                                    <div class="col-sm-9">
                                        <div class="bs-component">
                                            <select class="form-control" name="petOwnerReg" id="petOwnerReg" >
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
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
            <div class="modal-footer">
                <input type="submit" value="Guardar" class="btn btn-success" />
            </div>
                    </form>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; PetFile 2016</p>
</div>

