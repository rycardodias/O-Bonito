<?php
// headers
header("Access-Control-Allow-Origin. *");
header("Content-Type:application/json;charshet=UTF-8");
header("Access-Control-Allow-Method:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Header:Content-Type, Acces-Control-Allow-Headers, Authorization, X-Requested-With");

// ligar à bd
include_once '../config.php';

// iniciar classe products
include_once '../objects/mensagens.php';

$database = new Database();
$db = $database->getConnection();
$msg = new Mensagens($db);

// obter os valores passados no formulário
$data = parse_str(file_get_contents("php://input"));

// verifcar se os valores estao vazios
if(isset($nome) &&
  isset($email) &&
  isset($assunto) &&
  isset($mensagem))
{
    // atribuir os valores às propriedades da classse
    $msg->nome = $nome;
    $msg->email = $email;
    $msg->assunto = $assunto;
    $msg->mensagem = $mensagem;
    
    // criar o produto
    if($msg->create())
    {
        echo '{';
            echo '"message": "Formulario enviado com sucesso."';
        echo '}';
            header('Location: ../../contact.php');
    }
    else
    {
        echo '{';
            echo '"message": "Ocorreu um erro a enviar o formulário."';
        echo '}';
            header('Location: ../../contact.php');

    }
}
else
{
    echo '{';
        echo '"message": "Ops.."';
    echo '}';
        header('Location: ../../contact.php');

}


?>