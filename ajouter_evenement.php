<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ajouter un événement</title>

<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}

body{
    background: linear-gradient(135deg, #d7e1ec, #f5f7fa);
    min-height: 100vh;
}

header{
    background: #030381;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 50px;
    position: sticky;
    top: 0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.logo{
    font-size: 22px;
    font-weight: bold;
    letter-spacing: 1px;
}

nav ul{
    display: flex;
    list-style: none;
    gap: 25px;
}

nav ul li a{
    text-decoration: none;
    color: white;
    font-weight: 500;
    transition: 0.3s;
    position: relative;
}

nav ul li a::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 0;
    height: 2px;
    background: gold;
    transition: 0.3s;
}

nav ul li a:hover{
    color: gold;
}

nav ul li a:hover::after{
    width: 100%;
}

h2{
    text-align: center;
    margin-top: 40px;
    color: #e39e09;
    font-size: 28px;
}

form{
    width: 420px;
    margin: 30px auto;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
}

form:hover{
    transform: translateY(-3px);
}

label{
    display: block;
    margin-top: 12px;
    font-weight: 600;
    color: #333;
}

input, textarea{
    width: 100%;
    margin-top: 6px;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    outline: none;
    transition: 0.3s;
    font-size: 14px;
}

input:focus, textarea:focus{
    border-color: #2d3a0b;
    box-shadow: 0 0 5px rgba(11,31,58,0.2);
}

textarea{
    resize: none;
    height: 100px;
}

button{
    width: 100%;
    margin-top: 20px;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #ecb10e;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

button:hover{
    background: gold;
    color: #e60c30;
}
@media (max-width: 500px){
    form{
        width: 90%;
    }

    header{
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }
}
</style>
</head>

<body>

<header>
    <div class="logo">Campus Events</div>
    <nav>
        <ul>
            <li><a href="#Ajouter">Ajouter_evenement</a></li>
            <li><a href="index.php">Acceil</a></li>
            <li><a href="evenement.php">Événements</a></li>
            <li><a href="inscriptions.php">Administration</a></li>
        </ul>
    </nav>
</header>

<h2 style="text-align:center;">Ajouter un événement</h2>

<form action="" method="POST">
    <label>Titre</label>
    <input type="text" name="titre" required>

    <label>Description</label>
    <textarea name="description" required></textarea>

    <label>Date</label>
    <input type="date" name="date_event" required>

    <label>Lieu</label>
    <input type="text" name="lieu" required>

    <label>Organisateur</label>
    <input type="text" name="organisateur" required>

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