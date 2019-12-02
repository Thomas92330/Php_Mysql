<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="../Communn/authentification.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include '../Commun/nav.php'; 
              include '../Commun/Database.php'?>
        <table>
    <tr>
       <th>'Référence.'</th>
       <th>'Libellé.'</th>
       <th>'Catégorie.'</th>
       <th>'Marque.'</th>
       <th>'Quantité.'</th>
       <th>'Prix.'</th>
       <th>'Description.'</th>
    </tr>
    
    <?php   
    $connection = new createConnexion();
    $connect = $connection->connect();
    $result = mysqli_query($connect,"SELECT * FROM Produit");
    while ($res = mysqli_fetch_assoc($result))
    {
        if($res['Quantite']==0){
    echo'<tr>';
       echo'<th>'.$res['Reference'].'</th>';
       echo'<th>'.$res['Libelle'].'</th>';
       echo'<th>'.$res['Categorie'].'</th>';
       echo'<th>'.$res['Marque'].'</th>';
       echo'<th>'.$res['Quantite'].'</th>';
       echo'<th>'.$res['Prix'].'</th>';
       echo'<th>'.$res['Description'].'</th>';
       echo'<th>'
                    . '<form action="Modifier_un_produit.php" method="get">'
                    . '<input type="radio" id="btn" name="reference" value =' . $res["Reference"] . '/> <label for="btn">Modifier</label>      
        <input type="submit" value="Valider">'
                    . '</form>'
                    . '</th>';
                    
    } 
    }
        ?>
    </body>
</html>
