<?php
session_start();
print_r($_SESSION);
function Totalprix($id){
    $somme=0;
    foreach($id as $key=> $value){
        $somme+=intval($value['prix']);
    }
    return $somme;
}

$Total=Totalprix($_SESSION['panier']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div class="total-checkout">
<div class="total">
           <h3> Produit</h3>   <h3><?php echo $Total?> €</h3>
           <h3>Livraison</h3>  <h3>10 €</h3>
            
            
    </div>
    <hr >
    <div class="total">
    <h2>Total: </h2>  <h2><?php echo $Total+10?> €</h2>
</div>
</div>