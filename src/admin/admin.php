<?php


$ordre = 'asc';
$cat = null;
$page = 0;
$Prix_min=0;
$Prix_max=1000;

if(isset($_GET['change']))
    $db = require_once('../config/config.php');

$product = afficherV2($ordre, $db, $cat,$Prix_min,$Prix_max);
$id;
echo "<br><br><br><br><br>";
?>
<div class="grid-container-admin">
<div class="ajout-article">
<h2>Ajouter Article</h2>

<?php


echo "<table>";
echo "<tr>";
    
    echo "<form action='./admin/add.php' method='POST'>";

    echo "<td>";
    echo "<label for='image'>New Article: </label>";
    echo "<td>";

    echo "<td>";
    echo "<label for='image'> image: </label>";
    echo "<input type='text' id='image' name='image' placeholder='article.webp'>";
    echo "<td>";
   
    echo "<td>";
    echo "<label for='nom'>nom: </label>";
    echo "<input type='text' id='nom' name='nom'>";
    echo "<td>";

    echo "<td>";
    echo "<label for='prix'>prix: </label>";
    echo "<input type='number' id='prix' name='prix' min='1' max='10000'>";
    echo "<td>";

    echo "<td>";
    echo "<label for='categorie'>Categorie: </label>";
    echo "<input type='number' id='categorie' name='categorie' min='1' max='3' value='1'>";
    echo "<td>";


    echo "<td>";
    echo "<label for='quantity'>Quantity: </label>";
    echo "<input type='number' id='quantity' name='quantity' min='0' value=0>";
    echo "<td>";

    echo "<td>";
    $id = sizeof($product);
    echo "<input type='hidden' id='id' name='id' value={$id}>";
    echo "<input type='submit' value='ajouter'>";
    echo "</td>";
    echo "</form>";

echo "</tr>";

echo "</table>";


?>
</div>

<div class='admin_article'>
<h2>Produit</h2>
<?php
echo "<table>";
echo "<tr><td><br><br></td></tr>";
foreach($product as $prod):
    echo "<tr>";
    echo "<td>"."<img src= ./{$prod['image']} class='img_article' height='110' width='80'>"."</td>";
    echo "<td>".$prod['nom']."</td>";

    echo "<form action='./admin/modif.php' method='POST'>";
    echo "<td>";
    echo "<label for='quantity'>Quantity: </label>";
    echo "<input type='number' id='quantity' name='quantity' min='0' value={$prod['quantite']}>";
    echo "</td>";
    
    echo "<td>";
    echo "<label for='quantity'>Prix: </label>";
    echo "<input type='number' id='prix' name='prix' min='1' value={$prod['prix']}>";
    echo "</td>"; 

   
    echo "<td>";
    echo "<input type='hidden' id='id' name='id' value={$prod['id']}>";
    echo "<input type='submit' value='modifier'>";
    echo "</form>"; 
    echo "</td>";
   
    echo "<td>";
    echo "<form action='./admin/supprimer.php' method='POST'>";
    echo "<input type='hidden' id='id' name='id' value={$prod['id']}>";
    echo "<input type='submit' value='supprimer'>";
    echo "</form>"; 
    echo "</td>";
    
     

    echo "</tr>";
endforeach

?>




</table>

</div>
<div class='admin_filter'>
    

    <form class='checkout-form' action='./admin/appliquer_filtre.php' method='POST'>
            <h2>Type de Filtre</h2>
            

            Nom croissant
            <input type="radio"  name="filtre" value="asc">
            Nom décroissant
            <input type="radio"  name="filtre" value="desc">
            prix croissant
            <input type="radio"  name="filtre" value="prix_asc">
            prix décroissant
            <input type="radio"  name="filtre" value="prix_desc">



            <button class='button-payment' type="submit" >Filtre</button>
        </form>

        <?php
        if (isset($_GET['modif_err']))
        {

            $modif = htmlspecialchars($_GET['modif_err']);
            switch($modif)
            {
                case 'success':
                ?>
        <script>
 
          
 
        </script>
         <div class ="success-msg" id="filter_message">
         <i class="fa fa-check"></i>

         <strong>Success:</strong> Filtre Appliquer !
        </div>
        <?php
            }}
        ?>
</div>

</div>
</div>

