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
}
