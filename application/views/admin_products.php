<div class="alert alert-success addUserSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong><strong>
            </div>
            <div class="panel panel-default" id="adminProducts">
                <!-- Default panel contents -->
                <div class="panel-heading">Listado de Productos</div>
                <div class="panel-body">

                    <div class="panel panel-default">

                        <div class="panel-group" id="accordion" style="margin-bottom:10px;">
                            <div class="panel panel-default" id="addOrEditReservation">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            <span class="glyphicon glyphicon-hand-right"></span> 
                                            <span>Agregar un Producto</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="alert alert-info alert-dismissable" style="display:none;">
                                        <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                                        <strong>Advertencia!</strong> Llenar todos los campos.
                                    </div>
                                    <div class="panel-body clearfix">
                                        <form action="addProduct" method="POST" id="addProduct">

                                            <input type="text" style="width:250px;" class="form-control" name="productName" id="productName" placeholder="Nombre del Producto" required>
                                            <input type="number" style="width:250px;" class="form-control" name="productQty" id="productQty" placeholder="Cantidad" min="1" required>
                                            <input type="number" style="width:250px;" class="form-control" name="productPrice" id="productPrice" placeholder="Precio" min="1" required>
                                            <input type="text" style="width:250px;" class="form-control" name="productType" id="productType" placeholder="Tipo" required>

                                            <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="addproduct">Agregar Producto</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="panel-heading clearfix">
                            <a style="color:#000000;" data-toggle="collapse" data-parent="#accordion" href="#generateUserReportcollapse">
                                <span class="glyphicon glyphicon-hand-right"></span> 
                                <h3 class="panel-title" style="display:inline;">Generar Reporte</h3>
                            </a>

                        </div>
                        <div class="panel-body panel-collapse collapse" id="generateUserReportcollapse">
                            <div class="alert alert-danger" style="display:none;">
                                <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                                <strong></strong>
                            </div>
                            <form action="generateProductReport" method="POST" id="generatePDF">                      
                                <div class="row" style="display:none;">
                                    <div class="col-md-6 noPadding">
                                        <div class="col-md-12">
                                            <label> Desde </label>
                                        </div>
                                        <div class="col-md-6">
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
                                                <option value="12">Diciembre</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- NOTE CHANGE THIS! -->
                                            <select class="form-control reportYearFrom" name="reportYearFrom">
                                                <option value="0">Año</option>
                                                <option value="2016" selected >2016</option>
                                                <option value="2015" >2015</option>
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
                                            <label> Hasta </label>
                                        </div>
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
                                                <option value="12">Diciembre</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- NOTE CHANGE THIS NOT FULLY USED -->
                                            <select class="form-control reportYearTo" name="reportYearTo">
                                                <option value="0">Año</option>
                                                <option value="2016" selected >2016</option>
                                                <option value="2015" >2015</option>
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
                                        <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="generateProductReport">Generar Reporte</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default searchManageProductsAdmin" type="button">Buscar</button>
                        </span>
                        <input type="text" class="form-control searchManageProductsTextAdmin" placeholder="
Introduzca algunas letras del producto a buscar">
                    </div>
                </div>

                <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
                    <!-- Table -->
                    <table class="table table-hover" id="adminManageProducts">
                        <thead>
                            <tr>
                                <th style="width:110px">ID del Producto</th>
                                <th style="width:280px;">Nombre</th>
                                <th style="">Cantidad</th>
                                <th style="">Precio</th>
                                <th style="">Tipo</th>
                                <th style="width:160px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $row) {
                                $productquantity = intval($row['product_quantity']);
                                if ($productquantity <= 10) {
                                    echo "<tr style='color:red'>";
                                } else {
                                    echo "<tr>";
                                }
                                echo "<td class='vert productObjectId'>" . $row['objectId'] . "</td>";
                                echo "<td class='vert productName'>" . $row['product_name'] . "</td>";
                                echo "<td class='vert productQuanitty'>" . $row['product_quantity'] . "</td>";
                                echo "<td class='vert productPrice'>$ " . $row['product_price'] . "</td>";
                                echo "<td class='vert productType'>" . $row['product_type'] . "</td>";
                                echo "<td class='vert'>";
                                echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-primary btn-sm editProductAdmin pull-left' style='margin-right: 5px;'>Editar</button>";
                                echo "<button type='button' data-objectId='" . $row['objectId'] . "' class='btn btn-danger btn-sm removeProductAdmin pull-right'>Borrar</button>";
                                echo "</td>";
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
                            <h4 class="modal-title" id="myModalLabel">Confirmar / Borrar</h4>
                        </div>

                        <div class="modal-body clearfix">
                            Esta seguro que desea Eliminar</div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary confirmAction" data-confirm="confirmDeleteAdmin">Aceptar</button>
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

            <!-- Modal -->

            <div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
                        </div>

                        <div class="modal-body clearfix">
                            <div class="panel-body clearfix">
                                <form action="editProduct" method="POST" id="editProduct">
                                    <label>Nombre Producto</label>
                                    <input type="text" style="width:250px;" class="form-control" name="productNameEdit" id="productNameEdit" placeholder="Nombre del Producto" required>
                                    Cantidad
                                    <input type="number" style="width:250px;" class="form-control" name="productQtyEdit" id="productQtyEdit" placeholder="Cantidad" min="1" required>
                                    <label>Precio</label>
                                    <input type="number" style="width:250px;" class="form-control" name="productPriceEdit" id="productPriceEdit" placeholder="Precio" min="1" required>
                                    <label>Tipo</label><input type="text" style="width:250px;" class="form-control" name="productTypeEdit" id="productTypeEdit" placeholder="Tipo" required>
                                    <input type="hidden" name="productIdToEdit" id="productIdToEdit" value="">
                                    <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="addproduct">Grabar Producto</button>
                                </form>

                            </div>
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