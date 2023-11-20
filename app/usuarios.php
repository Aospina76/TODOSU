<?php
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

    if (isset($_GET['status'])) {
        if ($_GET['status'] == 1) {
            echo '<script>alert("El correo que intenta registrar ya está asignado a un usuario");</script>';
        }
    }

    if (isset($_GET['status'])) {
        if ($_GET['status'] == 2) {
            echo '<script>alert("El usuario ha sido registrado con exito");</script>';
        }
    }

    if (isset($_GET['status'])) {
        if ($_GET['status'] == 3) {
            echo '<script>alert("El usuario ha sido actualizado con exito");</script>';
        }
    }

    $sqlsentence = "SELECT *, CONCAT(nombre_user, ' ', apellido_user) AS nombre_completo FROM usuariostb";

    $query_usuarios = mysqli_query($conexion, $sqlsentence);
    
    // Inicializa un array vacío para almacenar los usuarios
    $usuarios = array();

    // Recorre los resultados de la consulta
    while ($usuario = mysqli_fetch_assoc($query_usuarios)) {
        // Añade cada usuario al array
        $usuarios[] = $usuario;
    }
?>

<script>
    // Asigna el array de usuarios a una variable JavaScript JSon
    var usuariosJS = <?php echo json_encode($usuarios); ?>;
</script>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
    <link rel="shortcut icon" type=image/x-icon href="../images/icons8-terraformar-48.svg"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/stylesmenuapp.css" type="text/css">
    <link href="../styles/stylesapp.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <menu-main></menu-main>
    <div id='Contenedor_principal'>
        <div id="Titulo_seccion">
            <h2>USUARIOS</h2>
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
            <h2>Registro</h2>
            <label for="nombreUsuario">Nombre del Usuario:</label>
            <input type="text" id="nombreUsuario" name="nombreUsuario" required>

            <label for="apellidoUsuario">Apellido del Usuario:</label>
            <input type="text" id="apellidoUsuario" name="apellidoUsuario" required>

            <label for="correoUsuario">Correo Electrónico del Usuario:</label>
            <input type="email" id="correoUsuario" name="correoUsuario" required>

            <label for="tipoUsuario">Tipo de Usuario:</label>
            <select id="tipoUsuario" name="tipoUsuario" required>
                <option value="normal">Normal</option>
                <option value="admin">Admininstrador</option>
            </select>

            <label for="passwordUsuario">Contraseña:</label>
            <input type="password" id="passwordUsuario" name="passwordUsuario" required>
            <label for="confirmpassword">Confirmar Contraseña:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>

            <button type="submit" class="btn btn-default btn3d" name='registro_btn'>Registrar</button>
        </form>
        <form id="Consulta" class="Formulario" onsubmit="return validarFormC()" method="POST" action="../back/usuarios/usuariosup.php">
            <h2>Consulta y Actualización</h2>
            <select name="Listausuarios" id="Listausuariosc">
                <option value="">seleccione un usuario</option>
                <?php
                    foreach ($usuarios as $usuario) {
                        echo '<option value="'. $usuario["id_user"]. '">'. $usuario["nombre_completo"]. '</option>';
                    }
                    /* No funciona porque ya se uso mysqli_fetch_assoc arriba para general el JSon el puntero queda de 
                            al final de $query_usuarios y vevuelve NULL al intentar recorrerlo para llenar el select.
                            ENTONCES TENER EN CUANTA CUANDO SE USE mysqli_fetch_assoc sobre un arreglo.
                    while ($usuarios = mysqli_fetch_assoc($query_usuarios)) {
                        $id_usuario = $usuarios["id_user"];
                        $nombre= $usuarios["nombre_completo"];
                        echo
                            '<option value="'. $id_usuario. '">'. $nombre .'</option>';
                    }
                    */
                ?>
           </select>
            <label for="nombreUsuarioc">Nombre del Usuario:</label>
            <input type="text" id="nombreUsuarioc" name="nombreUsuario" required>

            <label for="apellidoUsuarioc">Apellido del Usuario:</label>
            <input type="text" id="apellidoUsuarioc" name="apellidoUsuario" required>

            <label for="correoUsuarioc">Correo Electrónico del Usuario:</label>
            <input type="email" id="correoUsuarioc" name="correoUsuario" required>

            <label for="tipoUsuarioc">Tipo de Usuario:</label>
            <select id="tipoUsuarioc" name="tipoUsuario" required>
                <option value="normal">Normal</option>
                <option value="admin">Admininstrador</option>
            </select>

            <label for="passwordUsuarioc">Contraseña:</label>
            <input type="password" id="passwordUsuarioc" name="passwordUsuario" required>
            <button id="actualiza_btn" type="submit" class="btn btn-default btn3d" name='actualiza_btn'>Actualizar</button>
        </form>
    </div>

    <script src="../scripts/usuarios.js"></script>
    <script src="../scripts/menuprincipal_app.js"></script>
    <script>
        var usuariosJS = <?php echo json_encode($usuarios); ?>;
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

</body>
</html>
