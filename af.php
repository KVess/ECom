<?php 
require_once("core/controller/articleServ.php");

?>


<!DOCTYPE html>

<html lang="fr">
<head>
 
    <title>Femme</title>
<?php include 'asset/fonc/menu.php'; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container title">
  <h1>Style fresh</h1>      
  <p>Le meilleur des articles pour "VOUS"...</p>
  </div>
</div>

<div class="container-fluid bg-3 text-center">    
  <h3>Articles Femmes</h3>
  <div class="dropdown-divider panier1"></div>

  <div class="row">
  <?php
    if (!empty($reqProdF)) {
        foreach ($reqProdF as $produit) {
            ?>

          <div class="col-sm-3">
            <p><?php echo $produit["designation"]; ?></p>
            <img src="<?php echo $produit["image"]; ?>" class="img-responsive" style="width:35%" alt="Image">
            <h3><?php echo $produit["prix"]; ?></h3>
            <a href="detail.php?id=<?php echo $produit['id_produit']; ?>" class="btn btn-info" role="button">Details</a>
          </div>

          <?php
        }
    }
  ?>
    <!-- <div class="col-sm-3"> 
      <p>Sac a main rouge</p>
      <img src="image/7.jpg" class="img-responsive" style="width:35%" alt="Image">
      <h3>6000f</h3>
      <a href="detail6.php" class="btn btn-info" role="button">Details</a>

    </div>
    <div class="col-sm-3"> 
      <p>collant noir</p>
      <img src="image/8.jpg" class="img-responsive" style="width:35%" alt="Image">
      <h3>7000f</h3>
      <a href="detail7.php" class="btn btn-info" role="button">Details</a>

    </div>
    <div class="col-sm-3">
      <p>Talon blanc</p>
      <img src="image/9.jpg" class="img-responsive" style="width:35%" alt="Image">
      <h3>8000f</h3>
      <a href="detail8.php" class="btn btn-info" role="button">Details</a>

    </div> -->
  </div>
</div>
<?php include 'asset/fonc/footer.php'; ?>  
</body>
</html>