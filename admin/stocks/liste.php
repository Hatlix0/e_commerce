<?php
session_start();

include "../../inc/functions.php";
$stocks = getStocks();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>ADMIN : Stock</title>

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
            <h1 class="h2">Stocks Des Produits</h1>

            <div>
            </div>
          </div>
            <!-- liste start -->
                      <div>
                    <?php
                            if (isset($_GET['modif']) && $_GET['modif'] == "ok" ){
                                print ' <div class="alert alert-success">
                                Stock Modifier Avec Succes
                            </div>';
                            }

                             ?>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom de produit</th>
      <th scope="col">Quantite</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  if (isset($_POST['quantite']) && is_numeric($_POST['quantite']) && $_POST['quantite'] > 0) {
    // execute SQL statement
 } else {
    // display error message
 }
        $i=0;
        foreach($stocks as $s){
        $i++;

            print '
            <tr>
      <th scope="row">'.$i.'</th>
      <td>'.$s['nom'].'</td>
      <td>'.$s['quantite'].'</td>
      <td>
            <a data-toggle="modal" data-target="#editmodal'.$s['id'].'" class="btn btn-success">Modifier</a>



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




<!-- Modal Modifier -->
<?php

foreach($stocks as $index => $stock){ ?>
<div class="modal fade" id="editmodal<?php echo $stock['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodal">Modifier Stock de <span class="text-primary"><?php echo $stock['nom']; ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="modifier.php" method="post">
          <input type="hidden" value="<?php echo $stock['id']; ?>" name="idstock" />

        <div class="form-group">
        
        <input type="number" step="1" name="quantite" required class="form-control" value="<?php echo $stock['quantite']; ?>" placeholder="Stock De Produit ...">

        </div>
       


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
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
