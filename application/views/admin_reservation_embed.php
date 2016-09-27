<div class="alert alert-success addReservationSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong><strong>
            </div>
            <div class="panel panel-default" id="adminManageReservation">
                <!-- Default panel contents -->
                <div class="panel-heading">Administración de Reservas</div>
                <div class="panel-body">
                    <p>Las Reservas de usuarios pueden ser confirmadas y canceladas aquí . También se pueden añadir nuevas reservas.</p>

                    <div class="panel-group" id="accordion" style="margin-bottom:10px;">
                        <div class="panel panel-default" id="addOrEditReservation">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <span class="glyphicon glyphicon-hand-right"></span> 
                                        <span>Agregar una Reserva</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="alert alert-info alert-dismissable" style="display:none;">
                                    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                                    <strong>Advertencia!</strong>Llenar todos los campos.
                                </div>
                                <div class="panel-body clearfix">
                                    <form action="addReservation" method="POST" id="addReservationAdmin">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Doctor</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <select class="form-control reserveDoctorSelect" name="doctorsId">
                                                        <option>Seleccione un Doctor</option>
                                                        <?php
                                                        foreach ($list_of_doctors as $row) {
                                                            echo "<option value='" . $row['objectId'] . "'>" . $row['doctor_name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="datepicker" style="margin:0 45px;"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Hora de Reserva</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <select class="form-control reserveTimeSelect">
                                                        <option value=0>Hora</option>
                                                        <option value="10:00 AM">10:00 AM</option>
                                                        <option value="11:00 AM">11:00 AM</option>
                                                        <option value="12:00 AM">12:00 PM</option>
                                                        <option value="1:00 PM">1:00 PM</option>
                                                        <option value="2:00 PM">2:00 PM</option>
                                                        <option value="3:00 PM">3:00 PM</option>
                                                        <option value="4:00 PM">4:00 PM</option>
                                                        <option value="5:00 PM">5:00 PM</option>
                                                        <option value="6:00 PM">6:00 PM</option>
                                                        <option value="7:00 PM">7:00 PM</option>
                                                        <option value="8:00 PM">8:00 PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Detalle de Reserva</h3>
                                                </div>
                                                <div class="panel-body" style="padding: 5px 15px;">

                                                    <label>Servicio </label><select class="adminServicesReservation" name="adminServicesReservation" style="width:100%; height:34px;" id="">
                                                        <?php
                                                        foreach ($serviceslist as $row) {
                                                            echo '<option value=' . $row['objectId'] . '>' . $row['service_name'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>

                                                    <input type="email" class="form-control" name="reservationUserEmail" id="reservationUserEmail" placeholder="User Email" required>
                                                    <h5>Nombre de Mascota: <span class="petName"></span></h5>
                                                    <h5>Fecha: <span class="reserveDate"></span></h5>
                                                    <h5>Hora: <span class="reserveTime"></span></h5>
                                                </div>
                                            </div>
                                            <input type="hidden" name="reservationId" id="reservationId" value="" />
                                            <button type="submit" name="adminAddReservation" id="addReservationButton" class="btn btn-success pull-right" style="margin-top:10px;">Agregar Reserva</button>
                                            <button type="button" name="backToAddReservation" id="backToAddReservation" class="btn btn-success pull-right" id="saveChangesReservation" style="margin-top:10px; margin-right:10px; display:none; display:none;">Regresar</button>
                                            <button type="submit" name="editadminAddReservation" class="btn btn-primary pull-right" id="saveChangesReservation" style="margin-top:10px; margin-right:10px; display:none;">Guardar Cambios</button>

                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default panelAddEditUser">
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
                            <form action="generateReservationReport" method="POST" id="generatePDF">

                                <div class="row">


                                    <div class="col-md-6 noPadding">
                                        <div class="col-md-12">
                                            <label> Desde</label></div>
                                        <div class="col-md-6">
                                            <select class="form-control reportMonthFrom" name="reportMonthFrom">
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
                                            <select class="form-control reportYearFrom" name="reportYearFrom">
                                                <option value="0">Year</option>
                                                <option value="2016" selected >2016</option>
                                                <option value="2015" >2015</option>
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
                                                <option value="2016" selected >2016</option>
                                                <option value="2015" >2015</option>
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
                                        <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="generateReservationReport">Generar Reporte</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default adminSearchReservation" type="button">Buscar</button>
                        </span>
                        <input type="text" class="form-control adminSearchReservationText" placeholder="Enter USER EMAIL">
                    </div>
                </div>

                <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
                    <!-- Table -->
                    <table class="table table-hover" id="adminReservationTable">
                        <thead>
                            <tr>
                                <th style="width:200px;">ID de Reserva</th>
                                <th style="width:200px;">Email</th>
                                <th style="width:260px;">Servicio</th>
                                <th style="width:135px">Fecha de Hora</th>
                                <th style="width:135px">Fecha Tomada</th>
                                <th style="">Hora</th>
                                <th style="text-align:right;padding-right:20px;">Precio</th>
                                <th style="width:130px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reservations as $row) {

                                $date1 = date('d-m-y H:i A', strtotime(str_replace('-', '/', '' . $row['reserveDate'] . ' ' . $row['reserveTime'] . '')));
                                $dateToday = date('d-m-y H:i A');
                                if ($date1 > $dateToday && $row['confirmed'] == "0") {
                                    echo "<tr>";
                                } else if ($row['confirmed'] == "1") {
                                    echo "<tr>";
                                } else if ($row['confirmed'] == "2") {
                                    echo "<tr style='color:#108FB8;'>";
                                } else {
                                    echo "<tr style='color:#F53838;'>";
                                }
                                echo "<td class='vert objectId' >" . $row['reservationobjectId'] . "</td>";
                                echo "<td class='vert userEmail' style='word-wrap: break-word;word-break: break-all;'>" . $row['email'] . "</td>";
                                echo "<td class='vert serviceTitle' data-serviceId='" . $row['serviceObjectId'] . "'>" . $row['service_name'] . "</td>";
                                echo "<td class='vert serviceDate'>" . $row['reserveDate'] . " <br/> " . "</td>";
                                echo "<td class='vert serviceDate'>" . " " . date('m/d/Y', strtotime($row['timestamp'])) . "</td>";
                                echo "<td class='vert serviceTime' >" . $row['reserveTime'] . "</td>";
                                echo "<td class='vert servicePrice rightalignPadding'>&#8369; " . $row['price'] . "</td>";
                                echo "<td class='vert'>";
                                if ($date1 > $dateToday && $row['confirmed'] == "0") {
                                    echo "<p style='font-size:10px;'>Status: Pre Approval</p>";
                                    echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-primary btn-sm adminEditReservation pull-left' style='margin-right: 5px;'>Editar</button>";
                                    echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm adminDeleteReservation pull-right'>Borrar</button>";
                                    echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-warning btn-sm adminApproveReservation pull-right' style='margin-top: 4px;width: 100%;'>Approve</button>";
                                } else if ($row['confirmed'] == "1") {
                                    echo "<p style='font-size:10px;'>Status: Hecho</p>";
                                    echo "<button style='width:100%;' type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm adminDeleteReservation pull-right'>Borrar</button>";
                                } else if ($row['confirmed'] == "2") {
                                    echo "<p style='font-size:10px;'>Estado: Pendiente</p>";
                                    echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-warning btn-sm adminConfirmReservation pull-right' style='margin-top: 4px;width: 100%;margin-bottom:10px;'>Hecho</button>";
                                    echo "<button style='width:100%;' type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm adminDeleteReservation pull-right'>Borrar</button>";
                                } else {
                                    echo "<p style='font-size:10px;'>Status: Expired!</p>";
                                    echo "<button style='width:100%;' type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm adminDeleteReservation pull-right'>Borrar</button>";
                                }


                                echo "</td>";
                                echo "<tr>";
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
                            <h4 class="modal-title" id="myModalLabel">Confirma Eliminación</h4>
                        </div>

                        <div class="modal-body clearfix">
                           Esta seguro de eliminar?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary confirmAction" data-confirm="confirmDeleteAdmin">Aceptar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <!-- Modal -->
            <div class="modal fade" id="processReservationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">&nbsp;</h4>
                        </div>

                        <div class="modal-body clearfix">
                            <!--    <div class="row">
                                 <div class="col-md-4"><label>Pet to be treated:</label></div>
                                 <div class="col-md-4"><input name='petAssigned 'type="text"></div>
                               </div>
                               <br />
                               <div class="row">
                                 <div class="col-md-4"><label>Assigned doctor:</label></div>
                                 <div class="col-md-4"><input name='doctorAssigned 'type="text"></div>
                               </div> -->


                        </div>

                        <div class="modal-footer">

                            <form action="confirmReservation" method="POST">
                                <input type="hidden" name='registrationId' class='registrationId' value=''>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary confirmAction" id="processReservationBTN" data-confirm="processReservation">Proceso de Reserva e Impresión de Documento</button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->


            <!-- Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Confirma Eliminación</h4>
                        </div>

                        <div class="modal-body clearfix">
                            Esta seguro de eliminar?</div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary confirmAction" data-confirm="confirmDeleteAdmin">Aceptar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <!-- Modal -->
            <div class="modal fade" id="approveReservationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">...</h4>
                        </div>

                        <div class="modal-body clearfix">
                            <!--    <div class="row">
                                 <div class="col-md-4"><label>Pet to be treated:</label></div>
                                 <div class="col-md-4"><input name='petAssigned 'type="text"></div>
                               </div>
                               <br />
                               <div class="row">
                                 <div class="col-md-4"><label>Assigned doctor:</label></div>
                                 <div class="col-md-4"><input name='doctorAssigned 'type="text"></div>
                               </div> -->


                        </div>

                        <div class="modal-footer">

                            <form action="approveReservation" method="POST">
                                <input type="hidden" name='registrationId' class='registrationId' value=''>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary confirmAction" id="processReservationBTN" data-confirm="processReservation">Confirmar la Reserva</button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->

            </div>