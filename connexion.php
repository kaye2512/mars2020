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
                <p><label>pseudo :<input type="text" name="login_pseudo" require/></label></p>
                <p><label>Mot de passe<input type="password" name="login_password" require/></label></p>
                <p><input type="submit" name="formsend"/></p>
            </form>
            
        <?php
            if(isset($_POST['formsend'])){
                // initialisation des variable
                $login_pseudo = htmlspecialchars(trim($_POST['login_pseudo']));
                $mot_de_passe = htmlspecialchars(trim($_POST['login_password']));

                // on verifie si les champs sont remplis
                if(!empty($login_pseudo) && !empty($mot_de_passe)){
                    // connections la base de donnee
                    include "database/database.php";
                    // verifions si les informations existe dans la base de donnee puis connectons
                    $bd = $bdd -> prepare('SELECT * FROM administration WHERE user = :user');
                    $bd -> execute(array(
                        'user' => $login_pseudo
                    ));
                    $resultat = $bd -> fetch();
                    if(!$resultat){
                        echo 'mauvais identifiant ou mot de passe !';
                    }else{
                        // verifions si le mot de passe est identique
                        if(password_verify($mot_de_passe, $resultat['password'])){
                            session_start();
                            $_SESSION['id'] = $resultat['id'];
                            $_SESSION['user'] = $login_pseudo;
                            header('location: faconline.php');
                        }else{
                            echo 'mauvais mot de passe !';
                        }
                    }
                }else{
                    echo 'veuillez remplir les champs';
                }
            }
        ?>
    
    </body>










</html>