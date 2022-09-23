<?php
    //connexion à la base de donnée
    $con = mysqli_connect("localhost", "root", "", "gestion");
    if(!$con){
        echo "Vous n'êtes pas connecté !";
    }
?>