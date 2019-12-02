<html>
    <head>
        <link rel="stylesheet" href="../Css/Authentification.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header>
            <figure>
                <img id="../Css/logo_ldlc" src="../Css/ldlc-logo.jpg" alt="logo" width="180" height="180"/>
            </figure>
            <h1>LDLC</h1>
        </header>
        <div>
            <?php
            restore_include_path();
            include '../Commun/Database.php';
            restore_include_path();
            include '../Commun/nav.php';
            ?>


            <?php
            if (isset($_GET['produit']) && !isset($_GET['quantite'])) {
                $connection = new createConnexion();
                $connect = $connection->connect();


                $result = mysqli_prepare($connect, "SELECT * FROM Produit WHERE Reference = ?");
                $result->bind_param('s', $_GET['produit']);
                $result->execute();
                $result->bind_result($reference, $libelle, $categorie, $marque, $quantite, $prix, $description);
                $result->fetch();


                echo'<table>
    <tr>
       <th>Référence</th>
       <th>Libellé</th>
       <th>Catégorie</th>
       <th>Marque</th>
       <th>Quantité disponible</th>
       <th>Prix</th>
       <th>Quantité souhaité</th>
    </tr>
    
    <tr>
       <th>' . $reference . '</th>
       <th>' . $libelle . '</th>
       <th>' . $categorie . '</th>
       <th>' . $marque . '</th>
       <th>' . $quantite . '</th>
       <th>' . $prix . '</th>
       <th>
          <form action="Achete.php" method="get">
          <input type="number" id="btn" name="quantite" />  
          <input type="hidden" name="produit" value=' . $reference . '
        <input type="submit" value="Valider">
       </th>
       <th>
       
    </tr>';
            }

            if (isset($_GET['produit']) && isset($_GET['quantite'])) {

                $connection = new createConnexion();
                $connect = $connection->connect();

                $result = mysqli_prepare($connect, "SELECT * FROM Produit WHERE Reference = ?");
                $result->bind_param('s', $_GET['produit']);
                $result->execute();
                $result->bind_result($reference, $libelle, $categorie, $marque, $quantite, $prix, $description);
                $result->fetch();
                $result->close();

                $reste = $quantite - $_GET['quantite'];
                if ($reste > 0) {
                    if ($result = mysqli_prepare($connect, "UPDATE Produit SET Quantite = ? WHERE Reference = ?")) {
                        $result->bind_param('ss', $reste, $_GET['produit']);
                        if ($result->execute()) {
                            echo'oui!';
                        }
                    } else {
                        echo 'non!!';
                    }
                } else {
                    echo 'Quantite demande trop grande';
                }
            }
            ?>
        </div>                
        <?php
        restore_include_path();
        include '../Commun/footer.php';
        ?>
    </body>
</html>
