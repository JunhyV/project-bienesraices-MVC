<?php

namespace Model;

use Model\ActiveRecord;

class Vendedor extends ActiveRecord
{
    protected static $columnasDB = ['nombre', 'apellido', 'telefono'];
    protected static $tabla = 'vendedores';

    //Datos del vendedor
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __constructor($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar($datos)
    {
        //Almacenar datos en POST
        $this->nombre = $datos['nombre'];
        $this->apellido = $datos['apellido'];
        $this->telefono = $datos['telefono'];

        //Validar campos llenos
        if (!$datos['nombre']) {
            self::$errores[] = 'El nombre es obligatorio.';
        }
        if (!$datos['apellido']) {
            self::$errores[] = 'El apellido es obligatorio.';
        }
        if (!$datos['telefono'] || strlen($datos['telefono']) !== 10) {
            self::$errores[] = 'Escribe un telefono valido';
        }
    }
}
