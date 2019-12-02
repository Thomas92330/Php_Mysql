<html>
    <head>
        <link rel="stylesheet" href="../Css/Authentification.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <header>
            <figure>
                <img id="logo_ldlc" src="../Css/ldlc-logo.jpg" alt="logo" width="180" height="180"/>
            </figure>
            <h1>LDLC</h1>
        </header>
        
            <?php
            restore_include_path();
            include '../Commun/Database.php';
            restore_include_path();
            include '../Commun/nav.php';
            ?>
            
            <?php if(!isset($_GET['client'])){
            echo'<table>';
                echo'<tr>';
                    echo'<th>Nom</th>';
                    echo'<th>Prenom</th>';
                    echo'<th>Id</th>';
                    echo'<th>Consulter</th>';
                echo'</tr>';

                
                $connection = new createConnexion();
                $connect = $connection->connect();
                $result = mysqli_query($connect, "SELECT * FROM Utilisateur WHERE Client = 1");
                while ($res = mysqli_fetch_assoc($result)) {
                    echo'<tr>';
                    echo'<th>' . $res['Nom'] . '</th>';
                    echo'<th>' . $res['Prenom'] . '</th>';
                    echo'<th>' . $res['Id'] . '</th>';
   
                    echo'<th>'
                    . '<form action="Afficher_la_liste_des_commentaires_d_un_client_donné.php" method="get">'
                    . '<input type="radio" id="btn" name="client" value =' . $res["Id"] . '/> <label for="btn">Consulter</label>      
        <input type="submit" value="Valider">'
                    . '</form>'.'</th>';
        
                    echo'</tr>';
                }
            }
            
            else {
                afficher_les_commentaires($_GET['client']);
            }
                ?>
            </table>
        </div>
        <?php
        restore_include_path();
        include '../Commun/footer.php';
        ?>
    </body>

</html>
