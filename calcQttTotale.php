<?php


function calcQttTotale(){
    $totalProduits = 0;
    
    if (isset($_GET["id"])&& isset($_SESSION["products"][$_GET["id"]])) {
        return 0;
    } 
    
    foreach($_SESSION['products'] as $index => $product ) {
         
        


            

        
       //var_dump($product["qtt"]);
        $totalProduits += $product["qtt"];
        

       //var_dump($totalProduits);
    }
    return $totalProduits;
}

