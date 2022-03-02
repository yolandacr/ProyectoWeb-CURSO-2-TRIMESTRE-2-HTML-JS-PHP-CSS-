<?php

//codigo para el boton de cerrar sesion
session_start();
session_destroy();
header("Location: index.php");
?>