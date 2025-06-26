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
}
