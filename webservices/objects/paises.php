<?php
class Paises
{
    // ligar à base de dados
    private $conn;
    private $table_name = "paises";
    
    // propriedades do objetoprodutos
    public $id;
    public $shortName;
    public $pais;
    
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
}

?>