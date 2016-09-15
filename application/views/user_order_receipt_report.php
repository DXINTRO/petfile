<html>
    <head>
        <title></title>
        <link href="<?php echo base_url(); ?>assets/css/reportsLayout.css" rel="stylesheet">

        <style>
            table th{
                border-width: 1px;
                border-top: 1px;
                border-bottom: 1px;
                border-right: 0px;
                border-left: 0px;
                border-style: solid;
                border-color:#000000;
            }
        </style>
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <td width="100"><img style="width:100px;" src="<?php echo base_url(); ?>assets/images/logo.jpg"></td>
                    <td width="208" style="vertical-align:top;"><h1 style="margin:10px 0px;">Clinica Morita</h1>
                    Av. Simón Bolívar #3356, Maipú, Santiago</td>
                </tr>
            </tbody>
        </table>
        <h1><?php echo $reportTitle ?> <?php echo $list_of_orders[0]['batchOrderId'] ?></h1>
        <p>Name: 
            <?php echo $list_of_orders[0]['first_name'] ?>, 
            <?php echo $list_of_orders[0]['last_name'] ?>
        </p>
        <p>
            Date : 
            <?php
            echo date('l jS \of F Y h:i:s A');
            ?>
        </p>
        <table class="detail" style="width:100%;margin: 0px; border-top: none;">

        </tbody>
    </table>


    <table class="table table-hover" style="width:100%;">
        <thead>
            <tr>
                <th style="width:40%;">Nombre del Producto</th>
                <th style="width:20%;text-align:right;padding-right:15px;">Precio</th>
                <th style="width:20%;text-align:right;padding-right:15px;">Cantidad</th>
                <th style="width:20%;text-align:right;padding-right:15px;">Precio Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_of_orders as $row) {

                echo "<tr>";
                echo "<td class='vert productName'>" . $row['product_name'] . "</td>";
                echo "<td style='text-align:right;padding-right:15px;' class='vert productPrice rightalignPadding'>P <span>" . $row['product_price'] . "</span></td>";
                echo "<td style='text-align:right;padding-right:15px;' class='vert orderAmount rightalignPadding'>" . $row['productAmount'] . "</td>";
                echo "<td style='text-align:right;padding-right:15px;' class='vert productTotal rightalignPadding'>P <span>" . $row['totalPrice'] . "</span></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td style='text-align:right;padding-right:15px;'><p style="text-align:left;">TOTAL</p>
                <span style="">$<?php echo $row['totalAll'] ?></span></td>
                <td></td>
            </tr>
        </tfoot>
    </table>


</body>
</html>

