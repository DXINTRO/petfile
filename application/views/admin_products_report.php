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
				<td style="vertical-align:top;"><h1 style="margin:10px 0px;">PetFile</h1>
					63 Maysilo Circle cor. Boni Ave. Mandaluyong, Philippines phone 531-1581
				</td>
			</tr>
		</tbody>
	</table>
<h1>Full Product List Report</h1>
<!-- <table class="detail" style="width:100%;margin: 0px; border-top: none;">
<tr>
<td class="label">From:</td>
<td class="field">
<?php
  // echo $reportDateFrom;
?>
</td>
<td class="label">To:</td>
<td class="field">
<?php
  // echo $reportDateto;
?>
</td>

</tbody>
</table> -->
<table class="list" style="width: 99%; margin-top: 1em;" id="generatedReportUser">

<tbody><tr class="head">
<td class="center" style="width: 15%">Product ID</td>
<td style="width: 30%">Product Name</td>
<td class="center" style="width: 15%">Quantity</td>
<td class="right" style="width: 25%;">Product Type</td>
<td class="center" style="width: 15%;text-align:right;">Price</td>

</tr>
<?php
 foreach ($products as $row){
echo'<tr class="list_row">';
echo'<td class="center">'.$row['objectId'].'</td>';
echo'<td>'.$row['product_name'].'</td>';
echo'<td class="center">'.$row['product_quantity'].'</td>';
echo'<td>';
echo $row['product_type'];
echo'</td>';
echo'<td style="text-align: right">P '.$row['product_price'].'</td>';

echo'</tr>';
  }
?>
</tbody>

</table>


</body>
</html>

