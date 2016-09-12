        <div class="alert alert-success cartSuccess" style="display:none;">
                  <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                  <strong><strong>
        </div>
        <div class="panel panel-default" id="viewCartPage">
          <!-- Default panel contents -->
          <div class="panel-heading">Cart Details</div>
          <div class="panel-body">
            <p>Steps</p>
            <p>1. Review your order and press the checkout button.</p>
            <p>2. After you press checkout, you wont be able to add/edit/delete your order unless you press cancel order.</p>
            <p>3. Press print receipt.(Optional) If you do this step, the process of claiming your order would be much faster.</p>


            <p>After you claim your order. This page would automatically resets and give you new order number.</p>
            <p class="small">Notes:</p>
            <p class="small">If you present us a receipt, the items that are in the receipt are <strong>the only things we would proccess.</strong>
             <strong>We ONLY ALLOW ONE BATCH ORDER AT A TIME.</strong></p>
             
          </div>

          <!-- Table -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="width:270px;">Product Name</th>
                <th style="text-align:right;padding-right:15px;">Price</th>
                <th style="text-align:right;padding-right:15px;">Quantity</th>
                <th style="text-align:right;padding-right:15px;">Total Price</th>
                <?php
                if($activeOrder !="true"){
                echo'<th style="width:140px;"></th>';
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list_of_orders as $row){

                echo "<tr>";
                echo "<td class='vert productName'>".$row['product_name']."</td>";
                echo "<td class='vert productPrice rightalignPadding'>&#8369; <span>".$row['product_price']."</span></td>";
                echo "<td class='vert orderAmount rightalignPadding'>".$row['productAmount']."</td>";
                echo "<td class='vert productTotal rightalignPadding'>&#8369; <span>".$row['totalPrice']."</span></td>";
                echo "<input type='hidden' value='".$row['batchOrderId']."' id='batchId' name='batchId'> ";
                if($activeOrder !="true"){
                echo "<td class='vert'>";
                echo "<button type='button' data-productId='".$row['productObjectId']."' data-objectId='".$row['orderObjectid']."' class='btn btn-primary btn-sm editOrder pull-left' style='margin-right: 5px;'>Edit</button>";
                echo "<button type='button' data-productId='".$row['productObjectId']."' data-objectId='".$row['orderObjectid']."' class='btn btn-danger btn-sm removeFromCart pull-left'>Remove</button>";
                echo "</td>";
                }
                echo "</tr>";

                }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <?php
                if($activeOrder !="true"){
                  echo'<td colspan="3"></td>';
                }else{
                  echo'<td colspan="2"></td>';
                }
                ?>
                
                <td>TOTAL:<span style="float:right;margin-right:10px;">&#8369;<?php 
                if(count($list_of_orders) > 0){
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
              if(count($list_of_orders) > 0){
                if($activeOrder =="true"){
                  echo "<button type='button' class='btn btn-success btn-sm pull-left' id='payOrder' style='margin-right:10px;'>Pay Order</button>";
                  echo "<button type='submit' class='btn btn-warning btn-sm pull-left' style='margin-right:10px;'>Print Order Slip</button>";
                  echo "<button type='button' class='btn btn-info btn-sm pull-left' id='cancelOrder'>Cancel Order</button>";
                }
                else{
                  echo "<button type='button' class='btn btn-info btn-sm pull-left' id='checkOut'>Checkout</button>";
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
                        <h3 class="panel-title">Item order details</h3>
                      </div>
                      <div class="panel-body">
                        <p class="detailProductName"></p>
                        <br/>
                        <p class="detailProductAmount">Order Quantity : <input type="number" name="detailProductAmount" style="text-align:right;" class="pull-right"/></p>
                        
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
                        <input type="hidden" name="oldValueAmount" value=""/>
                        <input type="hidden" name="detailTotalPrice" value=""/>
                      </div>
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
        <p>&copy; Company 2016</p>
      </div>

    </div>