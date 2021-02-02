<!DOCTYPE html>
<?php session_start(); ?>
<?php
  include ("webservices/booking/datas.php");
?>
<html>
<title>Albergue "O Bonito"</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html { height: 100%; line-height: 1.8; }
    
.w3-bar .w3-button { padding: 16px; }    
    .espaco{padding: 180px;}
.hidden{ display: none; }
</style>
<style>

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button w3-wide">ALBERGUE "O BONITO"</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="about.php" class="w3-bar-item w3-button"> SOBRE</a>
      <a href="galery.php" class="w3-bar-item w3-button"><i class="fa fa-photo"></i> GALERIA</a>
      <a href="attractions.php" class="w3-bar-item w3-button"><i class="fa fa-map-marker"></i> PONTOS TURÍSTICOS</a>
      <a href="booking.php" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> RESERVAS</a>
      <a href="contact.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACTOS</a>
      <?php
            if(isset($_SESSION['username'])){
                echo "<a href='webservices/account/logoutReservas.php' class='w3-bar-item w3-button'><i class='fa fa-sign-out'></i></a>";
            } else{ ?>
         <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button"><i class="fa fa-sign-in" ></i></button>   
      <?php   
            }  
        ?>
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
  <a href="about.php" onclick="w3_close()" class="w3-bar-item w3-button">SOBRE</a>
  <a href="galery.php" onclick="w3_close()" class="w3-bar-item w3-button">GALERIA</a>
  <a href="attractions.php" onclick="w3_close()" class="w3-bar-item w3-button">PONTOS TURÍSTICOS</a>
  <a href="booking.php" onclick="w3_close()" class="w3-bar-item w3-button">RESERVAS</a>
  <a href="contact.php" onclick="w3_close()" class="w3-bar-item w3-button">CONTACTOS</a>
          <?php
            if(isset($_SESSION['username'])){
                echo "<a href='webservices/account/logoutReservas.php' class='w3-bar-item w3-button'>SAIR</a>";
            } else{ ?>
         <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button">LOGIN</button>   
      <?php   
            }  
        ?>

</nav>
    
<!-- Formulario de Login -->    
<div id="id01" class="modal" action=""> 
  <form class="modal-content animate" enctype="application/json" method="post" action="webservices/account/loginReservas.php">
 
    <div class="container" >
      <label for="uname"><b>Utilizador</b></label>
      <input type="text" id="username" name="username" >

      <label for="psw"><b>Password</b></label>
      <input type="password" id="password" name="password">
        
      <button type="submit" class="btn btn-success btn-block w3-black">Login</button>
        
    </div>
            <div class="modal-footer">
                      <p class="w3-right">Ainda não tem conta? <a href="administracao/criar.php">Registar agora!</a></p>
            <div class="w3-half">
                <!-- COLOCAR CAPTCHA -->
            </div>
            <div class="w3-half">
             <!--   <p>Ainda não tem conta? <a href="./criar.php">Registar agora!</a></p> -->
        </div>
        </div>
  </form> 
</div>
    
      
<!-- Booking Section -->
<div class="w3-container w3-margin-top" id="">
    <p></p>
</div>
<div class="w3-container" style="padding:128px 16px" >
    
<form name="asd" id="rooms" enctype="application/json" method="post" action="./webservices/booking/create.php">
<div class="w3-row-padding">
    <div class="w3-col m4">
      <label><i class="fa fa-calendar-o"></i> Check In</label>
      <input id="checkin" class="w3-input w3-border" type="date" required name="checkin" min="<?php echo $dataatual; ?>" value="<?php if(isset($_POST['checkin'])) {echo $_POST['checkin'];} ?>">
    </div>
    <div class="w3-col m4">
      <label><i class="fa fa-calendar-o"></i> Check Out</label>
      <input id="checkout" class="w3-input w3-border" type="date" required name="checkout" min="<?php echo $dataseguinte; ?>" value="<?php if(isset($_POST['checkout'])) {echo $_POST['checkout'];} ?>">
    </div>
    <div class="w3-col m2">
      <label><i class="fa fa-male"></i> Pessoas</label>
      <input id="nPessoas" class="w3-input w3-border" type="number" min="1" max="16" value="1" placeholder="1" name="nPessoas"> 
    </div>
    <div class="w3-col m2">
      <label><i class="fa fa-search"></i> Pesquisar</label>
      <button class="w3-button w3-block w3-black"  name="pesquisar" onclick="mostrarQuartos('quartos')" >Pesquisar</button>
    </div>
  </div>
  <div id="preenchimento" class="espaco ">
      
      </div>
<!-- QUARTOS -->
<div id="quartos" class="w3-row-padding w3-padding-16 hidden">
    <div id="quarto1" class="w3-third w3-margin-bottom">
      <img src="#" alt="" style="width:100%"> <!-- Inserir Imagem -->
      <div class="w3-container w3-white">
        <h3>Cama em Dormitorio de 6 a 10 pessoas</h3>
        <h6 class="w3-opacity">10€ por noite</h6>
        <p>Cama individual</p>
        <p>Serviço de refeições disponivel</p>
        <p class="w3-large"><i class="fa fa-bath"></i><i class="fa fa-wifi"></i><i class="fa fa-coffee"></i></p>
        <button class="w3-button w3-block w3-black w3-margin-bottom" onclick="mostrarFormulario('2')" name="escolherQuarto">Escolher Quarto</button>
      </div>
    </div>
</div>

<!-- FORMULARIO -->    
<div id="formulario" class="hidden">
    <div  class="w3-half">
        <p><input class="w3-input w3-border" type="text" placeholder="Nome" required name="nome"></p>
        <p><input class="w3-input w3-border" type="email" placeholder="Email" required name="email"></p>
        <p><input class="w3-input w3-border" type="tel" placeholder="Contacto telefónico" required name="contacto"></p>
        <p><select class="w3-input w3-border" id="pais" name="pais"> 
              <?php 
                include "./webservices/booking/paises.php";
              ?>
            </select> 
       </p>
        <p><input class="w3-input w3-border " type="text" placeholder="Observações" name="mensagem"></p>
                <p><button class="w3-button w3-black" type="submit" name="efetuarMarcacao"><i class="fa fa-paper-plane"></i> EFETUAR MARCAÇÃO</button></p>
 
    </div>
</div> 
</form>
</div> 

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="booking.php" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Para o topo</a>
  <div class="w3-xlarge w3-section">
    <a target="_blank" href="https://www.facebook.com/Albergue-O-Bonito-233921983749808/"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <i class="fa fa-instagram w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.facebook.com/rykardodias" title="ricardodias" target="_blank" class="w3-hover-text-green">Ricardo Dias</a></p>
</footer>
    
<!-- Scripts -->
<script>
function mostrarQuartos() {    
    if (document.getElementById("sucesso") != null)
        document.getElementById("sucesso").style.display = "none";
        document.getElementById("preenchimento").style.display = "blcok";

     
    if(document.getElementById("checkin").value.length > 0 && document.getElementById("checkout").value.length > 0) {
        var stringEntrada = document.getElementById("checkin").value.split('-');
        var stringSaida = document.getElementById("checkout").value.split('-');
        
        var diaEntrada = new Date(parseInt(stringEntrada[0]), parseInt(stringEntrada[1]) - 1, parseInt(stringEntrada[2]));
        var diaSaida = new Date(parseInt(stringSaida[0]), parseInt(stringSaida[1]) - 1, parseInt(stringSaida[2]));
        
        if (diaEntrada >= diaSaida) {
            alert("As datas são inválidas!");
            document.getElementById("quartos").style.display = 'none'; 
            document.getElementById("preenchimento").style.display = 'none'; 

        } else {
            document.getElementById("quartos").style.display = 'block';
            document.getElementById("preenchimento").style.display = 'none'; 

        }
    }
}
function mostrarFormulario() {
    <?php
        if(isset($_SESSION['username'])){
            echo "document.getElementById('formulario').style.display = 'block'";
        } else{
            echo "document.getElementById('id01').style.display = 'block'";
        } 
    ?>
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
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
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