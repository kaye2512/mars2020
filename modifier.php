<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modification</title>
        <meta charset="utf-8">
        
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    
    <div>
        <form name="formupdate" method="post" class="formulaire">
            <h2 align="center">Modifier un cours...</h2>
            <label>NumCours :<input type="text" name="NumCours" class="zonetext" value="<?php echo $_GET['mod']?>" readonly></label>
            <label>Intitulé :<input type="text" name="Intitulé" class="zonetext" required></label>
            <label>Nombre chapitre <input type="text" name="NbChapitre" class="zonetext" required></label>
            <p><input type="submit" name="modsend"/></p>

            <?php
            // connexion a la bdd
            include 'database/database.php';
                if(isset($_POST['modsend'])){
                    $modnum = $_POST['NumCours'];
                    $modinti = $_POST['Intitulé'];
                    $modnb = $_POST['NbChapitre'];

                    
                // code modification
                    $reqUp= $bdd->prepare('UPDATE cours SET Intitule= :Intitule , NbChapitre = :Nbchapitre WHERE NumCours = :NumCours');
                    $reqUp->execute(array(
                        'Intitule' => $modinti,
                        'Nbchapitre' => $modnb,
                        'NumCours' => $modnum
                    ));

                    if($reqUp){
                        header('location: cours.php');

                    }else{
                        echo "echec de mise à jour";
                    }
                }
                                
                            
                   
                
                
            ?>
            
        </form>
    
    </div>
    
    </body>

</html>

<style>

body{
    font-family: montserrat;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f5f5f5;
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