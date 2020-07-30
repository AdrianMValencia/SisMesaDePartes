<?php
class Partes extends Conectar
{
    public function insertPartes($id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO partes VALUES(null,?,null,null,now(),null,null,2);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $sql1 = "SELECT last_insert_id() AS 'id';";
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();
        return $resultado = $sql1->fetchAll(pdo::FETCH_ASSOC);
    }

    public function updatePartes($id, $asunto, $descripcion)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE partes SET asunto=?, descripcion=?, estado=1 WHERE id=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $asunto);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $id);
        $sql->execute();
    }
}
