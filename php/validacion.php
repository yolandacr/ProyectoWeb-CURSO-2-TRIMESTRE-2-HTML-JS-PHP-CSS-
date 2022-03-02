<?php
$nombre  = $clave ="";
$err_nombre =$err_clave="";

 


 //  TODO ESTO SE EJECUTARÁ CUANDO ENVIEMOS EL FORMULARIO
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
         //  PRIMERO VALIDAMOS EL NOMBRE
     if (empty($_POST["nombre"])) {
         $err_nombre = "Introduzca el nombre";
     } else {
         //  Si el campo del nombre no está vacío, validamos que el nombre siga el formato correcto
         $p = '^[a-zA-Z]+(\ [0-9])?$';
         $pattern = "$p^";

         if (!preg_match($pattern, $_POST["nombre"])) {
             //  Si llegamos aquí, el nombre introducido no sigue el formato correcto
             $err_nombre = "El nombre no es correcto";
         } else {
             //  Si llegamos aquí, el nombre introducido es correcto y tenemos que "depurarlo"
             $nombre = depurar($_POST["nombre"]);
             $nombre= strtolower($nombre);
             $nombre= ucfirst($nombre);
         }
     }

     //VALIDAMOS LA CONTRASEÑA
     if (empty($_POST["clave"])) {
         $err_clave = "Escriba la contraseña";
     } else {
         //  Si el campo de la clave no está vacío, validamos que siga el formato correcto
         $p = '^[a-zA-Z]+(\ [0-9])?$';
         $pattern = "$p^";

         if (!preg_match($pattern, $_POST["clave"])) {
             //  Si llegamos aquí,  no sigue el formato correcto
             $err_clave = "La contraseña no es válida";
         } else {
             //  Si llegamos aquí,  es correcto y tenemos que "depurarlo"
             $nombre = depurar($_POST["nombre"]);
             $nombre= strtolower($nombre);
             $nombre= ucfirst($nombre);
         }
     }

 }
    

    //  FUNCIÓN PARA DEPURAR LOS DATOS
    function depurar($dato)
    {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }
