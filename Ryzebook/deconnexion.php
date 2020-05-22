<?php
// On vient killer la session de l'utilisateur tout en ajoutant un cookie
session_start();
session_unset();
session_destroy();
setcookie('log', '', time()-3444, '/', null, false, true);

header('location: login.php');