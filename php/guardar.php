<?php
//IMPORTS
require 'database.php';
require 'validacion.php';

$usuario="";
$clave="";

//CODIGO A EJECUTAR AL MANDAR EL FORMULARIO



  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //SI EL FORMULARIO ES EL DE REGISTRO
     
          $usuario=$_POST["nombre"];
          $clave=$_POST["clave"];

          
          if ($usuario!=""&&$clave!="") {
          //GENERA EL HASH
          $hash_clave = password_hash($clave, PASSWORD_DEFAULT);


          // Preparamos la sentencia
          $stmt = $dbh -> prepare("INSERT INTO usuario(nombre, clave)
          VALUES (:nombre, :clave)");
          // Hacemos el bind y la ejecutamos
          if ($stmt -> execute(array(':nombre'=>$usuario, ':clave'=>$hash_clave))) {
              
          }
          //REDIRECCIONAMIENTO
          header("location:../index.html");
        }
  }

?>