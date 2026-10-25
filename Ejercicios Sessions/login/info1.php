<?php
session_start();

// Si no hay sesión iniciada, se redirige a la página de login
if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conexión Establecida</title>
</head>
<body>
    
    <header>
        <p>Usuario conectado: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>
        <nav>
            <a href="info1.php">Página 1</a> | 
            <a href="info2.php">Página 2</a>
        </nav>
    </header>
    <hr>

    <main>
        <h1>Página de Información</h1>
        <p>Bienvenido al contenido exclusivo de la primera página.</p>
    </main>
</body>
</html>