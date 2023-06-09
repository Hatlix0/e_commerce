<?php

function connect(){
        // 1 - connexion vers la BD
$servername = "localhost";
$DBuser = "root" ;
$DBpassword = "" ;
$DBname = "ecommerce" ;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  return $conn;
}





function getAllCategories(){
    $conn = connect();

// 2 - creation de la requette

$requette = "SELECT * FROM categories";

// 3 - execution de la requette

$resultat = $conn->query($requette);

// 4 - resultat de la requette

$categories = $resultat->fetchAll();

//var_dump($categories);
return $categories;
}

function getAllProduits(){
        // 1 - connexion vers la BD
        $conn = connect();
// 2 - creation de la requette

$requette = "SELECT * FROM produits";

// 3 - execution de la requette

$resultat = $conn->query($requette);

// 4 - resultat de la requette

$produits = $resultat->fetchAll();

//var_dump($categories);
return $produits;
}

function searchProduits($keyword){
    $conn = connect();
  // 2 - creation de requette 

  $requette = "SELECT * FROM produits WHERE nom LIKE '%$keyword%' ";


  // 3 - exection de requette 

  $resultat = $conn->query($requette);

  // 4 - resultat de la requette

  $produits = $resultat->fetchAll();

  return $produits;
}

function getProduitById($id){

    $conn = connect();
    // 1 - creation de requette
    
    $requette = "SELECT * FROM produits WHERE id=$id";

      // 3 - exection de requette 

  $resultat = $conn->query($requette);

  // 4 - resultat de la requette

  $produit = $resultat->fetch();

  return $produit;

}

 function AddVisiteur($data){

  $conn = connect();
  $mphash = md5($data['mp']);

  $requette = "INSERT INTO visiteurs(nom,prenom,email,mp,telephone) VALUES('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mphash."','".$data['telephone']."')";

  $resultat = $conn->query($requette);

  if ($resultat){
    return true;
  }else{
    return false;
  }

}


function ConnectVisiteur($data){

  $conn = connect();
  $email = $data['email'];
  $mp = md5($data['mp']);
  $requette = "SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp'";

  $resultat = $conn->query($requette);

  $user = $resultat->fetch();

  return $user;
}

  function ConnectAdmin($data){
    $conn = connect();
    $email = $data['email'];
    $mp = md5($data['mp']);
    $requette = "SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";
  
    $resultat = $conn->query($requette);
  
    $user = $resultat->fetch();
  
    return $user;
  }

function getAllUsers(){
  $conn = connect();

  $requette = "SELECT * FROM 	visiteurs WHERE etat=0";
  
  $resultat = $conn->query($requette);

  $users = $resultat->fetchAll();

  return $users;

  
}


function getStocks(){
  $conn = connect();

  $requette = "SELECT s.id,p.nom,s.quantite FROM produits p, stocks s WHERE p.id = s.produit";
  
  $resultat = $conn->query($requette);

  $stocks = $resultat->fetchAll();

  return $stocks;
}

function getAllPaniers(){
  $conn = connect();

  $requette = "SELECT v.nom, v.prenom, v.telephone , p.total, p.etat, p.date_creation, p.id FROM panier p, visiteurs v WHERE p.visiteur = v.id";
  
  $resultat = $conn->query($requette);

  $paniers = $resultat->fetchAll();

  return $paniers;
}

function getAllCommandes(){
  $conn = connect();

  $requette = "SELECT p.nom, p.image, c.quantite, c.total, c.panier FROM commandes c , produits p WHERE c.produit = p.id";
  
  $resultat = $conn->query($requette);

  $commandes = $resultat->fetchAll();

  return $commandes;
}

function changerEtatPanier($data){
  $conn = connect();

  $requette = "Update panier SET etat='".$data['etat']."' WHERE id='".$data['panier_id']."'";
  $resultat = $conn->query($requette);



}

function getPanierByEtat($paniers,$etat){

  $paniersEtat = array();

  foreach($paniers as $p){
    if($p['etat'] == $etat){
      array_push($paniersEtat,$p);
    }
  }
  return $paniersEtat;


}

function EditAdmin($data){
  $conn = connect();

  if($data['mp'] != ""){ // mot de passe a une valeur 
    $requette = "UPDATE administrateur SET nom='".$data['nom']."' , email='".$data['email']."' , mp='".md5($data['mp'])."'  WHERE id='".$data['id_admin']."'";

  }else{
    $requette = "UPDATE administrateur SET nom='".$data['nom']."' , email='".$data['email']."' WHERE id='".$data['id_admin']."'";

  }
  $resultat = $conn->query($requette);
  return true;
}

function EditVisiteur($data){
  $conn = connect();

  if($data['mp'] != ""){ // mot de passe a une valeur 
    $requette = "UPDATE visiteurs SET nom='".$data['nom']."' , email='".$data['email']."' , mp='".md5($data['mp'])."'  WHERE id='".$data['id_visiteur']."'";

  }else{
    $requette = "UPDATE visiteurs SET nom='".$data['nom']."' , email='".$data['email']."' WHERE id='".$data['id_visiteur']."'";

  }
  $resultat = $conn->query($requette);
  return true;
}


function getData(){

  $data = array(); 
  $conn = connect();

  // calculer le nombre des produits dans la base 
  $requette = "SELECT COUNT(*) FROM produits";
  $resultat = $conn->query($requette);
  $nbrPrds = $resultat->fetch();

  //calculer le nombre des categories dans la base 
  $requette1 = "SELECT COUNT(*) FROM categories";
  $resultat1 = $conn->query($requette1);
  $nbrCat = $resultat1->fetch();
  
  //calculer le nombre des clients dans la base 
  $requette2 = "SELECT COUNT(*) FROM visiteurs";
  $resultat2  = $conn->query($requette2);
  $nbrClients = $resultat2->fetch();

  //calculer le nombre des paniers dans la base 

  $requette3 = "SELECT COUNT(*) FROM panier";
  $resultat3  = $conn->query($requette3);
  $nbrPaniers = $resultat3->fetch();

  $requette4 = "SELECT COUNT(*) FROM stocks";
  $resultat4  = $conn->query($requette4);
  $nbrStocks = $resultat4->fetch();
  var_dump($nbrStocks); // Debugging line
  $data['stocks'] = $nbrStocks['0'];
  
  

  $data['produits'] = $nbrPrds['0'];
  $data['categories'] = $nbrCat['0'];
  $data['clients'] = $nbrClients['0'];
  $data['paniers'] = $nbrPaniers['0'];



  return $data;

}
  





?>