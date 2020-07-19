<?php
session_start();
class Conectar
{
    protected $dbh;
    protected function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=dbmesa", "root", "");
            return $conectar;
        } catch (Exception $e) {
            print "Error de conexión !!! " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    static public function ruta()
    {
        return "http://localhost/sisMesaDePartes/";
    }
}
