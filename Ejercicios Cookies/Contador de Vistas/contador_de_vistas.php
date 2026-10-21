<?php
// 1. Gestionar el contador de visitas mediante Cookies
if (isset($_COOKIE['visitas'])) {
    $visitas = $_COOKIE['visitas'] + 1;
} else {
    $visitas = 1;
}
// Guardamos la cookie por 30 días
setcookie('visitas', $visitas, time() + (30 * 24 * 60 * 60));

// 2. Gestionar la compra y/0 descuento aplicado
$mensaje_compra = "";
$descuento_aplicado = "";

if (isset($_POST['comprar'])) {
    $codigo = isset($_POST['codigo_descuento']) ? trim($_POST['codigo_descuento']) : '';
    
    // Validar el código introducido
    if ($codigo === "BOTIGA20") {
        $mensaje_compra = "¡Compra realizada con éxito con un 20% de descuento!";
        // Guardamos una cookie indicando que ya ha usado un descuento
        setcookie('descuento_usado', 'true', time() + (30 * 24 * 60 * 60));
    } elseif ($codigo === "BOTIGA50") {
        $mensaje_compra = "¡Compra realizada con éxito con un 50% de descuento!";
        setcookie('descuento_usado', 'true', time() + (30 * 24 * 60 * 60));
    } elseif ($codigo === "") {
        $mensaje_compra = "¡Compra realizada con éxito a precio normal!";
    } else {
        $mensaje_compra = "El código introducido no es válido, pero la compra se ha procesado a precio normal.";
    }
}

// Comprobar si ya se ha usado un descuento anteriormente 
$ya_ha_comprado = isset($_COOKIE['descuento_usado']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de Visitas y Ofertas</title>
</head>
<body>
    <h1>Bienvenido a Tienda Madridista</h1>
    <p>Número de visitas: <strong><?php echo $visitas; ?></strong></p>

    <!-- Ofertas de descuento según el número de visitas -->
    <?php if (!$ya_ha_comprado): ?>
        <?php if ($visitas >= 10): ?>
            <p style="color: green; font-weight: bold;">
                Oferta exclusiva solo para ti! Utiliza el código BOTIGA50 para obtener un 50% de descuento en tus primera compra en la Tienda Madridista
            </p>
        <?php elseif ($visitas >= 5): ?>
            <p style="color: red; font-weight: bold;">
                Oferta exclusiva! Utiliza el código BOTIGA20 para obtener un 20% de descuento en tus primera compra en la Tienda Madridista
            </p>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Formulario de compra -->
    <form action="comptador_visites.php" method="POST">
        <label for="codigo_descuento">Código de descuento:</label>
        <input type="text" id="codigo_descuento" name="codigo_descuento" placeholder="Ej: VINICIUS7">
        <br><br>
        <button type="submit" name="comprar">Comprar producto</button>
    </form>

    <!-- Mensaje tras realizar la compra -->
    <?php if ($mensaje_compra !== ""): ?>
        <h3><?php echo $mensaje_compra; ?></h3>
    <?php endif; ?>
</body>
</html>