<html>
    <head>
        <title></title>
        <link href="<?php echo base_url(); ?>assets/css/reportsLayout.css" rel="stylesheet">
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <td><img style="width:100px;" src="<?php echo base_url(); ?>assets/images/logo.jpg"></td>
                    <td style="vertical-align:top;"><h1 style="margin:10px 0px;">Clinica Morita</h1>
                    Avenida Simon Bolívar #3356, Maipu, Santiago</td>
                </tr>
            </tbody>
        </table>
        <h2>Registro de Reserva</h2>
        <table class="detail" style="width:100%;margin: 0px; border-top: none;">
            <tr>
                <td class="label">Fecha:</td>
                <td class="field">
                    <?php
                    echo date('l jS \of F Y h:i:s A');
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Nombre de Cliente:
                    <?php echo $reservations[0]['first_name'] ?>, 
                    <?php echo $reservations[0]['last_name'] ?>
                </td>
            </tr>
            <tr><td></td></tr>
        </tbody>
    </table>
    <table class="list" style="width: 99%; margin-top: 1em;" id="generatedReportUser">

        <tbody>
            <tr class="head">
                <td class="center" style="width: 10%">Fecha</td>
                <td style="width: 35%">Nombre del Servicio</td>
                <td class="center" style="width: 20%">Cliente</td>
                <td class="right" style="width: 15%;text-align:right;">Precio</td>
            </tr>
            <?php
            foreach ($reservations as $row) {
                echo'<tr class="list_row">';
                echo'<td class="center">' . $row['reserveDate'] . ' ' . $row['reserveTime'] . '</td>';
                echo'<td class="center">' . $row['service_name'] . '</td>';
                echo'<td>' . $row['last_name'] . ', ' . $row['first_name'] . '</td>';
                echo'<td style="text-align:right;">P ' . $row['price'] . '</td>';
                echo'</tr>';
            }
            ?>
        </tbody>

    </table>


</body>
</html>

