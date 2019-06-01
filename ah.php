<?php 

require_once("core/controller/articleServ.php");

?>

<!DOCTYPE html>

<html lang="fr">
<head>
 
    <title>Homme</title>
    
<?php include 'asset/fonc/menu.php'; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container title">
  <h1>Style fresh</h1>      
  <p>Le meilleur des articles pour "VOUS"...</p>
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <h3>Articles Hommes</h3>
  <div class="dropdown-divider panier1"></div>

  <br>

  <div class="row">
  <?php
    if (!empty($reqProdH)) {
      foreach ($reqProdH as $produit) {
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
      <p>Chapeau Nike</p>
      <img src="image/2.jpg" class="img-responsive" style="width:35%" alt="Image">
      
      <h3>5000f</h3>
      <a href="detail1.php" class="btn btn-info" role="button">Details</a>
    </div>
    <div class="col-sm-3"> 
      <p>Chemise Carreaux</p>
      <img src="image/3.jpg" class="img-responsive" style="width:35%" alt="Image">
      
      <h3>6000f</h3>
      <a href="detail2.php" class="btn btn-info" role="button">Details</a>
    </div>
    <div class="col-sm-3"> 
      <p>Chaussure en cuir</p>
      <img src="image/4.jpg" class="img-responsive" style="width:35%" alt="Image"> 
      <h3>7000f</h3>     
      <a href="detail3.php" class="btn btn-info" role="button">Details</a>
    </div>
    <div class="col-sm-3">
      <p>Pull Bleu</p>
      <img src="image/5.jpg" class="img-responsive" style="width:35%" alt="Image">     
      <br>
      <h3>8000f</h3>
      <a href="detail4.php" class="btn btn-info" role="button">Details</a>
    </div> -->
  </div>
</div>
<?php include 'asset/fonc/footer.php'; ?>  
</body>
</html>