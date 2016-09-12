<thead>
  <tr>
    <th style="width:270px;">Product Name
<form action="generateOrderReceipt" id="generateOrderReceipt" method="POST">
    <?php
      echo'<input type="hidden" name="usersId" value="'.$list_of_orders[0]['usersObjectId'].'" />';
      echo'<input type="hidden" name="batchOrderId" value="'.$list_of_orders[0]['batchOrderId'].'" />';
    ?>
  </form>
    </th>
    <th style="text-align:right;padding-right:15px;">Price</th>
    <th style="text-align:right;padding-right:15px;">Quantity</th>
    <th style="text-align:right;padding-right:15px;">Total Price</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($list_of_orders as $row){

    echo "<tr>";
    echo "<td class='vert productName'>".$row['product_name']."</td>";
    echo "<td class='vert productPrice rightalignPadding' style='text-align:right;padding-right:15px;'>&#8369; <span>".$row['product_price']."</span></td>";
    echo "<td class='vert orderAmount rightalignPadding' style='text-align:right;padding-right:15px;'>".$row['productAmount']."</td>";
    echo "<td class='vert productTotal rightalignPadding' style='text-align:right;padding-right:15px;'>&#8369; <span>".$row['totalPrice']."</span></td>";
    echo "</tr>";

    }
  ?>
</tbody>

