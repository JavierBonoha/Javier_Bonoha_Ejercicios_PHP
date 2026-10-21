<?php
// Si el formulario se envía, guardamos las cookies y redirigimos a botiga.php
if (isset($_POST['guardar'])) {
    // Validación básica en PHP
    if (isset($_POST['majoredat']) && isset($_POST['idioma']) && isset($_POST['moneda'])) {
        $majoredat = $_POST['majoredat'];
        $idioma = $_POST['idioma'];
        $moneda = $_POST['moneda'];

        // Guardar en cookies durante 7 días
        setcookie('majoredat', $majoredat, time() + (7 * 24 * 60 * 60));
        setcookie('idioma', $idioma, time() + (7 * 24 * 60 * 60));
        setcookie('moneda', $moneda, time() + (7 * 24 * 60 * 60));

        // Redirigir a la tienda
        header("Location: botiga.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bodega - Configuración de Preferencias</title>
</head>
<body>
    <h1>Configuración de Preferencias de la Bodega</h1>

    <form action="bodega.php" method="POST">
        <!-- Pregunta Edad -->
        <label><strong>¿Eres mayor de edad?</strong></label><br>
        <input type="radio" id="si" name="majoredat" value="si" required>
        <label for="si">Sí</label>
        <input type="radio" id="no" name="majoredat" value="no" required>
        <label for="no">No</label>
        <br><br>

        <!-- Idioma -->
        <label for="idioma"><strong>Idioma:</strong></label><br>
        <select name="idioma" id="idioma" required>
            <option value="cat">Català</option>
            <option value="esp">Español</option>
            <option value="eng">English</option>
        </select>
        <br><br>

        <!-- Moneda -->
        <label for="moneda"><strong>Moneda:</strong></label><br>
        <select name="moneda" id="moneda" required>
            <option value="EUR">Euros (€)</option>
            <option value="GBP">Libras (£)</option>
            <option value="USD">Dólares ($)</option>
        </select>
        <br><br>

        <button type="submit" name="guardar">Entrar a la tienda</button>
    </form>
</body>
</html>