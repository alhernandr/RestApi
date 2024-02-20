<?php
/**
 * Este script PHP maneja las solicitudes relacionadas con los productos en un servicio web RESTful.
 *
 * PHP version 7.4
 *
 * @category Script
 * @package  Servicio_Web_Productos
 */

header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/Producto.php';

$producto = new Producto();

// Manejo de las diferentes operaciones según el parámetro 'op' proporcionado en la URL
switch ($_GET["op"]) {
    // Lee todos los datos de la tabla tm_producto y los convierte en JSON
    case 'GetAll':
        $datos = $producto->get_producto();
        echo json_encode($datos);
        break;

    // Inserta productos a cierta categoría
    case 'Insert':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prod_nom = $_POST['prod_nom'];
            $cat_id = $_POST['cat_id'];

            $datos = $producto->insert_producto($prod_nom, $cat_id);
            echo json_encode(array("success" => true, "message" => "Producto insertado correctamente"));
        }
        break;
}

