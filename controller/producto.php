<?php
header('Content-Type: application/json');

require_once '../config/conexion.php';
require_once '../models/Producto.php';

$producto = new Producto();

switch ($_GET["op"]) {
    // Lee los datos de la tabla tm_producto y los convierte en json
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
            echo json_encode(array("success" => true, "message" => "Product inserted correctly"));
        }
        break;
    
}
