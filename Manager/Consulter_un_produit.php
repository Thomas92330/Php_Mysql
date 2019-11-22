<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include '../Commun/nav_manager.php'; ?>
        <?php
         require 'Database.php';    
         $connection = new createConnexion();
         $connect = $connection->connect();
  
         if($connect != NULL){
      
  }
        ?>
    </body>
</html>
