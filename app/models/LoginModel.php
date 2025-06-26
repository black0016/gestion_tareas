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

    public function obtenerUsuarioByUserName($userName)
    {
        $db = new Database();
        $sql = "SELECT idUsuario, 
                    idTipoUsuario, 
                    userName, 
                    emailUsuario, 
                    passwordUsuario, 
                    estadoUsuario, 
                    ultimoLoginUsuario, 
                    created_at 
                FROM usuario 
                WHERE userName = ?";
        $db->setFetchWithAssoc();
        $result = $db->getRow($sql, [$userName]);
        $db->disconnect();
        return $result;
    }

    public function actualizarUltimoLogin($idUsuario)
    {
        $db = new Database();
        $sql = "UPDATE usuario 
                SET ultimoLoginUsuario = NOW() 
                WHERE idUsuario = ?";
        $result = $db->updateRow($sql, [$idUsuario]);
        $db->disconnect();
        return $result;
    }
}
