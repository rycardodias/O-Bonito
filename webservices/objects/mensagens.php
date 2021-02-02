<?php
class Mensagens
{
    // ligar à base de dados
    private $conn;
    private $table_name = "mensagens";
    
    // propriedades do objetoprodutos
    public $id;
    public $nome;
    public $email;
    public $assunto;
    public $mensagem;
    
    // contrutores de ligacao à base de dados
    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    function read()
    {
        // query de leitura dos valores
        $query = "SELECT * FROM ". $this->table_name."";
       
        // preparar a query para receber resultados
        $stmt = $this->conn->prepare($query);
        
        // executar query
        $stmt->execute();
        
        // devolver o resultado da query
        return $stmt;
    }
    
    function create()
    {
        // query para inserir informacao
        $query = "INSERT INTO ". $this->table_name ." SET nome=:nome, email=:email, assunto=:assunto, mensagem=:mensagem";
        
        // preparar a query
        $stmt = $this->conn->prepare($query);
        
        //iniciar valores
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->assunto = htmlspecialchars(strip_tags($this->assunto));
        $this->mensagem = htmlspecialchars(strip_tags($this->mensagem));
        
        // atribuir valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":assunto", $this->assunto);
        $stmt->bindParam(":mensagem", $this->mensagem);
        
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
    
        function delete()
    {
        // query de leitura dos valores
        $query = "DELETE FROM ". $this->table_name." WHERE id = :id";
       
        // preparar a query para receber resultados
        $stmt = $this->conn->prepare($query);
        
        $this->id = htmlspecialchars(strip_tags($this->delete));
        $stmt->bindParam(":id", $this->id);
        echo $this->id ."<br>";

        // executar query
        $stmt->execute();
        
        // devolver o resultado da query
        return $stmt;
    }
    
    function reply()
    {
        // query de leitura dos valores
        $query = "SELECT * FROM ". $this->table_name."";
       
        // preparar a query para receber resultados
        $stmt = $this->conn->prepare($query);
        
        // executar query
        $stmt->execute();
        
        // devolver o resultado da query
        return $stmt;
    }
}

?>