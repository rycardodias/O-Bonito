<?php
include ("webservices/config.php");

$sql="SELECT checkin, checkout, nPessoas FROM reserva";
$result = $conn->query($sql);
    
$rows = [];
    
while ($row=$result->fetch_assoc()) {
    //$rows[] = $row;
    $dataCheckin = date_create_from_format('Y-m-d', $row["checkin"]);
    $dataCheckout = date_create_from_format('Y-m-d', $row["checkout"]);
    $dataCheckout->modify('-1 day');
    
    for($i = $dataCheckin; $i <= $dataCheckout; $i->modify('+1 day')){
        //echo $i->format("Y-m-d") . "<br>";
        
        if (isset($rows[$i->format("Y-m-d")]))
            $rows[$i->format("Y-m-d")] += $row["nPessoas"];
        else
            $rows[$i->format("Y-m-d")] = $row["nPessoas"];
    }
}
    
if(isset($_POST["efetuarMarcacao"])){
    $checkin=$_POST["checkin"];
    $checkout=$_POST["checkout"];
    $nPessoas=$_POST["nPessoas"];
    
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $contacto=$_POST["contacto"];
    $pais=$_POST["pais"];
    $mensagem=$_POST["mensagem"];
    
    $checkinDate = date_create_from_format('Y-m-d', $checkin);
    $checkoutDate = date_create_from_format('Y-m-d', $checkout);
    
    $existeVagas = true;
    
    for($i = $checkinDate; $i <= $checkoutDate; $i->modify('+1 day')){
        //echo $i->format("Y-m-d") . "<br>";
        
        
        if (isset($rows[$i->format("Y-m-d")])) {
            if ($rows[$i->format("Y-m-d")] + $nPessoas > 16) {
                echo "<span id='sucesso' class='text-sucess'>Data seleciona já não tem reservas disponiveis.</span>";
                $existeVagas = false;
                break;
            }  
        }          
    }
     
    if ($existeVagas) {
        //inserir valores INSERT INTO [nome tabela] ([campos tabela com virgulas] VALUES [valores separados virgulas]);
        $sql="INSERT INTO reserva (checkin, checkout, nPessoas, nome, email, contacto, pais, mensagem) VALUES ('$checkin', '$checkout', '$nPessoas', '$nome', '$email', '$contacto', '$pais', '$mensagem')";
        if($conn->query($sql)===TRUE){
            echo "<span id='sucesso' class='text-sucess'>Formulário enviado com sucesso.</span>"; 
         }
    }
 
}
?> 