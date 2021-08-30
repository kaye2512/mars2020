<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours</title>
        <meta charset="utf-8">
        
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
            <div class="button-group">
                <a href="ajouter.php" class="ajout">Ajouter</a>
            </div>
            
               <table>
                    <thead>
                        <th>id</th>
                        <th>Intitule</th>
                        <th>NbChapitre</th>
                        <th colspan='2'>Action</th>
                    </thead>
                    <?php
                    // connectons la database
                    include 'database/database.php';
                    // recuperons les informations de la database
                    $recuperation = $bdd->query('SELECT NumCours, Intitule, NbChapitre FROM cours');
                    while ($donnees = $recuperation->fetch()){
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($donnees['NumCours']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['Intitule']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['NbChapitre']); ?></td>
                            <td><a href="modifier.php?mod=<?php echo $donnees['NumCours']; ?>" class="modif">Modifier</a></td> 
                            <td><a href="supprimer.php?supNum=<?php echo $donnees['NumCours']; ?>" class="supp">Supprimer</a></td>  
                        </tr>
                    </tbody>
                    <?php    
                }
                // fin de boucle
               ?>
               </table>
               
            
        
          
        </section>
    </body>

</html>


<style>
    *{
    padding: 0;
    margin: 0;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
  }

.admin-content{
    padding: 40px 100px 100px;
}
table{
    width: 100%;
    border-collapse: collapse;
    font-size: 1rem;
  }
  
 th, td{
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #d3d3d3;
  }



</style>