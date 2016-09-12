        <div class="alert alert-success orderSuccess" style="display:none;">
                  <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                  <strong><strong>
        </div>
        <div class="panel panel-default" id="orderPage">
          <!-- Default panel contents -->
          <div class="panel-heading">List of Products</div>
          <div class="panel-body">
            <p>Order products here. After adding your order, you can view it in view cart page.</p>
            <p><strong>If there is an active batch order in your cart you cannot add orders anymore unless that batch order is completed or you cancel it.</strong></p>
             <?php
                if($activeOrder =="true"){
                  echo'<p class="small" style="color:red;">You have an active order.</p>';
                }
            ?>
            <div class="input-group">
              <span class="input-group-btn">
                  <label>Sort: </label>
                  <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchProductUser" name = "sortCategory1" value = "" checked = "true"> All
                  <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchProductUser" name = "sortCategory1" value = "C" > Tablets and Capsule 
                  <input type="radio" style="width:10px; height:10px; vertical-align:baseline;" class="form-control searchProductUser" name = "sortCategory1" value = "V" > Vitamins
              </span>
            </div>
             <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default searchProductUser" type="button">Search</button>
              </span>
              <input type="text" class="form-control searchProductUserText" placeholder="Enter keywords">
            </div>
          </div>

          <!-- Table -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="width:270px;">Product Name</th>
                <th>Type</th>
                <th style="text-align:right;padding-right:15px;">Quantity</th>
                <th style="text-align:right;padding-right:15px;">Price</th>
                 <?php
                if($activeOrder !="true"){
                  echo'<th style="text-align:right;padding-right:15px;">Order Quantity</th>';
                  echo'<th style="width:130px;"></th>';
                }
                ?>
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list_of_poducts as $row){
                $productquantity = intval($row['product_quantity']);
                if($productquantity <=20){
                  echo "<tr style='color:red'>";  
                }else{
                  echo "<tr>";
                }

                if($productquantity > 0){
                  $availability="available";
                }else{
                   $availability="Out of Stock";
                }
                echo "<td class='vert productName'>".$row['product_name']."</td>";
                echo "<td class='vert productType'>".$row['product_type']."</td>";
                echo "<td class='vert productQuantity rightalignPadding' style='display:none;'>".$row['product_quantity']."</td>";
                echo "<td class='vert productQuantity rightalignPadding' >".$availability."</td>";
                echo "<td class='vert productPrice rightalignPadding'>&#8369; <span>".$row['product_price']."</span></td>";
                 if($activeOrder !="true"){
                echo '<td class="vert orderQuantity"><input type="number" min="1" max="50" value="1" class="form-control" name="orederQuantity" style="text-align:right;"></td>';
                echo "<td class='vert'>";
                if($productquantity <=0){
                  echo "OUT OF STOCK!";
                }else{
                  echo "<button type='button' data-objectId='".$row['objectId']."' class='btn btn-primary btn-sm addToCart pull-left'>Add to Cart</button>";  
                }
                
                echo "</td>";
                }
                echo "</tr>";
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
                <h4 class="modal-title" id="myModalLabel">Confirm Order</h4>
              </div>
              
              <div class="modal-body clearfix">
                <h3 class="orderTitle"></h3>
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Item order details</h3>
                    </div>
                    <div class="panel-body">
                      <p class="detailProductName"></p>
                      <p class="detailProductType">Type : <span class="pull-right"></span></p>
                      <p class="detailProductAmount">Order Quantity : <span class="pull-right"></span></p>
                      <input type="hidden" name="detailProductAmount" value=""/>
                      <p class="detailPrice">Price :  
                        <span class="pull-right value"></span>
                        <span class="pull-right">&#8369</span>
                      </p>
                      <hr />
                      <p class="detailTotalPrice">
                        Total Price :
                        <span class="pull-right value"></span>
                        <span class="pull-right">&#8369</span>
                      </p>
                      <input type="hidden" name="detailTotalPrice" value=""/>
                    </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary confirmAction" data-confirm="confirmAddOrder">Yes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>

    </div>