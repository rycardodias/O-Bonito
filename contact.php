<!DOCTYPE html>
<?php session_start(); ?>

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
            }  
        ?>
</nav>
    
<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACTOS</h3>
  <p class="w3-center w3-large">Fale com a nossa equipa. Envie-nos uma mensagem:</p>
  <div class="w3-row-padding" style="margin-top:64px">
<div class="w3-half">
  <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Rabaçal, Coimbra</p>
  <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Telefone: +351 916 890 599</p>
  <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: alberguerabacal@gmail.com</p><br>
  
    <form id="data" name="data" enctype="application/json" method="post" action="./webservices/mensagens/create.php">
    <p><input id="nome" class="w3-input w3-border" type="text" placeholder="Nome" required name="nome"></p>
    <p><input class="w3-input w3-border" type="email" placeholder="Email" required name="email"></p>
    <p><input class="w3-input w3-border" type="text" placeholder="Assunto" required name="assunto"></p>
    <p><input class="w3-input w3-border" type="text" placeholder="Mensagem" required name="mensagem"></p>
    <p><button class="w3-button w3-black" type="submit" name="enviarMensagem"><i class="fa fa-paper-plane"></i> ENVIAR MENSAGEM</button></p>
    </form>
</div>
<div class="w3-half">
  <!-- Add Google Maps -->
  <div id="googleMap" class="w3-greyscale-max" style="width:100%;height:510px;"></div>
</div>
</div>
</div>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="contact.php" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Para o topo</a>
  <div class="w3-xlarge w3-section">
    <a target="_blank" href="https://www.facebook.com/Albergue-O-Bonito-233921983749808/"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <i class="fa fa-instagram w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.facebook.com/rykardodias" title="ricardodias" target="_blank" class="w3-hover-text-green">Ricardo Dias</a></p>
</footer>
    
<!-- Add Google Maps -->
<script>
function myMap(){
  myCenter=new google.maps.LatLng(40.0292913, -8.4551076);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwVKybtQI3-YEcjrztp-bhGiBQqZW71Jg&callback=myMap"></script>
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
</body>
</html>