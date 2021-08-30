<!DOCTYPE html>
<html>
    <head>
        <title>connexion</title>
        <meta charset="utf-8">
        <link rel ="stylesheet" types="text/css" href="css/style.css">
    </head>


    <body>
        
            <h1>PAGE DE CONNEXION<h1>
            <form method="POST">
                <p><label>nom :<input type="text" name="nom" require/></label></p>
                <p><label>prenom :<input type="text" name="prenom" require/></label></p>
                <p><label>pseudo :<input type="text" name="pseudo" require/></label></p>
                <p><label>Mot de passe :<input type="password" name="password" require/></label></p>
                <p><label>confirmez votre mot de passe :<input type="password" name="r_password" require/></label></p>
                <p><input type="submit" name="formsend"/></p>
            </form>
            
        <?php
            if(isset($_POST['formsend'])){
                // initialisation des variable
                $nom = htmlspecialchars(trim($_POST['nom']));
                $prenom = htmlspecialchars(trim($_POST['prenom']));
                $pseudo = htmlspecialchars(trim($_POST['pseudo']));
                $mot_de_passe = htmlspecialchars(trim($_POST['password']));
                $r_mot_de_passe = htmlspecialchars(trim($_POST['r_password']));

                // on verifie si les champs sont remplis
                if(!empty($nom) && !empty($prenom) && !empty($pseudo) && !empty($mot_de_passe) && !empty($r_mot_de_passe)){
                    if($mot_de_passe == $r_mot_de_passe){
                        // password hash
                        $options = [
                            'cost' => 12,
                            ];
                        $hashpass = password_hash($mot_de_passe, PASSWORD_BCRYPT, $options);
                        // integrons la base de donnee
                        include 'database/database.php';

                        // verifions si le pseudo existe deja
                        $recherche_pseudo = $bdd -> prepare('SELECT user FROM administration WHERE user = :user ');
                        $recherche_pseudo -> execute(['user' =>$pseudo]);
                        $resultat_pseudo = $recherche_pseudo -> rowCount();
                        if($resultat_pseudo == 0){
                            // ajout desinformation dans la base de donnee
                            $addBD = $bdd -> prepare('INSERT INTO administration(nom, prenom, user, password) VALUES(:nom, :prenom, :user, :password)');
                            $addBD -> execute(array(
                                'nom'=> $nom,
                                'prenom' => $prenom,
                                'user' => $pseudo,
                                'password' => $hashpass
                            ));
                            header('location: connexion.php');
                        }else{
                            echo 'ce pseudo existe deja';
                        }
                    }else{
                        echo 'veuillez saisir un mot de passe identique';
                    }
                }else{
                    echo 'veuillez remplir les champs';
                }
            }
        ?>
    
    </body>










</html>