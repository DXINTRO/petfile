<html>
    <head>
        <title></title>
        <link href="<?php echo base_url(); ?>assets/css/reportsLayout.css" rel="stylesheet">
        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:8px 20px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:8px 20px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;}
            .tg .tg-i0og{color:#000000}
            .tg .tg-p01g{font-weight:bold;font-size:18px;color:#000000;vertical-align:top}
            .tg .tg-ee5k{font-weight:bold;color:#000000;vertical-align:top}
            .tg .tg-hvxd{font-weight:bold;color:#000000}
            .tg .tg-fefd{color:#000000;vertical-align:top}
        </style>
    </head>
    <body>

    <center>
        <table>
            <tbody>
                <tr>
                    <td><img style="width:100px;" src="<?php echo base_url(); ?>assets/images/logo.jpg"></td>
                    <td style="vertical-align:top;"><h1 style="margin:10px 0px;">Clinica Morita</h1>
                        Avenida Simon Bolivar #3356, Maipu
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <br>
     
        <br>
        <h2>Receta medica</h2>
          <br>
        <br>
        <br>
     

        <div style="margin-left: 70px;">
    <table class="tg">
        <tr>
            <td class="tg-ee5k">Paciente:</td>
            <td class="tg-i0og"><?php echo $data->petName ?></td>
            <td class="tg-ee5k">Especie:</td>
            <td class="tg-fefd"><?php echo $data->petSpecies ?></td>
        </tr>
        <tr>
            <td class="tg-ee5k">Propietario:</td>
            <td class="tg-fefd"><?php echo $data->first_name ?></td>
            <td class="tg-ee5k">Rut:</td>
            <td class="tg-fefd"><?php echo $data->user_rut ?></td>
        </tr>
        <tr>
            <td class="tg-ee5k">Domicilio</td>
            <td class="tg-fefd" colspan="3"><?php echo $data->address ?></td>
        </tr>
        <tr>
            <td class="tg-ee5k">ContraIndicaciones</td>
            <td class="tg-fefd"></td>
            <td class="tg-fefd"></td>
            <td class="tg-fefd"></td>
        </tr>
        <tr>
            <td class="tg-fefd" colspan="4"><?php echo $data->contraindicaciones ?></td>
        </tr>
        <tr>
            <td class="tg-ee5k">RP:</td>
            <td class="tg-fefd"></td>
            <td class="tg-fefd"></td>
            <td class="tg-fefd"></td>
        </tr>
        <tr>
            <td class="tg-fefd" colspan="4"><?php echo $data->Formulario_receta ?></td>
        </tr>
      
        
        <tr>
            <td class="tg-p01g"></td>
            <td class="tg-fefd"></td>
            <td class="tg-p01g"></td>
            <td class="tg-fefd"></td>
        </tr>
        <tr>
            <td class="tg-p01g"></td>
            <td class="tg-fefd"></td>
            <td class="tg-p01g"></td>
            <td class="tg-fefd"></td>
        </tr>
        <tr>
            <td class="tg-p01g"></td>
            <td class="tg-fefd"></td>
            <td class="tg-p01g"></td>
            <td class="tg-fefd"></td>
        </tr>
          <tr>
            <td class="tg-fefd"><?php echo $data->Fecha_creacion_prescription ?></td>
            <td class="tg-fefd"></td>
            <td class="tg-fefd">_______________________</td>
            <td class="tg-fefd"></td>
        </tr>
        <tr>
            <td class="tg-p01g"><center>Fecha</center></td>
            <td class="tg-fefd"></td>
            <td class="tg-p01g"> <center>   Firma</center></td>
            <td class="tg-fefd"></td>
        </tr>
        <tr>
            <td class="tg-fefd"></td>
            <td class="tg-fefd"></td>
            <td class="tg-fefd"></td>
            <td class="tg-fefd"></td>
        </tr>
    </table>
             </div>
        </center>
</body>
</html>

