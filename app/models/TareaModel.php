<?php

class TareaModel
{
    public function crearTarea(array $data)
    {
        $db = new Database();
        $sql = "INSERT INTO tarea (
                    idUsuario, 
                    tituloTarea, 
                    descripcionTarea, 
                    fechaVencimientoTarea, 
                    prioridadTarea, 
                    tareaCompleta
                ) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $db->insertRow($sql, [
            $data['usuarioId'],
            $data['tarea'],
            $data['descripcion'],
            $data['fechaVencimiento'],
            $data['prioridad'],
            $data['tareaCompletada']
        ]);
        $db->disconnect();
        return $result;
    }

    public function listarTareasByIdUsuario($idUsuario)
    {
        $db = new Database();
        $sql = "SELECT t.idTarea, 
                    t.idUsuario, 
                    u.userName, 
                    t.tituloTarea, 
                    t.descripcionTarea, 
                    t.fechaVencimientoTarea, 
                    t.prioridadTarea, 
                    t.tareaCompleta, 
                    t.created_at, 
                    t.updated_at
                FROM tarea t
                INNER JOIN usuario u ON u.idUsuario = t.idUsuario
                WHERE t.idUsuario = ?
                ORDER BY t.created_at DESC";
        $db->setFetchWithAssoc();
        $result = $db->getSeveralRows($sql, [$idUsuario]);
        $db->disconnect();
        return $result;
    }

    public function terminarTarea($idTarea)
    {
        $db = new Database();
        $sql = "UPDATE tarea 
                SET tareaCompleta = ?, 
                    updated_at = ?
                WHERE idTarea = ?";
        $result = $db->updateRow($sql, [
            1, // Tarea completada
            date('Y-m-d H:i:s'), // Fecha de actualización
            $idTarea // ID de la tarea a actualizar
        ]);
        $db->disconnect();
        return $result;
    }

    public function consultarTarea($idTarea)
    {
        $db = new Database();
        $sql = "SELECT t.idTarea, 
                    t.tituloTarea, 
                    t.descripcionTarea, 
                    t.fechaVencimientoTarea, 
                    t.prioridadTarea, 
                    t.tareaCompleta, 
                    t.created_at, 
                    t.updated_at
                FROM tarea t
                WHERE t.idTarea = ?";
        $db->setFetchWithAssoc();
        $result = $db->getRow($sql, [$idTarea]);
        $db->disconnect();
        return $result;
    }

    public function editarTarea(array $data)
    {
        $db = new Database();
        $sql = "UPDATE tarea 
                SET tituloTarea = ?, 
                    descripcionTarea = ?, 
                    fechaVencimientoTarea = ?, 
                    prioridadTarea = ?, 
                    updated_at = ?
                WHERE idTarea = ?";
        $result = $db->updateRow($sql, [
            $data['tarea'],
            $data['descripcion'],
            $data['fechaVencimiento'],
            $data['prioridad'],
            date('Y-m-d H:i:s'),
            $data['idTarea']
        ]);
        $db->disconnect();
        return $result;
    }

    public function eliminarTarea($idTarea)
    {
        $db = new Database();
        $sql = "DELETE FROM tarea WHERE idTarea = ?";
        $result = $db->deleteRow($sql, [$idTarea]);
        $db->disconnect();
        return $result;
    }
}
