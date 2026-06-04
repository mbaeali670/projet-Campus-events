<?php
require_once "connexion.php";

if(!isset($_GET['id']) || empty($_GET['id'])){
    die("ID manquant dans l'URL");
}

$id = $_GET['id'];

$sql = "SELECT * FROM rencontres WHERE id = $id";
$resultat = $connexion->query($sql);

if($resultat && $resultat->num_rows > 0){
    $event = $resultat->fetch_assoc();
}else{
    die("Aucun événement trouvé avec cet ID");
}

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $filiere = $_POST['filiere'];

    $sql_inscription = "INSERT INTO participation(nom,prenom,email,filiere,evenement_id)
                        VALUES ('$nom','$prenom','$email','$filiere','$id')";

    if($connexion->query($sql_inscription) === TRUE){
        $message = "Inscription réussie avec succès 🎉";
    }else{
        $message = "Erreur : ".$connexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription à un événement</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f4f7fb;
    min-height:100vh;
}


header{
    background:#0b2a4a;
    color:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 40px;
    position:sticky;
    top:0;
    z-index:1000;
}

.logo{
    font-size:22px;
    font-weight:bold;
}

nav ul{
    list-style:none;
    display:flex;
    gap:20px;
}

nav ul li a{
    color:white;
    text-decoration:none;
    font-weight:500;
    transition:0.3s;
}

nav ul li a:hover{
    color:#ffb300;
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

    header{
        padding:15px 20px;
    }

    .menu-toggle{
        display:flex;
    }

    nav{
        display:none;
        position:absolute;
        top:70px;
        left:0;
        width:100%;
        background:#0b2a4a;
        box-shadow:0 8px 20px rgba(0,0,0,0.2);
    }

    nav.active{
        display:block;
    }

    nav ul{
        flex-direction:column;
        gap:0;
    }

    nav ul li{
        border-top:1px solid rgba(255,255,255,0.1);
    }

    nav ul li a{
        display:block;
        padding:15px;
        text-align:center;
    }

    nav ul li a:hover{
        background:#2563eb;
        color:white;
    }
}

/* ================= FORMULAIRE ================= */

.container{
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;
}

.form-container{
    background:white;
    width:100%;
    max-width:550px;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h1{
    text-align:center;
    color:#2563eb;
    margin-bottom:20px;
}

.event-title{
    background:#eff6ff;
    color:#1e3a8a;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
    font-weight:bold;
}

label{
    font-weight:bold;
}

input{
    width:100%;
    padding:12px;
    margin-top:5px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
}

input:focus{
    outline:none;
    border-color:#2563eb;
}

button{
    width:100%;
    padding:12px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#1e40af;
}

.message{
    background:#d1fae5;
    color:#065f46;
    padding:12px;
    border-radius:8px;
    text-align:center;
    margin-bottom:15px;
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
            <li><a href="evenement.php">Événements</a></li>
            <li><a href="ajouter_evenement.php">Ajouter</a></li>
            <li><a href="inscriptions.php">Administration</a></li>
        </ul>
    </nav>

</header>

<div class="container">

    <div class="form-container">

        <h1>Inscription</h1>

        <div class="event-title">
            Événement : <?php echo $event['titre']; ?>
        </div>

        <?php
        if(isset($message)){
            echo "<div class='message'>$message</div>";
        }
        ?>

        <form method="POST">

            <label>Nom</label>
            <input type="text" name="nom" required>

            <label>Prénom</label>
            <input type="text" name="prenom" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Filière</label>
            <input type="text" name="filiere" required>

            <button type="submit" name="submit">
                S'inscrire
            </button>

        </form>

    </div>

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