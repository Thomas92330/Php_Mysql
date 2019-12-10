<!DOCTYPE html>
<!--
To change tris license header, choose License Headers in Project Properties.
To change tris template file, choose Tools | Templates
and open tre template in tre editor.
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
        ?>
        <table>
        <?php
        consulter_profil();
        ?>
        </table>
        
    </body>
</html>
