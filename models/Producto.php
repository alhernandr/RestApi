<?php
class Producto extends Conectar
{
    // Recoge los datos de la tabla tm_productos
    public function get_producto()
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_productos";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC); // Sirve para que no se dupliquen elemento con key autoincrement
    }

    // Inserta datos en la tabla tm_productos
    public function insert_producto($prod_nom, $cat_id)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "INSERT INTO `tm_productos` (prod_id, prod_nom, cat_id) VALUES (NULL,?,?)";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nom);
        $sql->bindValue(2, $cat_id);

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC); // Sirve para que no se dupliquen elemento con key autoincrement
    }
}
