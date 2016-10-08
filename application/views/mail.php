<?php 

$nombre = $_POST['nombre'];
$mail = strtr( $_POST['mail'], array( "\n"=>"", "\r"=>"" ) );
$comentario   = $_POST['comentario'];

$mail_empresa ="efecruces@gmail.com";
mail($mail_empresa,"Consulta desde web www.petfile.cl","

Consulta:
--------------------------------------------------------------------------------------------
Enviado por: $nombre   Correo: $mail
--------------------------------------------------------------------------------------------
Detalle de la Consulta:
--------------------------------------------------------------------------------------------
$comentario
","From: $email");
 
?>