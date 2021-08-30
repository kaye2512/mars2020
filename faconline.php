<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>FAC ONLINE</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body>
        <?php include "navigation.php" ?>
        <header class="entete"><h1 class="bvn">Bienvenue <?php echo $_SESSION['user']; ?> ! </h1></header>
        <!-- corps du site -->
        <div class="conteneur">
            <div class="contain">
                <div class="contain-1">
                    <p>pour acceder au menu cours</p>
                    <a class="btn" href="cours.php">clic here</a>
                </div>
            </div>
            <div class="contain">
                <div class="contain-1">
                    <p>pour acceder au menu professeur</p>
                    <a class="btn" href="">clic here</a>
                </div>
            </div>
            <div class="contain">
                <div class="contain-1">
                    <p>pour acceder au menu matiere</p>
                    <a class="btn" href="">clic here</a>
                </div>
            </div>
            <div class="contain">
                <div class="contain-1">
                    <p>pour acceder au menu matieres des professeurs</p>
                    <a class="btn" href="">clic here</a>
                </div>
            </div>
        </div>
    
    </body>



    





</html>