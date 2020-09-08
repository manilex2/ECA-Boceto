<?php
    $nombre_boletin = $_POST["nombre"];
    $apellido_boletin = $_POST["apellido"];
    $email_boletin = $_POST["email"];

    require "conexionbol.php";

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre, $db_puerto);

    $servidor = $_SERVER["HTTP_HOST"];

    if(mysqli_connect_errno()){
            
        echo "Fallo al conectar con la BBDD";
        
        exit();
    }

    mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
    mysqli_set_charset($conexion, "utf8");
        
    $sql="INSERT INTO boletinreg (Nombre, Apellido, Email) VALUES (?,?,?)";
    $resultado=mysqli_prepare($conexion, $sql);
    $ok=mysqli_stmt_bind_param($resultado, "sss", $nombre_boletin, $apellido_boletin, $email_boletin);
    $ok=mysqli_stmt_execute($resultado);
        
    if($ok==false){
            
        echo "Error al ejecutar la consulta";
            
    }else{
            
        echo "<h2>Registro en boletin exitoso!</h2>";
            
        mysqli_stmt_close($resultado);

        require "enviar_mail.php";

        header("refresh:5;url=../");
    }
?>