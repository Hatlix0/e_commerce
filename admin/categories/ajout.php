<?php
session_start();

// 1_recuperation des donnes de la formulaire 

$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date("y-m-d"); // "2023-02-03"

// 2_ la chaine de connexion

include "../../inc/functions.php";
$conn = connect();

//3_ la creation de la requette 


try{
    // 3- creation de la requette
$requette = "INSERT INTO categories(nom,description,createur,date_creation) VALUES ('$nom','$description','$createur','$date_creation')";
// 4- execution de la requette
$resultat = $conn->query($requette);

if ($resultat){
    header('location:liste.php?ajout=ok');
}
    } catch(PDOException $e){
    //echo "connection failed:" . $e->getMessage();
    if($e->getcode() == 23000){
        header('location:liste.php?erreur=duplicate');
    }
}



?>