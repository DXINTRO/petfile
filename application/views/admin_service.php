<div class="alert alert-success addServiceSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong></strong>
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
                <form action="addService" method="POST" id="addServiceAdmin" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Nombre del Servicio:</label>
                                <div class="col-sm-9">
                                    <div class="bs-component">
                                        <input type="text" class="form-control" name="serviceName" id="serviceName" placeholder="Ingresa un Servicio" required onkeypress="return soloLetras(event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Grupo del Servicio:</label>
                                <div class="col-sm-9">
                                    <div class="bs-component">
                                        <select class="form-control" name="groupName" id="groupName" >
                                            <option value="BASICO">BASICO</option>
                                            <option value="URGENCIA">URGENCIA</option>
                                            <option value="HIGENE">HIGENE</option>
                                            <option value="ODONTOLOGIA">ODONTOLOGIA</option>
                                            <option value="PROCEDIMIENTO">PROCEDIMIENTO</option>
                                            <option value="CIRUGIA">CIRUGIA</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Precio:</label>
                                <div class="col-sm-9">
                                    <div class="bs-component">
                                        <input  type="number" step="any" class="form-control" name="priceBox" id="priceBox" placeholder="Precio" min="0" required onkeypress="return numeros(event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="pk_form" value="0" class="pk_form"/>
                    <button type="submit" name="addservicebtn" class="btn btn-success pull-right">Guardar</button>
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
                    echo "<td class='vert price'>$ " . $row['price'] . "</td>";
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