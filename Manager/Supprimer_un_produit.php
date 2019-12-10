<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="../Commun/authentification.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/Database.php';
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/nav.php';
        if (isset($_GET['reference'])) {
            if (!isset($_GET['choix'])) {
                supprimer_produit_formulaire();
            }
        else {
                supprimer_produit($_GET['reference']);    
        }
    }
    ?>

</body>
</html>
