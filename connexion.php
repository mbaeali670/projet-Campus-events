<?php
$serveur="localhost";
$utlisateur="root";
$motdepasse="";
$basededonne="activite";

$connexion=new mysqli($serveur,$utlisateur,$motdepasse,$basededonne);

if($connexion->connect_error){
    die("error de connexion".
    $connexion->connect_error);
}

?>