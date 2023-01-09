<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="connexion.css" />
    <title>Test</title>
  </head>

  <body>
    <header>
      <h1>Inscription</h1>
    </header>
    <div class="formulaire">
    <?php
        if (isset($_GET['reg_err']))
        {
            $err = htmlspecialchars($_GET['reg_err']);
            switch($err)
            {
                case 'success':
                ?>
                    <div>
                        <strong>Success</strong> inscription réussie !
                    </div>
                <?php
                break;
                
                case 'password':
                    ?>
                        <div>
                            <strong>Erreur</strong> mot de passe differents
                        </div>
                    <?php
                    break;
                
                case 'email':
                    ?>
                        <div>
                            <strong>Erreur</strong> email invalide
                        </div>
                    <?php
                    break;

                case 'email_length':
                ?>
                    <div>
                        <strong>Erreur</strong> email trop long
                    </div>
                <?php
                break;

                case 'pseudo_length':
                    ?>
                    <div>
                        <strong>Erreur</strong> Username trop long
                    </div>
                    <?php
                    break;

                case 'already':
                    ?>
                    <div>
                        <strong>Erreur</strong> compte deja existant
                    </div>
                    <?php
                    break;

                
            }
            
        }
        ?>
      <form action="inscription_traitement.php" method="post">
        
          <input type="text" name="pseudo" placeholder="Username" required />
          <input type="text" name="email" placeholder="Email" required />
          <input type="password" name="password" placeholder="Password" required />
          <input type="password" name="password_conf" placeholder="Confirm Password" required />
          <button type="submit">Inscription</button>
          <a href=index.php>Se connecter</a> 
       
      </form>
    </div>
  </body>
</html>