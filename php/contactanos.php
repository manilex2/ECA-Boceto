<?php
    $nombre_modal = $_POST["nombremodal"];
    $apellido_modal = $_POST["apellidomodal"];
    $email_modal = $_POST["emailmodal"];
    $edad_modal = $_POST["edadmodal"];
    $coaching_modal = $_POST["coaching"];
    $pnl_modal = $_POST["pnl"];
    $consultoria_modal = $_POST["consultoria"];
    $mensaje_modal = $_POST["mensajemodal"];

    require "conexionbol.php";

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_puerto);

    if(mysqli_connect_errno()){
            
        echo "Fallo al conectar con la BBDD";
        
        exit();
    }

    mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
    mysqli_set_charset($conexion, "utf8");
        
    $sql="INSERT INTO contactanos (Nombre, Apellido, Email, Edad, Coaching, PNL, Consultoria, Mensaje) VALUES (?,?,?,?,?,?,?,?)";
    $resultado=mysqli_prepare($conexion, $sql);
    $ok=mysqli_stmt_bind_param($resultado, "sssissss", $nombre_modal, $apellido_modal, $email_modal, $edad_modal, $coaching_modal, $pnl_modal, $consultoria_modal, $mensaje_modal);
    $ok=mysqli_stmt_execute($resultado);
        
    if($ok==false){
            
        echo "Error al ejecutar la consulta";
            
    }else{
            
        echo "<h2>Gracias por contactarnos!</h2>";

        echo "<h3>A la brevedad posible te estaremos contactando.</h3>";
            
        mysqli_stmt_close($resultado);

        require "contactar.php";

        require "enviar_email_contacto.php";

        header("refresh:5;url=../");
    }
?>