
 
 <!-- Header de la page -->
 


<!--  En PHP si  un utilisateur à tel type alors il peut accéder à telles pages  et on affiche son id de connexion-->

  <div class="block">
                <header class="header">
                    <a href="#" class="header-logo">RyzeLibrarie</a>
                        <nav class="header-menu">
    
                            <?php  

                            if(isset($_SESSION['id']) && isset($_SESSION['name'])  ){ ?>
                        
                              <?php
                        
                                    if($_SESSION['type'] == "admin"){ ?>
        
                            <a  href="add_user.php?idmembre=<?php  echo  $_SESSION['id']; ?>">Admin</a> 
                             <a href="formulaires.php?idmembre=<?php  echo  $_SESSION['id']; ?>">Ajout !</a>  
                            <a href="index.php?idmembre=<?php  echo  $_SESSION['id']; ?>">L'intro</a> 
                            <a href="acceuil.php?idmembre=<?php  echo  $_SESSION['id']; ?>">Accueil</a>
                            <a href="livres.php?idmembre=<?php  echo  $_SESSION['id']; ?>">Livres</a>
                            <a href="auteurs.php?idmembre=<?php  echo  $_SESSION['id']; ?>">Auteurs</a>
                            <a href="login.php?idmembre=<?php  echo  $_SESSION['id']; ?>">Login</a> 

                             
                                    <?php } ?>
        
                            
                                    <?php  if($_SESSION['type'] == "user") { ?>
                             <a href="index.php?idmembre=<?php  echo  $_SESSION['id']; ?>">L'intro</a> 
                            <a href="acceuil.php?idmembre=<?php  echo  $_SESSION['id']; ?>">>Accueil</a>
                            <a href="livres.php?idmembre=<?php  echo  $_SESSION['id']; ?>">>Livres</a>
                            <a href="auteurs.php?idmembre=<?php  echo  $_SESSION['id']; ?>">>Auteurs</a>
                            <a href="login.php?idmembre=<?php  echo  $_SESSION['id']; ?>">Login</a> 
                             <a href="panier.php?idmembre=<?php  echo  $_SESSION['id']; ?>">Panier</a>               
                                  <?php } ?>

                                    <?php } 

                                        else { ?>
                            <a href="index.php">L'intro</a> 
                            <a href="acceuil.php">Accueil</a>
                            <a href="livres.php">Livres</a>
                            <a href="auteurs.php">Auteurs</a>
                            <a href="login.php">Login</a> 
                                        <?php } ?>
                        </nav> 
                </header>
        
            </div>
            
            <!-- La bannière -->
            <div class="block">
                <div class="banner">
                    <img src="img\Book.jpg" alt="Bannière" class="banner-image">
                    <div class="banner-content">
                        <h1 class="title is-1">Une Experience Magique.</h1>
                        <h2 class="subtitle">It's me Ryze of League of Legends and I love Books.</h2>
                    </div>
                </div>
            </div> 


