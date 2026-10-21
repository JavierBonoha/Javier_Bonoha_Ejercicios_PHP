<?php
// Comprobar que las cookies existen, si no, volver al formulario
if (!isset($_COOKIE['majoredat']) || !isset($_COOKIE['idioma']) || !isset($_COOKIE['moneda'])) {
    header("Location: bodega.php");
    exit();
}

$majoredat = $_COOKIE['majoredat'];
$idioma = $_COOKIE['idioma'];
$moneda = $_COOKIE['moneda'];

// Si es menor de edad, mostramos únicamente el mensaje de restricción
if ($majoredat === 'no') {
    if ($idioma === 'cat') {
        $mensaje_error = "No et podem vendre alcohol si ets menor d'edat.";
    } elseif ($idioma === 'eng') {
        $mensaje_error = "We cannot sell you alcohol if you are a minor.";
    } else {
        $mensaje_error = "No te podemos vender alcohol si eres menor de edad.";
    }
} else {
    // Definir conversión de precios según la moneda elegida (Base: EUR)
    // Producto 1: Vino "Les Terrasses" (39 €)
    // Producto 2: Cava Reserva (25 €)
    if ($moneda === 'GBP') {
        $precio_p1 = "33 £";
        $precio_p2 = "21 £";
    } elseif ($moneda === 'USD') {
        $precio_p1 = "42 $";
        $precio_p2 = "27 $";
    } else { // EUR
        $precio_p1 = "39 €";
        $precio_p2 = "25 €";
    }

    // Traducción de textos
    if ($idioma === 'cat') {
        $titulo = "La nostra Bodega";
        $desc_p1 = "T'oferim el vi \"Les Terrasses\" a un preu de ";
        $desc_p2 = "T'oferim el cava Reserva a un preu de ";
    } elseif ($idioma === 'eng') {
        $titulo = "Our Winery";
        $desc_p1 = "We offer you the wine \"Les Terrasses\" at a price of ";
        $desc_p2 = "We offer you the Reserva Cava at a price of ";
    } else { // esp
        $titulo = "Nuestra Bodega";
        $desc_p1 = "Te ofrecemos el vino \"Les Terrasses\" a un precio de ";
        $desc_p2 = "Te ofrecemos el cava Reserva a un precio de ";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bodega - Catálogo</title>
</head>
<body>
    <?php if ($majoredat === 'no'): ?>
        <h2 style="color: red;"><?php echo $mensaje_error; ?></h2>
        <a href="bodega.php">Cambiar preferencias</a>
    <?php else: ?>
        <h1><?php echo $titulo; ?></h1>
        <ul>
            <li><?php echo $desc_p1 . $precio_p1; ?></li>
            <li><?php echo $desc_p2 . $precio_p2; ?></li>
        </ul>
        <br>
        <a href="bodega.php">Modificar preferencias (Idioma/Moneda)</a>
    <?php endif; ?>
</body>
</html>