

<thead>
  <tr>
    <th style="width:270px;">
      Batch Order ID/Receipt #
    </th>
    <th style="text-align:right;padding-right:15px;"></th>
  </tr>
</thead>
<tbody>
  <?php foreach ($list_of_orders as $row){
    if($row['active'] != "3"){
    echo "<tr>";
     if($row['active'] == "1"){
      echo "<td class='vert batchOrderId'>".$row['batchOrderId']."</td>";  
     }else if($row['active'] == "0"){
      echo "<td class='vert batchOrderId'>".$row['batchOrderId']." (DONE)</td>";
     }
    
    echo "<td class='vert usersId' style='text-align:right;'>
            <input type='hidden' name='usersId' class='usersId' value='".$row['usersId']."' >
             <input type='hidden' name='batchOrderIdDelete' class='batchOrderIdDelete' value='".$row['batchOrderId']."' >";
    if($row['active'] == "1"){
    echo "<span class='btn btn-success processOrderAdmin' style='margin-right:10px;'>Process Order</span>";   
    }
    echo"<span class='btn btn-danger deleteOrderAdmin'>Delete</span>
          </td>";
    echo "</tr>";

    }
  }
  ?>
</tbody>