<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="Authentification.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header>
            <figure>
                <img id="logo_ldlc" src="ldlc-logo.jpg" alt="logo" width="180" height="180"/>
            </figure>
            <h1>LDLC</h1>
       </header>
        <div>
        <?php 
        include '../Commun/Database.php';    
        include '../Commun/nav_client.php';         
        ?>
        
        <table>
    <tr>
       <th>'Référence'</th>
       <th>'Libellé'</th>
       <th>'Catégorie'</th>
       <th>'Marque'</th>
       <th>'Quantité'</th>
       <th>'Prix'</th>
       <th>'Description'</th>
       <th>'Commander'</th>
       <th>'Commenter'</th>
    </tr>
    
    <?php   
    $connection = new createConnexion();
    $connect = $connection->connect();
    $result = mysqli_query($connect,"SELECT * FROM Produit");
    while ($res = mysqli_fetch_assoc($result))
    {
    echo'<tr>';
       echo'<th>'.$res['Reference'].'</th>';
       echo'<th>'.$res['Libelle'].'</th>';
       echo'<th>'.$res['Categorie'].'</th>';
       echo'<th>'.$res['Marque'].'</th>';
       echo'<th>'.$res['Quantite'].'</th>';
       echo'<th>'.$res['Prix'].'</th>';
       echo'<th>'.$res['Description'].'</th>';
       echo'<th>'
       . '<form action="Passer_une_commande.php" method="get">'
       . '<input type="radio" id="btn" name="produit" value ='.$res["Reference"].'/> <label for="btn">Acheter</label>      
        <input type="submit" value="Valider">'
       . '</th>';
       echo'<th>'
       . '<form action="Ajouter_un_commentaire.php" method="get">'
       . '<input type="radio" id="btn" name="Commentaire" value ='.$res["Reference"].'/> <label for="btn">Commenter</label>      
        <input type="submit" value="Valider">'
       . '</th>';
    echo'</tr>';
    } 
?>
        </table>
        </div>
        <?php include 'Commun/footer.php'; ?>
    </body>
</html>
