<?php 
session_start();

include('database.php');
 /*      On verifie si les variables existent et ont été définies   */

if(!empty($_POST['name']) && !empty($_POST['mdp']) && !empty($_POST['mail']) && !empty($_POST['password_confirm'])  ) {

/*  Variables*/ 
$name       = $_POST['name'];
$email        = $_POST['mail'];
$password     = $_POST['mdp'];
$pass_confirm = $_POST['password_confirm'];



if($password != $pass_confirm){
    header('Location: login.php?error=1&pass=1');
        exit();

}
	// TEST SI EMAIL UTILISE
    $req = $bdd->prepare("SELECT count(*) as numberEmail FROM membre WHERE mail = ?");
    $req->execute(array($email));

    while($email_verification = $req->fetch()){
        if($email_verification['numberEmail'] != 0) {
            header('location: login.php?error=1&email=1');
            exit();
         }
    }

		// HASH
        $secret = sha1($email).time();
		$secret = sha1($secret).time().time();
 
		// CRYPTAGE DU PASSWORD
 		$password = "aq1".sha1($password."1254")."25";
 
		// ENVOI DE LA REQUETE
 		$req = $bdd->prepare('INSERT INTO membre( name , mail, mdp ,type ,  secret) VALUES(?,?,?, "user" , ?)');
		$value = $req->execute(array($name, $email, $password,  $secret));
			
		header('location: login.php?success=1');
        exit();
     
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
         <title>Login</title>
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


<div class="container">
<?php
/*  On verfie si on est connecté*/
if(!isset($_SESSION['connect'])){ ?>


      <h1 id="info" style="text-align: center">Inscription</h1>
      
      <p id="info">Connecte toi ici si tu as déjà un compte--> <a href="connexion.php">ici.</a></p>
      <?php
		 /*      On test si on a bien inserer les bonnes valeurs ou chaine de caractère    */
         if(isset($_GET['error'])){
  
             if(isset($_GET['name'])){
                 echo '<h1 id="error">Le nom  ne correspond pas.</h1>';
             }
            else if(isset($_GET['mdp'])){
              echo '<h1 id="error">Le mots de passe ne correspond pas.</h1>';
          }
              if (isset($_GET['mail'])){
                 echo '<h1 id="error">Cette adresse email est déjà utilisée ou invalide.</h1>';
             }
         }
         else if(isset($_GET['success'])){
             echo '<h1 id="success">Inscription prise correctement en compte.</h1>';
         }
      
     ?>
<!--  Formulaire d'inscription-->
        <form action="login.php" method="POST">
      <div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" type="text" name="name" placeholder="Name"required>
  </div>
</div>
<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-danger" type="email" name="mail" placeholder="Email input" value="hello@">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>

<div class="field">
  <label class="label"> MotDepasse</label>
  <div class="control">
    <input class="input" type="password" name="mdp" placeholder="mdp"required>
  </div>
</div>

<div class="field">
  <label class="label">Retapemdp</label>
  <div class="control">
    <input class="input" type="password" name="password_confirm" placeholder="confirmer le mdp"required>
  </div>
</div>



<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Inscription</button>
  </div>
</div>
        <!--  message de bienvenue + affichage du pseudo -->
<?php } else  { ?>
		
		<h1 id="info">
            Bonjour <?php echo  $_SESSION['name']; ?><br>
          
            <a href="deconnexion.php">Déconnexion</a>
            
		</h1>

		<?php } ?>

            
	


        
</div>

</form>
</div>
</div>

    </body>
</html>
