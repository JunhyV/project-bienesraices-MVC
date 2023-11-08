<?php

//URL's
define('TEMPLATES__URL', __DIR__ . '/templates');
define('FUNCIONES__URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../public/imagenes/');

function incluirTemplates(string $nombre, $inicio = false){ 
    include TEMPLATES__URL . "/$nombre.php";
};

function autenticado(){
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debugear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

function esc($html){
    $esc = htmlspecialchars($html);
    return $esc;
}
function validarId(string $url){
    //Revisar metodo
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $_GET['id'];
    } else {
        $id = $_POST['id'];
    }

    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: $url");
    }

    return $id;
}