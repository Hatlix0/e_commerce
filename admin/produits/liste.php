<?php
session_start();

include "../../inc/functions.php";

$produits = getAllProduits();
$categories = getAllCategories();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>ADMIN : Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <style>
		body {
			font-family: 'Open Sans', sans-serif;
		}
	</style>

  
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Tableau de bord</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php  
          include "../templatee/navigation.php";
        
        
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste Des Produits</h1>

            <div>
             <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
            </div>
            
          </div>
            <!-- liste start -->
                      <div>
                      <?php
                            if (isset($_GET['ajout']) && $_GET['ajout'] == "ok" ){
                                print ' <div class="alert alert-primary">
                                Produit Ajouter Avec Succes
                            </div>';
                            }

                             ?>

                    <?php
                            if (isset($_GET['delete']) && $_GET['delete'] == "ok" ){
                                print ' <div class="alert alert-danger">
                                Produit Supprimer Avec Succes
                            </div>';
                            }

                             ?>

                    <?php
                            if (isset($_GET['modif']) && $_GET['modif'] == "ok" ){
                                print ' <div class="alert alert-success">
                                Produit Modifier Avec Succes
                            </div>';
                            }

                             ?>
                      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
        $i=0;
        foreach($produits as $p){
        $i++;

            print '
            <tr>
      <th scope="row">'.$i.'</th>
      <td>'.$p['nom'].'</td>
      <td>'.$p['description'].'</td>



      <td>
  <a data-toggle="modal" data-target="#editmodal'.$p['id'].'" class="btn btn-success mr-2">Modifier</a>
  <a onClick="return popUpDeleteCategorie()" href="supprimer.php?idp='.$p['id'].'" class="btn btn-danger" style="margin-top: 10px;">Supprimer</a>
</td>

    </tr>';
        }


        ?>

  </tbody>
</table>

            </div>
        </main>
      </div>
    </div>

    <!-- Button trigger modal -->

<!-- Modal Ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="post" enctype="multipart/form-data">

        <div class="form-group">

        <input type="text" name="nom" class="form-control" placeholder="Nom de produit ...">

        </div>
        <div class="form-group">

        <textarea name="description" class="form-control" placeholder="Descirption de produit..."></textarea>

        </div>
        <div class="form-group">

        <input type="number" step="0.01" name="Prix" class="form-control" placeholder="Prix de produit ...">

        </div>
        <div class="form-group">

        <input type="file" name="image" class="form-control" placeholder="Nom de categories ...">
        </div>

        <div>
            <div class="form-group">
              <select name="categorie" class="form-control">
                <?php 
                  foreach($categories as $index => $c )
                  print '<option value="'.$c['id'].'">'.$c['nom'].'</option>';
                
                
                ?>
                
              </select>

        </div>
        <div class="form-group">
          <input type="number" name="quantite" class="form-control" placeholder="Tapper La Quantite">
        </div>

        <input type="hidden" name="createur" value="<?php echo $_SESSION['id']; ?> ">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!---Model Modifier-->
<?php

foreach($produits as $index => $produit){ ?>
<div class="modal fade" id="editmodal<?php echo $produit['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodal">Modifier Categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="modifier.php" method="post">
          <input type="hidden" value="<?php echo $produit['id']; ?>" name="idp" />

          <div class="form-group">
  
        <input type="text" name="nom" required class="form-control" value="<?php echo $produit['nom']; ?>" placeholder="Nom de categories ...">
          </div>
          <div class="form-group">
            <textarea name="description" required class="form-control" placeholder="Descirption de categories..."><?php echo $produit['description']; ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <?php
  }

  ?>



     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/vendor/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>

    <script>
      function popUpDeleteCategorie(){
        return confirm("Vouez-vous vraiment supprimer la categorie !!  ");
      }
      </script>


  </body>
</html>
