 <?php
    session_start();
    require_once '../config/config.php';
    echo('test');
    

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $password = htmlspecialchars($_POST['password']);
        $email = htmlspecialchars($_POST['email']);
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $password = hash('sha256', $password);
                if($data['password'] === $password)
                {
                    
                    $_SESSION['user'] = $data['pseudo'];
                    $_SESSION['connected']=true;
                    if($email== 'admin@gmail.com'){
                        $_SESSION['admin']=true;
                        header('Location:/website/src/index.php?p=admin');
                    }
                    else{
                        $_SESSION['admin']=false;
                        header('Location:/website/src/index.php');
                    }
                    header('Location:/website/src/account/landing.php');
                }
                else header('Location:index.php?login_err=password');
            }
            else header('Location:index.php?login_err=email');
        }
        else header('Location:index.php?login_err=already');
 
    }else header('Location:index.php');

