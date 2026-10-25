<?php
session_start();

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
        <!-- Al lado del nombre de usuario incluimos el enlace para desconectarse -->
        <p>
            Usuario conectado: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong> | 
            <a href="logout.php">Cerrar sesión</a>
        </p>
        <nav>
            <a href="info1.php">Página 1</a> | 
            <a href="info2.php">Página 2</a>
        </nav>
    </header>
    <hr>

    <main>
        <h1>Página de Información</h1>
        <p>Puedes navegar entre las páginas y desloguearte en cualquier momento con el enlace de arriba.</p>
    </main>
</body>
</html>