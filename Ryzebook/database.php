<?php
// Connexion à la base de donnée du projet tout en testant si il y a une erreur ou non.
try
{
    $bdd = new PDO("mysql:host=localhost;dbname=bibliothèque;charset=utf8" , "root" , "");
} catch(Exception $e) 
{
    die('Erreur :' .$e->getMessage());
}
    // Maintenant on va lire les données de la table livre , c'est celle qu'on veut en priorité
    $requete = $bdd->query('SELECT * FROM Livre WHERE genre ="4"');
    echo'<table border>
    <tr>
        <th>titre</th>
        <th>isbn</th>
        <th>genre</th>
        </tr>';
    while($donnees = $requete->fetch()) {
        echo'<tr>
        <td>'.$donnees{'titre'}.'</td>
        <td>'.$donnees{'isbn'}.'</td>
        <td>'.$donnees{'genre'}.'</td>
        </tr>';
    }
    echo '   
    </table>';
    
?>