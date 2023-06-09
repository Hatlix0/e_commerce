<?php
session_start();

include "inc/functions.php";

$categories = getAllCategories();

if (!empty($_POST)){

      $produits = searchProduits($_POST['search']);
}else{
      $produits = getAllProduits();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./inc/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <style>
		body {
			background-image: url('https://www.solution1formatiktd.com/img/banner.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center center;
		}
            .transparent-bg {
			background-color: rgba(255, 255, 255, 0.5);
			/* Set opacity to 50% */
			padding: 10px;
		}
            body {
                  cursor: url('https://pngimg.com/uploads/cursor/cursor_PNG100.png');
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


<div class="row col-12 mt-4">
<?php
      foreach($produits as $produit){

        print ' <div class="col-3 mt-4">
        <div class="card" style="width: 18rem;">
            <img src="img/'.$produit['image'].'" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">'.$produit['nom'].'</h5>
              <p class="card-text ">'.$produit['description'].'</p>
              <a href="produit.php?id='.$produit['id'].'" class="btn btn-primary">Afficher</a>
            </div>
          </div>
    </div>';

      }

?>

<?php
include "inc/footer.php";
?>
</body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>