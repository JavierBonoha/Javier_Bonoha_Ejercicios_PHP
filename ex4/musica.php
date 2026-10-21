<?php
// Si no se marca ningún botón, "estilo" no llega, por eso usamos isset
if (isset($_POST["estilo"])) {
    $estilo = $_POST["estilo"];

    if ($estilo == "rock") {
        echo "¡Viva el Rock! ";
    } elseif ($estilo == "pop") {
        echo "¡Pop! Como el de los 2010 no hay otro";
    } elseif ($estilo == "jazz") {
        echo "¡Jazz! la más elegante que existe.";
    } elseif ($estilo == "clasica") {
        echo "¡Clásica! Quién se resiste a la quinta sinfonía de Bethoveen";
    } elseif ($estilo == "reggaeton") {
        echo "¡Reggaeton! A mi me gusta la gasolina.";
    }
} 
else {
    echo "No has elegido ningún estilo, elige alguno.";
}
echo "<br><a href='index.html'>Volver</a>";
?>