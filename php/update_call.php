<?php

    session_start();
    require("connect.php");
    echo '<br>';

    
    $nom = $prenom = $age = "";
    
    if(!empty($_POST))
    {
        $nom = anticheat($_POST["nom"]);
        $prenom = anticheat($_POST["prenom"]);
        $age = anticheat($_POST["age"]);
        $id = $_POST["id"];
        $validate = true;

        

        if(empty($nom))
        {
            $error = "Veuillez saisir un nom";
            $validate = false;
        }
        if(empty($prenom))
        {
            $error = "Veuillez saisir un prénom";
            $validate = false;
        }
        if(empty($age))
        {
            $error = "Veuillez saisir un age";
            $validate = false;
        }
        if(empty($id))
        {
            $error = "ID introuvable";
            $validate = false;
        }
        if(empty($nom) and empty($prenom) and empty($age))
        {
            $error = "Veuillez remplir l'intégralité des champs et réessayer";
            $validate = false;
        }


        if($validate)
        {
            try
            {
                $query = " UPDATE user SET nom = ? , prenom = ? , age = ? WHERE id = ? ";
                $stmt = $connect -> prepare($query);
                $stmt -> execute(array($nom, $prenom, $age,$id));
                $_SESSION["reponse"] = "Amélioration effectuée avec succes";
            }
            catch(PDOException $error)
            {
                echo 'Erreur : '.$error -> getMessage();
            }
        }
        else
        {
            $_SESSION['error'] = $error;
            header("location: ../update.php");
            exit();
        }

        header("location: ../enrg.php");
    }


    

    function anticheat($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data ;
    }

?>