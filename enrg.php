<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Croissant+One&family=Explora&family=Kenia&family=Lobster&family=Oswald:wght@200&display=swap"
    rel="stylesheet">
</head>
<body class="enregistrement  fixed-background">    
    <section class="container sec-table">
        <div class="container bloc-enrg">
            <h1 class="enrg-title">Tableau de Bord</h1>
        </div>

        <table class="tableau-enrg container">
            <thead>
                <h1 class="titre">Users  <span class=" btn-tab sp3 bg-success"><a href="index2.php">Ajouter</a></span></h1>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Âge</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    session_start();
                    require("php/enrg_call.php");
                
                    if(isset($_SESSION["reponse"]))
                    {
                    echo '<p class="alert alert-success container">'.$_SESSION["reponse"].'</p>';
                    unset($_SESSION["reponse"]);
                    }

                    $data = $_SESSION["result"];
                    foreach($data as $row ):

                ?>
                <tr>
                    <td><?php echo $row["nom"] ?></td>
                    <td><?php echo $row["prenom"] ?></td>
                    <td><?php echo $row["age"].' ans' ?></td>
                    <td>
                        <span class="btn-tab sp1  bg-primary"><a href="update.php?id=<?php echo $row["id"] ?>">Modifier</a></span>

                        <span class="btn-tab sp2 bg-danger"><a href="php/delete.php?id=<?php echo $row["id"] ?>" onclick="return confirm('Voulez-vous supprimer ce champ')">Supprimer</a></span>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="index.php" class="submit  btn-table ">Retour</a>
    </section>


</body>
</html>