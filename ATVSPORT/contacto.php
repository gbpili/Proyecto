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
    		$headers = "From: $nombre <$email>\r\n";  //Quien envia
    		$headers .= "X-Mailer: PHP5\n";
    		$headers .= 'MIME-Version: 1.0' . "\n";
    		$headers .= 'Content-type: text/plain' ."\r\n";
    		
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