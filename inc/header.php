<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand fw-bold" href="index.php">
  <span style="color: orange; font-size: 150%;"> E-SHOP</span>
  <span class="badge bg-danger">🔨 New</span>
</a>    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          📋 Categories
          </a>
          
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php
  if(isset($categories)){
    foreach($categories as $categorie){
      print '<li><a class="dropdown-item" href="">'.$categorie['nom'].'</a></li>';

    }
  }
?>

                        

          </ul>
        </li>
        

        <?php
if (isset($_SESSION['nom'])) {
    $panier_count = 0;
    if (isset($_SESSION['panier']) && isset($_SESSION['panier'][3])) {
        $panier_count = count($_SESSION['panier'][3]);
    }
    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php"> 🌐 Accueil</a></li>';
    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="profile.php"> 👤 Profile</a></li>';
    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="panier.php"> 🛒 Panier <span class="text-danger"> ('.$panier_count.')</span></a></li>';
    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="deconnexion.php"> Deconnexion</a></li>';

} else {
    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">  Accueil</a></li>';
    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a></li>';
    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="registre.php">inscription</a></li>';
}
?>

        
       
      </ul>
      <form class="d-flex" action="index.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search" name="search">
        <button class="btn btn-outline-info" type="submit"> 🔍 Recherche</button>
        <h1>test</h1>
      </form>
      <?php 
if (isset($_SESSION['nom'], $_SESSION['description'])) {
  print '<a href="deconnexion.php" class="btn btn-primary">  Deconnexion </a>';

        }
          ?>
    </div>
  </div>
</nav>