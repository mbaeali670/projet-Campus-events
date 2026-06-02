<?php
require_once "connexion.php";

if(!isset($_GET['id']) || empty($_GET['id'])){
    die(" ID manquant dans l'URL");
}

$id = $_GET['id'];

$sql = "SELECT * FROM rencontres WHERE id = $id";
$resultat = $connexion->query($sql);

if($resultat && $resultat->num_rows > 0){
    $event = $resultat->fetch_assoc();
}else{
    die(" Aucun événement trouvé avec cet ID");
}
if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $filiere=$_POST['filiere'];
    $sql_inscription="INSERT INTO participation(nom,prenom,email,filiere,evenement_id)
    VALUES ('$nom','$prenom','$email','$filiere','$id')";
    if($connexion->query($sql_inscription)=== TRUE){
        $message="Inscription réussie avec succés  🎉";
    }else{
        $message="Erreur:" .$connexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
    *{
       margin:0;
       padding:0;
       box-sizing:border-box;
       font-family:Arial,sans-serif;
    }
    body{
      background:#f4f7fb;
      display:flex;
      justify-content:center;
      align-items:center;
      min-height:100vh;
      padding:20px;
    }
    .form-container{
       background:white;
       width:100%;
       max-width:500px;
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
      padding:15px;
      border-radius:10px;
      margin-bottom:20px;
      color:#1e3a8a;
      font-weight:bold;
    }
    input{
      width:100%;
      padding:12px;
      margin:10px 0;
      border:1px solid #ccc;
      border-radius:8px;
      outline:none;
    }
    input:focus{
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
      transition:0.3s;
    }
    button:hover{
     background:#1e40af;
    }

    .message{
      background:#d1fae5;
      color:#065f46;
      padding:12px;
      border-radius:8px;
      margin-bottom:15px;
      text-align:center;
    }

</style>
</head>
<body>
 <div class="form-container">
      <h1>Inscription</h1>
      <div class="event-title">
          Evénement :<?php echo $event['titre'];?>
      </div>
      <?php
         if(isset($message)){
                echo"<div class='message'>$message</div>";
            }
        ?>
       <form method="POST">
          <label>Nom:</label><br>
          <input type="text" name="nom" required><br><br>
          <label>Prenom:</label><br>
          <input type="text" name="prenom" required><br><br>
          <label>Email:</label>
          <input type="email" name="email" required><br><br>
          <label>Filiere:</label><br>
          <input type="text" name="filiere" required><br><br>
          <button type="submit" name="submit">
            S'inscrire
          </button>
       </form>
    </div>
    
</body>
</html>

<?php
  $connexion->close();
?>