<?php

namespace Controllers;

use MVC\Router;
use Model\Auth;

class AuthController{
    public static function login(Router $router){
        $usuario = new Auth;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Auth;
            $usuario->validar($_POST);
            $errores = $usuario->getErrores();
        }

        $router->render('auth/login', [
            'errores' => $errores ?? null,
            'usuario' => $usuario, 
        ]);
    }
    public static function logout(){
        Auth::logout();
    }
}