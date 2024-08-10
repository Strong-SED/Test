<?php

  require("connect.php");

  try
  {
    $query = "SELECT id , nom , prenom , age FROM user";
    $stmt = $connect -> query($query);
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["result"] = $result;
  }
  catch(PDOException $e)
  {
    echo "Erreur : ".$e -> getMessage();
  }


?>