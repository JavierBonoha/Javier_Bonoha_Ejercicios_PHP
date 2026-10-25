<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// Validación básica HTML / PHP
if (!empty($usuario) && !empty($password)) {
    // Comprobamos si el usuario es igual a la contraseña (ejemplo: anna / anna)
    if ($usuario === $password) {
        // Guardamos el usuario en la sesión
        $_SESSION['usuario'] = $usuario;
        
        // Redirigimos a la primera página de información
        header('Location: info1.php');
        exit();
    }
}

// Si la validación falla o los datos no son correctos, volvemos al login
header('Location: index.html');
exit();
?>