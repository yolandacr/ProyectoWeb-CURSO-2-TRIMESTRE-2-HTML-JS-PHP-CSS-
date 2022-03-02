<!-- CODIGO PARA CONECTAR A LA BASE DE DATOS -->

<?php
    $server = 'localhost';
    $user = 'root';    //USUARIO DE LA BBDD. POR DEFECTO ES ROOT
    $password = '';   //CLAVE EN CASO DE TENERLA
    $dbname = 'usuarios'; //NOMBRE BBDD

    try {
        $dsn = "mysql:host=$server;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>