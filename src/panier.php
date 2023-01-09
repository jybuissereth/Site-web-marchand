<?php
    //extract($_SESSION);
    session_start();
    $tab=array();
    //print_r($_POST);
    foreach($_POST AS $key=>$value) {
        $tab[$key]=$value;
      }
    //print_r($tab);
    if(isset($_SESSION['panier'])){
        array_push($_SESSION['panier'],$tab);
    }
    else{
        
        $_SESSION['panier']=array();
        array_push($_SESSION['panier'],$tab);
    }
    var_dump($_SESSION);
  

   
?>