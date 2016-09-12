        <div class="alert alert-success alert-dismissable addSuccess" style="display:none;">
                  <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                  <strong>Successfully added Reservation. You may view it in manage reservation page.<strong>
        </div>
        <div class="panel panel-default" id="userReserve">
          <!-- Default panel contents -->
          <div class="panel-heading">Services Offered</div>
          <div class="panel-body">
            <p>Choose from our variety of services. And press reserve button to make a reservation.</p>
            <p><small class="text-muted">Note: Items that are in red are currently not available.</small></p>
            <?php
                if($activeReservation =="true"){
                  echo"<p class='small' style='color:red;'>You've reach the maximum reservation..</p>";
                }
            ?>

             <div class="input-group">
              <span class="input-group-btn">
                   <label>Sort:</label> 
                <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchUserServices" name = "sortService1" value = "" checked = "true"> All
                <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchUserServices" name = "sortService1" value = "S" > Surgery
                <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchUserServices" name = "sortService1" value = "O" > Others
              </span>
            </div>
             <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default searchUserServices" type="button">Search</button>
              </span>
              <input type="text" class="form-control searchUserServicesText" placeholder="Enter keywords">               
            </div>
          </div>

          <!-- Table -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Group</th>
                <th style="text-align:right;padding-right:15px;">Price (Incl Tax)</th>
                <?php
                if($activeReservation =="false"){
                  echo'<th style="width:130px;"></th>';
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($services as $row){

                echo "<tr>";
                echo "<td class='vert serviceTitle'>".$row['service_name']."</td>";
                echo "<td class='vert serviceGroup'>".$row['group']."</td>";
                echo "<td class='vert servicePrice rightalignPadding'>&#8369; ".$row['price']."</td>";
                if($activeReservation =="false"){
                echo "<td class='vert'><button type='button' data-objectId='".$row['objectId']."' class='btn btn-primary btn-sm addReservation'>Add reservation</button></td>";
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
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>

              <div class="modal-body clearfix">
                <div class="alert alert-info alert-dismissable" style="display:none;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Warning!</strong> Fill up all the fields.
                </div>
            <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Doctor</h3>
                    </div>
                    <div class="panel-body">
            <select class="form-control reserveDoctorSelect">
                <option>Choose Doctor</option>
                <?php foreach ($list_of_doctors as $row){
                  echo "<option value='".$row['objectId']."'>".$row['doctor_name']."</option>";
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
                      <h3 class="panel-title">Reservation Time</h3>
                    </div>
                    <div class="panel-body">
                      <select class="form-control reserveTimeSelect">
                        <option value=0>Time</option>
                        <option value=5>10:00 AM</option>
                        <option value=6>11:00 AM</option>
                        <option value=7>12:00 PM</option>
                        <option value=8>2:00 PM</option>
                        <option value=9>3:00 PM</option>
                        <option value=10>4:00 PM</option>
                        <option value=11>5:00 PM</option>
                        <option value=12>6:00 PM</option>
                        <option value=13>7:00 PM</option>
                        <option value=14>8:00 PM</option>
                      </select>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Reservation details</h3>
                    </div>
                    <div class="panel-body" style="padding: 5px 15px;">
                       <h5>Pet Name: <span class="petNameUser"></span></h5>
                      <h5>Date: <span class="reserveDate"></span></h5>
                      <h5>Time: <span class="reserveTime"></span></h5>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitReservation">Submit Reservation</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

      
      <div class="footer">
        <p>&copy; Company 2016</p>
      </div>

    </div>