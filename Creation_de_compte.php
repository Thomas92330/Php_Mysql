<html>
    <head>
        <link rel="stylesheet" href="Css/Authentification.css">
        <meta charset="UTF-8">
        <title></title>
        <figure>
                <img id="logo_ldlc" src="Css/ldlc-logo.jpg" alt="logo" width="180" height="180"/>
            </figure>
            <h1>LDLC</h1>
    </head>
    <body>
        <div>
        <?php
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/Database.php';
        if( (!isset($_POST['id'])) && (!isset($_POST['telephone'])) && (!isset($_POST['adress']))){
            echo '
                    <form action="Authentification.php" method="post">
            <p>
                Name : <input type="text" name="nom" required> <br>
                Prenom : <input type="text" name="prenom" required> <br>
                Age : <input type="number" name="age" required> <br>
                Telephone : <input type="number" name="telephone" value="8 chiffres commence par 0" required> <br>
                Adress : <input type="text" name="adress" value="Code postal, Rue ,Ville" required> <br>
                Sexe : <input type="radio" id="homme" name="sexe" value="homme"  /> <label for="homme">Homme</label>
                       <input type="radio" id="femme" name="sexe" value ="femme"/>  <label for="femme">Femme</label>
                       <br>
                Date de naissance : <input type="date" name="date_de_naissance"> <br>
                Familiale : <input type="radio" id="marie" name="familiale" value="marie"/> <label for="marie">Marié</label>
                            <input type="radio" id="celib" name="familiale" value ="celibataire"/> <label for="celib">Celibataire</label>
                            <br>
                Mail : <input type="password" name="id" required> <br>
                Mot de passe : <input type="password" name="mot_de_passe" required> <br>
                Verification mot de passe : <input type="password" name="mot_de_passe_verif" required> <br>
                <input type="hidden" name="nouveau" value=1 >
                
                <input type="submit" value="Valider">
            </p>
                ';
            }
            
            elseif(verif_nouveau($_POST['nom'], $_POST['prenom'], $_POST['id'], $_POST['telephone'], $_POST['adress'], $_POST['mot_de_passe'], $_POST['mot_de_passe_verif'])){
            {
                if(!isset($_POST['familiale'])){ 
                    $familiale = "NA";
                }
                else{
                    $familiale = $_POST['familiale'];
                }
                
                if(!isset($_POST['date_de_naissance'])){ 
                    $date = "0000-00-00";
                }
                else{
                    $date = $_POST['date_de_naissance'];
                }
                
                if(!isset($_POST['sexe'])){ 
                    $sexe = "NA";
                }
                else{
                    $sexe = $_POST['sexe'];
                }
                
                ajoutez_utilisateur($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['id'], $_POST['telephone'], $_POST['adress'], $_POST['mot_de_passe'], 1 ,$sexe,$date,$familialefamiliale);
            }
            }
        ?>
        </div>
        <?php include 'Commun/footer.php'; ?>
    </body>
</html>
