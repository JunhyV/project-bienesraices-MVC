<?php

use Controllers\AuthController;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginaController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';

/* Configurar el router */
$router = new Router();

//Admin
$router->get("/admin", [PropiedadController::class, 'index']);
$router->get('/mostrar', [PropiedadController::class, 'mostrar']);
$router->post('/mostrar', [PropiedadController::class, 'eliminar']);

$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);


//Paginas
$router->get('/anuncios', [PaginaController::class, 'anuncios']);
$router->get('/anuncio', [PaginaController::class, 'anuncio']);
$router->get('/nosotros', [PaginaController::class, 'nosotros']);
$router->get('/blog', [PaginaController::class, 'blog']);
$router->get('/entrada-blog', [PaginaController::class, 'entrada_blog']);
$router->get('/contacto', [PaginaController::class, 'contacto']);
$router->post('/contacto', [PaginaController::class, 'contacto']);
$router->get('/', [PaginaController::class, 'principal']);

//Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->comprobarRutas();