<?php
require_once("../config/conexion.php");
require_once("../models/Partes.php");
$partes = new Partes();

switch ($_GET["op"]) {
    case "insert":
        $datos = $partes->insertPartes($_POST["id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["id"] = $row["id"];
            }
            echo json_encode($output);
        }
        break;
    case "update":
        $partes->updatePartes($_POST["id"], $_POST["asunto"], $_POST["descripcion"]);
        break;
}
