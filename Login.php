<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        echo '<script>alert("registro éxitoso");</script>';
    }
    if ($_GET['status'] == 2) {
        echo '<script>alert("El usuario ya existe");</script>';
    }
    if ($_GET['status'] == 3) {
        echo '<script>alert("Acceso denegado");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTIC</title>
    <link rel="shortcut icon" type=image/x-icon href="images/icons8-terraformar-48.svg" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="styles/stylespageaplicacion.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <video class="Fondo" src="/videos/AdobeStock_450717838.mov" loop autoplay preload muted></video>
    <section id="Inicio" class="Seccion">
    <video class="Fondo" src="/videos/AdobeStock_450717838.mov" loop autoplay preload muted></video>
        <div class="Loging">
            <div class="Texto">
                <h2>INGRESO A GESTOR CONSULTIC</h2>
                <p>Sistema de gestión y seguimientos de contratos</p>
            </div>
            <form method="post" action="/scripts/login.php">
                <input type="text" id="username" placeholder="correo" name="username"><br>
                <input type="password" id="password" placeholder="Contraseña" name="password">
                <div>
                    <button type="submit">Entrar</button>
                    <a href="index.html">Cancelar</a>
                </div>
            </form> 
        </div>     
    </section>
</body>
</html>