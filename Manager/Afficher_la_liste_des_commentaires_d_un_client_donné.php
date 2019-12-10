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
        include_once '/opt/lampp/htdocs/ProjetPhp/Commun/nav.php';
            ?>
        <div>
            
            <?php if(!isset($_POST['client']) && !isset($_POST['Id_commentaire']) && !isset($_POST['reponse']) && !isset($_POST['choix'])){
                echo"<table id='Tableau'>";
                afficher_tableau_client_commentaire();
                echo"</table>";
            }
            
            else if(isset($_POST['client']) && !isset($_POST['Id_commentaire']) && !isset($_POST['reponse']) && !isset($_POST['choix'])){
                echo"<table id='Tableau'>";
                afficher_les_commentaires($_POST['client']);
                echo"</table>";
            }
            
            else if(!isset($_POST['client']) && isset($_POST['Id_commentaire']) && !isset($_POST['reponse']) && isset($_POST['choix']) && $_POST['choix'] == 0){
                supprimer_commentaire($_POST['Id_commentaire']);
            }
            
            else if(!isset($_POST['client']) && isset($_POST['Id_commentaire']) && !isset($_POST['reponse']) && isset($_POST['choix']) && $_POST['choix'] == 1){
                repondre_commentaire();
            }
            
            else if(!isset($_POST['client']) && isset($_POST['Id_commentaire']) && isset($_POST['reponse']) && !isset($_POST['choix'])){
                envoyer_commentaire();
            }
          
                ?>

        </div>
        <?php
        restore_include_path();
        include '../Commun/footer.php';
        ?>
    </body>

</html>
