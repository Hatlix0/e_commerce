<?php
session_start();

include "../inc/functions.php";
//connexion bd

$conn = connect();

// id visiteur / client 
$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('y-m-d');
//   // creation panier

$requette_panier = "INSERT INTO panier(visiteur,total,date_creation) VALUES ('$visiteur', '$total', '$date')";
// //execution requette panier

  $resultat = $conn->query($requette_panier);
  $panier_id = $conn->lastInsertId();


$commandes = $_SESSION['panier'][3];

foreach($commandes as $commande){
    // //ajouter commande

    //requette
    $quantite = $commande[0];
    $total = $commande[1];
    $id_produit = $commande[4];


    $requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES ('$quantite', '$panier_id', '$total', '$date', '$date', '$id_produit') ";
    
    // //execution requette

    $resultat = $conn->query($requette);

}
// supprimer le panier
$_SESSION['panier'] = null;
// redirection vers la page index
header('location:../validation.php');
  

?>