<?php

class TareaController
{
    public function index()
    {
        View::render('tareas');
    }

    public function crearTarea()
    {
        $tarea = filter_input(INPUT_POST, 'tareaTitulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $descripcion = filter_input(INPUT_POST, 'tareaDescripcion', FILTER_SANITIZE_SPECIAL_CHARS);
        $fechaVencimiento = filter_input(INPUT_POST, 'tareaFechaVencimiento', FILTER_SANITIZE_SPECIAL_CHARS);
        $prioridad = filter_input(INPUT_POST, 'tareaPrioridad', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($tarea) || strlen($tarea) < 3 || strlen($tarea) > 100) {
            var_dump($tarea);
            echo json_encode(['status' => 'error', 'message' => 'El nombre de la tarea es inválido.']);
            return;
        }
        if (empty($descripcion) || strlen($descripcion) < 5 || strlen($descripcion) > 500) {
            echo json_encode(['status' => 'error', 'message' => 'La descripción de la tarea es inválida.']);
            return;
        }
        if (empty($fechaVencimiento) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaVencimiento)) {
            echo json_encode(['status' => 'error', 'message' => 'La fecha de vencimiento es inválida.']);
            return;
        }
        if (empty($prioridad) || !in_array($prioridad, ['baja', 'media', 'alta'])) {
            echo json_encode(['status' => 'error', 'message' => 'La prioridad es inválida.']);
            return;
        }

        $data = [
            'tarea' => $tarea,
            'descripcion' => $descripcion,
            'fechaVencimiento' => $fechaVencimiento,
            'prioridad' => $prioridad,
            'usuarioId' => $_SESSION['user']['idUsuario'],
            'tareaCompletada' => 0
        ];

        $tareaModel = new TareaModel();
        $result = $tareaModel->crearTarea($data);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Tarea creada exitosamente.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear la tarea.']);
        }
    }

    public function listarTareas()
    {
        $idUsuario = $_SESSION['user']['idUsuario'];
        $tareaModel = new TareaModel();
        $tareas = $tareaModel->listarTareasByIdUsuario($idUsuario);

        $data = [];
        foreach ($tareas as $tarea) {
            switch (strtolower($tarea['prioridadTarea'])) {
                case 'alta':
                    $label = '<span class="label label-danger">Alta</span>';
                    break;
                case 'media':
                    $label = '<span class="label label-warning">Media</span>';
                    break;
                case 'baja':
                default:
                    $label = '<span class="label label-success">Baja</span>';
                    break;
            }

            $data[] = [
                'idTarea' => $tarea['idTarea'],
                'tituloTarea' => $tarea['tituloTarea'],
                'descripcionTarea' => $tarea['descripcionTarea'],
                'fechaVencimientoTarea' => $tarea['fechaVencimientoTarea'],
                'prioridadTarea' => $label,
                'tareaCompleta' => $tarea['tareaCompleta'] ? 'Completada' : 'Pendiente',
                'created_at' => $tarea['created_at'],
                'updated_at' => $tarea['updated_at'],
                'acciones' =>
                '<button class="btn btn-success btn-sm" onclick="terminarTarea(' . $tarea['idTarea'] . ')">Terminar</button> ' .
                    '<button class="btn btn-primary btn-sm" onclick="editarTarea(' . $tarea['idTarea'] . ')">Editar</button> ' .
                    '<button class="btn btn-danger btn-sm" onclick="eliminarTarea(' . $tarea['idTarea'] . ')">Eliminar</button>'
            ];
        }
        echo json_encode(['data' => $data]);
    }
}
