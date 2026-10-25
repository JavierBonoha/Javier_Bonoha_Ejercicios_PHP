<?php
session_start();

// Catálogo de productos para poder consultar nombres y precios
$productos = array(
    1 => array('nombre' => 'Camiseta ITIC', 'precio' => 15.00),
    2 => array('nombre' => 'Pantalón ITIC', 'precio' => 25.00)
);

// Si el usuario hace clic en "Confirmar compra", eliminamos la cesta
if (isset($_POST['confirmar_pago'])) {
    unset($_SESSION['cistella']); // Se elimina la info guardada
    $compra_realizada = true;
} else {
    $compra_realizada = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprass</title>
</head>
<body>
    <h1>Resumen de mi Compra</h1>

    <?php if ($compra_realizada): ?>
        <h2>¡Gracias por tu compra!</h2>
        <p>El pago se ha realizado con éxito y la cesta ha sido vaciada.</p>
        <p><a href="cistella_compra.php">Volver al Menú Principal ITIC</a></p>

    <?php else: ?>

        <?php if (empty($_SESSION['cistella'])): ?>
            <p>El carrito está vacío.</p>
            <p><a href="cistella_compra.php">Volver al Menú Principal ITIC</a></p>
        <?php else: ?>
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($_SESSION['cistella'] as $id => $quantitat): 
                        $prod = $productos[$id];
                        $subtotal = $prod['precio'] * $quantitat;
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($prod['nombre']); ?></td>
                            <td><?php echo $prod['precio']; ?> €</td>
                            <td><?php echo $quantitat; ?></td>
                            <td><?php echo $subtotal; ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Total de mi compra: <?php echo $total; ?> €</h3>

            <!-- Botón para confirmar y simular el pago-->
            <form action="resum.php" method="POST">
                <input type="hidden" name="confirmar_pago" value="1">
                <button type="submit">Confirmar compra</button>
            </form>

            <br>
            <a href="cistella_compra.php">Seguir comprando</a>
        <?php endif; ?>

    <?php endif; ?>
</body>
</html>