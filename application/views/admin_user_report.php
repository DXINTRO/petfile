<html>
    <head>
        <title></title>
        <link href="<?php echo base_url(); ?>assets/css/reportsLayout.css" rel="stylesheet">
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <td width="100"><img style="width:100px;" src="<?php echo base_url(); ?>assets/images/logo.jpg"></td>
                    <td width="315" style="vertical-align:top;"><h1 style="margin:10px 0px;">Clinica Morita</h1>
                        Avenida Simon Bolivar #3356, Maipu, Santiago</td>
                </tr>
            </tbody>
        </table>

        <h1>Reporte de Usuarios</h1>
        <table class="detail" style="width:100%;margin: 0px; border-top: none;">
            <tr>
                <td class="label">Desde:</td>
                <td class="field">
                    <?php
                    echo $reportDateFrom;
                    ?>
                </td>
                <td class="label">Hasta:</td>
                <td class="field">
                    <?php
                    echo $reportDateto;
                    ?>
                </td>

                </tbody>
        </table>
        <table class="list" style="width: 99%; margin-top: 1em;" id="generatedReportUser">

            <tbody><tr class="head">
                    <td class="center" style="width: 30%">Rut</td>
                    <td class="center" style="width: 30%">Email</td>
                    <td style="width: 15%">Usuario</td>
                    <td class="center" style="width: 15%">Nombre</td>
                    <td class="center" style="width: 15%">Apellido</td>
                    <td class="right" style="width: 25%;">Privilegios</td>
                </tr>
                <?php
                foreach ($users as $row) {
                    echo'<tr class="list_row">';
                    echo'<td class="center">' . $row['user_rut'] . '</td>';
                    echo'<td class="center">' . $row['email'] . '</td>';
                    echo'<td>' . $row['username'] . '</td>';
                    echo'<td class="center">' . $row['first_name'] . '</td>';
                    echo'<td style="text-align: left">' . $row['last_name'] . '</td>';
                    echo'<td>';
                    if ($row['user_level'] == 1) {
                        echo "<span>Cliente</span>";
                    } else if ($row['user_level'] == 2) {
                        echo "<span>Super Admin</span>";
                    } else if ($row['user_level'] == 3) {
                        echo "<span>Doctor</span>";
                    } else if ($row['user_level'] == 4) {
                        echo "<span>Secretaria</span>";
                    } else if ($row['user_level'] == 5) {
                        echo "<span>Contabilidad</span>";
                    } else if ($row['user_level'] == 6) {
                        echo "<span>Admin Clinica</span>";
                    }
                    echo'</td>';
                    echo'</tr>';
                }
                ?>
            </tbody>

        </table>


    </body>
</html>

