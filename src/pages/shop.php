<?php


require('./admin/appliquer_filtre.php');
$ordre=file_get_contents('./admin/ordre.txt');
$cat = null;
$page = 0;
$Prix_min=0;
$Prix_max=1000;
echo $ordre;
$product = afficherV2($ordre, $db, $cat,$Prix_min,$Prix_max);


if (isset($_GET['o'])){    
    $ordre = $_GET['o'];
   
}
if (isset($_GET['c'])){
    $cat = $_GET['c'];
    
}
if (isset($_GET['pa'])){
    if($_GET['pa']> sizeof($product)/9+1 or $_GET['pa']< 0)
        header("Location: ?p=shop&o=$ordre&c=$cat");
    else
        $page = $_GET['pa'];
}
if (isset($_POST['Prix_min'])){    
    $Prix_min= intval($_POST['Prix_min']);
    
   
}

if (isset($_POST['Prix_max']) && !empty($_POST['Prix_max'])){    
    $Prix_max= intval($_POST['Prix_max']);  
}

if($Prix_max<$Prix_min){
    $Prix_min=0;
    $Prix_max=1000;
}


$product = afficherV2($ordre, $db, $cat,$Prix_min,$Prix_max);

?>

<div class="container-grid-shop">
    <div class="filtre_gauche">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">FILTRES</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="?p=shop">Reinitialiser</a>
                <a href="?p=shop&o=prix_asc&c=<?php echo $cat; ?>&pa=0">Prix croissant</a>   <!-- pa =0 by altan-->
                <a href="?p=shop&o=prix_desc&c=<?php echo $cat; ?>&pa=0">Prix decroissant</a>
                <a href="?p=shop&o=asc&c=<?php echo $cat; ?>&pa=0">Nom croissant</a>
                <a href="?p=shop&o=desc&c=<?php echo $cat; ?>&pa=0">Nom decroissant</a>

                <div>
                    <h3>Categorie</h3>
                    <?php
                    $data = $db->prepare('select * from categorie order by name');
                    $data->execute();
                    $result = $data->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {


                    ?>

                        <div class="list-group-item checkbox">
                            <label><a href="?p=shop&o=<?php echo $ordre ?>&c=<?php echo $row['id']; ?>&pa=0"> <?php echo $row['name']; ?></a></label>
                        </div>

                    <?php
                    }
                    ?>

                </div>
                    
                <div class="Check">
                <h3>Prix</h3>
                <form action="" method="post">
                        <input type="text" placeholder="Prix min" name="Prix_min">
                        <input type="text" placeholder="Prix max" name="Prix_max">
                        <div class="container">
                          <div class="btn-filtre"> <button type="submit" class= btn>Filtrer prix</button></div>
                        </div>
                    </form>
                </div>
            </div>
    
        </div>
    </div>
    <div class="shop_droite">
        <div class="grid_column_shop">

            <?php


            $i = 0;
            $j = 9;
            $num_art = 0;
            for ($i; $i < $j and $i+intval($page)*9<sizeof($product); $i++) {
                
                echo "<div class='article' id=".$product[$i+intval($page)*9]['id'].">";
                echo "<img src= ./{$product[$i+intval($page)*9]['image']} class='img_article'><br>"; 
                echo "<div class ='product-desc'>";     
                echo  "<div class='product-name'>" . $product[$i+intval($page)*9]['nom'] . "</div>
                       <div class ='prix'>" . $product[$i+intval($page)*9]['prix'] ." </div> <span class='euros'>€ </span>"; 
                       
                echo "</div>";
                $num_art++;



                
                echo "<div class= 'div-acheter'>";
                echo "<button class='button-acheter' >Ajouter au Panier</button>";
                echo "</div>";
                echo "</div>";
            }
            $i++;
            $j++;
            ?>
        </div>



    </div>
</div>
</div>
</div>

<div class="center">
    <div class="pagination">
        <a href="?p=shop&o=<?php echo $ordre?>&c=<?php echo $cat; ?>&pa=<?php ($pageinf = $page-1); $pageinf = $pageinf%(sizeof($product)/9+1);echo $page;?>">&laquo;</a>
        <?php
        for ($i = 0; $i < ceil((sizeof($product) )/ 9 ); $i++) {
        ?>
            <a <?php if($page == $i) echo"class='active'";?> href='?p=shop&o=<?php echo $ordre?>&c=<?php echo $cat; ?>&pa=<?= $i ?>'><?= $i + 1 ?></a>
        <?php
        }
        ?>

        <a href="?p=shop&o=<?php echo $ordre?>&c=<?php echo $cat; ?>&pa=<?php ($page++); $page = $page%(sizeof($product)/9+1);echo $page;?>">&raquo;</a>
    </div>
</div>
<?php

?>
<script>
    
    function myFunction() {
        document.getElementById("myDropdown").style.display="block";
        content.classList.toogle("show");
            }

    window.onclick = function(event) {
        if (event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                
                
            }
        }
    }
$('.button-acheter').click(function(){
    var a=$(this).parent().parent();
    var image=a.children().eq(0).attr('src');
    var nom=a.children().children().eq(0).html();
    var prix=a.children().children().eq(1).html();
    console.log(prix);
    var id=a.attr("id");
    
    
   $.post("panier.php",{image:image,nom:nom,prix:prix,id:id},function(data){
    var nb_panier= parseInt($("#panier_counter").text());
    if(isNaN(nb_panier)  ){
        nb_panier=0;
    }
    $("#panier_counter").text(nb_panier+1);
   });
    
   
    
});

  

    
</script>