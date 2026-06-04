<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events </title>
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

.hero{
    height: 90vh;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
    url("Image .jpeg") center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: var(--white);
    padding: 20px;
}

.hero-content h1{
    font-size: 60px;
    margin-bottom: 15px;
}

.hero-content p{
    font-size: 18px;
    opacity: 0.9;
    margin-bottom: 25px;
    line-height: 1.5;
}

.btn1, .btn2{
    display: inline-block;
    padding: 12px 25px;
    border-radius: 30px;
    font-size: 16px;
    text-decoration: none;
    margin: 5px;
    transition: 0.3s ease;
    font-weight: 500;
}

.btn1{
    background: var(--accent);
    color: #000;
}

.btn1:hover{
    background: #ffa000;
    transform: translateY(-3px);
}

.btn2{
    background: transparent;
    color: var(--white);
    border: 2px solid var(--white);
}

.btn2:hover{
    background: var(--white);
    color: var(--primary);
    transform: translateY(-3px);
}

.cards-section{
    padding: 70px 40px;
    text-align: center;
}

.cards-section h2{
    font-size: 28px;
    margin-bottom: 20px;
}

.cards{
    display: flex;
    justify-content: center;
    gap: 25px;
    flex-wrap: wrap;
    margin-top: 30px;
}

.card{
    background: var(--white);
    width: 300px;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: 0.3s ease;
}

.card:hover{
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.card h3{
    margin-bottom: 10px;
    color: var(--primary);
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
        background: var(--primary);
        text-align: center;
        padding: 20px 0;
    }

    nav ul{
        flex-direction: column;
        gap: 15px;
    }

    nav.active{
        display: block;
    }

    .hero-content h1{
        font-size: 35px;
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
                <li><a href="inscriptions.php">Administration</a></li>
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
