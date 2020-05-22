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
       $isbn = $_GET['isbn'];

       $detail = $bdd->prepare('SELECT isbn, titre, nom, prenom, role.libelle AS libelle_role, editeur.libelle AS libelle_editeur, genre.libelle AS libelle_genre,                                             langue.libelle AS libelle_langue , nbpages, annee
                              FROM livre
                              JOIN editeur ON livre.editeur = editeur.id
                              JOIN auteur ON livre.isbn = auteur.idLivre
                              JOIN personne ON auteur.idPersonne = personne.id
                              JOIN genre ON livre.genre = genre.id
                              JOIN langue ON livre.langue = langue.id
                              JOIN role ON auteur.idRole = role.id
                              WHERE isbn = :isbn
                              LIMIT 1');
       $detail->execute(array(
              'isbn' => $isbn));

       while($donnee = $detail->fetch())
            {
            ?>

            <img src="img/<?php echo $donnee['isbn'];?>.jpg" style="width : 200px; margin-left : 20px;">

            <>
                Titre : <?php echo $donnee['titre'];?> <br>

                   Auteur : <?php echo $donnee['prenom'] . " " . $donnee['nom'];?> <br>

                   Rôle : <?php echo $donnee['libelle_role'];?> <br>

                   Editeur : <?php echo $donnee['libelle_editeur'];?> <br>

                   Genre : <?php echo $donnee['libelle_genre'];?> <br>

                   Langue : <?php echo $donnee['libelle_langue'];?><br>

                   Nombre de pages : <?php

                   if($donnee['nbpages'] = "NULL"){
                       echo "Inconnu";
                   }else{
                       echo $donnee['nbpages'];
                   }?> <br>

                   Année de publication : <?php echo $donnee['annee'];?>
                   <br>
                    <?php  if($_SESSION['type'] == "admin" && "") {?>
                  <a href="remerciement.php?isbn=<?php echo $_GET['isbn']?>&idmembre=<?php echo $_SESSION['id']?>">Ajouter au panier</a>
            </p>
                    <?php  } ?>
    <?php
   }
   //fermeture 
    $detail->closeCursor(); 
    ?>
    </body>
</html>
