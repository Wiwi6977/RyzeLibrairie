
<?php 
session_start();

?>




<!DOCTYPE html>
    <!-- Langue -->
<html lang="en">
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
     <link rel="stylesheet" href="CSS\livres.css">
        <!-- /CSS + Police d'écriture , j'utilise ici le framework Bulma pour le site responsif -->
        <!-- On va utiliser Font Awesome  pour désigner encore + notre site -->
        <script src="https://kit.fontawesome.com/e8457aecc5.js" crossorigin="anonymous"></script>
        <!-- On va utiliser Font Awesome  pour désigner encore + notre site -->
        <!-- Le titre de l'onglet. -->
         <title>Livres</title>
        <!-- /Le titre de l'onglet. -->
        <!-- Le logo du site -->
        <link rel="shortcut icon" href="img/logo.jpg">
        <!-- Le logo du site -->
        </head>
        <!-- Fin du head -->
<body>

   <?php 
   /* Inclut les deux pages suivante pour la page */
    include("menu.php");
    include("database.php");
  ?>
    <div class="livres">
    <h2 class="title is-1"> Listes des Livres </h2>
    </div>
        <?php
            $reponse = $bdd->query('SELECT isbn,nom ,titre ,prenom ,editeur.libelle AS libelle_editeur ,genre.libelle AS libelle_genre ,annee FROM livre
            JOIN personne ON livre.editeur = personne.id
            JOIN editeur ON livre.editeur = editeur.id
            JOIN  genre ON livre.genre = genre.id 
            ORDER BY annee DESC;');

        // Affichage de la liste des livres ! 
            while ($ligne = $reponse->fetch()) {
              
              
            ?>
               <div class="block2">
                 <div class="border-bot">
               <div class="text">
               <?php echo '<br><li>'.'Titre : '.$ligne['titre'] ; ?> <br>
               <?php echo 'Nom :'.$ligne['nom'].'<br>'.'Prénom :'.$ligne['prenom'] ; ?> <br>
               <a href="detailslivre.php">Voir détails ! </a>
                    <div class="img">
                          <img class="imag" src="img/<?php echo $ligne['isbn']; ?>.jpg" alt="img" style="width : 200px; margin-left : 20px; "> 
                          </div>
               </div>
            </div>
            </div>
            </div>
          
            <?php 
            }
                  $reponse->closeCursor();
            
        ?>

</body>
</html>