<?php
session_start();
require('./shop_functions.php');
require_once('../config/config.php');


function ajouter_commandes()
{
  $file = 'cpt.txt';
  if (file_exists($file)) {
    $cpt = (int)file_get_contents($file);
    $cpt++;
    file_put_contents($file, $cpt);
  } else {
    file_put_contents($file, 1);
  }
}

function nombre_commandes(): string
{
  $file = 'cpt.txt';
  return file_get_contents($file);
}



$total = Totalprix($_SESSION['panier']);
$user = $_SESSION['user'];
$cardName = htmlspecialchars($_POST['cardName']);
$address = htmlspecialchars($_POST['address']);
$cvv = htmlspecialchars($_POST['cvv']);
$numCard = htmlspecialchars($_POST['numCard']);
$city = htmlspecialchars($_POST['city']);
$zipCode = htmlspecialchars($_POST['zipCode']);
$c = strlen($cvv);
if (($_SESSION['panier']!=null)) {
  if (isset($_SESSION['user'])) {
    if (strlen($numCard) == 16) {
      if (strlen($cvv) == 3) {
        if (strlen($zipCode) == 5) {
          ajouter_commandes();
          $commandes = nombre_commandes();
          $insert = $bdd->prepare('INSERT INTO commandes(username, total_price,id) VALUES (:username,:total_price,:id)');
          $insert->execute(array('username' => $user, 'total_price' => $total, 'id' => $commandes));

          foreach ($_SESSION['panier'] as $key) {
            $id = $key['id'];
            $price = (float)$key['prix'];

            $update = $bdd->prepare('UPDATE product SET product.quantite = product.quantite- 1 where id=' . $id);
            $update->execute(array('username' => $user, 'total_price' => $total, 'id' => $commandes));

            file_put_contents('test.txt', gettype($key['prix']));

            $stmt = $bdd->prepare("INSERT INTO articleC(price, product_id,commandes_id) VALUES (?, ?, ?)");

            $stmt->bindParam(1, $price);
            $stmt->bindParam(2, $id);
            $stmt->bindParam(3, $commandes);
            $stmt->execute();
          }
          header('Location:../index.php?p=checkout&payment=success');
        } else {
          header('Location:../index.php?p=checkout&payment=zip');
        }
      } else {
        header('Location:../index.php?p=checkout&payment=cvv');
      }
    } else
      header("Location:../index.php?p=checkout&payment=numcard");
  } else
    header("Location:../index.php?p=checkout&payment=connexion");
} else
  header("Location:../index.php?p=checkout&payment=paniervide");
