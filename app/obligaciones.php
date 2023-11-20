<?PHP
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location:../login.php');
        exit();
      }
      
    include '../db/conexion.php';
    
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $usuario = $_SESSION['usuario'];
    $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTOR</title>
    <link rel="shortcut icon" type=image/x-icon href="../images/icons8-terraformar-48.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/stylesmenuapp.css" rel="stylesheet" type="text/css">
    <link href="../styles/stylesobligaciones.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <menu-main></menu-main>
    <div id='Contenedor_principal'>
        <div id="Titulo_seccion">
            <h2>OBLIGACIONES</h2>
        </div>
        <nav id="menu_left">
            <ul class="menu-item">
                <li><a href="#" onclick="showregistro()">REGISTRO</a></li>
            </ul>
            <ul class="menu-item">
                <li><a href="#" onclick="showconsulta()">CONSULTA</a></li>
            </ul>
        </nav>
        <form id="Registro" class="Formulario" onsubmit="return validarForm()" method="POST" action="../back/usuarios/usuariosreg.php">
            <h2>Registro obligaciones</h2>

        <form id="Consulta" class="Formulario" onsubmit="return validarForm()" method="POST" action="../back//usuarios/usuariosup.php">
            <h2>Consulta obligaciones</h2>            
        </form>
    </div>
    <script src="../scripts/menuprincipal_app.js"></script>
</body>
</html>