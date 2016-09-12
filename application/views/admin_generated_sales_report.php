<html>
<head>
  <title></title>
   <link href="<?php echo base_url();?>assets/css/reportsLayout.css" rel="stylesheet">
</head>
<body>

<center>
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
	
	
<h1>Sales Report (<?php echo $reportMode; ?>)</h1></center>
<p>
	From :<?php echo $reportDateFrom; ?>
</p>
<p>
	To: <?php echo $reportDateto; ?>
</p>
<table class="list" style="width: 99%; margin-top: 1em;" id="generatedReportUser">

<tbody>
<tr class="head">
	<td style="width:11%"></td>
	<td style="width:25%"></td>
	<td style="width:10%"></td>
	<td style="width:10%"></td>
	<td style="width:15%"></td>
</tr>
<tr class="head">
<td class="center" colspan="4">
	<?php
		if($reportMode=='Daily'){
			echo 'Date';		
		}else if($reportMode=='Weekly'){
			echo 'Week';
		}else if($reportMode=='Monthly'){
			echo 'Monthly';
		}
	?>
	
</td>
<td style="text-align:center;">Total Sales</td>
</tr>
<?php
$allTotal=0;
$counter =0;
date_default_timezone_set('Asia/Manila');
foreach ($sales as $row){
	$allTotal =$allTotal + $row['saleGross'];
	
		if($reportMode=='Daily'){
			$rest = date('Y-m-d', strtotime($row['saleDate']));

			echo'<tr class="list_row">';
				echo'<td colspan="4" class="center">'.$rest.'</td>';
				echo'<td style="text-align:right;padding-right:20px;">P '.number_format($row['saleGross'],2).'</td>';
				
			echo'</tr>';

			foreach ($allItems as $item){
				$itemrest=date('Y-m-d', strtotime($item['saleDate']));
						if($itemrest == $rest){
							echo'<tr>';
							echo'<td style="vertical-align:top;">&nbsp;&nbsp;&nbsp;'.date('Y-m-d', strtotime($item['saleDate'])).'</td>';	
							echo'<td colspan="3" style="vertical-align:top;">Item: '.$item['itemName'].' <br/>Quantity: '.$item['itemQuantity'].'</td>';
							echo'<td style="text-align:right;padding-right:20px;vertical-align:bottom;">P'.number_format($item['itemTotalPrice'],2).'</td>';
							echo'</tr>';
						}
			}

			echo'<tr>';
			echo'<td colspan=4 style="text-align:right;">DAY TOTAL:</td>';
			echo'<td style="padding:10px 0px;;text-align:right;padding-right:20px;">P '.number_format($row['saleGross'],2).'</td>';
			echo'</tr>';
		}
		else if($reportMode=='Weekly'){
			echo'<tr class="list_row">';
				$year = date('Y', strtotime($row['rawSaleDate']));
				// $rest = date("Y-m-d", strtotime("1.1.".$year." + ".$row['saleDate']." weeks"));
				// $date1=date('Y-m-d', strtotime(''.$year.'W'.$row['saleDate'].'1'));

				echo'<td colspan="4">';
				echo'Week '.$row['saleDate'].' of '.$year.'';	
				echo'</td>';

				echo'<td style="text-align:right;padding-right:20px;"></td>';
			echo'</tr>';

			foreach ($allItems as $item){
						if($item['itemWeek'] == $row['saleDate'] && $year == $item['itemYear']){
							echo'<tr>';
							echo'<td style="vertical-align:top;">&nbsp;&nbsp;&nbsp;'.date('Y-m-d', strtotime($item['saleDate'])).'</td>';	
							echo'<td colspan="3" style="vertical-align:top;">Item: '.$item['itemName'].' <br/>Quantity: '.$item['itemQuantity'].'</td>';
							echo'<td style="text-align:right;padding-right:20px;vertical-align:bottom;">P'.number_format($item['itemTotalPrice'],2).'</td>';
							echo'</tr>';
						}
			}

			echo'<tr>';
			echo'<td colspan=4 style="text-align:right;">WEEK TOTAL:</td>';
			echo'<td style="padding:10px 0px;;text-align:right;padding-right:20px;">P '.number_format($row['saleGross'],2).'</td>';
			echo'</tr>';
		}else if($reportMode=='Monthly'){
			echo'<tr class="list_row">';
				$year = date('Y', strtotime($row['rawSaleDate']));
				$month = date('m', strtotime($row['rawSaleDate']));
				// $rest = date("Y-m-d", strtotime("1.1.".$year." + ".$row['saleDate']." weeks"));
				// $date1=date('Y-m-d', strtotime(''.$year.'W'.$row['saleDate'].'1'));

				echo'<td colspan="4">';
				echo'Month '.$month.' Year '.$year.'';	
				echo'</td>';

				echo'<td style="text-align:right;padding-right:20px;"></td>';
				echo'</tr>';

				foreach ($allItems as $item){
						$itemMonth=date('m', strtotime($item['saleDate']));
							if($month == $itemMonth && $year == $item['itemYear']){
								echo'<tr>';
								echo'<td style="vertical-align:top;">&nbsp;&nbsp;&nbsp;'.date('Y-m-d', strtotime($item['saleDate'])).'</td>';	
								echo'<td colspan="3" style="vertical-align:top;">Item: '.$item['itemName'].' <br/>Quantity: '.$item['itemQuantity'].'</td>';
								echo'<td style="text-align:right;padding-right:20px;vertical-align:bottom;">P'.number_format($item['itemTotalPrice'],2).'</td>';
								echo'</tr>';
							}
				}

				echo'<tr>';
				echo'<td colspan=4 style="text-align:right;">WEEK TOTAL:</td>';
				echo'<td style="padding:10px 0px;;text-align:right;padding-right:20px;">P '.number_format($row['saleGross'],2).'</td>';
				echo'</tr>';
		}
}
?>
</tbody>
<tfoot>
	<tr>
		<td colspan="4" style="text-align:right;">OVERALL TOTAL :</td>
		<td style="text-align:right;padding-right:20px;">P <?php echo number_format($allTotal,2); ?></td>
	</tr>
</tfoot>
</table>


</body>
</html>

