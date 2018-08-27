<?php
session_start();
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
    echo "Nije ispravan format emaila";
    die();
    }

    $sql = 'SELECT * from `users` where `email`=:mail';

    $statement = $pdo->prepare($sql);
    if($statement->execute([
        ':mail' => $mail,
    ])) {
            
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        if( $user === null || !password_verify($pass, $user['password'], PASSWORD_BCRYPT) ) {
            die('Email ili sifra nisu u redu');
        }
        $_SESSION['logged_id'] = true;
        $_SESSION['user'] = $user;
        
        header('Location: home.php?message=Ulogovani ste&logged_in=true');
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
