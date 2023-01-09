<?php
    session_start();
    $_SESSION['user']=NULL;
    $_SESSION['connected']=false;
    $_SESSION['admin']=false;

    header('Location:/website/src/index.php');
