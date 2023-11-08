<?php

namespace Model;

use Model\ActiveRecord;

class Auth extends ActiveRecord
{
    protected static $columnasDB = ['id', 'email', 'password'];
    protected static $tabla = 'usuarios';

    //Datos del usuario
    public $email;
    public $password;

    public function __constructor($args = [])
    {
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar($datos)
    {
        //Almacenar datos en POST
        $this->email = $datos['email'];
        $this->password = $datos['password'];


        //Validar correo y contraseña
        if (!$datos['email']) {
            self::$errores[] = 'El email es obligatorio.';
        }
        if ($this->email !== '') {
            $email = $this->email;
            $correoValido = $this->validarCorreo($email);
            if ($correoValido->email !== $email) {
                self::$errores[] = 'El email no esta registrado';
            } else {
                $password = $this->password;
                $verificarPassword = password_verify($password, $correoValido->password);

                if (!$verificarPassword) {
                    self::$errores[] = 'La contraseña es incorrecta';
                } else {
                    self::login($correoValido->email);
                }
            }
        }
    }

    public static function login($user)
    {
        session_start();
        $_SESSION = [];
        $_SESSION['usuario'] = $user;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
    public static function logout()
    {
        session_start();
        $_SESSION = [];

        header('Location: /');
    }

    public static function validarCorreo($email)
    {
        $query = "SELECT * FROM " . static::$tabla .  " WHERE email = '$email';";
        $resultado = self::$db->query($query)->fetch_assoc();
        $propiedad = self::crearObjeto($resultado);
        return $propiedad;
    }
}
