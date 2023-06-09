<?php

session_start();
include "./inc/functions.php";



if(isset($_POST['btnEdit'])){
    if(EditVisiteur($_POST)) {
     $_SESSION['nom'] = $_POST['nom'];
     $_SESSION['email'] = $_POST['email'];
     $_SESSION['mp'] = $_POST['mp'];

   
   
    }
   }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <style>
		body {
			font-family: 'Open Sans', sans-serif;
		}
	</style>
</head>
<body>

<?php

include "inc/header.php";


?>

<div class="container">
    <h1>Bienvenune :  <span class="text-primary"><?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></span></h1>
    <h2>Email :  <span class="text-danger"><?php echo $_SESSION['email'];?></h2>
    <div class="container">
          
    <a data-toggle="modal" data-target="#profileEdit" class="btn btn-primary"> Modifier </a>

          </div>

          


    
</div>
<div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodal">Modifier Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id_visiteur">
          <div class="form-group">
          <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>" class="form-control"placeholder="Nouveau Nom">

          </div>
          <div class="form-group">
          <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" placeholder="Nouveau Email">

          </div>
          <div class="form-group">
          <input type="password" name="mp" class="form-control" placeholder="Nouveau Mot de passe">

          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" name="btnEdit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
include "inc/footer.php";
?>
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
  </body>
</html>
