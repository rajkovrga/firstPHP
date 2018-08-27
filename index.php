<?php
  
    require_once __DIR__ . '/connection.php';
   
    if (isset($_POST['submit']))
    {
       
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mail = $_POST['mail'];
        $password =  $_POST['password'];
      
        if( !( isset($fname) && isset($lname) && isset($mail) && isset($password) ) )
        {
            die('Unesite sve');
        } 
   
    $sql = 'INSERT INTO `users`(`FirstName`, `LastName`, `email`, `password`) VALUES (:fname,:lname,:email,:pass)';
    try
    {
        $statement = $pdo->prepare($sql);

        $statement->execute([
            ':fname' => $fname,
            ':lname' => $lname,
            ':email' => $mail,
            ':pass' => password_hash($password,PASSWORD_BCRYPT),
        ]);
        header("Location: login.php");  
    }
    catch(Exeption $e )
    {
        die($e->getMessage());
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
<h1>Registration</h1>
    <form action="" method="POST">
    <table>
    <tr> <td><span>First Name</span><input type="text" name="fname" id=""/></td></tr>
    <tr>    <span>Last Name</span><input type="text" name="lname" id=""/></td></tr>
       
   
    <tr> <td> <span>Mail</span><input type="mail" name="mail" id=""/></td></tr>
    <tr> <td>    <span>Password</span><input type="password" name="password" id=""/></td></tr>
    <tr> <td>    <input type="submit" value="submit" name="submit" id=""/></td></tr>
    </table>

    <a href="login.php">Login</a>

   

    </form>
</body>
</html>
