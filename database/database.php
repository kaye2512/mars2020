<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root',''); 
    }
    catch(Exception $e)
    {
        // en cas d'erreur, on affiche un message et on arrete tout
        die('Erreur:'.$e->getMessage());
    }
    // si tout va bien, on peut continuer
?>