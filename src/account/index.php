<!--  -->
<?php
session_start();
if(isset($_SESSION['connected'])){
  if( $_SESSION['connected']==true){
    header('Location:/website/src/index.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="connexion.css" />
    <title>Test</title>
  </head>

  <body>
    
    <div class="formulaire">
      <h1>Connexion</h1>
    <?php
        if (isset($_GET['login_err']))
        {
            $err = htmlspecialchars($_GET['login_err']);
            switch($err)
            {
                case 'password':
                ?>
                  <div>
                      <strong>Erreur</strong> mot de passe incorrect
                  </div>
                <?php
                break;

                case 'email':
                ?>
                    <div>
                        <strong>Erreur</strong> email incorrect
                    </div>
                <?php
                break;

                case 'already':
                ?>
                  <div>
                      <strong>Erreur</strong> compte non existant
                  </div>
                <?php
                break;
            }
            
        }
        ?>
      <form action="connexion.php" method="post">
        
          <input type="email" name="email" placeholder="Email" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit" className="button">Connexion</button>

          <a href=inscription.php>S'inscrire</a> 
       
      </form>
    </div>
  </body>
</html>