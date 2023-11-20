<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location:../login.php');
        exit();
    }


    include '../../db/conexion.php';
    
    if (isset($_POST['registro_btn'])) {
        $names = $_POST['nombreUsuario'];
        $lastname = $_POST['apellidoUsuario'];
        $email = $_POST['correoUsuario'];
        $tipouser = $_POST['tipoUsuario'];
        $pass = $_POST['passwordUsuario'];

        $pass_en = base64_encode($pass);   /* Usar algoritmo de hashing mas seguro como bcrypt o Argon2.*/

        $validacion = mysqli_query($conexion, "SELECT * FROM usuariostb where mail_user = '$email'"); //PREPARAR SQL PARA EVITAR INYECION SQL
        $cant = mysqli_num_rows($validacion);

        if ($cant == 1) {
           /* echo "<script>alert('Usuario ya registrado'); window.location = 'app/usuarios.php';</script>";
            exit;       OTRA FORMA DE MOSTRAR ALERTAS SIN USAR UN GET*/ 
            header("location:app/usuarios.php?status=1"); // USA UN GET COM MEJORA PUEDE DEVOLVERSE  DATOS DEL USUARIO YA REGISTRADO A MODO INFORMATIVO
        }else{  
            $sql = mysqli_query($conexion, "INSERT INTO usuariostb 
            (nombre_user, apellido_user, mail_user, tipo_user, password_user) VALUES
            ('$names', '$lastname', '$email', '$tipouser', '$pass_en')");
            header("location:../../app/usuarios.php?status=2");
        }
    }

    
?>