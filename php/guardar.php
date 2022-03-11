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
         
            $pStatementComprobarUsuario = $dbh->prepare("SELECT * FROM usuario WHERE nombre = :nombre LIMIT 1;");

            $success = $pStatementComprobarUsuario->execute([
                ":nombre" => $nombre
            ]);
            $rowCount = $pStatementComprobarUsuario->rowCount();
    
            if ($success && $rowCount == 1) {
              echo'<script type="text/javascript">
              alert("El nombre de usuario ya existe");
              window.location.href="../html/registro.html";
              </script>';
            }else{
              $pStatementRegistrar = $dbh->prepare("INSERT INTO usuario (nombre, clave) VALUES (:nombre, :clave)");
              $success = $pStatementRegistrar->execute([
                  ":nombre" => $nombre,
                  ":clave" => password_hash($clave, PASSWORD_DEFAULT)
              ]);

              echo'<script type="text/javascript">
              alert("Usuario registrado con éxito");
              window.location.href="../index.html";
              </script>';

            }
    }

    /**
     * Funcion para comprobar si el usuario que se va a registrar ya existe.
     */
         function comprobarUsuario()
    {
        $pStatementComprobarUsuario = $dbh->prepare("SELECT * FROM usuario WHERE nombre = :nombre LIMIT 1;");

        $success = $pStatementComprobarUsuario->execute([
            ":nombre" => $this->nombre
        ]);
        $rowCount = $pStatementComprobarUsuario->rowCount();

        if ($success && $rowCount == 1) {
          echo'<script type="text/javascript">
          alert("El nombre de usuario ya existe");
          </script>';
        }
    }
          
        }
  

?>