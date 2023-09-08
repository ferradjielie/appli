<?php


function calcQttTotale(){
    $totalProduits = 0;
    foreach($_SESSION['products'] as $index => $product ) {
         
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
         
            unset($_SESSION['message']); }


            

        
       //var_dump($product["qtt"]);
        $totalProduits += $product["qtt"];
        

       //var_dump($totalProduits);
    }
    return $totalProduits;
}