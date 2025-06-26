<?php
class Database {

    public $isConn;
    protected $datab;

    public function __construct
        (
            $username = 'siros', $password = '%S3rv1c3sS4s%', $host = '10.10.12.221', $dbname = 'siros', 
            $options = [PDO::MYSQL_ATTR_FOUND_ROWS => true]
        ) 
    {
        try {

            $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $username, $password, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->isConn = true;

        } catch (PDOException $e) {

            throw new Exception($e->getMessage());
            
        }
    }

    public function setFetchWithAssoc() {

        try {

            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());  

        }
    }

    public function setFetchWithNum() {

        try {

            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);

        } catch (PDOException $e) {

            throw new Exception($e->getMessage());

        }
    } 
    
    public function setFetchWithBoth() {

        try {
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);

        } catch (PDOException $e) {

            throw new Exception($e->getMessage());

        }

    }

    public function getRow($query, $params = []) {
        
        try {

            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
            
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());
            
        }

    }

    public function getSeveralRows($query, $params = []) {
        
        try {

            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());
            
        }
    }

    public function insertRow($query, $params = []) {

        try {

            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            $result = $stmt->rowCount();
            return $result;

        } catch (PDOException $e) {

            throw new Exception($e->getMessage());
            
        }

    }

    public function updateRow($query, $params = []) {

        $result = $this->insertRow($query, $params);
        return $result;

    }

    public function deleteRow($query, $params = []) {

        $result = $this->insertRow($query, $params);
        return $result;

    }

    public function getLastInsertId() {

        try {

            return $this->datab->lastInsertId();
            
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());
            
        }

    }

    public function beginTransaction() {

        try {

            $this->datab->beginTransaction();

        } catch (PDOException $e) {

            throw new Exception($e->getMessage());

        }
        
    }

    public function processTransaction() {

        try {

            $result = $this->datab->commit();
            return $result;

        } catch (PDOException $e) {

            $this->datab->rollBack();
            throw new Exception($e->getMessage());

        }

    }

    public function disconnect() {

        $this->datab = null;
        $this->isConn = false;

    }

}