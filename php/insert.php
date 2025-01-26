<?php

    session_start();
    require_once ("connect.php");
    echo '<br>';
    $nom = $prenom = $age = "";

    if(!empty($_POST))
    {
        $nom = anticheat($_POST["nom"]);
        $prenom = anticheat($_POST["prenom"]);
        $age = anticheat($_POST["age"]);
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
        if(empty($nom) and empty($prenom) and empty($age))
        {
            $error = "Veuillez remplir l'intégralité des champs et réessayer";
            $validate = false;
        }

        

        if($validate)
        {
            try
            {
                $query = " INSERT INTO user(nom,prenom,age) VALUES( ? , ? , ? ) ";
                $stmt = $connect -> prepare($query);
                $stmt -> execute(array($nom, $prenom, $age));
    
            }
            catch(PDOException $error)
            {
                echo 'Erreur : '.$error -> getMessage();
            }
        }
        else
        {
            $_SESSION['error'] = $error;
            header("location: ../index2.php");
            exit();
        }
        
        $_SESSION["reponse"] = "Enregistrement effectué avec succes";
        header("location: ../enrg.php");
    }

    function anticheat($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data ;
    }

?>