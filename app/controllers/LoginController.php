<?php

class LoginController
{
    public function index()
    {
        View::render('pages/login');
    }

    public function registrarUsuario()
    {
        $data = array(
            'userName' => filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS),
            'emailUsuario' => filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL),
            'passwordUsuario' => password_hash(filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_SPECIAL_CHARS), PASSWORD_DEFAULT),
            'estadoUsuario' => 'Activo',
            'idTipoUsuario' => 2
        );
        $loginModel = new LoginModel();
        $result = $loginModel->registrarUsuario($data);
        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Usuario registrado correctamente.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Error al registrar el usuario. Por favor, inténtelo de nuevo.'
            ]);
        }
    }
}
