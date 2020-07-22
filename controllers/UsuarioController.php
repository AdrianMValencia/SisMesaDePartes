<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
$usuario = new Usuario();

switch ($_GET["op"]) {
    case "guardar":
        $datos = $usuario->getCorreoUsuario($_POST["correo"]);
        if ($_POST["clave1"] == $_POST["clave2"]) {
            if (is_array($datos) == true and count($datos) == 0) {
                $usuario->registrarUsuario($_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["clave1"]);
            } else {
                echo "correo";
            }
        } else {
            echo "pass";
        }
        break;
}
