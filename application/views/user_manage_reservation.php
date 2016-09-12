<div class="alert alert-success alert-dismissable reservationAlert" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong><strong>
            </div>
            <div class="panel panel-default" id="userManageReservation">
                <!-- Default panel contents -->
                <div class="panel-heading">List of Reservations</div>
                <div class="panel-body">
                    <p>Here you can manage your reservation. You could either delete or edit.</p>

                </div>

                <!-- Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th style="text-align:right;padding-right:15px;">Price (Incl Tax)</th>
                            <th>Reservation Date</th>
                            <th>Reservation Time</th>
                            <th style="width:130px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_of_reservations as $row) {

                            date_default_timezone_set('Asia/Manila');
                            $mydate = date('m/d/Y');


                            if (($mydate > $row['reserveDate']) && $row['confirmed'] == 2) {
                                echo "<tr style='color:red;'>";
                                echo "<td class='vert serviceTitle'>" . $row['service_name'] . "</td>";
                                echo "<td class='vert servicePrice rightalignPadding'>&#8369; " . $row['price'] . "</td>";
                                echo "<td class='vert serviceDate'>" . $row['reserveDate'] . "</td>";
                                echo "<td class='vert serviceTime'>" . $row['reserveTime'] . " - Reservation Expire</td>";
                                echo "<td class='vert'><button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm deleteReservation pull-right'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            } else if ($row['confirmed'] == 1) {
                                echo "<tr style='color:green;'>";
                                echo "<td class='vert serviceTitle'>" . $row['service_name'] . "</td>";
                                echo "<td class='vert servicePrice rightalignPadding'>&#8369; " . $row['price'] . "</td>";
                                echo "<td class='vert serviceDate'>" . $row['reserveDate'] . "</td>";
                                echo "<td class='vert serviceTime'>" . $row['reserveTime'] . " -</td>";
                                echo "<td class='vert'>DONE";
                                echo "</td>";
                                echo "</tr>";
                            } else {

                                echo "<tr>";
                                echo "<td class='vert serviceTitle'>" . $row['service_name'] . "</td>";
                                echo "<td class='vert servicePrice rightalignPadding'>&#8369; " . $row['price'] . "</td>";
                                echo "<td class='vert serviceDate'>" . $row['reserveDate'] . "</td>";
                                echo "<td class='vert serviceTime'>" . $row['reserveTime'] . "</td>";
                                echo "<input type='hidden' name='doctorsId' class='doctorsId' value='" . $row['doctorsId'] . "'>";

                                echo "<td class='vert'><button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-primary btn-sm editReservation pull-left'>Edit</button>";
                                echo "<button type='button' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-danger btn-sm deleteReservation pull-right'>Delete</button>";
                                // if($row['confirmed'] == "1"){

                                echo "<form action='printForUser' method='POST'>";
                                echo "<input type='hidden' name='registrationId' class='registrationId' value='" . $row['reservationobjectId'] . "'>";
                                echo "<button type='submit' data-objectId='" . $row['reservationobjectId'] . "' class='btn btn-info btn-sm pull-right' style='width:100%;margin-top:10px;'>Print Reservation Slip</button></td>";
                                echo "</form>";
                                // }
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editReserveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>

                        <div class="modal-body clearfix">
                            <div class="alert alert-info alert-dismissable" style="display:none;">
                                <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> Fill up all the fields.
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Doctor</h3>
                                    </div>
                                    <div class="panel-body">

                                        <input type='hidden' name='doctorsIdEdit' class='doctorsIdEdit' value="">

                                        <select class="form-control" id="reserveDoctorSelect">
                                            <option>Choose Doctor</option>
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
                                        <h5>Date: <span class="reserveDate"></span></h5>
                                        <h5>Time: <span class="reserveTime"></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary updateReservation">Update Reservation</button>
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
                            <h4 class="modal-title" id="myModalLabel">&nbsp;</h4>
                        </div>

                        <div class="modal-body clearfix">
                            <h5 class="message">Are you sure you want to delete this item?</h5>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary confirmAction">Yes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="footer">
                <p>&copy; PetFile 2016</p>
            </div>

            </div>