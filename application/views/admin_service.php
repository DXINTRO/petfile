<div class="alert alert-success addServiceSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong><strong>
            </div>

            <div class="panel panel-default" id="adminAddService">
                <!-- Default panel contents -->
                <div class="panel-heading">Listado de Servicios</div>
                <div class="panel-body">
                    <div class="panel panel-default panelAddEditService">
                        <div class="panel-heading clearfix">
                            <a style="color:#000000;" data-toggle="collapse" data-parent="#accordion" href="#addServicecollapse">
                                <span class="glyphicon glyphicon-hand-right"></span> 
                                <h3 class="panel-title" style="display:inline;">Agregar un Servicio</h3></a></div>
                        <div class="panel-body panel-collapse collapse" id="addServicecollapse">
                            <form action="addService" method="POST" id="addServiceAdmin" name="addServiceAdmin">
                                <table class="table table-hover" id="adminServiceTable">
                                    <thead>
                                        <tr>
                                            <th style="">Nombre del Servicio</th>
                                            <th style="">Grupo</th>
                                            <th style="">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" name="serviceName" id="serviceName" placeholder="Ingresa un Servicio" required></td>
                                            <td><input type="text" class="form-control" name="groupName" id="groupName" placeholder="Ingresa un Grupo" required></td>
                                            <td><input type="number" step="any" class="form-control" name="priceBox" id="priceBox" placeholder="Precio" min="0" required></td>    
                                        </tr>
                                    </tbody>

                                </table>
                                <button type="submit" name="addservicebtn" class="btn btn-success pull-right">Agregar Servicio</button>
                            </form>
                            <form action="updateService" method="POST" id="updateServiceAdmin" name="updateServiceAdmin" style="display:none;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="">Nombre del Servicio</th>
                                            <th style="">Grupo</th>
                                            <th style="">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                    <input type="hidden" name="serviceObjectIdUpdate" value="" id="serviceObjectIdUpdate">
                                    <td><input type="text" class="form-control" name="serviceNameUpdate" id="serviceNameUpdate" placeholder="Ingrese nombre del servicio" required></td>
                                    <td><input type="text" class="form-control" name="groupNameUpdate" id="groupNameUpdate" placeholder="Ingrese grupo" required></td>
                                    <td><input type="number" step="any" class="form-control" name="priceBoxUpdate" id="priceBoxUpdate" min="0" placeholder="Ingrese precio" required></td>    
                                    </tr>
                                    </tbody>
                                </table>
                                <button type="submit" name="updateservicebtn" class="btn btn-primary pull-right">Ingresar</button>
                                <button type="button" data-objectid="1" name="backtoadd" class="btn btn-success backToAddService pull-right" style="margin-right:10px;">Volver</button>

                            </form>

                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default searchServicesBtn" type="button">Buscar</button>
                        </span>
                        <input type="text" class="form-control searchServiceTextAdmin" placeholder="Ingresar texto del servicio">
                    </div>
                </div>

                <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
                    <!-- Table -->
                    <table class="table table-hover" id="adminServiceTables">

                        <thead>
                            <tr>
                                <th style="width:110px;">ID del Servicio</th>
                                <th style="width:360px;">Nombre del Servicio</th>
                                <th style="width:140px;">Grupo</th>
                                <th style="width:150px;">Precio</th>
                                <th style="width:160px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($services as $row) {
                                echo "<tr>";
                                echo "<td class='vert servicesId'>" . $row['objectId'] . "</td>";
                                echo "<td class='vert servicesName'>" . $row['service_name'] . "</td>";
                                echo "<td class='vert group'>" . $row['group'] . "</td>";
                                echo "<td class='vert price'>" . $row['price'] . "</td>";
                                echo "</td>";
                                echo "<td class='vert'>";
                                echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-primary btn-sm editServiceFromAdmin pull-left' style='margin-right: 5px;'>Editar</button>";
                                echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-danger btn-sm removeServiceFromAdmin pull-right'>Borrar</button>";
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
                            <h4 class="modal-title" id="myModalLabel">Confirmar Eliminar</h4>
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

            <div class="footer">
                <p>&copy; PetFile 2016</p>
            </div>

            </div>