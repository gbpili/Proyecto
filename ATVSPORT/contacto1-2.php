<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="Mª Pilar Llaves" />

		<link rel="icon" href="../../favicon.ico" />

		<title>Contacto</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.css"/>
		
		<link rel="stylesheet" href="text/css/carousel.css" />
		<link rel="stylesheet" href="text/css/navbar-fixed-top.css" />
		<link rel="stylesheet" href="text/css/jumbotron.css" />
		<link rel="stylesheet" href="text/css/estilo.css" />
		
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="bower_components/jQuery/dist/jquery.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	
    <body>

<?php

    if(isset($_POST['envio'])){
    	$errors = array();
    	if($_POST['nombre'] == ""){
    		$errors[1] = '<span class="error">Introduzca su nombre y apellidos</span>';
    	}else if($_POST['email'] == "" or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])) {
    		$errors[2] = '<span class="error">Introduzca un e-mail correcto</span>';
    	}else if($_POST['tfno'] == "") {
    		$errors[3] = '<span class="error">Introduzca su número de teléfono</span>';
    	}else if($_POST['asunto'] == "") {
    		$errors[4] = '<span class="error">Introduzca el asunto o actividad</span>';
		}else if($_POST['mensaje'] == "") {
    		$errors[5] = '<span class="error">Introduzca un mensaje</span>';
    	}else{
    		$dest = "mpllaves@gmail.com";  // Email destino
    		$nombre = $_POST['nombre'];
    		$email = $_POST['email'];
    		$tfno = $_POST['tfno'];
    		$asunto = $_POST['asunto'];
    		$cuerpo = $_POST['mensaje'];
    		//Cabeceras del correo
    		$headers = "De: $nombre <$email>\r\n";  //Quien envia
    		    		
    		if(mail($dest,$asunto,$cuerpo,$headers)){
    			$result = '<div class="result_ok">Email enviado correctamente </div>';
				// si el envio fue bien reseteamos lo que el usuario escribio
				$_POST['nombre'] = '';
				$_POST['email'] = '';
				$_POST['tfno'] = '';
				$_POST['asunto'] = '';
				$_POST['mensaje'] = '';
			}else{
				$result = '<div class="result_fail">Hubo u error al enviar el mensaje </div>';
			}
		}
    	
    }else{
    	$_POST['nombre'] = '';
		$_POST['email'] = '';
		$_POST['tfno'] = '';
		$_POST['asunto'] = '';
		$_POST['mensaje'] = '';
    }
 
?>

</body>
</html>
