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
    --primary:#0b2a4a;
    --accent:#ffb300;
    --bg:#f4f7fb;
}

body{
    margin:0;
    font-family:Arial;
    background:var(--bg);
}

header{
    background:var(--primary);
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
    font-size:20px;
    font-weight:bold;
}

nav ul{
    display:flex;
    list-style:none;
    gap:20px;
}

nav ul li a{
    color:white;
    text-decoration:none;
    font-weight:500;
    transition:0.3s;
}

nav ul li a:hover{
    color:var(--accent);
}


h1{
    text-align:center;
    margin:30px 0;
}

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

@media(max-width:768px){
    header{
        flex-direction:column;
        gap:10px;
        text-align:center;
    }

    nav ul{
        flex-direction:column;
        gap:10px;
    }
}
</style>

</head>

<body>

<header>
    <div class="logo">Admin Campus</div>

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

</body>
</html>

<?php
$connexion->close();
?>
