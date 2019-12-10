<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="../Css/Authentification.css">
        <meta charset="UTF-8">
        <title>Ajouter_un_commentaire</title>
    </head>
    <body>
        <?php
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/Database.php';
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/nav.php';
        ?>
        <?php
        if (isset($_GET['produit']) && isset($_GET['commentaire']) ) {
            
                ajoutez_commentaire($_COOKIE['id'], $_GET['produit'], $_GET['commentaire']);
        }
            
        else if(isset($_GET['produit'])){
                formulaire_commentaire();
        }
        ?>
    </body>
</html>
