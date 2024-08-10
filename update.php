<?php
  session_start();
  require "php/connect.php";
  $id = $_GET["id"];


  $nom = $prenom = $age = "";

  try
  {
    $query = "SELECT nom , prenom , age FROM user WHERE id = ? ";
    $stmt = $connect -> prepare($query);
    $stmt -> execute(array($id));
    $result = $stmt -> fetch();
    $nom = $result["nom"];
    $prenom = $result["prenom"];
    $age = $result["age"];
  }
  catch(PDOException $e)
  {
    echo "Erreur : ".$e -> getMessage();
  }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Croissant+One&family=Explora&family=Kenia&family=Lobster&family=Oswald:wght@200&display=swap"
    rel="stylesheet">
</head>

<body>
  <h1 class="title">formulaire de modification</h1>


  <form action="php/update_call.php" method="post">
    <h1 class="titre">Modification</h1>
        <?php

        // Récupération du message d'erreur depuis la session (déplacé en haut du code)
        if (isset($_SESSION['error'])) {
          echo '<p class="text alert alert-danger">' . $_SESSION['error'] . '</p>';
          // Suppression du message d'erreur après l'affichage
          unset($_SESSION['error']);
        }
    ?>

    <input type="hidden" name="id" value="<?php echo $id ?>">

    <input type="text" name="nom" id="nom" placeholder="Votre nom" class="champ" value="<?php echo $nom ?>"  required><br>

    <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" class="champ" value=" <?php echo $prenom ?>"  required><br>

    <input type="number" name="age" id="age" placeholder="Votre Âge" class="champ"  value="<?php echo $age ?>"  required><br>

    <button class="submit">Modifier</button>
    <a href="enrg.php" class="submit">Retour</a>

  </form>

</body>

</html>