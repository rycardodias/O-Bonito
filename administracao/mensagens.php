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
</style>
<script lang="javascript">
    function past(email, assunto)
    {
        document.getElementById("emailResposta").value = email;
        document.getElementById("assuntoResposta").value = assunto;
    }
</script>
       
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
<div class="w3-half" style="padding-left:48px">
<div class="row">
    <h3 class="w3-left">Mensagens Clientes<br><br> </h3>
</div>
<div class='row'>
 <table class='w3-border'>
        <tr class='w3-border'>
        <th class='col-sm-2'>Nome</th>
        <th class='col-sm-2'>Email</th>
        <th class='col-sm-2'>Assunto</th>
        <th class='col-sm-2'>Mensagem</th>


        </tr>    
<?php        
include_once '../webservices/mensagens/read.php';
        
    if(isset($json))
    {
    $json = json_decode($json);

    foreach($json as $obj)
    {
    echo "<tr>";
    echo "<td>" . $obj->nome . "</td>";
    echo "<td>" . $obj->email . "</td>";
    echo "<td>" . $obj->assunto . "</td>";
    echo "<td>" . $obj->mensagem . "</td>";
    echo "<td><button class=' w3-red' onclick='past(\"". $obj->email ."\",\"". $obj->assunto ."\")'>  Responder</button></td>" ; 
    echo "<td><form method='post' action='../webservices/mensagens/eliminarMensagem.php'><input type='text' name='delete' id='delete' value='". $obj->id ."' hidden><button id='eliminar' class=' w3-red' type='submit'>  Eliminar</button></form></td>" ;    
        echo "</tr>";
    }
}
?>
    </table>
</div>
</div>
    
<div id="formularioResposta" class="w3-half" style="padding-left:48px">

    <h3 class="w3-left">Envie a sua resposta ao cliente.<br><br> </h3>
    
     <div>
        <div class="w3-container">
            <p><input class="w3-input w3-border w3-half" placeholder="Email" id="emailResposta" name="emailResposta"></p>
         </div>
         <div class="w3-container">
            <p><input class="w3-input w3-border w3-half" type="text" placeholder="Assunto" id="assuntoResposta" name="assuntoResposta"></p>
        </div>
        <div class="w3-container">
         <p><input class="w3-input w3-border" type="text" placeholder="Mensagem" id="mensagemResposta" name="mensagemResposta"></p>
         </div>
        <div class="w3-container">
            <p><button class="w3-button w3-black" type="submit" id="enviarResposta" name="enviarResposta"><i class="fa fa-paper-plane"></i> ENVIAR EMAIL</button></p>
         </div>    
    </div> 
</div>
</div>
    
<script>
function mostrarFormulario() {
    document.getElementById("formularioResposta").style.display = 'block';
}  
    
function responder(){
    document.groovyform.email.value = email;
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
}</script>
</body>
</html>