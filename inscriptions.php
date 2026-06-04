<?php
require_once "connexion.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administration</title>

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
    z-index: 1000;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.logo{
    font-size: 22px;
    font-weight: bold;
    letter-spacing: 1px;
}

/* NAV DESKTOP */
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

/* ===== BURGER ===== */
.menu-toggle{
    display:none;
    flex-direction:column;
    gap:5px;
    cursor:pointer;
    z-index:1100;
}

.menu-toggle span{
    width:28px;
    height:3px;
    background:white;
    border-radius:5px;
    transition:0.3s;
}

/* ===== MOBILE ===== */
@media(max-width:768px){

    .menu-toggle{
        display:flex;
    }

    nav{
        position: fixed;
        top: 0;
        right: -100%;
        width: 70%;
        height: 100vh;
        background: var(--primary);
        padding-top: 90px;
        box-shadow: -5px 0 20px rgba(0,0,0,0.4);
        transition: 0.3s ease;
    }

    nav.active{
        right: 0;
    }

    nav ul{
        flex-direction: column;
        align-items: center;
        gap: 30px;
    }

    nav ul li a{
        font-size: 18px;
    }
}

/* ANIMATION BURGER X */
.menu-toggle.active span:nth-child(1){
    transform: rotate(45deg) translate(6px,6px);
}

.menu-toggle.active span:nth-child(2){
    opacity:0;
}

.menu-toggle.active span:nth-child(3){
    transform: rotate(-45deg) translate(5px,-5px);
}

/* ===== TITLE ===== */
h1{
    text-align:center;
    margin:30px 0;
}

/* ===== TABLE ===== */
table{
    width:95%;
    margin:auto;
    border-collapse:collapse;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    border-radius:8px;
    overflow:hidden;
}

th{
    background:var(--primary);
    color:white;
    padding:12px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

tr:hover{
    background:#f1f5f9;
}
</style>

</head>

<body>

<header>
    <div class="logo">Campus Events</div>

    <div class="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="evenement.php">Événements</a></li>
            <li><a href="ajouter_evenement.php">Ajouter</a></li>
        </ul>
    </nav>
</header>

<h1>Liste des étudiants inscrits</h1>

<?php
$sql = "SELECT * FROM participation";
$resultat = $connexion->query($sql);

if($resultat && $resultat->num_rows > 0){

    echo "<table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Filière</th>
            <th>Événement</th>
        </tr>";

    while($row = $resultat->fetch_assoc()){
        echo "<tr>
            <td>{$row['nom']}</td>
            <td>{$row['prenom']}</td>
            <td>{$row['email']}</td>
            <td>{$row['filiere']}</td>
            <td>{$row['evenement_id']}</td>
        </tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center;'>Aucune inscription trouvée.</p>";
}
?>

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

