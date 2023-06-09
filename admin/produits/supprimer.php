
<?php
session_start();

//echo "Id de produit ".$_GET['idc'];

$idproduits = $_GET['idc'];

include "../../inc/functions.php";

$conn = connect();

$requette = "DELETE FROM produits WHERE id='$idproduits'";

$resultat = $conn->query($requette);

if ($resultat){
    //echo "produit Supprimer";
    header('location:liste.php?delete=ok');
}

?>