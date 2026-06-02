<?php
require_once"connexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <style>
        
        body{
            background:#f4f7fb;
            padding: 20px;
        }
        h1{
            text-align:center;
            color:black;
            margin-bottom:30px;
        }
        table{
            width:99%;
            border-collapse:collapse;
            background:white;
            box-shadow:0 5px 15px rgba(219, 50, 50, 0.1);
            border: radius 3px;
            overflow:hidden;
        }
        th{
        
            color:black;
            padding:15px;
        }

        td{
            padding: 10px;
            border-bottom:1px solid #171414;
            text-align:center;
        }

        tr:hover{
            background:#f1f5f9;
        }
    </style>

</head>
<body>
    <?php
    $sql= "SELECT * FROM participation";
    $resultat= $connexion->query($sql);
    echo"<h1>Liste des étudiants inscrits</h1>";
    if($resultat && $resultat->num_rows > 0){
        echo" <table border='1'>
         <tr>
             <th> Nom</th>
             <th> Prenom </th>
             <th> Email</th>
             <th> Filiere</th>
             <th> Evenement choisi</th>
        </tr>";
         while($row = $resultat->fetch_assoc()){
               echo"<tr>";
               echo"<td>"  .$row["nom"]. "</td>";
               echo"<td>"  .$row["prenom"]. "</td>";
               echo"<td>" .$row["email"]. "</td>";
               echo"<td>" .$row["filiere"]. "</td>";
               echo"<td>"  .$row["evenement_id"]. "</td>";
               echo"</tr>";
        
            } 
       echo" </table>";
    }
?>
</body>
</html>
<?php
 $connexion->close();
?>