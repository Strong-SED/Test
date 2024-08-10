<?php

    $host = "localhost";
    $dbname = "test";
    $user = "root";
    $mdp = "";

    try
    {
        $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // echo "Connexion effectuée avec succès  😂😂👌";
    }
    catch(PDOException $e)
    {
        echo "Erreur : ".$e -> getMessage();
    }

    
?>