<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un evenement</title>
</head>
<body>
    <h2>Ajouter un evenement</h2>
    <form action="ajouter_evenement.php" method="POST">
        <label> Titre:</label><br>
        <input type="text" name="titre" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>Date:</label><br><br>
        <input type="date" name="date_event" required><br><br>
        <label>Lieu:</label>
        <input type="text" name="lieu" required><br><br>
        <label>Organisateur:</label><br>
        <input type="text" name="organisateur"required><br><br>

        <button type="submit" name="submit">Enregistrer</button>
    </form>
    
</body>
</html>
<?php
require_once"connexion.php"; 

if(isset($_POST['submit'])){
    $titre=$_POST['titre'];
    $description=$_POST['description'];
    $date_event=$_POST['date_event'];
    $lieu=$_POST['lieu'];
    $organisateur=$_POST['organisateur'];

    $sql= "INSERT INTO rencontres(titre,description,date_event,lieu,organisateur)
    VALUES('$titre','$description','$date_event','$lieu','$organisateur')";

    if($connexion->query($sql)===TRUE){
        echo"Evenement ajouté avec succes !";
    }else{
        echo"Erreur" .connexion->error;
    }

}
$connexion->close();


?>;