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
                                <td style="vertical-align:top;"><h1 style="margin:10px 0px;">Clinica Morita</h1>
					Av. Simón Bolívar #3356, Maipú   Fono : +56 - 2 - 4605285
				</td>
			</tr>
		</tbody>
	</table>
<h1>Sistema de Pago <?php echo rand(100000,999999); ?></h1>
<p>
	Fecha de la Boleta : 
	<?php
		date_default_timezone_set('Asia/Manila');
	 	echo date('l jS \of F Y h:i:s A');
	?>
</p>

<span>Nombre del Cliente: 
	<?php echo $customers[0]['first_name']; ?> 
	<?php echo $customers[0]['last_name']; ?>
</span>
<br />
<span>
	Mascota: 
	<?php echo $petName ?>
</span>

<br />
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
<td class="center" style="width: 65%">
	Detalle
</td>
<td style="width:30%;text-align:right;padding-right:20px;">Precio</td>

</tr>
<tr>
	<td><p>Hospitalización (Valor Diario: $ 3000.00):</p>
		<p>Desde: <?php echo $reportDateFrom; ?>Hasta: <?php echo $reportDateto; ?></p>
		<p>Número de dias: <?php echo $daysNumber ?></p>
	</td>
	<td style='text-align:right;vertical-align: bottom;'>$ <?php echo number_format($daysNumber *300,2)  ; ?></td>
</tr>
<tr>
	<td><?php echo $surgerys[0]['service_name']; ?>
	</td>
	<td style='text-align:right;'><p>$<?php echo number_format($surgerys[0]['price'],2)  ; ?></p></td>
</tr>
</tbody>
<tfoot>
	<tr>
		<td></td>
		<td style="text-align:right;"><br />TOTAL :$ <?php echo number_format(($daysNumber *300) + $surgerys[0]['price'],2)  ; ?></td>
	</tr>
</tfoot>
</table>


</body>
</html>

