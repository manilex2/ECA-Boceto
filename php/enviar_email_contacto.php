<?php
 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
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
    $mail->setFrom('contacto.codigomanny@gmail.com', 'Codigo Manny');
    $mail->addAddress($email_modal);               // Nombre es opcional
   
    // Contenido
    $mail->isHTML(true);                                  // Establezca el formato de email en HTML
    $mail->Subject = "Hola $nombre_modal $apellido_modal! Tu mensaje se ha enviado exitosamente a Essential Coaching Academy.";
    $mail->Body    = "<h1>¡GRACIAS POR CONTACTARNOS!</h1>
                      <p>$nombre_modal, gracias por contactarnos, a la brevedad posible te estaremos contactando.</p>
                      <br/><p style='text-align:center'>Atentamente.</p><br/>
                      <p style='text-align: center; font-weight: bold;'>Adriana Maldonado & Jesús Soto</p>
                      <p style='text-align: center; font-weight: bold;'>Life coachings</p>
                      <p style='text-align: center; font-weight: bold;'>Essential Coaching Academy</p>";
    $mail->send();
} catch (Exception $e) {
    echo "Mensaje De Error: {$mail->ErrorInfo}";
}
?>