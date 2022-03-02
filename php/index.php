<?php
session_start();  //para poder acceder  alo almacenado en la sesión o para grabar en ella
require 'database.php';  //parecido al import de java
require 'validacion.php';



$nombre="";
$clave="";

//SE EJECUTA SI EL METODO DEL FORMULARIO ES POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre=$_POST["nombre"];
    $clave=$_POST["clave"];

    if ($nombre!="" && $clave!="") {

        //SENTENCIA DE SELECCION EN LA BBDD DONDE COINCIDE EL NOMBRE DE USUARIO
        $stmt = $dbh->prepare("SELECT * FROM usuario WHERE nombre=:nombre");
        $stmt->bindParam("nombre", $nombre, PDO::PARAM_STR);
        $stmt->execute();

        //ALMACENA TODOS LOS DATOS DE LA FILA .USUARIO Y CONTRASEÑA.
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
        //SI NO COINCIDEN EL NOMBRE Y LA CLAVE CON LA FILA SELECCIONADA, SE EJECUTA ESTE CODIGO
        if (!$result) {
            echo '<p class="error">Combinación de usuario y contraseña errónea</p>';
        } else {
            // SI COINCIDEN AMBOS SE INICIA LA SESION CON LOS DATOS. SE CREA LA SESION.
            if (password_verify($clave, $result['clave'])) {
                $_SESSION['nombre'] = $result['nombre'];
                header('Location: ../html/mantenimiento.html');
            } else {
                echo '<p class="error">Fallo de autentificación</p>';
            }
        }
    }

    $dbh = null;
}




?>
