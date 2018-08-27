<?php

require_once __DIR__ . '/connection.php';

if(isset($_POST['submit']))
{
    $mail = $_POST['mail'];
    $pass = $_POST['password'];
    
    if(!( isset($mail) && isset($pass) ))
    {
        echo "Unesite oba polja";
        die();
    }

    if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
    {
    echo "nije ispravan format emaila";
    die();
    }

    if(!(password_verify($pass,PASSWORD_BCRYPT))
    {
        echo "Nije tacan email ili lozinka";
        die();
    }



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    <form action="" method="POST">
    <span>E-mail</span><input type="mail" name="mail" id=""/><br>
    <span>Password</span><input type="password" name="mail" id=""/><br>
    <input type="submit" value="submit" name="submit">
    </form>

    <a href="index.php">Registration</a>
</body>
</html>