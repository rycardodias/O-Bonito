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
include_once '../objects/account.php';

$database = new Database();
$db = $database->getConnection();
$account = new Account($db);

// obter os valores passados no formulário
$data = parse_str(file_get_contents("php://input"));

// verifcar se os valores estao vazios
session_start();

if(isset($username) && isset($password)) {
    
    // atribuir os valores às propriedades da classse
    $account->username = $username;
    $account->password = $password;
    
    $stmt = $account->loginAdministrator();

    $num = $stmt->rowCount();
        

    if($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        echo "<br> Dados Corretos";
        $_SESSION['idUser'] = $idUser;
        $_SESSION['username'] = $username;
        header('Location: ../../administracao/mensagens.php');
    }
    else{
        echo "<br>O username ou password estão errados.<br>";
        header('Location: ../../administracao/login.php');

    }
} else {
    echo "Ops...";
}

?>

