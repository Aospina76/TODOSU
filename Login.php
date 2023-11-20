<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 3) {
        echo '<script>alert("Credenciales incorrectas");</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="styles/stylesLogin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <section id="Contenedor" class="Seccion">    
        <video class="Fondo" src="videos/AdobeStock_450717838.mov" loop autoplay preload muted></video>
        <div class="Login">
            <div class="Texto">
                <h2>INGRESO A GESTOR CONSULTIC</h2>
                <p>Sistema de gestión y seguimientos de contratos</p>
            </div>
            <form method="POST" action="../db/ingreso.php">
                <input type="email" id="correo" placeholder="Correo" name="correo" required>
                <input type="password" id="password" placeholder="Contraseña" name="password" required>
                <div>
                    <button name="login_btn" type="submit" class="btn btn-default btn3d">Entrar</button>
                    <a class="btn btn-default btn3d" href="index.html">Cancelar</a>
                </div>
            </form> 
        </div>     
    </section>
</body>
</html>