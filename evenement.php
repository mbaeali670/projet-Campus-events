<?php
require_once"connexion.php";
$sql= "SELECT*FROM rencontres";
$resultat=$connexion->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue des événements </title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 20px;
        }
        
        h1{
            text-align: center;
        }

        .container{
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card{
            background: white;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .card h2{
            color: #333;
        }

        .btn{
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>
                 
</head>
<body>
    <h1>Catalogue des evenements</h1>
    <div class="container">

       <?php
            if ($resultat && $resultat->num_rows > 0){

              while($row=$resultat->fetch_assoc()){
                   echo"
                   <div class='card'>
                   <h2>".$row['titre']."</h2>
                   <p><strong>Description :</strong>".$row['description']."</p>
                   <p><strong>Date :</strong>".$row['date']."</p>
                   <p><strong>Lieu:</strong>".$row['lieu']."</p>
                   <p><strong>Organisateur:</strong>".$row['organisateur']."</p>

                  <a class='btn' href='inscription.php?id=".$row['id']."'> S'inscrire </a>
                  </div>";
                }
            }else{ 
                echo"Aucun événement trouvé.";
            }
        ?>
    </div>
</body>
</html>
<?php
$connexion->close();
?>  