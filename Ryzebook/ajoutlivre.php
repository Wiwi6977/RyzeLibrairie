<?php
// Connexion à MySQL
$bdd=new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', '');

if(isset($_POST['isbn']) AND isset($_POST['titre']) AND isset($_POST['editeur']) AND isset($_POST['genre'])AND isset($_POST['annee'])AND isset($_POST['langue'])AND isset($_POST['nbpages']) AND isset($_POST['nom']) AND isset($_POST['prenom'])){ 
   $titre=$_POST['titre'];
   $isbn=$_POST['isbn'];
   $editeur = $_POST['editeur'];
   $genre = $_POST['genre'];
   $annee = $_POST['annee'];
   $langue = $_POST['langue'];
   $nbpages = $_POST['nbpages'];
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   

   $requete = $bdd->prepare("INSERT INTO Livre(titre , isbn , editeur ,genre, annee , langue , nbpages )VALUES(?,?,?,?,?,?,?)");
   $requete->execute(array($titre ,$isbn ,$editeur,$genre, $annee,$langue ,$nbpages ));
   $requete2 = $bdd->prepare("INSERT INTO personne(nom, prenom)VALUES(?,?)");
   $requete2->execute(array($nom, $prenom));
}

?>


<form action="" method="POST">
<h2 class="heading-size">Ajout d'un livre</h2>
<div class="field">
  <label class="label" for="titre" name="titre">Nom du livre</label>
  <div class="control">
  <input type="text" name='titre'placeholder="titre" id="txtMot"value=""> <br>
  </div>
</div>
<div class="field">
  <label class="label" for="nom" name="nom">Nom de l' Auteur</label>
  <div class="control">
  <input type="text" name='nom'placeholder="nom" id="txtMot"value=""> <br>
  </div>
</div>
<div class="field">
  <label class="label" for="prenom" name="prenom">Prénom  de l' Auteur</label>
  <div class="control">
  <input type="text" name='prenom'placeholder="prenom" id="txtMot"value=""> <br>
  </div>
</div>

<div class="field">
  <label class="label" for="isbn" name='titre'>Isbn</label>
  <div class="control has-icons-left has-icons-right">
  <input type="text" name='isbn'placeholder="isbn" id="txtMot" value=""> <br> 
  </div>
</div>

<div class="field">
  <label class="label"for="editeur" name='editeur'>Éditeur</label>
  <div class="control"> 
        <div class="select">
            <select name="editeur">
        <option value="1">Belfond</option>
        <option value="2">Flammarion</option>
        <option value="3">Librio</option>
        <option value="4">Pocket</option>
        <option value="5">Larousse</option>
        <option value="6">Le livre de poche</option>
        <option value="7">Folio Théâtre</option>
        <option value="8">Phillipe Picquier</option>
        <option value="9">Guardian</option>
    </select> </br>
  </div>
  </div>
</div>

<div class="field">
  <label class="label"for="genre" name='genre'>Genre</label>
  <div class="control">
    <div class="select">
    <select  name="genre">
   <option value="4">Essai</option>
   <option value="3">Nouvelle</option>
   <option value="5">Poésie</option>
   <option value="2">Roman</option>
   <option value="1">Théâtre</option>
     </select></br>
    </div>
  </div>
</div>

<div class="field">
  <label class="label" for="annee" name='annee'>Année</label>
  <div class="control">
    <input type="number" name='annee'placeholder="annee"id="txtMot2" value="0"> <br> 
  </div>
</div>

<div class="field">
  <label class="label"for="langue" name='langue' >Langue</label>
  <div class="control">
    <div class="select">
    <select name="langue"> 
    <option value="1"> Anglais</option>
     <option value="2"> Français</option>
     <option value="3"> Japonais</option>
     <option value="4"> Espagnol</option>
     <option value="5"> Italien</option> </select> <br>
    </div>
  </div>
</div>

<div class="field">
  <label class="label" for="nbpages" name='nbpages' >Nombre de Pages</label>
  <div class="control">
  <input type="number" name='nbpages'placeholder="nbpages"id="txtMot2" value="0" > <br> 
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link"type="submit" value="OK" id="btnValider">Submit</button>
  </div>
</div>
</form>
<?php

if(isset($_POST['libelle'])) {
    $libelle = $_POST['libelle'];
    $requete3 = $bdd->prepare("INSERT INTO langue(libelle)VALUES(?)");
    $requete3->execute(array($libelle));
}


?>

<form action="" method="POST">
<h2 class="heading-size">Ajout d'une langue</h2>
<div class="field">
  <label class="label" for="libelle" name="libelle">Langue</label>
  <div class="control">
  <input type="text" name='libelle'placeholder="langue" id="txtMot"value=""> <br>
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link"type="submit" value="OK" id="btnValider">Submit</button>
  </div>
</div>
</form>

<?php
if( isset($_POST['genre'])){ 
   
   $genre = $_POST['genre'];
   
   

   $requete = $bdd->prepare("INSERT INTO genre(libelle )VALUES(?)");
    $requete->execute(array($genre));
}
    ?>
   
<form action="" method="POST">
<h2 class="heading-size">Ajout d'un genre</h2>
<div class="field">
  <label class="label" for="genre" name="genre">Genre</label>
  <div class="control">
  <input type="text" name='genre'placeholder="genre" id="txtMot"value=""> <br>
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link"type="submit" value="OK" id="btnValider">Submit</button>
  </div>
</div>
</form>



</form>


</form>



<script>
  // Vérification si les champs du formulaire sont vides .
                                                var btnValider = document.getElementById('btnValider');
                                                btnValider.addEventListener("click" , valider);
                                                    function valider()  {
                                                            var txtMot = document.getElementById('txtMot');

                                                            if(txtMot.value == "") {
                                                                alert("Tu t'es trompé ! ");
                                                            } else {
                                                                txtMot.readOnly = true ;
                                                            }
                                                            if(txtMot2.value == "0" || "") {
                                                                alert("Tu t'es trompé ! ");
                                                            } else {
                                                                txtMot2.readOnly = true ;
                                                            }

                                                    }
                                    </script>