<? //Recepcion de datos
$apellido=$_POST['apellido'];
$nombre=$_POST['nombre'];
$empresa=$_POST['empresa'];
$correo=$_POST['correo']; $asunto=$_POST['asunto'];
$consulta=$_POST['consulta'];
// Fin de recpcion de datos
// Accion de envio
//---------//
$para='AQUI EL MAIL!';
$mensaje='
Mensaje de:
'.$apellido.', '.$nombre.'
Correo:
'.$correo.'
Asunto:
'.$asunto.'
Consulta:
'.$consulta.'
';
$desde='From: '.$correo.'fcruces@ferproducciones.cl';
ini_set(sendmail_from,'fcruces@ferproducciones.cl');
mail($para,$asunto,$mensaje,$desde);
echo'Mensaje envido con exito, muchas gracias';
?>