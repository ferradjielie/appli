<?php
session_start();
include('calcQttTotale.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-link" href="index.php">index</a>
    <?php
    if (!isset($_SESSION ['products']) || empty($_SESSION ['products'])) {
        //var_dump($_SESSION ['products']);
        echo  "<p> Aucun produit en session ... </p>";
    }
    else {
        echo "<div class='container'>",
        
        "<table class='table table-striped table-bordered  > ",
            "<thead>",
                "<tr class='table-dark'>",
                    "<th> # </th>",
                    "<th> Nom </th>",
                    "<th> Prix</th>",
                    "<th> Quantité</th>",
                    "<th> Total</th>",
                    "<th> Action</th>",
                "</tr>",
            "</thead>",
        "<tbody>";
        
        $totalGeneral = 0;
        $totalProduits = 0;
        
        foreach($_SESSION['products'] as $index => $product ) {
            $totalQtt = $totalProduits + $product["qtt"];
            $total = $product["price"]*$product["qtt"]  ;          
                   echo "<tr>",
                    "<td>".$index. "</td>",
                    "<td>".$product ['name']. "</td>",
                    "<td>".number_format($product ['price'], 2, ",", "&nbsp;"). "</td>",
                    "<td>"  ."<a href='traitement.php?action=baisserQuantite&id=$index' > - </a>  "
                        .$product    ['qtt'].    "<a href='traitement.php?action=augmenterQuantite&id=$index' > + </a>  ".
                    "</td>",
                    "<td>".number_format($total, 2, ",","&nbsp;"). "</td>",
                "<td><a href='traitement.php?action=supprimerProduit&id=$index'>supprimer</a></td>  ". $_SESSION['message'] =  "Le produit   a été supprimer du panier";

              
                
                "</tr>";
            $totalGeneral += $total;
            $totalProduits += $product["qtt"];
            

        }
        
        echo "<tr>",
        "<td colspan=4 Total général : </td>",
        "<td> <strong>".number_format ($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong> </td>",
        "<td> <strong>".number_format ($totalQtt, 0, ",", "&nbsp;")."&nbsp;</strong> </td>",
        "</tr>";
        echo "</tbody>",
                 "</table>
                 
        <a href='traitement.php?action=viderPanier'>Vider le panier</a>         
        </div>";
    }
    
    
          
     ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>