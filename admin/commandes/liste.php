<?php
session_start();
include "../../inc/functions.php";


if(isset($_POST['btnSubmit'])){ // changer etat de panier

changerEtatPanier($_POST);

}

$commandes = getAllCommandes();
$paniers = getAllPaniers();

if (isset($_POST['btnSearch'])){
  //echo $_POST['etat'];
  //exit;

  if($_POST['etat'] == "tout"){
    $paniers = getAllPaniers();

  }else{

    $paniers = getPanierByEtat($paniers,$_POST['etat']);

  }

}


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
            <h1 class="h2">Liste Des Paniers</h1>

            <?php

            ?>

            <div>
            </div>
          </div>
            <!-- liste start -->
                      <div>

                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group d-flex">
                        <select name="etat" class="form-control">
                        <option value="en cours"> -- Choisir l'etat --</option>
                        <option value="tout">Tout</option>
                          <option value="en cours">En Cours</option>
                          <option value="En livraison">En Livraison</option>
                          <option value="Livraison termine">Livraison Termine</option>

                        </select>
                        <input type="submit" class="btn btn-warning" name="btnSearch" value="Chercher" />
                        </div>
                    
                      </form>
        
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client</th>
      <th scope="col">Total</th>
      <th scope="col">Date</th>
      <th scope="col">Etat</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
       $i=0;
       foreach($paniers as $p){
           $i++;
           print '
               <tr>
                   <th scope="row">'.$i.'</th>
                   <td>'.$p['nom'].' '.$p['prenom'].'</td>
                   <td>'.$p['total'].' TND</td>
                   <td>'.$p['date_creation'].'</td>
                   <td>'.$p['etat'].'</td>
                   <td>
                       <a data-toggle="modal" data-target="#Commandes'.$p['id'].'" class="btn btn-info">Afficher</a>
                       <a data-toggle="modal" data-target="#Traiter'.$p['id'].'" class="btn btn-primary">Traiter</a>
                       <a onClick="return popUpDeleteCategorie()" href="supprimer.php?idc='.$p['id'].'" class="btn btn-danger" style="margin-top: 2px;">Supprimer</a>
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


foreach($paniers as $index => $p){ ?>
<div class="modal fade" id="Commandes<?php echo $p['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodal">Liste Des Commandes de <span class="text-primary"> <?php echo $p['nom'].' '.$p['prenom']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th> Nom Produit </th>
                            <th> Image </th>
                            <th> Quantite </th>
                            <th> Total </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                       foreach ($commandes as $c) {
                        print '<tr>
                            <td>'.$c['nom'].'</td>
                            <td><img src="../../img/'.$c['image'].'" width="50"></td>
                            <td>'.$c['quantite'].'</td>
                            <td>'.$c['panier'].' TND</td>
                        </tr>';
                      }
                      
                        ?>


        </tbody>
      </table>


      </div>
      <div class="modal-footer">
      </div>
      </form>
    </div>
  </div>
</div>

<?php
}


foreach($paniers as $index => $p){ ?>
  <div class="modal fade" id="Traiter<?php echo $p['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editmodal">Traiter La Commande</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
       <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
       <input type="hidden" value="<?php echo $p['id']; ?>" name="panier_id">
        <div class="form-group">
        <select name="etat" class="form-control">
              <option value="en livraison"> En Livraison</option>
              <option value="livraison termine"> Livraison Termine</option>

            </select>

        </div>
        <div class="form-group">
        <button type="submit" name="btnsubmit" class="btn btn-primary">Sauvgarder</button>

        </div>
       
       </form>
  
  
        </div>
        <div class="modal-footer">
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
