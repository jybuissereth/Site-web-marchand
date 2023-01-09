<?php
require_once('./config/config.php');
$user = $_SESSION['user'];
if($user == false)
  header('Location:./account/index.php');//renvoie vers la page de connexion


function afficherCommandes($bdd, $user)
{
  $res = $bdd->prepare("SELECT commandes.id, commandes.total_price, product.nom,product.prix, product.image from product,commandes,articleC where commandes.id = articleC.commandes_id and articleC.product_id = product.id and commandes.username='" . $user . "'");
  $res->execute();
  $data = $res->fetchAll(PDO::FETCH_ASSOC);
  return $data;
}
$data = afficherCommandes($bdd, $user);
?>

<div class="commandes_container">
  <h1>Mes commandes</h1>
  <hr>
  <?php

  // var_dump($data);
  $tmp_id = (int)$data[0]['id'];
  $j = 0;
  $k = 0;
  echo '<div >';
  echo '<div class="recap-commande">';
  echo "Numéro de commande : {$data[0]['id']}<br>";
  echo "Total : {$data[0]['total_price']}€<br>";
  echo '</div>';
  for ($i = 0; $i < sizeof($data); $i++) {
    if ($tmp_id != (int)$data[$i]['id']) {
      echo '<hr>';
      echo '</div>';
      $id = $j;
      $j++;
      echo '<div id="' . $id . '">';
      echo '<div class="recap-commande">';
      echo "Numéro de commande : {$data[$i]['id']}<br>";
      echo "Total : {$data[$i]['total_price']}€<br>";
      echo '</div>';
      $tmp_id = $data[$i]['id'];
      $k++;
    }

    echo '<div class="grid-container-commande">';
    echo "<img src= ./{$data[$i]['image']} class='img_commandes'>";
    echo "<div class='text-command'>{$data[$i]['nom']}</div>";
    echo "<div class='text-command'>{$data[$i]['prix']}€</div>";
    echo '</div>';
  }
  echo '</div>';
  ?>

</div>