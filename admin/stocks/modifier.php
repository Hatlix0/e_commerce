<?php
session_start();

// 1_recuperation des donnes de la formulaire 
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];


// 2_ la chaine de connexion

include "../../inc/functions.php";
$conn = connect();

//3_ la creation de la requette 

$requette = "UPDATE stocks SET quantite='$quantite' WHERE id='$id'";

// 4_ execution de la requette

$resultat = $conn->query($requette);

if ($resultat){
    header('location:liste.php?modif=ok');
}



?>