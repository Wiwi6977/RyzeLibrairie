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
     <link rel="stylesheet" href="CSS\Acceuil.css">
        <!-- /CSS + Police d'écriture , j'utilise ici le framework Bulma pour le site responsif -->

        <!-- On va utiliser Font Awesome  pour désigner encore + notre site -->
        <script src="https://kit.fontawesome.com/e8457aecc5.js" crossorigin="anonymous"></script>
        <!-- On va utiliser Font Awesome  pour désigner encore + notre site -->
        <!-- Le titre de l'onglet. -->
         <title>Accueil</title>
        <!-- /Le titre de l'onglet. -->
        <!-- Le logo du site -->
        <link rel="shortcut icon" href="img/logo.jpg">
        <!-- Le logo du site -->
        </head>
        <!-- Fin du head -->
    <body>
        <!-- Menu + Banniere -->
      <?php  include("menu.php"); ?>

      <!-- ////////////////////////////////////////////////////////////////////////// -->
      <?php
            include("database.php");
      ?>
<?php
       //requete 
     
       $requete = $bdd->query('SELECT titre,isbn,nom,prenom,nbpages,langue,annee,role.libelle as role,editeur.libelle as editeur,genre.libelle  as genre FROM `auteur`
   join livre on auteur.idLivre=livre.isbn
   join role on auteur.idRole=role.id
   JOIN personne on auteur.idPersonne=personne.id
   INNER JOIN genre on livre.genre=genre.id
   INNER JOIN editeur on livre.editeur=editeur.id
   order by titre');

//var_dump($requete);
// fetch pour aller chercher la requete
   while($d = $requete->fetch()){
?>
<center>
    <b><p>Titre :<br>  <?php  echo $d['titre']; ?> <p></b><br> </p>
     <b><p>Genre :  <?php echo $d['genre'];?><br>
     Nbpages :   <?php echo $d['nbpages'];?><br>
     Editeur :      <?php echo $d['editeur'] ;?><br>
     Langue :      <?php echo $d['langue'] ;?><br>
     Année :      <?php echo $d['annee'] ;?></p></b>
     <img src="img/<?php echo $d['isbn']; ?>.jpg" alt="img" style="width : 200px; margin-left : 20px; "> 
                        <h3 id="info"><a href="index.php">Liste des Livres</h3></a>
                        
    <?php
   }
   //fermeture de ma requete
    $requete->closeCursor(); 
    ?>
  </center>
    </body>
</html>
