        <div class="alert alert-success addUserSuccess" style="display:none;">
                  <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                  <strong></strong>
        </div>
        <div class="panel panel-default" id="adminAddUser">
          <!-- Default panel contents -->
          <div class="panel-heading">
            <span>REGISTRO</span>

          </div>

          <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
          <!-- Table -->
          <table class="table table-hover" id="adminUsersTable">
            <thead>
              <tr>
                <th style="width:150px;">Fecha y Hora</th>
                <th>Evento</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              <?php 

              foreach ($audits as $row){

                echo "<tr>";
                echo "<td class='vert userEmail'>".$row['time']."</td>";
                echo "<td class='vert userUsername'>".$row['type']."</td>";
                echo "<td class='vert userFirstName'>".$row['description']."</td>";
                echo "</tr>";
                }
              ?>
            </tbody>
          </table>

        </div>

        </div>

      
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmar/Eliminar</h4>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

      <div class="footer">
        <p>&copy; PetFile 2016</p>
      </div>

    </div>