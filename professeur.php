<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>professeur</title>
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
                        <th>nom</th>
                        <th>prenom</th>
                        <th>Tel01</th>
                        <th>Tel02</th>
                        <th>Mail</th>
                        <th>date_debut_activite</th>
                        <th>Diplome01</th>
                        <th>diplome02</th>
                        <th>adresse_post</th>
                        <th>code_post</th>
                        <th colspan='2'>Action</th>
                    </thead>
                    <?php
                    // connectons la database
                    include 'database/database.php';
                    // recuperons les informations de la database
                    $recuperation = $bdd->query('SELECT NumProf, nom, prenom, Tel01, Tel02, Mail, date_debut_activite, Diplome01, diplome02, adresse_post, code_post FROM professeur');
                    while ($donnees = $recuperation->fetch()){
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($donnees['NumProf']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['nom']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['prenom']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['Tel01']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['Tel02']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['Mail']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['date_debut_activite']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['Diplome01']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['diplome02']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['adresse_post']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['code_post']); ?></td>
                            <td><a href="modifier.php?mod=<?php echo $donnees['NumProf']; ?>" class="modif">Modifier</a></td> 
                            <td><a href="supprimer.php?supNum=<?php echo $donnees['NumProf']; ?>" class="supp">Supprimer</a></td>  
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