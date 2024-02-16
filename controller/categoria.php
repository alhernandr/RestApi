<?php
header('Content-Type: application/json');

require_once "../config/conexion.php";
require_once "../models/Categoria.php";

$categoria = new Categoria();

// Contiene los datos enviados, los pasa de JSON a un array asociativo
$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    // Lee los datos de la tabla tm_categorira y los convierte en json
    case 'GetAll':
        $datos = $categoria->get_categoria();
        echo json_encode($datos);
        break;

    // Lee los datos de un campo específico de la tabla tm_categoria y los convierte en json
    case 'GetId':
        $datos = $categoria->get_categoria_x_id($body['cat_id']);
        echo json_encode($datos);
        break;

    // Inserta datos en la tabla tm_categoria y los convierte en json
    case 'Insert':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cat_nom = $_POST['cat_nom'];
            $cat_obs = $_POST['cat_obs'];

            $datos = $categoria->insert_categoria($cat_nom, $cat_obs);
            echo json_encode(array("success" => true, "message" => "Category inserted correctly"));
        }
        break;

    // Actualiza datos en la tabla tm_categoria y devuelve en mensaje de aviso
    case 'Update':
        $datos = $categoria->update_categoria($body["cat_id"], $body["cat_nom"], $body["cat_obs"]);
        echo json_encode("Update Correct");
        break;

    // Borra datos en la tabla tm_categoria  y devielve un mensaje de aviso
    case 'Remove':
        $datos = $categoria->delete_categoria($body["cat_id"]);
        echo json_encode("Categoría borrada correctamente");
        break;
}
