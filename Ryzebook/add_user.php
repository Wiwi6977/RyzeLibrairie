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
     <link rel="stylesheet" href="CSS/Acceuil.css">
        <!-- /CSS + Police d'écriture , j'utilise ici le framework Bulma pour le site responsif -->

        <!-- On va utiliser Font Awesome  pour désigner encore + notre site -->
        <script src="https://kit.fontawesome.com/e8457aecc5.js" crossorigin="anonymous"></script>
        <!-- On va utiliser Font Awesome  pour désigner encore + notre site -->
        <!-- Le titre de l'onglet. -->
         <title>Admin</title>
        <!-- /Le titre de l'onglet. -->
        <!-- Le logo du site -->
        <link rel="shortcut icon" href="img/logo.jpg">
        <!-- Le logo du site -->
        </head>
        <!-- Fin du head -->
    <body>
        <!-- Menu + Connexion BDD-->
      <?php  include("menu.php"); ?>
   
      <?php
      include('database.php');
      /*      On verifie si les variables existent et ont été définies   */

if(!empty($_POST['name']) && !empty($_POST['mdp']) && !empty($_POST['mail']) && !empty($_POST['type']) ) {

  /*      Variables   */
  $pseudo      = $_POST['name'];
  $email        = $_POST['mail'];
  $password     = $_POST['mdp'];
  $type         = $_POST['type'];

  

    // TEST SI EMAIL UTILISE
      $req = $bdd->prepare("SELECT count(*) as numberEmail FROM membre WHERE mail = ?");
      $req->execute(array($email));
  
      while($email_verification = $req->fetch()){
          if($email_verification['numberEmail'] != 0) {
              header('location: add_user.php?error=1&email=1');
              exit();
           }
      }
  
      // HASH
          $secret = sha1($email).time();
      $secret = sha1($secret).time().time();
   
      // CRYPTAGE DU PASSWORD
       $password = "aq1".sha1($password."1254")."25";
   
      // ENVOI DE LA REQUETE
       $req = $bdd->prepare('INSERT INTO membre( name , mail, mdp ,type ,  secret) VALUES(?,?,?, ? , ?)');
      $value = $req->execute(array($pseudo, $email, $password, $type , $secret));
        
      header('location: add_user.php?success=1');
          exit();
          
  
  }


?>
<!--  Formulaire d'ajout en admin-->
<form class="box" action="add_user.php" method="POST">
  <h1 class="box-logo box-title">

  </h1>
    <h1 class="box-title">Add user</h1>
  <input type="text" class="box-input" name="name" 
  placeholder="Nom d'utilisateur" required />
  
    <input type="text" class="box-input" name="mail" 
  placeholder="Email" required />
  
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="mdp" 
  placeholder="Mot de passe" required />
  
  <div class="field is-grouped">
    <div class="control">
        <button class="button is-link">Add</button>
</form>
<p>C'est votre espace admin.</p>

    <a href="#">Update user</a> | 
    <a href="#">Delete user</a> | 
</body>
</html>