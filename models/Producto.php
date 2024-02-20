<?php
/**
 * Clase Producto
 * 
 * Esta clase extiende de la clase Conectar y proporciona métodos para interactuar con la tabla tm_productos en la base de datos.
 */
class Producto extends Conectar
{
    /**
     * Recoge los datos de la tabla tm_productos.
     * 
     * @return array Retorna un array asociativo con los datos de los productos.
     */
    public function get_producto()
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_productos";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserta datos en la tabla tm_productos.
     * 
     * @param string $prod_nom El nombre del producto a insertar.
     * @param int $cat_id El ID de la categoría a la que pertenece el producto.
     * @return array Retorna un array asociativo con el resultado de la inserción.
     */
    public function insert_producto($prod_nom, $cat_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "INSERT INTO `tm_productos` (prod_id, prod_nom, cat_id) VALUES (NULL,?,?)";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nom);
        $sql->bindValue(2, $cat_id);

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
