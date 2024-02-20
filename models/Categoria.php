<?php
/**
 * Clase Categoria
 * 
 * Esta clase extiende de la clase Conectar y proporciona métodos para interactuar con la tabla tm_categoria en la base de datos.
 */
class Categoria extends Conectar
{
    /**
     * Recoge los datos de la tabla tm_categoria.
     * 
     * @return array Retorna un array asociativo con los datos de las categorías.
     */
    public function get_categoria()
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_categoria WHERE est = 1;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Recoge los datos de un campo específico de la tabla tm_categoria.
     * 
     * @param int $cat_id El ID de la categoría.
     * @return array Retorna un array asociativo con los datos de la categoría correspondiente al ID proporcionado.
     */
    public function get_categoria_x_id($cat_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_categoria WHERE est = 1 AND cat_id = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserta datos en la tabla tm_categoria.
     * 
     * @param string $cat_nom El nombre de la categoría a insertar.
     * @param string $cat_obs La observación de la categoría a insertar.
     * @return array Retorna un array asociativo con el resultado de la inserción.
     */
    public function insert_categoria($cat_nom, $cat_obs)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "INSERT INTO `tm_categoria`(cat_id, cat_nom, cat_obs, est) VALUES (NULL,?,?,1);";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Actualiza datos en la tabla tm_categoria.
     * 
     * @param int $cat_id El ID de la categoría a actualizar.
     * @param string $cat_nom El nuevo nombre de la categoría.
     * @param string $cat_obs La nueva observación de la categoría.
     * @return array Retorna un array asociativo con el resultado de la actualización.
     */
    public function update_categoria($cat_id, $cat_nom, $cat_obs)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "UPDATE `tm_categoria` SET cat_nom = ?, cat_obs = ? WHERE cat_id = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->bindValue(3, $cat_id);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Borra datos en la tabla tm_categoria.
     * 
     * @param int $cat_id El ID de la categoría a borrar.
     * @return array Retorna un array asociativo con el resultado de la operación de borrado.
     */
    public function delete_categoria($cat_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "UPDATE `tm_categoria` SET est = 0 WHERE cat_id = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
