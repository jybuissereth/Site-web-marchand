<?php
    // session_start();
    $db =require_once('../config/config.php');

    if(isset($_POST['image']) && isset($_POST['nom']) && isset($_POST['prix']) )
    {
        $image = "img/".htmlspecialchars($_POST['image']);
        $nom = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $quantite = htmlspecialchars($_POST['quantity']);
        $categorie = htmlspecialchars($_POST['categorie']);
        $id = $_POST['id']+20;
         
       
        //echo "<img src={$image} class='img_article'><br>"; 

        //ajouter($db,$image,$nom,$prix,$quantite);

        //header('Location:/website/src/index.php');
        //echo "<img src={$image} class='img_article'><br>"; 

        
        if($prix > 0)
        {
            if(strlen($image) <= 100)
            {
                if(strlen($nom) <= 100)
                {
                    $insert = $db->prepare('INSERT INTO product(id,nom,prix,marque,image,taille,categorie, quantite) VALUES (?,?,?,?,?,?,?,?)');
                    $insert-> execute([$id,$nom,$prix," ",$image," ",$categorie,$quantite]);
                    header("Location:../index.php?id=$id");
                }
                //else {header('Location:inscription.php?reg_err=email_length');die();}
            }
            //else {header('Location:inscription.php?reg_err=pseudo_length');die();}
        }
        else {header('Location:../index.php?reg_err=already');die();}

    }

