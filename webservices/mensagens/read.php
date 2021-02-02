<?php
// definição de header
//header("Acess-Control-Allow-Origin: *");

//header("Content-Type: application/json;charset=UTF-8");

// incluir ficheiros
include_once '../webservices/config.php';
include_once '../webservices/objects/mensagens.php';

// iniciar a base de dados
$database = new Database();
$db = $database->getConnection();

// iniciar objeto
$rsv = new Mensagens($db);

// obter os valores passados no formulário
$data = parse_str(file_get_contents("php://input"));

// query products
$stmt = $rsv->read();
$num = $stmt->rowCount();

// verificar se existem produtos na BD
if($num > 0)
{
    // colocar os produtos num vector
    $products_arr = array();
    //$products_arr["records"] = array();
    
    // percorrer a lista de valores e colca-los no vetor
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        // extrair linha
        extract($row);
        $product_item = array(
            "id" => $id,
            "nome" => $nome,
            "email" => $email,
            "assunto" => $assunto,
            "mensagem" => $mensagem);
        
        array_push($products_arr, $product_item);
    }
    
    $json=json_encode($products_arr);
}
else
{
  //  echo json_encode(array("message" => "Sem produtos na BD"));
}

?>