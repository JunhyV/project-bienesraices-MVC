<?php

namespace Controllers;

use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use MVC\Router;

class PaginaController{
    public static function anuncios(Router $router){
        $propiedades = Propiedad::all();
        
        $router->render('paginas/anuncios', [
        'propiedades' => $propiedades,
        ]);
    }
    public static function anuncio(Router $router){
        $id = validarId('/');
        $propiedad = Propiedad::find($id);
        
        $router->render('paginas/elementos/anuncio', [
        'propiedad' => $propiedad,
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros', []);
    }
    public static function principal(Router $router){
        $propiedades = Propiedad::all('LIMIT 3');

        $router->render('paginas/principal', [
            'propiedades' => $propiedades,
        ]);
    }
    public static function blog(Router $router){
        $router->render('paginas/blog', []);
    }
    public static function entrada_blog(Router $router){
        $router->render('paginas/elementos/entrada-blog', []);
    }
    public static function contacto(Router $router){
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = $_POST['contacto'];

            //Crear instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = "sandbox.smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail->Username = "f1983100c6cb2b";
            $mail->Password = "d86365938cb5da";
            $mail->SMTPSecure = "tls";
            $mail->Port = "2525";

            //Configurar del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress("jonhy.kisi@gmail.com", "Jonathan Salazar");
            
            //Configurar contenido del email
            $mail->isHTML(true);
            $mail->Subject = "Tienes un nuevo mensaje";
            $mail->CharSet = 'UTF-8';

            if ($datos['contactar'] === 'telefono') {
                $contactar = "
                <p>Telefono: " . $datos['telefono'] ."</p>
                <p>Fecha de llamada: " . $datos['fecha'] ."</p>
                <p>Hora de llamada: " . $datos['hora'] ."</p>
                ";
            } else {
                $contactar = "
                <p>Email: " . $datos['email'] ."</p>
                ";
            }
            $contenido = "<html>
            <h1>Tienes un nuevo mensaje de: " . $datos['nombre'] . "</h1>
            <p>" . $datos['mensaje'] . "</p>
            <br/>
            <h2>Información de contacto</h2>
            <p>Interesado en: ". $datos['venta-compra'] ."</p>
            <p>Precio o presupuesto: $". $datos['precio'] ."</p>
            <p>Contactar vía: ". $datos['contactar'] ."</p>" . $contactar;
            "<p>Fecha de llamada: ". $datos['fecha'] ."</p>

            </html>";

            $mail->Body = $contenido;
            
            if ($mail->send()) {
                header('Location: /contacto?id=1');
            } else {
                header('Location: /contacto?id=2');
            }

        }

        $router->render('paginas/contacto', [
            'id' => $id
        ]);
    }
    public static function login(Router $router){
        $router->render('paginas/login', []);
    }
    public static function logout(Router $router){
        $router->render('paginas/logout', []);
    }
}