
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
         <title></title>
        <!-- /Le titre de l'onglet. -->
        <!-- Le logo du site -->
        <link rel="shortcut icon" href="img/logo.jpg">
        <!-- Le logo du site -->
        </head>
        <!-- Fin du head -->
    <body>
        <!-- Menu + Banniere -->



      <?php  include("menu.php"); 
   

 include('database.php');


 // On test si la variable existe.
 if(isset($_GET['idmembre']) ) {

    $idmembre = $_GET['idmembre'] ; 
//REQUETE

     $afficher = $bdd->prepare('SELECT *
     FROM panier
     JOIN livre ON panier.isbnlivre = livre.isbn
     WHERE idmembre ='.$idmembre);
    $afficher->execute(array($idmembre));
    
    while($d = $afficher->fetch()) {
    echo $d['titre'];
    
    ?>
    <img style="width : 200px; margin-left : 20px;" src="img/<?php echo $d['isbn'];?>.jpg">
    <?php 
    }
     ?>

     <?php  
 }
?>







    </body>