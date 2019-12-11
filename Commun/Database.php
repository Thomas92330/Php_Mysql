
<style>
            #Tableau {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #Tableau td, #Tableau th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #Tableau tr:nth-child(even){background-color: #739DDE;}

            #Tableau th:hover {background-color: grey ;}

            #Tableau tr {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4E6890;
                color: white;
            }
</style>


<?php

class createConnexion {

    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $db = 'gestion_personne';
    var $myconn;

    function connect() {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db, 3307);
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
        }
        return $this->myconn;
    }

    function close() {
        mysqli_close($this->myconn);
    }

}
?> 

    <!-- ____________________ Fonction Manager ____________________ -->

    <!--                    Fonction Commentaire                    -->

<?php function ajoutez_commentaire($id, $reference, $commentaire) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_prepare($connect, "INSERT INTO Commentaire (Id,Reference,Commentaires)VALUES (?,?,?)");
    $req->bind_param('sss', $id, $reference, $commentaire
    );
    $req->execute();
}
?> 

<?php function afficher_les_commentaires($id) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    if ($connect) {
        list($id, $_) = explode('/', $id); //necessaire car $id contient un '/' sorti de nul part

        $query = "SELECT * FROM Commentaire WHERE Id = '$id'";

        $req = mysqli_query($connect, $query);
        ?>
        <?php
        while ($resultat = $req->fetch_assoc()) {?>
  
    <tr>
             <th> <?php echo $resultat['Commentaires'] ?>  </th>
             <th>
                <form action="Afficher_la_liste_des_commentaires_d_un_client_donné.php" method="post">
                    <input type="hidden" name="Id_commentaire" value =<?php echo $resultat["Id_commentaire"]?>/>      
                    <input type="hidden" name="choix" value = 0 />      
                    
                    <input type="submit" value="Supprimer">
                </form>  </th>
             <th>
                <form action="Afficher_la_liste_des_commentaires_d_un_client_donné.php" method="post">
                    <input type="hidden" name="Id_commentaire" value =<?php echo $resultat["Id_commentaire"]?>/>      
                    <input type="hidden" name="choix" value = 1 />  
                    
                    <input type="submit" value="Modifier">
                </form>  </th>
             </tr>
             <?php
        }
    }
}
?> 

<?php function afficher_tableau_client_commentaire() { ?>
    <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Id</th>
            <th>Consulter</th>
    </tr>
  
    <?php
    $connection = new createConnexion();
    $connect = $connection->connect();
    $result = mysqli_query($connect, "SELECT * FROM Utilisateur WHERE Client = 1");
    while ($res = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <th> <?php echo $res['Nom'] ?>  </th>
            <th> <?php echo $res['Prenom'] ?>  </th>
            <th> <?php echo $res['Id'] ?>  </th>

            <th>
                <form action="Afficher_la_liste_des_commentaires_d_un_client_donné.php" method="post">
                    <input type="radio" id="btn" name="client" value =<?php echo $res["Id"] ?>/> <label for="btn">Consulter</label>      
                    <input type="submit" value="Valider">
                </form>  </th>
        </tr>
        <?php
    }
}
?> 

<?php function repondre_commentaire(){ ?>
    <form action="Afficher_la_liste_des_commentaires_d_un_client_donné.php" method="post">
        <p>
            <input type="text" name="reponse">
            <input type="hidden" name="Id_commentaire" value =<?php echo $_POST['Id_commentaire']?>
            <input type="submit" value="Valider">
        </p>
    </form>
<?php
}
?>
        
<?php function envoyer_commentaire(){
    $connection = new createConnexion();
    $connect = $connection->connect();
    list($id) = explode ('/',$_POST['Id_commentaire']);
    $query1 = "SELECT  Commentaires FROM Commentaire WHERE Id_commentaire = '".$_POST['Id_commentaire']."' ";
    $result1 = mysqli_query($connect,$query1);
    $fetch = mysqli_fetch_assoc($result1);
    $query2 = "UPDATE  Commentaire SET Commentaires = '".$fetch['Commentaires']." Reponse : ".$_POST['reponse']."' WHERE Id_commentaire = '".$id."' ";
    var_dump($query2); 
    $result2 = mysqli_query($connect,$query2 );
    
}
?>
        
<?php function supprimer_commentaire($id){
    $connection = new createConnexion();
    $connect = $connection->connect();
    list($id) = explode ('/',$id);
    $query = "DELETE FROM Commentaire WHERE Id_commentaire = '".$id."'";
    var_dump($query);
    $result = mysqli_query($connect,$query );
    if($result){echo "OUI!!!!!!!";}
    else{echo "NON!!!";}
}
?>
    <!--                    Fonction Ajoutez un produit             -->

<?php function ajoutez_un_produit($libelle, $categorie, $marque, $quantite, $prix, $description) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_prepare($connect, "INSERT INTO Produit (Libelle, Categorie, Marque, Quantite, Prix, Description) VALUES (?,?,?,?,?,?)");
    $req->bind_param('ssssss', $libelle, $categorie, $marque, $quantite, $prix, $description
    );
    $req->execute();
}
?> 

<?php function ajouter_produit_formulaire() {
    ?>
    <form action="Ajouter_un_produit.php" method="post">
        <p>
            <input type="text" name="libelle">

            <select name="categorie" size="1">
                <option selected value="Pc">Pc</option>
                <option value="Imprimante">Imprimante</option>
                <option value="Scanner">Scanner</option>

            </select>

            <select name="marque" size="1">
                <option selected value="Hp">Hp</option>
                <option value="Canon">Canon</option>
                <option value="Epson">Epson</option>
                <option value="Samsung">Samsung/option>
            </select>

            <input type="number" name="quantite">

            <input type="number" name="prix">

            <input type="text" name="description">

            <input type="hidden" name="checker" value=1>

            <input type="submit" value="Valider">
        </p>
    </form>
    <?php
}
?> 
    <!--                    Fonction Consulter un produit           -->
        
<?php function consulter_produit() {
    ?>
        <table id="Tableau">
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
    $result = mysqli_query($connect, "SELECT * FROM Produit");
    while ($res = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <th> <?php echo $res['Reference'] ?>  </th>
                    <th> <?php echo $res['Libelle'] ?>  </th>
                    <th> <?php echo $res['Categorie'] ?>  </th>
                    <th> <?php echo $res['Marque'] ?>  </th>
                    <th> <?php echo $res['Quantite'] ?>  </th>
                    <th> <?php echo $res['Prix'] ?>  </th>
                    <th> <?php echo $res['Description'] ?>  </th>
                    <th>
                        <form action="Modifier_un_produit.php" method="get">
                            <input type="hidden" id="btn" name="reference" value =<?php echo $res["Reference"] ?> /> <label for="btn">Modifier</label>      
                            <input type="submit" value="Valider">
                        </form>
                    </th>

            <?php if ($res['Quantite'] == 0) { ?>
                        <th>
                            <form action="Supprimer_un_produit.php" method="get">
                                <input type="hidden" id="btn" name="reference" value = <?php echo $res["Reference"] ?>  /> <label for="btn">Modifier</label>      
                                <input type="submit" value="Valider">
                            </form>
                        </th>
            <?php } else { ?>
                        <th>
                            Quantite trop grande
                        </th>
                    </tr>
                </table>
                <?php
            }
        }
    }
?> 
        
    <!--                    Fonction Modifier un produit            -->
    
<?php function modifier_produit($valeure, $set, $reference) {
        $connection = new createConnexion();
        $connect = $connection->connect();
        if ($connect) {
            $req = mysqli_prepare($connect, "UPDATE Produit SET ? = ? WHERE Reference = ?");
            $req->bind_param('sss', $set, $valeure, $reference
            );
            $req->execute();
            if ($req == false) {
                echo 'Echec modification <br/>';
            } else {
                echo 'Modification réussi <br/>';
            }
        }
    }
?> 
    
<?php function modifier_produit_formulaire() { ?>
    <table id="Tableau">
        <th>
        <tr>'Libelle'</tr>
        <tr>'Description'</tr>
        <tr>'Prix'</tr>
        </th>

        <th>
        <tr>
        <form action="Modifier_un_produit.php" method="get">'
            <input type="hidden" name="choix" value ="Libelle"/>
            <input type="text" id="btn" name="valeure" /> 
                <input type="hidden" name="reference" value=<?php echo $_GET['reference'] ?>/>
                <input type="submit" value="Valider">
                </tr>
                <tr>

                <tr>
                <form action="Modifier_un_produit.php" method="get">'
                    <input type="hidden" name="choix" value ="Description"/> 
                    <input type="text" id="btn" name="valeure" /> 
                        <input type="hidden" name="reference" value=<?php echo $_GET['reference'] ?>/>
                        <input type="submit" value="Valider">
                        </tr>

                        <tr>
                        <form action="Modifier_un_produit.php" method="get">'
                            <input type="hidden" name="choix" value ="Prix"/> 
                            <input type="number" id="btn" name="valeure" />
                                <input type="hidden" name="reference" value=<?php echo $_GET['reference'] ?>/>
                                <input type="submit" value="Valider">
                                </tr>
                                <tr>
                                    </th>
                                    </table>
                                <?php
}
?>
 
 <?php function modifier_produit_util(){ 
                                    if (isset($_GET['choix'])) {
                                        if ($_GET['choix'] == 'Libelle' && isset($_GET['valeure'])) {
                                            modifier_produit($_GET['valeure'], 'Libelle', $_GET['reference']);
                                        }
                                        if ($_GET['choix'] == 'Prix' && isset($_GET['valeure'])) {
                                            modifier_produit($_GET['valeure'], 'Prix', $_GET['reference']);
                                        }

                                        if ($_GET['choix'] == 'Description' && isset($_GET['valeure'])) {
                                            modifier_produit($_GET['valeure'], 'Description', $_GET['reference']);
                                        }
                                    }
 }
 ?>

    <!--                    Fonction Supprimer un produit           -->
    
<?php function supprimer_produit_formulaire() { ?>
        <p> Etes vous sure ?
        <form action="Supprimer_un_produit.php" method="get">
            <input type="radio" id="btn" name="choix" value = 'Oui'/> <label for="btn">Oui</label>
            <input type="radio" id="btn" name="choix" value = 'Non'/> <label for="btn">Non</label>  
            <input type="hidden" id="btn" name="reference" value = <?php $_GET['reference'] ?>/> 
            <input type="submit" value="Valider">
        </form>
    </p>
<?php } 
?>
    
<?php function supprimer_produit($reference){
$connection = new createConnexion();
    $connect = $connection->connect();
    if ($connect) {
            $req = mysqli_prepare($connect, "DELETE FROM Commentaires WHERE Id_commentaire = ?");
            $req->bind_param('s', $reference);
            $req->execute();
        }
    }
?>

    
    <!-- ____________________ Fonction Utilisateur ________________ -->
    
    <!--                    Fonction Ajoute un utilisateur          -->
    
<?php function verif_nouveau($nom, $prenom, $id, $tel, $adresse, $mdp, $mdp_verif) {
    if (!verif_nom($nom)) {
        return false;
    }
    if (!verif_prenom($prenom)) {
        return false;
    }
    if (!verif_adresse($adresse)) {
        return false;
    }
    if (!verif_tel($tel)) {
        return false;
    }
    if (!verif_id($id, $nom, $prenom)) {
        return false;
    }

    if (strlen($mdp) <= 8) {
        echo'Le mot de passe doit faire au moins 8 charactères ! <br/>';
        return false;
    }
    if (!preg_match("/[A-Z]/", substr($mdp, 0, 1))) {
        echo'Le mot de passe doit commencer par une majuscule ! <br/>';
        return false;
    }
    if (!preg_match("/[a-z]/", substr($mdp, strlen($mdp) - 1, 1))) {
        echo'Le mot de passe doit finir par une minuscule ! <br/>';
        return false;
    }

    return true;
}
?> 

<?php function ajoutez_utilisateur($nom, $prenom, $age, $id, $tel, $adresse, $mdp, $client) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_prepare($connect, "INSERT INTO Utilisateur (Nom,Prenom,Age,Id,Mot_de_passe,Adresse,Telephone,Client)VALUES (?,?,?,?,?,?,?,?)");
    $req->bind_param('ssssssss', $nom, $prenom, $age, $id, $mdp, $adresse, $tel, $client
    );
    $req->execute();
}
?>
    
    <!--                    Fonction Achete                         -->
    
<?php function tableau_quantite_achete(){
    $connection = new createConnexion();
    $connect = $connection->connect();

    $result = mysqli_prepare($connect, "SELECT * FROM Produit WHERE Reference = ?");
    $result->bind_param('s', $_GET['produit']);
    $result->execute();
    $result->bind_result($reference, $libelle, $categorie, $marque, $quantite, $prix, $description);
    $result->fetch();
    ?> <table id="Tableau">
    <tr>
        <th>Référence</th>
        <th>Libellé</th>
        <th>Catégorie</th>
        <th>Marque</th>
        <th>Quantité disponible</th>
        <th>Prix</th>
        <th>Quantité souhaitée</th>
    </tr>

    <tr>
        <th><?php echo $reference ?> </th> 
        <th><?php echo $libelle ?> </th> 
        <th><?php echo $categorie ?> </th> 
        <th><?php echo $marque ?> </th> 
        <th><?php echo $quantite ?> </th> 
        <th><?php echo $prix ?> </th> 
        <th> 
           <form action="Achete.php" method="get">
           <input type="number" id="btn" name="quantite" required/>  
           <input type="hidden" name="produit" value=<?php echo $reference ?>
           <input type="submit" value="Valider">
        </th>
        <th>

     </tr>
     </table>
 <?php }
?>
   
<?php function achete(){
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
            $result->execute();
        }
    } else {
        echo 'La quantité demandée est trop grande !';
    }
}
?>
    
    <!--                    Fonction Commentaire                    -->
    
<?php function formulaire_commentaire(){ ?>
    <form action="Ajouter_un_commentaire.php" method="get">
            <p>
                <label for="commentaire">Commentaire</label>
                <input type="text" name="commentaire" required>
                <input type="hidden" name="produit" value=$_GET['produit']>
                
                <input type="submit" value="Valider">
            </p>
<?php
}
?>
    
    <!--                    Fonction Consulter profil               -->
    
<?php function consulter_profil(){
    ?>
    <table id="Tableau">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Age</th>
        <th>Id</th>
        <th>Telephone</th>
        <th>Adresse</th>
        <th>Genre</th>
        <th>Date de naissance</th>
        <th>Situation familiale</th>
        <th>Modifier</th> 
    </tr>

    <?php
    $connection = new createConnexion();
    $connect = $connection->connect();
    $query = "SELECT * FROM Utilisateur WHERE Id = '" . $_COOKIE['id'] . "'";
    $result = mysqli_query($connect, $query);

    $res = mysqli_fetch_assoc($result);

        ?>
    <tr>
        <th> <?php echo $res['Nom'] ?> </th>
        <th> <?php echo $res['Prenom'] ?> </th>
        <th> <?php echo $res['Age'] ?> </th>
        <th> <?php echo $res['Id'] ?> </th>
        <th> <?php echo $res['Telephone'] ?> </th>
        <th> <?php echo $res['Adresse'] ?> </th>
        <th> <?php echo $res['Sexe'] ?> </th>
        <th> <?php echo $res['Date_de_naissance'] ?> </th>
        <th> <?php echo $res['Familiale'] ?> </th>
        <th>
        <a href="Modifier_ses_informations.php"> Modifier </a>
        </th>
    </tr>
    </table>
    <?php

    }
?>
    
    <!--                    Fonction Modifier profil                -->
    
<?php function modifier_info_formulaire(){?>
    <table id="Tableau">
        <tr>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Age </th>
            <th> Telephone </th>
            <th> Adresse </th>
            <th> Genre </th>
            <th> Date de naissance </th>
            <th> Situation familiale </th>
        </tr>

        <tr>
        <th>
        <form action="Modifier_ses_informations.php" method="get">'
            <input type="hidden"  name="choix" value ="Nom"/> 
            <input type="text" name="valeure" /> 
            <input type="submit" value="Valider">
            </th>
            <th>
            <form action="Modifier_ses_informations.php" method="get">'
                <input type="hidden" name="choix" value ="Prenom"/> 
                <input type="text" id="btn" name="valeure" /> 
                <input type="submit" value="Valider">
                </th>
                <th>
                <form action="Modifier_ses_informations.php" method="get">'
                    <input type="hidden" name="choix" value ="Age"/> 
                    <input type="text" id="btn" name="valeure" /> 
                    <input type="submit" value="Valider">
                    </th>

                    <th>
                    <form action="Modifier_ses_informations.php" method="get">'
                        <input type="hidden" name="choix" value ="Telephone"/> 
                        <input type="number" id="btn" name="valeure" /> 
                        <input type="submit" value="Valider">
                        </th>

                        <th>
                        <form action="Modifier_ses_informations.php" method="get">'
                            <input type="hidden" name="choix" value ="Adresse"/> 
                            <input type="text" name="valeure" /> 
                            <input type="submit" value="Valider">
                            </th>

                            <th>
                            <form action="Modifier_ses_informations.php" method="get">'
                                <input type="hidden" name="choix" value ="Sexe"/>
                                <input type="text" name="valeure" /> 
                                <input type="submit" value="Valider">
                                </th>

                                <th>
                                <form action="Modifier_ses_informations.php" method="get">'
                                    <input type="hidden" id="btn" name="choix" value ="Date_de_naissance"/>
                                    <input type="date" name="valeure" /> 
                                    <input type="submit" value="Valider">
                                    </th>

                                    <th>
                                    <form action="Modifier_ses_informations.php" method="get">'
                                        <input type="hidden" name="choix" value ="Familiale"/> 
                                        <input type="text" name="valeure" />
                                        <input type="submit" value="Valider">
                                        </th>
                                        </tr>
                                        
                                        </table>
<?php
}
?>
                                        
<?php function modifier_info_util(){
    if ($_GET['choix'] == 'Nom' && isset($_GET['valeure'])) {
        modifier_info($_GET['valeure'], 'Nom');
    }

    if ($_GET['choix'] == 'Prenom' && isset($_GET['valeure'])) {
        modifier_info($_GET['valeure'], 'Prenom');
    }

    if ($_GET['choix'] == 'Age' && isset($_GET['valeure'])) {
        modifier_info($_GET['valeure'], 'Age');
    }

    if ($_GET['choix'] == 'Adresse' && isset($_GET['valeure'])) {
        modifier_info($_GET['valeure'], 'Adresse');
    }

    if ($_GET['choix'] == 'Telephone' && isset($_GET['valeure'])) {
        modifier_info($_GET['valeure'], 'Telephone');
    }

    if ($_GET['choix'] == 'Sexe' && isset($_GET['valeure'])) {
        modifier_info($_GET['valeure'], 'Sexe');
    }

    if ($_GET['choix'] == 'Familiale' && isset($_GET['valeure'])) {
        modifier_info($_GET['valeure'], 'Familiale');
    }
}
?>

<?php function modifier_info($valeure, $set) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    if ($connect) {
        $req = mysqli_prepare($connect, "UPDATE Utilisateur SET ? = ? WHERE Id = ?");
        $req->bind_param('ss', $set, $valeure, $_COOKIE['Id']
        );
        $req->execute();
    }
}
?> 
    
    <!--                    Fonction Passer commande                -->
    
<?php function passer_commande_selection(){
    $connection = new createConnexion();
    $connect = $connection->connect();
    $result = mysqli_query($connect, "SELECT * FROM Produit");
    ?>  <?php
    while ($res = mysqli_fetch_assoc($result)) {
        ?>  
   
    <tr>
                    <th> <?php echo $res['Reference'] ?> </th>
                    <th> <?php echo $res['Libelle'] ?> </th>
                    <th> <?php echo $res['Categorie'] ?> </th>
                    <th> <?php echo $res['Marque'] ?> </th>
                    <th> <?php echo $res['Quantite'] ?> </th>
                    <th> <?php echo $res['Prix'] ?> </th>
                    <th> <?php echo $res['Description'] ?> </th>
                    <th>
                   
                     <form action="Achete.php" method="get">
                     <input type="hidden" id="btn_achat" name="produit" value =<?php echo $res["Reference"] ?> /> <label for="btn_achat">Acheter</label>      
                     <input type="submit" value="Valider">
                     </form>
                     </th>
                    <th>
                     <form action="Ajouter_un_commentaire.php" method="get">
                     <input type="hidden" id="btn_commenter" name="produit" value =<?php echo $res["Reference"] ?>/> <label for="btn_commenter">Commenter</label>      
                        <input type="submit" value="Valider">
                     </form>
                     </th>
                    </tr>

        <?php
    }
}
?>
            
<?php function passer_commande(){
    $connection = new createConnexion();
    $connect = $connection->connect();
    $result = mysqli_query($connect, "SELECT * FROM Produit");
    while ($res = mysqli_fetch_assoc($result)) {
        if ($res['Marque'] == $_POST['marque']) {
            if ($res['Categorie'] == $_POST['categorie']) {
                if ($res['Prix'] > $_POST['mini']) {
                    if ($res['Prix'] < $_POST['maxi']) {
                        ?>
                        <tr>
                            <th> <?php echo $res['Reference'] ?> </th>
                            <th> <?php echo $res['Libelle'] ?> </th>
                            <th> <?php echo $res['Categorie'] ?> </th>
                            <th> <?php echo $res['Marque'] ?> </th>
                            <th> <?php echo $res['Quantite'] ?> </th>
                            <th> <?php echo $res['Prix'] ?> </th>
                            <th> <?php echo $res['Description'] ?> </th>
                            <th>
                                <form action="Achete.php" method="get">
                                    <input type="hidden" id="btn_achat" name="produit" value =<?php echo $res["Reference"] ?> /> <label for="btn_achat">Acheter</label>      
                                    <input type="submit" value="Valider">
                                </form>
                            </th>
                            <th>
                                <form action="Ajouter_un_commentaire.php" method="get">
                                    <input type="hidden" id="btn_commenter" name="produit" value =<?php echo $res["Reference"] ?> /> <label for="btn_commenter">Commenter</label>      
                                    <input type="submit" value="Valider">
                                </form>
                            </th>
                        </tr>
                        <?php
                    }
                }
            }
        }
    }
}
?>
    
    <!--                    Fonction Verfication                    -->

<?php function verif_nom($nom) {
    if (strlen($nom) <= 2) {
        echo 'Le nom doit faire au moins 2 caractères de long' . '<br />';
        return false;
    }
    return true;
}
?> 

<?php function verif_prenom($prenom) {
    if (strlen($prenom) <= 2) {
        echo 'Le prénom doit faire au moins 2 caractères de long' . '<br />';
        return false;
    }
    return true;
}
?> 

<?php function verif_tel($tel) {
    if ((!preg_match("/[0-9]/", $tel) || (substr($tel, 0, 1) != 0))) {
        echo 'Le numéro de téléphone doit commencer par 0' . '<br />';
        return false;
    }
    return true;
}
?> 

<?php function verif_adresse($adresse) {
    if (!preg_match("/[0-9]/", substr($adresse, 0, 5))) {
        echo 'L\'adresse doit commencer par un code postal de 5 chiffres' . '<br />';
        return false;
    }
    return true;
}
?>

<?php function verif_id($id, $nom, $prenom) {
    list($verif_nom, $temp) = explode('.', $id);
    list($verif_prenom, $temp) = explode('@', $temp);
    if ($verif_nom != $nom) {
        return false;
    }
    if ($verif_prenom != $prenom) {
        return false;
    }
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_query($connect, "SELECT Id FROM Utilisateur");
    while ($resultat = $req->fetch()) {
        if ($resultat == $id) {
            return false;
        }
    }
    return true;
}
?> 

<?php function authentification($id, $mdp_verif) {
    $connection = new createConnexion();
    $connect = $connection->connect();
    $req = mysqli_prepare($connect, "SELECT mot_de_passe FROM Utilisateur WHERE id = ?");
    $req->bind_param('s', $id
    );
    $req->execute();
    $req->bind_result($res);
    $resultat = array();
    while ($req->fetch()) {
        $resultat = $res;
    }
    if ($resultat == $mdp_verif) {
        return true;
    } else {
        return false;
    }
}
?> 

<?php function verif_manager($id){
    $connection = new createConnexion();
    $connect = $connection->connect();
    $query = "SELECT Client FROM Utilisateur WHERE Id = '".$id."'";
    $req = mysqli_query($connect, $query);
    
    return mysqli_fetch_all($req);
}
?>



<?php function get($select, $from, $where) {

    $connection = new createConnexion();
    $connect = $connection->connect();

    if ($where == '') {
        if ($req = mysqli_prepare($connect, "SELECT * FROM Produit")) {
            $req->bind_param('ss', $select, $from
            );
        } else {
            var_dump($req);
        }
    } else {
        $req = mysqli_prepare($connect, "SELECT ? FROM ? WHERE ?");
        $req->bind_param('sss', $select, $from, $where
        );
    }

    $req = mysqli_prepare($connect, "SELECT * FROM Produit");
    $req -> execute();
    $resultat = $req->fetch_all();
    //$req->bind_result($res);
    //$resultat = array();
    //while ($req -> fetch())
    //{
    //  $resultat = $res;
    //}
    return($resultat);
}
?>



