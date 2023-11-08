<?php 
//Cerrar sesion
session_start();
$_SESSION = [];
header('Location: /');