<?php
namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController{
    public static function crear(Router $router){
        $vendedor = new Vendedor;
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crear propiedad 
            $vendedor = new Vendedor;
        
            //Validar datos
            $vendedor->validar($_POST, '');
        
            //Obtener errores
            $errores = $vendedor->getErrores();
        
            if (!$errores) {
                //Generar atributos
                $vendedor->generarAtributos();
                
                //Sanitizar datos
                $vendedor->sanitizarAtributos();
        
                //Guardar datos
                $vendedor->guardar($vendedor);
            }
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor, 
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarId('/admin');
        $vendedor = Vendedor::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validar datos
            $vendedor->validar($_POST, '', false);
        
            //Obtener errores
            $errores = $vendedor->getErrores();
        
            if (!$errores) {
                //Generar atributos
                $vendedor->generarAtributos();
                
                //Sanitizar datos
                $vendedor->sanitizarAtributos();
        
                //Guardar datos
                $vendedor->guardar($vendedor);
            }
        }

        $router->render('vendedores/actualizar', [
        'vendedor' => $vendedor
        ]);
    }
}