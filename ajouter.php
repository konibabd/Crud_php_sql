<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter</title>
</head>
<body>
    <?php
    if(isset($_POST['button'])){
        extract($_POST);
        if(isset($nom) && isset ($prenom) && $age){
            include_once "connexion.php";
            $req = mysqli_query($con , "INSERT INTO Employe VALUES(NULL, '$nom', '$prenom', '$age')");
            if($req){
                header("location: index.php");
            }else{
                $message = "Employé non ajouté";
            }
        }else {
            $message =  "Veuillez remplir tous les champs !";
        }
    }
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="image/Back_Arrow.svg.png" alt="">Retour</a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
            <?php
            // si la variable message existe, affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>âge</label>
            <input type="number" name="age">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>