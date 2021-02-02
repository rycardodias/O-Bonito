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
include_once '../objects/reservas.php';

$database = new Database();
$db = $database->getConnection();
$reserva = new Reservas($db);

// obter os valores passados no formulário
$data = parse_str(file_get_contents("php://input"));

    $reserva->delete = $delete;
    
    if($stmt = $reserva->delete())
    {
        header('Location: ../../administracao/reservas.php');

        echo "Eliminado com sucesso";
        return true;

    }
    else
    {
        header('Location: ../../administracao/reservas.php');

        echo "<br>Ocorreu um erro inesperado.<br>";
        return false;
    }


?>
