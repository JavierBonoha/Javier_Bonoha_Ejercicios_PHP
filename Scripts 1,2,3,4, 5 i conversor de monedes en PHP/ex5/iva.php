<?php
$precio = $_GET["precio"];
$iva    = $_GET["iva"];

if (is_numeric($precio) && $precio >= 0) {
    $importeIva = $precio * $iva / 100;   // cuánto es el IVA
    $total      = $precio + $importeIva;  // precio final

    echo "Precio sin IVA: $precio €<br>";
    echo "IVA ($iva%): $importeIva €<br>";
    echo "<strong>Total con IVA: $total €</strong>";
} else {
    echo "Error: escribe un precio válido.";
}
echo "<br><a href='index.html'>Volver</a>";
?>