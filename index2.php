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
  <h1 class="title">formulaire d'insertion</h1>


  <form action="php/insert.php" method="post">
    <h1 class="titre">Inscription</h1>
        <?php
        session_start();

        // Récupération du message d'erreur depuis la session (déplacé en haut du code)
        if (isset($_SESSION['error'])) {
          echo '<p class="text alert alert-danger">' . $_SESSION['error'] . '</p>';
          // Suppression du message d'erreur après l'affichage
          unset($_SESSION['error']);
        }
    ?>


    <input type="text" name="nom" id="nom" placeholder="Votre nom" class="champ"><br>
    <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" class="champ"><br>
    <input type="number" name="age" id="age" placeholder="Votre Âge" class="champ"><br>
    
    <button class="submit">Submit</button>
    <a href="index.php" class="submit">Retour</a>
  </form>

</body>

</html>