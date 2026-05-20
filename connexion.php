<?php
$serveur="localhost";
$utlisateur="root";
$motdepasse="";
$basededonne="campus_events";

$connexion=new mysqli($serveur,$utlisateur,$motdepasse,$basededonne);

if($connexion->connect_error){
    die("error de connexion".
    $connexion->connect_error);
}

?>