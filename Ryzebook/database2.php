<?php 
try
{
    // Connexion à la base SQL
	$bdd = new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
// requète pour les auteurs
$reponse = $bdd->query('SELECT DISTINCT prenom, nom, personne.id AS id_Personne
                        FROM Auteur
                        INNER JOIN Personne ON auteur.idPersonne = personne.id');
             
                
{

}
?>