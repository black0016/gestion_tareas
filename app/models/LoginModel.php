<?php

class LoginModel
{
    public function registrarUsuario(array $data)
    {
        $db = new Database();
        $sql = "INSERT INTO usuario (idTipoUsuario, 
                    userName, 
                    emailUsuario, 
                    passwordUsuario, 
                    estadoUsuario) 
                VALUES (?, ?, ?, ?, ?)";
        $result = $db->insertRow($sql, [
            $data['idTipoUsuario'],
            $data['userName'],
            $data['emailUsuario'],
            $data['passwordUsuario'],
            $data['estadoUsuario']
        ]);
        $db->disconnect();
        return $result;
    }
}
