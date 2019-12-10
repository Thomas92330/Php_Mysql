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
        <title></title>
    </head>
    <body>
        <?php 
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/Database.php';
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/nav.php';

        if (isset($_POST['checker'])) {
            ajoutez_un_produit($_POST['libelle'], $_POST['categorie'], $_POST['$marque'], $_POST['quantite'], $_POST['prix'], $_POST['description']);
        }
        else{
            ajouter_produit_formulaire();
        }

           
        ?>
    </body>
    
</html>
