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
    display:none;
    flex-direction:column;
    gap:5px;
    cursor:pointer;
}

.menu-toggle span{
    width:30px;
    height:3px;
    background:white;
    border-radius:5px;
    transition:0.3s;
}

.menu-toggle.active span:nth-child(1){
    transform:rotate(45deg) translate(6px,6px);
}

.menu-toggle.active span:nth-child(2){
    opacity:0;
}

.menu-toggle.active span:nth-child(3){
    transform:rotate(-45deg) translate(5px,-5px);
}


@media(max-width:768px){

    .menu-toggle{
        display:flex;
    }

    nav{
        display:none;
        position:absolute;
        top:70px;
        left:0;
        width:100%;
        background:#030381;
    }

    nav.active{
        display:block;
    }

    nav ul{
        flex-direction:column;
    }

    nav ul li a{
        display:block;
        padding:15px;
        text-align:center;
    }

    nav ul li a:hover{
        background:var(--accent);
        color:#030381;
    }
}

@keyframes slideDown{
    from{opacity:0; transform:translateY(-10px);}
    to{opacity:1; transform:translateY(0);}
}


h1{
    text-align:center;
    margin:30px 0;
    color:var(--primary);
}


.container{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    padding:20px;
    max-width:1100px;
    margin:auto;
}

.card{
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
}

.btn:hover{
    background:var(--primary);
}

@media(max-width:900px){
    .container{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:600px){
    .container{
        grid-template-columns:1fr;
    }
}

</style>
</head>

<body>

<header>

    <div class="logo">Campus Events</div>
    <div class="menu-toggle">☰</div>

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

<script>
const toggle = document.querySelector(".menu-toggle");
const nav = document.querySelector("nav");

toggle.addEventListener("click", () => {
    nav.classList.toggle("active");
    toggle.classList.toggle("active");
});
</script>

</body>
</html>

<?php
$connexion->close();
?>