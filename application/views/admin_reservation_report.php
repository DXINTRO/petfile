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
                    <td style="vertical-align:top;"><h1 style="margin:10px 0px;">PetFile</h1>
                        63 Maysilo Circle cor. Boni Ave. Mandaluyong, Philippines phone 531-1581
                    </td>
                </tr>
            </tbody>
        </table>

        <h1>Reservations Report</h1>
        Generated Date : <?php echo date('Y-m-d H:i:s'); ?>
        <br/>
        <br/>
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
                    <td class="center" style="width: 15%">Reservation ID</td>
                    <td class="center" style="width: 10%">Date</td>
                    <td style="width: 35%">Service Name & Status</td>
                    <td class="center" style="width: 20%">Customer Name</td>
                    <td class="right" style="width: 15%;text-align:right;">Price</td>
                </tr>
                <?php
                foreach ($reservations as $row) {
                    echo'<tr class="list_row">';
                    echo'<td class="center">' . $row['reservationobjectId'] . '</td>';
                    echo'<td class="center">' . $row['reserveDate'] . ' ' . $row['reserveTime'] . '</td>';
                    $status = '';
                    if ($row['confirmed'] == 1) {
                        $status = "Confirmed";
                    } else {
                        $status = "Pending";
                    }
                    echo'<td class="center">Status : ' . $status . '<br/>' . $row['service_name'] . '</td>';
                    echo'<td>' . $row['last_name'] . ', ' . $row['first_name'] . '</td>';
                    echo'<td style="text-align:right;">P ' . number_format($row['price'], 2) . '</td>';
                    echo'</tr>';
                }
                ?>
            </tbody>

        </table>


    </body>
</html>

