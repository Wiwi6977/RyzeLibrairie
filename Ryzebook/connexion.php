<?php
session_start();

if(isset($_SESSION['connect'])){
	header('location: login.php');
	exit();
}

require('database.php');

// CONNEXION
if(!isset($_POST['id']) &&  !isset($_POST['name']) && !empty($_POST['mdp']) && !empty($_POST['mail']) && !isset($_POST['type']) && !isset($_POST['id']) ) {

    // VARIABLES
    $id         = $_POST["id"];
	$email 		= $_POST['mail'];
    $password 	= $_POST['mdp'];
    $type       = $_POST['type'];
    $name       =  $_POST['name'];


	$error		= 1;

	// CRYPTER LE PASSWORD
	$password = "aq1".sha1($password."1254")."25";

	echo $password;

    $req = $bdd->prepare('SELECT * FROM membre WHERE mail = ?');
 
    $req->execute(array($email));
  
    

	while($user = $req->fetch()){

		if($password == $user['mdp']){
			$error = 0;
            $_SESSION['connect'] = 1;
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['mail'] = $user['mail'];
            $_SESSION['type'] = $user['type'];
         

			if(isset($_POST['connect'])) {
				setcookie('log', $user['secret'], time() + 365*24*3600, '/', null, false, true);
			}
			header('location: connexion.php?success=1');
			exit();
		}

	}

	if($error == 1){
		header('location: connexion.php?error=1');
		exit();
    }
}

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
         <title>Connexion</title>
        <!-- /Le titre de l'onglet. -->
        <!-- Le logo du site -->
        <link rel="shortcut icon" href="img/logo.jpg">
        <!-- Le logo du site -->
        </head>
        <!-- Fin du head -->
    <body>
        <!-- Menu + Connexion BDD-->
      <?php  include("menu.php"); ?>
   
<!-- Inscription-->

  
<h1 style="text-align: center">Connexion</h1>

<div class="container">
		<p id="info">Inscris toi ici si ce n'est pas encore fait --> <a href="login.php">inscrivez-vous.</a></p>
	 	
        <?php
        /* Test si il y a une erreur*/
			if(isset($_GET['error'])){
				echo'<p id="error">Nous ne pouvons pas vous authentifier.</p>';
			}
			else if(isset($_GET['success'])){
				echo'<p id="success">Vous êtes maintenant connecté.</p>';
			}
		?>


<!--  Formulaire de connexion-->

    <form method="POST" action="connexion.php">
                <div class="field">
                        <label class="label">Mail</label>
                        <div class="control">
                        <input class="input" name="mail" type="text" placeholder="mail">
                </div>
                </div>
                        <div class="field">
                        <label class="label">MotDepasse</label>
                        <div class="control">
                        <input class="input" type="password" name="mdp" placeholder="mdp">
                </div>
                </div>

    <div class="field is-grouped">
    <div class="control">
        <button class="button is-link">Connexion</button>
    </div>
    </div>
    </form>
    </div>
        </div>
    </body>
    </html>

