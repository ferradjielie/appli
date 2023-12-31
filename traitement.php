<?php

include('index.php');

// Les superglobales PHP
// 
// $_GET = Liée à la méthode HTTP GET, contient tous les paramètres ayant été transmis au serveur par l'intermédiaire de l'URL de la requête (Query String Parameters).
//
//  $_POST = Liée à la méthode HTTP POST, contient toutes les données transmises au serveur par l'intermédiaire d'un formulaire (Form Data ou Request Body Parameters).
//
//  $_COOKIE = Contient les données stockées dans les cookies du navigateur client.
//
//   $_REQUEST = Regroupe les données transmises par les trois superglobales $_GET, $_POST et $_COOKIE.
//
//
//   $_SESSION = Contient les données stockées dans la session utilisateur côté serveur (si cette session a été démarrée au préalable).
//
//    $_FILES = Contient les informations associées à des fichiers uploadés par le client.

//
//rgkuuk
//
//
//
//
//
//
//
//
//
//

session_start();

switch($_GET["action"]) {

    case "ajouterProduit":
        //  var_dump($_SESSION);die;
        if (isset($_POST ['submit'])) {
            $name = filter_input ( INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS) ;
            $price = filter_input (INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $qtt = filter_input (INPUT_POST , "qtt", FILTER_VALIDATE_INT);
            
            if ($name && $price && $qtt) {

                $product = [

                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price*$qtt
                ];
                $_SESSION['products'] [] = $product;
                $_SESSION['message'] =  "Le produit ". $name . " a été ajouté au panier";
               
                
                
             
            }
            else  $_SESSION['message'] = "Le produit". $name. " n'a pas été ajouté";

        }
      

        header ("Location:index.php");
        break;

    case "viderPanier" :
        unset($_SESSION["products"]);
        $_SESSION['message'] =  "Le panier est vide";

        //$_SESSION['message'] =  "Le panier a été supprimé";
        header ("Location:recap.php");
        break;

    case "supprimerProduit" :
        if (isset($_GET["id"])&& isset($_SESSION["products"][$_GET["id"]])) {
            $deletedProd = $_SESSION ["products"] [$_GET ["id"]];
            // supprime le produit de la session
            unset($_SESSION["products"][$_GET["id"]]);
            $_SESSION['message'] =  "Le produit ". $name . " a été supprimer du panier";
            header("Location: recap.php");
            die();
        }
        else $_SESSION["message"]= "Action impossible";

    break;

    case "augmenterQuantite" :
        if (isset($_GET["id"])&& isset($_SESSION["products"][$_GET["id"]])) {
           // $deletedProd = $_SESSION ["products"] [$_GET ["id"]];
           
            $_SESSION["products"][$_GET["id"]] ["qtt"]++;
           

            
            header("Location: recap.php");
            die();
        }
        

    break;
    
    case "baisserQuantite" :
        if (isset($_GET["id"])&& isset($_SESSION["products"][$_GET["id"]])) {
            // $deletedProd = $_SESSION ["products"] [$_GET ["id"]];
            
             $_SESSION["products"][$_GET["id"]] ["qtt"]--;
            
 
             
             header("Location: recap.php");
             die();
         }

    break;
}



//$_SESSION['message'] =  Le produit . $name . " a été supprimer du panier