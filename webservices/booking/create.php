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
$rsv = new Reservas($db);

// obter os valores passados no formulário
$data = parse_str(file_get_contents("php://input"));

// verifcar se os valores estao vazios
if(isset($checkin) && 
  isset($checkout) && 
  isset($nPessoas) &&
  isset($nome) &&
  isset($email) &&
  isset($contacto) &&
  isset($pais))
{
    $sql="SELECT checkin, checkout, nPessoas FROM reserva";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();

    $rows = [];

    foreach ($data as $row) {
        $dataCheckin = date_create_from_format('Y-m-d', $row["checkin"]);
        $dataCheckout = date_create_from_format('Y-m-d', $row["checkout"]);
        $dataCheckout->modify('-1 day');
    
        for($i = $dataCheckin; $i <= $dataCheckout; $i->modify('+1 day')){
            if (isset($rows[$i->format("Y-m-d")]))
                $rows[$i->format("Y-m-d")] += $row["nPessoas"];
            else
                $rows[$i->format("Y-m-d")] = $row["nPessoas"];
        }
    }

    // atribuir os valores às propriedades da classse
    $rsv->checkin = $checkin;
    $rsv->checkout = $checkout;
    $rsv->nPessoas = $nPessoas;
    $rsv->nome = $nome;
    $rsv->email = $email;
    $rsv->contacto = $contacto;
    $rsv->pais = $pais;
    $rsv->mensagem = $mensagem;

    $checkinDate = date_create_from_format('Y-m-d', $checkin);
    $checkoutDate = date_create_from_format('Y-m-d', $checkout);
    
    $existeVagas = true;
    
    for($i = $checkinDate; $i <= $checkoutDate; $i->modify('+1 day')){              
        if (isset($rows[$i->format("Y-m-d")])) {
            if ($rows[$i->format("Y-m-d")] + $nPessoas > 16) {
                echo '{';
                    header('Location: ../../booking.php');
                    echo '"message": "Data inserida já não tem vagas."';
                echo '}';
                $existeVagas = false;
                break;
            }  
        }          
    }

    if ($existeVagas) {
        // criar o produto
        if($rsv->create())
        {
            header('Location: ../../booking.php');
            echo '{';
                echo '"message": "Formulario enviado com sucesso."';
            echo '}';
        }
        else
        {
            header('Location: ../../booking.php');
            echo '{';
                echo '"message": "Ocorreu um erro a enviar o formulário."';
            echo '}';
        }
    }
}
else
{

    echo '{';
        echo '"message": "Ops.."';
    echo '}';
}


?>