<?php

namespace Model;

use Model\ActiveRecord;

class Propiedad extends ActiveRecord
{
    //Datos estaticos
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    //Datos de la propiedad
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __constructor($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = $args['creado'] ?? '';
        $this->vendedores_id = $args['vendedores_Id'] ?? 0;
    }

    public function validar($datos, $imagen = '', $crear = true)
    {
        //Almacenar datos en POST
        $this->titulo = $datos['titulo'];
        $this->precio = $datos['precio'];
        $this->descripcion = $datos['descripcion'];
        $this->habitaciones = $datos['habitaciones'];
        $this->wc = $datos['wc'];
        $this->estacionamiento = $datos['estacionamiento'];
        $this->vendedores_id = $datos['vendedor'];

        //Crear carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        //Validar campos llenos
        if (!$datos['titulo']) {
            self::$errores[] = 'El título de la venta debe ser obligatorio.';
        }
        if (!$datos['precio']) {
            self::$errores[] = 'Establece el precio de la venta.';
        }
        if (!$datos['descripcion'] || strlen($datos['descripcion']) < 50) {
            self::$errores[] = 'Escribe una descripción con mas de 50 caracteres.';
        }
        if (strlen($datos['descripcion']) > 200) {
            self::$errores[] = 'Puedes escribir un maximo de 200 caracteres en la descripcion';
        }
        if (!$datos['habitaciones']) {
            self::$errores[] = 'Establece el número de habitaciones.';
        }
        if (!$datos['wc']) {
            self::$errores[] = 'Establece el número de baños.';
        }
        if (!$datos['estacionamiento']) {
            self::$errores[] = 'Establece el número de estacionamientos.';
        }
        if (!$datos['vendedor']) {
            self::$errores[] = 'Selecciona un vendedor.';
            $this->vendedores_id = '0';
        }
        if ($crear) {
            if (!$imagen) {
                self::$errores[] = 'Carga una imagen de la propiedad.';
                return;
            }
        }
    }
}
