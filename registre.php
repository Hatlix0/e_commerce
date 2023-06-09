<?php

session_start();
if (isset($_SESSION['nom'])){
  header('location:profile.php');
}
include "inc/functions.php";
$showRegistrationAlert = 0;
$categories = getAllCategories();

if (!empty($_POST)){ // click sur le button savgarder

          if (AddVisiteur($_POST)){
            $showRegistrationAlert = 1;
          };

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.1/sweetalert2.min.css">
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

  
<!--Fin nav-->
<div class="col-12 p-5">

    <h1 class="text-center">inscription</h1>
    <form action="registre.php" method="post" onsubmit="return validateForm()">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name ="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nom</label>
          <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telephone</label>
            <input type="number" name="telephone" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
            <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
          </div>
        <button type="submit" class="btn btn-primary">Sauvgarder</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
      </form>

</div>

<script>
function validateForm() {
  var email = document.forms["myForm"]["email"].value;
  var nom = document.forms["myForm"]["nom"].value;
  var prenom = document.forms["myForm"]["prenom"].value;
  var telephone = document.forms["myForm"]["telephone"].value;
  var mp = document.forms["myForm"]["mp"].value;

  if (email == "") {
    alert("Veuillez entrer votre email.");
    return false;
  }
  if (nom == "") {
    alert("Veuillez entrer votre nom.");
    return false;
  }
  if (prenom == "") {
    alert("Veuillez entrer votre prénom.");
    return false;
  }
  if (telephone == "") {
    alert("Veuillez entrer votre numéro de téléphone.");
    return false;
  }
  if (mp == "") {
    alert("Veuillez entrer votre mot de passe.");
    return false;
  }
}
</script>



<!--Footer-->
<?php
include "inc/footer.php";
?>
</body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.1/sweetalert2.all.min.js"></script>

  <?php
if($showRegistrationAlert ==1){
  print "<script>
Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Creation de compte avec succes',
showConfirmButton: false,
timer: 2500
})
</script>

";

}



?>

</html>