<div class="panel panel-default" id="adminUsersOrder">
    <!-- Default panel contents -->
    <div class="panel-heading">SISTEMA DE PAGOS</div>
    <div class="panel-body">
        <div>
          <!-- <p>Only confirmed transactions are being calculated here.</p> -->
        </div>
        <form id="billing" role="form" action="generateBilling" method="POST">
            <div class="form-group col-md-5">
                <label for="username">Cliente</label>

                <select class="form-control customer" name="customer">
                    <?php
                    foreach ($customers as $row) {
                        echo'<option value="' . $row['objectId'] . '">' . $row['last_name'] . ', ' . $row['first_name'] . '  (' . $row['email'] . ')</option>';
                    }
                    ?>

                </select>
            </div>
            <div class="form-group col-md-5">
                <label for="username">Nombre de la Mascota</label>
                <input type="text" class="form-control" name="petName" id="petName" placeholder="nombre de la mascota" minlength="3" required>          
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
                <label for="username">Servicio</label>

                <select class="form-control surgery" name="surgery">
                    <?php
                    foreach ($surgerys as $row) {
                        echo'<option value="' . $row['objectId'] . '">' . $row['service_name'] . ' (P ' . number_format($row['price'], 2) . ')</option>';
                    }
                    ?>

                </select>
            </div>

            <br style="clear:both;" />
            <label>Fecha de Hospitalización</label>
            <div class="row">
                <div class="col-md-6 noPadding">
                    <div class="col-md-12">
                        <label> Desde</label>
                    </div>
                    <div class="col-md-5">
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
                            <option value="12">Deciembre</option>
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
                            <option value="0">Año</option>
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

                <div class="col-md-5 noPadding">
                    <div class="col-md-12">
                        <label> hasta</label></div>
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
                            <option value="12">Deciembre</option>
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
                            <option value="0">Año</option>
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
            </div>
            <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="generateReservationReport">Generar Boleta</button>
        </form>
    </div>
</div>

<div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
    <!-- Table -->
    <table class="table table-hover" id="adminPaymentTable">

        <thead>
            <tr>
                <th style="width:270px;">
                   Lotes de ID de pedido / Recibo #
                </th>
                <th>
                    SeguimientoNo. #
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
                <span class='btn btn-danger deleteOrderAdmin'>Borrar</span>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary confirmAction" data-formSubmit="form">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


<div class="footer">
     <p>&copy; PetFile 2016</p>
</div>

