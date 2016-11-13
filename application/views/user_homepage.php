<div class="alert alert-success alert-dismissable addSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong>Reserva agregada Exitosamente!!.<strong>
            </div>
            <div class="panel panel-default" id="userReserve">
                <!-- Default panel contents -->
                <div class="panel-heading">Servicios Ofrecidos</div>
                <div class="panel-body">
                    <p>Seleccione uno de nuestros Servicios</p>
                    <p><small class="text-muted">Nota: Los Item en color Rojo no están disponibles.</small></p>
                    <?php
                    if ($activeReservation == "true") {
                        echo"<p class='small' style='color:red;'>Solo puedes realizar un Máximo de 2 Reservas, para Agregar otras favor llame a Secretaria de Clinica Morita</p>";
                    }
                    ?>

                    <div class="input-group">
                        <span class="input-group-btn">
                            <label>Orden:</label> 
                            <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchUserServices" name = "sortService1" value = "" checked = "true">
                            Todos
                            <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchUserServices" name = "sortService1" value = "S" >
                            Cirugía
                            <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchUserServices" name = "sortService1" value = "O" > 
                            Otros</span></div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default searchUserServices" type="button">Buscar</button>
                        </span>
                        <input type="text" class="form-control searchUserServicesText" placeholder="Ingrese texto para buscar">               
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre del Servicio</th>
                            <th>Grupo</th>
                            <th style="text-align:right;padding-right:15px;">Precio</th>
                            <?php
                            if ($activeReservation == "false") {
                                echo'<th style="width:130px;"></th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($services as $row) {

                            echo "<tr>";
                            echo "<td class='vert serviceTitle'>" . $row['service_name'] . "</td>";
                            echo "<td class='vert serviceGroup'>" . $row['group'] . "</td>";
                            echo "<td class='vert servicePrice rightalignPadding'>$ " . $row['price'] . "</td>";
                            if ($activeReservation == "false") {
                                echo "<td class='vert'><button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-primary btn-sm addReservation'>Agregar Reserva</button></td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">&nbsp;</h4>
                        </div>

                        <div class="modal-body clearfix">
                            <div class="alert alert-info alert-dismissable" style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Advertencia!</strong> Llenar todos los campos.
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Doctor</h3>
                                    </div>
                                    <div class="panel-body">
                                        <select class="form-control reserveDoctorSelect">
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
                                <div id="datepicker"></div>
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
                                        <h5>Nombre de la Mascota: <span class="petNameUser"></span></h5>
                                        <h5>Fecha: <span class="reserveDate"></span></h5>
                                        <h5>Hora: <span class="reserveTime"></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary submitReservation">Enviar Reservación</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <div class="footer">
                <p>&copy; PetFile 2016</p>
            </div>

            </div>