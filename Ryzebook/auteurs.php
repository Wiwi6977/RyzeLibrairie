<?php
session_start();
?>
<!DOCTYPE html>
    <!-- Langue -->
<html lang="fr">
    <!-- /langue -->
    <!-- Début du head -->
        <head>
        <!-- la partie responsive de la page pour les téléphones + définir le type d'écriture en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <!-- CSS + Police d'écriture , j'utilise ici le framework Bulma pour le site responsif -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="CSS\Auteurs.css">
        <!-- /CSS + Police d'écriture , j'utilise ici le framework Bulma pour le site responsif -->

        <!-- On va utiliser Font Awesome  pour désigner encore + notre site -->
        <script src="https://kit.fontawesome.com/e8457aecc5.js" crossorigin="anonymous"></script>
        <!-- On va utiliser Font Awesome  pour désigner encore + notre site -->
        <!-- Le titre de l'onglet. -->
         <title>Auteurs</title>
        <!-- /Le titre de l'onglet. -->
        <!-- Le logo du site -->
        <link rel="shortcut icon" href="img/logo.jpg">
        <!-- /Le logo du site -->
        </head>
        <!-- Fin du head -->
    <body>
        <!-- Menu + Banniere -->
      <?php  include("menu.php"); ?>
      <!-- Inclure les bases MySQL -->
     <?php  include("database.php"); ?>



      <div class="livres">
    <h2 class="title is-1"> Listes des Auteurs </h2>
    <!-- Affichage des auteurs -->
    </div>
    
        <?php
      
//affiche les données
include('database.php');
$requete=$bdd->query('SELECT isbn,titre,nom,prenom,genre.libelle as genre,langue.libelle as langue,editeur.libelle as editeur,annee,role.libelle as role FROM `auteur`
join role on auteur.idRole=role.id
join personne on auteur.idPersonne=personne.id
join livre on auteur.idLivre=livre.isbn
JOIN genre on livre.genre=genre.id
JOIN editeur on livre.editeur=editeur.id
JOIN langue on livre.langue=langue.id');

             ?>



<form method="GET">
<?php
$option_per="SELECT * FROM `personne`";
try{
    $stmt_per=$bdd->prepare($option_per);
    $stmt_per->execute();
    $results_per=$stmt_per->fetchAll();
}
catch(Exception $ex)
{
    echo($ex->getMessage());
}
?>


<?php 
if(isset($_GET['Hello']) AND !empty($_GET['Hello'])){ 
  $q=htmlspecialchars($_GET['Hello']);
  $requete=$bdd->query('SELECT isbn,titre,nom,prenom,genre.libelle as genre,langue.libelle as langue,editeur.libelle as editeur,annee,role.libelle as role,personne.id FROM `auteur`
  join personne on auteur.idPersonne=personne.id
  join role on auteur.idRole=role.id
  join livre on auteur.idLivre=livre.isbn
  JOIN genre on livre.genre=genre.id
  JOIN editeur on livre.editeur=editeur.id
  JOIN langue on livre.langue=langue.id
  WHERE personne.id ="'.$q.'"');
  }



?>
<center>
    <select name="Hello" >
    <option>Recherche par Auteur</option>
    <?php foreach($results_per as $output_per){?>
    <option value="<?php echo $output_per["id"];?>"><?php echo $output_per["id"].".".$output_per["prenom"].' '.$output_per['nom']?></optiton>
    <?php } ?>
    </select></br>
<input type="submit" value="search">
</form>
<?php while($bdd=$requete->fetch()) { ?>
<hr><b>
<?php echo $bdd['titre'].'<br>'.$bdd['isbn'].'<br>'.$bdd['editeur'].'<br>'.$bdd['nom'].' '.$bdd['prenom'].'<br>'.$bdd['genre'].'<br>'.$bdd['langue'].'<br>'.$bdd['annee']?></b>
<?php } ?>
</center>

</body>
</html>