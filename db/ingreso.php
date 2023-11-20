<?php

include '../db/conexion.php';

if (isset($_POST['login_btn'])) {
    $email = $_POST['correo'];
    $pass = $_POST['password'];
    $pass_code = base64_encode($pass);  /* Usar algoritmo de hashing mas seguro como bcrypt o Argon2.*/

    $consulta = mysqli_query($conexion, "SELECT * FROM usuariostb 
                            where mail_user = '$email' and password_user = '$pass_code'"); 
    /*La consulta anterior se debe preparar para prevenir ataques por inyeción de SQL*/

    $exist = mysqli_num_rows($consulta); 

    if ($exist == 1) {
        session_start();
        while ($datos = mysqli_fetch_array($consulta)) {
            $_SESSION['nombre'] = $datos['nombre_user'];
            $_SESSION['apellido'] = $datos['apellido_user'];
            $_SESSION['usuario'] = $datos['id_user'];
            $_SESSION['email'] = $datos['mail_user'];
        }
        header('location:../app/contratos.php');
    }else {
        header('location:/Login.php?status=3'); 
    }
    
    /* revisar el tema de como bloquea usuario despues de cierto numero de intentos fallidos */
}

?>