<!DOCTYPE html>
<?php session_start(); ?>

<?php
    if(isset($_SESSION['username'])){
        header('Location: ./mensagens.php');
    } 
?>
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
/* Full height image header */
.bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("../img/imgEntrada.jpg");
    min-height: 100%;
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
<style>
  .modal-header,h4, .close {
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="" class="w3-bar-item w3-button w3-wide">ALBERGUE "O BONITO"</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button"><i class="fa fa-sign-in" > LOGIN</i> </button>
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
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-large w3-padding-16">Login</button> 
</nav>

    
<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div id="id01" class="modal" action="">
  <form class="modal-content animate" enctype="application/json" method="post" action="../webservices/account/login.php">

    <div class="container" >
        <label for="usrname"><span class=""></span> Utilizador</label>
        <input type="text" class="form-control" id="username" required name="username" placeholder="Nome de Utilizador">
        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
        <input type="text" class="form-control" id="password" required name="password" placeholder="Password">
        <button type="submit" class="btn btn-success btn-block w3-black"><span class="glyphicon glyphicon-off"></span> Login</button>
        
    </div>
        <div class="modal-footer">
                      <p class="w3-right">Ainda não tem conta? <a href="./criar.php">Registar agora!</a></p>
            <div class="w3-half">
                <!-- COLOCAR CAPTCHA -->
            </div>
            <div class="w3-half">
             <!--   <p>Ainda não tem conta? <a href="./criar.php">Registar agora!</a></p> -->
        </div>
        </div>
  </form>

</div>
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">Albergue "O Bonito"</span><br>
    <span class="w3-large"> Zona de Administração</span>
    <p><a href="../index.php" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Pagina Inicial</a></p>
  </div> 
<!-- Small icons - Social media -->    
</header>
    
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