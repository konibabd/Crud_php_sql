<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

        include_once "connexion.php";
        $id = $_GET['id'];
        $req = mysqli_query($con , "SELECT * FROM Employe WHERE id = $id");
        $row = mysqli_fetch_assoc($req);

        if(isset($_POST['button'])){
            extract($_POST);
            if(isset($nom) && isset ($prenom) && $age){
                $req = mysqli_query($con, "UPDATE Employe SET nom= '$nom', prenom= '$prenom', age= '$age' WHERE id = $id");
                if($req){
                    header("location: index.php");
                }else{
                    $message = "Employé non modifié";
                }
            }else {
                $message =  "Veuillez remplir tous les champs !";
            }
        }
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="image/Back_Arrow.svg.png" alt="">Retour</a>
        <h2>Modifier l'employé : <?=$row['nom']?></h2>
        <p class="erreur_message">
            <?php
                if(isset($message)){
                    echo $message ;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">
            <label>âge</label>
            <input type="number" name="age" value="<?=$row['age']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>