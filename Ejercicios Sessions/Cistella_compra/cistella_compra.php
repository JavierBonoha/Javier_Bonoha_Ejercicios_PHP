<?php
session_start();

// Si no existe la cesta en la sesión, la inicializamos como un array vacío
if (!isset($_SESSION['cistella'])) {
    $_SESSION['cistella'] = array();
}

// Catálogo de productos (Nombre y Precio)
$productos = array(
    1 => array('nombre' => 'Camiseta ITIC', 'precio' => 15.00),
    2 => array('nombre' => 'Pantalón ITIC', 'precio' => 25.00) 
);

// Procesar el envío del formulario al añadir un producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto_id'])) {
    $id = intval($_POST['producto_id']);
    $quantitat = intval($_POST['quantitat']);

    // Validamos que sea un producto válido y que la cantidad sea mayor que 0
    if (isset($productos[$id]) && $quantitat > 0) {
        // Si el producto ya está en el carrito, sumamos la cantidad
        if (isset($_SESSION['cistella'][$id])) {
            $_SESSION['cistella'][$id] += $quantitat;
        } else {
            $_SESSION['cistella'][$id] = $quantitat;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ITIC SHOP - CARRITO</title>
</head>
<body>
    <h1>Bienvenido a ITIC SHOP</h1>

    <h2>Nuestra Gama de Productos</h2>

    <!-- Producto 1 -->
    <div>
        <h3><?php echo $productos[1]['nombre']; ?> - Precio: <?php echo $productos[1]['precio']; ?>€</h3>
        <form action="cistella_compra.php" method="POST">
            <input type="hidden" name="producto_id" value="1">
            <label for="cant_1">Cantidad:</label>
            <input type="number" id="cant_1" name="quantitat" value="1" min="1" required>
            <button type="submit">Añadir al carrito</button>
        </form>
    </div>

    <br><hr><br>

    <!-- Producto 2 -->
    <div>
        <h3><?php echo $productos[2]['nombre']; ?> - Precio: <?php echo $productos[2]['precio']; ?>€</h3>
        <form action="cistella_compra.php" method="POST">
            <input type="hidden" name="producto_id" value="2">
            <label for="cant_2">Cantidad:</label>
            <input type="number" id="cant_2" name="quantitat" value="1" min="1" required>
            <button type="submit">Añadir al carrito</button>
        </form>
    </div>

    <br><hr><br>

    <!-- Enlace / Botón para ir al resumen de compra -->
    <a href="resum.php">
        <button type="button">Finalizar compra</button>
    </a>
</body>
</html>