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
include_once '../objects/account.php';

$database = new Database();
$db = $database->getConnection();
$account = new Account($db);

// obter os valores passados no formulário
$data = parse_str(file_get_contents("php://input"));

// verifcar se os valores estao vazios
if(isset($username) &&
  isset($password) &&
  isset($password2))
{
    if ($password == $password2)
    {
        // atribuir os valores às propriedades da classse
        $account->username = $username;
        $account->password = $password;
      //  $administrador->administrador = $administrador;

        // criar o produto
        if($account->create_account())
        {
            header('Location: ../../booking.php');
            echo "Conta Criada.";
        }
        else
        {        
            header('Location: ../../booking.php');
            echo "Impossível criar conta.";
        }
    }
    else
    {
        header('Location: ../../booking.php');
        echo "Password não coincidem.";
    }
}
else
{
    echo "Ops..";
}


?>