<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>FAC ONLINE</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style1.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body>
        <!-- insertion du menu navigation -->
        <?php include "navigation.php" ?>

        <!-- entete de page -->
        <header class="entete">
            <h1 class="">Bienvenue <?php echo $_SESSION['user']; ?> vous etes sur la page cours ! </h1>
    
        </header>

        <!-- bouton ajout  -->
        <section class="admin-content">
            <div>
                <div class="formulaire">
                    <form method="post">
                    <h1>Ajouter des cours</h1>
                    <div class="inputs">
                        <input type="text" name="ID" placeholder="NumCours" require>
                        <input type="text" name="Intitulé" placeholder="Intitulé"require>
                        <input type="text" name="NbChapitre" placeholder="NbChapitre" require>

                    </div>
               
                    <div><button class="btn"type="submit" name="formsend">Valider</button></div>

                </div>


                

                <?php
                    if(isset($_POST['formsend'])){
                        $numcours = htmlspecialchars(trim($_POST['ID'])) ;
                        $intitule = htmlspecialchars(trim($_POST['Intitulé']));
                        $nbchapitre =htmlspecialchars(trim($_POST['NbChapitre']));
                        
                       include 'database/database.php';
                       $addc = $bdd -> prepare('INSERT INTO cours(NumCours, Intitule, NbChapitre) VALUES(:NumCours, :Intitule, :NbChapitre)');
                       $addc -> execute(array(
                        'NumCours'=> $numcours,
                        'Intitule' => $intitule,
                        'NbChapitre' => $nbchapitre));

                        if($addc){
                            echo "insertion donnéé reussi";
                        }else{
                            echo "echec d'insertion";
                        }
                    }
                ?>
                </form>
                
            
            </div>
          
        </section>
    </body>

</html>

<style>
body{
    background-color: #f5f5f5;
}

.formulaire{
    font-family: montserrat;
    display: flex;
    justify-content: center;
    align-items: center;
    
}

form{
    margin-top: 20px;
    background-color: #fff;
    padding: 40px 60px;
    border-radius: 10px;
    min-width: 300px;
}

form h1{
    color: #0082e6;
    text-align: center;
}

form .inputs{
    display: flex;
    flex-direction: column;
}

form .inputs input[type='text'], input[type='password']{
    padding: 15px;
    border-bottom: 5px;
    border: none;
    background-color: #f2f2f2;
    margin-bottom: 15px;
    outline: none;
}
form .inscription{
    font-size:14px;
    margin-bottom: 20px;
    color: #878787;
}

form .inscription span{
    
    color: #0082e6;
}

form .inscription a{
    text-decoration: none;
    color: #0082e6;
}

form .btn{
    padding: 15px 25px;
    border: none;
    border-radius: 5px;
    font-size: 15px;
    color: #fff;
    background-color: #0082e6;
    cursor: pointer;
}


</style>