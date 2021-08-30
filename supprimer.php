<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Supprimer</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form name="formdelet" class="formulaire">
            <p><a href="cours.php" class="submit">Retour à la page cours</a></p>
                <?php
                    if(isset($_GET['supNum'])){
                        $sup=$_GET['supNum'];
                    // connexion base de donnée
                    
                        include 'database/database.php';
                        // code suppréssion
                        $supp = $bdd -> prepare('DELETE FROM cours WHERE NumCours = ?');
                        $supp -> execute(array(
                            $sup
                        ));

                        if($supp){
                            echo "la suppression est reussi";
                        }else{
                            echo "la suppression à échoué";
                        }
                    }
                ?>
            </form>
        </div>
    </body>
</html>