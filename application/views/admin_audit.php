        <div class="alert alert-success addUserSuccess" style="display:none;">
                  <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                  <strong></strong>
        </div>
        <div class="panel panel-default" id="adminAddUser">
          <!-- Default panel contents -->
          <div class="panel-heading">
            <span>Logs</span>

          </div>

          <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
          <!-- Table -->
          <table class="table table-hover" id="adminUsersTable">
            <thead>
              <tr>
                <th style="width:150px;">Timestamp</th>
                <th>Event</th>
                <th>Description</th>
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

        <!-- Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
              </div>
              
              <div class="modal-body clearfix">
               
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary confirmAction">Yes</button>
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
                <h4 class="modal-title" id="myModalLabel">Generate Report</h4>
              </div>
              
              <div class="modal-body clearfix">
               
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

      <div class="footer">
        <p>&copy; PetFile 2016</p>
      </div>

    </div>