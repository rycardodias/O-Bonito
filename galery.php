<!DOCTYPE html>
<?php session_start(); ?>

<html>
<title>Albergue "O Bonito"</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html { height: 100%; line-height: 1.8; }
    
.w3-bar .w3-button { padding: 16px; } 
* {
  box-sizing: border-box;
}
.row > .column {
  padding: 0 8px;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.column {
  float: left;
  width: 25%;
}
/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}
/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 800px;
}
/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}
.mySlides {
  display: none;
}
.cursor {
  cursor: pointer
}
/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}
/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}
img {
  margin-bottom: -4px;
}
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}
.demo {
  opacity: 0.6;
}
.active,
.demo:hover {
  opacity: 1;
}
img.hover-shadow {
  transition: 0.3s
}
.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}    
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


<!-- Galery Section -->
<div class="w3-container" style="padding:128px 16px" id="galeria">
  <h3 class="w3-center">INSTALAÇÕES DO ALBERGUE</h3>
  <p class="w3-center w3-large">Galeria de imagens das instalações do nosso albergue.</p>

  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6">
      <img src="img/albergue/ph01.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="w3-hover-opacity">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/albergue/ph02.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="w3-hover-opacity">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/albergue/ph03.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="w3-hover-opacity">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/albergue/ph04.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="w3-hover-opacity">
    </div>
  </div>

  <div class="w3-row-padding w3-section">
    <div class="w3-col l3 m6">
      <img src="img/albergue/ph05.jpg" style="width:100%" onclick="openModal();currentSlide(5)" class="w3-hover-opacity">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/albergue/ph06.jpg" style="width:100%" onclick="openModal();currentSlide(6)" class="w3-hover-opacity">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/albergue/ph07.jpg" style="width:100%" onclick="openModal();currentSlide(7)" class="w3-hover-opacity">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/albergue/ph08.jpg" style="width:100%" onclick="openModal();currentSlide(8)" class="w3-hover-opacity">
    </div>
  </div>
    
<!-- Visualização de Fotos -->
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 8</div>
      <img src="img/albergue/ph01.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 8</div>
      <img src="img/albergue/ph02.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 8</div>
      <img src="img/albergue/ph03.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">4 / 8</div>
      <img src="img/albergue/ph04.jpg" style="width:100%">
    </div>
    <div class="mySlides">
      <div class="numbertext">5 / 8</div>
      <img src="img/albergue/ph05.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">6 / 8</div>
      <img src="img/albergue/ph06.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">7 / 8</div>
      <img src="img/albergue/ph07.jpg" style="width:100%">
    </div>
    <div class="mySlides">
      <div class="numbertext">8 / 8</div>
      <img src="img/albergue/ph08.jpg" style="width:100%">
    </div>
    <div class="caption-container">
      <p id="caption"></p>
    </div>  
</div>
</div>
</div>
    
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="galery.php" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Para o topo</a>
  <div class="w3-xlarge w3-section">
    <a target="_blank" href="https://www.facebook.com/Albergue-O-Bonito-233921983749808/"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <i class="fa fa-instagram w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.facebook.com/rykardodias" title="ricardodias" target="_blank" class="w3-hover-text-green">Ricardo Dias</a></p>
</footer>
      
<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
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