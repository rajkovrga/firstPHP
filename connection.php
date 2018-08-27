<?php

try
    {

    $config = [
        'driver' => 'mysql',
        'user' => 'root',
        'host' => 'localhost',
        'database' => 'proba',
        'password' => '',
        'charset' => 'utf8',
    ];
 
    $pdo = new PDO($config['driver'] . ':dbname=' . $config['database'] .';host=' . $config['host'] . ';charset=' . $config['charset'], 
            $config['user'],
            $config['password']

    );
    }
    catch(PDOException $e)
    {
      echo 'Connection filed: ' . $e->getMessage();
      echo 'Doslo je do greske';
      return;
    }
    ?>