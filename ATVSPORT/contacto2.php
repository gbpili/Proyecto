<?php
$nombre = $_POST[‘nombre’];
$email = $_POST[’email’];
$cuerpo = $_POST[‘mensaje’];
$para = 'pili@erola.es';
$asunto = $_POST['asunto'];
$header = 'From: ' .$email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

if ($_POST[‘submit’]) {
if (mail($para, $asunto, $msjCorreo, $header)) {
echo "<script language='javascript'>
alert('Mensaje enviado, muchas gracias.');
window.location.href = 'http://pili.erola.es';
</script>";
} else {
echo 'Falló el envio';
}
}
?>