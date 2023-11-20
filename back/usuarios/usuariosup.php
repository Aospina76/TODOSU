<?php
     session_start();
     if (!isset($_SESSION['usuario'])) {
         header('Location:../login.php');
         exit();
     }

    include '../../db/conexion.php';

    if (isset($_POST['actualiza_btn'])) {
        $iduser = $_POST['Listausuariosc'];
        $names = $_POST['nombreUsuarioc'];
        $lastname = $_POST['apellidoUsuarioc'];
        $email = $_POST['correoUsuarioc'];
        $tipouser = $_POST['tipoUsuarioc'];
        $pass = $_POST['passwordUsuarioc'];

        $pass_en = base64_encode($pass);

        $sql = mysqli_query($conexion, "UPDATE usuariostb 
        SET nombre_user = '$names', apellido_user = '$lastname', mail_user = '$email', tipo_user = '$tipouser', password_user = '$pass_en'
        WHERE id_user = '$iduser'");

        header("location:../../../app/usuarios.php?Status=3");

    }


    
?>
