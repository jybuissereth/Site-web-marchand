<?php
    require_once '../config/config.php';

    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_conf']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_conf = htmlspecialchars($_POST['password_conf']);

        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        $email = strtolower($email);

        if($row == 0)
        {
            if(strlen($pseudo) <= 100)
            {
                if(strlen($email) <= 100)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if($password === $password_conf)
                        {
                            $password = hash('sha256', $password);
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES (:pseudo,:email,:password)');
                            $insert-> execute(array('pseudo' => $pseudo,'email' => $email, 'password' => $password));
                            header('Location:inscription.php?reg_err=success');
                            
                        }
                        else{ header('Location: inscription.php?reg_err=password'); die();}
                    }
                    else{ header('Location: inscription.php?reg_err=email'); die();}
                }
                else {header('Location:inscription.php?reg_err=email_length');die();}
            }
            else {header('Location:inscription.php?reg_err=pseudo_length');die();}
        }
        else {header('Location:inscription.php?reg_err=already');die();}

    }

