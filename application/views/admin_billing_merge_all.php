<div class="alert alert-success addReservationSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong><strong>
            </div>
            <div class="panel panel-default" id="adminManageReservation">
                <!-- Default panel contents -->
                <div class="panel-heading">Manage Reservations</div>
                <div class="panel-body">
                    <p>Reservations of Users can be confirmed and delete here. You can also add new reservations.</p>

                    <div class="panel-group" id="accordion" style="margin-bottom:10px;">
                        <div class="panel panel-default" id="addOrEditReservation">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <span class="glyphicon glyphicon-hand-right"></span> 
                                        <span>Add a Reservation</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="alert alert-info alert-dismissable" style="display:none;">
                                    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong> Fill up all the fields.
                                </div>
                                <div class="panel-body clearfix">
                                    <form action="addReservation" method="POST" id="addReservationAdmin">
                                        <div class="col-md-6">
                                            <div id="datepicker" style="margin:0 45px;"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Reservation Time</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <select class="form-control reserveTimeSelect">
                                                        <option value=0>Time</option>
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
                                                    <h3 class="panel-title">Reservation details</h3>
                                                </div>
                                                <div class="panel-body" style="padding: 5px 15px;">

                                                    <label>Service </label><select class="adminServicesReservation" name="adminServicesReservation" style="width:100%; height:34px;" id="">
                                                        <?php
                                                        foreach ($serviceslist as $row) {
                                                            echo '<option value=' . $row['objectId'] . '>' . $row['service_name'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>

                                                    <input type="email" class="form-control" name="reservationUserEmail" id="reservationUserEmail" placeholder="User Email" required>
                                                    <h5>Pet Name: <span class="petName"></span></h5>
                                                    <h5>Date: <span class="reserveDate"></span></h5>
                                                    <h5>Time: <span class="reserveTime"></span></h5>
                                                </div>
                                            </div>
                                            <input type="hidden" name="reservationId" id="reservationId" value="" />
                                            <button type="submit" name="adminAddReservation" id="addReservationButton" class="btn btn-success pull-right" style="margin-top:10px;">Add Reservation</button>
                                            <button type="button" name="backToAddReservation" id="backToAddReservation" class="btn btn-success pull-right" id="saveChangesReservation" style="margin-top:10px; margin-right:10px; display:none; display:none;">Back Add Reservation</button>
                                            <button type="submit" name="editadminAddReservation" class="btn btn-primary pull-right" id="saveChangesReservation" style="margin-top:10px; margin-right:10px; display:none;">Save Changes</button>

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
                                <h3 class="panel-title" style="display:inline;">Generate Report</h3>
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
                                            <label> From</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control reportMonthFrom" name="reportMonthFrom">
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control reportYearFrom" name="reportYearFrom">
                                                <option value="0">Year</option>
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
                                            <label> To</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control reportMonthTo" name="reportMonthTo">
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control reportYearTo" name="reportYearTo">
                                                <option value="0">Year</option>
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
                                        <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="generateReservationReport">Generate Report</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default adminSearchReservation" type="button">Search</button>
                        </span>
                        <input type="text" class="form-control adminSearchReservationText" placeholder="Enter USER EMAIL">
                    </div>
                </div>

                <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
                    <!-- Table -->
                    <table class="table table-hover" id="adminReservationTable">
                        <thead>
                            <tr>
                                <th style="width:200px;">Reservation ID</th>
                                <th style="width:200px;">Email</th>
                                <th style="width:260px;">Service Name</th>
                                <th style="width:135px">Date SERVICE</th>
                                <th style="width:135px">Date MADE</th>
                                <th style="">Time</th>
                                <th style="text-align:right;padding-right:20px;">Price</th>
                                <th style="width:130px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reservations as $row) {

                                $date1 = date('Y-m-d H:i A', strtotime(str_replace('-', '/', '' . $row['reserveDate'] . ' ' . $row['reserveTime'] . '')));
                                $dateToday = date('Y-m-d H:i A');
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
                                    echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-primary btn-sm adminEditReservation pull-left' style='margin-right: 5px;'>Edit</button>";
                                    echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm adminDeleteReservation pull-right'>Delete</button>";
                                    echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-warning btn-sm adminApproveReservation pull-right' style='margin-top: 4px;width: 100%;'>Approve</button>";
                                } else if ($row['confirmed'] == "1") {
                                    echo "<p style='font-size:10px;'>Status: Done</p>";
                                    echo "<button style='width:100%;' type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm adminDeleteReservation pull-right'>Delete</button>";
                                } else if ($row['confirmed'] == "2") {
                                    echo "<p style='font-size:10px;'>Status: Pending</p>";
                                    echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-warning btn-sm adminConfirmReservation pull-right' style='margin-top: 4px;width: 100%;margin-bottom:10px;'>Done</button>";
                                    echo "<button style='width:100%;' type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm adminDeleteReservation pull-right'>Delete</button>";
                                } else {
                                    echo "<p style='font-size:10px;'>Status: Expired!</p>";
                                    echo "<button style='width:100%;' type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm adminDeleteReservation pull-right'>Delete!</button>";
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
                            <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                        </div>

                        <div class="modal-body clearfix">
                            Are you sure you want to delete this item?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary confirmAction" data-confirm="confirmDeleteAdmin">Yes</button>
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
                            <h4 class="modal-title" id="myModalLabel">Use/Done Reservation</h4>
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
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary confirmAction" id="processReservationBTN" data-confirm="processReservation">Process Reservation and Print Receipt</button>
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
                            <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                        </div>

                        <div class="modal-body clearfix">
                            Are you sure you want to delete this item?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary confirmAction" data-confirm="confirmDeleteAdmin">Yes</button>
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
                            <h4 class="modal-title" id="myModalLabel">Confirm/Approve Reservation</h4>
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
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary confirmAction" id="processReservationBTN" data-confirm="processReservation">Approve/Confirm this reservation.</button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->    

            <div class="alert alert-success addOrderSuccess" style="display:none;">
                <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                <strong><strong>
                        </div>
                        <div class="panel panel-default" id="adminUsersOrder">
                            <!-- Default panel contents -->
                            <div class="panel-heading">View Order Of User</div>
                            <div class="panel-body">
                                <p>You can search the order of a user here. Just type his/her email to the search bar and press search.</p>
                                <p>Proccessed orders will be marked DONE.</p>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default searchOrderOfUser" type="button">Search</button>
                                    </span>
                                    <input type="text" class="form-control" name="searchUserEmail" id="searchUserEmail" placeholder="Enter user email">
                                </div>
                            </div>

                            <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
                                <!-- Table -->
                                <table class="table table-hover" id="adminOrderTable">
                                    <?= $order_table ?>
                                </table>

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
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary confirmAction" data-formSubmit="form">Yes</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="panel panel-default" id="adminUsersOrder">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Billing</div>
                            <div class="panel-body">
                                <div>
                                  <!-- <p>Only confirmed transactions are being calculated here.</p> -->
                                </div>
                                <form id="billing" role="form" action="generateBilling" method="POST">
                                    <div class="form-group col-md-5">
                                        <label for="username">Customer</label>

                                        <select class="form-control customer" name="customer">
                                            <?php
                                            foreach ($customers as $row) {
                                                echo'<option value="' . $row['objectId'] . '">' . $row['last_name'] . ', ' . $row['first_name'] . '  (' . $row['email'] . ')</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="username">Pet Name</label>
                                        <input type="text" class="form-control" name="petName" id="petName" placeholder="Pet Name" minlength="3" required>          
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="username">Doctor</label>

                                        <select class="form-control doctor" name="doctor">
                                            <?php
                                            foreach ($docs as $row) {
                                                echo'<option value="' . $row['objectId'] . '">' . $row['doctor_name'] . '</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-5">
                                        <label for="username">Surgery</label>

                                        <select class="form-control surgery" name="surgery">
                                            <?php
                                            foreach ($surgerys as $row) {
                                                echo'<option value="' . $row['objectId'] . '">' . $row['service_name'] . ' (P ' . number_format($row['price'], 2) . ')</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <br style="clear:both;" />
                                    <label>Date of confinement</label>
                                    <div class="row">
                                        <div class="col-md-6 noPadding">
                                            <div class="col-md-12">
                                                <label> From</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-control reportMonthFrom" name="reportMonthFrom">
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2" style='padding:0px;'>
                                                <select class="form-control reportDayFrom" name="reportDayFrom">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control reportYearFrom" name="reportYearFrom">
                                                    <option value="0">Year</option>
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

                                        <div class="col-md-5 noPadding">
                                            <div class="col-md-12">
                                                <label> To</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control reportMonthTo" name="reportMonthTo">
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2" style='padding:0px;'>
                                                <select class="form-control reportDayTo" name="reportDayTo">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control reportYearTo" name="reportYearTo">
                                                    <option value="0">Year</option>
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
                                    <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="generateReservationReport">Generate Billing</button>
                                </form>
                            </div>
                        </div>

                        <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
                            <!-- Table -->
                            <table class="table table-hover" id="adminPaymentTable">

                                <thead>
                                    <tr>
                                        <th style="width:270px;">
                                            Batch Order ID/Receipt #
                                        </th>
                                        <th>
                                            Tracking No. #
                                        </th>
                                        <th>
                                            Via
                                        </th> 
                                        <th style="text-align:right;padding-right:15px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($payments as $row) {
                                        if ($row['active'] != "3") {
                                            echo "<tr>";
                                            if ($row['active'] == "1") {
                                                echo "<td class='vert batchOrderId'>" . $row['batchOrderId'] . "</td>";
                                                echo "<td class='vert trackingNo'>" . $row['trackingNo'] . "</td>";
                                                echo "<td class='vert center'>" . $row['center'] . "</td>";
                                            } else if ($row['active'] == "0") {
                                                echo "<td class='vert batchOrderId'>" . $row['batchOrderId'] . " (DONE)</td>";
                                                echo "<td class='vert trackingNo'>" . $row['trackingNo'] . "</td>";
                                                echo "<td class='vert center'>" . $row['center'] . "</td>";
                                            }

                                            echo "<td class='vert usersId' style='text-align:right;'>
                        <input type='hidden' name='usersId' class='usersId' value='" . $row['usersId'] . "' >";
                                            if ($row['active'] == "1") {
                                                echo "<span class='btn btn-success processOrderAdmin' style='margin-right:10px;'>Process Order</span>";
                                            }
                                            echo" <input type='hidden' name='batchOrderIdDelete' class='batchOrderIdDelete' value='" . $row['batchOrderId'] . "' >
                <span class='btn btn-danger deleteOrderAdmin'>Delete</span>
                      </td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

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
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary confirmAction" data-formSubmit="form">Yes</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        </div>


                        <div class="footer">
                            <p>&copy; PetFile 2016</p>
                        </div>

                        </div>