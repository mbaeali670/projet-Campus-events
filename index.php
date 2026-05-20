<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events </title>
    <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Arial", sans-serif;
}

body{
    background: #f5f7fb;
    color: #333;
}

header{
    background: #002147;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.logo{
    font-size: 22px;
    font-weight: bold;
}

nav ul{
    display: flex;
    list-style: none;
    gap: 20px;
}

nav ul li a{
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: 0.3s;
}

nav ul li a:hover{
    color: gold;
}

.menu-toggle{
    display: none;
    font-size: 28px;
    cursor: pointer;
}

.hero{
    height: 90vh;
    background: url("image .jpeg") center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    position: relative;
}

.hero::before{
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
}

.hero-content{
    position: relative;
}

.hero h1{
    font-size: 55px;
    margin-bottom: 20px;
}

.hero p{
    font-size: 18px;
    margin-bottom: 20px;
}

button{
    padding: 12px 22px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
}

.btn1, .btn2{
    padding: 12px 22px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    transition: 0.3s;
}

.btn1{
    background: gold;
    color: black;
}

.btn2{
    background: white;
    color: #002147;
    border: 2px solid white;
}
.btn1:hover{
    background: orange;
}

.btn2:hover{
    background: #002147;
    color: white;
}
.btn1:hover,
.btn2:hover{
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.cards-section{
    padding: 60px 40px;
    text-align: center;
}

.cards{
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 30px;
}

.card{
    background: white;
    width: 280px;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}

.card:hover{
    transform: translateY(-8px);
}

@media (max-width: 768px){

    .menu-toggle{
        display: block;
    }

    nav{
        display: none;
        position: absolute;
        top: 70px;
        left: 0;
        width: 100%;
        background: #002147;
        text-align: center;
    }

    nav ul{
        flex-direction: column;
    }

    nav.active{
        display: block;
    }

    .hero h1{
        font-size: 32px;
    }
    .hero-content{
    padding: 20px;
    }

    .cards{
        flex-direction: column;
        align-items: center;
    }
    .card{
        width: 90%;
    }
}

</style>
</head>
<body>
    <header>
        <div class="menu-toggle">☰</div>
        <div class="logo">
            Campus Events
        </div>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="ajouter_evenement.php">Ajouter un événement</a></li>
                <li><a href="evenement.php">Voir les événements</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Campus Events</h1>

            <p>
                Bienvenue sur notre plateforme de gestion des evenements universitaires.
                <br></br>
                Découvrez les activités du campus, ajoutez vos evenements et participez
                à la vie étudiante.
            </p>
            <a href="ajouter_evenement.php" class="btn1">Ajouter un événement</a>
            <a href="evenement.php" class="btn2">Voir les événements</a>
        </div>
    </section>

    <section class="cards-section">
    <div class="cards">
        <div class="card">
            <h3>Conférences</h3>
            <p>Découvrez des conférences académiques et professionnelles organisées sur le campus.</p>
        </div>

        <div class="card">
            <h3>Activités culturelles</h3>
            <p>Participez aux journées culturelles, concerts et animations étudiantes.</p>
        </div>

        <div class="card">
            <h3>Compétitions</h3>
            <p>Suivez les compétitions sportives et technologiques entre étudiants.</p>
        </div>
    </div>
</section>

<script>
const toggle = document.querySelector(".menu-toggle");
const nav = document.querySelector("nav");

toggle.addEventListener("click", () => {
    nav.classList.toggle("active");
});
</script>

</body>
</html>
