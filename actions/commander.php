<?php
session_start();

 //test user connect
 if (!isset($_SESSION['nom'])){ // user non connect
     header('location:../connexion.php');
     exit();
   }

//selectionner le produit avec le id
include "../inc/functions.php";
//connexion bd

$conn = connect();

$visiteur = $_SESSION['id'];


// //var_dump($_POST);

 $id_produit = $_POST['produit'];
 $quantite =  $_POST['quantite'];




// //requette

$requette = "SELECT prix , nom FROM produits WHERE id='$id_produit' ";

// //execution requette

$resultat = $conn->query($requette);

$produit = $resultat->fetch();

$quantite = intval($_POST['quantite']);

$total = $quantite * $produit['prix'];


$date = date('y-m-d');

if(!isset($_SESSION['panier'])){ //panier n'exsite pas
  $_SESSION['panier'] = array( $visiteur , 0 , $date , array() ); // creation de panier


}
$_SESSION['panier'][1] += $total;
$_SESSION['panier'][3][] = array( $quantite , $total , $date , $date , $id_produit , $produit['nom'] );



//   // creation panier

//   $requette_panier = "INSERT INTO panier(visiteur,total,date_creation) VALUES ('$visiteur', '$total', '$date')";
// //execution requette panier

//   $resultat = $conn->query($requette_panier);
//   $panier_id = $conn->lastInsertId();



  

// //ajouter commande
// //requette

// $requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES ('$quantite', '$panier_id', '$total', '$date', '$date', '$id_produit') ";

// //execution requette

// $resultat = $conn->query($requette);

header("location:../panier.php")

?>