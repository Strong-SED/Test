<?php

    session_start();
    require("connect.php");

    $id = $_GET["id"];

    try
    {
        $query = " DELETE FROM user WHERE id = ?";
        $stmt = $connect -> prepare($query);
        $stmt ->execute(array($id));
        $_SESSION["reponse"] = "Suppression effectuée avec succès";
        header("location: ../enrg.php");
    }
    catch(PDOException $e)
    {
        echo "Erreur : ".$e ->getMessage();
    }

?>