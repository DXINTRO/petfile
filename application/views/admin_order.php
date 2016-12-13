<div class="alert alert-success addOrderSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong></strong>
            </div>
            <div class="panel panel-default" id="adminUsersOrder">
                <!-- Default panel contents -->
                <div class="panel-heading">Ver Recetas de Pacientes</div>
                <div class="panel-body">
                    <p>
                        Puede buscar Una recetta de un Paciente aquí .</p>

                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default searchOrderOfUser" type="button">Buscar</button>
                        </span>
                        <input type="text" class="form-control" name="searchUserEmail" id="searchUserEmail" placeholder="Filtro">
                    </div>
                </div>

                <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
                    <!-- Table -->
                       <div class="registros" id="agrega-registros">
                <table class="table table-striped table-condensed table-hover">
                    <thead>
                        <tr>
                            <th width="70">N° Receta</th>
                            <th width="100">Nombre</th>
                            <th width="70">Especie</th>
                            <th width="100">Raza</th>
                            <th width="70">Sexo</th>
                            <th width="150">Rut Cliente</th>
                            <th width="150">Nombre Cliente</th>
                            <th width="150">Fecha</th>
                            <th width="50">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $aaa = '';  
                        foreach ($TABLE_REGISTROS as $dat) {
                            $aaa .= '<tr data-dataid="' . $dat['idprescription'] . '">
                                <td>' . $dat['idprescription'] . '</td>
                                <td>' . $dat['petName'] . '</td>
                                <td>' . $dat['petSpecies'] . '</td>
                                <td>' . $dat['petRace'] . '</td>
                                <td>' . $dat['petGender'] . '</td>
                                <td>' . $dat['user_rut'] . '</td>
                                <td>' . $dat['first_name'] . '</td>
                                <td>' . $dat['Fecha_creacion_prescription'] . '</td>
                                <td><button type="button"  id="PrintRecetta" class="btn btn-default btn-xs">Print <i class="fa fa-print" aria-hidden="true"></i></button> </td>
                          </tr> ';
                        }
                        echo $aaa;
                        ?>

                    </tbody>
                </table>
            </div>

                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>

                        <div class="modal-body clearfix">

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary confirmAction" data-formSubmit="form">Aceptar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="footer">
                <p>&copy; PetFile 2016</p>
            </div>
