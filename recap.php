<?php
session_start();
ob_start();
include('calcQttTotale.php');

    
?>

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
                "<td><a href='traitement.php?action=supprimerProduit&id=$index'>supprimer</a></td>  ", 

              
                
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

<?php  $content= ob_get_clean() ;  
        $titre = "recap" ;
  include('template.php');
  ?>


</body>
</html>