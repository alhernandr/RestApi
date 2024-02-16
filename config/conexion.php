<?php
class Conectar
{
    protected $dbh;

    // Conecta con la base de datos
    protected function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=andercode_webservice", "root", "");
            return $conectar;
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/";
        }
    }

    // Define la manipulacion de carácteres
    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
