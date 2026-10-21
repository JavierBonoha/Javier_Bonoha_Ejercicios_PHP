<?php

$hora = date("H");

if ($hora >= 5 && $hora < 14) {
    $saludo = "Buenos días";
} elseif ($hora >= 14 && $hora < 19) {
    $saludo = "Buenas tardes";
} else {
    $saludo = "Buenas noches";
}

echo "<h1>$saludo</h1>";
echo "<p>Hora del servidor: " . date("H:i:s") . "</p>";
?>