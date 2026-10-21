<?php

$tasa = 1.08;


if (isset($_GET["dólares"])) {
    $cantidad = $_GET["dólares"];

    if (is_numeric($cantidad)) {
        $resultado = $cantidad / $tasa;   // para pasar de $ a € se divide
        echo "$cantidad $ equivalen a $resultado €";
    } else {
        echo "Error: escribe un número válido.";
    }

} elseif (isset($_GET["euros"])) {
    $cantidad = $_GET["euros"]

    if (is_numeric($cantidad)) {
        $resultado = $cantidad * $tasa; //para pasar de € a $ se multiplica
        echo "$cantidad € equivalen a $resultado $";
    } else {
        echo "Error: escribe un número válido.";
    }
    
} else {
    echo "No has escrito ningún valor"

}


echo "<br><a href='index.html'>Volver</a>";
?>