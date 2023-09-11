<?php
session_start();
ob_start();

include('calcQttTotale.php');


$totalQtt = calcQttTotale();





?>


</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
   
    <a class="navbar-link" href="recap.php">recap (<?= $totalQtt  ?>)</a>
   
  </div>
</nav>
    <h1>Ajouter un produit </h1>
    <?php
    


            ?>
    <form action="traitement.php?action=ajouterProduit" method="POST">
        
        
        <p>
            <label> 
                Nom du produit:
                <input type="text" name="name"  >
            </label>
        </p>

        <p>
            <label> 
                Prix du produit :
                <input type="number" name="price"  >
            </label>
        </p>


        <p>
            <label> 
                Quantité désirée :
                <input type="number" name="qtt" value="1"  >
            </label>
        </p>

        <p>
       

        <p>
        <input type="submit" name="submit" value="Ajouter le produit"  >
        </p>
     
    
    </form>
    
   
  <?php  $content= ob_get_clean() ;  
          $titre = "index" ;
         include('template.php');
  ?>

   


    
  
    
      
</body>
</html></body>
</html>