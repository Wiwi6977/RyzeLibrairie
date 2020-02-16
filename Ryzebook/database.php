<?php 
// Connexion à la base SQL
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
// reqèute SQL pour la liste des livres !
$reponse = $bdd->query('SELECT isbn ,nom, titre ,prenom , libelle , nbpages , isbn , annee FROM Livre
                        JOIN personne ON livre.editeur = personne.id
                        JOIN  genre ON livre.genre = genre.id 
                        ORDER BY annee DESC;');

{
	
}


?>
