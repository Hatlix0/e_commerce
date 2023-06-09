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
			font-family: 'Open Sans', sans-serif;
		}
	</style>
    <body class="bg-dark bg-body-tertiary">
    </body>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">
      <span style="color: orange; font-size: 150%;"> E-SHOP</span>
      <span class="badge bg-danger">🔨 New</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            📋 Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- Dropdown menu items -->
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>




<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
  <div class="text-center">
    <?php echo "Votre commande à succès"; ?>
  </div>
</div>

