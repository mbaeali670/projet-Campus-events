<?php
require_once "connexion.php";

$sql = "SELECT * FROM rencontres";
$resultat = $connexion->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catalogue des événements</title>

<style>
    :root{
    --primary: #0b2a4a;
    --secondary: #1e88e5;
    --accent: #ffb300;
    --light: #f5f7fb;
    --dark: #1c1c1c;
    --white: #ffffff;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", sans-serif;
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
    color: var(--white);
    font-weight: 500;
    position: relative;
    transition: 0.3s;
}

nav ul li a::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 0%;
    height: 2px;
    background: var(--accent);
    transition: 0.3s;
}

nav ul li a:hover{
    color: var(--accent);
}

nav ul li a:hover::after{
    width: 100%;
}

.menu-toggle{
    display: none;
    font-size: 30px;
    cursor: pointer;
}
h1{
    text-align:center;
    margin:30px 0;
    color:var(--primary);
}

.container{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:20px;
    padding:20px;
}

.card{
    width:300px;
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 10px 20px rgba(0,0,0,0.1);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-8px);
}

.card h2{
    color:var(--primary);
    margin-bottom:10px;
}

.card p{
    font-size:14px;
    color:#555;
    margin-bottom:8px;
}

.btn{
    display:inline-block;
    margin-top:10px;
    padding:10px 12px;
    background:var(--secondary);
    color:white;
    text-decoration:none;
    border-radius:8px;
    margin-right:5px;
}

.btn:hover{
    background:var(--primary);
}

</style>
</head>

<body>

<header>
    <div class="logo">Campus Events</div>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="ajouter_evenement.php">Ajouter</a></li>
            <li><a href="evenement.php">Événements</a></li>
            <li><a href="inscriptions.php">Administration</a></li>
        </ul>
    </nav>
</header>

<h1>Catalogue des événements</h1>

<div class="container">

<?php
if ($resultat && $resultat->num_rows > 0) {

    while($row = $resultat->fetch_assoc()) {
        echo "
        <div class='card'>
            <h2>{$row['titre']}</h2>
            <p><strong>Description :</strong> {$row['description']}</p>
            <p><strong>Date :</strong> {$row['date_event']}</p>
            <p><strong>Lieu :</strong> {$row['lieu']}</p>
            <p><strong>Organisateur :</strong> {$row['organisateur']}</p>

            <a class='btn' href='inscription.php?id={$row['id']}'>S'inscrire</a>
        </div>";
    }

} else {
    echo "<p style='text-align:center;'>Aucun événement trouvé.</p>";
}
?>

</div>

</body>
</html>

<?php
$connexion->close();
?>