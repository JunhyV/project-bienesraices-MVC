<?php

namespace MVC;

class Router{
    public $rutasGET = [];
    public $rutasPOST = [];

    //Conseguir las rutas
    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    //Comprobar ruta actual
    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? null;


        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        //Proteger Rutas
        $rutasProtegidas = ['/admin', '/mostrar', '/propiedades/crear', '/propiedades/actualizar', '/vendedores/crear', '/vendedores/actualizar'];
        
        //Comprobar metodo
        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if (in_array($urlActual, $rutasProtegidas) && !$auth) {
            header('Location: /');
        }

        //Mandar llamar la funcion establecida para el URL
        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo 'Pagina no encontrada';
        }
    }

    //Mostrar vistas
    public function render($view, $datos = []){

        foreach($datos as $key => $value){
            $$key = $value;
        }
        //Guardar contenido en variable
        ob_start();
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();

        //Desplegar layout
        include __DIR__ . "/views/layout.php";
    }
}