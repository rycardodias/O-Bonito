<!-- <form data="data" name="data" enctype="application/json" method="post" action="../webservices/account/create.php">
    Nome <input type="text" id="username" name="username">
    PW <input type="text" id="password" name="password">
    PW2 <input type="text" id="password2" name="password2">
    <input type="submit">
</form> -->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: black;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>
</head>
<body>

<form data="data" name="data"  enctype="application/json" method="post" action="../webservices/account/create.php">
  <div class="container">
    <h1>Registar</h1>
    <p>Por favor preencha o nosso formulário de inscrição.</p>
    <hr>

    <label for="email"><b>Username</b></label>
    <input type="text" id="username" name="username" placeholder="Username"  required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Password" id="password" name="password" required>

    <label for="psw-repeat"><b>Repetir Password</b></label>
    <input type="password" id="password2" name="password2" placeholder="Repita a Password"  required>
    <hr>

    <button type="submit" class="registerbtn">Registar</button>
  </div>
  
  <div class="container signin">
    <p>Já tem uma conta registada? <a href="../booking.php">Faça login</a>.</p>
  </div>
</form>

</body>
</html>
