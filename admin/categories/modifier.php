<?php
session_start();

// 1_recuperation des donnes de la formulaire 
$id = $_POST['idc'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$date_modification = date("y-m-d"); // "2023-02-03"

// 2_ la chaine de connexion

include "../../inc/functions.php";
$conn = connect();

//3_ la creation de la requette 

$requette = "UPDATE categories SET nom='$nom', description='$description',date_modification='$date_modification' WHERE id='$id'";

// 4_ execution de la requette

$resultat = $conn->query($requette);

if ($resultat){
    header('location:liste.php?modif=ok');
}



?>