<html>
<head>
  <title></title>
   <link href="<?php echo base_url();?>assets/css/reportsLayout.css" rel="stylesheet">
</head>
<body>
<table>
    <tbody>
      <tr>
        <td><img style="width:100px;" src="<?php echo base_url();?>assets/images/logo.jpg"></td>
        <td style="vertical-align:top;"><h1 style="margin:10px 0px;">Vets In Practice</h1>
          63 Maysilo Circle cor. Boni Ave. Mandaluyong, Philippines phone 531-1581
        </td>
      </tr>
    </tbody>
  </table>

<h1>User Report</h1>
<table class="detail" style="width:100%;margin: 0px; border-top: none;">
<tr>
<td class="label">From:</td>
<td class="field">
<?php
  echo $reportDateFrom;
?>
</td>
<td class="label">To:</td>
<td class="field">
<?php
  echo $reportDateto;
?>
</td>

</tbody>
</table>
<table class="list" style="width: 99%; margin-top: 1em;" id="generatedReportUser">

<tbody><tr class="head">
<td class="center" style="width: 30%">Email</td>
<td style="width: 15%">Username</td>
<td class="center" style="width: 15%">First Name</td>
<td class="center" style="width: 15%">Last Name</td>
<td class="right" style="width: 25%;">User Level</td>
</tr>
<?php
 foreach ($users as $row){
echo'<tr class="list_row">';
echo'<td class="center">'.$row['email'].'</td>';
echo'<td>'.$row['username'].'</td>';
echo'<td class="center">'.$row['first_name'].'</td>';
echo'<td style="text-align: left">'.$row['last_name'].'</td>';
echo'<td>';
if($row['user_level'] == 1){
          echo "<span>Customer</span>";
        }else if($row['user_level'] == 2){
          echo "<span>Super Admin</span>";
        }else if($row['user_level'] == 3){
          echo "<span>Admin User</span>";
        }else if($row['user_level'] == 4){
          echo "<span>Admin Reservation</span>";
        }
echo'</td>';
echo'</tr>';
  }
?>
</tbody>

</table>


</body>
</html>

