<?php

namespace Model;

class ActiveRecord
{
    //Datos estaticos
    protected static $db;
    protected static $errores = [];
    protected static $tabla = '';
    protected static $columnasDB = [];

    public function validar($datos)
    {
        static::$errores = [];
    }

    public function getErrores()
    {
        return static::$errores;
    }

    public function generarAtributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) :
            $atributos[$columna] = $this->$columna;
        endforeach;
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->generarAtributos();
        $sanitizados = [];
        foreach ($atributos as $key => $value) :
            $sanitizados[$key] = static::$db->escape_string($value);
        endforeach;
        return $sanitizados;
    }

    public function guardarImagen($clase, $nuevaImagen)
    {
        //Eliminar la imagen previa
        $imagenPrevia = $clase->imagen;
        if ($imagenPrevia) {
            unlink(CARPETA_IMAGENES . $imagenPrevia);
        }

        //Generar nombre de imagen
        $clase->imagen = md5(uniqid(rand(), true)) . '.jpg';

        //Cargar nueva imagen
        $nuevaImagen->save(CARPETA_IMAGENES . $clase->imagen);
    }

    public function guardar($clase)
    {
        $sanitizados = $this->sanitizarAtributos();
        if ($clase->id) {
            $this->actualizar($sanitizados, $clase);
        } else {
            $this->crear($sanitizados, $clase);
        }
    }

    public function crear($datos, $clase)
    {
        //Agregar creado y nombre de imagen
        if (isset($datos['creado'])) {
            $datos['creado'] = date('Y-m-d');
        }
        if (isset($datos['imagen'])) {
            $datos['imagen'] = $clase->imagen;
        }

        //Separar elementos
        $string_keys = join(', ', array_keys($datos));
        $string_values = join("', '", array_values($datos));
        $query = "INSERT INTO " . static::$tabla . " ($string_keys) VALUES ('$string_values');";
        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location:/admin?resultado=1');
        }
    }

    //Mostrar de DB
    public static function all($limite = '')
    {
        $propiedades = [];
        $query = "SELECT * FROM " . static::$tabla . ' ' . $limite;
        $resultados = self::$db->query($query);
        while ($registro = $resultados->fetch_assoc()) {
            $propiedades[] = self::crearObjeto($registro);
        }
        return $propiedades;
    }

    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla .  " WHERE id = $id";
        $resultado = self::$db->query($query)->fetch_assoc();
        $propiedad = self::crearObjeto($resultado);
        return $propiedad;
    }

    protected static function crearObjeto($registro)
    {
        $obj = new static;
        foreach ($registro as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->$key = $value;
            }
        }
        return $obj;
    }

    //Actualizar en DB
    public function actualizar($datos, $clase)
    {
        $string = [];
        //Array con el string del SQL
        foreach ($datos as $key => $value) :
            $string[] = "$key = '$value'";
        endforeach;

        //Separar elementos
        $string_values = join(', ', array_values($string));
        $query = "UPDATE " . static::$tabla . " SET $string_values WHERE id = $clase->id LIMIT 1;";
        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location:/admin?resultado=2');
        }
    }
    //Eliminar en DB
    public static function eliminar($row)
    {
        //Eliminar imagen
        if ($row->imagen) {
            unlink(CARPETA_IMAGENES . $row->imagen);
        }

        //Eliminar datos
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . $row->id . " LIMIT 1;";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header("Location: /admin?resultado=3");
        }
    }


    //Set y get de la base de datos
    public static function setDB($database)
    {
        self::$db = $database;
    }
    public static function getDB()
    {
        return self::$db;
    }
}
