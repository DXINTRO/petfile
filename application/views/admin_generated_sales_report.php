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
				<td style="vertical-align:top;"><h1 style="margin:10px 0px;">Clinica Morita</h1>
					Avenida Simon Bolivar #3356, Maipu
				</td>
			</tr>
		</tbody>
	</table>
	
	
<h1>Reporte de Ventas </h1></center>
<p>
	Desde :<?php echo $reportDateFrom; ?>
</p>
<p>
	Hasta: <?php echo $reportDateto; ?>
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
			echo 'Diario';		
		}else if($reportMode=='Weekly'){
			echo 'Semanal';
		}else if($reportMode=='Monthly'){
			echo 'Mensual';
		}
	?>
	
</td>
<td style="text-align:center;">Total </td>
</tr>
<?php
$allTotal=0;
$counter =0;
date_default_timezone_set('america/santiago');
foreach ($sales as $row){
	$allTotal =$allTotal + $row['saleGross'];
	
		if($reportMode=='Daily'){
			$rest = date('d-m-Y', strtotime($row['saleDate']));

			echo'<tr class="list_row">';
				echo'<td colspan="4" class="center">'.$rest.'</td>';
				echo'<td style="text-align:right;padding-right:20px;">$ '.number_format($row['saleGross'],2).'</td>';
				
			echo'</tr>';

			foreach ($allItems as $item){
				$itemrest=date('d-m-Y', strtotime($item['saleDate']));
						if($itemrest == $rest){
							echo'<tr>';
							echo'<td style="vertical-align:top;">&nbsp;&nbsp;&nbsp;'.date('d-m-Y', strtotime($item['saleDate'])).'</td>';	
							echo'<td colspan="3" style="vertical-align:top;">Item: '.$item['itemName'].' <br/>Cantidad: '.$item['itemQuantity'].'</td>';
							echo'<td style="text-align:right;padding-right:20px;vertical-align:bottom;">$'.number_format($item['itemTotalPrice'],2).'</td>';
							echo'</tr>';
						}
			}

			echo'<tr>';
			echo'<td colspan=4 style="text-align:right;">TOTAL DIA:</td>';
			echo'<td style="padding:10px 0px;;text-align:right;padding-right:20px;">$ '.number_format($row['saleGross'],2).'</td>';
			echo'</tr>';
		}
		else if($reportMode=='Weekly'){
			echo'<tr class="list_row">';
				$year = date('Y', strtotime($row['rawSaleDate']));
				// $rest = date("Y-m-d", strtotime("1.1.".$year." + ".$row['saleDate']." weeks"));
				// $date1=date('Y-m-d', strtotime(''.$year.'W'.$row['saleDate'].'1'));

				echo'<td colspan="4">';
				echo'Semana '.$row['saleDate'].' del '.$year.'';	
				echo'</td>';

				echo'<td style="text-align:right;padding-right:20px;"></td>';
			echo'</tr>';

			foreach ($allItems as $item){
						if($item['itemWeek'] == $row['saleDate'] && $year == $item['itemYear']){
							echo'<tr>';
							echo'<td style="vertical-align:top;">&nbsp;&nbsp;&nbsp;'.date('d-m-Y', strtotime($item['saleDate'])).'</td>';	
							echo'<td colspan="3" style="vertical-align:top;">Item: '.$item['itemName'].' <br/>Cantidad: '.$item['itemQuantity'].'</td>';
							echo'<td style="text-align:right;padding-right:20px;vertical-align:bottom;">P'.number_format($item['itemTotalPrice'],2).'</td>';
							echo'</tr>';
						}
			}

			echo'<tr>';
			echo'<td colspan=4 style="text-align:right;">TOTAL SEMANA:</td>';
			echo'<td style="padding:10px 0px;;text-align:right;padding-right:20px;">$ '.number_format($row['saleGross'],2).'</td>';
			echo'</tr>';
		}else if($reportMode=='Monthly'){
			echo'<tr class="list_row">';
				$year = date('Y', strtotime($row['rawSaleDate']));
				$month = date('m', strtotime($row['rawSaleDate']));
				//$rest = date("Y-m-d", strtotime("1.1.".$year." + ".$row['saleDate']." weeks"));
				// $date1=date('Y-m-d', strtotime(''.$year.'W'.$row['saleDate'].'1'));

				echo'<td colspan="4">';
				echo'Mes '.$month.' Agno '.$year.'';	
				echo'</td>';

				echo'<td style="text-align:right;padding-right:20px;"></td>';
				echo'</tr>';

				foreach ($allItems as $item){
						$itemMonth=date('m', strtotime($item['saleDate']));
							if($month == $itemMonth && $year == $item['itemYear']){
								echo'<tr>';
								echo'<td style="vertical-align:top;">&nbsp;&nbsp;&nbsp;'.date('d-m-Y', strtotime($item['saleDate'])).'</td>';	
								echo'<td colspan="3" style="vertical-align:top;">Item: '.$item['itemName'].' <br/>Cantidad: '.$item['itemQuantity'].'</td>';
								echo'<td style="text-align:right;padding-right:20px;vertical-align:bottom;">$'.number_format($item['itemTotalPrice'],2).'</td>';
								echo'</tr>';
							}
				}

				echo'<tr>';
				echo'<td colspan=4 style="text-align:right;">TOTAL SEMANA:</td>';
				echo'<td style="padding:10px 0px;;text-align:right;padding-right:20px;">$ '.number_format($row['saleGross'],2).'</td>';
				echo'</tr>';
		}
}
?>
</tbody>
<tfoot>
	<tr>
		<td colspan="4" style="text-align:right;">TOTAL A PAGAR :</td>
		<td style="text-align:right;padding-right:20px;">$ <?php echo number_format($allTotal,2); ?></td>
	</tr>
</tfoot>
</table>


</body>
</html>

