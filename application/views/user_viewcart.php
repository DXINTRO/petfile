<div class="alert alert-success cartSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong><strong>
            </div>
            <div class="panel panel-default" id="viewCartPage">
                <!-- Default panel contents -->
                <div class="panel-heading">Detalle de Medicamentos e Insumos</div>
                <div class="panel-body">
                    <p>Pasos</p>
                    <p>1.
                        Revise su pedido y pulse el botón para Imprimir o Cancelar.</p>
                    <p>&nbsp;</p>

                </div>

                <!-- Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width:270px;">Nombre del Producto</th>
                            <th style="text-align:right;padding-right:15px;">Precio</th>
                            <th style="text-align:right;padding-right:15px;">Cantidad</th>
                            <th style="text-align:right;padding-right:15px;">Precio Total</th>
                            <?php
                            if ($activeOrder != "true") {
                                echo'<th style="width:140px;"></th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_of_orders as $row) {

                            echo "<tr>";
                            echo "<td class='vert productName'>" . $row['product_name'] . "</td>";
                            echo "<td class='vert productPrice rightalignPadding'>$  <span>" . $row['product_price'] . "</span></td>";
                            echo "<td class='vert orderAmount rightalignPadding'>" . $row['productAmount'] . "</td>";
                            echo "<td class='vert productTotal rightalignPadding'>$ <span>" . $row['totalPrice'] . "</span></td>";
                            echo "<input type='hidden' value='" . $row['batchOrderId'] . "' id='batchId' name='batchId'> ";
                            if ($activeOrder != "true") {
                                echo "<td class='vert'>";
                                echo "<button type='button' data-productId='" . $row['productObjectId'] . "' data-objectId='" . $row['orderObjectid'] . "' class='btn btn-primary btn-sm editOrder pull-left' style='margin-right: 5px;'>Editar</button>";
                                echo "<button type='button' data-productId='" . $row['productObjectId'] . "' data-objectId='" . $row['orderObjectid'] . "' class='btn btn-danger btn-sm removeFromCart pull-left'>Borrar</button>";
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <?php
                            if ($activeOrder != "true") {
                                echo'<td colspan="3"></td>';
                            } else {
                                echo'<td colspan="2"></td>';
                            }
                            ?>

                            <td>TOTAL:<span style="float:right;margin-right:10px;">$<?php
                                    if (count($list_of_orders) > 0) {
                                        echo $row['totalAll'];
                                    }
                                    ?></span></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="clearfix">
                <div style="float:right;margin-bottom:10px;">
                    <form action="generateOrderReceipt" method="POST">
                        <input type="hidden" value="" />
                        <?php
                        if (count($list_of_orders) > 0) {
                            if ($activeOrder == "true") {
                                //echo "<button type='button' class='btn btn-success btn-sm pull-left' id='payOrder' style='margin-right:10px;'>Pagar</button>";
                                echo "<button type='submit' class='btn btn-warning btn-sm pull-left' style='margin-right:10px;'>Imprimir Orden</button>";
                                echo "<button type='button' class='btn btn-info btn-sm pull-left' id='cancelOrder'>Cancelar Orden</button>";
                            } else {
                                echo "<button type='button' class='btn btn-info btn-sm pull-left' id='checkOut'>Revisar</button>";
                            }
                        }
                        ?>

                    </form>

                </div>
            </div>

            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>

                        <div class="modal-body clearfix">
                            <div class="removeFromCartBody" style="display:none;">
                                <h4></h4>
                            </div>
                            <div class="payOrderBody"  style="display:none; vertical-align:middle; padding-left:150px;">
                                <span>
                                    <label>
                                        Cash Remittance Center:
                                    </label>
                                    <input type="text" style="width:250px;" class="form-control" placeholder="Ex. Western Union" id="remitId" required>
                                </span>
                                <span>
                                    <label>
                                        Tracking Number:
                                    </label>
                                    <input type="text" style="width:250px;" class="form-control" placeholder="Tracking Number" id="trackingNo" required>
                                </span>
                            </div>
                            <div class="editOrderBody" style="display:none;">
                                <h3 class="orderTitle"></h3>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Detalle de la Orden</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p class="detailProductName"></p>
                                        <br/>
                                        <p class="detailProductAmount">Cantidad : <input type="number" name="detailProductAmount" style="text-align:right;" class="pull-right"/></p>

                                        <p class="detailPrice">Precios :  
                                            <span class="pull-right value"></span>
                                            <span class="pull-right">&#8369</span>
                                        </p>
                                        <hr />
                                        <p class="detailTotalPrice">
                                            Precio Total :
                                            <span class="pull-right value"></span>
                                            <span class="pull-right">&#8369</span>
                                        </p>
                                        <input type="hidden" name="oldValueAmount" value=""/>
                                        <input type="hidden" name="detailTotalPrice" value=""/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary confirmAction" data-confirm="confirmAddOrder">Aceptar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="footer">
                <p>&copy; PetFile 2016</p>
            </div>

            </div>