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
    $mail->Password   = '*************';                               // Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilite el cifrado TLS; Se recomienda `PHPMailer::ENCRYPTION_SMTPS`
    $mail->Port       = 587;                                    // Puerto TCP para conectarse, use 465 para `PHPMailer::ENCRYPTION_SMTPS` arriba

    //Recipientes
    $mail->setFrom('contacto.codigomanny@gmail.com', 'Codigo Manny');
    $mail->addAddress($email_boletin);               // Nombre es opcional
   
    // Content
    $mail->isHTML(true);                                  // Establezca el formato de email en HTML
    $mail->Subject = "Hola $nombre_boletin $apellido_boletin! bienvenido a nuestro boletin.";
    $mail->Body    = "<h1>¡GRACIAS POR REGISTRARTE EN NUESTRO BOLETIN!</h1>
                      <p>$nombre_boletin, gracias por registrarte te estaremos enviando información por este medio con nuestras actualizaciones.</p>
                      <br/><p style='text-align:center'>Atentamente.</p>
                      <p style='text-align: center; font-weight: bold;'>Adriana Maldonado & Jesús Soto</p>
                      <p style='text-align: center; font-weight: bold;'>Life coachings</p>
                      <p style='text-align: center; font-weight: bold;'>Essential Coaching Academy</p>";

    $mail->send();
} catch (Exception $e) {
    echo "Mensaje De Error: {$mail->ErrorInfo}";
}
?>