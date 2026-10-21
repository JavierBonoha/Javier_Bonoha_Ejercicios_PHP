
<?php
// Recogemos los datos que llegan por POST.
// El nombre entre corchetes es el "name" del campo en el formulario.
$name      = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email     = $_POST["email"];
$mensaje   = $_POST["mensaje"];

// htmlspecialchars evita que alguien escriba código HTML/JavaScript en el formulario
$name  = htmlspecialchars($name);
$email = htmlspecialchars($email);

// Comprobamos que no haya campos vacíos
if ($name == "" || $apellidos == "" || $email == "" || $mensaje == "") {
    echo "Error: tienes que rellenar todos los campos.";
    echo "<br><a href='index.html'>Volver</a>";
} else {
    echo "Mensaje recibido, $name. Gracias por ponerte en contacto con nosotros. Te responderemos a $email";
}
?>