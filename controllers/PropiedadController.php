<?php

namespace Controllers;
use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {
        $resultado = null;

        $router->render('admin', [
            'resultado' => $resultado,
        ]);
    }
    public static function mostrar(Router $router)
    {
        //Llamadas a DB
        $router->render('mostrar', [
            'propiedades' => Propiedad::all(),
            'vendedores' => Vendedor::all(),
        ]);
    }
    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crear propiedad 
            $propiedad = new Propiedad;

            //Validar datos
            $propiedad->validar($_POST, $_FILES['imagen']["tmp_name"]);

            //Obtener errores
            $errores = $propiedad->getErrores();


            if (!$errores) {
                //Generar atributos
                $propiedad->generarAtributos();

                //Sanitizar datos
                $propiedad->sanitizarAtributos();

                //Resize a la imagen
                $resizeImagen = Image::make($_FILES['imagen']["tmp_name"]);
                $resizeImagen->fit(800, 600);
                $propiedad->guardarImagen($propiedad, $resizeImagen);

                //Guardar datos
                $propiedad->guardar($propiedad);
            }
        }

        $router->render('propiedades/crear', [
            'vendedores' => $vendedores,
            'errores' => $errores,
            'propiedad' => $propiedad,

        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = validarId('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validar datos
            $propiedad->validar($_POST, '', false);

            //Obtener errores
            $errores = $propiedad->getErrores();
            if (!$errores) {
                //Revisar si hay imagen
                if ($_FILES['imagen']["tmp_name"]) {
                    $resizeImagen = Image::make($_FILES['imagen']["tmp_name"]);
                    $resizeImagen->fit(800, 600);
                    $propiedad->guardarImagen($propiedad, $resizeImagen);
                }

                //Generar atributos
                $propiedad->generarAtributos();

                //Sanitizar datos
                $propiedad->sanitizarAtributos();

                //Guardar datos
                $propiedad->guardar($propiedad);
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function eliminar(Router $router){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            //Pasa la validacion
            if ($id) {
                $tipo = $_POST['tipo'];
                switch ($tipo) {
                    case 'propiedades':
                        $propiedad = Propiedad::find($id);
                        $propiedad->eliminar($propiedad);
                        break;
                    case 'vendedores':
                        $vendedor = Vendedor::find($id);
                        $vendedor->eliminar($vendedor);
                        break;
                    default:
                        break;
                }
            }
        }
        
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        $router->render('mostrar', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores
        ]);
    }
}
