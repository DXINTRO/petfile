<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.png">
        <title>PetFile</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/js/select2-3.4.5/select2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/redmond/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <?php
        foreach ($stylesheets as $item => $style) {
            echo '<link href="' . base_url() . 'assets/css/' . $style . '" rel="stylesheet">';
        }
        ?>
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php
            if ($show_navbar == "true") {
                echo $content_navbar;
            }
            ?>

            <?= $content_body ?>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.ui.autocomplete.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2-3.4.5/select2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/site.js"></script>

    </body>
</html>
