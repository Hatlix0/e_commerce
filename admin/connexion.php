<?php
session_start();

if (isset($_SESSION['nom'])){
  header('location:profile.php');
}

include "../inc/functions.php";
$user = true;

if (!empty($_POST)){ // click sur le button savgarder

    $user = ConnectAdmin($_POST);
    if( is_array($user) && count($user) > 0 ) if( count($user) > 0 ){ // utulisatuer connecter
      Session_start();
      $_SESSION['id'] = $user['id'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['nom'] = $user['nom'];
      $_SESSION['mp'] = $user['mp'];


      header('location:profile.php'); // redirection vers la page profile

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

    
      
<!--Fin nav-->
<div class="col-12 p-5">

    <h1 class="text-center">Espace Admin : Connexion</h1>
    <form action="connexion.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
            <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
          </div>
        <button type="submit" class="btn btn-primary">Sauvgarder</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
      </form>

</div>




<!--Footer-->
<?php
include "../inc/footer.php";
?>
</body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.1/sweetalert2.all.min.js"></script>

  <?php
if(!$user){
  print "
  <script>
Swal.fire({
position: 'top-end',
icon: 'error',
title: 'Cordonnes Non Valide',
showConfirmButton: false,
timer: 2000
})
</script>

";

}
?>

</html>