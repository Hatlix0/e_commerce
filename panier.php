<?php
session_start();

include "inc/functions.php";

if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
  $total = $_SESSION['panier'][1];
} else {
  // Handle the case where $_SESSION['panier'] is not defined or is empty.
  $total = 0;
}

$categories = getAllCategories();

if (!empty($_POST)){

      $produits = searchProduits($_POST['search']);
}else{
      $produits = getAllProduits();
}
$commandes = array();
if(isset($_SESSION['panier'])) {
    if ( count($_SESSION['panier'][3]) > 0 ){
         $commandes = $_SESSION['panier'][3];

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <style>
		body {
			font-family: 'Open Sans', sans-serif;
		}
	</style>
    <body class="bg-dark bg-body-tertiary">
    </body>
</head>
<body>

<?php

include "inc/header.php";

?>


<div class="row col-12 mt-4 p-5">
    <h1>Panier Client</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantite</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>

      <th scope="col">Image</th>


    </tr>
  </thead>
  <tbody>
    <?php 
   

    foreach($commandes as $index => $commande){
      print '
        <tr>
          <th scope="row">' . ($index+1) . '</th>
          <td>' . $commande[5] . '</td>
          <td>' . $commande[0] . ' Piece</td>
          <td>' . $commande[1] . ' DTT</td>
          <td><a href="actions/enlever-produit.php?id='. $index .'" class="btn btn-danger">Supprimer</a></td>


        </tr>';
    }
    
    
    



?>

  
  </tbody>
</table>

<div class="text-end mt-3">
  <h3>Total : <?php echo $total; ?> TND </h3>
  <hr />
  <a href="actions/valider-panier.php" class="btn btn-success" style="width:150px"> Commander </a>
</div>



  
</div>


<?php
include "inc/footer.php";
?>
</body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>