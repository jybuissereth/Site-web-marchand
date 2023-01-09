<?php
    $db =require_once('../config/config.php');

   
    $quantite = htmlspecialchars($_POST['quantity']);
    $prix = htmlspecialchars($_POST['prix']);
    $id = $_POST['id'];

    $sup = $db->prepare("UPDATE product SET quantite=?,prix=? WHERE id=?");
    $sup->execute([$quantite,$prix,$id]);
    header("Location:../index.php?id=$id");
