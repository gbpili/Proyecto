<?php
if(isset($_POST['email'])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $email_to = "mpllaves@gmail.com";
 
    $email_asunto = $_POST['asunto'];   
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
        
        echo $error."<br /><br />";
 
        echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['nombre']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['tfno']) ||
 
        !isset($_POST['asunto']) ||
 
        !isset($_POST['mensaje'])) {
 
        died('Lo sentimos pero parece haber un problema con los datos enviados.');       
 
    }
 // Declaración de variables
    
    $nombre = $_POST['nombre']; // requerido
 
    $email_de = $_POST['email']; // requerido
 
    $telefono = $_POST['tfno']; // no requerido
 
    $asunto = $_POST['asunto']; // requerido 

    $mensaje = $_POST['mensaje']; // requerido
 
    $error_mensaje = "Error";

//En esta parte se verifica que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_de)) {
 
    $error_mensaje .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$nombre)) {
 
    $error_mensaje .= 'El formato del nombre no es válido<br />';
 
  }
 
  if(!preg_match($string_exp,$asunto)) {
 
    $error_mensaje .= 'el formato del asunto no es válido.<br />';
 
  }
 
  if(!preg_match($string_exp,$mensaje)) {
 
    $error_mensaje.= 'el formato del mensaje no es válido.<br />';
 
  } 
  
  if(strlen($mensaje) < 2) {
 
    $error_mensaje .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_mensaje) < 0) {
     died($error_mensaje);
  }
 
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_mensaje = "Contenido del Mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_mensaje .= "Nombre: ".clean_string($nombre)."\n";
 
    $email_mensaje .= "Email: ".clean_string($email_de)."\n";
 
    $email_mensaje .= "Teléfono: ".clean_string($tfno)."\n";
	
	$email_mensaje .= "Asunto: ".clean_string($asunto)."\n";
 
    $email_mensaje .= "Mensaje: ".clean_string($mensaje)."\n";
  
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$email_de."\r\n".
 
'Reply-To: '.$email_de."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_asunto, $email_mensaje, $headers);  
 
?>
 
 
 
<!-- incluye aqui tu propio mensaje de Éxito-->
 
Gracias! Nos pondremos en contacto contigo a la brevedad
 
 
<?php
 
}
 
?>