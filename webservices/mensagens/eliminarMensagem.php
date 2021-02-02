<?php
// headers
header("Access-Control-Allow-Origin. *");
//header("Content-Type:application/json;charshet=UTF-8");
header("Access-Control-Allow-Method:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Header:Content-Type, Acces-Control-Allow-Headers, Authorization, X-Requested-With");

// ligar à bd
include_once '../config.php';

// iniciar classe products
include_once '../objects/mensagens.php';

$database = new Database();
$db = $database->getConnection();
$mensagens = new Mensagens($db);

// obter os valores passados no formulário
$data = parse_str(file_get_contents("php://input"));

    $mensagens->delete = $delete;
    
    if($stmt = $mensagens->delete())
    {
        header('Location: ../../administracao/mensagens.php');
        echo "Eliminado com sucesso";
        return true;
    }
    else
    {
        echo "<br>Ocorreu um erro inesperado.<br>";
        return false;
    }


?>