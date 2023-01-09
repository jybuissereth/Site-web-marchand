<?php
    $db =require_once('../config/config.php');

         $id = $_POST['id'];
       
       
        $res = $db->prepare("DELETE FROM product WHERE id=?");
        $res->execute([$id]);
        header("Location:../index.php?id=$id");
