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
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/nav.php';
        ?>
        <table>
        <?php 
        if(!isset($_GET['choix'])){
            modifier_info_formulaire();
        }
        else{
            modifier_info_util(); 
        }
        ?>
        </table>
    </body>
</html>
        
      
