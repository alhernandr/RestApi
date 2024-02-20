<?php
/**
 * Clase Conectar
 * 
 * Esta clase proporciona métodos para conectar a una base de datos MySQL y manipular caracteres.
 */
class Conectar
{
    protected $dbh;

    /**
     * Establece la conexión con la base de datos.
     * 
     * @return PDO|false Retorna un objeto PDO si la conexión es exitosa, o false si ocurre un error.
     */
    protected function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=andercode_webservice", "root", "");
            return $conectar;
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/";
        }
    }

    /**
     * Define el juego de caracteres a utilizar en la conexión a la base de datos.
     * 
     * @return PDOStatement|false Retorna un objeto PDOStatement si la operación es exitosa, o false si ocurre un error.
     */
    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
