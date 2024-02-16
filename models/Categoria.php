<?php
class Categoria extends Conectar
{
    // Recoge los datos de la tabla tm_categoria
    public function get_categoria()
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_categoria WHERE est = 1;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC); // Sirve para que no se dupliquen elemento con key autoincrement
    }

    // Recoge los datos de un campo específico de la tabla tm_categoria
    public function get_categoria_x_id($cat_id)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_categoria WHERE est = 1 AND cat_id = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Inserta datos en la tabla tm_categoria
    public function insert_categoria($cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "INSERT INTO `tm_categoria`(cat_id, cat_nom, cat_obs, est) VALUES (NULL,?,?,'1');";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualiza datos en la tabla tm_categoria
    public function update_categoria($cat_id, $cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "UPDATE `tm_categoria` SET cat_nom = ?, cat_obs = ? WHERE cat_id = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->bindValue(3, $cat_id);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Borra datos en la tabla tm_categoria
    public function _categorideletea($cat_id)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $sql = "UPDATE `tm_categoria` SET est = 0 WHERE cat_id = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
