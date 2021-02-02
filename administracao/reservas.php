<!DOCTYPE html>
<?php session_start(); ?>
<?php

if(isset($_SESSION['username'])){
    echo "Bem Vindo Administrador ".$_SESSION['username']."";
}else{
    header('Location: ./login.php');
} 
?>
<html>
<title>Albergue "O Bonito"</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif }

body, html { height: 100%; line-height: 1.8; }
    
.w3-bar .w3-button { padding: 16px; }
    

.bottomright {
    position: absolute;
    bottom: 8px;
    right: 16px;
}
</style>
    
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="" class="w3-bar-item w3-button w3-wide">ALBERGUE "O BONITO"</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
  <a href="reservas.php" onclick="w3_close()" class="w3-bar-item w3-button">LISTAR RESERVAS</a>
  <a href="mensagens.php" onclick="w3_close()" class="w3-bar-item w3-button">LISTAR MENSAGENS</a>
  <a href="../webservices/account/logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> </a>

    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>
<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Fechar ×</a>

  <a href="reservas.php" onclick="w3_close()" class="w3-bar-item w3-button">LISTAR RESERVAS</a>
  <a href="mensagens.php" onclick="w3_close()" class="w3-bar-item w3-button">LISTAR MENSAGENS</a>
        <a href="../webservices/account/logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> LOGOUT</a>

</nav>
    
    
    
<div class="w3-container" style="padding:128px 16px">
<div class="row" style="padding-left:48px">
    <h3 class="w3-left">Lista Reservas<br><br> </h3>
</div>
    
<div class="row" style="padding: 0px 48px 0px 48px">
    <table class='w3-border'>
        <tr class='w3-border'>
        <th class='col-sm-1'>Check-in</th>
        <th class='col-sm-1'>Check-out</th>
        <th class='col-sm-1'>nPessoas</th>
        <th class='col-sm-2'>Nome</th>
        <th class='col-sm-2'>Email</th>
        <th class='col-sm-2'>Telefone</th>
        <th class='col-sm-1'>País</th>
        <th class='col-sm-3'>Obs</th>
        </tr>    
<?php        
include_once '../webservices/booking/read.php';
    
    if(isset($json))
    {
    $json = json_decode($json);

    foreach($json as $obj)
    {
    echo "<tr>";

    echo "<td>" . $obj->checkin . "</td>";
    echo "<td>" . $obj->checkout . "</td>";
    echo "<td>" . $obj->nPessoas . "</td>";
    echo "<td>" . $obj->nome . "</td>";
    echo "<td>" . $obj->email . "</td>";
    echo "<td>" . $obj->contacto . "</td>";
    echo "<td>" . $obj->pais . "</td>";
    echo "<td>" . $obj->mensagem . "</td>";
    echo "<td><form method='post' action='../webservices/booking/eliminarReserva.php'><input type='text' name='delete' id='delete' value='". $obj->idReserva ."' hidden><button id='eliminar' class=' w3-red' type='submit'>  Eliminar</button></form><td>" ;
    echo "</tr>";
    }
}
?>
    </table>
</div>
</div>
    <div class="bottomright">
    </div>  

<script>
function mostrarFormulario() {
    document.getElementById("responderEmail").style.display = 'block';
}    

</script>
<script>
// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
    } else {
        mySidebar.style.display = 'block';
    }
}
// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>
</body>
</html>