<?php
//IMPORTS
require 'database.php';


$nombre="";
$clave="";

//CODIGO A EJECUTAR AL MANDAR EL FORMULARIO



  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //SI EL FORMULARIO ES EL DE REGISTRO
     
          $nombre=$_POST["nombre"];
          $clave=$_POST["clave"];

          
          if ($nombre!=""&&$clave!="") {
          //GENERA EL HASH
          $hash_clave = password_hash($clave, PASSWORD_DEFAULT);


          // Preparamos la sentencia
          $stmt = $dbh -> prepare("INSERT INTO usuario(nombre, clave)
          VALUES (:nombre, :clave)");
          // Hacemos el bind y la ejecutamos
          if ($stmt -> execute(array(':nombre'=>$nombre, ':clave'=>$hash_clave))) {
              
          }
          echo'<script type="text/javascript">
          alert("Usuario registrado con éxito");
          window.location.href="../index.html";
          </script>';
        }
  }

?>