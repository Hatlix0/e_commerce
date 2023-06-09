<?php
session_start();

// 1_recuperation des donnes de la formulaire 
$nom = $_POST['nom'];

$description = $_POST['description'];

$prix = $_POST['Prix'];

$createur = $_POST['createur'];

$categorie = $_POST['categorie'];
$quantite = $_POST['quantite'];
$date_creation = date("y-m-d");
//upload image 

$target_dir = "../../img/";
if(isset($_FILES["image"])) {
  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $image = $_FILES["image"]["name"];
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
} else {
  echo "Error: No file uploaded.";
}
$date = date("y-m-d");

// 2_ la chaine de connexion

include "../../inc/functions.php";
$conn = connect();
try{
    // 3- creation de la requette

$requette = "INSERT INTO produits(nom,description,prix,image,categorie,createur,date_creation) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date_creation')";

// 4- execution de la requette
$resultat = $conn->query($requette);


if ($resultat){

  $produit_id = $conn->lastInsertId();

  $requette2 = "INSERT INTO stocks(produit,quantite,createur,date_creation) VALUES('$produit_id','$quantite','$createur','$date_creation')";
if($conn->query($requette2)){
  header('location:liste.php?ajout=ok');
}else{
  echo "imposible d'ajouter le stock du produit";
}
    
}
} catch(PDOException $e){
    echo "connection failed:" . $e->getMessage();
    if($e->getcode() == 23000){
        header('location:liste.php?erreur=duplicate');
    }
}





?>