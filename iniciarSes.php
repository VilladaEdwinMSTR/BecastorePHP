<?php

session_start(); // Iniciar sesión
include("con_db.php"); // Incluir el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Verificar si se ha enviado el formulario por POST

    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consultar la base de datos para verificar las credenciales
    $consulta = "SELECT * FROM signup WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conex, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        // Si se encuentra una fila, las credenciales son correctas
        $_SESSION['correo'] = $correo; // Guardar el correo electrónico en la sesión
        header("location: estudianteInicio.html"); // Redirigir al perfil del usuario
        exit();
    } else {
        // Si no se encuentra ninguna fila, las credenciales son incorrectas
        header("location: login.html?error=1");   
    }
}
?>
