<?php

class account
{
    // ligar à base de dados
    private $conn;
    
    // propriedades do objeto
    public $idUser;
    public $username;
    public $password;
    public $administrador;

    
    // contrutores de ligação à BD
    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    function create_account()
    {
        // query para inserir informacao
        $query = "INSERT INTO users SET username = :username, password = :password";
        
        // preparar a query
        $stmt =$this->conn->prepare($query);
        
        // iniciar valores
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // atribuir os valores
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);

        // executar query
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";
        }
    }
    
    function loginAdministrator()
    {
        // query de validação de conta
        $query = "SELECT * FROM users
                    WHERE username = :username
                        AND password = :password
                        AND administrador = 1";
        
        // preparar a query
        $stmt = $this->conn->prepare($query);
        
        // iniciar valores
        $this->idUser = htmlspecialchars(strip_tags($this->idUser));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // atribuir valores
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);

        // executar query
        $stmt->execute();
        
        // devolver o resultado da query
        return $stmt;
    }

    function loginUser()
    {
        // query de validação de conta
        $query = "SELECT * FROM users
                    WHERE username = :username
                        AND password = :password";
        
        // preparar a query
        $stmt = $this->conn->prepare($query);
        
        // iniciar valores
        $this->idUser = htmlspecialchars(strip_tags($this->idUser));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // atribuir valores
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);

        // executar query
        $stmt->execute();
        
        // devolver o resultado da query
        return $stmt;
    }
    
}

?>