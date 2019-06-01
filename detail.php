<?php 
  require_once("core/controller/detailArtServ.php");
?>

<!DOCTYPE html>

<html lang="fr">
<head>
 
  <title>Detail</title>

  <?php include 'asset/fonc/menu.php'; ?>
  
<div class="container">
<div class="row">
  <div class="col-sm-6">
  <div class="row">
    <div class="card" style="width: 18rem;">
      <img src="<?php echo $reqProd[0]["image"]; ?>" class="card-img-top" alt="...">

    </div>
  </div>
  <div class="row">
  <h1 ><?php echo $reqProd[0]["prix"]; ?> Fcfa</h1>
  </div>
 </div>
  <div class="col-sm-6">
  <div class="card-body">
    <h1 class="card-title"><strong><?php echo $reqProd[0]["designation"]; ?></strong></h1>
    
    <h2>DÉTAILS DU PRODUIT</h2>
    <p class="card-text"> 
      <?php echo $reqProd[0]["description"]; ?>
    </p>

    <div class="card-body">
  
    <a href="actionpanier.php?action=add&idProd=<?php echo $reqProd[0]["id_produit"] ?>" class="btn btn-danger">COMMANDEZ</a>
  </div>
  </div>
  </div>
  
</div>

</div>
<br><br><br><br><br><br>
  <?php include 'asset/fonc/footer.php'; ?>
      
  </body>
</html>