<?php
 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    // La instanciación y el paso de `true` habilita excepciones
$mail = new PHPMailer(true);

try {
    $mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);
    //Configuración del servidor
    $mail->SMTPDebug = 0;                      // Habilitar la salida de depuración detallada
    $mail->isSMTP();                                            // Enviar usando SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Configure el servidor SMTP para enviar
    $mail->SMTPAuth   = true;                                   // Habilitar la autenticación SMTP
    $mail->Username   = 'contacto.codigomanny@gmail.com';                     // Nombre de usuario SMTP
    $mail->Password   = 'Codigoo.2020';                               // Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilite el cifrado TLS; Se recomienda `PHPMailer::ENCRYPTION_SMTPS`
    $mail->Port       = 587;                                    // Puerto TCP para conectarse, use 465 para `PHPMailer::ENCRYPTION_SMTPS` arriba

    //Recipientes
    $mail->setFrom('contacto.codigomanny@gmail.com', 'Info Codigo Manny');
    $mail->addAddress('contacto.codigomanny@gmail.com', 'Codigo Manny');               // Nombre es opcional
   
    // Contenido
    $mail->isHTML(true);                                  // Establezca el formato de email en HTML
    $mail->Subject = "$nombre_modal $apellido_modal! ha enviado un mensaje.";
    $mail->Body    = "<h1>¡HOLA! nos han mandado un mensaje:</h1>
                      <p>Nombre: <b>$nombre_modal</b></p>
                      <p>Apellido: <b>$apellido_modal</b></p>
                      <p>Email: <b>$email_modal</b></p>
                      <p>Edad: <b>$edad_modal</b></p>
                      <p>Preferencias:</p>
                      <p>Coaching: <b>$coaching_modal</b></p>
                      <p>PNL: <b>$pnl_modal</b></p>
                      <p>Consultoria: <b>$consultoria_modal</b></p>
                      <p>Mensaje: <b>$mensaje_modal</b></p>
                      <br/><p style='text-align: center; font-weight: bold;'>Adriana Maldonado & Jesús Soto</p>
                      <p style='text-align: center; font-weight: bold;'>Life coachings</p>
                      <p style='text-align: center; font-weight: bold;'>Essential Coaching Academy</p>";
    $mail->send();
} catch (Exception $e) {
    echo "Mensaje De Error: {$mail->ErrorInfo}";
}
?>