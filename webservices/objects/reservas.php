<?php
class Reservas
{
    // ligar à base de dados
    private $conn;
    private $table_name = "reserva";
    
    // propriedades do objetoprodutos
    public $idReserva;
    public $checkin;
    public $checkout;
    public $nPessoas;
    public $nome;
    public $email;
    public $contacto;
    public $pais;
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
        $query = "INSERT INTO ". $this->table_name ." SET idReserva=:idReserva, checkin=:checkin, checkout=:checkout, nPessoas=:nPessoas, nome=:nome, email=:email, contacto=:contacto, pais=:pais, mensagem=:mensagem";
        
        // preparar a query
        $stmt = $this->conn->prepare($query);
        
        //iniciar valores
        $this->idReserva = htmlspecialchars(strip_tags($this->idReserva));
        $this->checkin = htmlspecialchars(strip_tags($this->checkin));
        $this->checkout = htmlspecialchars(strip_tags($this->checkout));
        $this->nPessoas = htmlspecialchars(strip_tags($this->nPessoas));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->contacto = htmlspecialchars(strip_tags($this->contacto));
        $this->pais = htmlspecialchars(strip_tags($this->pais));
        $this->mensagem = htmlspecialchars(strip_tags($this->mensagem));
        
        // atribuir valores
        $stmt->bindParam(":idReserva", $this->idReserva);
        $stmt->bindParam(":checkin", $this->checkin);
        $stmt->bindParam(":checkout", $this->checkout);
        $stmt->bindParam(":nPessoas", $this->nPessoas);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":contacto", $this->contacto);
        $stmt->bindParam(":pais", $this->pais);
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
        $query = "DELETE FROM ". $this->table_name." WHERE idReserva = :idReserva";
       
        // preparar a query para receber resultados
        $stmt = $this->conn->prepare($query);
        
        $this->idReserva = htmlspecialchars(strip_tags($this->delete));
        $stmt->bindParam(":idReserva", $this->idReserva);
       // echo $this->idReserva ."<br>";

        // executar query
        $stmt->execute();
        
        // devolver o resultado da query
        return $stmt;

    }
}

?>