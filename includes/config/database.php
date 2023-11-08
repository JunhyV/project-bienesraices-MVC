<?php
//Llamada a la base de datos
function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if (!$db) {
        echo 'Error al de conexion';
        exit;
    }

    return $db;
}