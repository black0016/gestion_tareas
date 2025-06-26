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

    public function login()
    {
        $userName = filter_input(INPUT_POST, 'userNameLogin', FILTER_SANITIZE_SPECIAL_CHARS);
        $userPassword = filter_input(INPUT_POST, 'userPasswordLogin', FILTER_SANITIZE_SPECIAL_CHARS);

        // Consultar si hay un usuario con el nombre de usuario proporcionado
        $loginModel = new LoginModel();
        $userBd = $loginModel->obtenerUsuarioByUserName($userName);

        // Verificar si el usuario existe 
        if ($userBd) {
            // Validar que el usuario este Activo
            if ($userBd['estadoUsuario'] !== 'Activo') {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'El usuario no está activo. Por favor, contacte al administrador.'
                ]);
                return;
            }
            // Verificar la contraseña
            if (password_verify($userPassword, $userBd['passwordUsuario'])) {

                // Actualizar el último login del usuario
                $loginModel->actualizarUltimoLogin($userBd['idUsuario']);
                // Eliminar la contraseña del array para no exponerla
                unset($userBd['passwordUsuario']);
                // Iniciar sesión y guardar los datos del usuario en la sesión
                $_SESSION['user'] = $userBd;

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Inicio de sesión exitoso.',
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Contraseña incorrecta. Por favor, inténtelo de nuevo.'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'El usuario ingresado no se encuentra registrado en el sistema. Por favor, verifique el nombre de usuario o regístrese.'
            ]);
        }
    }
}
