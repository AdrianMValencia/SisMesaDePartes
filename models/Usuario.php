<?php
class Usuario extends Conectar
{

    public function login()
    {
        $conectar = parent::Conexion();
        parent::set_names();

        if (isset($_POST["enviar"])) {
            $correo = $_POST["correo"];
            $password = $_POST["password"];

            if (empty($correo) and empty($password)) {
                header("Location:" . Conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM usuarios WHERE correo=? AND clave=? AND estado=1";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $correo);
                $sql->bindValue(2, $password);
                $sql->execute();
                $resultado = $sql->fetch();

                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["correo"] = $resultado["correo"];
                    header("Location: " . Conectar::ruta() . "views/Home/");
                    exit();
                } else {
                    header("Location: " . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }

    public function registrarUsuario($nombre, $apellido, $correo, $clave)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO usuarios VALUES (NULL,?,?,?,?,NULL,NULL,NULL,'1');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellido);
        $sql->bindValue(3, $correo);
        $sql->bindValue(4, $clave);
        $sql->execute();
    }

    public function getCorreoUsuario($correo)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM usuarios WHERE correo=? AND estado=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $correo);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
