<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ajouter un événement</title>

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
}.

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
        box-shadow:0 10px 25px rgba(0,0,0,0.25);
    }

    nav.active{
        display:block;
        animation:slideDown 0.3s ease;
    }

    nav ul{
        flex-direction:column;
        gap:0;
    }

    nav ul li{
        border-top:1px solid rgba(255,255,255,0.2);
    }

    nav ul li a{
        display:block;
        padding:15px;
        text-align:center;
    }

    nav ul li a:hover{
        background:gold;
        color:#030381;
    }
}

@keyframes slideDown{
    from{
        opacity:0;
        transform:translateY(-10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}


h2{
    text-align:center;
    margin-top:40px;
    color:#e39e09;
    font-size:28px;
}

form{
    width:420px;
    margin:30px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
    transition:0.3s;
}

form:hover{
    transform:translateY(-3px);
}

label{
    display:block;
    margin-top:12px;
    font-weight:600;
    color:#333;
}

input, textarea{
    width:100%;
    margin-top:6px;
    padding:12px;
    border:1px solid #ddd;
    border-radius:8px;
    font-size:14px;
}

textarea{
    height:100px;
    resize:none;
}

input:focus, textarea:focus{
    border-color:#2d3a0b;
    box-shadow:0 0 5px rgba(11,31,58,0.2);
    outline:none;
}

button{
    width:100%;
    margin-top:20px;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#ecb10e;
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:gold;
    color:#e60c30;
}

@media(max-width:500px){
    form{
        width:90%;
    }
}

</style>
</head>

<body>


<header>

    <div class="logo">Campus Events</div>
    <div class="menu-toggle">☰</div>
    </div>

    <nav>
        <ul>
            <li><a href="#Ajouter">Ajouter_evenement</a></li>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="evenement.php">Événements</a></li>
            <li><a href="inscriptions.php">Administration</a></li>
        </ul>
    </nav>

</header>

<h2>Ajouter un événement</h2>

<form method="POST">

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

    <button type="submit">Enregistrer</button>

</form>

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