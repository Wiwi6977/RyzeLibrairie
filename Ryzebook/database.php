<?php 
// Connexion à la base SQL
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}


?>
