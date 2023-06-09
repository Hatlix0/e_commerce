<?php
session_start();

// 1_recuperation des donnes de la formulaire 
$id = $_POST['idp'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$image = $_POST['image'];
$date_modification = date("y-m-d"); // "2023-02-03"

// 2_ la chaine de connexion

include "../../inc/functions.php";
$conn = connect();

//3_ la creation de la requette 

$requette = "UPDATE produits SET nom='$nom', prix='$prix', image='$image', description='$description',date_modification='$date_modification' WHERE id='$id'";

// 4_ execution de la requette

$resultat = $conn->query($requette);

if ($resultat){
    header('location:liste.php?modif=ok');
}



?>