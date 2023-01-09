<?php
    session_start();
   
    if(isset($_SESSION['user'])){
        echo('test');
        header('Location:/website/src/index.php');
    }
?>
